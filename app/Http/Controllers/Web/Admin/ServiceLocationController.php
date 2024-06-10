<?php

namespace App\Http\Controllers\Web\Admin;

use App\Base\Filters\Master\CommonMasterFilter;
use App\Base\Libraries\QueryFilter\QueryFilterContract;
use App\Base\Services\ImageUploader\ImageUploaderContract;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\ServiceLocation;
use App\Base\Constants\Auth\Role as RoleSlug;
use App\Http\Controllers\Web\BaseController;
use App\Http\Requests\Admin\ServiceLocation\CreateServiceLocationRequest;
use App\Http\Requests\Admin\ServiceLocation\UpdateServiceLocationRequest;
use App\Models\Country;
use App\Models\TimeZone;
use Carbon\Carbon;
use Grimzy\LaravelMysqlSpatial\Types\Polygon;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use Grimzy\LaravelMysqlSpatial\Types\LineString;
use Grimzy\LaravelMysqlSpatial\Types\MultiPolygon;
use Illuminate\Validation\ValidationException;
use Prewk\XmlStringStreamer;
use Prewk\XmlStringStreamer\Stream;
use Prewk\XmlStringStreamer\Parser;
use App\Models\Admin\ZoneCancellationFee;


class ServiceLocationController extends BaseController
{
    /**
     * Class constructor.
     */
    protected $imageUploader;

    protected $serviceLocation;

    public function __construct(ServiceLocation $serviceLocation, ImageUploaderContract $imageUploader)
    {
        $this->imageUploader = $imageUploader;
        $this->serviceLocation = $serviceLocation;
    }

    public function index()
    {
        $page = trans('pages_names.service_location');
        $main_menu = 'service_location';
        $sub_menu = '';

        return view('admin.servicelocation.index', compact('page', 'main_menu', 'sub_menu'));
    }

    public function getAllLocation(QueryFilterContract $queryFilter)
    {
        $query = ServiceLocation::query();

        $results = $queryFilter->builder($query)->customFilter(new CommonMasterFilter)->paginate();
        return view('admin.servicelocation._servicelocation', compact('results'));
    }

    public function create()
    {

        $timezones = TimeZone::active()->get();

        $countries = Country::active()->get();
        $page = trans('pages_names.add_service_location');
        $main_menu = 'service_location';
        $sub_menu = '';
        return view('admin.servicelocation.create', compact('timezones', 'page', 'main_menu', 'sub_menu', 'countries'));
    }

  public function store(CreateServiceLocationRequest $request)
    {
        // dd($request->all());
        if (env('APP_FOR')=='demo') {
            $message = trans('succes_messages.you_are_not_authorised');

            return redirect('service_location')->with('warning', $message);
        }

        $created_params = $request->only(['name','currency_name','currency_code','currency_symbol','country','timezone','unit']);
        $set = [];

        if($request->coordinates == null){
             throw ValidationException::withMessages(['search-box' => __('Please Complete the shape before submit')]);
        }


// dd($this->serviceLocation->companyKey());

        foreach (json_decode($request->coordinates) as $key => $coordinates) {
            $points = [];
            $lineStrings = [];
            foreach ($coordinates as $key => $coordinate) {
                if ($key == 0) {
                    $created_params['lat'] = $coordinate->lat;
                    $created_params['lng'] = $coordinate->lng;
                }
                $point = new Point($coordinate->lat, $coordinate->lng);
                $check_if_exists = $this->serviceLocation->companyKey()->contains('coordinates', $point)->exists();
                if ($check_if_exists) {
                    throw ValidationException::withMessages(['name' => __('Coordinates already exists with our exists zone')]);
                }
                $points []= new Point($coordinate->lat, $coordinate->lng);
            }
            array_push($points, $points[0]);
            $lineStrings[] = new LineString($points);
            $polygon = new Polygon($lineStrings);

            $set[] = $polygon;
        }

        $multi_polygon = new MultiPolygon($set);

        $created_params['coordinates'] = $multi_polygon;


        $created_params['active'] = 1;

        ServiceLocation::create($created_params);

        $message = trans('succes_messages.service_location_added_succesfully');
        return redirect('service_location')->with('success', $message);
    }

    public function getById(ServiceLocation $serviceLocation)
    {
        // dd($serviceLocation);
        $page = trans('pages_names.edit_service_location');
        $main_menu = 'service_location';
        $sub_menu = '';

        $item = $serviceLocation;
        $timezones = TimeZone::active()->get();
        $countries = Country::active()->get();

        $coordinates = $serviceLocation->coordinates->toArray();

        $multi_polygon = [];

        foreach ($coordinates as $key => $coordinate) {
            $polygon = [];
            foreach ($coordinate[0] as $key => $point) {
                $pp = new \stdClass;
                $pp->lat = $point->getLat();
                $pp->lng = $point->getLng();
                $polygon [] = $pp;
            }
            $multi_polygon[] = $polygon;
        }

        $default_lat = $polygon[0]->lat;
        $default_lng = $polygon[0]->lng;

        $zone_coordinates = json_encode($multi_polygon);



        return view('admin.servicelocation.update', compact('timezones', 'item', 'page', 'main_menu', 'sub_menu', 'countries','default_lat', 'default_lng','zone_coordinates'));
    }

   public function update(UpdateServiceLocationRequest $request, ServiceLocation $serviceLocation)
    {
        if (env('APP_FOR')=='demo') {
            $message = trans('succes_messages.you_are_not_authorised');

            return redirect('service_location')->with('warning', $message);
        }

        $updated_params = $request->only(['name','currency_name','currency_code','currency_symbol','country','timezone','unit']);
         $set = [];
       if($request->coordinates == null){
             throw ValidationException::withMessages(['search-box' => __('Please Complete the shape before submit')]);
        }

        foreach (json_decode($request->coordinates) as $key => $coordinates) {
            $points = [];
            $lineStrings = [];
            foreach ($coordinates as $key => $coordinate) {
                if ($key == 0) {
                    $updated_params['lat'] = $coordinate->lat;
                    $updated_params['lng'] = $coordinate->lng;
                }
                $point = new Point($coordinate->lat, $coordinate->lng);
                $check_if_exists = $this->serviceLocation->companyKey()->contains('coordinates', $point)->where('id', '!=', $serviceLocation->id)->exists();
                if ($check_if_exists) {
                    throw ValidationException::withMessages(['zone_name' => __('Coordinates already exists with our exists zone')]);
                }
                $points []= new Point($coordinate->lat, $coordinate->lng);
            }
            array_push($points, $points[0]);
            $lineStrings[] = new LineString($points);
            $polygon = new Polygon($lineStrings);

            $set[] = $polygon;
        }

        $multi_polygon = new MultiPolygon($set);

        $updated_params['coordinates'] = $multi_polygon;

        $serviceLocation->update($updated_params);

        $message = trans('succes_messages.service_location_updated_succesfully');

        return redirect('service_location')->with('success', $message);
    }

    public function toggleStatus(ServiceLocation $serviceLocation)
    {
        if (env('APP_FOR')=='demo') {
            $message = trans('succes_messages.you_are_not_authorised');

            return redirect('service_location')->with('warning', $message);
        }

        $status = $serviceLocation->isActive() ? false: true;
        $serviceLocation->update(['active' => $status]);

        $message = trans('succes_messages.service_location_status_changed_succesfully');
        return redirect('service_location')->with('success', $message);
    }

    public function delete(ServiceLocation $serviceLocation)
    {
        if(env('APP_FOR')!='demo'){
        $serviceLocation->delete();
        }

        $message = trans('succes_messages.service_location_deleted_succesfully');

        return $message;
    }

    public function getCurrencyByCountry(Request $request)
    {
        return Country::active()->whereId($request->id)->first();
    }
    public function getCityBySearch(){
        return $cities=[];

        if(request()->has('search')) $search = request()->search; else $search = 'ra';

        $filePath = env('COORDINATES_PATH');
        // Prepare our stream to be read with a 1kb buffer
        $stream = new Stream\File($filePath, 1024);
        ini_set('memory_limit', '-1');
        // Construct the default parser (StringWalker)
        $parser = new Parser\StringWalker();
        // Create the streamer
        $streamer = new XmlStringStreamer($parser, $stream);
        // Iterate through the `<customer>` nodes
        $cities = [];
        while ($node = $streamer->getNode()) {
            $simpleXmlNode = simplexml_load_string($node);
            foreach ($simpleXmlNode->Folder->Placemark as $key => $value) {
                if ( stripos($value->ExtendedData->SchemaData->SimpleData[3], $search) !== false ){
                    $cities[] = $value->ExtendedData->SchemaData->SimpleData[3];
                }
            }
        }

        return $cities;
    }
   /**
    *get polygon coordinates by city
    */
    public function getCoordsByKeyword($keyword)
    {
        $multi_polygons = [];
        return json_encode($multi_polygons);

        // Prepare our stream to be read with a 1kb buffer
        $filePath = env('COORDINATES_PATH');
        $stream = new Stream\File($filePath, 1024);
        ini_set('memory_limit', '-1');

        // Construct the default parser (StringWalker)
        $parser = new Parser\StringWalker();

        // Create the streamer
        $streamer = new XmlStringStreamer($parser, $stream);
        $multi_polygons= [];
        $polygons = [];
        $Placemarks = [];
        // Iterate through the `<customer>` nodes
        while ($node = $streamer->getNode()) {
            $simpleXmlNode = simplexml_load_string($node);
            foreach ($simpleXmlNode->Folder->Placemark as $key => $value) {
                $i = 0;
                if ($value->ExtendedData->SchemaData->SimpleData[3]==$keyword) {
                    // print_r("Rat");
                    foreach ($value->MultiGeometry->Polygon as $key => $MultiGeometry) {
                        $polygons[$i] = $MultiGeometry->outerBoundaryIs->LinearRing->coordinates;
                        $i++;
                    }
                    foreach ($polygons as $key => $polygon) {
                        $final_polygons = [];
                        $splited_coordinates = explode(' ', $polygon);
                        foreach ($splited_coordinates as $key => $splited_coordinate) {
                            $lat_lngs = explode(',', $splited_coordinate);
                            $pp = new \stdClass;
                            $pp->lat = (float)$lat_lngs[1];
                            $pp->lng = (float)$lat_lngs[0];
                            $final_polygons [] = $pp;
                        }
                        $multi_polygons[] = $final_polygons;
                    }
                }
            }
        }
        return json_encode($multi_polygons);
    }

    public function cancellatonFeeView(ServiceLocation $serviceLocation)
    {
        $main_menu = 'map';
        $sub_menu = 'zone';
        $page = trans('pages_names.surge');

        return view('admin.servicelocation.cancellation_fee_view', compact('page', 'main_menu', 'sub_menu','serviceLocation'));
    }

    public function cancellatonFeeUpdate(Request $request, ServiceLocation $serviceLocation)
    {

        $serviceLocation->zoneCancellationFee()->delete();

            foreach ($request->hours as $key => $hour) {

                $cancellaion_fee['hour'] = $hour;
                $cancellaion_fee['percentage'] = $request->percentage[$key];
                $cancellaion_fee['service_location_id'] = $serviceLocation->id;
                ZoneCancellationFee::create($cancellaion_fee);
            }

        $message = trans('succes_messages.zone_cancellation_fees_added_succesfully');
        return redirect('service_location')->with('success', $message);

    }


}

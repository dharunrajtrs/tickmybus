<?php

namespace App\Transformers;

use App\Models\City;
use App\Transformers\BoardingPointsTransformer;

class CityTransformer extends Transformer {
	/**
	 * Resources that can be included if requested.
	 *
	 * @var array
	 */
	protected array $availableIncludes = [
		'boardingPoints',
	];

	/**
	 * A Fractal transformer.
	 *
	 * @param City $city
	 * @return array
	 */
	public function transform(City $city) {
		return [
			'id' => $city->id,
			'service_location_id' => $city->service_location_id,
			'name' => $city->city,
			'slug' => $city->slug,
			'short_code' => $city->short_code,
		];
	}

	/**
	 * Include the state of the city.
	 *
	 * @param City $city
	 * @return \League\Fractal\Resource\Item|\League\Fractal\Resource\NullResource
	 */
	public function includeBoardingPoints(City $city) {
		$state = $city->boardingPoints;

		return $state
		? $this->collection($state, new BoardingPointsTransformer)
		: $this->null();
	}

}

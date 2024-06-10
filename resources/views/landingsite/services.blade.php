


@include('admin.layouts.landing_header')


	<div class="main-container">
	
		<!-- Page Banner -->
		<div class="page-banner" id="service" style="background:url('{{ asset('storage/uploads/website/images/' . $data->hero_bg) }}') ;background-position: center;
        background-size: cover;">
			<!-- Container -->
			<div class="container">
				<h3>services</h3>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ url('/landing') }}">Home</a></li>
					<li class="breadcrumb-item active">services</li>
				</ol>
			</div><!-- Container /- -->
		</div><!-- Page Banner /- -->
		
		<main class="site-main">
			
			<!-- What We Do Section -->
			<div class="what-we-do-section">
				<!-- Container -->
				<div class="container">
					<!-- Section Header -->
					<div class="section-header">
						<h6>{{ ($data->service_title) }}</h6>
						<h3><b>{{ ($data->service_heading) }}</b> </h3>
					</div><!-- Section Header -->
					<div class="what-do-boxes">
						<!-- Row -->
						<div class="row">
							<div class="col-md-6 what-do-box">
								<div class="icon-content-box">
									<i><img style="border-radius: 50%;" src="{{ asset('storage/uploads/website/images/' . $data->service1_img) }}" alt="Icon" /></i>
									<h3>{{ ($data->service1_title) }}</h3>
									<p>{!! ($data->service1_para) !!}</p>
								</div>
							</div>
							<div class="col-md-6 what-do-box">
								<div class="icon-content-box">
									<i><img style="border-radius: 50%;" src="{{ asset('storage/uploads/website/images/' . $data->service2_img) }}" alt="Icon" /></i>
									<h3>{{ ($data->service2_title) }}</h3>
									<p>{!! ($data->service2_para) !!}</p>
								</div>
							</div>
							<div class="col-md-6 what-do-box">
								<div class="icon-content-box">
									<i><img style="border-radius: 50%;" src="{{ asset('storage/uploads/website/images/' . $data->service3_img) }}" alt="Icon" /></i>
									<h3>{{ ($data->service3_title) }}</h3>
									<p>{!! ($data->service3_para) !!}</p>
								</div>
							</div>
							<div class="col-md-6 what-do-box">
								<div class="icon-content-box">
									<i><img style="border-radius: 50%;" src="{{ asset('storage/uploads/website/images/' . $data->service4_img) }}" alt="Icon" /></i>
									<h3>{{ ($data->service4_title) }}</h3>
									<p>{!! ($data->service4_para) !!}</p>
								</div>
							</div>
						</div><!-- Row /- -->
						<div class="img-block">
							<img src="{{ asset($data->service_img) }}" alt="service" />
						</div>
					</div>
				</div><!-- Container /- -->
			</div><!-- What We Do Section /- -->


	<!-- Amenities Section -->
			<div class="choose-section">
            <!-- Container -->
            <div class="container">
                <!-- Section Header -->
                <div class="section-header">
                    <h6>{{ ($data->amenity_title) }}</h6>
                    <h3>{{ ($data->amenity_heading) }}</h3>
                    <p>{!! ($data->amenity_para) !!}</p>
                </div><!-- Section Header /- -->
                <div class="choose-tab">
                    <ul class="nav nav-tabs" id="choosetab" role="tablist">
                        <!-- <li class="nav-item">
                            <a class="nav-link active" id="town-tab" data-toggle="tab" href="#town" role="tab" aria-controls="town" aria-selected="true">Amenities</a>
                        </li> -->
                        <!-- <li class="nav-item">
                            <a class="nav-link" id="hybrid-tab" data-toggle="tab" href="#hybrid" role="tab" aria-controls="hybrid" aria-selected="false">Semi-Slepper</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="suv-tab" data-toggle="tab" href="#suv" role="tab" aria-controls="suv" aria-selected="false">Seater</a>
                        </li> -->
                    </ul>
                </div>
                <div class="tab-content" id="choosetab-content">
                    <div class="tab-pane fade show active" id="town" role="tabpanel" aria-labelledby="town-tab">
                        <div id="choose_1" class="choose-main">
                            <div class="choose-thumbnail owl-carousel owl-theme">
                                <div class="item" data-choose="1"><img src="{{ asset('storage/uploads/website/images/' . $data->amenity1_img) }}" alt="fan" /></div>
                                <div class="item" data-choose="2"><img src="{{ asset('storage/uploads/website/images/' . $data->amenity2_img) }}" alt="light" /></div>
                                <div class="item" data-choose="3"><img src="{{ asset('storage/uploads/website/images/' . $data->amenity3_img) }}" alt="blanket" /></div>
                                <div class="item" data-choose="4"><img src="{{ asset('storage/uploads/website/images/' . $data->amenity4_img) }}" alt="wifi" /></div>
                                <div class="item" data-choose="5"><img src="{{ asset('storage/uploads/website/images/' . $data->amenity5_img) }}" alt="pillow" /></div>
                                <div class="item" data-choose="6"><img src="{{ asset('storage/uploads/website/images/' . $data->amenity6_img) }}" alt="charge" /></div>
                                <div class="item" data-choose="6"><img src="{{ asset('storage/uploads/website/images/' . $data->amenity7_img) }}" alt="water" /></div>
                                <div class="item" data-choose="8"><img src="{{ asset('storage/uploads/website/images/' . $data->amenity8_img) }}" alt="luggage" /></div>
                                <div class="item" data-choose="9"><img src="{{ asset('storage/uploads/website/images/' . $data->amenity9_img) }}" alt="cctv" /></div>
                            </div>
                            <div class="choose-nav">
                                <div class="choose-prev"><i class="fa fa-chevron-left"></i></div>
                                <div class="choose-next"><i class="fa fa-chevron-right"></i></div>
                            </div>
                            <div class="choose-content">
                                <div id="contnet_1_dtl-1">
                                    <div class="choose-slide-content">
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <h3>{{ ($data->amenity1_title) }}</h3>
                                                <p>{!! ($data->amenity1_para) !!}</p>
                                                <div class="laguage-detail">
                                                </div>
                                            </div>
                                            <div class="col-lg-5 choose-img">
                                                <img style="width:250px;" src="{{ asset('storage/uploads/website/images/' . $data->amenity1_img) }}" alt="Image" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="contnet_1_dtl-2">
                                    <div class="choose-slide-content">
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <h3>{{ ($data->amenity2_title) }}</h3>
                                                <p>{!! ($data->amenity1_para) !!}</p>
                                                <div class="laguage-detail">
                                                </div>
                                            </div>
                                            <div class="col-lg-5 choose-img">
                                                <img style="width:250px;" src="{{ asset('storage/uploads/website/images/' . $data->amenity2_img) }}" alt="Image" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="contnet_1_dtl-3">
                                    <div class="choose-slide-content">
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <h3>{{ ($data->amenity3_title) }}</h3>
                                                <p>{!! ($data->amenity3_para) !!}</p>
                                                <div class="laguage-detail">
                                                </div>
                                            </div>
                                            <div class="col-lg-5 choose-img">
                                                <img style="width:250px;" src="{{ asset('storage/uploads/website/images/' . $data->amenity3_img) }}" alt="Image" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div id="contnet_1_dtl-4">
                                    <div class="choose-slide-content">
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <h3>{{ ($data->amenity4_title) }}</h3>
                                                <p>{!! ($data->amenity4_para) !!}</p>
                                                <div class="laguage-detail">
                                                </div>
                                            </div>
                                            <div class="col-lg-5 choose-img">
                                                <img style="width:250px;" src="{{ asset('storage/uploads/website/images/' . $data->amenity4_img) }}" alt="Image" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div id="contnet_1_dtl-5">
                                    <div class="choose-slide-content">
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <h3>{{ ($data->amenity5_title) }}</h3>
                                                <p>{!! ($data->amenity5_para) !!}</p>
                                                <div class="laguage-detail">
                                                </div>
                                            </div>
                                            <div class="col-lg-5 choose-img">
                                                <img style="width:250px;" src="{{ asset('storage/uploads/website/images/' . $data->amenity5_img) }}" alt="Image" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div id="contnet_1_dtl-6">
                                    <div class="choose-slide-content">
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <h3>{{ ($data->amenity6_title) }}</h3>
                                                <p>{!! ($data->amenity6_para) !!}</p>
                                                <div class="laguage-detail">
                                                </div>
                                            </div>
                                            <div class="col-lg-5 choose-img">
                                                <img style="width:250px;" src="{{ asset('storage/uploads/website/images/' . $data->amenity6_img) }}" alt="Image" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div id="contnet_1_dtl-7">
                                    <div class="choose-slide-content">
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <h3>{{ ($data->amenity7_title) }}</h3>
                                                <p>{!! ($data->amenity7_para) !!}</p>
                                                <div class="laguage-detail">
                                                </div>
                                            </div>
                                            <div class="col-lg-5 choose-img">
                                                <img style="width:250px;" src="{{ asset('storage/uploads/website/images/' . $data->amenity7_img) }}" alt="Image" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div id="contnet_1_dtl-8">
                                    <div class="choose-slide-content">
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <h3>{{ ($data->amenity8_title) }}</h3>
                                                <p>{!! ($data->amenity8_para) !!}</p>
                                                <div class="laguage-detail">
                                                </div>
                                            </div>
                                            <div class="col-lg-5 choose-img">
                                                <img style="width:250px;" src="{{ asset('storage/uploads/website/images/' . $data->amenity8_img) }}" alt="Image" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div id="contnet_1_dtl-9">
                                    <div class="choose-slide-content">
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <h3>{{ ($data->amenity9_title) }}</h3>
                                                <p>{!! ($data->amenity9_para) !!}</p>
                                                <div class="laguage-detail">
                                                </div>
                                            </div>
                                            <div class="col-lg-5 choose-img">
                                                <img style="width:250px;" src="{{ asset('storage/uploads/website/images/' . $data->amenity9_img) }}" alt="Image" />
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                   
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- Container /- -->
        </div><!-- Amenities Section  end/- -->
			
		
			
			
			
			    <!-- App Counter Section -->
				<div class="app-counter-section">
            <!-- Container -->
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-md-5">
                        <div class="mobile-app">
                            <!-- Section Header -->
                            <div class="section-header section-header-left">
                            <h6>{{ ($data->dwnld_heading) }}</h6>
                                <h3><b>{{ ($data->dwnld_title) }}</b></h3>
                            </div>
                            <!-- Section Header /- -->
                            <p>{!! ($data->dwnld_para) !!}</p>
                            <h5>{{ ($data->dwnld_title1) }}</h5>
                            <p>{!! ($data->dwnld_para1) !!}</p>
                            <h5>User</h5>
                            <a href="{{ ($data->dwnld_playstore) }}"><img src="{{ asset('assetswebsite/images/play-store.png') }}" alt="Play Store" /></a>
                            <a href="{{ ($data->dwnld_appstore) }}"><img src="{{ asset('assetswebsite/images/app-store.png') }}" alt="App Store" /></a> <br>
                            <h5>Driver</h5>
                            <a href="{{ ($data->dwnld1_playstore) }}"><img src="{{ asset('assetswebsite/images/play-store.png') }}" alt="Play Store" /></a>
                            <a href="{{ ($data->dwnld1_appstore) }}"><img src="{{ asset('assetswebsite/images/app-store.png') }}" alt="App Store" /></a>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div id="counter_section-1" class="counter-block">
                            <div class="row">
                                <div class="col-6">
                                    <div class="counter-box">
                                        <i><img src="{{ asset('assetswebsite/images/counter-icon-1.png') }}" alt="Counter" /></i>
                                        <!-- <span id="statistics_1_count-1" data-fact="1600"></span> -->
                                        <h5>Download</h5>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="counter-box">
                                        <i><img src="{{ asset('assetswebsite/images/counter-icon-2.png') }}" alt="Counter" /></i>
                                        <!-- <span id="statistics_1_count-2" data-fact="1200"></span> -->
                                        <h5>Login</h5>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="counter-box">
                                        <i><img src="{{ asset('assetswebsite/images/counter-icon-3.png') }}" alt="Counter" /></i>
                                        <!-- <span id="statistics_1_count-3" data-fact="450"></span> -->
                                        <h5>Book a Bus</h5>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="counter-box">
                                        <i><img src="{{ asset('assetswebsite/images/counter-icon-4.png') }}" alt="Counter" /></i>
                                        <!-- <span id="statistics_1_count-4" data-fact="218"></span> -->
                                        <h5>Ride</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container /- -->
            <!-- <div class="mobile-img">
                <img src="{{ asset('assetswebsite/images/mobile-app.png') }}" alt="Mobile" />
            </div> -->
        </div><!-- App Counter Section /- -->

			<!-- callout Section -->
			<!-- <div class="callout-section"> -->
				<!-- Container -->
				<!-- <div class="container">
					<div class="callout-detail">
						<h3>the great bus offer available now! Luxury Bus </h3>
						<h6>CALL US : <a href="tel:18001234567">1800 123 4567</a></h6>
						<a href="#" title="Book Now">Book Now</a>
					</div> 
				</div>  -->
				<!-- Container /- -->
			<!-- </div> -->
			<!-- callout Section /- -->
			
		</main>
		
	</div>
	



@extends('admin.layouts.landing_footer')

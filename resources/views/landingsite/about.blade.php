{{--



@include('admin.layouts.landing_header')


	<div class="main-container">

		<!-- Page Banner -->
		<div class="page-banner" id="about" style="background:url('{{ asset('storage/uploads/website/images/' . $data->hero_bg) }}') ;background-position: center;
        background-size: cover;">
			<!-- Container -->
			<div class="container">
				<h3>About Us</h3>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ url('/landing') }}">Home</a></li>
					<li class="breadcrumb-item active">About</li>
				</ol>
			</div><!-- Container /- -->
		</div><!-- Page Banner /- -->

		<main class="site-main">

			<!-- About Section -->
			<div class="about-section">
				<!-- Container -->
				<div class="container">
					<!-- Row -->
					<div class="row">
						<div class="col-lg-6 col-md-12">
							<div class="about-content">
								<!-- Section Header -->
								<div class="section-header section-header-left">
									<h6>{{ ($data->about_title) }}</h6>
									<h3><b>{{ ($data->about_us) }}</b></h3>
								</div><!-- Section Header -->
								<p><i>{!! ($data->about_para) !!}</i></p>
								<!-- <p>Sed non mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiamtorquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam</p>
								<p>Sed non mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiamtorquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam</p>
								<p>Sed non mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiamtorquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam</p> -->
								<!-- <a href="#" title="Read More">Read More</a> -->
							</div>
						</div>
						<div class="col-lg-6 about-img">
							<img src="{{ asset('storage/uploads/website/images/' . $data->about_img) }}" alt="About" />
						</div>
					</div><!-- Row /- -->
				</div><!-- Container /- -->
			</div><!-- About Section /- -->



			<!-- Team Section -->
			<div class="team-section team-section-2">
				<!-- Container -->
				<div class="container">
					<!-- Section Header -->
					<div class="section-header">
						<h6>{{ ($data->driver_title) }}</h6>
						<h3><b>{{ ($data->driver_heading) }}</b></h3>
					</div><!-- Section Header -->
					<!-- Row -->
					<div class="row">
						<div class="col-lg-3 col-sm-6">
							<div class="team-box">
								<img src="{{ asset('storage/uploads/website/images/' . $data->driver1_img) }}" alt="Team" />
								<div class="team-detail">
									<p>{{ ($data->driver1) }}</p>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6">
							<div class="team-box">
								<img src="{{ asset('storage/uploads/website/images/' . $data->driver2_img) }}" alt="Team" />
								<div class="team-detail">
									<p>{{ ($data->driver2) }} <span></span></p>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6">
							<div class="team-box">
								<img src="{{ asset('storage/uploads/website/images/' . $data->driver3_img) }}" alt="Team" />
								<div class="team-detail">
									<p>{{ ($data->driver3) }} <span></span></p>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6">
							<div class="team-box">
								<img src="{{ asset('storage/uploads/website/images/' . $data->driver4_img) }}" alt="Team" />
								<div class="team-detail">
									<p>{{ ($data->driver4) }} <span></span></p>
								</div>
							</div>
						</div>
					</div><!-- Row /- -->
				</div><!-- Container -->
			</div><!-- Team Section /- -->


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
							<img src="{{ asset('storage/uploads/website/images/' . $data->service_img) }}" alt="service" />
						</div>
					</div>
				</div><!-- Container /- -->
			</div><!-- What We Do Section /- -->

			<!-- callout Section -->
			<div class="callout-section" style="background:url('{{ asset('storage/uploads/website/images/' . $data->banner_bg) }}') ;background-position: center;
        background-size: cover;">
				<!-- Container -->
				<div class="container" >
					<div class="callout-detail">
						<h3>{{ ($data->banner_title) }} </h3>
						<h2 class="text-white">{{ ($data->banner_heading) }}</h2>
						<a href="#" title="Book Now">Book Now</a>
					</div>
				</div><!-- Container /- -->
			</div><!-- callout Section /- -->


		</main>

	</div>


	@extends('admin.layouts.landing_footer') --}}

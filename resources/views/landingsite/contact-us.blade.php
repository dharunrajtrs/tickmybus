

@include('admin.layouts.landing_header')

<style>
	.map-container{
  overflow:hidden;
  /* padding-bottom:56.25%; */
  position:relative;
  /* height:0; */
}
.map-container iframe{
  left:0;
  top:0px;
  height:100%;
  width:100%;
  position:absolute;
}
</style>
	<div class="main-container" >

		<!-- Page Banner -->
		<div class="page-banner" style="background:url('{{ asset('storage/uploads/website/images/' . $data->hero_bg) }}') ;background-position: center;
        background-size: cover;">
		<!-- <img src="{{url(asset($data->hero_bg)) }}}}" alt="Description of the image"> -->
			<!-- Container -->
			<div class="container" >
				<h3>Contact <span>Us</span></h3>
				<ol class="breadcrumb" >
					<li class="breadcrumb-item"><a href="{{ url('/landing') }}">Home</a></li>
					<li class="breadcrumb-item active">Contact us</li>
				</ol>
			</div><!-- Container /- -->
		</div><!-- Page Banner /- -->

		<main class="site-main">

			<!-- Contact Section -->
			<div class="contact-section">
				<!-- Container -->
				<div class="container" >
					<!-- Row -->
					<div class="row" >
						<div class="col-md-4 col-sm-6 col-12">
							<div class="contact-box">
								<i class="fa fa-phone" aria-hidden="true"></i>
								<h2>Phone</h2>
								<p>{{ ($data->phone) }}</p>
								<!-- <p>Phone : <a href="tel:18001234568">1234567890</a></p> -->
							</div>
						</div>
						<div class="col-md-4 col-sm-6 col-12">
							<div class="contact-box">
								<i class="fa fa-map-marker" aria-hidden="true"></i>
								<h2>Address</h2>
								<p>{{ ($data->address) }}</p>
							</div>
						</div>
						<div class="col-md-4 col-sm-6 col-12">
							<div class="contact-box">
								<i class="fa fa-envelope-o" aria-hidden="true"></i>
								<h2>Email</h2>
								<p>{{ ($data->email) }}</p>
								<!-- <p><a href="mailto:support@example.com">support@example.com</a></p> -->
							</div>
						</div>
					</div><!-- Row /- -->
				</div><!-- Container /- -->
			</div><!-- Contact Section /- -->

			<!-- Contact Form -->
			<div class="contact-form">
				<!-- Container -->
				<div class="container">
					<h3>{{ ($data->form_title) }}</h3>
					<div class="row">
						<div class="col-md-6">
							<form class="row">
								<div class="col-md-12 form-group">
									<input type="text" class="form-control" placeholder="Name" name="contact-name" id="input_name">
								</div>
								<div class="col-md-12 form-group">
									<input type="text" class="form-control" placeholder="Email" name="contact-email" id="input_email">
								</div>
								<div class="col-md-12 form-group">
									<input type="text" class="form-control" placeholder="Subject" name="contact-subject" id="input_subject">
								</div>
								<div class="col-md-12 form-group">
									<textarea class="form-control" placeholder="Your Message" rows="6" name="textarea-message" id="textarea_message"></textarea>
								</div>
								<div class="col-md-12 form-group">
									<button id="btn_submit" name="submit" class="submit">submit now</button>
								</div>
								<div id="alert-msg" class="alert-msg"></div>
							</form>
						</div>
						<div class="col-md-6">
							<img src="{{ asset('storage/uploads/website/images/' . $data->form_img) }}" alt="contact-car">
						</div>
					</div>
				</div><!-- Container -->
			</div><!-- Contact Form /- -->
{{--
			<!--Google map-->
<div id="map-container-google-1" class="z-depth-1-half map-container" style="height: 400px">
  <iframe src="{{ ($data -> map) }}" frameborder="0"
    style="border:0" allowfullscreen></iframe>
</div>



<!--Google Maps-->
--}}

		</main>

	</div>


@extends('admin.layouts.landing_footer')

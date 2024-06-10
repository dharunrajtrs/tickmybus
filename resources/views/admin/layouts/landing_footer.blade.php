


     



<!-- Footer Section -->
<div class="footer-section">
		<!-- Footer Widget -->
		<div class="footer-widget">
			<!-- Container -->
			<div class="container">			
				<!-- Row -->
				<div class="row">
					<div class="col-lg-4 col-md-6">
						<!-- Widget : About -->
						<aside class="widget widget_about">
							<h3 class="widget-title">{{ $headers->footer_about_title }}</h3>
							<p>{!! $headers->footer_about_para !!}</p>
							<!-- <ul>
								<li><a href="#" title="Facebook"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#" title="Twitter"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#" title="Google+"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#" title="Instagram"><i class="fa fa-instagram"></i></a></li>
								<li><a href="#" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
							</ul> -->
							<div class="download-app">
								<h4>Download Now:</h4>
								<h4>User</h4>
								<ul>
									<li><a href="{{ $headers->user_play_link }}" target="_blank" title="Apple"><i class="fa fa-android"></i></a></li>
									<li><a href="{{ $headers->user_app_link }}" target="_blank" title="Android"><i class="fa fa-apple"></i></a></li>
									<!-- <li><a href="#" title="Windows"><i class="fa fa-windows"></i></a></li> -->
								</ul>
								<h4>Driver</h4>
								<ul>
									<li><a href="{{ $headers->driver_play_link }}" target="_blank" title="Apple"><i class="fa fa-android"></i></a></li>
									<li><a href="{{ $headers->driver_app_link }}" target="_blank" title="Android"><i class="fa fa-apple"></i></a></li>
									
								</ul>
							</div>
						</aside><!-- Widget : About /- -->
					</div>
					
					<div class="col-lg-4 col-md-6">
						<!-- Widget: Pages -->
						<aside id="pages" class="widget widget_pages">
							<h3 class="widget-title">Quick Links</h3>
							<ul>
								<li class="page_item"><a href="{{ url('privacy-policy') }}">Privacy Policy</a></li>
								<li class="page_item"><a href="{{ url('terms') }}">Terms & Conditions</a></li>
								<li class="page_item"><a href="{{ url('/contacts') }}">Contact Us</a></li>
								<!-- <li class="page_item"><a href="#">Quick and reliable service</a></li>
								<li class="page_item"><a href="#">Automated Billing</a></li> -->
							</ul>
						</aside><!-- Widget: Pages /- -->
					</div>
					<div class="col-lg-4 col-md-6">
						<!-- Widget : Info -->
						<aside class="widget widget_info">
							<h3 class="widget-title">Info</h3>
							<p>{!! $headers->footer_info_para !!} </p>
							<p><i class="icon icon-Phone2"></i> mobile : <a href="tel:2345678190">{{ $headers->footer_info_mobile }}</a></p>
							<p><i class="icon icon-Mail"></i> Email : <a href="mailto:info@example.com">{{ $headers->footer_info_email }}</a></p>
							<!-- <p><i class="icon icon-Time"></i> Working Hours : </p> -->
							
							<!-- Widget : Newsletter -->
							<!-- <aside class="widget widget_newsletter">
								<h3 class="widget-title">SUBCRIBE :</h3>
								<form method="get" class="searchform" action="#">
									<div class="input-group">
										<input name="email" placeholder="Enter Email..." class="form-control" required="" type="text"/>
										<span class="input-group-btn">
											<button class="btn btn-default" type="submit"><i class="fa fa-paper-plane"></i></button>
										</span>
									</div>
								</form>
							</aside> -->
							<!-- Widget : Newsletter /- -->
						</aside><!-- Widget : Info /- -->
					</div>
				</div><!-- Row /- -->
			</div><!-- Container /- -->
		</div><!-- Footer Widget /- -->
		<div class="bottom-footer">
			<!-- Container -->
			<div class="container">
				<div class="ftr-content">
					<!-- <ul>
						<li><a href="#" title="Faq">Faq</a></li>
						<li><a href="#" title="News">News</a></li>
						<li><a href="#" title="Client Support">Client Support</a></li>
					</ul> -->
					<p>&copy; Copyright {{ $headers->footer_copy_rights }} . All Rights reserved</p>
			
				</div>
			</div><!-- Container /- -->
		</div>
	</div><!-- Footer Section /- -->



	@include('admin.layouts.landing_scripts')
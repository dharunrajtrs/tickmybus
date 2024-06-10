@include('admin.layouts.landing_header')

	<div class="main-container">
	
		<!-- Page Banner -->
		<div class="page-banner" style="background:url('{{ asset('storage/uploads/website/images/' . $data->hero_bg) }}') ;background-position: center;
        background-size: cover;">
			<!-- Container -->
			<div class="container">
				<h3>Privacy-Policy</h3>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Home</a></li>
					<li class="breadcrumb-item active">Privacy-Policy</li>
				</ol>
			</div><!-- Container /- -->
		</div><!-- Page Banner /- -->
		
		<main class="site-main p-5">
			<div class="container">
                <!-- <h1>PRIVACY POLICY</h1>
                <p>The Scope of This Policy</p><br>
                <p>This policy applies to all tyt users, 
                including Riders and Drivers (including Driver applicants), 
                and to all tyt platforms and services, including our apps, websites, 
                features, and other services (collectively, the “tyt Platform”). 
                Please remember that your use of the tyt Platform is also subject to our Terms of Service.</p>
                <p>The Information We Collect</p>
                <p>When you use the tyt Platform, we collect the information you provide, usage information, and information about your device. We also collect information about you from other sources like third-party services, and optional programs in which you participate, which we may combine with other information we have about you. Here are the types of information we collect about you:</p>
                <p>A. Information You Provide to Us</p>
                <p>Account Registration. When you create an account with tyt, we collect the information you provide us, such as your name, email address, phone number, birth date, and payment information. You may choose to share additional info with us for your Rider profile, like your photo or saved addresses (e.g., home or work), and set up other preferences (such as your preferred pronouns).</p>
                <p><b>Driver Information.</b>  If you apply to be a Driver, we will collect the information you provide in your application, including your name, email address, phone number, birth date, profile photo, physical address, government identification number (such as social security number), driver’s license information, vehicle information, and car insurance information. We collect the payment information you provide us, including your bank routing numbers, and tax information. Depending on where you want to drive, we may also ask for additional business license or permit information or other information to manage driving and programs relevant to that location. We may need additional information from you at some point after you become a Driver, including information to confirm your identity (like a photo).</p>
                <p><b>SOS Contact Information</b>  We will collect the contact list permission to list the contacts while adding the sos contacts for user & driver app</p>
                <p><b>Ratings and Feedback.</b>  When you rate and provide feedback about Riders or Drivers, we collect all of the information you provide in your feedback.</p>
                <p><b>Communications.</b>  When you contact us or we contact you, we collect any information that you provide, including the contents of the messages or attachments you send us.</p>
                <p>B. Information We Collect When You Use the tyt Platform</p> -->

                {!! ($data -> privacy )  !!}
            </div>
				
		</main>
		
	</div>
	
	@extends('admin.layouts.landing_footer')


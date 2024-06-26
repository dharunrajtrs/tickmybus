<!-- Standard Favicon -->
<link rel="icon" type="image/x-icon" href="{{ asset('storage/uploads/website/images/' . $headers->fevicon) }}" />
	
	<!-- For iPhone 4 Retina display: -->
	<link rel="apple-touch-icon-precomposed" href="{{ asset('assetswebsite/images/apple.png') }}">
	
	<!-- For iPad: -->
	<link rel="apple-touch-icon-precomposed" href="{{ asset('assetswebsite/images/apple1.png') }}">
	
	<!-- For iPhone: -->
	<link rel="apple-touch-icon-precomposed" href="{{ asset('assetswebsite/images/apple1.png') }}">	
	
	<!-- Library - Google Font Familys -->
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet" />
	
	<link rel="stylesheet" type="text/css" href="{{ asset('assetswebsite/revolution/css/settings.css') }}">
	<!-- Library -->
    <link href="{{ asset('assetswebsite/css/lib.css') }}" rel="stylesheet">

	<!-- Custom - Common CSS -->
	<link rel="stylesheet" href="{{ asset('assetswebsite/css/rtl.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assetswebsite/css/style.css') }}">

	<style>  

	/* [Layout] */

/*----------
	
	## Font List		
		- font-family: Arial, Helvetica, sans-serif;
		- font-family: 'Playfair Display', serif;

	## Global
		- Padding/Margin
		- Section Padding

	## Site Header
	
	## Responsive
		- min-width: 1200
		- min-width: 992
		- min-width: 768
		- min-width: 576
		- max-width: 1199
		- min to max: 992 to 1199
		- max-width: 991
		- min to max: 768 to 991
		- max-width: 767
		- min to max: 576 to 767
		- max-width: 639
		- max-width: 575
		- max-width: 479
		
----------*/

/* ## Global ******************************************* */

:root{
	--themecolor: #03314B;
	--footerbg:#000000;
	--btntext:#ffffff;
	--heading:#e4af3a;
	--textwhite:#ffffff;
}

body {
	font-family: Arial, Helvetica, sans-serif; 
	font-size: 14px;
	color: #000000;
	overflow-x: hidden;
	position: relative;
}
img {
    max-width: 100%;
	height: auto;
}
a {
    outline: 0 !important;
}
h1,h2,h3,h4,h5,h6,p,a,li,span {
	word-wrap: break-word;
}

/* ========================================================================== */
/* ========================================================================== */
							/* [ + Plugins ] */
/* ========================================================================== */
/* ========================================================================== */
/*
	[Table of contents]

	## Site Loader
	
*/

/* ## Site Loader */
.load-position .logo {
	margin: 0 auto;
	width: 150px;
}
.load-complete .line-scale {
	margin: 0 auto;
	display: block;
	top: 50%;
	position: absolute;
	left: 0;
	right: 0;
	text-align: center;
}
.load-complete .line-scale > div {
	display: inline-block;
	border-color: #03314B #03314B transparent; 
	background-color:<?php echo $headers->theme_color ?>;
}
.load-complete {
    position: fixed;
    background: #fff;
    width: 100%;
    height: 100%;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    z-index: 1031;
}
.load-complete .logo {
	color: #4C4C4C;
	text-align: center;
	display: block;
	margin-bottom: 20px;
	font-family: 'Roboto', sans-serif;
	font-size: 50px;
}
.load-complete .load-position h6 {
    text-align: center;
    color: #000;
    font-size: 12px;
	font-weight: 400;
	font-style: italic;
}
.load-complete .load-position {
    position: absolute;
    top: 50%;
    left: 0;
    z-index: 999;
    right: 0;
    margin-top: -100px;
}
.load-complete .loading {
    position: absolute;
    width: 100%;
    height: 1px;
    margin: 20px auto;
    left: 0;
    right: 0;
}
.load-complete .loading-line {
    position: absolute;
    background: #eee;
    width: 100%;
    height: 2px;
}
.load-complete .loading-break {
    position: absolute;
    background: #059664;
    width: 15px;
    height: 2px;
}
.load-complete .loading-dot-1 {
    -webkit-animation: loading 2s infinite;
    -moz-animation: loading 2s infinite;
    -ms-animation: loading 2s infinite;
    -o-animation: loading 2s infinite;
    animation: loading 2s infinite;
}
.load-complete .loading-dot-2 {
    -webkit-animation: loading 2s 0.5s infinite;
    -moz-animation: loading 2s 0.5s infinite;
    -ms-animation: loading 2s 0.5s infinite;
    -o-animation: loading 2s 0.5s infinite;
    animation: loading 2s 0.5s infinite;
}
.load-complete .loading-dot-3 {
    -webkit-animation: loading 2s 1s infinite;
    -moz-animation: loading 2s 1s infinite;
    -ms-animation: loading 2s 1s infinite;
    -o-animation: loading 2s 1s infinite;
    animation: loading 2s 1s infinite;
}
@keyframes "loading" {
    from {
        left: 0;
    }
    to {
        left: 100%;
    }
}
@-moz-keyframes loading {
    from {
        left: 0;
    }
    to {
        left: 100%;
    }
}
@-webkit-keyframes "loading" {
    from {
        left: 0;
    }
    to {
        left: 100%;
    }
}
@-ms-keyframes "loading" {
    from {
        left: 0;
    }
    to {
        left: 100%;
    }
}
@-o-keyframes "loading" {
    from {
        left: 0;
    }
    to {
        left: 100%;
    }
}

/* ========================================================================== */
/* ========================================================================== */
							/* [ + Plugins Over ] */
/* ========================================================================== */
/* ========================================================================== */

/* --------------------------------------------------------------------------------------------------------------------------------------------*/

/* ========================================================================== */
/* ========================================================================== */
							/* [ + Elements ] */
/* ========================================================================== */
/* ========================================================================== */

/*
	+ Header
		- Menu Block
	+ Footer
		- Footer Widget
		- Bottom Footer
	+ Page Banner
	+ Pagination
	+ Menu Search
	+ Section Header
	+ Shortcodes
		- Slider Section
		- About Section
		- What We Do Section
		- Book Taxi Section
		- Book Taxi 2
		- Amenities Section
		- Testimonial Section
		- Team Section
		- Callout Section
		- App Counter Section
		- Blog
		- Blog Single
			- Comment Area
			- Comment Reply Form
		- Miscellaneous Section
		- Faq section
		- Choose Section
		- Contact Section
		- Contact Form
		- Map Section
		- Error Section

*/

/* + Header */
.header_s {
	position: relative;
}
.header_s.fixed-top { 
	position: fixed;
	top: 0;
}
.header_s1 .top-header {
	background-color: #000000;
	position: relative;
}
.header_s .top-header .cnt-detail {
	color: #fff;
	position: relative;
}
.header_s .top-header .cnt-detail > p {
	font-size: 13px;
	margin: 12px 0 10px;
	letter-spacing: 0.52px;
	vertical-align: middle;
}
.header_s .top-header .cnt-detail > p > i {
	font-size: 16px;
	margin-right: 8px;
	vertical-align: middle; 
}
.header_s .top-header .cnt-detail > p > i,
.header_s .top-header .cnt-detail > p > a:hover {
	color: <?php echo $headers->theme_color ?>;
}
.header_s .top-header .cnt-detail > p > a {
	color: #fff;
	text-decoration: none;
}
.header_s .top-header .cnt-detail > ul {
	margin-bottom: 0;
	margin-left: auto;
	margin-right: 0;
	padding: 0;
}
.header_s .top-header .cnt-detail > ul li {
	display: inline-flex;
	margin: 11px 5px 10px;
}
.header_s .top-header .cnt-detail > ul li a {
	color: #fff;
	-webkit-transition: all 1s ease 0s;
	-moz-transition: all 1s ease 0s;
	-o-transition: all 1s ease 0s;
	transition: all 1s ease 0s;
}
.header_s .top-header .cnt-detail > ul li a:hover {
	color: <?php echo $headers->theme_color ?>;
}

/* - Menu Block */
.header_s .menu-block .ownavigation .container {
	position: relative;
}
.header_s .menu-block .ownavigation a.navbar-brand {
	color: #29292b;
	display: inline-block;
	font-size: 34px;
	font-weight: 900;
	letter-spacing: 1.36px;
	line-height: 1.3;
	text-transform: uppercase;
	text-decoration: none;
	position: relative;
	z-index: 1;
	padding: 33px 70px 33px 30px;
	margin: 3px;
}
.header_s .menu-block .ownavigation a.navbar-brand::before {
	background-image: url("assets/images/logo-bg.png");
	background-repeat: no-repeat;
	background-position: right;
	background-size: cover;
	content: "";
	position: absolute;
	left: 0;
	right: 0;
	top: 0;
	bottom: 0;
	z-index: -1;
}
.header_s .menu-block .ownavigation a.navbar-brand.image-logo {
	padding: 24px 119px 24px 65px;
	margin: 3px;
}
.header_s .menu-block .ownavigation .navbar-nav li a {
	color: #ffffff;
	font-size: 14px;
	font-weight: 900;
	letter-spacing: 0.56px;
	line-height: 2;
	text-transform: uppercase;
	-webkit-transition: all 0.5s ease 0s;
	-moz-transition: all 0.5s ease 0s;
	-o-transition: all 0.5s ease 0s;
	transition: all 0.5s ease 0s;
}
.header_s .menu-block .ownavigation .navbar-nav > li > a {
	font-family: 'Playfair Display', serif;
}
.header_s .menu-block .ownavigation .navbar-nav > .active > a, 
.header_s .menu-block .ownavigation .navbar-nav > .active > a:focus, 
.header_s .menu-block .ownavigation .navbar-nav > .active > a:hover, 
.header_s .menu-block .ownavigation .navbar-nav > li:hover > a, 
.header_s .menu-block .ownavigation .navbar-nav > li > a:hover {
	color: #fff;
}
.header_s .menu-block .ownavigation .navbar-nav > li.dropdown .dropdown-menu > li > a {
	color: #222;
	font-size: 13px;
	font-weight: bold;
	letter-spacing: 0.52px;
}
.header_s.fixed-top .top-header {
	display: none;
}
.header_s.fixed-top .menu-search {
	display: none;
}

/* + Footer */
/* - Footer Widget */
.footer-section .footer-widget {
	background-color: <?php echo $headers->footer_bg_color ?>;
	padding-bottom: 60px;
	padding-top: 77px;
}
.footer-section .container {
	position: relative;
}
/* - Bottom Footer */
.bottom-footer {
	background-color: #222;
	padding: 19px 0;
}
.bottom-footer .ftr-content ul {
	display: inline-block;
	max-width: 100%;
	padding: 0;
	text-align: center;
	width: 100%;
}
.bottom-footer .ftr-content ul li {
	display: inline-block;
}
.bottom-footer .ftr-content ul li::before {
	content: "|";
	color: var(--textwhite);
	font-size: 13px;
	padding: 0 8px 0 5px;
}
.bottom-footer .ftr-content ul li:first-child::before {
	display: none;
}
.bottom-footer .ftr-content ul li a {
    color: var(--textwhite);
    display: inline-block;
    font-size: 13px;
	letter-spacing: 0.52px;
	text-transform: capitalize;
	text-decoration: none;
	-webkit-transition: all 1s ease 0s;
	-moz-transition: all 1s ease 0s;
	-o-transition: all 1s ease 0s;
	transition: all 1s ease 0s;
}
.bottom-footer .ftr-content ul li a:hover {
	color: <?php echo $headers->theme_color ?>;
}
.bottom-footer .ftr-content p {
	color: var(--textwhite);
	margin-bottom: 0;
	text-align: center;
	width: auto;
	letter-spacing: 0.52px;
}

/* + Page Banner */
.page-banner {
	background-image: url("assets/images/contact.jpg");
	background-repeat: no-repeat;
	background-size: cover;
	padding-bottom: 77px;
	padding-top: 77px;
	position: relative;
}
#about{
	background-image: url("assets/images/about.jpeg");
	background-repeat: no-repeat;
	background-size: cover;
}
#service{
	background-image: url("assets/images/service.jpeg");
	background-repeat: no-repeat;
	background-size: cover;
}
.page-banner::before{
	background-color: rgba(0,0,0,0.75);
	bottom: 0;
	content: "";
	display: inline-block;
	left: 0;
	position: absolute;
	right: 0;
	top: 0;
}
.page-banner .container > h3 {
	color: #fff;
	text-align: center;
	font-family: 'Playfair Display', serif;
	font-size: 36px;
	font-weight: bold;
	letter-spacing: 1.44px;
	line-height: 1;
	text-transform: uppercase;
	position: relative;
	margin-bottom: 17px;
}
.page-banner .container > .breadcrumb {
	background-color: transparent;
	position: relative;
	margin-bottom: 0;
	padding: 0;
	justify-content: center;
}
.page-banner .container > .breadcrumb > li.breadcrumb-item {
	font-family: 'Roboto', sans-serif;
	font-weight: bold;
	text-transform: uppercase;
	letter-spacing: 0.35px;
}
.page-banner .container > .breadcrumb > .breadcrumb-item > a {
	color: #fff;
	text-decoration: none;
}
.page-banner .container > .breadcrumb > .breadcrumb-item.active {
	color:<?php echo $headers->heading_color ?>;
}
.page-banner .container > .breadcrumb .breadcrumb-item  + .breadcrumb-item::before {
	padding-left: 4px;
	padding-right: 4px;
	color: #fff;
}

/* + Pagination */
.pagination {
	margin-top: 39px;
}
.pagination .screen-reader-text {
	display: none;
}
.pagination .nav-links .page-numbers {
	border: 1px solid <?php echo $headers->theme_color ?>;
	border-radius: 50%;
	color: #222;
	display: inline-block;
	font-size: 11.01px;
	font-weight: 500;
	margin: 0 2px;
	padding: 10px 15px;
	text-decoration: none;
	vertical-align: middle;
	text-transform: uppercase;
	min-width: 30px;
	min-height: 30px;
}
.pagination .nav-links .page-numbers.current {
	background-color: <?php echo $headers->theme_color ?>;
	border-color: transparent;
	color: #fff;
}
.pagination .nav-links .page-numbers.prev,
.pagination .nav-links .page-numbers.next {
	font-size: 0;
	border: none;
	color: <?php echo $headers->theme_color ?>;
	padding-left: 5px;
	padding-right: 5px;
}
.pagination .nav-links .page-numbers.prev i,
.pagination .nav-links .page-numbers.next i {
	font-size: 14.16px;;
}

.page-content {
	padding-bottom: 100px;
	padding-top: 100px;
}

/* + Menu Search */
.menu-search {
	display: inline-flex;
	position: relative;
}
.menu-search > a {
    color: #000;
	font-size: 18px;
	font-weight: bold;
    height: 25px;
    line-height: 1;
    text-align: center;
    text-decoration: none;
    width: 25px;
}
.menu-search .search.collapsed .sr-ic-open,
.menu-search .search .sr-ic-close {
	display: inline-block;
}
.menu-search .search.collapsed .sr-ic-close {
	display: none;
}
.menu-search .search .sr-ic-open {
	display: none;
}
.header_s .search-box span i {
    color: #fbc02d;
}

/* + Section Header */
.section-header {
	display: inline-block;
	position: relative;
	width: 100%;
	margin-bottom: 18px;
	text-align: center;
}
.section-header h6 {
	color: <?php echo $headers->heading_color ?>;
	font-size: 13px;
	font-weight: bold;
	letter-spacing: 0.52px;
	line-height: 1.5;
	text-transform: uppercase;
	margin-bottom: 0;
}
.section-header h3 {
	color: #222;
	font-family: 'Playfair Display', serif;
	font-size: 36px;
	font-weight: 400;
	line-height: 1.25;
	letter-spacing: 1.44px;
	margin-bottom: 0;
	position: relative;
	text-transform: uppercase;
}
.section-header p {
	color: #909090;
	font-size: 13px;
	line-height: 1.846;
	margin-bottom: 0;
	margin-top: 15px;
	padding: 0 20%;
}

.section-header.section-header-left {
	text-align: left;
}
.section-header.section-header-left > p { 
	padding: 0;
}

.section-header.section-header-white h3 {
	color: #fff;
}

/* + Shortcodes */
/* - Slider Section */
.slider-section {
	direction: ltr;
}
#taxi-1.rev_slider ul li::before {
	background-color: rgba(0,0,0,0.65) !important;
	bottom: 0 !important;
	content: "" !important;
	left: 0 !important;
	position: absolute !important;
	right: 0 !important;
	top: 0 !important;
  	visibility: visible !important;
  	z-index: 1;
}
#taxi-1 .silde-title span {
    color: #b7e3fd;
}
#taxi-1 .rev-btn.slide-btn {
    background-color: <?php echo $headers->theme_color ?> !important;
    color: <?php echo $headers->btn_color ?> !important;
}
#taxi-1 .rev-btn.slide-btn:hover {
    background-color: #fff !important;
    color: #000 !important;
}
#taxi-1 .hesperiden .tp-bullet {
    background: transparent;
    border-radius: 50%;
    width: 13px;
    height: 13px;
    border: 1px solid #ffffff;
}
#taxi-1 .hesperiden .tp-bullet.selected {
    background-color: #ffffff;
    border-color: transparent;
}
#taxi-1 .hesperiden .tp-bullet::after {
    display: none;
}
#taxi-2.rev_slider ul li::before {
	background-color: rgba(0,0,0,0.52) !important;
	bottom: 0 !important;
	content: "" !important;
	left: 0 !important;
	position: absolute !important;
	right: 0 !important;
	top: 0 !important;
  	visibility: visible !important;
  	z-index: 1;
}
#taxi-2 .silde-title span {
    color: <?php echo $headers->theme_color ?>;
}
#taxi-2 .slider-form {
    padding: 0 15px !important;
}
#taxi-2 .slider-form .form-inner {
    display: flex !important;
    flex-wrap: wrap !important;
}
#taxi-2 .slider-form .contact-detail {
    flex: 0 0 25% !important;
    max-width: 25% !important;
    color: #fff !important;
    padding: 0 15px !important;
    white-space: normal;
}
.slider-form .contact-detail h3 {
    color: #fff !important;
    font-size: 18px !important;
    line-height: 1.333 !important;
    letter-spacing: 0.72px !important;
    font-family: Arial !important;
}
#taxi-2 .slider-form .contact-detail p {
    color: #fff !important;
    font-size: 13px !important;
    line-height: 1.846 !important;
    letter-spacing: 0.52px !important;
    font-family: Arial !important;
}
#taxi-2 .slider-form form {
    flex: 0 0 100% !important;
    max-width: 100% !important;
    display: flex !important;
    flex-wrap: wrap !important;
}
#taxi-2 .slider-form form .form-group {
    flex: 0 0 33.333% !important;
    max-width: 33.333% !important;
    padding: 0 15px !important;
    margin-bottom: 19px !important;
}
#taxi-2 .slider-form form .form-group.submit-btn {
    flex: 0 0 100% !important;
    max-width: 100% !important;
    margin-bottom: 0 !important;
}
#taxi-2 .slider-form form .form-group .form-control {
    color: #888 !important;
    background-color: #fff !important;
    border: none !important;
    border-radius: 0 !important;
    box-shadow: none !important;
    font-size: 13px !important;
    font-family: Arial !important;
    line-height: 1.85 !important;
    letter-spacing: 0.52px !important;
    padding: 12px 22px !important;
}
#taxi-2 .slider-form form .form-group .form-control::-webkit-input-placeholder {
    color: #a1a1a1 !important;
    opacity: 1 !important;
}
#taxi-2 .slider-form form .form-group .form-control:-moz-placeholder {
    color: #a1a1a1 !important;
    opacity: 1 !important;
}
#taxi-2 .slider-form form .form-group .form-control::-moz-placeholder {
    color: #a1a1a1 !important;
    opacity: 1 !important;
}
#taxi-2 .slider-form form .form-group .form-control:-ms-input-placeholder {
    color: #a1a1a1 !important;
    opacity: 1 !important;
}
#taxi-2 .slider-form form .form-group.submit-btn button {
    background-color: <?php echo $headers->theme_color ?> !important;
    border: none !important;
    border-radius: 6px !important;
    box-shadow: none !important;
    color:<?php echo $headers->btn_color ?> !important;
    cursor: pointer !important;
    font-family: Arial !important;
    font-weight: 700 !important;
    font-size: 13px !important;
    letter-spacing: 0.52px !important;
    line-height: 1.85 !important;
    outline: none !important;
    padding: 11px 26px 9px !important;
    display: inline-block !important;
    text-transform: uppercase !important;
    -webkit-transition: all 1s ease 0s !important;
    -moz-transition: all 1s ease 0s !important;
    -o-transition: all 1s ease 0s !important;
    transition: all 1s ease 0s !important;
}
#taxi-2 .slider-form form .form-group.submit-btn button:hover {
    background-color: #fff !important;
    box-shadow: inset 0px 0px 2px 0px rgba(255, 0, 150, 0.004) !important;
    -webkit-box-shadow: inset 0px 0px 2px 0px #464646 !important;
    color: #000 !important;
}

/* - About Section */
.about-section {
	padding-bottom: 147px;
	padding-top: 147px;
}
.about-section .about-content > p {
	font-size: 13px;
	color: #888888;
	letter-spacing: 0.52px;
	line-height: 1.846;
	margin-bottom: 25px;
}
.about-section .about-content > a {
	background-color: <?php echo $headers->theme_color ?>;
	border-radius: 6px;
	color: <?php echo $headers->btn_color ?>;
	display: inline-block;
	font-size: 13px;
	font-weight: bold;
	letter-spacing: 0.52px;
	line-height: 1.846;
	padding: 9px 28px 8px;
	text-decoration: none;
	text-transform: uppercase;
	-webkit-transition: all 1s ease 0s;
	-moz-transition: all 1s ease 0s;
	-o-transition: all 1s ease 0s;
	transition: all 1s ease 0s;
}
.about-section .about-content > a:hover {
	background-color: #000;
	color: #fff;
}

/* - What We Do Section */
.what-we-do-section {
	padding-top: 146px;
	padding-bottom: 146px;
}
.what-we-do-section .section-header {
	margin-bottom: 48px;
}
.what-we-do-section .what-do-boxes {
	position: relative;
}
.what-we-do-section .icon-content-box {
	display: inline-block;
	position: relative;
	padding-left: 115px;
	min-height: 91px;
	width: 100%;
}
.what-we-do-section .icon-content-box i {
	border: 2px solid <?php echo $headers->theme_color ?>;
	border-radius: 50%;
	position: absolute;
	color: #252525;
	font-size: 35px;
	width: 91px;
	height: 91px;
	left: 0;
	top: 0;
	-webkit-transition: all 1s ease 0s;
	-moz-transition: all 1s ease 0s;
	-o-transition: all 1s ease 0s;
	transition: all 1s ease 0s;
	text-align: center;
	align-items: center;
	display: flex;
}
.what-we-do-section .icon-content-box i > img {
	margin: 0 auto;
}
.what-we-do-section .icon-content-box:hover i {
	color: #f7ca18;
}
.what-we-do-section .icon-content-box > h3 {
	color: #222;
	font-size: 13px;
	letter-spacing: 0.52px;
	line-height: 1.84;
	margin-bottom: 4px;
	text-transform: uppercase;
}
.what-we-do-section .icon-content-box > p {
	color: #888888;
	font-size: 13px;
	letter-spacing: 0.52px;
	line-height: 1.84;
	margin-bottom: 0;
}

/* - Book Taxi Section */
.book-taxi-section {
	background-image: url("assets/images/book-tax-bg.jpg");
	background-repeat: no-repeat;
	background-size: cover;
	padding-top: 146px;
	padding-bottom: 143px;
	position: relative;
}
.book-taxi-section::before {
	background-color: rgba(0,0,0,0.80);
	bottom: 0;
	content: "";
	display: inline-block;
	left: 0;
	position: absolute;
	right: 0;
	top: 0;
}
.book-taxi-section .section-header {
	margin-bottom: 50px;
}
.book-taxi-section form .form-group {
	margin-bottom: 27px;
}
.book-taxi-section form .form-group:last-child {
	margin-bottom: 0;
}
.book-taxi-section form .form-group label {
	color: #fff;
	font-size: 13px;
	font-weight: bold;
	text-transform: uppercase;
	display: block;
	margin-bottom: 24px;
}
.book-taxi-section form .form-group .form-control {
	background-color: transparent;
	border: 1px solid #fff;
	border-radius: 6px;
	color: #cacaca;
	font-size: 13px;
	padding: 13px 20px;
	-webkit-box-shadow: none;
	-webkit-appearance: none;
	box-shadow: none;
	outline: none;
}
.book-taxi-section form .form-group.des-to label {
	display: block;
	width: 100%;
}
.book-taxi-section form .form-group.des-to .form-control {
	max-width: 235px;
	display: inline-block;
}
.book-taxi-section form .form-group.des-to .form-control.time {
	max-width: 80px;
}
.book-taxi-section form .form-group.des-to span {
	display: inline-block;
	margin: 0 12px;
	color: #fff;
}
.book-taxi-section form .form-group select.form-control {
	height: auto;
}
.book-taxi-section form .form-group.car-type label {
	margin-bottom: 14px;
}
.book-taxi-section form .form-group.car-type span {
	color: #fff;
	font-size: 13px;
	text-transform: capitalize;
	vertical-align: middle;
}
.book-taxi-section form .form-group.car-type span {
	margin-left: 27px;
	display: inline-block;
}
.book-taxi-section form .form-group.car-type span:first-of-type {
	margin-left: 0;
}
.book-taxi-section form .form-group.car-type span input {
	margin-left: 15px;
}
.book-taxi-section form .form-group.car-type span input[type="submit"] {
	background-color: <?php echo $headers->theme_color ?>;
	border: none;
	border-radius: 4px;
	color: #000000;
	font-size: 13px;
	font-weight: bold;
	text-transform: uppercase;
	padding: 11px 30px 10px;
	display: inline-block;
	cursor: pointer;
	-webkit-transition: all 1s ease 0s;
	-moz-transition: all 1s ease 0s;
	-o-transition: all 1s ease 0s;
	transition: all 1s ease 0s;
}
.book-taxi-section form .form-group.car-type span input[type="submit"]:hover {
	background-color: #fff;
}
.book-taxi-section form .form-group .form-control::-webkit-input-placeholder {
	color: #cacaca;
	opacity: 1;
}
.book-taxi-section form .form-group .form-control:-moz-placeholder {
	color: #cacaca;
	opacity: 1;
}
.book-taxi-section form .form-group .form-control::-moz-placeholder {
	color: #cacaca;
	opacity: 1;
}
.book-taxi-section form .form-group .form-control:-ms-input-placeholder {
	color: #cacaca;
	opacity: 1;
}
/* - Book Taxi 2 */
.book-taxi-section.no-bg form .form-group label {
	color: #222;
}
.book-taxi-section.no-bg form .form-group.des-to span {
	color: #222;
}
.book-taxi-section.no-bg form .form-group .form-control {
	border-color: #e0e0e0;
	color: #909090;
}
.book-taxi-section.no-bg form .form-group.car-type span {
	color: #909090;
}
.book-taxi-section.no-bg form .form-group.car-type span input[type="submit"]:hover {
	background-color: #222;
	color: #fff;
}
.book-taxi-section.no-bg form .form-group .form-control::-webkit-input-placeholder {
	color: #909090;
	opacity: 1;
}
.book-taxi-section.no-bg form .form-group .form-control:-moz-placeholder {
	color: #909090;
	opacity: 1;
}
.book-taxi-section.no-bg form .form-group .form-control::-moz-placeholder {
	color: #909090;
	opacity: 1;
}
.book-taxi-section.no-bg form .form-group .form-control:-ms-input-placeholder {
	color: #909090;
	opacity: 1;
}

/* - Amenities Section */
.Amenities-section {
	padding-top: 144px;
	padding-bottom: 144px;
}
.Amenities-section .container > h3 {
	color: #222;
	font-size: 18px;
	margin-top: 10px;
	margin-bottom: 42px;
	letter-spacing: 0.72px;
	line-height: 1.33;
	text-align: center;
	text-transform: capitalize;
}
.Amenities-section .image-content-box {
	position: relative;
	max-width: 100%;
	display: inline-block;
	text-align: center;
}
.Amenities-section .image-content-box > img {
	border: 10px solid #ececec;
	border-radius: 9px;
}
.Amenities-section .image-content-box > span {
	background-color: <?php echo $headers->theme_color ?>;
	border: solid 1px #fff;
	border-radius: 50%;
	font-size: 18px;
	font-weight: bold;
	line-height: 2.61;
	position: absolute;
	right: 0;
	top: -11px;
	width: 47px;
	height: 47px;
	text-align: center;
}
.Amenities-section .image-content-box > h4 {
	font-size: 18px;
	color: #222;
	line-height: 1.333;
	text-transform: capitalize;
	letter-spacing: 0.72px;
	margin-top: 20px;
	margin-bottom: 0;
	padding-bottom: 20px;
	position: relative;
}
.Amenities-section .image-content-box > h4::before {
	background-color: <?php echo $headers->theme_color ?>;
	height: 3px;
	content: "";
	position: absolute;
	left: 0;
	right: 0;
	bottom: 0;
	margin: 0 auto;
	width: 70px;
}
.Amenities-section .cnt-detail  {
	display: inline-block;
	max-width: 100%;
}
.Amenities-section .cnt-detail > h4 {
	color: #222;
	font-size: 18px;
	font-weight: 400;
	line-height: 1.33;
	letter-spacing: 0.72px;
	margin-bottom: 14px;
}
.Amenities-section .cnt-detail > p {
	color: #909090;
	font-size: 13px;
	line-height: 1.846;
}
.Amenities-section .cnt-detail > a {
	background-color: <?php echo $headers->theme_color ?>;
	color: <?php echo $headers->btn_color ?>;
	font-size: 13px;
	font-weight: bold;
	letter-spacing: 0.52px;
	line-height: 1.846;
	border-radius: 5px;
	padding: 11px 27px;
	text-transform: uppercase;
	display: inline-block;
	margin-top: 8px;
	text-decoration: none;
	-webkit-transition: all 1s ease 0s;
	-moz-transition: all 1s ease 0s;
	-o-transition: all 1s ease 0s;
	transition: all 1s ease 0s;
}
.Amenities-section .cnt-detail > a:hover {
	background-color: #000000;
	color: #fff;
}

/* - Testimonial Section */
.testimonial-section {
	background-image: url("assets/images/testimonial-bg.jpg");
	background-repeat: no-repeat;
	background-size: cover;
	position: relative;
	direction: ltr;
	padding-bottom: 134px;
	padding-top: 143px;
}
.testimonial-section::before {
	background-color: rgba(0,0,0,0.87);
	bottom: 0;
	content: "";
	display: inline-block;
	left: 0;
	position: absolute;
	right: 0;
	top: 0;
}
.testimonial-section .section-header {
	margin-bottom: 40px;
}
.testimonial-section .testi-content-block > div {
	display: inline-block;
	width: 100%;
	margin-bottom: 13px;
	text-align: center;
}
.testimonial-section .testi-content-block > div > p {
	color: #fff;
	line-height: 2;
	letter-spacing: 0.462px;
	position: relative;
	padding-left: 60px;
}
.testimonial-section .testi-content-block > div > p::before {
	content: "\f10d";
	font-size: 24px;
	font-family: "FontAwesome";
	color: <?php echo $headers->theme_color ?>;
	line-height: 1;
	text-align: left;
	position: absolute;
	left: 0;
	top: -10px;
}
.testimonial-section .testi-content-block > div > p::after {
	content: "\f10e";
	font-size: 24px;
	font-family: "FontAwesome";
	color: <?php echo $headers->theme_color ?>;
	line-height: 1;
	top: 13px;
	position: relative;
	margin: 0 20px;
}
.testimonial-section .testi-content-block > div > p > span {
	color: <?php echo $headers->heading_color ?>;
}
.testimonial-section .testi-img-block {
	position: relative;
	margin-top: 28px;
}
.testimonial-section .testi-carousel {
	max-width: 100%;
	width: 570px;
	display: block;
	margin: 0 auto;
}
.testimonial-section .testi-carousel a {
	margin: 0 0;
	padding: 50px 0;
	display: inline-block;
	width: 100%;
	text-align: center;
	text-decoration: none;
}
.testimonial-section .testi-carousel a > img {
	display: inline-block;
	width: 95px;
	border-radius: 50%;
}
.testimonial-section .testi-carousel .owl-item.active.center a {
	padding: 0;
}
.testimonial-section .testi-carousel .owl-item.active.center a > img {
	border: 2px solid <?php echo $headers->theme_color ?>;
	width: auto;
}
.testimonial-section .testi-carousel a > h4 { 
	color: <?php echo $headers->theme_color ?>;
	font-size: 13px;
	font-weight: bold;
	line-height: 1.846;
	letter-spacing: 0.429px;
	text-transform: uppercase;
	margin-top: 27px;
	margin-bottom: 0;
	opacity: 0;
}
.testimonial-section .testi-carousel a > h4 > span { 
	color: #fff;
	display: block;
	text-transform: capitalize;
	font-style: italic;
	font-weight: normal;
}
.testimonial-section .testi-carousel .owl-item.active.center a > h4 {
	opacity: 1;
}
.testimonial-section .testi-img-block  .testi-nav { 
	display: flex;
	width: 100%;
}
.testimonial-section .testi-img-block  .testi-nav div { 
	color: <?php echo $headers->theme_color ?>;
	font-size: 30px;
	cursor: pointer;
	line-height: 1;
	position: absolute;
	transform: translate(0%, -50%);
	-webkit-transform: translate(0%, -50%);
	-moz-transform: translate(0%, -50%);
	-ms-transform: translate(0%, -50%);
	top: 50%;
	margin-top: -44px;
	width: 15px;
	
}
.testimonial-section .testi-img-block  .testi-nav div.testi-prev { 
	left: 0;
}
.testimonial-section .testi-img-block  .testi-nav div.testi-next { 
	right:  0;
	left: auto;
}

/* - Team Section */
.team-section {
	background-image: url("assets/images/team-bg.jpg");
	background-repeat: no-repeat;
	background-size: cover;
	position: relative;
	padding-bottom: 148px;
	padding-top: 142px;
}
.team-section::before {
	background-color: rgba(0,0,0,0.78);
	bottom: 0;
	content: "";
	display: inline-block;
	left: 0;
	position: absolute;
	right: 0;
	top: 0;
}
.team-section-2::before {
	background-color: rgba(255,255,255,0.96);
}
.team-section .section-header {
	margin-bottom: 44px;
}
.team-section .team-box {
	border: 2px solid <?php echo $headers->theme_color ?>;
}
.team-section .team-box .team-detail { 
	background-color: <?php echo $headers->theme_color ?>;
	padding: 12px 15px;
}
.team-section .team-box .team-detail > p { 
	margin-bottom: 0;
	display: flex;
	color: <?php echo $headers->btn_color ?>;
	line-height: 1.714;
}
.team-section .team-box .team-detail > p > span { 
	margin-right: 0;
	margin-left: auto;
}
.team-section .team-box .team-detail > p > span > i {
	margin: 0 2px;
}
.team-section .team-box .team-detail > h5 { 
	font-size: 24px;
	color: #222;
	line-height: 1;
	text-transform: capitalize;
	text-align: center;
	margin-bottom: 0;
	padding: 12px 0;
}

/* - Callout Section */
.callout-section {
	background-image: url("assets/images/Scania-Bus-ADAS2.jpg");
	background-repeat: no-repeat;
	background-size: cover;
	padding-bottom: 182px;
	padding-top: 86px;
	position: relative;
	background-position:center;
}
.callout-section::before {
	background-color: rgba(0,0,0,0.85);
	bottom: 0;
	content: "";
	display: inline-block;
	left: 0;
	position: absolute;
	right: 0;
	top: 0;
}
.callout-section .callout-detail {
	position: relative;
	text-align: center;
}
.callout-section .callout-detail h3 {
	color: #fff;
	font-size: 30px;
	font-family: 'Playfair Display', serif;
	font-weight: bold;
	letter-spacing: 0.99px;
	line-height: 1.4;
	margin-bottom: 15px;
	text-transform: uppercase;
}
.callout-section .callout-detail h3 > span {
	color: <?php echo $headers->theme_color ?>;
	font-style: italic;
}
.callout-section .callout-detail > h6 {
	color: <?php echo $headers->theme_color ?>;
	font-family: 'Playfair Display', serif;
	font-size: 18px;
	font-weight: bold;
	line-height: 1.56;
	letter-spacing: 0.594px;
}
.callout-section .callout-detail > h6 > a  {
	color: #fff;
	font-family: Arial,Helvetica,sans-serif;
	font-style: italic;
	text-decoration: none;
}
.callout-section .callout-detail > a  {
	border: 2px solid <?php echo $headers->theme_color ?>;
	color: #fff;
	display: inline-block;
	padding: 7px 27px;
	text-decoration: none;
	text-transform: uppercase;
	font-weight: bold;
	letter-spacing: 0.462px;
	border-radius: 5px;
	margin-top: 26px;
	-webkit-transition: all 1s ease 0s;
	-moz-transition: all 1s ease 0s;
	-o-transition: all 1s ease 0s;
	transition: all 1s ease 0s;
}
.callout-section .callout-detail > a:hover {
	background-color: <?php echo $headers->theme_color ?>;
	border-color: transparent;
}

/* - App Counter Section */
.app-counter-section {
	padding-bottom: 140px;
	padding-top: 140px;
	position: relative;
}
.mobile-app > p {
	font-size: 13px;
	color: #888888;
	line-height: 1.846;
}
.mobile-app > p + p {
	margin-top: 20px;
}
.mobile-app > h5 {
	font-size: 18px;
	color: #222;
	line-height: 1.333;
}
.mobile-app > a {
	display: inline-block;
	margin-top: 5px;
	margin-bottom: 5px;
}
.mobile-app > a + a {
	margin-left: 10px;
}
.counter-block .row {
	margin: 0 -7.5px;
}
.counter-block .row > [class*="col-"] {
	padding-left: 7.5px;
	padding-right: 7.5px;
}
.counter-block .row > [class*="col-"]:nth-child(n+3) {
	margin-top: 10px;
}
.counter-block .counter-box {
	background-color: #222;
	padding: 27px 15px;
	text-align: center;
	border-radius: 5px;
}
.counter-block .counter-box::before {
	background-color: #e0e0e0;
	content: "";
	right: 0;
	top: 0;
	bottom: 0;
	position: absolute;
	width: 1px;
}
.counter-block .row > [class*="col-"]:first-child .counter-box::before {
	top: 8px;
	bottom: -4px;
}
.counter-block .row > [class*="col-"]:nth-last-child(2) .counter-box::before {
	top: -4px;
	bottom: 8px;
}
.counter-block .row > [class*="col-"]:nth-child(2n) .counter-box::before {
	display: none;
}
.counter-block .row > [class*="col-"]:nth-child(n+3) .counter-box::after {
	background-color: #e0e0e0;
	content: "";
	right: 0;
	left: 0;
	top: -5.5px;
	position: absolute;
	height: 1px;
}
.counter-block .row > [class*="col-"]:nth-child(odd) .counter-box::after {
	left: 8px;
}
.counter-block .row > [class*="col-"]:nth-child(even) .counter-box::after {
	right: 8px;
}
.counter-block .counter-box > i {
	border: solid 2px #fff;
	border-radius: 50%;
	width: 83px;
	height: 83px;
	display: block;
	align-items: center;
	display: flex;
	margin: 0 auto;
}
.counter-block .counter-box > i > img {
	margin: 0 auto;
}
.counter-block .counter-box > span {
	color: #fff;
	font-size: 36px;
	font-weight: bold;
	letter-spacing: 1.188px;
	margin-top: 9px;
	display: inline-block;
	margin-bottom: 3px;
}
.counter-block .counter-box > h5 {
	color: #fff;
	font-size: 18px;
	text-transform: capitalize;
	letter-spacing: 0.594px;
}
.app-counter-section .mobile-img {
	display: none;
}

/* - Blog */
.blog-box {
	display: inline-block;
	width: 100%;
}
.blog-box + .blog-box {
	margin-top: 50px;
}
.blog-box .entry-cover {
	position: relative;
}
.blog-box .entry-cover .entry-meta {
	background-color: rgba(0,0,0,0.75);
	position: absolute;
	left: 0 ;
	bottom: 0;
	right: 0;
	padding: 15px 25px;
}
.blog-box .entry-cover .entry-meta > span {
	color: #fff;	
}
.blog-box .entry-cover .entry-meta .posted-on {
	text-transform: capitalize;
	letter-spacing: 0.35px;
	line-height: 1;
	text-align: center;
	padding: 0 22px 0 7px;
	border-right: 4px solid <?php echo $headers->theme_color ?>;
}
.blog-box .entry-cover .entry-meta .posted-on a {
	color: #fff;
	font-size: 11.66px;
	text-decoration: none;
	-webkit-transition: all 0.5s ease 0s;
	-moz-transition: all 0.5s ease 0s;
	-o-transition: all 0.5s ease 0s;
	transition: all 0.5s ease 0s;
}
.blog-box .entry-cover .entry-meta .posted-on a > b {
	display: block;
	margin-bottom: 10px;
	font-size: 23.31px;
}
.blog-box .entry-cover .entry-meta .author {
	margin-left: 20px;
}
.blog-box .entry-cover .entry-meta .author > span {
	color: #909090;
	display: block;
	font-size: 12.63px;
	margin-top: 5px;
	margin-bottom: 5px;
	letter-spacing: 0.5052px;
}
.blog-box .entry-cover .entry-meta .author > span > a {
	color: #fff;
	text-decoration: none;
}
.blog-box .entry-cover .entry-meta .author > span > a:hover {
	color: <?php echo $headers->theme_color ?>;
}
.blog-box .entry-cover .entry-meta .post-count {
	margin-right: 0;
	margin-left: auto;
}
.blog-box .entry-cover .entry-meta .post-count > span {
	color: #fff;
	font-size: 12.63px;
	display: inline-block;
}
.blog-box .entry-cover .entry-meta .post-count > span + span {
	margin-left: 20px;
}
.blog-box .entry-cover .entry-meta .post-count > span > i {
	color: <?php echo $headers->theme_color ?>;
	margin-right: 12px; 
}
.blog-box .entry-cover .entry-meta .post-count > span > a {
	color: #fff;
	text-decoration: none;
}
.blog-box .entry-cover .entry-meta .post-count > span > a:hover {
	color: <?php echo $headers->theme_color ?>;
}
.blog-box .entry-content {
	border: 1px solid #e0e0e0;
	padding: 34px 28px 31px;
	display: inline-block;
	width: 100%;
}
.blog-box .entry-content .entry-title {
	color: #222;
	font-size: 13.6px;
	font-weight: bold;
	letter-spacing: 0.544px;
	line-height: 1.86;
	margin-bottom: 7px;
	text-transform: uppercase;
}
.blog-box .entry-content .entry-title > a {
	color: #222;
	text-decoration: none;
}
.blog-box .entry-content .entry-title > a:hover {
	color: <?php echo $headers->theme_color ?>;
}
.blog-box .entry-content p {
	color: #909090;
	font-size: 13px;
	letter-spacing: 0.52px;
	line-height: 1.79;
	margin-bottom: 0;
}
.blog-box .entry-content > a {
	border-radius: 10px;
	color: #222;
	float: right;
	font-size: 12.63px;
	font-weight: bold;
	letter-spacing: 0.5052px;
	display: inline-block;
	text-decoration: none;
	text-transform: capitalize;
	margin-top: 0;
}
.blog-box .entry-content > a::before { 
	color: <?php echo $headers->theme_color ?>;
	content: "\f178";
	font-size: 12.63px;
	font-family: FontAwesome;
	margin-right: 12px;
}
.blog-box .entry-content > a:hover {
	color: <?php echo $headers->theme_color ?>;
}
.blog-box.format-quote {
	text-align: center;
}
.blog-box.format-quote p {
	color: #222;
	font-style: italic;
	letter-spacing: 0.375px;
	line-height: 2.5;
	margin-bottom: 0;
	padding-left: 40px;
	position: relative;
}
.blog-box.format-quote p::before {
	content: "\f10d";
	font-family: FontAwesome;
	font-style: normal;
	position: absolute;
	left: 0;
	top: 0;
	color: <?php echo $headers->theme_color ?>;
	font-size: 18px;
	line-height: 1;
}
.blog-box.format-quote p::after {
	content: "\f10e";
	font-family: FontAwesome;
	font-style: normal;
	color: <?php echo $headers->theme_color ?>;
	font-size: 18px;
	line-height: 1;
	position: relative;
	top: 8px;
	margin-left: 20px;
}
/* - Blog Single */
.single-post .entry-content {
	border: none;
	padding-left: 0;
	padding-right: 0;
	padding-bottom: 0;
	padding-top: 55px;
}
.single-post .entry-content .entry-title { 
	margin-bottom: 16px;
}
.single-post .entry-content > p {
	margin-bottom: 26px;
}
.single-post .entry-content > p > span {
	color: #f26f29;
}
.single-post .entry-content > blockquote {
	margin-bottom: 40px;
	margin-top: 40px;
}
.single-post .entry-content > blockquote p {
	color: #222;
	font-style: italic;
	line-height: 2.5;
	letter-spacing: 0.56px;
	margin-bottom: 0;
	padding-left: 40px;
	position: relative;
	text-align: center;
}
.single-post .entry-content > blockquote p::before {
	content: "\f10d";
	font-family: FontAwesome;
	font-style: normal;
	position: absolute;
	left: 0;
	top: 0;
	color: <?php echo $headers->theme_color ?>;
	font-size: 18px;
	line-height: 1;
}
.single-post .entry-content > blockquote p::after {
	content: "\f10e";
	font-family: FontAwesome;
	font-style: normal;
	color: <?php echo $headers->theme_color ?>;
	font-size: 18px;
	line-height: 1;
	position: relative;
	top: 4px;
	margin-left: 20px;
}
.single-post .entry-footer {
	margin-top: 30px;
	margin-bottom: 35px;
}
.single-post .entry-footer .social-share > h4 {
	color: #222;
	display: inline-block;
	font-family: 'Playfair Display', serif;
	font-size: 18px;
	line-height: 1.56;
	text-transform: capitalize;
	margin-right: 10px;
}
.single-post .entry-footer .social-share > ul {
	display: inline-block;
	margin-bottom: 0;
	padding: 0;
	margin-left: auto;
	margin-right: 0;
}
.single-post .entry-footer .social-share > ul > li {
	display: inline-block;
	margin: 0 2px;
}
.single-post .entry-footer .social-share > ul > li > a {
	border: 1px solid #909090;
	border-radius: 50%;
	font-size: 12px;
	display: inline-block;
	width: 34px;
	height: 34px;
	color: #909090;
	line-height: 2.83;
	-webkit-transition: all 0.5s ease 0s;
	-moz-transition: all 0.5s ease 0s;
	-o-transition: all 0.5s ease 0s;
	transition: all 0.5s ease 0s;
	text-align: center;
}
.single-post .entry-footer .social-share > ul > li > a:hover {
	background-color: <?php echo $headers->theme_color ?>;
	border-color: transparent;
	color: #fff;
}

.post-author {
	border-bottom: 1px solid #d0d0d0;
	border-top: 1px solid #d0d0d0;
	padding-top: 50px;
	padding-bottom: 50px;
}
.post-author .author-detail {
	position: relative;
	display: inline-block;
	width: 100%;
	padding-left: 210px;
	min-height: 175px;
}
.post-author .author-detail > img {
	position: absolute;
	left: 0;
	top: 0;
}
.post-author .author-detail h3 {
	color: #232323;
	font-size: 16px;
	font-weight: bold;
	text-transform: uppercase;
	line-height: 1.75;
}
.post-author .author-detail p {
	color: #555555;
	font-size: 13px;
	line-height: 2;
}
.post-author .author-detail ul {
	padding: 0;
	margin-bottom: 0;
	float: right;
}
.post-author .author-detail ul li {
	display: inline-block;
	margin: 0 2px;
}
.post-author .author-detail > ul > li > a {
	border: 1px solid #909090;
	border-radius: 50%;
	font-size: 12px;
	display: inline-block;
	width: 34px;
	height: 34px;
	color: #909090;
	line-height: 2.83;
	-webkit-transition: all 0.5s ease 0s;
	-moz-transition: all 0.5s ease 0s;
	-o-transition: all 0.5s ease 0s;
	transition: all 0.5s ease 0s;
	text-align: center;
}
.post-author .author-detail > ul > li > a:hover {
	background-color: <?php echo $headers->theme_color ?>;
	border-color: transparent;
	color: #fff;
}
/* - Comment Area */
.comments-area {
	display: inline-block;
    margin-top: 53px;
    padding: 0;
    width: 100%;
	overflow: hidden;
}
.comments-title {
	color: #222;
	font-family: 'Playfair Display', serif;
	font-size: 18px;
	font-weight: bold;
	line-height: 1.44;
	margin-bottom: 50px;
	text-transform: uppercase;
}
.comment-list {
    list-style: none;
    margin-bottom: 0;
	padding-left: 0;
}
.comment-list > li.depth-1 {
	padding-left: 0;
}
.comment-body {
	padding-bottom: 30px;
	margin-bottom: 30px;
	padding-left: 140px;
	position: relative;
	min-height: 111px;
	z-index: 0;
}
.comment-body::before {
	border-bottom: 1px solid #e5e5e5;
	content: "";
	position: absolute;
	left: -100%;
	right: -100%;
	top: 0;
	bottom: 0;
	z-index: -1;
	width: 10000px;
}
.comment-meta {
	display: inline-block;
	width: 100%;
}
.comment-author { 
	color: #222;
	font-size: 16px;
	font-weight: 400;
	line-height: 1.75;
}
.comment-author b {
	font-weight: 400;
}
.comment-author .avatar {	
	position: absolute;
	left: 0;
	top: 0;
	border-radius: 50%;
}
.comment-metadata {
	color: #ffbf43;
	line-height: 2;
	margin-bottom: 8px;
}
.comment-metadata a {
	color: #ffbf43;
	text-transform: capitalize;
	text-decoration: none;
	letter-spacing: 0.56px;
	line-height: 1.85;
	-webkit-transition: all 1s ease 0s;
	-moz-transition: all 1s ease 0s;
	-o-transition: all 1s ease 0s;
	transition: all 1s ease 0s;
}
.comment-body .reply > a {
	background-color: <?php echo $headers->theme_color ?>;
	border-radius: 5px;
	color: #222;
	display: inline-block;
	font-size: 13px;
	font-weight: bold;
	letter-spacing: 0.52px;
	line-height: 2;
	padding: 4px 19px 3px;
	text-transform: uppercase;
	text-decoration: none;
}
.comment-body .reply a:hover {
	background-color: #222;
	color: #fff;
}
.comments-area .comment-content {
	margin-bottom: 25px;
}
.comments-area .comment p {
    color: #717171;
    letter-spacing: 0.56px;
    line-height: 1.85;
	margin-bottom: 10px;
}
.comment-list .children {
	list-style: none;
	margin: 0 0 0 20px;
	padding-left: 20px;
}
.comment-list .children > li {
    padding-left: 0.5em;
}
/* - Comment Reply Form */
.comment-respond {
	display: inline-block;
	width: 100%;
	margin-top: 14px;
}
.comment-reply-title {
	color: #222;
	font-family: 'Playfair Display', serif;
	font-size: 18px;
	font-weight: bold;
	line-height: 1.44;
	margin-bottom: 36px;
	text-transform: uppercase;
}
.required {
    color: #c0392b;
}
.comments-area .comment-form {
	margin-left: -15px;
	margin-right: -15px;
}
.comments-area .comment-form p {
	padding-left: 15px;
	padding-right: 15px;
	margin-bottom: 30px;
}
.comments-area .comment-form p:last-of-type {
	margin-bottom: 0;
}
.comments-area .comment-form-author,
.comments-area .comment-form-email,
.comments-area .comment-form-comment {
    float: left;
    width: 50%;
}
.comments-area .comment-form-comment {
	width: 100%;
}
.comment-form input[type="text"],
.comment-form input[type="email"],
.comment-form input[type="url"],
.comment-form textarea {
	background-color: #fff;
    border: 1px solid #dedede;
    border-radius: 0;
	box-shadow: none;
    color: #232323;
	font-size: 13px;
	font-weight: 300;
    letter-spacing: 0.56px;
	line-height: 1.85;
    outline: none;
    padding: 10px 20px;
    position: relative;
    width: 100%;
}
.form-submit {
	display: inline-block;
	margin-bottom: 0;
	width: 100%;
}
.comment-form input[type="submit"]{
	background-color: #ffbf43;
	box-shadow: 2.989px -0.261px 0px 0px rgba(188, 124, 0, 0.75);
	-webkit-box-shadow: 2.989px -0.261px 0px 0px rgba(188, 124, 0, 0.75);
    border: none;
    border-radius: 5px;
    color: #222;
	cursor: pointer;
    font-size: 14px;
	font-weight: bold;
    letter-spacing: 0.56px;
	line-height: 1.71;
	outline: none;
    padding: 10px 26px 9px;
    text-decoration: none;
    text-transform: uppercase;
	transition: all 1s ease 0s;
	-webkit-transition: all 1s ease 0s;
	-moz-transition: all 1s ease 0s;
}
.comment-form input[type="submit"]:hover {
	background-color: #222;
	box-shadow: 2.989px -0.261px 0px 0px rgba(34,34,34,0.75);
	-webkit-box-shadow: 2.989px -0.261px 0px 0px rgba(34,34,34,0.75);
	color: #fff;
}
.comment-form input::-webkit-input-placeholder,
.comment-form textarea::-webkit-input-placeholder {
	color: #232323;
	opacity: 1;
	text-transform: uppercase;
}
.comment-form input:-moz-placeholder,
.comment-form textarea:-moz-placeholder { 
	color: #232323;
	opacity: 1;
	text-transform: uppercase;
}
.comment-form input::-moz-placeholder,
.comment-form textarea::-moz-placeholder {
	color: #232323;
	opacity: 1;
	text-transform: uppercase;
}
.comment-form input:-ms-input-placeholder,  
.comment-form textarea:-ms-input-placeholder {  
	color: #232323;
	opacity: 1;
	text-transform: uppercase;
}
/* - Miscellaneous Section */
.miscellaneous-section {
	padding-top: 145px;
	padding-bottom: 140px;
}
.miscellaneous-section .section-header {
	margin-bottom: 51px;
}
.latest-blog .blog-box { 
	display: flex;
}
.latest-blog .blog-box + .blog-box {
	margin-top: 38px;
}
.latest-blog .blog-box .entry-cover { 
	width: 39.2%;
}
.latest-blog .blog-box .entry-cover > a {
	display: inline-block;
	width: 100%;
	position: relative;
}
.latest-blog .blog-box .entry-cover > a::before {
	background-color: rgba(34,34,34,0.5);
	bottom: 0;
	content: "";
	display: inline-block;
	left: 0;
	position: absolute;
	right: 0;
	top: 0;
	opacity: 0;
	-webkit-transition: all 1s ease 0s;
	-moz-transition: all 1s ease 0s;
	-o-transition: all 1s ease 0s;
	transition: all 1s ease 0s;
}
.latest-blog .blog-box .entry-cover > a::after {
	content: "\e6a4";
	font-family: 'Stroke-Gap-Icons';
	font-size: 20px;
	width: 42px;
	height: 42px;
	border: 1px solid #fff;
	border-radius: 50%;
	margin: 0 auto;
	position: absolute;
	left: 0;
	right: 0;
	top: 50%;
	transform: translate(0%, -50%);
	-webkit-transform: translate(0%, -50%);
	-moz-transform: translate(0%, -50%);
	-ms-transform: translate(0%, -50%);	
	text-align: center;
	color: #fff;
	line-height: 2.1;
	opacity: 0;
	-webkit-transition: all 1s ease 0s;
	-moz-transition: all 1s ease 0s;
	-o-transition: all 1s ease 0s;
	transition: all 1s ease 0s;
}
.latest-blog .blog-box .entry-cover > a:hover::before,
.latest-blog .blog-box .entry-cover > a:hover::after {
	opacity: 1;
}
.latest-blog .blog-box .entry-content { 
	width: 60.8%;
	border: none;
	border-top: 2px solid #e0e0e0;
	padding-top: 23px;
	padding-right: 0;
	padding-bottom: 0;
}
.latest-blog .blog-box .entry-content .entry-title {
	font-size: 14px;
	font-weight: 400;
	letter-spacing: 0.56px;	
}
.latest-blog .blog-box .entry-content .entry-footer {
	border-top: 1px solid #e6e6e6;
	padding-top: 8px;
	margin-top: 15px;
}
.latest-blog .blog-box .entry-content .entry-footer > span {
	font-size: 13px;
	color: <?php echo $headers->theme_color ?>;
	letter-spacing: 0.325px;
	line-height: 2.3;
	display: inline-block;
}
.latest-blog .blog-box .entry-content .entry-footer > span + span {
	margin-left: 32px;
}
.latest-blog .blog-box .entry-content .entry-footer > span > a {
	color: <?php echo $headers->theme_color ?>;
	text-decoration: none;
	-webkit-transition: all 1s ease 0s;
	-moz-transition: all 1s ease 0s;
	-o-transition: all 1s ease 0s;
	transition: all 1s ease 0s;
}
.latest-blog .blog-box .entry-content .entry-footer > span > a:hover {
	color: #000;
}
.miscellaneous-section-2  .latest-blog .blog-box .entry-cover {
	width: 33.4%;
}
.miscellaneous-section-2  .latest-blog .blog-box .entry-content {
	width: 66.6%;
	padding-right: 28px;
}
.request-form {
	background-image: url("assets/images/request-form-bg.jpg");
	background-repeat: no-repeat;
	background-size: cover;
	display: inline-block;
	width: 100%;
	position: relative;
	border-radius: 6px;	
	padding: 30px 39px 36px;
}
.request-form::before {
	background-color: rgba(0,0,0,0.77);
	border-radius: 6px;	
	bottom: 0;
	content: "";
	display: inline-block;
	left: 0;
	position: absolute;
	right: 0;
	top: 0;
}
.request-form > h3 {
	color: <?php echo $headers->theme_color ?>;
	font-size: 18px;  
	font-weight: bold;
	text-transform: uppercase;
	line-height: 1.333;
	position: relative;
	margin-bottom: 23px;
}
.request-form form {
	position: relative;
	margin: 0 -8px;
}
.request-form form > p {
	float: left;
	padding: 0 8px;
}
.request-form form .author-name,
.request-form form .author-mail,
.request-form form .author-subject,
.request-form form .author-message {
	width: 100%;
}
.request-form form .author-mail,
.request-form form .author-subject {
	width: 50%;
}
.request-form form > p > .form-control {
	border: none;
	border-radius: 0;
	-webkit-box-shadow: none;
	-webkit-appearance: none;
	box-shadow: none;
	outline: none;
	font-size: 13px;
	color: #909090;
	padding: 11px 20px;
}
.request-form form > p.form-submit input[type="submit"] {
	background-color: <?php echo $headers->theme_color ?>;
	border-radius: 6px;
	border: none;
	cursor: pointer;
	color: #000;
	padding: 8px 25px;
	font-size: 13px;
	font-weight: bold;
	letter-spacing: 0.429px;
	line-height: 1.85;
	text-transform: uppercase;
}
.request-form form > p.form-submit input[type="submit"]:hover {
	background-color: #2c2c2c;
	color: #fff;
}

/* - Faq section */
.faq-section {
	padding-top: 100px;
	padding-bottom: 100px;
}
.faq-section .section-header h3 {
	font-size: 30px;
	letter-spacing: 1.2px;
}
.faq-block h2 {
 	color: #222;
	font-family: 'Playfair Display', serif;
	font-size: 14px;
	font-weight: bold;
	letter-spacing: 0.56px;
	line-height: 1.714;
	margin-top: 25px;
	margin-bottom: 27px;
	text-transform: uppercase;
}
.faq-block .card {
	margin-bottom: 10px;
	background-color: #f0f0f0;
	border-radius: 0;
	border: none;
}
.faq-block .card-header {
	padding: 0;
	border-bottom: none;
}
.faq-block .card-header h5 {
	font-size: 13px;
}
.faq-block .card-header h5 a {
	color: #121212;
	font-size: 13px;
	line-height: 2.462;
	letter-spacing: 0.325px;
	text-decoration: none;
	padding: 9px 40px 9px 20px;
	text-transform: uppercase;
	display: inline-block;
	width: 100%;
	position: relative;
}
.faq-block .card-header h5 a.collapsed {
	padding-right: 110px;
}
.faq-block .card-header h5 a::before {
	content: "-";
	position: absolute;
	font-size: 24px;
	right: 20px;
	top: 0;
	color: #121212;
	line-height: 1.875;
}
.faq-block .card-header h5 a.collapsed::before {
	content: "Expand +";
	position: absolute;
	font-size: 14px;
	right: 20px;
	top: 3px;
	color: #121212;
	line-height: 3.214;
	text-transform: capitalize;
	letter-spacing: 0.35px;
}
.faq-block .card-body {
	border: 1px solid #e0e0e0;
	display: inline-block;
    min-height: 127px;
    padding: 26px 15px 26px 157px;
    margin-bottom: 0;
    position: relative;
    background-color: #fff;	
}
.faq-block .card-body.no-thumb {
	padding: 26px 22px 26px 15px;
}
.faq-block .card-body img{
 	left: 32px;
    position: absolute;
    top: 25px;
}
.faq-block .card-body p {
	color: #888;
	font-size: 13px;
	font-family: "Arial";
	line-height: 1.85;
	letter-spacing: 0.325px;
	margin-bottom: 0;
}

/* - Choose Section */
.choose-section {
	padding-top: 120px;
	padding-bottom: 120px;
	direction: ltr;
}
.choose-section .section-header {
	margin-bottom: 43px;
}
.choose-section .choose-tab {
	display: flex;
}
.choose-section .nav-tabs {
	border-bottom: none;
	text-align: center;
	margin: 0 auto 40px;
	flex-direction: row;
}
.choose-section .nav-tabs li.nav-item > a {
	text-transform: uppercase;
	border-bottom: 1px solid <?php echo $headers->theme_color ?>;
	border-radius: 0;
	color: #888;
	font-size: 13px;
	letter-spacing: 0.52px;
	line-height: 2.15;
	padding: 17px 50px;
}
.choose-section .nav-tabs .nav-link:focus, 
.choose-section .nav-tabs .nav-link:hover,
.choose-section .nav-tabs .nav-item.show .nav-link, 
.choose-section .nav-tabs .nav-link.active {
	border-color: <?php echo $headers->theme_color ?>;
	border-bottom-color: transparent; 
	color: #222;
}
.choose-section .choose-main {
	position: relative;
}
.choose-section .choose-main .choose-nav {
	display: inline-block;
	width: 100%;
}
.choose-section .choose-main .choose-nav > div {
	background-color: #fff;
	color: #888;
	position: absolute;
	top: 19px;
	z-index: 1;
	width: 65px;
	height: 67px;
	border-radius: 5px;
	box-shadow: 0px 5px 5px 0px rgba(224, 224, 224, 0.75);
	text-align: center;
	line-height: 4.78;
	cursor: pointer;
}
.choose-section .choose-main .choose-nav > div.choose-prev {
	left: 39px;
}
.choose-section .choose-main .choose-nav > div.choose-next {
	right: 39px;
}
.choose-section .choose-thumbnail {
	border: none;
	margin-bottom: 20px;
}
.choose-section .choose-thumbnail .owl-item .item {
	border: 10px solid #f6f6f6;
	cursor: pointer;
}
.choose-section .choose-thumbnail .owl-item.active.current .item {
	border-color: #4570c6;
}
.choose-section .choose-thumbnail ul > li > img {
	border: 10px solid #f6f6f6;
	cursor: pointer;
}
.choose-section .choose-thumbnail ul > li.flex-active-slide > img {
	border-color: <?php echo $headers->theme_color ?>;
}
.choose-content {
	border: none;
}
.choose-slide-content h3 {
	color: #222;
	font-size: 18px;
	font-family: 'Playfair Display', serif;
	font-weight: bold;
	text-transform: uppercase;
	line-height: 1.556;
	letter-spacing: 0.72px;
}
.choose-slide-content span {
	color: #888888;
	letter-spacing: 0.56px;
	line-height: 2;
}
.choose-slide-content h2 {
	color: <?php echo $headers->theme_color ?>;
	font-size: 30px;
	font-family: 'Playfair Display', serif;
	font-weight: bold;
	letter-spacing: 0.56px;
	text-transform: uppercase;
	line-height: 2;
}
.choose-slide-content h2 sub {
	color: #888;
	font-size: 18px;
	font-weight: normal;
}
.choose-slide-content p {
	font-size: 13px;
	color: #888;
	line-height: 1.846;
}
.choose-slide-content .laguage-detail {
	display: inline-block;
	width: 100%;
}
.choose-slide-content .laguage-detail > span {
	font-size: 13px;
	color: #222;
	line-height: 2.154;
	text-transform: capitalize;
	display: inline-block;
}
.choose-slide-content .laguage-detail > span + span {
	margin-left: 35px;
}
.choose-slide-content .laguage-detail > span > i {
	color: <?php echo $headers->theme_color ?>;
	font-size: 15px;
	margin-right: 7px;
}
.choose-slide-content a {
	background-color: <?php echo $headers->theme_color ?>;
	border-radius: 6px;
	color: <?php echo $headers->btn_color ?>;
	display: inline-block;
	font-size: 13px;
	font-weight: bold;
	padding: 9px 32px;
	text-transform: uppercase;
	letter-spacing: 0.52px;
	line-height: 1.89;
	margin-top: 32px;
	text-decoration: none;
	-webkit-transition: all 1s ease 0s;
	-moz-transition: all 1s ease 0s;
	-o-transition: all 1s ease 0s;
	transition: all 1s ease 0s;
}
.choose-slide-content a:hover {
	background-color: #000;
	color: <?php echo $headers->theme_color ?>;
}
.choose-section .choose-img {
	margin-top: 32px;
}

/* - Contact Section */
.contact-section   {
	background-color: #fff;
	padding-bottom: 89px;
	padding-top: 140px;
}
.contact-section .container .row > [class*="col-"] {
	border-right: 1px solid #e0e0e0;
}
.contact-section .container .row > [class*="col-"]:nth-child(3n) {
    border-right: medium none;
}
.contact-section  .contact-box {
	text-align: center;
	padding-bottom: 12px;
	padding-top: 7px;
}
.contact-section  .contact-box i {
	font-size: 30px;
	line-height: 1.8;
	border: 2px solid <?php echo $headers->theme_color ?>;
	height: 55px;
	width: 55px;
	border-radius: 50%;
	margin-bottom: 43px;
}
.contact-section  .contact-box h2 {
	font-size: 18px;
	line-height: 1.333;
	letter-spacing: 0.72px;
	color: #222;
	font-family: "Arial";
	text-transform: uppercase;
	font-weight: bold;
	margin-bottom: 20px;
}
.contact-section  .contact-box p {
	font-size: 14px;
	line-height: 1.714;	
	letter-spacing: 0.56px;
	color: #909090;
	font-family: "Arial";
	text-decoration: none;
	margin-bottom: 0;
}
.contact-section  .contact-box p > b {
	color: #000;
	text-transform: capitalize;
}
.contact-section  .contact-box p a {
	color: #888;
	text-decoration: none;
	-webkit-transition: all 1s ease 0s;
	-moz-transition: all 1s ease 0s;
	-o-transition: all 1s ease 0s;
	transition: all 1s ease 0s;
}
.contact-section  .contact-box p a:hover {
	color: <?php echo $headers->theme_color ?>;
}
.contact-img {
	text-align: center;
}

/* - Contact Form */
.contact-form {
	margin-bottom: 120px;	
}
.contact-form h3 {
	font-size: 14px;
	line-height: 2.14;
	letter-spacing: 0.462px;
	color: #232323;
	font-family: 'Playfair Display', serif;
	font-weight: bold;
	text-transform: uppercase;
	margin-bottom: 10px;
}
.contact-form .form-group {
	margin-top: 12px;
	margin-bottom: 7px;
}
.contact-form .form-group .form-control {
	border: 1px solid #e5e5e5;
	-webkit-box-shadow: none;
	-webkit-appearance: none;
	box-shadow: none;
	color: #888;
	font-family: "Arial";
	font-weight: 400;
	font-size: 13px;
	letter-spacing: 0.429px;
	line-height: 2.308;
	outline: none;
	padding: 10px 25px;
}
.contact-form .form-group .submit {
	background-color: <?php echo $headers->theme_color ?>;
	-webkit-box-shadow: none;
	-webkit-appearance: none;
	box-shadow: none;
	outline: none;
	cursor: pointer;
	font-size: 14px;
	line-height: 2.14px;
	letter-spacing: 0.462px;
	color: <?php echo $headers->btn_color ?>;
	font-family: "Arial";
	font-weight: bold;
	padding: 21px 35px;
	text-transform: uppercase;
	border: none;
	border-radius: 4px;
	margin-top: 21px;
	-webkit-transition: all 1s ease 0s;
	-moz-transition: all 1s ease 0s;
	-o-transition: all 1s ease 0s;
	transition: all 1s ease 0s;
}
.contact-form .form-group .submit:hover {
	background-color: #222;
	color: <?php echo $headers->theme_color ?>;
}
.contact-form img {
	padding-left: 85px;
}

/* - Alert Msg */
.alert-msg {
	color: #ccc;
	width: 100%;
	margin: 10px 0;
	display: inline-block;
	z-index: 1;
	bottom: -50px;
	left: 80px;
	margin: 15px;
}
.alert-msg-success {
	color: #50B948;
}
.alert-msg-failure {
	color: #FF0000;
}

/* - Map Section */
.map-section {
	border-radius: 5px;
	overflow: hidden;
}
.map-section .map-canvas {
	height: 416px;
}

/* - Error Section */
.error-block {
	border: 3px solid #e0e0e0;
	background-color: #fafafa;
	border-radius: 4px;
	padding: 79px 60px 79px 87px;
	text-align: center;
	max-width: 100%;
	width: 702px;
	margin: 145px auto;
}
.error-block img{
	margin-bottom: 16px;
}
.error-block h2 {
	color: #000;
	font-family: "Arial";
	font-size: 24px;
	letter-spacing: 0.96px;
	line-height: 2;
}
.searchbox {
	margin: 20px auto 0;
	max-width: 359px;
	border: 1px solid #e0e0e0;
	background-color: transparent;
	border-radius: 6px;
}
.searchbox .input-group .form-control{
	border: none;
	font-size: 13px;
	line-height: 2.15;
	letter-spacing: 0.52px;
	color: #888;
	background-color: transparent;
	padding-left: 22px;
}
.searchbox .input-group .input-group-btn .btn {
	background-color: transparent;
	color: #979797;
	padding-right: 20px;
}
.searchbox .input-group .input-group-btn .btn i {
	font-size: 13px;
}
.error-section .error-block a:hover {
	background-color: #000;	
	color: #fff;
	-webkit-transition: all 1s ease 0s;
	-moz-transition: all 1s ease 0s;
	-o-transition: all 1s ease 0s;
	transition: all 1s ease 0s;
}
.error-block a {
	background-color: <?php echo $headers->theme_color ?>;
	border-radius: 5px;
	color: #222;
	display: inline-block;
	font-family: "Arial";
	font-size: 13px;
	font-weight: bold;
	letter-spacing: 0.52px;
	line-height: 1.692;
	margin-top: 40px;
	padding: 12px 28px;
	text-decoration: none;
	text-transform: uppercase;
}

/* ========================================================================== */
/* ========================================================================== */
							/* [ + Responsive ] */
/* ========================================================================== */
/* ========================================================================== */
/* - min-width: 1600 */
@media (min-width: 1600px) {
	/* - App Counter Section */
	.app-counter-section .mobile-img {
		position: absolute;
		left: 0;
		top: 50%;
		transform: translate(0%, -50%);
		-webkit-transform: translate(0%, -50%);
		-moz-transform: translate(0%, -50%);
		-ms-transform: translate(0%, -50%);
		width: 25.71875%;
		display: block;
	}
}

/* - min-width: 1200 */
@media (min-width: 1200px) {
	/* - Blog */
	.content-area {
		flex: 0 0 71%;
		max-width: 71%;
	}
	.widget-area {
		flex: 0 0 29%;
		max-width: 29%;
		padding-left: 25px;
	}
}

/* - min-width: 992 */
@media (min-width: 992px) {
	/* - Menu Search */
	.menu-search {
		margin-left: 48px;
		margin-right: 65px;
	}
	.menu-search > a {
		width: 17px;
		height: 17px;
	}
	/* + Header */
	.header_s .top-header .cnt-detail {
		display: flex;
	}
	.header_s .top-header .cnt-detail > p, 
	.header_s .top-header .cnt-detail > ul {
		display: inline-flex;
	}
	.header_s .top-header .cnt-detail > p + p {
		margin-left: 30px;
	}
	.header_s .top-header .cnt-detail > ul:last-child li:last-child {
		margin-right: 0;
	}
	
	/* - Menu Block */
	.header_s1 .menu-block { 
		position: absolute;
		left: 0;
		right: 0;
		margin-top: 10px;
		z-index: 1;
	}
	.header_s .menu-block .ownavigation > .container::before {
		background-color: <?php echo $headers->theme_color ?>;
		content: "";
		position: absolute;
		left: 15px;
		right: 15px;
		top: 0;
		bottom: 0;
	}
	.header_s .menu-block .ownavigation a.navbar-brand.image-logo {	
		max-width: 320px;
	}
	.header_s .menu-block .ownavigation .navbar-nav > li {
		margin: 0 18px;
	}
	.header_s .menu-block .ownavigation .navbar-nav > li > a {
		padding: 44px 0;
		margin: 0;
		position: relative;
	}
	.header_s .menu-block .ownavigation .navbar-nav > li > a::before {
		background-color: #000;
		content: "";
		position: absolute;
		left: 0;
		width: 0;
		height: 5px;
		bottom: 0;
		-webkit-transition: all 0.5s ease 0s;
		-moz-transition: all 0.5s ease 0s;
		-o-transition: all 0.5s ease 0s;
		transition: all 0.5s ease 0s;
	}
	.header_s .menu-block .ownavigation .navbar-nav > .active > a::before, 
	.header_s .menu-block .ownavigation .navbar-nav > .active > a:focus::before, 
	.header_s .menu-block .ownavigation .navbar-nav > .active > a:hover::before, 
	.header_s .menu-block .ownavigation .navbar-nav > li:hover > a::before, 
	.header_s .menu-block .ownavigation .navbar-nav > li > a:hover::before {
		width: 100%;
	}
	.header_s .ownavigation.navbar-expand-lg .navbar-collapse {
		flex-basis: auto;
		margin-right: 0;
		margin-left: auto;
	}
	.header_s .ownavigation .navbar-nav {
		margin-left: auto;
	}
	.header_s .menu-block .ownavigation .navbar-nav > li.dropdown .dropdown-menu {
		background-color: transparent;
		border: none;
	}
	.header_s .menu-block .ownavigation .navbar-nav > li.dropdown > .dropdown-menu > li {
		margin-bottom: 1px;
	}
	.header_s .menu-block .ownavigation .navbar-nav > li.dropdown > .dropdown-menu > li:last-child {
		margin-bottom: 0;
	}
	.header_s .menu-block .ownavigation .navbar-nav > li.dropdown .dropdown-menu > li > a {
		background-color: #fafafa;
		border: 4px solid transparent;
		padding: 5px 20px;
		text-align: center;
	}
	.header_s .menu-block .ownavigation .navbar-nav > li.dropdown > .dropdown-toggle::after,
	.header_s .menu-block .ownavigation .navbar-nav > li.dropdown > .dropdown-menu .dropdown-toggle::after {
		display: none;
	}
	.header_s .menu-block .ownavigation .navbar-nav > li.dropdown .dropdown-menu > li > a:hover {
		border-color: <?php echo $headers->theme_color ?>;
	}	
	.header_s.fixed-top .ownavigation.navbar-expand-lg .navbar-collapse {
		flex-basis: 100%;
	}
	.header_s1.fixed-top .menu-block {
		position: fixed;
		margin-top: 0;
		top: 0;
	}
	.header_s.fixed-top .ownavigation .navbar-nav {
		margin: 0 auto;
	}
	.header_s.fixed-top .menu-block .ownavigation a.navbar-brand  {
		display: none;
	}
	.header_s.fixed-top .menu-block .ownavigation .navbar-nav > li > a {
		padding-top: 15px;
		padding-bottom: 15px;
	}
	
	/* - Header Section 2 */
	.header_s2 {
		position: absolute;
		left: 0;
		right: 0;
		z-index: 1030;
	}
	.header_s2.fixed-top {
		position: fixed;
	}
	.header_s2 .top-header {
		padding-bottom: 27px;
		padding-top: 27px;
	}
	
	/* + Page Banner */
	.page-banner {
		padding-top: 310px;
	}
	
	/* - Footer Widget */
	.footer-widget .row > [class*="col-"]:nth-child(n+5) {
		margin-top: 40px;
	}
	
	/* - About Section */
	.about-section .about-img {
		text-align: right;
	}
	
	/* - What We Do Section */
	.what-we-do-section .row  .what-do-box:nth-child(odd) {
		padding-right: 215px;
	}
	.what-we-do-section  .row .what-do-box:nth-child(even) {
		padding-left: 215px;
	}
	.what-we-do-section  .img-block {
		position: absolute;
		left: 0;
		text-align: center;
		top: 50%;
		right: 0;
		margin: 0 auto;
		transform: translate(0%, -50%);
		-webkit-transform: translate(0%, -50%);
		-moz-transform: translate(0%, -50%);
		-ms-transform: translate(0%, -50%);
		max-width: 32.31%;
		margin-top: 5px;
	}
	
	/* - Amenities Section */
	.Amenities-section .row [class*="col-"]:nth-child(n+5) {
		margin-top: 40px;
	}
	
	/* - Testimonial Carousel 1 */
	.testimonial-section {
		margin-left: auto;
		margin-right: 0;
		padding-left: 45px;
	}
	.testimonial-section .testi-img-block  .testi-nav div.testi-prev { 
		margin-left: 14%;
	}
	.testimonial-section .testi-img-block  .testi-nav div.testi-next { 
		margin-right: 14%;
	}
	
	/* - Team Section */
	.team-section .row > [class*="col-"]:nth-child(n+5) {
		margin-top: 30px;
	}
	
	/* - Blog */
	.blog-box .entry-cover .entry-meta {
		display: flex;
		align-items: center;
	}
}

/* - min-width: 768 */
@media (min-width: 768px) {
	/* - Bottom Footer */
	.bottom-footer .ftr-content {
		display: flex;
	}
	.bottom-footer .ftr-content ul {
		margin-bottom: 0;
		width: auto;
	}
	.bottom-footer .ftr-content p {
		width: auto;
		margin-right: 0;
		margin-left: auto;
	}
	
	/* - What We Do Section */
	.what-we-do-section  .row [class*="col-"]:nth-child(n+3) {
		margin-top: 60px;
	}
	
	/* - Single Post */
	.single-post .entry-footer .social-share {
		display: flex;
	}
}

/* - max-width: 1599 */
@media (max-width: 1599px) {
	/* - App Counter Section */ 
	.app-counter-section .row > [class*="col-"] {
		max-width: 50%;
		flex: 0 0 50%;
	}
}

/* - max-width: 1199 */
@media (max-width: 1199px) {
	/* - Book Taxi Section */
	.book-taxi-section form .form-group.des-to .form-control {
		max-width: 175px;
	}
	.book-taxi-section form .form-group.des-to .form-control.time {
		max-width: 60px;
		padding-left: 17px;
		padding-right: 17px;
	}
	
	/* - App Counter Section */
	.app-counter-section {
		padding-bottom: 90px;
		padding-top: 90px;
	}
	
	/* - Blog Single */
	.comment-list .children {
		padding-left: 0;
	}
}	

/* - min to max: 992 to 1199 */
@media only screen and (min-width: 992px) and (max-width: 1199px) {
	/* - Menu Search */
	.menu-search {
		margin-left: 10px;
		margin-right: 17px;
	}
	
	/* + Header */
	.header_s .menu-block .ownavigation a.navbar-brand { 
		font-size: 24px;
		padding-bottom: 39px;
		padding-top: 39px;
	}
	.header_s .menu-block .ownavigation a.navbar-brand.image-logo {
		padding-left: 45px;
		padding-right: 90px;
	}
	.header_s .menu-block .ownavigation .navbar-nav > li {
		margin: 0 10px;
	}
	
	/* - What We Do Section */
	.what-we-do-section  .row .what-do-box:nth-child(odd) {
		padding-right: 127px;
	}
	.what-we-do-section  .row .what-do-box:nth-child(even) {
		padding-left: 127px;
	}
	.what-we-do-section  .img-block {
		position: absolute;
		left: 0;
		text-align: center;
		top: 50%;
		right: 0;
		margin: 0 auto;
		transform: translate(0%, -50%);
		-webkit-transform: translate(0%, -50%);
		-moz-transform: translate(0%, -50%);
		-ms-transform: translate(0%, -50%);
		max-width: 24%;
	}
	
	/* - Latest Blog */
	.latest-blog .blog-box .entry-content {
		padding-top: 10px;
		padding-left: 15px;
	}
	.latest-blog .blog-box .entry-content .entry-footer > span + span {
		margin-left: 10px;
	}
}

/* - max-width: 991 */
@media (max-width: 991px) {
	/* - Menu Search */
	.menu-search {
		position: absolute;
		right: 89px;
		top: 43px;
	}
	
	/* + Header */
	.header_s .top-header .cnt-detail {
		text-align: center;
		padding: 5px 0;
	}
	.header_s .top-header .cnt-detail > p {
		display: inline-block;
		margin: 5px 10px;
	}
	
	/* - Menu Block */
	.header_s .menu-block { 
		background-color: <?php echo $headers->theme_color ?>;
	}
	.header_s .desktop-hide {
		top: 33px;
		right: 53px;
	}
	.header_s .menu-block .ownavigation {
		padding: 0;
	}
	.header_s .menu-block .ownavigation a.navbar-brand {
		margin-left: 15px;
		font-size: 24px;
		letter-spacing: 0.5px;
		padding-left: 15px;
		padding-right: 40px;
	}
	.header_s .menu-block .ownavigation a.navbar-brand.image-logo {
		padding: 15px 35px 15px 15px;
		margin-left: 15px;
	}
	.header_s .menu-block .ownavigation .navbar-toggler {
		margin-right: 15px;
		border: none;
		padding: 0;
		color: #000;
		cursor: pointer;
	}
	.header_s .menu-block .ownavigation .navbar-toggler:hover {		
		color: #fff;
	}
	.header_s .menu-block .ownavigation .navbar-collapse {
		padding-left: 15px;
		padding-right: 15px;
	}
	.header_s .menu-search > a {
		font-size: 17px;
		width: 18px;
		height: 18px;
	}
	.header_s .menu-search .search .sr-ic-close {
		font-size: 25px;
		margin-top: -5px;
	}
	.header_s .menu-block .ownavigation {
		padding-top: 0;
		padding-bottom: 0;
	}
	.header_s .menu-block .ownavigation .navbar-nav > .active > a, 
	.header_s .menu-block .ownavigation .navbar-nav > .active > a:focus, 
	.header_s .menu-block .ownavigation .navbar-nav > .active > a:hover, 
	.header_s .menu-block .ownavigation .navbar-nav > li:hover > a, 
	.header_s .menu-block .ownavigation .navbar-nav > li > a:hover {
		color: #fff;
	}
	.header_s .slideit, 
	.header_s .closeit {
		color: #000;
	}
	.header_s .slideit:hover, 
	.header_s .closeit:hover {
		color: #fff;
	}
	.header_s .ownavigation .ddl-switch {
		background-color: #000;
		color: #fff;
	}
	.header_s .menu-block .ownavigation .navbar-nav > li.dropdown .dropdown-menu > li > a:hover {
		color: #fff;
	}
	.header_s.fixed-top .menu-block .ownavigation a.navbar-brand {
		display: none;
	}
	.header_s.fixed-top .desktop-hide {
		display: none;
	}
	.header_s.fixed-top .menu-block .ownavigation .navbar-toggler {
		margin: 10px auto;
	}
	
	/* - Header Section 2 */
	.header_s2 .top-header {
		background-color: #000;
	}
	
	/* - Footer Widget */
	.footer-widget .row > [class*="col-"]:nth-child(n+3) {
		margin-top: 40px;
	}
	
	/* - Slider Section */
	 #taxi-2 .slider-form form .form-group {
        padding: 0 10px !important;
    }
    #taxi-2 .slider-form form .form-group,
    #taxi-2 .slider-form form .form-group.submit-btn {
        flex: 0 0 50% !important;
        max-width: 50% !important;
    }
    #taxi-2 .slider-form form .form-group {
        margin-bottom: 7px !important;
    }
    #taxi-2 .slider-form form .form-group .form-control {
        padding-top: 3px !important;
        padding-bottom: 3px !important
    }
    #taxi-2 .slider-form form .form-group.submit-btn button {
        padding-bottom: 6px !important;
        padding-top: 6px !important;
    }
	
	/* - About Section */
	.about-section {
		padding-top: 90px;
		padding-bottom: 90px;
	}
	.about-section .about-img {
		text-align: center;
		margin-top: 50px;
	}
	
	/* - What We Do Section */
	.what-we-do-section  .img-block {
		display: none;
	}
	.what-we-do-section {
		padding-bottom: 90px;
		padding-top: 90px;
	}
	
	/* - Book Taxi Section */
	.book-taxi-section {
		padding-bottom: 90px;
		padding-top: 90px;
	}
	.book-taxi-section form .form-group.des-to .form-control {
		max-width: 170px;
	}
	.book-taxi-section form .form-group.des-to .form-control.time {
		max-width: 55px;
		padding-left: 15px;
		padding-right: 15px;
	}
	.book-taxi-section form .form-group.des-to span {
		margin: 0 6px;
	}
	
	/* - Amenities Section */
	.Amenities-section {
		padding-bottom: 90px;
		padding-top: 90px;
	}
	.Amenities-section .row [class*="col-"]:nth-child(n+4) {
		margin-top: 40px;
	}
	
	/* - Testimonial Section */
	.testimonial-section {
		padding-bottom: 90px;
		padding-top: 90px;
	}
	
	/* - Team Section */
	.team-section {
		padding-bottom: 90px;
		padding-top: 90px;
	}
	.team-section .row > [class*="col-"]:nth-child(n+3) {
		margin-top: 30px;
	}
	.team-section .team-box {
		max-width: 270px;
		display: block;
		margin: 0 auto;
	}
	
	/* - Blog */
	.blog-box .entry-cover .entry-meta .posted-on {
		padding-left: 0;
	}
	.blog-box .entry-cover .entry-meta .posted-on,
	.blog-box .entry-cover .entry-meta .author {
		display: inline-block;
	}
	.blog-box .entry-cover .entry-meta .author {
		position: relative;
		top: -5px;
	}
	.blog-box .entry-cover .entry-meta .author > span:last-of-type {
		margin-bottom: 0;
	}
	.blog-box .entry-cover .entry-meta .post-count {
		margin-top: 10px;
	}
	/* - Blog Single */
	.post-author .author-detail {
		padding-left: 115px;
	}
	.post-author .author-detail > img {
		width: 100px;
	}
	.post-author .author-detail > ul > li {
		margin: 0;
	}
	.post-author .author-detail > ul > li > a {
		height: 30px;
		line-height: 2.5;
		width: 30px;
	}
	.comment-body {
		margin-bottom: 40px;
	}
	.comment-list .children {
		margin-left: 0;
	}
	.comment-body .reply {
		position: relative;
		right: 0;
		top: 0;
		margin-top: 10px;
		margin-bottom: 20px;
	}
	.comments-area .comment-form-author,
	.comments-area .comment-form-email,
	.comments-area .comment-form-url,
	.comments-area .comment-form-comment {
		width: 100%;
	}
	/* - Latest Blog */
	.miscellaneous-section .row > [class*="col-"]:nth-child(n+2) {
		margin-top: 50px;
	}
	
	.miscellaneous-section {
		padding-bottom: 90px;
		padding-top: 90px;
	}
	
	/* - Choose Section */
	.choose-section {
		padding-bottom: 90px;
		padding-top: 90px;
	}
	.choose-section .choose-main .choose-nav > div {
		top: 10px;
	}
	
	/* - Contact Section */
	.contact-img  {
		margin-top: 50px;
	}
}

/* - min to max: 768 to 991 */
@media only screen and (min-width: 768px) and (max-width: 991px) {
	/* - Latest Blog */
	.latest-blog .blog-box .entry-cover {
		width: 32.39%
	}
	.latest-blog .blog-box .entry-content {
		width: 67.61%;
	}
}

/* - max-width: 767 */
@media (max-width: 767px) {
	/* - Seaction Header */
	.section-header h3 { 
		font-size: 26px;
	}
	.section-header p {
		padding-left: 5%;
		padding-right: 5%;
	}
	/* - Footer Widget */
	.footer-widget .row > [class*="col-"]:nth-child(n+2) {
		margin-top: 40px;
	}
	/* - Slider Section */
	#taxi-2 .slider-form form .form-group,
    #taxi-2 .slider-form form .form-group.submit-btn {
        flex: 0 0 50% !important;
        max-width: 50% !important;
    }
	
	/* - What We Do Section */
	.what-we-do-section  .row [class*="col-"]:nth-child(n+2) {
		margin-top: 30px;
	}
	
	/* - Book Taxi Section */
	.book-taxi-section form .form-group.car-type span:last-child {
		display: block;
		margin-left: 0;
		margin-top: 20px;
	}
	.book-taxi-section form .form-group.car-type span:last-child input {
		margin-left: 0;
	}
	
	/* - Amenities Section */
	.Amenities-section .row [class*="col-"]:nth-child(n+3) {
		margin-top: 40px;
	}
	
	/* - App Counter Section */ 
	.app-counter-section .container > .row > [class*="col-"] {
		max-width: 100%;
		flex: 0 0 100%;
	}
	.counter-block {
		margin-top: 50px;
	}
	
	/* - Blog */
	.widget-area {
		margin-top: 60px;
	}
	
	/* - Latest Blog */
	.latest-blog .blog-box .entry-content .entry-footer > span + span {
		margin-left: 10px;
	}
	
	/* - Faq Section */
	.faq-section .section-header h3 {
		font-size: 26px;
	}
	
	/* - Choose Section */
	.choose-section .nav-tabs li.nav-item > a {
		padding-left: 35px;
		padding-right: 35px;
	}
	.choose-section .choose-main .choose-nav > div {
		width: 30px;
		height: 31px;
		line-height: 2.21;
		top: 5%;
	}
	.choose-section .choose-main .choose-nav > div.choose-prev {
		left: 20px;
	}
	.choose-section .choose-main .choose-nav > div.choose-next {
		right: 20px;
	}
	
	/* - Error Section */
	.error-block {
		padding-left: 30px;
		padding-right: 30px;
	}
}

/* - max-width: 575 */
@media (max-width: 575px) {
	/* - Team Section */
	.team-section .row > [class*="col-"]:nth-child(n+2) {
		margin-top: 30px;
	}
	
	/* - Blog Single */
	.comment-body {
		padding-left: 0;
		padding-right: 0;
	}
	.comment-meta {
		position: relative;
		padding-left: 95px;
		margin-bottom: 20px;
		min-height: 70px;
	}
	.comment-author .avatar {
		width: 70px;
	}
	/* - Latest Blog */
	.latest-blog .blog-box .entry-content {
		padding-top: 10px;
		padding-left: 15px;
	}
	.request-form form .author-mail,
	.request-form form .author-subject {
		width: 100%;
	}
	
	/* - Choose Section */
	.choose-section .nav-tabs li.nav-item > a { 
		padding: 10px 15px;
	}
}

/* - max-width: 479 */
@media (max-width: 479px) {
	/* - Slider Section */
	#taxi-2 .slider-form form .form-group,
    #taxi-2 .slider-form form .form-group.submit-btn {
        flex: 0 0 100% !important;
        max-width: 100% !important;
        padding: 0 !important;
    }
    #taxi-2 .slider-form form .form-group {
        margin-bottom: 7px !important;
    }
    #taxi-2 .slider-form form .form-group .form-control {
        padding-top: 3px !important;
        padding-bottom: 3px !important;
    }
    #taxi-2 .slider-form form .form-group.submit-btn button {
        padding-bottom: 2px !important;
        padding-top: 2px !important;
    }
	
	/* - Amenities Section */
	.Amenities-section .row > [class*="col-"] {
		flex: 0 0 100%;
		max-width: 100%;		
	}
	.Amenities-section .row > [class*="col-"]:nth-child(n+2) {
		margin-top: 40px;
	}
	.Amenities-section .image-content-box,
	.Amenities-section .cnt-detail {
		display: block;
		max-width: 257px;
		margin: 0 auto;
	}
	
	/* - Testimonial Section */
	.testimonial-section .testi-carousel {
		z-index: 1;
	}
	.testimonial-section .testi-carousel .owl-item > div {
		text-align: center;
	}
	.testimonial-section .testi-carousel a {
		display: inline-block;
		width: auto;	
	}
	.testimonial-section .testi-img-block .testi-nav div {
		z-index: 2;
	}
	
	/* - App Counter Section */
	.counter-block .row > [class*="col-"] {
		flex: 0 0 100%;
		max-width: 100%;
	}
	.counter-block .row > [class*="col-"]:nth-child(n+2) {
		margin-top: 10px;
	}
	.counter-block .counter-box {
		display: block;
		max-width: 220px;
		margin: 0 auto;
	}
	.counter-block .counter-box::before,
	.counter-block .counter-box::after { 
		display: none;
	}
	
	/* - Latest Blog */
	.latest-blog .blog-box {
		display: block;
		max-width: 252px;
		margin: 0 auto;
	}
	.latest-blog .blog-box .entry-cover,
	.latest-blog .blog-box .entry-content,
	.miscellaneous-section-2 .latest-blog .blog-box .entry-cover,
	.miscellaneous-section-2 .latest-blog .blog-box .entry-content {
		width: 100%;
	}
	.latest-blog .blog-box .entry-cover  > a {
		max-width: 223px;
		margin: 0 auto;
		display: block;
	}
	.latest-blog .blog-box .entry-content {
		border-top: none;
		padding-left: 0;
	}
	.miscellaneous-section-2 .latest-blog .blog-box .entry-content {
		padding-right: 0;
	}
	
	/* - Choose Section */
	.choose-section .nav-tabs li.nav-item > a { 
		font-size: 11px;
	}
}

/* - max-width: 360 */
@media (max-width: 360px) {
	/* - Book Taxi Section */
	.book-taxi-section form .form-group.des-to span {
		margin-left: 1px;
		margin-right: 1px;
	}
	.book-taxi-section form .form-group.des-to .form-control {
		max-width: 160px;
	}
	.book-taxi-section form .form-group.des-to .form-control.time {
		width: 50px;
		padding-left: 12px;
		padding-right: 12px;
	}
}

/* ========================================================================== */
/* ========================================================================== */
							/* [ + Elements ] */
/* ========================================================================== */
/* ========================================================================== */
/* --------------------------------------------------------------------------------------------------------------------------------------------*/
/* ========================================================================== */
/* ========================================================================== */
							/* [ + Widgets ] */
/* ========================================================================== */
/* ========================================================================== */

.widget + .widget {
	margin-top: 45px;
}
.widget:last-child {
	margin-bottom: 0;
}
.widget-title {
	color: #222;
	font-family: 'Playfair Display', serif;
	font-size: 14px;
	font-weight: bold;
	letter-spacing: 0.56px;
	line-height: 1.71;
	margin-bottom: 20px;
	text-transform: uppercase;
}

/* - Widget: Archives */
.widget_archive > ul {
	margin-bottom: 0;
	padding: 0;
}
.widget_archive > ul li {
    color: #909090;
    display: inline-block;
    font-size: 13px;
	line-height: 1.85;
	letter-spacing: 0.52px;
	position: relative;
	text-align: right;
	margin-bottom: 8px;
    text-decoration: none;
    width: 100%;
    text-transform: capitalize;
	-webkit-transition: all 1s ease 0s;
	-moz-transition: all 1s ease 0s;
	transition: all 1s ease 0s;
}
.widget_archive > ul li:last-child {
	margin-bottom: 0;
}
.widget_archive > ul li:hover {
	color: <?php echo $headers->theme_color ?>;
}
.widget_archive ul li a {
	color: #909090;
	font-size: 13px;
	-webkit-transition: all 1s ease 0s;
	-moz-transition: all 1s ease 0s;
	transition: all 1s ease 0s;
	text-decoration: none;
	float: left;
}
.widget_archive ul li a::before {
	content: "\f101";
	font-family: FontAwesome;
	color: #222;
	margin-right: 13px;
	display: inline-block;
}
.widget_archive ul li:hover a,
.widget_archive ul li a:hover {
	color: <?php echo $headers->theme_color ?>;
}

.screen-reader-text {
	display: none;
}
.widget_archive > select {
	border: 1px solid #e0e0e0;
	padding: 10px 12px;
	width: 100%;
	max-width: 100%;
}

/* - Widget: Calendar */
.widget_calendar #wp-calendar {
    width: 100%;
}
.widget_calendar table {
    margin: 0;
	width: 100%;
}
.widget_calendar table {
    margin: 0;
}
.widget_calendar td,
.widget_calendar th {
	color: #888;
    line-height: 2.3333;
    text-align: center;
    padding: 0;
	border: none;
}
.widget_calendar caption {
	background-color: <?php echo $headers->theme_color ?>;
	color: #fff;
    font-weight: 700;
    letter-spacing: 0.04em;
    margin: 0;
	text-align: center;
    text-transform: uppercase;
	caption-side: top;
}
.widget_calendar tbody a {
    background-color: transparent;
    color: <?php echo $headers->theme_color ?>;
    font-weight: 700;
    display: block;
	text-decoration: none;
}
.widget_calendar tbody #today {
	background-color: <?php echo $headers->theme_color ?>;
    color: #fff;
    font-weight: 700;
}
.widget_calendar #next,
.widget_calendar #prev {
	color: #fff;
}
.widget_calendar #next {
	text-align: right;
}
.widget_calendar #prev {
	text-align: left;
}
.widget_calendar #next a,
.widget_calendar #prev  a {
	background-color: <?php echo $headers->theme_color ?>;
	color: #fff;
	padding: 3px 10px;
	text-decoration: none;
}

/* - Widget: Categories */
.widget_categories > ul {
	margin-bottom: 0;
	padding: 0;
	position: relative;
}
.widget_categories > ul li {
	color: #909090;
    display: inline-block;
    font-size: 13px;
	line-height: 1.85;
	letter-spacing: 0.52px;
	position: relative;
	text-align: right;
	margin-bottom: 8px;
    text-decoration: none;
    width: 100%;
    text-transform: capitalize;
	-webkit-transition: all 1s ease 0s;
	-moz-transition: all 1s ease 0s;
	transition: all 1s ease 0s;
}
.widget_categories > ul ul {
	padding-left: 10px;
}
.widget_categories > ul li:last-child {
	margin-bottom: 0;
}
.widget_categories > ul ul.children {
	margin-top: 7px;
}
.widget_categories > ul ul.children li:last-child {
	padding-bottom: 0;
}
.widget_categories ul li a {
	color: #909090;
	font-size: 13px;
	-webkit-transition: all 1s ease 0s;
	-moz-transition: all 1s ease 0s;
	transition: all 1s ease 0s;
	text-decoration: none;
	float: left;
}
.widget_categories ul li a::before {
	content: "\f101";
	font-family: FontAwesome;
	color: #222;
	margin-right: 13px;
	display: inline-block;
}
.widget_categories ul > li:hover,
.widget_categories ul li:hover > a,
.widget_categories ul li > a:hover {
	color: <?php echo $headers->theme_color ?>;
}

.widget_categories select {
	border: 1px solid #e0e0e0;
	padding: 10px 12px;
	width: 100%;
}

/* - Widget: NavMenu */
.widget_nav_menu > div > ul:first-of-type {
	padding: 0;
	margin-bottom: 0;
}
.widget_nav_menu > div > ul ul {
	padding-left: 10px;
}
.widget_nav_menu ul li {
	position: relative;
	list-style: none;
}
.widget_nav_menu ul li:hover::before,
.widget_nav_menu ul li::before {
	background: none;
}
.widget_nav_menu ul li a {
	color: #909090;
	display: block;
    font-size: 13px;
	line-height: 1.85;
	letter-spacing: 0.52px;
	padding-top: 5px;
	padding-bottom: 5px;
	text-decoration: none;
	transition: all 1s ease 0s;
	-webkit-transition: all 1s ease 0s;
	-moz-transition: all 1s ease 0s;
	width: 100%;
}
.widget_nav_menu ul li a::before {
	content: "\f101";
	font-family: FontAwesome;
	color: #222;
	display: inline-block;
	margin-right: 13px;
}
.widget_nav_menu ul li a:hover {
	color: <?php echo $headers->theme_color ?>;
}

/* - Widget : Meta */
.widget_meta ul {
	margin-bottom: 0;
	padding: 0;
}
.widget_meta ul li {
	list-style: none;
}
.widget_meta ul li a {
	color: #909090;
	display: block;
    font-size: 13px;
	line-height: 1.85;
	letter-spacing: 0.52px;
	padding-top: 5px;
	padding-bottom: 5px;
	text-decoration: none;
	transition: all 1s ease 0s;
	-webkit-transition: all 1s ease 0s;
	-moz-transition: all 1s ease 0s;
	width: 100%;
}
.widget_meta ul li a::before {
	content: "\f101";
	font-family: FontAwesome;
	color: #222;
	display: inline-block;
	margin-right: 13px;
}
.widget_meta ul li:hover a{
	color: <?php echo $headers->theme_color ?>;
}

/* - Widget : Pages */
.widget_pages > ul {
	padding: 0;
	margin-bottom: 0;
}
.widget_pages > ul li {
	position: relative;
	list-style: none;
}
.widget_pages > ul li a {
	color: #909090;
	display: block;
    font-size: 13px;
	line-height: 1.85;
	letter-spacing: 0.52px;
	padding-top: 5px;
	padding-bottom: 5px;
	text-decoration: none;
	transition: all 1s ease 0s;
	-webkit-transition: all 1s ease 0s;
	-moz-transition: all 1s ease 0s;
	width: 100%;
}
.widget_pages ul li a::before {
	content: "\f101";
	font-family: FontAwesome;
	display: inline-block;
	color: #222;
	margin-right: 13px;
}
.widget_pages > ul li.current_page_item a {
	color: <?php echo $headers->theme_color ?>;
}
.widget_pages > ul li a:hover {
	color: <?php echo $headers->theme_color ?>;
}
.widget_pages > ul ul {
	padding-left: 10px;
}

/* - Widget : Recent Comments */
.widget_recent_comments ul {
	margin-bottom: 0;
	padding: 0;
}
.widget_recent_comments ul li {
	color: #909090;
    font-size: 14px;
	margin-bottom: 10px;
	list-style: none;
}
.widget_recent_comments ul li:last-of-type {
	margin-bottom: 0;
}
.widget_recent_comments ul li span {
	margin-right: 5px;
}
.widget_recent_comments ul li a {
	color: #909090;
	font-weight: 600;
	text-decoration: none;
}
.widget_recent_comments ul li a:hover {
	color: <?php echo $headers->theme_color ?>;
}

/* - Widget : Recent Entries */
.widget_recent_entries ul {
	margin-bottom: 0;
	padding: 0;
}
.widget_recent_entries ul li {
	display: inline-block;
	width: 100%;
	margin-bottom: 10px;
}
.widget_recent_entries ul li:last-of-type {
	margin-bottom: 0;
}
.widget_recent_entries ul li a {
	display: inline-block;
	color: #909090;
    font-size: 16px;
    line-height: 1.71;
	width: 100%;
	text-decoration: none;
	transition: all 1s ease 0s;
	-webkit-transition: all 1s ease 0s;
	-moz-transition: all 1s ease 0s;
}
.widget_recent_entries ul li a:hover {
	color: <?php echo $headers->theme_color ?>;
}
.widget_recent_entries ul li > span {
	color: <?php echo $headers->theme_color ?>;
    display: inline-block;
    font-size: 12px;
    letter-spacing: 0.18px;
    text-transform: capitalize;
}

/* - Widget : Search */
.widget.widget_search {
	padding: 0;
	border: none;
}
.widget_search .input-group {
	border: 1px solid #e0e0e0;
	border-radius: 5px;
}
.widget_search .input-group .form-control,
.widget_search .btn-default {
	border-radius: 0;
	outline: none;
	box-shadow: none;
	border: none;
	color: #000;
	-webkit-box-shadow: none;
	-webkit-appearance: none;
	box-shadow: none;
	font-size: 13.38px;
}
.widget_search .btn-default {
	padding: 6px 20px 6px 10px;
	background-color: transparent;
	color: #909090;
	cursor: pointer;
}
.widget_search .btn-default:hover {
	color: <?php echo $headers->theme_color ?>;
}
.widget_search .input-group .form-control {
	padding: 12px 25px;
	letter-spacing: 1.2px;
	color: #909090;
	background-color: transparent;
}
.widget_search .form-control::-webkit-input-placeholder {
	color: #909090;
}
.widget_search .form-control:-moz-placeholder {
	color: #909090;
}
.widget_search .form-control::-moz-placeholder {
	color: #909090;
}
.widget_search .form-control:-ms-input-placeholder {
	color: #909090;
}

/* - Widget: Tags */
.tagcloud {
	display: inline-block;
	margin-left: -5px;
	margin-right: -5px;
	padding: 0;
}
.tagcloud a {
	border: 1px solid #e0e0e0;
	display: inline-block;
	color: #909090;
    font-size: 13px !important;
	letter-spacing: 0.325px;
	line-height: 2.30;
	margin: 5px;
	padding: 0 25px;
	text-decoration: none;
	text-transform: capitalize;
	transition: all 1s ease 0s;
	-webkit-transition: all 1s ease 0s;
	-moz-transition: all 1s ease 0s;
}
.tagcloud a:hover {
	background-color: <?php echo $headers->theme_color ?>;
	border-color: transparent;
	color: #fff;
}

/* - Widget : Text */
.widget_text .textwidget p {
	color: #909090;
    font-size: 14px;
    line-height: 2;
    padding: 0;
    word-wrap: break-word;
}
.widget_text .textwidget p:last-of-type {
	margin-bottom: 0;
}
.widget_text .custom-html-widget {
	color: #909090;
    font-size: 14px;
    line-height: 2;
    padding: 0;
    word-wrap: break-word;
}

/* - Widget : Image */
.widget_media_image {
	text-align: center;
}
.widget_media_image .widget-title {
	text-align: left;
}

/* - Widget : Audio */
.widget_media_audio {
	text-align: center;
}
.widget_media_audio .widget-title {
	text-align: left;
}
.widget_media_audio iframe {
	border: none;
	max-width: 100%;
}

/* - Widget : Video */
.widget_media_video {
	text-align: center;
}
.widget_media_video .widget-title {
	text-align: left;
}
.widget_media_video iframe {
	border: none;
	max-width: 100%;
}

/* - Widget : Rss */
.widget_rss .widget-title > a {
	color: #222;
}
.widget_rss > ul {
	padding: 0;
}
.widget_rss > ul li {
	color: #909090;
	list-style: none;
	line-height: 1.85;
	letter-spacing: 0.75px;
}
.widget_rss > ul li a {
	color: <?php echo $headers->theme_color ?>;
}

/* - Custome Widget */

/* - Widget : Latest Posts */
.widget_latest_post .latest-content {
	display: inline-block;
	width: 100%;
}
.widget_latest_post .latest-post {
	display: inline-block;
	max-width: 100%;
	width: 100%;
	position: relative;
	padding-left: 100px;
	margin-bottom: 30px;
	min-height: 80px;
}
.widget_latest_post .latest-post:last-child {
	margin-bottom: 0;
}
.widget_latest_post  .latest-post.no_post_thumb {
	padding-left: 0;
}
.widget_latest_post .latest-post > a {
	position: absolute;
	left: 0;
	top: 0;
}
.widget_latest_post .latest-post h4 {
	color: #222;
	font-size: 14px;
	letter-spacing: 0.462px;
	line-height: 1.71;
	margin-bottom: 4px;
	margin-top: -4px;
}
.widget_latest_post .latest-post h4 > a {
	color: #222;
	text-decoration: none;
}
.widget_latest_post .latest-post h4 > a:hover {
	color: <?php echo $headers->theme_color ?>;
}
.widget_latest_post .latest-post span {
	color: #888;
	font-size: 12px;
	display: inline-block;
	letter-spacing: 0.3px;
	font-style: italic;
}
.widget_latest_post .latest-post span a {
	color: #888;
	-webkit-transition: all 1s ease 0s;
	-moz-transition: all 1s ease 0s;
	transition: all 1s ease 0s;
	text-decoration: none;
}
.widget_latest_post .latest-post span a + a {
	margin-left: 20px;
}
.widget_latest_post .latest-post span a:hover {
	color: <?php echo $headers->theme_color ?>;
}

/* - Widget : Newsletter */
.widget_newsletter .searchform .input-group .form-control {
	border: 1px solid #e0e0e0;
	border-radius: 0;
	-webkit-box-shadow: none;
	-webkit-appearance: none;
	box-shadow: none;
	outline: none;
	font-size: 13px;
	color: #888888;
	letter-spacing: 0.52px;
	padding: 13px 20px;
}
.widget_newsletter .searchform .input-group .form-control::-webkit-input-placeholder {
	color: #888888;
	opacity: 1;
}
.widget_newsletter .searchform .input-group .form-control:-moz-placeholder { 
	color: #888888;
	opacity: 1;
}
.widget_newsletter .searchform .input-group .form-control::-moz-placeholder {
	color: #888888;
	opacity: 1;
}
.widget_newsletter .searchform .input-group .form-control:-ms-input-placeholder {  
	color: #888888;
	opacity: 1;
}
.widget_newsletter .searchform .input-group .btn-default {
	background-color: <?php echo $headers->theme_color ?>;
    border: medium none;
    border-radius: 0;
    box-shadow: none;
    color: #000000;
    font-size: 13px;
    outline: medium none;
	padding: 13px 15px;
	cursor: pointer;
	-webkit-transition: all 1s ease 0s;
	-moz-transition: all 1s ease 0s;
	-o-transition: all 1s ease 0s;
	transition: all 1s ease 0s;
}
.widget_newsletter .searchform .input-group .btn-default:hover {
	background-color: #000000;
	color: <?php echo $headers->theme_color ?>;
}

/* - Widget : About */
.widget_about > p {
	color: #909090;
	font-size: 13px;
	letter-spacing: 0.429px;
	line-height: 1.85;
}
.widget_about > ul {
	padding: 0;
	margin-top: 5px;
	margin-bottom: 28px;
}
.widget_about > ul > li {
	display: inline-block;
	margin-right: 2px;
}
.widget_about > ul > li > a {
	border: 1px solid <?php echo $headers->theme_color ?>;
	border-radius: 50%;
	width: 34px;
	height: 34px;
	display: inline-block;
	line-height: 2.41;
	text-align: center;
	color: #000;
}
.widget_about > ul > li > a:hover {
	background-color: <?php echo $headers->theme_color ?>;
	border-color: transparent;
}
.widget_about .download-app {
	display: inline-block;
	width: 100%;
}
.widget_about .download-app > h4 {
	color: #222;
	font-size: 13px;
	letter-spacing: 0.429px;
	line-height: 1.846;
	margin-bottom: 17px;
	text-transform: uppercase;
}
.widget_about .download-app > ul {
	padding: 0;
	margin-bottom: 0;
}
.widget_about .download-app > ul > li {
	display: inline-block;
	margin-right: 2px;
}
.widget_about .download-app > ul > li > a {
	background-color: #222;
	border-radius: 15px;
	color: #fff;
	display: inline-block;
	padding: 5px 15px;
	-webkit-transition: all 1s ease 0s;
	-moz-transition: all 1s ease 0s;
	-o-transition: all 1s ease 0s;
	transition: all 1s ease 0s;
}
.widget_about .download-app > ul > li > a:hover {
	background-color: <?php echo $headers->theme_color ?>;
	color: #000;
}

/* - Widget : Info */
.widget_info > p {
	color: #909090;
	font-size: 13px;
	letter-spacing: 0.52px;
	line-height: 1.85;
	margin-bottom: 10px;
}
.widget_info > p > i {
	color: <?php echo $headers->theme_color ?>;
	margin-right: 7px;
}
.widget_info > p > a {
	color: var(--textwhite);
	text-decoration: none;
	-webkit-transition: all 1s ease 0s;
	-moz-transition: all 1s ease 0s;
	-o-transition: all 1s ease 0s;
	transition: all 1s ease 0s;
}
.widget_info > p > a:hover {
	color: <?php echo $headers->theme_color ?>;
}
.widget_info .widget_newsletter {
	margin-top: 25px;
}

/* - Custome Widget Over /- */

/* - Footer Widget */
.footer-widget .widget-title {
	color: #fff;
	margin-bottom: 22px;
	text-transform: uppercase;
	font-weight: 400;
	letter-spacing: 0.528px;
	line-height: 1.5;
	position: relative;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	padding-bottom: 15px;
}
.footer-widget .widget-title::before {
	background-color: <?php echo $headers->theme_color ?>;
	content: "";
	position: absolute;
	left: 0;
	bottom: 0;
	width: 35px;
	height: 3px;
}
.footer-widget .widget_about > p {
	color: var(--textwhite);
}
.footer-widget .widget_about > ul > li > a {
	color: #fff;
}
.footer-widget .widget_about > ul > li > a:hover {
	color: #000;
}
.footer-widget .widget_about .download-app > h4 {
	color: #fff;
}
.footer-widget .widget_latest_post .latest-post h4,
.footer-widget .widget_latest_post .latest-post h4 a {
	color: var(--textwhite);
}
.footer-widget .widget_latest_post .latest-post h4 a:hover {
	color: <?php echo $headers->theme_color ?>;
}
.footer-widget .widget_latest_post .latest-post span a {
	color: <?php echo $headers->theme_color ?>;
}
.footer-widget .widget_latest_post .latest-post span a:hover {
	color: #fff;
}
.footer-widget .widget_pages ul li {
	margin-bottom: 16px; 
}
.footer-widget .widget_pages ul li a {
	color: var(--textwhite);
	padding: 0;
	letter-spacing: 0.429px;
}
.footer-widget .widget_pages ul li a::before {
	color: <?php echo $headers->theme_color ?>;
}
.footer-widget .widget_info > p {
	color: var(--textwhite);
}
.footer-widget .widget_archive ul li a {
	color: var(--textwhite);
}
.footer-widget .widget_archive ul li a::before,
.footer-widget .widget_archive ul li:hover a, 
.footer-widget .widget_archive ul li a:hover {
	color: <?php echo $headers->theme_color ?>;
}
.footer-widget .widget_categories > ul li,
.footer-widget .widget_categories ul li a {
	color: var(--textwhite);
}
.footer-widget .widget_categories ul li a::before,
.footer-widget .widget_categories ul > li:hover, 
.footer-widget .widget_categories ul li:hover > a, 
.footer-widget .widget_categories ul li > a:hover {
	color: <?php echo $headers->theme_color ?>;
}
.footer-widget .widget_nav_menu ul li a {
	color: var(--textwhite);
}
.footer-widget .widget_nav_menu ul li a::before,
.footer-widget .widget_nav_menu ul li a:hover {
	color: <?php echo $headers->theme_color ?>;
}
.footer-widget .widget_meta ul li a {
	color: var(--textwhite);
}
.footer-widget .widget_meta ul li a::before,
.footer-widget .widget_meta ul li a:hover {
	color: <?php echo $headers->theme_color ?>;
}
.footer-widget .widget_rss .widget-title > a {
	color: #fff;
}
.footer-widget .widget_newsletter .searchform .input-group .btn-default:hover {
	background-color: #222;
}

/* - Responsive */
/* - min-width: 992 to max-width: 1199 */
@media only screen and (min-width: 992px) and (max-width: 1199px) {
	/* - Widget : Categories */
	.widget_categories > ul li a::before {
		margin: 0 10px 0 5px;
	}
}

/* ========================================================================== */
/* ========================================================================== */
							/* [ + Widgets Over ] */
/* ========================================================================== */
/* ========================================================================== */
/*  ---------------------------------------------------------------------------------------------------------------*/

/* - Padding/Margin */
.no-padding {
	padding: 0;
}
.no-left-padding{
	padding-left: 0;
}
.no-right-padding {
	padding-right: 0;
}
.no-top-padding {
	padding-top: 0;
}
.no-bottom-padding {
	padding-bottom: 0;
}
.no-margin {
	margin: 0;
}
.no-left-margin {
	margin-left: 0;
}
.no-right-margin {
	margin-right: 0;
}
.no-top-margin {
	margin-top: 0;
}
.no-bottom-margin {
	margin-bottom: 0;
}

/* - Section Padding */
.section-padding {
	padding-top: 75px;
	padding-bottom: 75px;
}
.padding-10 {
	padding-top: 5px;
	padding-bottom: 5px;
}
.padding-20 {
	padding-top: 10px;
	padding-bottom: 10px;
}
.padding-30 {
	padding-top: 15px;
	padding-bottom: 15px;
}
.padding-40 {
	padding-top: 20px;
	padding-bottom: 20px;
}
.padding-50 {
	padding-top: 25px;
	padding-bottom: 25px;
}
.padding-60 {
	padding-top: 30px;
	padding-bottom: 30px;
}
.padding-70 {
	padding-top: 35px;
	padding-bottom: 35px;
}
.padding-80 {
	padding-top: 40px;
	padding-bottom: 40px;
}
.padding-90 {
	padding-top: 45px;
	padding-bottom: 45px;
}
.padding-100 {
	padding-top: 50px;
	padding-bottom: 50px;
}
.vertical_middle {
	position: absolute;
	top: 50%;
	left: 0;
	right: 0;
	-webkit-transform: translate(0, -50%);
	-moz-transform: translate(0, -50%);
	-ms-transform: translate(0, -50%);
	transform: translate(0, -50%);
}
.nav_absolute {
	position: absolute;
}
.align_left {
	text-align: left;
}
.align_right {
	text-align: right;
}
.align_center {
	text-align: center;
}

/* - OW pull-left/pull-right */
.ow-pull-left  {
	float: left;
}
.ow-pull-right  {
	float: right;
}

.main-container {
	width: 1920px;
	max-width: 100%;
	margin: 0 auto;
}

/* - BG */
.white-bg {
	background-color: #fff;
}

.bg-gray {
	background-color: #fafafa;
}
.no-bg {
	background: none;
}
.no-overlay::before {
	display: none;
}

/* - Search */
.search-box {
	background-color: #303030;
	padding: 0;
	position: absolute;
	right: 15px;
	top: 100%;
	width: 260px;
	opacity: 1;
	transform: scaleY(1);
	-webkit-transform: scaleY(1);
	-moz-transform: scaleY(1);
	-ms-transform: scaleY(1);
	transform-origin: 0 0 0;
	transition: all 0.4s ease-in-out 0s;
	z-index: 101;
}
.search-box form {
	width: 100%;
	padding: 10px 0;
	display: block;
}
.search-box form input {
	background-color: transparent;
	box-shadow: none;
	border: none;
	border-radius: 0;
	color: #ccc;
	font-size: 14px;
	font-style: italic;
	height: auto;
}
.search-box form input:focus {
	background-color: transparent;
	box-shadow: none;
	-webkit-box-shadow: none;
	outline: none;
	border-color: #fff;
	color: #ccc;
}
.search-box form input::-webkit-input-placeholder {
	color: #ccc;
	opacity: 1;
}
.search-box form input:-moz-placeholder { 
	color: #ccc;
	opacity: 1;
}
.search-box form input::-moz-placeholder {
	color: #ccc;
	opacity: 1;
}
.search-box form input:-ms-input-placeholder {
	color: #ccc;
	opacity: 1;
}
.search-box .input-group-btn > .btn {
	padding: 0;
	background-color: transparent;
	border: none;
	box-shadow: none;
	outline: none;
	cursor: pointer;
}
.search-box span i {
	font-size: 15px;
	color: #fb2943;
	float: right;
	margin: 5px;
}

/*  + Ownavigation */
/* - SlidePanel */
.slidepanel { 
	display: block; 
}
.closeit,
.toggle,
.slideit {
	display: none;
}

/* - Navigation Menu */
.ownavigation .navbar-brand {
	height: auto;
	padding: 0;
	margin-top: 15px;
	margin-bottom: 15px;
}
.ownavigation .navbar-nav li  a {
	color: #232323;
	font-size: 13px;
	background-color: transparent;
	word-wrap: break-word;
	white-space: normal;
}
.ownavigation .navbar-nav > .active > a, 
.ownavigation .navbar-nav > .active > a:focus, 
.ownavigation .navbar-nav > .active > a:hover,
.ownavigation .navbar-nav li:hover > a,
.ownavigation .navbar-nav li a:hover,
.ownavigation .navbar-nav li a:focus {
	background-color: transparent;
}

/* - Nav Dropdown */

/* ## Responsive ************************************************************************************** */
	
/*----------------------------------------------------
	* Responsive
------------------------------------------------------*/
/* - min-width: 1200 */
@media (min-width: 1200px) {
	.container {
		max-width: 1200px;
	}
}
/* - min-width: 992 */
@media (min-width: 992px) {
	/* - SlidePanel */
	.desktop-hide {
		display: none;
	}
	
	/* - Navigation Menu */
	.ownavigation {
		padding: 0;
	}
	.nav_trans {
		background: transparent;
	}
	.ownavigation .navbar-nav > li {
		margin: 0 20px;
	}
	.ownavigation .navbar-nav > li > a {
		padding: 10px 0;
		margin-top: 20px;
		margin-bottom: 20px;
		position: relative;
	}
	.ownavigation .navbar-nav > .active > a, 
	.ownavigation .navbar-nav > .active > a:focus, 
	.ownavigation .navbar-nav > .active > a:hover,
	.ownavigation .navbar-nav li:hover > a,
	.ownavigation .navbar-nav li a:hover {
		background-color: transparent;
	}

	/* - Nav Dropdown */
	.ownavigation .ddl-switch {
		display: none !important;
	}
	.ownavigation .navbar-collapse > ul > li > .dropdown-menu {
		top: 100%;
		left: 0;
	}
	.ownavigation ul li > .dropdown-menu {
		background-color: #4570c6;
		left: 100%;
		border-radius: 0;
		opacity: 0;
		top: 0;
		display: block;
		margin: 0;
		padding: 0;
		min-width: 218px;
		max-width: 218px;
		visibility: hidden\0/;
		transition: all 0.17s ease-in-out;
		-moz-transition: all 0.17s ease-in-out;
		-webkit-transition: all 0.17s ease-in-out;
		-o-transition: all 0.17s ease-in-out;
		-webkit-backface-visibility: hidden;
		-moz-backface-visibility: hidden;
		-o-backface-visibility: hidden;
		-ms-backface-visibility: hidden;
		backface-visibility: hidden;
		-webkit-transform-origin: 0 0;
		-moz-transform-origin: 0 0;
		-ms-transform-origin: 0 0;
		-o-transform-origin: 0 0;
		transform-origin: 0 0;
		-webkit-transform: rotateX(-90deg);
		-moz-transform: rotateX(-90deg);
		-ms-transform: rotateX(-90deg);
		-o-transform: rotateX(-90deg);
		transform: rotateX(-90deg);
		-webkit-transition: -webkit-transform 0.4s, opacity 0.1s 0.3s;
		-moz-transition: -moz-transform 0.4s, opacity 0.1s 0.3s;
		-mos-transition: -mos-transform 0.4s, opacity 0.1s 0.3s;
		-o-transition: -o-transform 0.4s, opacity 0.1s 0.3s;
	}
	.ownavigation .navbar-nav li .dropdown-menu > li > a {
		font-size: 13px;
		color: #333333;
		padding: 14px 22px;
		-webkit-transition: all 0.5s ease 0s;
		-moz-transition: all 0.5s ease 0s;
		-o-transition: all 0.5s ease 0s;
		transition: all 0.5s ease 0s;
	}
	.ownavigation .navbar-nav li .dropdown-menu > li > a:hover {
		color: #fcb100;
	}
	.ownavigation .navbar-nav li.dropdown:hover > .dropdown-menu {
		visibility: visible;
		opacity: 1;
		-webkit-transform: rotateX(0deg);
		-moz-transform: rotateX(0deg);
		-ms-transform: rotateX(0deg);
		-o-transform: rotateX(0deg);
		transform: rotateX(0deg);
		-webkit-transition: -webkit-transform 0.4s, opacity 0.1s;
		-moz-transition: -moz-transform 0.4s, opacity 0.1s;
		-mos-transition: -mos-transform 0.4s, opacity 0.1s;
		-o-transition: -o-transform 0.4s, opacity 0.1s;
		transition: transform 0.4s, opacity 0.1s;
	}
	.ownavigation ul > li > .dropdown-menu {
		left: 100%; 
	}
	.ownavigation .navbar-collapse > ul > li:last-child > .dropdown-menu,
	.ownavigation .navbar-collapse > ul > li:nth-last-child(2) > .dropdown-menu {
		right: 0; 
	}
	.ownavigation ul > li > .dropdown-menu,
	.ownavigation ul > li .dropdown-menu ul,
	.ownavigation ul > li .dropdown-menu ul ul ul,
	.ownavigation ul > li .dropdown-menu ul ul ul ul ul,
	.ownavigation ul > li .dropdown-menu ul ul ul ul ul ul ul,
	.ownavigation ul > li .dropdown-menu ul ul ul ul ul ul ul ul ul,
	.ownavigation .navbar-collapse > ul > li:last-child .dropdown-menu ul ul,
	.ownavigation .navbar-collapse > ul > li:last-child .dropdown-menu ul ul ul ul,
	.ownavigation .navbar-collapse > ul > li:last-child .dropdown-menu ul ul ul ul ul ul,
	.ownavigation .navbar-collapse > ul > li:last-child .dropdown-menu ul ul ul ul ul ul ul ul,
	.ownavigation .navbar-collapse > ul > li:last-child .dropdown-menu ul ul ul ul ul ul ul ul ul ul,
	.ownavigation .navbar-collapse > ul > li:nth-last-child(2) .dropdown-menu ul ul,
	.ownavigation .navbar-collapse > ul > li:nth-last-child(2) .dropdown-menu ul ul ul ul,
	.ownavigation .navbar-collapse > ul > li:nth-last-child(2) .dropdown-menu ul ul ul ul ul ul,
	.ownavigation .navbar-collapse > ul > li:nth-last-child(2) .dropdown-menu ul ul ul ul ul ul ul ul,
	.ownavigation .navbar-collapse > ul > li:nth-last-child(2) .dropdown-menu ul ul ul ul ul ul ul ul ul ul {
		right: auto;
	}
	.ownavigation ul > li .dropdown-menu ul,
	.ownavigation ul > li .dropdown-menu ul ul ul,
	.ownavigation ul > li .dropdown-menu ul ul ul ul ul,
	.ownavigation ul > li .dropdown-menu ul ul ul ul ul ul ul,
	.ownavigation ul > li .dropdown-menu ul ul ul ul ul ul ul ul ul,
	.ownavigation .navbar-collapse > ul > li:last-child .dropdown-menu ul ul,
	.ownavigation .navbar-collapse > ul > li:last-child .dropdown-menu ul ul ul ul,
	.ownavigation .navbar-collapse > ul > li:last-child .dropdown-menu ul ul ul ul ul ul,
	.ownavigation .navbar-collapse > ul > li:last-child .dropdown-menu ul ul ul ul ul ul ul ul,
	.ownavigation .navbar-collapse > ul > li:last-child .dropdown-menu ul ul ul ul ul ul ul ul ul ul,
	.ownavigation .navbar-collapse > ul > li:nth-last-child(2) .dropdown-menu ul ul,
	.ownavigation .navbar-collapse > ul > li:nth-last-child(2) .dropdown-menu ul ul ul ul,
	.ownavigation .navbar-collapse > ul > li:nth-last-child(2) .dropdown-menu ul ul ul ul ul ul,
	.ownavigation .navbar-collapse > ul > li:nth-last-child(2) .dropdown-menu ul ul ul ul ul ul ul ul,
	.ownavigation .navbar-collapse > ul > li:nth-last-child(2) .dropdown-menu ul ul ul ul ul ul ul ul ul ul {
		left: 100%;
	}
	.ownavigation ul > li .dropdown-menu ul ul,
	.ownavigation ul > li .dropdown-menu ul ul ul ul,
	.ownavigation ul > li .dropdown-menu ul ul ul ul ul ul,
	.ownavigation ul > li .dropdown-menu ul ul ul ul ul ul ul ul,
	.ownavigation ul > li .dropdown-menu ul ul ul ul ul ul ul ul ul ul,
	.ownavigation .navbar-collapse > ul > li:last-child .dropdown-menu ul,
	.ownavigation .navbar-collapse > ul > li:last-child .dropdown-menu ul ul ul,
	.ownavigation .navbar-collapse > ul > li:last-child .dropdown-menu ul ul ul ul ul,
	.ownavigation .navbar-collapse > ul > li:last-child .dropdown-menu ul ul ul ul ul ul ul,
	.ownavigation .navbar-collapse > ul > li:last-child .dropdown-menu ul ul ul ul ul ul ul ul ul,
	.ownavigation .navbar-collapse > ul > li:nth-last-child(2) .dropdown-menu ul,
	.ownavigation .navbar-collapse > ul > li:nth-last-child(2) .dropdown-menu ul ul ul,
	.ownavigation .navbar-collapse > ul > li:nth-last-child(2) .dropdown-menu ul ul ul ul ul,
	.ownavigation .navbar-collapse > ul > li:nth-last-child(2) .dropdown-menu ul ul ul ul ul ul ul,
	.ownavigation .navbar-collapse > ul > li:nth-last-child(2) .dropdown-menu ul ul ul ul ul ul ul ul ul {
		right: 100%;
	}
	.ownavigation ul > li .dropdown-menu ul ul,
	.ownavigation ul > li .dropdown-menu ul ul ul ul,
	.ownavigation ul > li .dropdown-menu ul ul ul ul ul ul,
	.ownavigation ul > li .dropdown-menu ul ul ul ul ul ul ul ul,
	.ownavigation ul > li .dropdown-menu ul ul ul ul ul ul ul ul ul ul,
	.ownavigation .navbar-collapse > ul > li:last-child > .dropdown-menu,
	.ownavigation .navbar-collapse > ul > li:last-child .dropdown-menu ul,
	.ownavigation .navbar-collapse > ul > li:last-child .dropdown-menu ul ul ul,
	.ownavigation .navbar-collapse > ul > li:last-child .dropdown-menu ul ul ul ul ul,
	.ownavigation .navbar-collapse > ul > li:last-child .dropdown-menu ul ul ul ul ul ul ul,
	.ownavigation .navbar-collapse > ul > li:last-child .dropdown-menu ul ul ul ul ul ul ul ul ul,
	.ownavigation .navbar-collapse > ul > li:nth-last-child(2) > .dropdown-menu,
	.ownavigation .navbar-collapse > ul > li:nth-last-child(2) .dropdown-menu ul,
	.ownavigation .navbar-collapse > ul > li:nth-last-child(2) .dropdown-menu ul ul ul,
	.ownavigation .navbar-collapse > ul > li:nth-last-child(2) .dropdown-menu ul ul ul ul ul,
	.ownavigation .navbar-collapse > ul > li:nth-last-child(2) .dropdown-menu ul ul ul ul ul ul ul,
	.ownavigation .navbar-collapse > ul > li:nth-last-child(2) .dropdown-menu ul ul ul ul ul ul ul ul ul {
		left: auto;
	}
}

/* - min-width: 768 */
@media (min-width: 768px) {
	
}

/* - min-width: 576 */
@media (min-width: 576px) { 

}

/* - max-width: 1199 */
@media (max-width: 1199px) {
	
}

/* - min to max: 992 to 1199 */
@media only screen and (min-width: 992px) and (max-width: 1199px) {
	/* - Ownavigation */
	.ownavigation .navbar-nav > li {
		margin-left: 9px;
		margin-right: 9px;
	}
}

/* - max-width: 991 */
@media (max-width: 991px) {
	/* - SlidePanel */
	.slidepanel { 
		display: none;
		border-bottom: 1px solid #8a9b0f;
	}
	.slideit,
	.toggle {
		display: block;
		position: relative;
		z-index: 1;
	}
	.desktop-hide {
		position: absolute;
		right: 60px;
		text-align: center;
		top: 20px;
	}	
	.slideit,
	.closeit {
		color: #1b88ce;
		font-size: 25px;
		position: relative;
		right: 0;
		top: 0;
	}
	.slideit:hover,
	.closeit:hover {
		color: #1b88ce;
	}
	
	.mobile-hide {
		display: none;
	}

	/* ## Navigation Menu */
	.ownavigation .navbar-header .navbar-brand {
		padding-left: 0;
		margin-left: 0;
	}
	.ownavigation .navbar-nav {
		width: 100%;
		margin: 0;
	}
	.ownavigation .navbar-nav > li {
		min-height: 0;
		float: none;
		clear: both;
	}
	.ownavigation .navbar-nav > li > a {
		padding: 8px 0;
		-webkit-transition: all 1s ease 0s;
		-moz-transition: all 1s ease 0s;
		-o-transition: all 1s ease 0s;
		transition: all 1s ease 0s;
	}	
	.ownavigation .navbar-nav > li.active a {
		color: #1b88ce;
	}
	.ownavigation .navbar-nav > li.active > a:hover,
	.ownavigation .navbar-nav  li  a:hover,
	.ownavigation .navbar-nav  li  a:focus {
		color: #1b88ce;
	}
	.ownavigation .navbar-collapse {
		max-height: 340px;
	}
	.ownavigation .collapse.show {
		display: block;
		overflow-y: auto;
	}
	
	/* - Nav Toggle */
	.ownavigation .navbar-toggler {
		border: 2px solid #1b88ce;
		border-radius: 0;
		color: #1b88ce;
		font-size: 1.5rem;
		margin: 20px 0;
		padding: 0.25rem 0.5rem;
		z-index: 1;
		outline: none;
	}
	.ownavigation .navbar-toggler:hover,
	.ownavigation .navbar-toggler:focus {
		border-color: #1b88ce;
		color: #1b88ce;
	}
	
	/* - Nav Dropdown */
	.ownavigation .ddl-switch {
		background-color: #1b88ce;
		color: #fff;
		cursor: pointer;
		font-size: 18px;
		padding: 2px 6px;
		position: absolute;
		right: 0;
		top: 9px;
		z-index: 100;
	}
	.ownavigation .ddl-active > .ddl-switch:before {
		content: "\f106";
	}	
	.ownavigation .navbar-nav > li.dropdown .dropdown-toggle::after {
		display: none;
	}
	.ownavigation .dropdown-menu {
		background-color: transparent;
		border: 0 none;
		margin-top: 0;
		padding-left: 10px;
		padding-top: 0;
		padding-bottom: 0;
		position: relative;
		width: 100%;
		box-shadow: none;
		float: left;
		top: 0;
	}
	.ownavigation .dropdown-menu li {
		display: inline-block;
		width: 100%;
	}
	.ownavigation .navbar-nav > li:last-of-type {
		margin-bottom: 15px;
	}
	.ownavigation .navbar-nav li .dropdown-menu > li > a {
		color: #232323;
		padding-left: 0;
		padding-right: 0;
		padding-top: 6px;
		padding-bottom: 6px;
		-webkit-transition: all 1s ease 0s;
		-moz-transition: all 1s ease 0s;
		-o-transition: all 1s ease 0s;
		transition: all 1s ease 0s;
	}
	.ownavigation .navbar-nav li .dropdown-menu > li > a:hover {
		color: #fcb100;
	}
}

/* - min to max: 768 to 991 */
@media only screen and (min-width: 768px) and (max-width: 991px) {
	
}

/* - max-width: 767 */
@media (max-width: 767px) {
	
}

/* - min to max: 576 to 767 */
@media (min-width: 576px) and (max-width: 767px) {

}

/* - max-width: 639 */
@media (max-width: 639px) {
	
}

/* - max-width: 575 */
@media (max-width: 575px) {
	.ownavigation .navbar-toggler {
		margin: 20px 0;
	}
}

/* - max-width: 479 */
@media (max-width: 479px) {
	
}

</style>
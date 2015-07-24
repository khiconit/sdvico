<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.beez3
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

JLoader::import('joomla.filesystem.file');

// Check modules
$showRightColumn = ($this->countModules('position-3') or $this->countModules('position-6') or $this->countModules('position-8'));
$showbottom      = ($this->countModules('position-9') or $this->countModules('position-10') or $this->countModules('position-11'));
$showleft        = ($this->countModules('position-4') or $this->countModules('position-7') or $this->countModules('position-5'));
$showsdvicohome  = $this->countModules('sdvico-slider') or $this->countModules('sdvico-service') or $this->countModules('sdvico-bannerwelcome');

if ($showRightColumn == 0 and $showleft == 0)
{
	$showno = 0;
}

JHtml::_('behavior.framework', true);

// Get params
$color          = $this->params->get('templatecolor');
$logo           = $this->params->get('logo');
$navposition    = $this->params->get('navposition');
$headerImage    = $this->params->get('headerImage');
$doc            = JFactory::getDocument();
$app            = JFactory::getApplication();
$templateparams	= $app->getTemplate(true)->params;
$config         = JFactory::getConfig();
$bootstrap      = explode(',', $templateparams->get('bootstrap'));
$jinput         = JFactory::getApplication()->input;
$option         = $jinput->get('option', '', 'cmd');

$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/print.css', $type = 'text/css', $media = 'print');

/*$doc->addScript($this->baseurl . '/templates/' . $this->template . '/javascript/template.js', 'text/javascript');*/

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
	<head>
		<?php require __DIR__ . '/jsstrings.php';?>
		<title>Sdvico</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=3.0, user-scalable=yes"/>
		<meta name="HandheldFriendly" content="true" />
		<meta name="apple-mobile-web-app-capable" content="YES" />
		<link rel='stylesheet' id='google-web-fonts-css'  href='http://fonts.googleapis.com/css?family=Lato%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C700%2C700italic%2C900%2C900italic%7CCabin%3Aregular%2Citalic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic&amp;ver=4.2.1#038;subset=latin' type='text/css' media='all' />
		<link rel='stylesheet' id='vc_google_fonts_raleway100200300regular500600700800900-css'  href='http://fonts.googleapis.com/css?family=Raleway%3A100%2C200%2C300%2Cregular%2C500%2C600%2C700%2C800%2C900&amp;subset=latin&amp;ver=4.2.1' type='text/css' media='all' />
		<link rel='stylesheet' id='font-awesome-css'  href='<?php echo $this->baseurl . '/templates/' . $this->template?>/wp-content/plugins/js_composer/assets/lib/bower/font-awesome/css/font-awesome.min11b8.css?ver=4.5' type='text/css' media='screen' />
		<style type="text/css">
			img.wp-smiley,
			img.emoji {
				display: inline !important;
				border: none !important;
				box-shadow: none !important;
				height: 1em !important;
				width: 1em !important;
				margin: 0 .07em !important;
				vertical-align: -0.1em !important;
				background: none !important;
				padding: 0 !important;
			}
		</style>
		<link rel='stylesheet' id='woocommerce-layout-css'  href='<?php echo $this->baseurl . '/templates/' . $this->template?>/wp-content/plugins/woocommerce/assets/css/woocommerce-layoutc0b8.css?ver=2.3.7' type='text/css' media='all' />
		<link rel='stylesheet' id='woocommerce-smallscreen-css'  href='<?php echo $this->baseurl . '/templates/' . $this->template?>/wp-content/plugins/woocommerce/assets/css/woocommerce-smallscreenc0b8.css?ver=2.3.7' type='text/css' media='only screen and (max-width: 768px)' />
		<link rel='stylesheet' id='woocommerce-general-css'  href='<?php echo $this->baseurl . '/templates/' . $this->template?>/wp-content/plugins/woocommerce/assets/css/woocommercec0b8.css?ver=2.3.7' type='text/css' media='all' />
		<link rel='stylesheet' id='bootstrap-css'  href='<?php echo $this->baseurl . '/templates/' . $this->template?>/wp-content/themes/makeclean/libraries/bootstrap/bootstrap.min50fa.css?ver=4.2.1' type='text/css' media='all' />
		<link rel='stylesheet' id='ui-price-filter-css'  href='<?php echo $this->baseurl . '/templates/' . $this->template?>/wp-content/themes/makeclean/libraries/fuelux/jquery-ui.min50fa.css?ver=4.2.1' type='text/css' media='all' />
		<link rel='stylesheet' id='owl-carousel-css'  href='<?php echo $this->baseurl . '/templates/' . $this->template?>/wp-content/themes/makeclean/libraries/owl-carousel/owl.carousel50fa.css?ver=4.2.1' type='text/css' media='all' />
		<link rel='stylesheet' id='owl-carousel-theme-css'  href='<?php echo $this->baseurl . '/templates/' . $this->template?>/wp-content/themes/makeclean/libraries/owl-carousel/owl.theme50fa.css?ver=4.2.1' type='text/css' media='all' />
		<link rel='stylesheet' id='fontawesome-css'  href='<?php echo $this->baseurl . '/templates/' . $this->template?>/wp-content/themes/makeclean/libraries/fonts/font-awesome.min50fa.css?ver=4.2.1' type='text/css' media='all' />
		<link rel='stylesheet' id='animate-pack-css'  href='<?php echo $this->baseurl . '/templates/' . $this->template?>/wp-content/themes/makeclean/libraries/animate/animate.min50fa.css?ver=4.2.1' type='text/css' media='all' />
		<link rel='stylesheet' id='flexslider-css'  href='<?php echo $this->baseurl . '/templates/' . $this->template?>/wp-content/plugins/js_composer/assets/lib/bower/flexslider/flexslider11b8.css?ver=4.5' type='text/css' media='screen' />
		<link rel='stylesheet' id='magnific-popup-css'  href='<?php echo $this->baseurl . '/templates/' . $this->template?>/wp-content/themes/makeclean/libraries/magnific-popup50fa.css?ver=4.2.1' type='text/css' media='all' />
		<link rel='stylesheet' id='theme-components-css'  href='<?php echo $this->baseurl . '/templates/' . $this->template?>/wp-content/themes/makeclean/css/components50fa.css?ver=4.2.1' type='text/css' media='all' />

		<link rel='stylesheet' id='theme-media-css'  href='<?php echo $this->baseurl . '/templates/' . $this->template?>/wp-content/themes/makeclean/css/media50fa.css?ver=4.2.1' type='text/css' media='all' />
		<link rel='stylesheet' id='js_composer_front-css'  href='<?php echo $this->baseurl . '/templates/' . $this->template?>/wp-content/plugins/js_composer/assets/css/js_composer11b8.css?ver=4.5' type='text/css' media='all' />
		<link rel='stylesheet' id='themeton-stylesheet-css'  href='<?php echo $this->baseurl . '/templates/' . $this->template?>/wp-content/uploads/sites/29/themeton/makeclean50fa.css?ver=4.2.1' type='text/css' media='all' />


		<script type='text/javascript' src='<?php echo $this->baseurl . '/templates/' . $this->template?>/wp-includes/js/jquery/jquery4a80.js?ver=1.11.2'></script>
		<script type='text/javascript' src='<?php echo $this->baseurl . '/templates/' . $this->template?>/wp-includes/js/jquery/jquery-migrate.min1576.js?ver=1.2.1'></script>
		<script type='text/javascript' src='<?php echo $this->baseurl . '/templates/' . $this->template?>/wp-content/plugins/revslider/rs-plugin/js/jquery.themepunch.tools.min83b6.js?ver=4.6.2'></script>
		<script type='text/javascript' src='<?php echo $this->baseurl . '/templates/' . $this->template?>/wp-content/plugins/revslider/rs-plugin/js/jquery.themepunch.revolution.min83b6.js?ver=4.6.2'></script>

		<script type='text/javascript' src='<?php echo $this->baseurl . '/templates/' . $this->template?>/wp-includes/js/mediaelement/mediaelement-and-player.min3819.js?ver=2.16.2'></script>
		<script type='text/javascript' src='<?php echo $this->baseurl . '/templates/' . $this->template?>/wp-includes/js/mediaelement/wp-mediaelement50fa.js?ver=4.2.1'></script>
		<script type='text/javascript' src='<?php echo $this->baseurl . '/templates/' . $this->template?>/wp-content/themes/makeclean/libraries/bootstrap/bootstrap.min50fa.js?ver=4.2.1'></script>
		<script type='text/javascript' src='<?php echo $this->baseurl . '/templates/' . $this->template?>/wp-content/themes/makeclean/libraries/fuelux/jquery-ui.min50fa.js?ver=4.2.1'></script>
		<script type='text/javascript' src='<?php echo $this->baseurl . '/templates/' . $this->template?>/wp-content/themes/makeclean/libraries/owl-carousel/owl.carousel.min50fa.js?ver=4.2.1'></script>
		<script type='text/javascript' src='<?php echo $this->baseurl . '/templates/' . $this->template?>/wp-content/plugins/js_composer/assets/lib/bower/flexslider/jquery.flexslider-min11b8.js?ver=4.5'></script>
		<script type='text/javascript' src='<?php echo $this->baseurl . '/templates/' . $this->template?>/wp-content/themes/makeclean/libraries/jquery.magnific-popup.min50fa.js?ver=4.2.1'></script>
		<script type='text/javascript' src='<?php echo $this->baseurl . '/templates/' . $this->template?>/wp-content/themes/makeclean/libraries/gmap/jquery.gmap.min50fa.js?ver=4.2.1'></script>
		<script type='text/javascript' src='<?php echo $this->baseurl . '/templates/' . $this->template?>/wp-content/themes/makeclean/libraries/jquery.easing.min50fa.js?ver=4.2.1'></script>
		<script type='text/javascript' src='<?php echo $this->baseurl . '/templates/' . $this->template?>/wp-content/themes/makeclean/libraries/jquery.animateNumber.min50fa.js?ver=4.2.1'></script>
		<script type='text/javascript' src='<?php echo $this->baseurl . '/templates/' . $this->template?>/wp-content/themes/makeclean/libraries/jquery.appear50fa.js?ver=4.2.1'></script>
		<script type='text/javascript' src='<?php echo $this->baseurl . '/templates/' . $this->template?>/wp-content/themes/makeclean/libraries/jquery.knob50fa.js?ver=4.2.1'></script>
		<script type='text/javascript' src='<?php echo $this->baseurl . '/templates/' . $this->template?>/wp-content/themes/makeclean/libraries/wow.min50fa.js?ver=4.2.1'></script>
		<script type='text/javascript' src='<?php echo $this->baseurl . '/templates/' . $this->template?>/wp-content/plugins/js_composer/assets/lib/bower/isotope/dist/isotope.pkgd.min11b8.js?ver=4.5'></script>
		<script type='text/javascript' src='<?php echo $this->baseurl . '/templates/' . $this->template?>/wp-content/themes/makeclean/js/functions50fa.js?ver=4.2.1'></script>
		<script type='text/javascript' src='<?php echo $this->baseurl . '/templates/' . $this->template?>/wp-content/plugins/js_composer/assets/js/js_composer_front11b8.js?ver=4.5'></script>
		<script type='text/javascript' src='<?php echo $this->baseurl . '/templates/' . $this->template?>/wp-content/plugins/contact-form-7/includes/js/jquery.form.min526c.js?ver=3.46.0-2013.11.21'></script>
		<script type='text/javascript' src='<?php echo $this->baseurl . '/templates/' . $this->template?>/wp-content/plugins/woocommerce/assets/js/frontend/woocommerce.minc0b8.js?ver=2.3.7'></script>
		<script type='text/javascript' src='<?php echo $this->baseurl . '/templates/' . $this->template?>/wp-content/plugins/woocommerce/assets/js/jquery-cookie/jquery.cookie.min330a.js?ver=1.4.1'></script>
		<script type='text/javascript' src='<?php echo $this->baseurl . '/templates/' . $this->template?>/wp-content/plugins/woocommerce/assets/js/frontend/cart-fragments.minc0b8.js?ver=2.3.7'></script>


		<script type='text/javascript' src='<?php echo $this->baseurl . '/templates/' . $this->template?>/wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.minc0b8.js?ver=2.3.7'></script>
		<script type='text/javascript' src='<?php echo $this->baseurl . '/templates/' . $this->template?>/wp-content/plugins/js_composer/assets/js/vendors/woocommerce-add-to-cart11b8.js?ver=4.5'></script>
		<script type='text/javascript' src='http://maps.google.com/maps/api/js?sensor=false&amp;ver=4.2.1'></script>
		<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="<?php echo $this->baseurl . '/templates/' . $this->template?>/wp-includes/wlwmanifest.xml" />

		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $this->baseurl . '/templates/' . $this->template?>/wp-content/themes/makeclean/images/favicon.png"/>

		<style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1433231528582{margin-bottom: 0px !important;}.vc_custom_1432863334714{margin-bottom: 0px !important;padding-top: 84px !important;padding-bottom: 84px !important;}.vc_custom_1432623707509{margin-bottom: 0px !important;padding-top: 84px !important;padding-bottom: 84px !important;}.vc_custom_1432714435927{margin-bottom: 0px !important;padding-top: 84px !important;padding-bottom: 84px !important;background-color: #f7f9fb !important;}.vc_custom_1432638236744{margin-bottom: 0px !important;padding-top: 84px !important;padding-bottom: 84px !important;}.vc_custom_1433738809862{margin-bottom: 0px !important;padding-top: 75px !important;padding-bottom: 87px !important;background: #1e73be url(<?php echo $this->baseurl . '/templates/' . $this->template?>/wp-content/uploads/sites/29/2015/05/statistics-bg48db.png?id=58) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1432722092252{margin-bottom: 0px !important;padding-top: 84px !important;padding-bottom: 20px !important;background-color: #f7f9fb !important;}.vc_custom_1432623902434{margin-bottom: 0px !important;padding-top: 67px !important;padding-bottom: 67px !important;}.vc_custom_1432624456555{margin: 0px !important;padding: 0px !important;}.vc_custom_1432700813827{margin-bottom: 30px !important;}</style><noscript><style> .wpb_animate_when_almost_visible { opacity: 1; }</style></noscript><style type='text/css' id='theme-customize-css'>
            body{ font-family:;color:; }
            body,.blog-list{background-color:;}.h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6,.logo-block .call-us p, .cart-icon, .section-header, .welcome-section .welcome-content a, .testimonial-item .carousel-caption h3, .industry-serve .row > a, .statistics-box h3 span, .statistics-box h4, .entry-header h3, .entry-header h3 a, .btn,.vc_btn3, .footer-heading h5, .widget > h3, .footer-bottom p, .posted-on > .like, .page-title, .page-breadcrumb li > a, .page-breadcrumb li, .testimonial-box h3, .call-out-section  h3, .service-category-widget h3, .services-content-area h4, .portfolio-categories > li > a, .portfolio-title, .portfolio-block-hover p, .slider-section.slider2 .carousel-caption .col-md-6.pull-right p, .product-category ul li a, .product-category h4, .product-section .pagination > li a, .prev-next-btn a > b, .portfolio-detail-content > h3, .portfolio-detail-content-box > h3, .blog-list .pagination li, .comment-area h2, .comment-box .post-author h3, .comment-box .post-author h4, .comment-box .reply, .comment-form .form-control, .comment-form textarea.form-control, .entry-summary .product_title, .entry-summary .product-stock, .entry-summary .quantity, .single-product-detail .woocommerce-tabs .tab-content h3, .single-product-detail .woocommerce-tabs .nav-tabs > li > a, .contact-detail-box > h3, .contact-form-section h3{font-family:;}#footer-section .widget > h3 { color:}#footer-section a { color:}

            #page-banner{ background-image:url(<?php echo $this->baseurl . '/templates/' . $this->template?>/wp-content/uploads/sites/29/2015/06/page-banner.png);background-repeat:repeat;background-position:top center;background-attachment:scroll;padding-top: 60px;padding-bottom: 60px;background-color: #2196f3; }
            #footer-section{ background-image:url(<?php echo $this->baseurl . '/templates/' . $this->template?>/wp-content/uploads/sites/29/2015/06/footer-bg.jpg);background-repeat:repeat-x;background-position:top left;background-attachment:scroll;background-color:;color:; }

        </style>
		<link rel='stylesheet' id='theme-stylesheet-css'  href='<?php echo $this->baseurl . '/templates/' . $this->template?>/wp-content/themes/makeclean/style50fa.css?ver=4.2.1' type='text/css' media='all' />
		<link rel='stylesheet' id='contact-form-7-css'  href='<?php echo $this->baseurl . '/templates/' . $this->template?>/wp-content/plugins/contact-form-7/includes/css/styles039c.css?ver=3.6' type='text/css' media='all' />
		<link rel='stylesheet' id='rs-plugin-settings-css'  href='<?php echo $this->baseurl . '/templates/' . $this->template?>/wp-content/plugins/revslider/rs-plugin/css/settings83b6.css?ver=4.6.2' type='text/css' media='all' />
		<style id='rs-plugin-settings-inline-css' type='text/css'>
			.tp-caption a{color:#ff7302;text-shadow:none;-webkit-transition:all 0.2s ease-out;-moz-transition:all 0.2s ease-out;-o-transition:all 0.2s ease-out;-ms-transition:all 0.2s ease-out}.tp-caption a:hover{color:#ffa902}.largeredbtn{font-family:"Raleway",sans-serif;font-weight:900;font-size:16px;line-height:60px;color:#fff !important;text-decoration:none;padding-left:40px;padding-right:80px;padding-top:22px;padding-bottom:22px;background:rgb(234,91,31); background:-moz-linear-gradient(top,rgba(234,91,31,1) 0%,rgba(227,58,12,1) 100%); background:-webkit-gradient(linear,left top,left bottom,color-stop(0%,rgba(234,91,31,1)),color-stop(100%,rgba(227,58,12,1))); background:-webkit-linear-gradient(top,rgba(234,91,31,1) 0%,rgba(227,58,12,1) 100%); background:-o-linear-gradient(top,rgba(234,91,31,1) 0%,rgba(227,58,12,1) 100%); background:-ms-linear-gradient(top,rgba(234,91,31,1) 0%,rgba(227,58,12,1) 100%); background:linear-gradient(to bottom,rgba(234,91,31,1) 0%,rgba(227,58,12,1) 100%); filter:progid:DXImageTransform.Microsoft.gradient( startColorstr='#ea5b1f',endColorstr='#e33a0c',GradientType=0 )}.largeredbtn:hover{background:rgb(227,58,12); background:-moz-linear-gradient(top,rgba(227,58,12,1) 0%,rgba(234,91,31,1) 100%); background:-webkit-gradient(linear,left top,left bottom,color-stop(0%,rgba(227,58,12,1)),color-stop(100%,rgba(234,91,31,1))); background:-webkit-linear-gradient(top,rgba(227,58,12,1) 0%,rgba(234,91,31,1) 100%); background:-o-linear-gradient(top,rgba(227,58,12,1) 0%,rgba(234,91,31,1) 100%); background:-ms-linear-gradient(top,rgba(227,58,12,1) 0%,rgba(234,91,31,1) 100%); background:linear-gradient(to bottom,rgba(227,58,12,1) 0%,rgba(234,91,31,1) 100%); filter:progid:DXImageTransform.Microsoft.gradient( startColorstr='#e33a0c',endColorstr='#ea5b1f',GradientType=0 )}.fullrounded img{-webkit-border-radius:400px;-moz-border-radius:400px;border-radius:400px}.tp-caption a{color:#ff7302;text-shadow:none;-webkit-transition:all 0.2s ease-out;-moz-transition:all 0.2s ease-out;-o-transition:all 0.2s ease-out;-ms-transition:all 0.2s ease-out}.tp-caption a:hover{color:#ffa902}.tp-caption a{color:#ff7302;text-shadow:none;-webkit-transition:all 0.2s ease-out;-moz-transition:all 0.2s ease-out;-o-transition:all 0.2s ease-out;-ms-transition:all 0.2s ease-out}.tp-caption a:hover{color:#ffa902}.tp-caption a{color:#ff7302;text-shadow:none;-webkit-transition:all 0.2s ease-out;-moz-transition:all 0.2s ease-out;-o-transition:all 0.2s ease-out;-ms-transition:all 0.2s ease-out}.tp-caption a:hover{color:#ffa902}.tp-caption a{color:#ff7302;text-shadow:none;-webkit-transition:all 0.2s ease-out;-moz-transition:all 0.2s ease-out;-o-transition:all 0.2s ease-out;-ms-transition:all 0.2s ease-out}.tp-caption a:hover{color:#ffa902}.tp-caption a{color:#ff7302;text-shadow:none;-webkit-transition:all 0.2s ease-out;-moz-transition:all 0.2s ease-out;-o-transition:all 0.2s ease-out;-ms-transition:all 0.2s ease-out}.tp-caption a:hover{color:#ffa902}
		</style>
	</head>

	<body class="home page page-id-2 page-template-default no-content-padding wpb-js-composer js-comp-ver-4.5 vc_responsive" data-offset="200" data-spy="scroll" data-target=".primary-navigation">
			<a id="top"></a>

			<!-- Header Section -->
			<header id="header-section" class="header-section">

				<!-- Logo Block -->
				<div class="logo-block">
					<!-- container -->
					<div class="container">
						<div class="row">
							<!-- col-md-2 -->
							<div class="col-md-3 col-sm-4">
								<jdoc:include type="modules" name="sdvico-logo"   />
							</div><!-- col-md-2 /- -->
							<!-- col-md-4 -->
							<div class="col-md-9 col-sm-8  row header-right">

														<!-- col-md-7 -->
								<div class="col-md-6 col-sm-6 col-sm-offset-2 col-md-offset-2 call-us ">
									<jdoc:include type="modules" name="sdvico-phone"   />
								</div><!-- col-md-7 /- -->
															<!-- col-md-5 -->
									<div class="col-md-4 col-sm-4 text-right ow-padding-left cart">
										<jdoc:include type="modules" name="sdvico-chooselang"   />
									</div><!-- col-md-5 /- -->
													</div><!-- col-md-4 /- -->
						</div>
					</div>
				</div><!-- Logo Block /- -->

				<!-- Menu Block -->
				<div class="menu-block">
					<div class="container">
						<div class="row">
							<!-- col-md-8 -->
							<nav class="navbar navbar-default col-md-8">
								<!-- Brand and toggle get grouped for better mobile display -->
								<div class="navbar-header">
									<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navigation">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
									<a title="Logo" href="http://demo.themeton.com/makeclean">
										<img alt="logo" src="<?php echo $this->baseurl . '/templates/' . $this->template?>/wp-content/themes/makeclean/images/responsive-logo.png">
									</a>
								</div>
								<!-- Collect the nav links, forms, and other content for toggling -->
									<jdoc:include type="modules" name="sdvico-menu"   />
								<!-- /.navbar-collapse -->
							</nav><!-- col-md-8 /- -->

												<div class="col-md-4 quote">
								<a href="#!">Free instant quote</a>
							</div>

						</div>
					</div><!-- /.container -->
				</div><!-- Menu Block /- -->
			</header><!-- Header Section /- -->

			<div id="post-2" class="ow-section post-2 page type-page status-publish hentry">
				<!-- container -->
				<div class="container">

					<!-- col-md-8 -->
					<div class="col-sm-12 col-md-12 no-padding">

						<div  class="vc_row wpb_row vc_row-fluid vc_custom_1433231528582">
			<div class="vc_col-sm-12 wpb_column vc_column_container ">
				<div class="wpb_wrapper">
					<div class="wpb_revslider_element wpb_content_element">
		<div id="rev_slider_1_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" style="margin:0px auto;background-color:#E9E9E9;padding:0px;margin-top:0px;margin-bottom:0px;max-height:650px;">
		<!-- START REVOLUTION SLIDER 4.6.0 fullwidth mode -->
		<?php if ($showsdvicohome) : ?>
			<div id="rev_slider_1_1" class="rev_slider fullwidthabanner" style="display:none;max-height:650px;height:650px;">
					<jdoc:include type="modules" name="sdvico-slider"   />
				<div class="tp-bannertimer"></div>
			</div>
		<?php endif;?>
					<style scoped>.tp-caption.black,.black{color:#000;text-shadow:none}.tp-caption.HomeSliderTitle,.HomeSliderTitle{font-size:30px;line-height:32px;font-weight:700;font-family:"Open Sans";color:rgb(255,255,255);text-decoration:none;background-color:transparent;border-width:0px;border-color:rgb(255,214,88);border-style:none}.tp-caption.HomeSlider2Text,.HomeSlider2Text{font-size:16px;line-height:20px;font-weight:700;font-family:"Lato";color:#ffffff;text-decoration:none;background-color:transparent;border-width:0px;border-color:rgb(255,214,88);border-style:none}.tp-caption.HomeSlider2Title,.HomeSlider2Title{font-size:46px;line-height:54px;font-weight:900;font-family:"Lato";color:#ffffff;text-decoration:none;background-color:transparent;text-align:right;text-shadow:0 5px 5px rgba(0,0,0,0.15);border-width:0px;border-color:rgb(255,214,88);border-style:none}.tp-caption.HomeSlider2Button,.HomeSlider2Button{font-size:13px;font-weight:700;color:rgb(255,255,255);text-decoration:none;text-shadow:none;background-color:transparent;border-width:0px;border-color:rgb(255,255,255);border-style:none}</style>

					<script type="text/javascript">

						/******************************************
							-	PREPARE PLACEHOLDER FOR SLIDER	-
						******************************************/


						var setREVStartSize = function() {
							var	tpopt = new Object();
								tpopt.startwidth = 1200;
								tpopt.startheight = 650;
								tpopt.container = jQuery('#rev_slider_1_1');
								tpopt.fullScreen = "off";
								tpopt.forceFullWidth="on";

							tpopt.container.closest(".rev_slider_wrapper").css({height:tpopt.container.height()});tpopt.width=parseInt(tpopt.container.width(),0);tpopt.height=parseInt(tpopt.container.height(),0);tpopt.bw=tpopt.width/tpopt.startwidth;tpopt.bh=tpopt.height/tpopt.startheight;if(tpopt.bh>tpopt.bw)tpopt.bh=tpopt.bw;if(tpopt.bh<tpopt.bw)tpopt.bw=tpopt.bh;if(tpopt.bw<tpopt.bh)tpopt.bh=tpopt.bw;if(tpopt.bh>1){tpopt.bw=1;tpopt.bh=1}if(tpopt.bw>1){tpopt.bw=1;tpopt.bh=1}tpopt.height=Math.round(tpopt.startheight*(tpopt.width/tpopt.startwidth));if(tpopt.height>tpopt.startheight&&tpopt.autoHeight!="on")tpopt.height=tpopt.startheight;if(tpopt.fullScreen=="on"){tpopt.height=tpopt.bw*tpopt.startheight;var cow=tpopt.container.parent().width();var coh=jQuery(window).height();if(tpopt.fullScreenOffsetContainer!=undefined){try{var offcontainers=tpopt.fullScreenOffsetContainer.split(",");jQuery.each(offcontainers,function(e,t){coh=coh-jQuery(t).outerHeight(true);if(coh<tpopt.minFullScreenHeight)coh=tpopt.minFullScreenHeight})}catch(e){}}tpopt.container.parent().height(coh);tpopt.container.height(coh);tpopt.container.closest(".rev_slider_wrapper").height(coh);tpopt.container.closest(".forcefullwidth_wrapper_tp_banner").find(".tp-fullwidth-forcer").height(coh);tpopt.container.css({height:"100%"});tpopt.height=coh;}else{tpopt.container.height(tpopt.height);tpopt.container.closest(".rev_slider_wrapper").height(tpopt.height);tpopt.container.closest(".forcefullwidth_wrapper_tp_banner").find(".tp-fullwidth-forcer").height(tpopt.height);}
						};

						/* CALL PLACEHOLDER */
						setREVStartSize();


						var tpj=jQuery;
						tpj.noConflict();
						var revapi1;

						tpj(document).ready(function() {

						if(tpj('#rev_slider_1_1').revolution == undefined){
							revslider_showDoubleJqueryError('#rev_slider_1_1');
						}else{
						   revapi1 = tpj('#rev_slider_1_1').show().revolution(
							{
														dottedOverlay:"none",
								delay:9000,
								startwidth:1200,
								startheight:650,
								hideThumbs:200,

								thumbWidth:100,
								thumbHeight:50,
								thumbAmount:2,


								simplifyAll:"off",

								navigationType:"bullet",
								navigationArrows:"solo",
								navigationStyle:"round",

								touchenabled:"on",
								onHoverStop:"on",
								nextSlideOnWindowFocus:"off",

								swipe_threshold: 75,
								swipe_min_touches: 1,
								drag_block_vertical: false,



								keyboardNavigation:"off",

								navigationHAlign:"center",
								navigationVAlign:"bottom",
								navigationHOffset:0,
								navigationVOffset:20,

								soloArrowLeftHalign:"left",
								soloArrowLeftValign:"center",
								soloArrowLeftHOffset:20,
								soloArrowLeftVOffset:0,

								soloArrowRightHalign:"right",
								soloArrowRightValign:"center",
								soloArrowRightHOffset:20,
								soloArrowRightVOffset:0,

								shadow:0,
								fullWidth:"on",
								fullScreen:"off",

														spinner:"spinner0",

								stopLoop:"off",
								stopAfterLoops:-1,
								stopAtSlide:-1,

								shuffle:"off",

								autoHeight:"off",
								forceFullWidth:"on",



								hideThumbsOnMobile:"off",
								hideNavDelayOnMobile:1500,
								hideBulletsOnMobile:"off",
								hideArrowsOnMobile:"off",
								hideThumbsUnderResolution:0,

														hideSliderAtLimit:0,
								hideCaptionAtLimit:0,
								hideAllCaptionAtLilmit:0,
								startWithSlide:0					});



											}
						});	/*ready*/

					</script>


					</div>
					<!-- END REVOLUTION SLIDER --></div>

				</div>
			</div>
		</div>
		<?php if ($showsdvicohome) : ?>
			<div  class="vc_row wpb_row vc_row-fluid service-section vc_custom_1432863334714">
				<div class="vc_col-sm-12 wpb_column vc_column_container ">
							<jdoc:include type="modules" name="sdvico-service"   />
				</div>
			</div>
		<?php endif; ?>
		<div class="cv_row wpb_row vc_row-fluid  ">
				<div class="vc_col-sm-12 wpb_column vc_column_container ">
						<jdoc:include type="component" />
			</div>

		</div>
		<?php if ($showsdvicohome) : ?>
			<div  class="vc_row wpb_row vc_row-fluid vc_custom_1432623707509">
				<div class="vc_col-sm-4 wpb_column vc_column_container ">
					<div class="wpb_wrapper">

				<div class="wpb_single_image wpb_content_element vc_align_center">
					<jdoc:include type="modules" name="sdvico-bannerwelcome"   />
				</div>
					</div>
				</div>

				<div class="vc_col-sm-8 wpb_column vc_column_container ">
					<jdoc:include type="modules" name="sdvico-welcome"   />
				</div>
			</div>
			<div  class="vc_row wpb_row vc_row-fluid vc_custom_1432714435927" data-vc-full-width="true" data-vc-full-width-init="false" >
				<div class="vc_col-sm-12 wpb_column vc_column_container ">
					<jdoc:include type="modules" name="sdvico-service2"   />
				</div>
			</div>
			<div class="vc_row-full-width">
			</div>
			<div  class="vc_row wpb_row vc_row-fluid vc_custom_1432638236744">
				<div class="vc_col-sm-6 industry-serve wpb_column vc_column_container ">
					<jdoc:include type="modules" name="sdvico-service3"   />
				</div>

				<div class="vc_col-sm-6 wpb_column vc_column_container ">
					<jdoc:include type="modules" name="sdvico-service4"   />
				</div>
			</div>
			<div  class="vc_row wpb_row vc_row-fluid vc_custom_1433738809862" data-vc-full-width="true" data-vc-full-width-init="false" >
					<jdoc:include type="modules" name="sdvico-statistical"   />
			</div>
			<div class="vc_row-full-width">
			</div>
			<div  class="vc_row wpb_row vc_row-fluid vc_custom_1432722092252" data-vc-full-width="true" data-vc-full-width-init="false" >
				<div class="vc_col-sm-12 wpb_column vc_column_container ">
					<jdoc:include type="modules" name="sdvico-newslates"   />
				</div>
			</div>
				<div class="vc_row-full-width"></div>
				<div  class="vc_row wpb_row vc_row-fluid text-center vc_custom_1432623902434">
					<div class="vc_col-sm-12 wpb_column vc_column_container ">
						<jdoc:include type="modules" name="sdvico-footer1"   />
					</div>
				</div>

					</div><!-- col-md-8 /- -->



				</div>
					<!-- container /- -->
			</div>
		<?php endif; ?>


		<!-- Footer
		================================================== -->
		<footer id="footer-section" class="footer-section ow-background">
			<div class="container">
				<jdoc:include type="modules" name="sdvico-footer"   />

			</div><!-- .container -->
		</footer>
	</body>
</html>

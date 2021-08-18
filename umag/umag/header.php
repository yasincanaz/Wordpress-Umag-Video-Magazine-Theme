<?php
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div class="preloader d-flex align-items-center justify-content-center">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'umag'); ?></a>

		<header id="masthead" class="header-area">
			<!-- Navbar Area -->
			<div class="mag-main-menu" id="sticker">
				<div class="classy-nav-container breakpoint-off">
					<!-- Menu -->
					<nav class="classy-navbar justify-content-between" id="magNav">

						<!-- Nav brand -->
						<a href="<?php echo home_url("/")?>" class="nav-brand">
							<?php
							$logo_image_id=get_theme_mod( "custom_logo" );
							echo wp_get_attachment_image( $logo_image_id,"full" );
							?>
						</a>

						<!-- Navbar Toggler -->
						<div class="classy-navbar-toggler">
							<span class="navbarToggler"><span></span><span></span><span></span></span>
						</div>

						<!-- Nav Content -->
						<div class="nav-content d-flex align-items-center">
							<div class="classy-menu">

								<!-- Close Button -->
								<div class="classycloseIcon">
									<div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
								</div>

								<!-- Nav Start -->
								<?php
								if(has_nav_menu( "menu-1" )){
									$nav_menu_args=array(
										"menu" =>"menu-1",
										"container_class" => "classynav"
									);
									wp_nav_menu($nav_menu_args);
								}
								else{
									if(current_user_can( "manage_options" )){
										printf(
											/**translators: %s: add menu link */
											__("there is no menu in the header, create it right <a href='%s'>here</a>","umag"),admin_url()."nav-menus.php");
									}
								}
								?>
								<!-- Nav End -->
							</div>

							<div class="top-meta-data d-flex align-items-center">
								<!-- Top Search Area -->
								<?php
								$umag_login_icon_edit=get_theme_mod("umag_login_icon_edit","fa-user");
								$umag_login_edit_link=get_theme_mod("umag_login_edit_link","#");
								$umag_header_button_text=get_theme_mod("umag_header_button_text","SUBMİT POST");
								$umag_header_button_link=get_theme_mod("umag_header_button_link","google.com");
								$umag_header_button_mobile_icon=get_theme_mod("umag_header_button_mobile_icon","fa-cloud-upload-alt");
								?>
								<?php umag_search_content();?>
								<!-- Login -->
								<?php
								if( ! empty($umag_login_icon_edit)):
								?>
								<a href="<?php echo esc_url($umag_login_edit_link);?>" class="login-btn"><i class="fa <?php esc_attr_e( $umag_login_icon_edit )?>" aria-hidden="true"></i> <span id="umag_user_nickname">
								<?php
								if(is_user_logged_in()){
									$wp_get_current_user= wp_get_current_user();
									echo '@'.$wp_get_current_user->nickname;
								}
								?>
								</span> </a>
								<?php endif;?>
								<!-- Submit Video -->
								<?php if(!empty($umag_header_button_text)):?>
								<a href="<?php echo esc_url($umag_header_button_link)?>" class="submit-video"><span><i class="fa <?php esc_attr_e( $umag_header_button_mobile_icon )?>"></i></span> <span class="video-text"><?php esc_html_e($umag_header_button_text)?></span></a>
								<?php endif;?>
							</div>
						</div>
					</nav>
				</div>
			</div>
		</header>
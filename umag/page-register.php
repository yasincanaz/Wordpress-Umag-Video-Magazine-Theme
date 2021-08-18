<?php
/**
 * Template Name: Register Page
 * Template Post : page
 */
get_header();
?>
    <section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(<?php the_post_thumbnail_url( 'full' ); ?>">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
						<?php the_title( '<h1>', '</h1>' ); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="mag-login-area py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6 mb-5">
                    <div class="login-content bg-white p-30 box-shadow">
                    <?php if(!is_user_logged_in()):?>
                            <div class="section-heading">
                                <h5><?php esc_html_e( 'Register', 'umag' ); ?></h5>
                            </div>
                            <?php endif;?>
                        <div>
							<?php
							if( have_posts() ) {
								while ( have_posts() ) {
									the_post();
									the_content();
								}
							}
							?>
                        </div>
                        <?php if(! is_user_logged_in()):?>
                            <form class="register-form" method="post">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="<?php esc_attr_e( 'First Name', 'umag' ); ?>" >
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="<?php esc_attr_e( 'Last Name', 'umag' ); ?>" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="<?php esc_attr_e( 'E-mail adress', 'umag' ); ?>" >
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="user_login" name="user_login" placeholder="<?php esc_attr_e( 'User Name', 'umag' ); ?>" >
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="<?php esc_attr_e( 'password', 'umag' ); ?>" >
                                </div>

                                <button type="submit" class="btn mag-btn mt-2 w-100"><?php esc_html_e( 'Giriş Yap', 'umag' ); ?></button>
                                <?php $login_link=get_page_link(get_theme_mod("umag_login_page"));?>
                                <p class="mt-2"><?php printf(__("Do you have an account, <a href='%s'>log in now</a>","umag"),$login_link);?></p>
								<?php wp_nonce_field( 'register_action', 'register_field' ); ?>
                            </form>
                            <?php else:?>
                                <div class="alert alert-warning"><?php printf(__('you are already logged in, <a href="%s">click</a> to log out'),wp_logout_url(get_permalink()));?></div>
                            <?php endif;?>
                </div>
            </div>
        </div>
    </div>
<?php
get_footer();
?>
<?php get_footer()?>
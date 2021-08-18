<?php
/**
 * Template Name: Giriş Sayfası
 * Template Post Type: page
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
                <div class="col-12 col-lg-6">
                    <div class="login-content bg-white p-30 box-shadow">
						<?php if( ! is_user_logged_in() ): ?>
                            <div class="section-heading">
                                <h5><?php esc_html_e( 'Login', 'umag' ); ?></h5>
                            </div>
						<?php endif; ?>

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
                            <form class="login-form" method="post">
                                <div class="form-group">
                                    <input type="email" class="form-control " id="email" name="email" placeholder="<?php esc_attr_e( 'E-Mail Address', 'umag' ); ?>" >
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="<?php esc_attr_e( 'Password', 'umag' ); ?>" >
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox mr-sm-2">
                                        <input type="checkbox" class="custom-control-input" id="remember" name="remember">
                                        <label class="custom-control-label" for="remember"><?php esc_html_e( 'Remember me', 'umag' ); ?></label>
                                    </div>
                                </div>
                                <button type="submit" class="btn mag-btn mt-2 w-100"><?php esc_html_e( 'Giriş Yap', 'umag' ); ?></button>
                                <?php $register_link=get_page_link( get_theme_mod("umag_register_page") )?>
                                <p class="mt-2"><?php printf(__("Don't have an account yet? <a href='%s'>Sign up</a>","umag"),$register_link);?></p>
								<?php wp_nonce_field( 'login_action', 'login_field' ); ?>
                            </form>
                            <?php else:

                                ?>
                                
                                <div class="alert alert-warning"><?php printf(/* Translators: %s : Logout url*/__('you are already logged in, <a href="%s">click</a> to log out'),wp_logout_url(get_page_link( )));?></div>
                            <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
get_footer();

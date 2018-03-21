<?php if ( is_front_page() ): ?>
    <section class="hero columns w-1280 is-centered">
        <canvas id="particles"></canvas>
        <div class="column is-flex justify-end">
            <div class="hero-titles m5">
                <h1><?php bloginfo( 'name' ); ?></h1>
                <p><?php bloginfo( 'description' ); ?></p>
                <div class="hero-social-media m3">
                    <a href="<?php echo get_theme_mod( 'facebook', '#' ); ?>" class="facebook" target="_blank" rel="noopener noreferrer">
                        <i class="fab fa-facebook-f fa-lg" style="color:#3b5998"></i>
                    </a>
                    <a href="<?php echo get_theme_mod( 'twitter', '#' ); ?>" class="twitter" target="_blank" rel="noopener noreferrer">
                        <i class="fab fa-twitter fa-lg" style="color:#1da1f2"></i>
                    </a>
                    <a href="<?php echo get_theme_mod( 'youtube', '#' ); ?>" class="youtube" target="_blank" rel="noopener noreferrer">
                        <i class="fab fa-youtube fa-lg" style="color:#ff0000"></i>
                    </a>
                </div>
                <div class="hero-cta">
                    <a class="btn btn-primary btn-icon" href="#">Learn More <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </div>
        <?php get_template_part('partials/featured'); ?>
    </section>
<?php endif; ?>

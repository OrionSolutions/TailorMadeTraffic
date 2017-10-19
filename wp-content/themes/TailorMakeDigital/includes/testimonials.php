<?php if( vp_option('vpt_option.enable_testimonials') == 1 ){ ?>
<!-- Testimonials -->
    <div class="customer-section">
        <h1>Customer's Feedback</h1>
        <div class="container">
            <div class="full-width">
                
                <?php
                // Set Args Parameters
                    $args = array(
                    'orderby'  => 'date',
                    'order'    => 'DESC',
                    'post_type' => 'testimonials',
                    'posts_per_page' => '3'
                    );
                    
                    // Start Loop
                    $x = 0;
                    query_posts($args);
                    while ( have_posts() ) : the_post();
                    $x++;
                ?>

                <div class="one-third <?php if( $x == 1 ){ echo "first"; }elseif( $x == 3 ){ echo "last"; } ?>">
                    <div class="bubble-chat">
                        <?php the_post_thumbnail('thumbnail', array( 'class' => 'customer-image' ) ) ?>
                        <p><?php the_content(); ?></p>
                        <div class="customer-info">
                            <h5><?php the_title(); ?></h5>
                            <span><?php echo vp_metabox('slider_options.position'); ?></span>
                            <p><?php the_time('F m, Y'); ?></p>
                        </div>
                    </div>
                </div>
                
                <?php endwhile; // End of Loop ?>
                
            <div class="clear"></div>
            </div>
        </div>
    </div>
    <!-- Testimonials -->
<?php } ?>
<?php get_header(); ?>
    
    <!-- Heading -->
    <div class="heading services-page">
        <div class="container">
            <div class="full-width">
                
                <!--
                <div class="heading-center">
                    <?php if( vp_option('vpt_option.home_title') != '' ){ ?><h1><?php echo vp_option('vpt_option.home_title'); ?></h1><?php } ?>
                    <?php if( vp_option('vpt_option.home_sub_title') != '' ){ ?><h2><?php echo vp_option('vpt_option.home_sub_title'); ?></h2><?php } ?>
                    <?php echo do_shortcode('[signup_form]'); ?>
                </div>

                <div class="spacing-50"></div>
                -->
                
                <?php if( vp_metabox('page_options.sub_title') != '' && vp_metabox('page_options.sub_title') != '' ){ ?>
                <div class="heading-center">
                    <?php if( vp_metabox('page_options.title') != '' ){ ?><h1><?php echo vp_metabox('page_options.title'); ?></h1><?php } ?>
                    <?php if( vp_metabox('page_options.sub_title') != '' ){ ?><h2><?php echo vp_metabox('page_options.sub_title'); ?></h2><?php } ?>
                </div>
                <div class="spacing-30"></div>
                <?php } ?>

            
                <div class="clear"></div>
            </div>
        </div>
    <div class="cloud-back-2"></div>
    <div class="cloud-back"></div>
    <div class="cloud"></div>
    </div>
    <!-- Heading -->
    
    <!-- Content -->
    <div class="page-container home"> 
        <div class="container">
            <div class="full-width">

                <div class="page-cta">
                    <?php echo do_shortcode('[signup_form]'); ?>
                </div>

                <?php while (have_posts()) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; ?>

              <div class="clear"></div>
            </div>
        </div>
    </div>
    <!-- Content -->

<?php get_footer(); ?>
<?php /* Template Name: Default Page */ ?>
<?php get_header(); ?>
    
    <?php if( vp_option('vpt_option.enable_home_header') == '1' ){ ?>
    <!-- Heading -->
    <div class="heading">
        <div class="container">
            <div class="full-width">
                
                <div class="two-third first">
                    <?php if( vp_option('vpt_option.home_title') != '' ){ ?><h1><?php echo vp_option('vpt_option.home_title'); ?></h1><?php } ?>
                    <?php if( vp_option('vpt_option.home_sub_title') != '' ){ ?><h2><?php echo vp_option('vpt_option.home_sub_title'); ?></h2><?php } ?> 
                    <?php if( vp_option('vpt_option.home_desc') != '' ){ ?><p><?php echo vp_option('vpt_option.home_desc'); ?></p><?php } ?>
                    <?php echo do_shortcode('[signup_form]'); ?>
                </div>
                
                <!--
                <?php if( vp_option('vpt_option.home_animation') != '' ){ ?>
                    <div class="one-half last r-container">
                        <img class="rocket" src="<?php echo vp_option('vpt_option.home_animation'); ?>">
                    </div>
                <?php } ?>
                -->

                <div class="clear"></div>
            </div>
        </div>
        
        <div class="cloud-back-2"></div>
        <div class="cloud-back"></div>
        <div class="cloud"></div>
    </div>
    <!-- Header -->
    <?php } ?>
    
    <!-- Content -->
    <div class="page-container home"> 
        <div class="container">
            <div class="full-width">

              <?php while (have_posts()) : the_post(); ?>
                <?php the_content(); ?>
              <?php endwhile; ?>

              <div class="clear"></div>
            </div>
        </div>
    </div>
    <!-- End of Content -->
    

<?php get_footer(); ?>
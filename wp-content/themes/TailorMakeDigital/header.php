<html <?php language_attributes(); ?>>
    <head>

        <!-- Required meta tags-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
        <meta name="mobile-web-app-capable" content="yes">

        <?php wp_head(); ?>

        <!-- Google Tracking Code -->
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-106626187-1', 'auto');
          ga('send', 'pageview');

        </script>
        <!-- Google Tracking Code -->

        <!-- Facebook Tracking Code -->
        <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window,document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
         fbq('init', '175812609463728'); 
        fbq('track', 'PageView');
        </script>
        <noscript>
         <img height="1" width="1" 
        src="https://www.facebook.com/tr?id=175812609463728&ev=PageView
        &noscript=1"/>
        </noscript>
        <!-- Facebook Tracking Code -->

    </head>
<body <?php body_class(); ?>>
    <div class="responsive-main-menu"></div>
    <div class="menu-spacer-50"></div>
    <!-- Top Bar -->
    <div class="top-bar">
        <div class="container">
            <div class="full-width">
               
                <div class="one-half first">
                    <div class="contact-details">
                        <?php if( vp_option('vpt_option.phone') != '' ){ ?><a href="#"><i class="fa fa-phone"><span><?php echo vp_option('vpt_option.phone'); ?></span></i></a><?php } ?>
                        <?php if( vp_option('vpt_option.email') != '' ){ ?><a href="#"><i class="fa fa-envelope"><span><?php echo vp_option('vpt_option.email'); ?></span></i></a><?php } ?>
                    </div> 
                </div>
                
                <div class="one-half last">

                    <ul class="social">
                        <?php if( vp_option('vpt_option.facebook') != '' ){ ?><li><a href="<?php echo vp_option('vpt_option.facebook'); ?>"><i class="fa fa-facebook-official"></i></a></li><?php } ?>
                        <?php if( vp_option('vpt_option.twitter') != '' ){ ?><li><a href="<?php echo vp_option('vpt_option.twitter'); ?>"><i class="fa fa-twitter"></i></a></li><?php } ?>
                        <?php if( vp_option('vpt_option.google') != '' ){ ?><li><a href="<?php echo vp_option('vpt_option.google'); ?>"><i class="fa fa-google-plus"></i></a></li><?php } ?>
                        <?php if( vp_option('vpt_option.linkedin') != '' ){ ?><li><a href="<?php echo vp_option('vpt_option.linkedin'); ?>"><i class="fa fa-linkedin"></i></a></li><?php } ?>
                    </ul>

                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <!-- Top Bars -->
    
    
    
    
    
    <!-- Header Bar -->
    <div class="header">
        <div class="container">
            <div class="full-width">
                
                    <div class="one-fourth first">
                        <a href="<?php echo get_home_url(); ?>"><img src="<?php echo vp_option('vpt_option.logo'); ?>" class="logo"></a>
                    </div>

                    <?php get_template_part('includes/main-menu'); ?>
                
            <div class="clear"></div>
            </div>
        </div>
    </div>
    <!-- Header Bar -->

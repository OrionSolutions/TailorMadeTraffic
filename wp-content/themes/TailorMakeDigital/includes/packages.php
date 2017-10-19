<?php if( vp_option('vpt_option.enable_package') == '1' ){ ?>
    <!-- Pricing -->
    <div class="container">
        <div class="full-width">
           <div class="pricing">
                <?php if( vp_option('vpt_option.pricing_title') != '' ){ ?><h1><?php echo vp_option('vpt_option.pricing_title'); ?></h1><?php } ?>
                <?php if( vp_option('vpt_option.pricing_desc') != '' ){ ?><p><?php echo vp_option('vpt_option.pricing_desc'); ?></p><?php } ?>
              
               
               <div class="tbl-item medium left">
                    <h2 class="green"><?php echo vp_option('vpt_option.left_pricing_name'); ?></h2>
                    <h1><i class="fa fa-usd"></i><?php echo vp_option('vpt_option.left_pricing_amount'); ?></h1>
                   <div class="break"></div>
                    <span>Per Campaign</span>
                   
                   <div class="tbl-container">
                        <p><?php echo vp_option('vpt_option.left_pricing_desc'); ?></p>
                   </div>
                        
                        <?php if( vp_option('vpt_option.left_pricing_feature_1') != '' || vp_option('vpt_option.left_pricing_feature_2') != '' || vp_option('vpt_option.left_pricing_feature_3') != '' || vp_option('vpt_option.left_pricing_feature_4') != '' || vp_option('vpt_option.left_pricing_feature_5') != '' ){ ?>
                        <ul class="plan green">
                            <?php if( vp_option('vpt_option.left_pricing_feature_1') != '' ){ ?>
                                <li><p><?php echo vp_option('vpt_option.left_pricing_feature_1'); ?></p></li>
                            <?php } ?>

                            <?php if( vp_option('vpt_option.left_pricing_feature_2') != '' ){ ?>
                                <li><p><?php echo vp_option('vpt_option.left_pricing_feature_2'); ?></p></li>
                            <?php } ?>

                            <?php if( vp_option('vpt_option.left_pricing_feature_3') != '' ){ ?>
                                <li><p><?php echo vp_option('vpt_option.left_pricing_feature_3'); ?></p></li>
                            <?php } ?>

                            <?php if( vp_option('vpt_option.left_pricing_feature_4') != '' ){ ?>
                                <li><p><?php echo vp_option('vpt_option.left_pricing_feature_4'); ?></p></li>
                            <?php } ?>
                        </ul>
                        <?php } ?>
                   
                    <?php if( vp_option('vpt_option.left_pricing_button') != '' ){ ?>
                        <a href="<?php echo vp_option('vpt_option.left_pricing_button'); ?>" class="button main">Buy Now</a>
                    <?php } ?>
               </div>
               
               
               <div class="tbl-item medium right">
                    <h2 class="red"><?php echo vp_option('vpt_option.right_pricing_name'); ?></h2>
                    <h1><i class="fa fa-usd"></i><?php echo vp_option('vpt_option.right_pricing_amount'); ?></h1>
                  <div class="break"></div>
                    <span>Per Campaign</span>
                   
                   <div class="tbl-container">
                        <p><?php echo vp_option('vpt_option.right_pricing_desc'); ?></p>
                   </div>
                   
                        <?php if( vp_option('vpt_option.right_pricing_feature_1') != '' || vp_option('vpt_option.right_pricing_feature_2') != '' || vp_option('vpt_option.right_pricing_feature_3') != '' || vp_option('vpt_option.right_pricing_feature_4') != '' || vp_option('vpt_option.right_pricing_feature_5') != '' ){ ?>
                        <ul class="plan red">
                            <?php if( vp_option('vpt_option.right_pricing_feature_1') != '' ){ ?>
                                <li><p><?php echo vp_option('vpt_option.right_pricing_feature_1'); ?></p></li>
                            <?php } ?>

                            <?php if( vp_option('vpt_option.right_pricing_feature_2') != '' ){ ?>
                                <li><p><?php echo vp_option('vpt_option.right_pricing_feature_2'); ?></p></li>
                            <?php } ?>

                            <?php if( vp_option('vpt_option.right_pricing_feature_3') != '' ){ ?>
                                <li><p><?php echo vp_option('vpt_option.right_pricing_feature_3'); ?></p></li>
                            <?php } ?>

                            <?php if( vp_option('vpt_option.right_pricing_feature_4') != '' ){ ?>
                                <li><p><?php echo vp_option('vpt_option.right_pricing_feature_4'); ?></p></li>
                            <?php } ?>
                        </ul>
                        <?php } ?>

                        <?php if( vp_option('vpt_option.right_pricing_button') != '' ){ ?>
                            <a href="<?php echo vp_option('vpt_option.right_pricing_button'); ?>" class="button main">Buy Now</a>
                        <?php } ?>
               </div>
               
               
               <div class="tbl-item big centered">
                    <h2 class="blue"><?php echo vp_option('vpt_option.center_pricing_name'); ?></h2>
                   <h1><i class="fa fa-usd"></i><?php echo vp_option('vpt_option.center_pricing_amount'); ?></h1>
                   <div class="break"></div>
                    <span>Per Campaign</span>
                   
                   <div class="tbl-container">
                         <p><?php echo vp_option('vpt_option.center_pricing_desc'); ?></p>
                   </div>
                   
                         <?php if( vp_option('vpt_option.center_pricing_feature_1') != '' || vp_option('vpt_option.center_pricing_feature_2') != '' || vp_option('vpt_option.center_pricing_feature_3') != '' || vp_option('vpt_option.center_pricing_feature_4') != '' || vp_option('vpt_option.center_pricing_feature_5') != '' ){ ?>
                        <ul class="plan blue">
                            <?php if( vp_option('vpt_option.center_pricing_feature_1') != '' ){ ?>
                                <li><p><?php echo vp_option('vpt_option.center_pricing_feature_1'); ?></p></li>
                            <?php } ?>

                            <?php if( vp_option('vpt_option.center_pricing_feature_2') != '' ){ ?>
                                <li><p><?php echo vp_option('vpt_option.center_pricing_feature_2'); ?></p></li>
                            <?php } ?>

                            <?php if( vp_option('vpt_option.center_pricing_feature_3') != '' ){ ?>
                                <li><p><?php echo vp_option('vpt_option.center_pricing_feature_3'); ?></p></li>
                            <?php } ?>

                            <?php if( vp_option('vpt_option.center_pricing_feature_4') != '' ){ ?>
                                <li><p><?php echo vp_option('vpt_option.center_pricing_feature_4'); ?></p></li>
                            <?php } ?>
                        </ul>
                        <?php } ?>

                        <?php if( vp_option('vpt_option.center_pricing_button') != '' ){ ?>
                            <a href="<?php echo vp_option('vpt_option.center_pricing_button'); ?>" class="button main">Learn More</a>
                        <?php } ?>

               </div>
               
               <div class="clear"></div> 
           </div>
        </div>
    </div>
    <!-- Pricing -->
    <?php } ?>
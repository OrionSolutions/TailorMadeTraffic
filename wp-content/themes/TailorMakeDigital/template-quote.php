<?php /* Template Name: Quote Form */ ?>
<?php get_header(); ?>
    
    <!-- Heading -->
    <div class="heading services-page">
        <div class="container">
            <div class="full-width">
                
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
    <div class="page-container quote-page"> 
        <div class="container">
            <div class="full-width">

              <?php while (have_posts()) : the_post(); ?>

                <div class="one-third first">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/tailor.png" class="mascot">
                </div>

                <div class="two-third last">
                <div class="quote-form-container">
                    <div id='zohoSupportWebToCase' align='center'>
                        <form name='zsWebToCase_5015000000025226' id='zsWebToCase_5015000000025226' action='https://desk.zoho.eu/support/WebToCase' method='POST' onSubmit='return zsValidateMandatoryFields()' enctype='multipart/form-data'>
                            <input type='hidden' name='xnQsjsdp' value='5UQXzKstp5fDqGp6cYmn6A$$' />
                            <input type='hidden' name='xmIwtLD' value='mBXvah0GXXc-C4MPF94GBm2Fij-RGXv3' />
                            <input type='hidden' name='actionType' value='Q2FzZXM=' />
                            <input type="hidden" id="property(module)" value="Cases" />
                            <input type="hidden" id="dependent_field_values_Cases" value="&#x7b;&quot;JSON_VALUES&quot;&#x3a;&#x7b;&quot;Category&quot;&#x3a;&#x7b;&quot;Sub&#x20;Category&quot;&#x3a;&#x7b;&quot;General&quot;&#x3a;&#x5b;&quot;Sub&#x20;General&quot;&#x5d;,&quot;Defects&quot;&#x3a;&#x5b;&quot;Sub&#x20;Defects&quot;&#x5d;&#x7d;&#x7d;&#x7d;,&quot;JSON_SELECT_VALUES&quot;&#x3a;&#x7b;&quot;Status&quot;&#x3a;&#x5b;&quot;Open&quot;,&quot;On&#x20;Hold&quot;,&quot;Escalated&quot;,&quot;Closed&quot;&#x5d;,&quot;Category&quot;&#x3a;&#x5b;&quot;General&quot;,&quot;Defects&quot;&#x5d;,&quot;Priority&quot;&#x3a;&#x5b;&quot;-None-&quot;,&quot;High&quot;,&quot;Medium&quot;,&quot;Low&quot;&#x5d;,&quot;Classification&quot;&#x3a;&#x5b;&quot;-None-&quot;,&quot;Question&quot;,&quot;Problem&quot;,&quot;Feature&quot;,&quot;Others&quot;&#x5d;,&quot;Mode&quot;&#x3a;&#x5b;&quot;Phone&quot;,&quot;Email&quot;,&quot;Web&quot;,&quot;Twitter&quot;,&quot;Facebook&quot;,&quot;Chat&quot;,&quot;Forums&quot;&#x5d;,&quot;Sub&#x20;Category&quot;&#x3a;&#x5b;&quot;Sub&#x20;General&quot;,&quot;Sub&#x20;Defects&quot;&#x5d;&#x7d;,&quot;JSON_MAP_DEP_LABELS&quot;&#x3a;&#x5b;&quot;Category&quot;&#x5d;&#x7d;">
                            <input type="hidden" name="returnURL" value="http://tailormadetraffic.com/support/" />

                            <h1>Need pricing quote?<span>A dedicated team of sales representative are standing by to assist you!</span></h1>

                            <input type="hidden" name='Classification' value='Quote price' id='Classification'>

                            <div class="one-half first">
                                <label>
                                <i class="fa fa-user"></i>
                                <input type="text" maxlength="120" name="First Name" value="" class="textbox" placeholder="First Name" required>
                                </label>

                                <label>
                                <i class="fa fa-envelope-o"></i>
                                <input type="email" maxlength="120" name="Email" value="" class="manfieldbdr textbox" placeholder="Email" required>
                                </label>
                            </div>

                            <div class="one-half last">
                                <label>
                                <i class="fa fa-user"></i>
                                <input type="text" maxlength="120" name="Contact Name" class="manfieldbdr textbox" placeholder="Last Name" required>
                                </label>

                                <label>
                                <i class="fa fa-phone"></i>
                                <input type="number" maxlength="120" name="Phone" placeholder="Phone Number" class="textbox" required>
                                </label>

                            </div>

                            <div class="clear"></div>

                            <label>
                            <i class="fa fa-pencil"></i>
                            <input type="text" maxlength="255" name="Subject" value="" class="manfieldbdr textbox" placeholder="Subject" required>
                            </label>

                            <textarea name="Description" maxlength="3000" width="250" height="250" class="textarea" placeholder="Add Description" required></textarea>

                            <input type="submit" id="zsSubmitButton_5015000000025226" class="zsFontClass button" value="Submit">
                            <input type="button" class="zsFontClass button" value="Reset" onclick='zsResetWebForm("5015000000025226")'>

                            <div class="clear"></div>
                        </form>
                    </div>
                </div>
                </div>             

                <?php endwhile; ?>

              <div class="clear"></div>
            </div>
        </div>
    </div>
    <!-- Content -->

<?php get_footer(); ?>
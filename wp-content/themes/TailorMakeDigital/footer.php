    
<!-- ClickDesk Live Chat Service for websites -->
<script type='text/javascript'>
var _glc =_glc || []; _glc.push('all_ag9zfmNsaWNrZGVza2NoYXRyEgsSBXVzZXJzGICAoOO04-gIDA');
var glcpath = (('https:' == document.location.protocol) ? 'https://my.clickdesk.com/clickdesk-ui/browser/' : 
'http://my.clickdesk.com/clickdesk-ui/browser/');
var glcp = (('https:' == document.location.protocol) ? 'https://' : 'http://');
var glcspt = document.createElement('script'); glcspt.type = 'text/javascript'; 
glcspt.async = true; glcspt.src = glcpath + 'livechat-new.js';
var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(glcspt, s);
</script>
<!-- End of ClickDesk Chat -->

    <!-- ================================ Footer Container ================================= -->
    <div class="footer-section">
        <div class="container">
            <div class="full-width">
                
                <div class="top-foot">
                    <div class="one-half first">
                        <h2><?php echo vp_option('vpt_option.copyright_title'); ?></h2>
                        <p><?php echo vp_option('vpt_option.copyright'); ?></p>
                    </div>
                
                    <div class="one-half last btn-footer">
                        <a class="button red" href="#">Ask a Question</a>
                        <a class="button red" href="#">Get a Quote</a>
                    </div>
                    <div class="clear"></div>
                </div>
                
                <?php get_sidebar('footer'); ?>
                
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <!-- ================================ Footer Container ================================= -->

    <?php wp_footer(); ?>

    </body>
</html>
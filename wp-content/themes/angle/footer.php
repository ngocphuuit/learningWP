        <?php
        $footer_decoration = oxy_get_option( 'footer_decoration' );
        $upper_footer_decoration = oxy_get_option( 'upper_decoration' );
        ?>

        <footer id="footer" role="contentinfo">
            <?php if(is_active_sidebar('upper-footer-middle') || is_active_sidebar('upper-footer-right') || is_active_sidebar('upper-footer-left') || is_active_sidebar('upper-footer-middle-left') || is_active_sidebar('upper-footer-middle-right')): ?>
            <section class="section <?php oxy_upper_footer_section_classes(); ?>">
                <?php echo oxy_section_decoration( 'top', $upper_footer_decoration ); ?>
                <div class="container">
                    <div class="row">
                    <?php   $columns = oxy_get_option('upper_footer_columns');
                    $span = $columns == false? 'col-md-12' : 'col-md-' . (12/$columns);
                        if( $columns == 1){ ?>
                            <div class="<?php echo $span; ?> text-center"><?php dynamic_sidebar('upper-footer-middle'); ?></div><?php
                        }
                        else if( $columns == 2){ ?>
                            <div class="<?php echo $span; ?>"><?php dynamic_sidebar('upper-footer-left'); ?></div>
                            <div class="<?php echo $span; ?> text-right"><?php dynamic_sidebar('upper-footer-right'); ?></div><?php
                        }
                        else if( $columns == 3){ ?>
                            <div class="<?php echo $span; ?>"><?php dynamic_sidebar('upper-footer-left'); ?></div>
                            <div class="<?php echo $span; ?> text-left"><?php dynamic_sidebar('upper-footer-middle'); ?></div>
                            <div class="<?php echo $span; ?> text-left"><?php dynamic_sidebar('upper-footer-right'); ?></div><?php
                        }
                        else if ( $columns == 4){ ?>
                            <div class="<?php echo $span; ?>"><?php dynamic_sidebar('upper-footer-left'); ?></div>
                            <div class="<?php echo $span; ?>"><?php dynamic_sidebar('upper-footer-middle-left'); ?></div>
                            <div class="<?php echo $span; ?>"><?php dynamic_sidebar('upper-footer-middle-right'); ?></div>
                            <div class="<?php echo $span; ?>"><?php dynamic_sidebar('upper-footer-right'); ?></div><?php
                        }?>
                    </div>
                </div>
            </section>
            <?php endif; ?>
            <?php if(is_active_sidebar('footer-middle') || is_active_sidebar('footer-right') || is_active_sidebar('footer-left') || is_active_sidebar('footer-middle-left') || is_active_sidebar('footer-middle-right')): ?>
            <section class="section <?php oxy_footer_section_classes();?>">
                <?php echo oxy_section_decoration( 'top', $footer_decoration ); ?>
                <div class="container">
                    <div class="row">
                    <?php   $columns = oxy_get_option('footer_columns');
                    $span = $columns == false? 'col-md-12':'col-md-'.(12/$columns);
                        if( $columns == 1){ ?>
                            <div class="<?php echo $span; ?> text-center"><?php dynamic_sidebar('footer-middle'); ?></div><?php
                        }
                        else if( $columns == 2){ ?>
                            <div class="<?php echo $span; ?>"><?php dynamic_sidebar('footer-left'); ?></div>
                            <div class="<?php echo $span; ?> text-right"><?php dynamic_sidebar('footer-right'); ?></div><?php
                        }
                        else if( $columns == 3){ ?>
                            <div class="<?php echo $span; ?>"><?php dynamic_sidebar('footer-left'); ?></div>
                            <div class="<?php echo $span; ?> text-left"><?php dynamic_sidebar('footer-middle'); ?></div>
                            <div class="<?php echo $span; ?> text-left"><?php dynamic_sidebar('footer-right'); ?></div><?php
                        }
                        else if ( $columns == 4){ ?>
                            <div class="<?php echo $span; ?>"><?php dynamic_sidebar('footer-left'); ?></div>
                            <div class="<?php echo $span; ?>"><?php dynamic_sidebar('footer-middle-left'); ?></div>
                            <div class="<?php echo $span; ?>"><?php dynamic_sidebar('footer-middle-right'); ?></div>
                            <div class="<?php echo $span; ?>"><?php dynamic_sidebar('footer-right'); ?></div><?php
                        }?>
                    </div>
                </div>
            </section>
            <?php endif; ?>
        </footer>
    </div>
        <!-- Fixing the Back to top button -->
        <?php $enable = oxy_get_option('back_to_top');

        if( $enable == 'enable' ){ ?>
            <a href="javascript:void(0)" class="go-top hex-alt">
                <i class="fa fa-angle-up">
                </i>
            </a>
                         <?php   } ?>



        <script type="text/javascript">
            //<![CDATA[
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', '<?php echo oxy_get_option( 'google_anal' ) ?>']);
            _gaq.push(['_trackPageview']);

            (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();
            //]]>
        </script>
        <?php wp_footer(); ?>
    </body>
</html>
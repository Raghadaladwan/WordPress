<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fog-lite
 */

?>
		<!--
        ===================
           FOOTER
        ===================
        --> 
		</div>
        <footer class="section zb-footer lo-footer  wow fadeInUp">
            <div class="container">
                <div class="row relative mini-section-separator">
                    <div class="col-sm-4" id="footer-sidebar-1">
						
						  <ul class="social-icon">
							<?php
						
							$social_icons = array('facebook','twitter','googlePlus','dribbble','youtube','linkedin');
							foreach( $social_icons as $social_icon){
								$fog_lite_social_icons = get_theme_mod ('fog_lite_'.esc_html($social_icon).'_url');
								if( $fog_lite_social_icons ){
									echo '<li class="banner4_socials_'.$social_icon.'"><a href="'. esc_url($fog_lite_social_icons).'" target="_blank">';
									if( $social_icon == 'googlePlus' ){
										echo '<i class ="fa fa-google-plus"></i>'; 
									}else{
										echo '<i class ="fa fa-'. esc_attr($social_icon).'"></i>';    
									}
									echo '</a></li>';
								}
							}
							?>
                            
                        </ul>
                    </div>
                    <div class="col-sm-4">
                        <div class="footer-links" id="footer-sidebar-2">
							<?php
							
							wp_nav_menu( array(
										'theme_location' => 'new-menu',
										'menu_id'        => 'new-menu',
										'container' => 'ul',
										'menu_class' => 'navbar-nav mr-0 ml-auto',
										'link_class'   => 'nav-link'
							) );
							if(is_active_sidebar('footer-sidebar-2')){
								dynamic_sidebar('footer-sidebar-2');
							}
							?>
                        </div>
                    </div>
                    <div class="col-sm-4 pro_version_class" id="footer-sidebar-3">
						<?php
						
							echo '<a class="fog-lite-copyright" rel="nofollow">© 2019 Fog Lite </a>' . sprintf( __( 'developed by %s', 'fog-lite' ), '<a class="fog-lite-copyright" href="' . esc_url( 'http://themeflux.com' ) . '"  rel="nofollow">' . __( 'Themeflux', 'fog-lite' ) . '</a>' );
							
						?>
                        
                    </div>

                </div>
            </div>
        </footer>  
    
    <!--
    ==============
    * JS Files *
    ==============
    -->
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    

	<?php 
		wp_footer(); 
	
	?> 
</body>
</html>


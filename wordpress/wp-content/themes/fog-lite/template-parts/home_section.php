		<!--
        ===================
            HOME 
        =================== 
        -->
		<div class="front_layouts">
		<?php 
		if(get_theme_mod('fog_lite_home_banner_enable'))
		{
		$banner_tops='';
		$de_image = esc_url(get_template_directory_uri().'/assets/images/header-bg.png');
		$defults_banners = get_theme_mod('fog_lite_banner_background_image',"$de_image");
		$checks=explode(".",$defults_banners);
		if(count($checks)==1)
		{
			$remove = array("http://","https://");
			$defults_banners=str_replace($remove,"",$defults_banners);
			$defults_banners=wp_get_attachment_url($defults_banners);
		}
		$img_ext=1;
		if($defults_banners)
		{
			if(is_array(getimagesize($defults_banners)))
			{
				$img_ext=1;
			}
			else 
			{
				$img_ext=0;
			}
		}
		if($defults_banners && $img_ext==1) { 
			$banner_tops="background-image: url(".esc_url($defults_banners).");";
		}
		
		?>
        <div class="section zb-home lo-home  header-bg image-bg  home_manepage" id="lo-home" style="<?php echo $banner_tops; ?>" >
			<?php if($img_ext==0){ ?>
			 <video width="100%" height="" autoplay muted loop class="vide_img_size" >
				  <source src="<?php echo esc_url($defults_banners); ?>" type="video/mp4">
				  <source src="<?php echo esc_url($defults_banners); ?>" type="video/ogg">
				  <?php echo esc_html__( 'Your browser does not support the video tag.', 'fog-lite' ); ?>
			</video> 
			<?php } ?>
            <div class="color-overlay home-h ">
                <div class="tabbbel_d1">
                	<div class="tabbbel_d2 ">
                		<div class="container home4_banners">
                    <div class="row section-separator relative">
                    	   <ul class="home-social">
							<?php 
								$social_icons_default=array('facebook'=>'https://www.facebook.com/','twitter'=>'https://twitter.com/','linkedin'=>'https://in.linkedin.com/');
								$social_icons= array('facebook','twitter','googlePlus','dribbble','youtube','linkedin');
								foreach( $social_icons as $social_icon){
									$fog_lite_social_icons = get_theme_mod ('fog_lite_'.$social_icon.'_url');
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
                        <div class="col-sm-12">
                            <div class="lo_content_inner">
								<?php 
								$banners_text=get_theme_mod('banner_text_setting',__( 'Capture Your Moments', 'fog-lite' ));
								if($banners_text)
								{									?>
                                <h2 class="main_heading wow fadeInRight banner4_headings"><?php echo $banners_text; ?></h2> 
								<?php } 
								$but_texts=get_theme_mod('banner_button_setting',__( 'Get started', 'fog-lite' ));
								
								if($but_texts)
								{
								?>
                                <div class="lo-button">
									<?php 
									$links="javascript:void(0)";
									if(get_theme_mod('banner_button_link'))
									{
										$links=esc_url(get_theme_mod('banner_button_link'));
									}
									?>
                                    <a href="<?php echo $links; ?>" class="btn btn-fill wow fadeInLeft banner4_buttons"><?php echo $but_texts; ?></a>   
                                </div>
								<?php } ?>
                            </div>
                         
                        </div>
                    </div>
                </div>
                	</div>
                </div>
            </div>
        </div>
		<?php } 
		if(get_theme_mod('fog_lite_partner_section_enable'))
		{
		
		?>
        <!--
        ===================
            CLIENT
        =================== 
        -->
        <section>
            <div class="container">
                <div class="row section-separator pt-0 cl-logo-sec">
                    <div class="cl-logo col-sm-12" >
					<?php
						$partners_icons = array('one','two','three','four','five','six');
						foreach( $partners_icons as $keys=>$partners_icon){
							$all_images=get_theme_mod('fog_lite_partner_'.$partners_icon.'_image');
							if($all_images)
							{
								?>
								<span class="client4_partner_<?php echo $partners_icon; ?>_set">
								<img src="<?php echo $all_images; ?>"  alt="" class="wow fadeInUp ">
								</span>
								<?php
							}
								
						}
					?>
                        
                    </div>
                </div>
            </div>
        </section>
		<?php } 
			
		if(get_theme_mod('fog_lite_aboutus_section_enable'))
		{
		?>
       <!--
        ===================
            ABOUT 
        =================== 
        -->
        <section class="section lo-about" id="lo-about">
			<?php 
			$about_left_section='';
			if(get_theme_mod('fog_lite_aboutus_background_image'))
			{	
				$about_left_section='background-image: url('.get_theme_mod('fog_lite_aboutus_background_image').');';
			}		
			?>
            <div class="container-half container-half-left cover-bg" style="<?php echo $about_left_section; ?>"></div>
            <div class="container-half container-half-right main-color-bg"></div>
            <div class="container about4_banner">
                <div class="row">
                     <div class="col-lg-7 col-md-12 offset-lg-5">
                        <div class="col-sm-12 lo-again-section-title about-sec-title mb-0">
							<?php
							$fog_lite_aboutus_title=get_theme_mod('fog_lite_aboutus_title',__( 'ABOUT US', 'fog-lite' ));
							if($fog_lite_aboutus_title)
							{
							?>
                            <div class="heading-corners ex-heading-corners about4_title">
                                <span class=" section-tagline wow fadeInRight"> <?php echo $fog_lite_aboutus_title ?></span>
                            </div>
                            <?php } 
							$heading_text=get_theme_mod('fog_lite_aboutus_heading');
							if($heading_text)
							{
							?>
                            <h2 class="wow fadeInLeft about4_headings"><?php echo $heading_text; ?></h2>
							<?php } ?>
                        </div>
                        <div id="integration-list" class="uv-accordinaton wow fadeInUp " data-wow-duration="0.8s" data-wow-delay="0.5s">
                            <ul>
								<?php 
								$all_about_listings=get_theme_mod('multiple_select_setting_aboutus');
								if($all_about_listings && count($all_about_listings))
								{
									foreach($all_about_listings as $keys=>$dlist)
									{
									
										$nposts = get_post($dlist);
										if(count($nposts))
										{
										$aboutposts=$nposts;
										$first_show='';
										$first_sign='+';
										if($keys==0)
										{
											$first_show='display: block;';
											$first_sign='-';
										}
									?>
									<li class="wow fadeInLeft about4_faqs_<?php echo $keys; ?>">
                                    <a class="uv-accordinaton-list">
                                        <div class="uv-right-arrow"><?php echo $first_sign; ?></div>
                                        <h2><?php echo $aboutposts->post_title; ?></h2>
                                    </a>
                                    <div class="uv-accordition-detail col-sm-12" style="<?php echo $first_show; ?>">
                                        <div class="row">
                                            
                                            <div class="uv-ac-details col-md-12 col-sm-12">
                                                <p><?php echo 
												substr($aboutposts->post_content,0,350); ?></p>
                                            </div>
                                        </div>
                                    </div>
									</li>
									<?php
									}
									}
								}
								
								?>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		
		<?php } 
		if(get_theme_mod('fog_lite_portfolio_section_enable'))
		{
		?>
        <!--
        ===================
            PORTFOLIO 
        =================== 
        -->
        <section class="lo-team image-bg" id="lo-portfolio" style="">
            <div class="container">
                <div class="row relative section-separator">  
                    <div class="lo-again-section-title portolio-sec-title">
						<?php
						$fog_lite_portfolio_title=get_theme_mod('fog_lite_portfolio_title',__( 'Portfolio', 'fog-lite' ));
						if($fog_lite_portfolio_title)
							{
							?>
                             <div class="heading-corners portfolio4_title">
								<span class="section-tagline wow fadeInLeft"> <?php echo $fog_lite_portfolio_title; ?></span>
							 </div>
                            <?php }
							$prots_headingss=get_theme_mod('fog_lite_portfolio_heading',__( 'The Works We Have Already Completed', 'fog-lite' ));
							if($prots_headingss)
							{
							?>
							<h2 class="wow fadeInUp portfolio4_heading"><?php echo $prots_headingss; ?></h2>
							<?php } ?>
                    </div>
                    <div class="col-sm-12 wow fadeInUp" id="ac-team">
						<?php 
						
						$portfolio_images=get_theme_mod('fog_lite_portfolio_nosection',6);
						for($k=1;$k<=$portfolio_images;$k++)
						{
							$portfolio_image=$k;
							$have_image=get_theme_mod('fog_lite_portfolio_'.$portfolio_image.'_image');
							if($have_image)
							{
							?>
							<div class="bg-3">
                            <div class="lo-team-item portfolio4_slider_<?php echo $portfolio_image;?>">                            
                                <img src="<?php echo $have_image; ?>" alt="" class="img-fluid mr-0">
                            </div>
							</div> 
							<?php
							}
						}
						?>                 
         
                    </div>  
                </div>       
            </div>
        </section>
		<?php } 
		
        if(get_theme_mod('fog_lite_testimonial_section_enable'))
		{
		?>
        <!--
        ===================
            REVIEW 
        =================== 
        -->
        <section class="lo-testimonial" id="lo-review">
            <div class="container">
                <div class="row section-separator">
					<?php
					$section_title=get_theme_mod('fog_lite_testimonial_heading',__( 'What Clients Say About Us', 'fog-lite' ));
					if($section_title)
					{
					?>
                    <div class="col-sm-12 lo-again-section-title wow fadeInUp testimonial4_heading">
                        <h2><?php echo $section_title; ?></h2>
                    </div> 
                    <?php } ?>
                    <div class="col-md-12 col-lg-10 wow fadeInUp center" id="mh-client-review">
					 
					 <?php 
						$all_testimon_listings=get_theme_mod('multiple_select_setting_testimonial');
						if($all_testimon_listings && count($all_testimon_listings))
						{
							foreach($all_testimon_listings as $keys=>$dlist)
							{
							
								$nposts = get_post($dlist);
								if(count($nposts))
								{
								$testimonialposts=$nposts;
								$first_show='';
								$first_sign='+';
								if($keys==0)
								{
									$first_show='display: block;';
									$first_sign='-';
								}
								$imagess='';
								if(get_the_post_thumbnail_url($dlist))
								{
									$imagess=get_the_post_thumbnail_url($dlist);
								}
							?>
							
						<div class="testimonial-item">
							<div class="image_pre testimonial4_image_<?php echo $keys; ?>">
								<img src="<?php echo $imagess; ?>" alt="">
							</div>
                            <h4 class="testimonial4_name_<?php echo $keys; ?>"><?php echo $testimonialposts->post_title; ?></h4>
                           
                            <p class="testimonial4_feedback_<?php echo $keys; ?>"><?php echo substr($testimonialposts->post_content,0,80); ?> </p>
                        </div>
						
							<?php
							}
							}
						}
					?>
                    </div>
                </div>
            </div>
        </section>  
        <?php } 
		
		 if(get_theme_mod('fog_lite_features_section_enable'))
		 {
		?>

        <!--
        ===================
            SERVICE 
        =================== 
        -->
        <section class="lo-feature-service" id="lo-features">
            <div class="container">
                <div class="row relative section-separator">
					<?php 
					$sec_headings=get_theme_mod('fog_lite_features_heading',__( 'Our Featured Services', 'fog-lite' ));
					if($sec_headings)
						{
					?>
                    <div class="col-sm-12 lo-again-section-title wow fadeInUp features4_heading">
                        <h2><?php echo $sec_headings; ?></h2>
                    </div>
					<?php }
					
					
					$all_services_listings=get_theme_mod('multiple_select_setting_service');
						if($all_services_listings && count($all_services_listings))
						{
							foreach($all_services_listings as $keys=>$dlist)
							{
							
								$nposts = get_post($dlist);
								if(count($nposts))
								{
								$servicesposts=$nposts;
								$imagess='';
								if(get_the_post_thumbnail_url($dlist))
								{
									$imagess=get_the_post_thumbnail_url($dlist);
								}
							?>
							
							
						<div class="col-sm-6 col-lg-4 wow fadeInUp">
                        <div class="lo-f-service-item ">
                            <div class="s-icon service-icon-one features4_image_<?php echo $keys; ?>">
                                <img src="<?php echo esc_url($imagess); ?>" alt="">
                            </div>
                            <h4 class="features4_name_<?php echo $features_area; ?>"><?php echo $servicesposts->post_title; ?></h4>
                            <p class="features4_details_<?php echo $features_area; ?>"><?php echo substr($servicesposts->post_content,0,80); ?></p>
                        </div>
						</div>
							<?php
							}
							}
						}
					
					?>
                   
                </div>
            </div>
        </section>
		 <?php } ?>
		</div>
		
<?php
/**
 * fog_lite Theme Customizer
 *
 * @package fog-lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function fog_lite_theme_mods( $name ) {
    return get_theme_mod( $name);
}
function fog_lite_customize_register( $wp_customize ) {
    class Foglite_Customize_Control_Multiple_Select extends WP_Customize_Control {

    /**
     * The type of customize control being rendered.
     */
    public $type = 'multiple-select';

    /**
     * Displays the multiple select on the customize screen.
     */
    public function render_content() {

    if ( empty( $this->choices ) )
        return;
    ?>
        <label>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <select <?php $this->link(); ?> multiple="multiple" style="height: 100%;">
                <?php
                    foreach ( $this->choices as $value => $label ) {
                        $selected = ( in_array( $value, $this->value() ) ) ? selected( 1, 1, false ) : '';
                        echo '<option value="' . esc_attr( $value ) . '"' . $selected . '>' . $label . '</option>';
                    }
                ?>
            </select>
        </label>
    <?php }
	}
	
	
	class Foglite_Customize_testimonial_Multiple_Select extends WP_Customize_Control {

    /**
     * The type of customize control being rendered.
     */
    public $type = 'multiple-select';

    /**
     * Displays the multiple select on the customize screen.
     */
    public function render_content() {

    if ( empty( $this->choices ) )
        return;
    ?>
        <label>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <select <?php $this->link(); ?> multiple="multiple" style="height: 100%;">
                <?php
                    foreach ( $this->choices as $value => $label ) {
                        $selected = ( in_array( $value, $this->value() ) ) ? selected( 1, 1, false ) : '';
                        echo '<option value="' . esc_attr( $value ) . '"' . $selected . '>' . $label . '</option>';
                    }
                ?>
            </select>
        </label>
    <?php }
	}
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'fog_lite_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'fog_lite_customize_partial_blogdescription',
		) );
	}

	$wp_customize->add_panel( 'fog_lite_home_page_setting',array(
        'title'			=> __( 'Home Section', 'fog-lite' ),
        'description'	=> __( 'it shows Home Section', 'fog-lite' ),
        'priority'		=> 30,
    ));
	
	
	 
	$wp_customize->add_section('banner_settings_section', array(
	  'title'          => __( 'Banner', 'fog-lite' ),
	   'panel'		   => 'fog_lite_home_page_setting'
	 ));
	 
	/* banner section */
	$wp_customize->add_setting('fog_lite_home_banner_enable', array(
     'default'    => '',
	 'sanitize_callback' => 'fog_lite_sanitize_checkbox',
	));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'fog_lite_home_banner_enable',
			array(
				'label'     => __( 'Show Banner Section', 'fog-lite' ),
				'section'   => 'banner_settings_section',
				'settings'  => 'fog_lite_home_banner_enable',
				'type'      => 'checkbox',
			)
		)
	);
		 
	$wp_customize->add_setting( 'fog_lite_banner_background_image', array(
	    //'sanitize_callback' => 'esc_url_raw',
		'default'=>get_template_directory_uri()."/assets/images/header-bg.png",
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_url_raw',
        'type' => 'theme_mod',
	));
	
	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize,'fog_lite_banner_background_image',array(
       'label'      	=>__( 'Upload Background Image Or Video', 'fog-lite' ),
       'description'	=>__( 'upload a image or video for banner section', 'fog-lite' ),
       'section'    	=> 'banner_settings_section',
	   'mime_type' => 'video,image',  // Required. Can be image, audio, video, application, text
      'button_labels' => array( // Optional
         'select' => __( 'Select Image or Video','fog-lite' ),
         'change' => __( 'Change Image or Video','fog-lite' ),
         'remove' => __( 'Remove','fog-lite' ),
         'placeholder' => __( 'No file selected','fog-lite' ),
         'frame_title' => __( 'Select Image or Video','fog-lite' ),
         'frame_button' => __( 'Choose Image or Video','fog-lite' ),

      )
	   
	   
	   
	   
    )));
	
	 $wp_customize->selective_refresh->add_partial( 'fog_lite_banner_background_image', array(
		'selector' => '.home4_banners', // You can also select a css class
		'render_callback' => 'fog_lite_banner_background_image',
	) );
	 
	 $wp_customize->add_setting('banner_text_setting', array(
	 'default'        => __( 'Capture Your Moments', 'fog-lite' ),
	 'sanitize_callback' => 'wp_filter_nohtml_kses',
	 ));
	 
	 $wp_customize->add_control('banner_text_setting', array(
	 'label'   => __( 'Banner Text', 'fog-lite' ),
	  'section' => 'banner_settings_section',
	 'type'    => 'text',
	 ));
	 
	 $wp_customize->selective_refresh->add_partial( 'banner_text_setting', array(
		'selector' => '.banner4_headings', // You can also select a css class
		'render_callback' => 'banner_text_setting',
	) );
	 
	 
	 $wp_customize->add_setting('banner_button_setting', array(
	   'default'        => __( 'Capture Your Moments', 'fog-lite' ),
	   'sanitize_callback' => 'wp_filter_nohtml_kses',
	 ));
	 
	 $wp_customize->add_control('banner_button_setting', array(
	 'label'   => __( 'Banner Button Text', 'fog-lite' ),
	  'section' => 'banner_settings_section',
	 'type'    => 'text',
	 ));
	 
	  $wp_customize->add_setting('banner_button_link', array(
	  'sanitize_callback' => 'wp_filter_nohtml_kses',
	  ));
	 $wp_customize->add_control('banner_button_link', array(
	 'label'   => __( 'Banner Button Link', 'fog-lite' ),
	  'section' => 'banner_settings_section',
	 'type'    => 'url',
	 ));
	 
	 $wp_customize->selective_refresh->add_partial( 'banner_button_link', array(
		'selector' => '.banner4_buttons', // You can also select a css class
		'render_callback' => 'banner_button_link',
	) );
	 
	 
	 /* End Banner Section */
	 
	/* Start Partners Section */
	$wp_customize->add_section('partners_settings_section', array(
	  'title'          => __( 'Partner', 'fog-lite' ),
	   'panel'		   => 'fog_lite_home_page_setting'
	 ));
	 
	 $wp_customize->add_setting('fog_lite_partner_section_enable', array(
    'default'    => '',
	'sanitize_callback' => 'fog_lite_sanitize_checkbox',
	));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'fog_lite_partner_section_enable',
			array(
				'label'     => __( 'Show Parters Section', 'fog-lite' ),
				'section'   => 'partners_settings_section',
				'settings'  => 'fog_lite_partner_section_enable',
				'type'      => 'checkbox',
			)
		)
	);
	$partners_icons = array('one','two','three','four','five','six');
	foreach( $partners_icons as $keys=>$partners_icon){
	    $h=$keys+1;
		$wp_customize->add_setting( 'fog_lite_partner_'.$partners_icon.'_image', array(
	    'sanitize_callback' => 'esc_url_raw',
		));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,'fog_lite_partner_'.$partners_icon.'_image',array(
		   'label'      	=>sprintf( __( 'Upload Partner Image(%s)', 'fog-lite' ), $h ),
		   'description'	=>__( 'upload a image for partner section', 'fog-lite' ),
		   'section'    	=> 'partners_settings_section',
		)));
		$wp_customize->selective_refresh->add_partial('fog_lite_partner_'.$partners_icon.'_image', array(
		'selector' => '.client4_partner_'.$partners_icon.'_set', // You can also select a css class
		'render_callback' => 'fog_lite_partner_'.$partners_icon.'_image',
		) ); 
		
	}
	
	 /* End Partners Section */
	 
	/* Start About Us Section */
	$wp_customize->add_section('aboutus_settings_section', array(
	  'title'          => __( 'About', 'fog-lite' ),
	   'panel'		   => 'fog_lite_home_page_setting'
	 ));
	 
	  $wp_customize->add_setting('fog_lite_aboutus_section_enable', array(
		'default'    => '',
		'sanitize_callback' => 'fog_lite_sanitize_checkbox',
	));
	
	
	
	
	
	

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'fog_lite_aboutus_section_enable',
			array(
				'label'     => __( 'Show About Us Section', 'fog-lite' ),
				'section'   => 'aboutus_settings_section',
				'settings'  => 'fog_lite_aboutus_section_enable',
				'type'      => 'checkbox',
			)
		)
	);
	
	
	function theme_slug_sanitize_checkbox( $input ){
              
            //returns true if checkbox is checked
            return ( isset( $input ) ? true : false );
    }
	$wp_customize->add_setting( 'multiple_select_setting_aboutus', array(
		'default' => array(), // Either empty or fill it with your default values
		'sanitize_callback' => 'fog_lite_multival_select',
	) );
 
	$wp_customize->add_control(
		new Foglite_Customize_Control_Multiple_Select(
			$wp_customize,
			'multiple_select_setting_aboutus',
			array(
				'settings' => 'multiple_select_setting_aboutus',
				'label'    => __( 'Select Multiple Post For About', 'fog-lite' ),
				'description'	=> __( 'Add Post from admin & select', 'fog-lite' ),
				'section'  => 'aboutus_settings_section', // Enter the name of 	your own section
				'type'     => 'multiple-select', // The $type in our class
				'choices'  => fog_lite_get_post_choice() // Your choices
			)
		)
	);
	
	$wp_customize->add_setting( 'fog_lite_aboutus_background_image', array(
	    'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,'fog_lite_aboutus_background_image',array(
       'label'      	=>__( 'Upload Image', 'fog-lite' ),
       'description'	=>__( 'upload a image for about us left section', 'fog-lite' ),
       'section'    	=> 'aboutus_settings_section',
    )));
	$wp_customize->selective_refresh->add_partial( 'fog_lite_aboutus_background_image', array(
		'selector' => '.about4_banner', // You can also select a css class
		'render_callback' => 'fog_lite_aboutus_background_image',
	) );
	
	$wp_customize->add_setting('fog_lite_aboutus_title', array(
	 'default'        => __( 'ABOUT US', 'fog-lite' ),
	 'sanitize_callback' => 'wp_filter_nohtml_kses'
	 ));
	$wp_customize->add_control('fog_lite_aboutus_title', array(
	 'label'   => __( 'Section Title', 'fog-lite' ),
	  'section' => 'aboutus_settings_section',
	 'type'    => 'text',
	));
	
	$wp_customize->selective_refresh->add_partial( 'fog_lite_aboutus_title', array(
		'selector' => '.about4_title', // You can also select a css class
		'render_callback' => 'fog_lite_aboutus_title',
	) );
	
	$wp_customize->add_setting('fog_lite_aboutus_heading', array(
		'default'=> '',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	 ));
	$wp_customize->add_control('fog_lite_aboutus_heading', array(
	 'label'   => __( 'Section Heading', 'fog-lite' ),
	  'section' => 'aboutus_settings_section',
	 'type'    => 'text',
	));
	
	$wp_customize->selective_refresh->add_partial( 'fog_lite_aboutus_heading', array(
		'selector' => '.about4_headings', // You can also select a css class
		'render_callback' => 'fog_lite_aboutus_heading',
	) );

	
	/* End About Us Section */
	
	
	/* Start Portfolio Section */
	
	
	$wp_customize->add_section('portfolios_settings_section', array(
	  'title'          => __( 'Protfolio', 'fog-lite' ),
	   'panel'		   => 'fog_lite_home_page_setting'
	 ));
	 
	 $wp_customize->add_setting('fog_lite_portfolio_section_enable', array(
		'default'    => '',
		'sanitize_callback' => 'fog_lite_sanitize_checkbox',
	));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'fog_lite_portfolio_section_enable',
			array(
				'label'     => __( 'Show Portfolio Section', 'fog-lite' ),
				'section'   => 'portfolios_settings_section',
				'settings'  => 'fog_lite_portfolio_section_enable',
				'type'      => 'checkbox',
			)
		)
	);
	
	
	$wp_customize->add_setting('fog_lite_portfolio_title', array(
	 'default'        => __( 'Portfolio', 'fog-lite' ),
	 'sanitize_callback' => 'wp_filter_nohtml_kses'
	 ));
	$wp_customize->add_control('fog_lite_portfolio_title', array(
	 'label'   => __( 'Section Title', 'fog-lite' ),
	  'section' => 'portfolios_settings_section',
	 'type'    => 'text',
	));
	
	$wp_customize->selective_refresh->add_partial( 'fog_lite_portfolio_title', array(
		'selector' => '.portfolio4_title', // You can also select a css class
		'render_callback' => 'fog_lite_portfolio_title',
	) );
	
	
	$wp_customize->add_setting('fog_lite_portfolio_heading', array(
	 'default'        => __( 'The Works We Have Already Completed', 'fog-lite' ),
	 'sanitize_callback' => 'wp_filter_nohtml_kses',
	 ));
	$wp_customize->add_control('fog_lite_portfolio_heading', array(
	 'label'   => __( 'Section Heading', 'fog-lite' ),
	  'section' => 'portfolios_settings_section',
	 'type'    => 'text',
	));
	$wp_customize->selective_refresh->add_partial( 'fog_lite_portfolio_heading', array(
		'selector' => '.portfolio4_heading', // You can also select a css class
		'render_callback' => 'fog_lite_portfolio_heading',
	) );

	$portfolio_images =6;
	$portfolio_images=get_theme_mod('fog_lite_portfolio_nosection',6);
	for($k=1;$k<=$portfolio_images;$k++)
	{
	    $portfolio_image=$h=$k;
		
		$wp_customize->add_setting( 'fog_lite_portfolio_'.$portfolio_image.'_image', array(
	    'sanitize_callback' => 'esc_url_raw',
		));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,'fog_lite_portfolio_'.$portfolio_image.'_image',array(
		   'label'      	=>sprintf( __( 'Upload Portfolio Image(%s)', 'fog-lite' ), $h ),
		   'description'	=>__( 'upload a image for Portfolio section', 'fog-lite' ),
		   'section'    	=> 'portfolios_settings_section',
		)));
		$wp_customize->selective_refresh->add_partial( 'fog_lite_portfolio_'.$portfolio_image.'_image', array(
		'selector' => '.portfolio4_slider_'.$portfolio_image, // You can also select a css class
		'render_callback' => 'fog_lite_portfolio_'.$portfolio_image.'_image',
		) );
	}
	
	/* End Portfolio Section */
	
	
	
	/* Start Testimonial Section */
	
	$wp_customize->add_section('testimonial_settings_section', array(
	  'title'          => __( 'Testimonial', 'fog-lite' ),
	   'panel'		   => 'fog_lite_home_page_setting'
	 ));
	 
	 $wp_customize->add_setting('fog_lite_testimonial_section_enable', array(
		'default'    => '',
		'sanitize_callback' => 'fog_lite_sanitize_checkbox',
	));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'fog_lite_testimonial_section_enable',
			array(
				'label'     => __( 'Show Testimonial Section', 'fog-lite' ),
				'description'	=>__( 'Add Atleast Two client testimonial for active Testimonial Section.', 'fog-lite' ),
				'section'   => 'testimonial_settings_section',
				'settings'  => 'fog_lite_testimonial_section_enable',
				'type'      => 'checkbox',
			)
		)
	);
	
	
	$wp_customize->add_setting('fog_lite_testimonial_heading', array(
	 'default' => __( 'What Clients Say About Us', 'fog-lite' ),
	 'sanitize_callback' => 'wp_filter_nohtml_kses',
	 ));
	$wp_customize->add_control('fog_lite_testimonial_heading', array(
	 'label'   => __( 'Section Heading', 'fog-lite' ),
	  'section' => 'testimonial_settings_section',
	 'type'    => 'text',
	));
	
	$wp_customize->selective_refresh->add_partial( 'fog_lite_testimonial_heading', array(
		'selector' => '.testimonial4_heading', // You can also select a css class
		'render_callback' => 'fog_lite_testimonial_heading',
	) );
	
	
	
	$wp_customize->add_setting( 'multiple_select_setting_testimonial', array(
		'default' => array(), // Either empty or fill it with your default values
		'sanitize_callback' => 'fog_lite_multival_select',
	) );
 
	$wp_customize->add_control(
		new Foglite_Customize_testimonial_Multiple_Select(
			$wp_customize,
			'multiple_select_setting_testimonial',
			array(
				'settings' => 'multiple_select_setting_testimonial',
				'label'    => __( 'Select Multiple Post For Testimonial', 'fog-lite' ),
				'description'	=> __( 'Add Post from admin & select', 'fog-lite' ),
				'section'  => 'testimonial_settings_section', // Enter the name of 	your own section
				'type'     => 'multiple-select', // The $type in our class
				'choices'  => fog_lite_get_post_choice() // Your choices
			)
		)
	);
	
	
	/* End Testimonial Section */
	
	
	
	/* Start Feature Section */ 
	
	$wp_customize->add_section('features_settings_section', array(
	  'title'          => __( 'Services', 'fog-lite' ),
	   'panel'		   => 'fog_lite_home_page_setting'
	 ));
	 
	 $wp_customize->add_setting('fog_lite_features_section_enable', array(
		'default'    => '',
		'sanitize_callback' => 'fog_lite_sanitize_checkbox',
	));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'fog_lite_features_section_enable',
			array(
				'label'     => __( 'Show Services Section', 'fog-lite' ),
				'section'   => 'features_settings_section',
				'settings'  => 'fog_lite_features_section_enable',
				'type'      => 'checkbox',
			)
		)
	);
	
	$wp_customize->add_setting('fog_lite_features_heading', array(
	 'default'=>__( 'Our Featured Services', 'fog-lite' ),
	 'sanitize_callback' => 'wp_filter_nohtml_kses',
	 ));
	$wp_customize->add_control('fog_lite_features_heading', array(
	 'label'   => __( 'Section Heading', 'fog-lite' ),
	  'section' => 'features_settings_section',
	 'type'    => 'text',
	));
	
	$wp_customize->selective_refresh->add_partial( 'fog_lite_features_heading', array(
		'selector' => '.features4_heading', // You can also select a css class
		'render_callback' => 'fog_lite_features_heading',
	) );
	
	
	$wp_customize->add_setting( 'multiple_select_setting_service', array(
		'description'	=>__( 'Add Post from admin & select', 'fog-lite' ),
		'default' => array(), // Either empty or fill it with your default values
		'sanitize_callback' => 'fog_lite_multival_select',
	) );
 
	$wp_customize->add_control(
		new Foglite_Customize_Control_Multiple_Select(
			$wp_customize,
			'multiple_select_setting_service',
			array(
				'settings' => 'multiple_select_setting_service',
				'label'    => __( 'Select Multiple Post For Service', 'fog-lite' ),
				'description'	=> __( 'Add Post from admin & select', 'fog-lite' ),
				'section'  => 'features_settings_section', // Enter the name of 	your own section
				'type'     => 'multiple-select', // The $type in our class
				'choices'  => fog_lite_get_post_choice() // Your choices
			)
		)
	);
	/* End Feature Services */	
	//adding section in WordPress customizer   
	
	$wp_customize->add_section('socail_media_settings_section', array(
	  'title'          => __( 'General Info (Contact)', 'fog-lite' ),
	  'priority'		=> 32,
	)); 
	$social_icons = array('facebook','twitter','googlePlus','dribbble','youtube','linkedin');
	foreach( $social_icons as $social_icon){
	    
	    $wp_customize->add_setting( 'fog_lite_'.$social_icon.'_url', array(
            'sanitize_callback' => 'esc_url_raw',
			'default'=>''
        ));
	    $wp_customize->add_control( 'fog_lite_'.$social_icon.'_url', array(
            'section'       => 'socail_media_settings_section',
            'label'         => sprintf( __( 'Social Link : %s', 'fog-lite' ), ucwords($social_icon) ),
            'type'          => 'url'
        ));
	  $wp_customize->selective_refresh->add_partial( 'fog_lite_'.$social_icon.'_url', array(
		'selector' => '.banner4_socials_'.$social_icon, // You can also select a css class
		'render_callback' =>'fog_lite_'.$social_icon.'_url',
		) );
	}		
}
function fog_lite_multival_select( $values ) {

	$multi_values = !is_array( $values ) ? explode( ',', $values ) : $values;

	return !empty( $multi_values ) ? array_map( 'sanitize_text_field', $multi_values ) : array();
}
add_action( 'customize_register', 'fog_lite_customize_register' );
function fog_lite_get_post_choice()
{
	
	$array_res=array();
	$myposts = get_posts();
	foreach($myposts as $list)
	{
		$ids=$list->ID;
		$array_res[$ids]=$list->post_title;
	}
	return $array_res;
}	
/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function fog_lite_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function fog_lite_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function fog_lite_customize_preview_js() {
	wp_enqueue_script( 'fog_lite_photo-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'fog_lite_customize_preview_js' );


/**
 * Function to sanitize inputs
 */
function fog_lite_wp_filter_nohtml_kses1( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}

/**
 * Function to sanitize checkboxes
 */
function fog_lite_sanitize_checkbox( $input ) {
	return ( isset( $input ) && true == $input ? true : false );
}
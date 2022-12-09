<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'ywt_attach_theme_options' );
function ywt_attach_theme_options() {
    $basic_options_container = Container::make( 'theme_options', __( 'Theme Options' ) )   
        ->set_icon( 'dashicons-screenoptions' ) 
        ->add_fields( array(
            Field::make( 'html', 'ywt_information_text' )
            ->set_html( '<h2 class="theme-name">Yeasfi Wp Theme Option</h2><p>Developer: MD Yeasir Arafat</p>' ), 

            Field::make( 'header_scripts', 'ywt_header_script', __( 'Header Script' ) ),
            Field::make( 'footer_scripts', 'ywt_footer_script', __( 'Footer Script' ) ),             
        ) );

    // Add second options page under 'Basic Options'
    Container::make( 'theme_options', 'Basic Information' )   
    ->set_page_parent( $basic_options_container ) // reference to a top level container
    ->add_fields( array(
        Field::make( 'html', 'ywt_information_text' )
        ->set_html( '<h2 class="theme-name">Yeasfi Wp Theme Option</h2><p>Developer: MD Yeasir Arafat</p>' ), 
        Field::make( 'image', 'ywt_logo', __( 'Logo' ) ),
        Field::make( 'image', 'ywt_fevicon', __( 'Favicon' ) ),
        Field::make( 'textarea', 'ywt_tagline', __( 'Tagline' ) ),
        Field::make( 'separator', 'ywt_separator', __( 'Contact Information' ) ),
        Field::make( 'complex', 'ywt_contact', __( 'Contact' ) )
        ->add_fields( array(
        Field::make( 'text', 'ywt_email', __( 'Email' ) ),
        Field::make( 'text', 'ywt_phone', __( 'Phone' ) ),  
        ) ),      
        Field::make( 'complex', 'ywt_address', __( 'Address' ) )
        ->add_fields( array(
        Field::make( 'textarea', 'ywt_street_address', __( 'Street Address' ) ),
        Field::make( 'text', 'ywt_city', __( 'City' ) ),
        Field::make( 'text', 'ywt_state', __( 'State' ) ),
        Field::make( 'text', 'ywt_zip', __( 'ZIP Code' ) ),
        ) )

    ) );
// Page Layout  Setup
  $pagesetup = Container::make( 'theme_options', __( 'Page Layout' ) )      
    ->set_page_parent( $basic_options_container ) // reference to a top level container
    ->add_fields( array(
        Field::make( 'html', 'ywt_information_text' )
        ->set_html( '<h2 class="theme-name">Yeasfi Wp Theme Option</h2><p>Developer: MD Yeasir Arafat</p>' ),   
        Field::make( 'separator', 'ywt_separator2', __( 'Defolt Page Layout Option' ) ),
        Field::make( 'checkbox', 'ywt_show_content', 'Cleck Hear to Show Layout Option' ),
        Field::make( 'sidebar', 'ywt_custom_sidebar', __( 'Select a Sidebar' ) )
        ->set_conditional_logic( array(
			array('field' => 'ywt_show_content','value' => true,)
            ) ),
        Field::make( 'text', 'ywt_content', 'Content' )
            ->set_conditional_logic( array(
			array('field' => 'ywt_show_content','value' => true,)
            ) ),
        Field::make( 'text', 'ywt_tes', 'Content' )
            ->set_conditional_logic( array(
			array('field' => 'ywt_show_content','value' => true,)
            ) ),    
        Field::make( 'separator', 'ywt_separator3', __( 'Post Page Layout Option' ) ),
                
    ) );
// Social link
    Container::make( 'theme_options', __( 'Social Links' ) )      
        ->set_page_parent( $basic_options_container ) // reference to a top level container
        ->add_fields( array(
            Field::make( 'html', 'ywt_information_text' )
            ->set_html( '<h2 class="theme-name">Yeasfi Wp Theme Option</h2><p>Developer: MD Yeasir Arafat</p>' ),   
            Field::make( 'complex', 'ywt_social_link', __( 'Social_link' ) )
        ->add_fields( array(
        Field::make( 'icon', 'ywt_social_icon', __( 'Icon' ) ),       
        Field::make( 'text', 'ywt_social_url', __( 'Link' ) ),           
        ) ), 
                     
    ) );

// Add third options page under "Appearance"
    Container::make( 'theme_options', __( 'Customize Background' ) )
        ->set_page_parent( $basic_options_container ) // reference to a top level container
        ->add_fields( array(
            Field::make( 'html', 'ywt_information_text' )
            ->set_html( '<h2 class="theme-name">Yeasfi Wp Theme Option</h2><p>Developer: MD Yeasir Arafat</p>' ),                
            Field::make( 'color', 'ywt_background_color', __( 'Background Color' ) ),
            Field::make( 'image', 'ywt_background_image', __( 'Background Image' ) ),
        ) );
   

    
    }

add_action( 'after_setup_theme', 'ywt_load' );
function ywt_load() {
    require_once( 'vendor/autoload.php' );
    \Carbon_Fields\Carbon_Fields::boot();
}
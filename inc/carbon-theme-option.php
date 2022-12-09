<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
    $basic_options_container = Container::make( 'theme_options', __( 'Theme Options' ) )   
        ->set_icon( 'dashicons-carrot' ) 
        ->add_fields( array(
            Field::make( 'html', 'crb_information_text' )
            ->set_html( '<h2 class="theme-name">Yeasfi Wp Theme Option</h2><p>Developer: MD Yeasir Arafat</p>' ), 

            Field::make( 'header_scripts', 'crb_header_script', __( 'Header Script' ) ),
            Field::make( 'footer_scripts', 'crb_footer_script', __( 'Footer Script' ) ),             
        ) );

    // Add second options page under 'Basic Options'
    Container::make( 'theme_options', 'Basic Information' )   
    ->add_fields( array(
        Field::make( 'html', 'crb_information_text' )
        ->set_html( '<h2 class="theme-name">Yeasfi Wp Theme Option</h2><p>Developer: MD Yeasir Arafat</p>' ),  
        
    ) );
        Container::make( 'theme_options', __( 'Social Links' ) )      
        ->set_page_parent( $basic_options_container ) // reference to a top level container
        ->add_fields( array(
            Field::make( 'html', 'crb_information_text' )
            ->set_html( '<h2 class="theme-name">Yeasfi Wp Theme Option</h2><p>Developer: MD Yeasir Arafat</p>' ),                
            Field::make( 'text', 'crb_facebook_link', __( 'Facebook Link' ) ),
            Field::make( 'text', 'crb_twitter_link', __( 'Twitter Link' ) ),
        ) );

        // Add third options page under "Appearance"
        Container::make( 'theme_options', __( 'Customize Background' ) )
        ->set_page_parent( $basic_options_container ) // reference to a top level container
        ->add_fields( array(
            Field::make( 'html', 'crb_information_text' )
            ->set_html( '<h2 class="theme-name">Yeasfi Wp Theme Option</h2><p>Developer: MD Yeasir Arafat</p>' ),                
            Field::make( 'color', 'crb_background_color', __( 'Background Color' ) ),
            Field::make( 'image', 'crb_background_image', __( 'Background Image' ) ),
        ) );
   

    
    }

add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
    require_once( 'vendor/autoload.php' );
    \Carbon_Fields\Carbon_Fields::boot();
}
<?php
/* 
* @Author: Damien Corona
* @Date:   2014-05-03 11:22:33
* @Last Modified by:   Damien Corona
* @Last Modified time: 2014-05-03 18:43:07
*/
class MySettingsPage
{
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    /**
     * Add options page
     */
    public function add_plugin_page()
    {
        // This page will be under "Settings"
        add_menu_page(
            'Settings Admin', 
            'Desks Settings',
            'administrator', 
            'desks-settings-admin', 
            array( $this, 'create_admin_page' )
        );
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        // Set class property
        $this->options = get_option( 'desks_option_name' );
        ?>
        <div class="wrap">
            <?php screen_icon(); ?>
            <h2>Desks Settings</h2>           
            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields( 'desks_option_group' );   
                do_settings_sections( 'desks-settings-admin' );
                submit_button(); 
            ?>
            </form>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {        
        register_setting(
            'desks_option_group', // Option group
            'desks_option_name', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'user_registration_section', // ID
            'My Custom Settings', // Title
            array( $this, 'print_section_info' ), // Callback
            'desks-settings-admin' // Page
        );  

        add_settings_field(
            'subject_email', // ID
            'Subject Email', // Title 
            array( $this, 'subject_email_callback' ), // Callback
            'desks-settings-admin', // Page
            'user_registration_section' // Section           
        );      

        add_settings_field(
            'text_email', 
            'Text email', 
            array( $this, 'text_email_callback' ), 
            'desks-settings-admin', 
            'user_registration_section'
        );      
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input )
    {
        $new_input = array();
        if( isset( $input['subject_email'] ) )
            $new_input['subject_email'] = sanitize_text_field( $input['subject_email'] );

        if( isset( $input['text_email'] ) )
            $new_input['text_email'] =  $input['text_email'];

        return $new_input;
    }

    /** 
     * Print the Section text
     */
    public function print_section_info()
    {
        print 'Enter your settings below:';
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function subject_email_callback()
    {
        printf(
            '<input type="text" id="subject_email" name="desks_option_name[subject_email]" value="%s" />',
            isset( $this->options['subject_email'] ) ? esc_attr( $this->options['subject_email']) : ''
        );
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function text_email_callback()
    {
        wp_editor( isset( $this->options['text_email'] ) ? esc_attr( $this->options['text_email']) : '', 'text_email', array('textarea_name' => 'desks_option_name[text_email]'));
    }
}

if( is_admin() )
    $my_settings_page = new MySettingsPage();

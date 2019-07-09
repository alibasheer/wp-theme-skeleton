<?phpclass Theme_Setting_Option_Page {    private $options;    /**     * Start up     */    public function __construct() {        add_action( 'admin_menu', array( $this, 'add_theme_setting_page' ) );        add_action( 'admin_init', array( $this, 'theme_setting_init' ) );    }    /**     * Add options page     */    public function add_theme_setting_page() {        // This page will be under "Settings"        add_options_page(            'Theme Settings',            'Theme Settings',            'manage_options',            'theme-setting-page',            array( $this, 'create_theme_settings_page' )        );    }    /**     * Options page callback     */    public function create_theme_settings_page() {        // Set class property        $this->options = get_option( 'theme_setting_option' );        include(locate_template('lib/partials/theme_settings_html.php'));    }    /**     * Register and add settings     */    public function theme_setting_init() {        register_setting(            'ts_option_group', // Option group            'theme_setting_option' // Option name        );        add_settings_section(            'sm_accounts_section',            'Social Media accounts',            array(), // Callback            'theme-setting-page'        );        add_settings_field(            'sm_facebook',            'Facebook',            array( $this, 'print_input_field' ),            'theme-setting-page',            'sm_accounts_section',            array('field_id' => 'sm_facebook')        );        add_settings_field(            'sm_instagram',            'Instagram',            array( $this, 'print_input_field' ),            'theme-setting-page',            'sm_accounts_section',            array('field_id' => 'sm_instagram')        );        add_settings_field(            'sm_twitter',            'Twitter',            array( $this, 'print_input_field' ),            'theme-setting-page',            'sm_accounts_section',            array('field_id' => 'sm_twitter')        );        add_settings_section(            'special_posts_section',            'Special Posts Section',            array(), // Callback            'theme-setting-page'        );        add_settings_field(            'special_posts_active',            'Activate Special Posts',            array( $this, 'print_checkbox_field' ),            'theme-setting-page',            'special_posts_section',            array( 'field_id' => 'special_posts_active' )        );        add_settings_field(            'special_title',            'Special Posts Title',            array( $this, 'print_input_field' ),            'theme-setting-page',            'special_posts_section',            array('field_id' => 'special_title')        );        add_settings_section(            'header_image_section',            'Header Image Section',            array(), // Callback            'theme-setting-page'        );        add_settings_field(            'header_image',            'Header Image',            array( $this, 'print_image_uploader' ),            'theme-setting-page',            'header_image_section',            array('field_id' => 'header_image')        );        add_settings_section(            'call_toaction_section',            'Call to Action Section',            array(), // Callback            'theme-setting-page'        );        add_settings_field(            'call_toaction_active',            'Activate Call to Action',            array( $this, 'print_checkbox_field' ),            'theme-setting-page',            'call_toaction_section',            array( 'field_id' => 'call_toaction_active' )        );        add_settings_field(            'cta_category_id',            'CTA Category ID',            array( $this, 'print_input_field' ),            'theme-setting-page',            'call_toaction_section',            array('field_id' => 'cta_category_id')        );        add_settings_field(            'cta_text',            'CTA Text',            array( $this, 'print_input_field' ),            'theme-setting-page',            'call_toaction_section',            array('field_id' => 'cta_text')        );        add_settings_field(            'cta_background_image',            'CTA Background Image',            array( $this, 'print_image_uploader' ),            'theme-setting-page',            'call_toaction_section',            array('field_id' => 'cta_background_image')        );        add_settings_section(            'footer_setting_section',            'Footer Setting Section',            array(), // Callback            'theme-setting-page'        );        add_settings_field(            'copyright_text',            'Copy Right Text',            array( $this, 'print_input_field' ),            'theme-setting-page',            'footer_setting_section',            array('field_id' => 'copyright_text')        );        add_settings_section(            'homepage_blocks_section',            'HomePage Blocks Section',            array(), // Callback            'theme-setting-page'        );        add_settings_field(            'block1_category',            'Block 1 Category Slug',            array( $this, 'print_input_field' ),            'theme-setting-page',            'homepage_blocks_section',            array('field_id' => 'block1_category')        );        add_settings_field(            'block2_category',            'Block 2 Category Slug',            array( $this, 'print_input_field' ),            'theme-setting-page',            'homepage_blocks_section',            array('field_id' => 'block2_category')        );        add_settings_field(            'block3_category',            'Block 3 Category Slug',            array( $this, 'print_input_field' ),            'theme-setting-page',            'homepage_blocks_section',            array('field_id' => 'block3_category')        );        add_settings_field(            'block4_category',            'Block 4 Category Slug',            array( $this, 'print_input_field' ),            'theme-setting-page',            'homepage_blocks_section',            array('field_id' => 'block4_category')        );        add_settings_section(            'scripts_section',            'Scripts Section',            array(), // Callback            'theme-setting-page'        );        add_settings_field(            'header_script',            'Header Script',            array( $this, 'print_textarea_field' ),            'theme-setting-page',            'scripts_section',            array('field_id' => 'header_script')        );        add_settings_field(            'body_script',            'Body Script',            array( $this, 'print_textarea_field' ),            'theme-setting-page',            'scripts_section',            array('field_id' => 'body_script')        );        add_settings_field(            'footer_script',            'Footer Script',            array( $this, 'print_textarea_field' ),            'theme-setting-page',            'scripts_section',            array('field_id' => 'footer_script')        );        add_settings_section(            'skinning_options_section',            'Skinning options',            array(), // Callback            'theme-setting-page'        );        add_settings_field(            'skinning_active',            'Activate Skinning',            array( $this, 'print_checkbox_field' ),            'theme-setting-page',            'skinning_options_section',            array( 'field_id' => 'skinning_active' )        );    }    /**     * Get the settings option array and print one of its values     */    public function print_input_field($args)    {        $id = $args['field_id'];        printf(            '<input style="min-width:400px" type="text" id="' . $id . '" name="theme_setting_option[' . $id . ']" value="%s" />',            isset( $this->options[$id] ) ? esc_attr( $this->options[$id]) : ''        );    }    public function print_checkbox_field($args)    {        $id = $args['field_id'];        printf(            '<div><input type="checkbox" id="'.$id.'" name="theme_setting_option['.$id.']" value="ActivateMode" %s /></div>',            isset( $this->options[$id] ) ? 'checked' : ''        );    }    public function print_image_uploader($args){        wp_enqueue_media();        $id = $args['field_id'];        echo '<div>';        printf(            '<input type="text" class="regular-text" id="'.$id.'" name="theme_setting_option['.$id.']" value="%s" />',            isset( $this->options[$id] ) ? esc_attr( $this->options[$id]) : ''        );        echo '<input type="button" name="upload-btn" id="upload-btn" class="button-secondary upload-btn" value="Upload Image">';        echo '</div>';    }    public function print_textarea_field($args)    {        $id = $args['field_id'];        printf(            '<textarea rows="8" cols="100" id="' . $id . '" name="theme_setting_option[' . $id . ']" />%s</textarea>',            isset( $this->options[$id] ) ? esc_attr( $this->options[$id]) : ''        );    }}if( is_admin() )    new Theme_Setting_Option_Page;
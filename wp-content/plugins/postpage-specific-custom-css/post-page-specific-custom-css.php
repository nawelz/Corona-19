<?php
/**
 * Plugin Name: Post/Page specific custom CSS
 * Plugin URI: https://wordpress.org/plugins/postpage-specific-custom-css/
 * Description: Post/Page specific custom CSS will allow you to add cascade stylesheet to specific posts/pages. It will give you special area in the post/page edit field to attach your CSS. It will also let you decide if this CSS has to be added in multi-page/post view (like archive posts) or only in a single view.
 * Version: 0.2.0
 * Author: Łukasz Nowicki
 * Author URI: https://lukasznowicki.info/
 * Requires at least: 5.0
 * Requires PHP: 7.0
 * Tested up to: 5.3
 * Text Domain: phylaxppsccss
 * Domain Path: /languages
 */

namespace Phylax\WPPlugin\PPCustomCSS;

if ( ! defined( 'ABSPATH' ) ) {
    die;
} # famous cheatin', huh?

class Plugin {

    public $menu_slug = 'post-page-custom-css';
    public $menu_parent_slug = 'options-general.php';
    public $option_group = 'ppcs_settings_group';
    public $option_name = 'ppcs_settings_name';

    public function __construct() {
        add_action( 'init', [
            $this,
            'init',
        ] );
        add_filter( 'the_content', [
            $this,
            'the_content',
        ] );
        if ( is_admin() ) {
            add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), [
                $this,
                'page_settings_link_filter',
            ] );
            add_action( 'add_meta_boxes', [
                $this,
                'add_meta_boxes',
            ] );
            add_action( 'save_post', [
                $this,
                'save_post',
            ] );
            add_action( 'admin_menu', [
                $this,
                'add_options_page',
            ] );
            add_action( 'admin_init', [
                $this,
                'register_settings',
            ] );
            add_action( 'admin_enqueue_scripts', [
                $this,
                'admin_enqueue_scripts',
            ] );
        }
    }

    public function options_admin_enqueue_scripts() {
        wp_enqueue_code_editor( [ 'type' => 'text/css' ] );
    }

    public function admin_enqueue_scripts( $hook ) {
        $screen = get_current_screen();
        if ( false === is_a( $screen, 'WP_Screen' ) ) {
            return;
        }
        if ( 'post' !== $screen->base ) {
            return;
        }
        $field = '';
        if ( ( $screen->id === 'post' ) && ( $screen->post_type === 'post' ) ) {
            $field = 'enable_highlighting_in_posts';
        }
        if ( ( $screen->id === 'page' ) && ( $screen->post_type === 'page' ) ) {
            $field = 'enable_highlighting_in_pages';
        }
        if ( '' === $field ) {
            return;
        }
        $settings = (array) get_option( $this->option_name );
        $value    = (int) ( $settings[ $field ] ?? 0 );
        if ( 1 === $value ) {
            wp_enqueue_code_editor( [
                'type'       => 'text/css',
                'codemirror' => [
                    'autoRefresh' => true,
                ],
            ] );
        }
    }

    public function register_settings() {
        register_setting( $this->option_group, $this->option_name );
        add_settings_section( 'plugin-behavior', __( 'Options', 'phylaxppsccss' ), [
            $this,
            'section_plugin_behavior',
        ], $this->menu_slug );
        add_settings_section( 'default-values', __( 'Default values', 'phylaxppsccss' ), [
            $this,
            'section_default_values',
        ], $this->menu_slug );
        add_settings_field( 'default_post_css', __( 'Default stylesheet for new posts', 'phylaxppsccss' ), [
            $this,
            'default_post_css',
        ], $this->menu_slug, 'default-values' );
        add_settings_field( 'default_page_css', __( 'Default stylesheet for new pages', 'phylaxppsccss' ), [
            $this,
            'default_page_css',
        ], $this->menu_slug, 'default-values' );
        add_settings_field( 'enable_highlighting_in', __( 'Code highlight', 'phylaxppsccss' ), [
            $this,
            'enable_highlighting_in',
        ], $this->menu_slug, 'plugin-behavior' );
        add_settings_field( 'bigger_textarea', __( 'Bigger input field', 'phylaxppsccss' ), [
            $this,
            'bigger_textarea',
        ], $this->menu_slug, 'plugin-behavior' );
    }

    public function bigger_textarea() {
        $settings = (array) get_option( $this->option_name );
        $field    = 'bigger_textarea';
        $value    = (int) ( $settings[ $field ] ?? 0 );
        ?>
        <fieldset>
            <legend class="screen-reader-text">
                <span><?php echo __( 'Make input boxes bigger', 'phylaxppsccss' ); ?></span>
            </legend>
            <input type="hidden" name="<?php echo $this->option_name; ?>[<?php echo $field; ?>]" value="0">
            <label for="item_<?php echo $field; ?>">
                <input id="item_<?php echo $field; ?>" type="checkbox" name="<?php echo $this->option_name; ?>[<?php echo $field; ?>]" value="1"<?php echo( ( $value === 1 ) ? ' checked="checked"' : '' ); ?>> <?php echo __( 'Make input boxes on Posts and Pages bigger', 'phylaxppsccss' ); ?>
            </label>
        </fieldset>
        <?php
    }

    public function enable_highlighting_in() {
        $settings = (array) get_option( $this->option_name );
        $field    = 'enable_highlighting_in_settings';
        $value    = (int) ( $settings[ $field ] ?? 0 );
        ?>
        <fieldset>
            <legend class="screen-reader-text">
                <span><?php echo __( 'Enable code highlighting', 'phylaxppsccss' ); ?></span>
            </legend>
            <input type="hidden" name="<?php echo $this->option_name; ?>[<?php echo $field; ?>]" value="0">
            <label for="item_<?php echo $field; ?>">
                <input id="item_<?php echo $field; ?>" type="checkbox" name="<?php echo $this->option_name; ?>[<?php echo $field; ?>]" value="1"<?php echo( ( $value === 1 ) ? ' checked="checked"' : '' ); ?>> <?php echo __( 'Enable code highlighting for fields on settings page', 'phylaxppsccss' ); ?>
            </label>
            <br>
            <?php
            $field = 'enable_highlighting_in_posts';
            $value = (int) ( $settings[ $field ] ?? 0 );
            ?>
            <input type="hidden" name="<?php echo $this->option_name; ?>[<?php echo $field; ?>]" value="0">
            <label for="item_<?php echo $field; ?>">
                <input id="item_<?php echo $field; ?>" type="checkbox" name="<?php echo $this->option_name; ?>[<?php echo $field; ?>]" value="1"<?php echo( ( $value === 1 ) ? ' checked="checked"' : '' ); ?>> <?php echo __( 'Enable code highlighting for Posts fields', 'phylaxppsccss' ); ?>
            </label>
            <br>
            <?php
            $field = 'enable_highlighting_in_pages';
            $value = (int) ( $settings[ $field ] ?? 0 );
            ?>
            <input type="hidden" name="<?php echo $this->option_name; ?>[<?php echo $field; ?>]" value="0">
            <label for="item_<?php echo $field; ?>">
                <input id="item_<?php echo $field; ?>" type="checkbox" name="<?php echo $this->option_name; ?>[<?php echo $field; ?>]" value="1"<?php echo( ( $value === 1 ) ? ' checked="checked"' : '' ); ?>> <?php echo __( 'Enable code highlighting for Pages fields', 'phylaxppsccss' ); ?>
            </label>
        </fieldset>
        <p class="description"><?php echo __( '<strong>Warning</strong> Please consider that on weaker computers, enabling CSS highlighting may slow you down.', 'phylaxppsccss' ); ?></p>
        <?php
    }

    public function default_post_css() {
        $settings = (array) get_option( $this->option_name );
        $field    = 'default_post_css';
        $value    = wp_unslash( $settings[ $field ] ?? '' );
        ?>
        <fieldset>
            <legend class="screen-reader-text">
                <span><?php echo __( 'Default stylesheet for new posts', 'phylaxppsccss' ); ?></span>
            </legend>
            <p>
                <textarea id="defaultPostCSS" name="<?php echo $this->option_name; ?>[<?php echo $field; ?>]" class="large-text code" rows="10" cols="50"><?php echo $value; ?></textarea>
            </p>
        </fieldset>
        <?php
    }

    public function default_page_css() {
        $settings = (array) get_option( $this->option_name );
        $field    = 'default_page_css';
        $value    = wp_unslash( $settings[ $field ] ?? '' );
        ?>
        <fieldset>
            <legend class="screen-reader-text">
                <span><?php echo __( 'Default stylesheet for new pages', 'phylaxppsccss' ); ?></span>
            </legend>
            <p>
                <textarea id="defaultPageCSS" name="<?php echo $this->option_name; ?>[<?php echo $field; ?>]" class="large-text code" rows="10" cols="50"><?php echo $value; ?></textarea>
            </p>
        </fieldset>
        <?php
    }

    public function section_default_values() {
        ?>
        <p>
            <?php echo __( 'You can set the pre-filled content for your newly created posts or pages.', 'phylaxppsccss' ); ?>
        </p>
        <?php
    }

    public function section_plugin_behavior() {
    }

    public function page_settings_link_filter( $links ) {
        if ( ! is_array( $links ) ) {
            $links = [];
        }
        $links[] = '<a href="' . $this->build_settings_link() . '">' . __( 'Settings', 'phylaxppsccss' ) . '</a>';

        return $links;
    }

    private function build_settings_link() {
        return admin_url( $this->menu_parent_slug . '?page=' . $this->menu_slug );
    }

    public function add_options_page() {
        $sub_menu_suffix = add_submenu_page( $this->menu_parent_slug, __( 'Post/Page specific custom CSS', 'phylaxppsccss' ), __( 'Post/Page CSS', 'phylaxppsccss' ), 'manage_options', $this->menu_slug, [
            $this,
            'options_page_view',
        ] );
        $settings        = (array) get_option( $this->option_name );
        $field           = 'enable_highlighting_in_settings';
        $value           = (int) ( $settings[ $field ] ?? 0 );
        if ( 1 === $value ) {
            add_action( 'load-' . $sub_menu_suffix, [
                $this,
                'options_admin_enqueue_scripts',
            ] );
        }
    }

    public function options_page_view() {

        ?>
        <div class="wrap">
            <h1><?php echo __( 'Post/Page Custom CSS', 'phylaxppsccss' ); ?></h1>
            <form action="options.php" method="POST">
                <?php settings_fields( $this->option_group ); ?>
                <div>
                    <?php do_settings_sections( $this->menu_slug ); ?>
                </div>
                <?php submit_button(); ?>
            </form>
        </div>
        <?php
        $settings = (array) get_option( $this->option_name );
        $field    = 'enable_highlighting_in_settings';
        $value    = (int) ( $settings[ $field ] ?? 0 );
        if ( 1 === $value ) :
            ?>
            <script>
                jQuery(function ($) {
                    var defaultPageCSS = $('#defaultPageCSS');
                    var defaultPostCSS = $('#defaultPostCSS');
                    var editorSettings;
                    var editor;
                    if (defaultPageCSS.length === 1) {
                        editorSettings = wp.codeEditor.defaultSettings ? _.clone(wp.codeEditor.defaultSettings) : {};
                        editorSettings.codemirror = _.extend({}, editorSettings.codemirror, {
                            indentUnit: 2, tabSize: 2, mode: 'css',
                        });
                        editor = wp.codeEditor.initialize(defaultPageCSS, editorSettings);
                    }
                    if (defaultPostCSS.length === 1) {
                        editorSettings = wp.codeEditor.defaultSettings ? _.clone(wp.codeEditor.defaultSettings) : {};
                        editorSettings.codemirror = _.extend({}, editorSettings.codemirror, {
                            indentUnit: 2, tabSize: 2, mode: 'css',
                        });
                        editor = wp.codeEditor.initialize(defaultPostCSS, editorSettings);
                    }
                });
            </script>
        <?php
        endif;
    }

    public function the_content( $content ) {
        if ( isset( $GLOBALS['post'] ) ) {
            $post_id                    = $GLOBALS['post']->ID;
            $phylax_ppsccss_single_only = get_post_meta( $post_id, '_phylax_ppsccss_single_only', true );
            $phylax_ppsccss_css         = get_post_meta( $post_id, '_phylax_ppsccss_css', true );
            if ( '' != $phylax_ppsccss_css ) {
                # mamy css!
                if ( is_single() || is_page() ) {
                    $content = $this->join( $content, $phylax_ppsccss_css );
                }
                elseif ( '0' == $phylax_ppsccss_single_only ) {
                    $content = $this->join( $content, $phylax_ppsccss_css );
                }
            }
        }

        return $content;
    }

    public function join( $content, $css ) {
        return '<!-- ' . __( 'Added by Post/Page specific custom CSS plugin, thank you for using!', 'phylaxppsccss' ) . ' -->' . PHP_EOL . '<style type="text/css">' . $css . '</style>' . PHP_EOL . $content;
    }

    public function add_meta_boxes() {
        if ( current_user_can( 'manage_options' ) ) {
            add_meta_box( 'phylax_ppsccss', __( 'Custom CSS', 'phylaxppsccss' ), [
                $this,
                'render_phylax_ppsccss',
            ], [
                'post',
                'page',
            ], 'advanced', 'high' );
        }
    }

    public function save_post( $post_id ) {
        $test_id = (int) $post_id;
        if ( $test_id < 1 ) {
            return $post_id;
        }
        if ( ! isset( $_POST['phylax_ppsccss_nonce'] ) ) {
            return $post_id;
        }
        $nonce = $_POST['phylax_ppsccss_nonce'];
        if ( ! wp_verify_nonce( $nonce, 'phylax_ppsccss' ) ) {
            return $post_id;
        }
        if ( ( 'page' != $_POST['post_type'] ) && ( 'post' != $_POST['post_type'] ) ) {
            return $post_id;
        }
        if ( ( 'post' == $_POST['post_type'] ) && ! current_user_can( 'edit_post', $post_id ) ) {
            return $post_id;
        }
        if ( ( 'page' == $_POST['post_type'] ) && ! current_user_can( 'edit_page', $post_id ) ) {
            return $post_id;
        }
        if ( defined( 'DOING_AUTOSAVE' ) && \DOING_AUTOSAVE ) {
            return $post_id;
        }
        $phylax_ppsccss_css         = trim( strip_tags( $_POST['phylax_ppsccss_css'] ) );
        $phylax_ppsccss_single_only = (int) $_POST['phylax_ppsccss_single_only'];
        if ( ( $phylax_ppsccss_single_only < 0 ) || ( $phylax_ppsccss_single_only > 1 ) ) {
            $phylax_ppsccss_single_only = 0;
        }
        update_post_meta( $post_id, '_phylax_ppsccss_css', $phylax_ppsccss_css );
        update_post_meta( $post_id, '_phylax_ppsccss_single_only', $phylax_ppsccss_single_only );
    }

    public function render_phylax_ppsccss( $post ) {
        wp_nonce_field( 'phylax_ppsccss', 'phylax_ppsccss_nonce' );
        $screen   = '';
        $settings = (array) get_option( $this->option_name );
        switch ( $post->post_type ) {
            case 'post':
                $field  = 'enable_highlighting_in_posts';
                $dField = 'default_page_css';
                $screen = __( 'Post custom CSS', 'phylaxppsccss' );
                break;
            case 'page':
                $field  = 'enable_highlighting_in_pages';
                $dField = 'default_post_css';
                $screen = __( 'Page custom CSS', 'phylaxppsccss' );
                break;
        }
        if ( '' == $screen ) {
            return;
        }
        $enable_highlighting = (int) ( $settings[ $field ] ?? 0 );
        $post_meta           = get_post_meta( $post->ID );
        $brand_new           = false;
        if ( false === isset( $post_meta['_phylax_ppsccss_css'] ) ) {
            $brand_new = true;
        }
        $phylax_ppsccss_css = get_post_meta( $post->ID, '_phylax_ppsccss_css', true );
        if ( ( '' === $phylax_ppsccss_css ) && ( true === $brand_new ) ) {
            $phylax_ppsccss_css .= (string) ( $settings[ $dField ] );
        }
        $phylax_ppsccss_single_only = get_post_meta( $post->ID, '_phylax_ppsccss_single_only', true );
        if ( '' == $phylax_ppsccss_single_only ) {
            $phylax_ppsccss_single_only = 0;
        }
        if ( $phylax_ppsccss_single_only ) {
            $checked = ' checked="checked"';
        }
        else {
            $checked = '';
        }
        $biggerBox = (int) ( $settings['bigger_textarea'] ?? 0 );
        ?>
        <p class="post-attributes-label-wrapper">
            <label for="phylax_ppsccss_css"><?php echo $screen; ?></label>
        </p>
        <div id="phylax_ppsccss_css_outer">
            <textarea name="phylax_ppsccss_css" id="phylax_ppsccss_css" class="widefat textarea" rows="<?php echo( ( 0 === $biggerBox ) ? '10' : '25' ) ?>"><?php echo esc_textarea( $phylax_ppsccss_css ); ?></textarea>
        </div>
        <p class="post-attributes-label-wrapper">
            <label for="phylax_ppsccss_single_only"><input type="hidden" name="phylax_ppsccss_single_only" value="0"><input type="checkbox" name="phylax_ppsccss_single_only" value="1" id="phylax_ppsccss_single_only"<?php echo $checked; ?>> <?php echo __( 'Attach this CSS code only on single page view', 'phylaxppsccss' ); ?>
            </label>
        </p>
        <p>
            <?php
            echo __( 'Please add only valid CSS code, it will be placed between &lt;style&gt; tags.', 'phylaxppsccss' ); ?>
        </p>
        <?php
        if ( $enable_highlighting ) :
            ?>
            <script>
                jQuery(function ($) {
                    var phylaxCSSEditorDOM = $('#phylax_ppsccss_css');
                    var phylaxCSSEditorSettings;
                    var phylaxCSSEditorInstance;
                    if (phylaxCSSEditorDOM.length === 1) {
                        phylaxCSSEditorSettings = wp.codeEditor.defaultSettings ? _.clone(wp.codeEditor.defaultSettings) : {};
                        phylaxCSSEditorSettings.codemirror = _.extend({}, phylaxCSSEditorSettings.codemirror, {
                            indentUnit: 2, tabSize: 2, mode: 'css',
                        });
                        phylaxCSSEditorInstance = wp.codeEditor.initialize(phylaxCSSEditorDOM, phylaxCSSEditorSettings);
                        //console.log( 'Next', phylaxCSSEditorDOM.next('.CodeMirror').find('.CodeMirror-code') );
                        $(document).on('keyup', '#phylax_ppsccss_css_outer .CodeMirror-code', function () {
                            console.clear();
                            phylaxCSSEditorDOM.html(phylaxCSSEditorInstance.codemirror.getValue());
                            phylaxCSSEditorDOM.trigger('change');
                        });
                    }
                });
            </script>
            <?php
            if ( 1 === $biggerBox ) :
                ?>
                <style>
                    #phylax_ppsccss_css_outer .CodeMirror {
                        height: 600px;
                    }
                </style>
            <?php
            endif;
        endif;
    }

    public function init() {
        load_plugin_textdomain( 'phylaxppsccss', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
    }

    private function text() {
        __( 'Post/Page specific custom CSS will allow you to add cascade stylesheet to specific posts/pages. It will give you special area in the post/page edit field to attach your CSS. It will also let you decide if this CSS has to be added in multi-page/post view (like archive posts) or only in a single view.', 'phylaxppsccss' );
    }

}

new Plugin();
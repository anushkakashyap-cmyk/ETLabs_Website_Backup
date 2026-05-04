<?php
$purchase_code_status = trim( get_option( 'saasland_purchase_code_status' ) );
if ( $purchase_code_status == 'valid' ) :

    // Disable regenerating images while importing media
    add_filter( 'pt-ocdi/regenerate_thumbnails_in_content_import', '__return_false' );
    add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

    // Change some options for the jQuery modal window
    function saasland_demo_ocdi_confirmation_dialog_options ( $options ) {
        return array_merge( $options, array(
            'width'       => 400,
            'dialogClass' => 'wp-dialog',
            'resizable'   => false,
            'height'      => 'auto',
            'modal'       => true,
        ) );
    }
    add_filter( 'pt-ocdi/confirmation_dialog_options', 'saasland_demo_ocdi_confirmation_dialog_options', 10, 1 );

    function saasland_demo_ocdi_intro_text( $default_text ) {
        $default_text .= '<div class="ocdi_custom-intro-text notice notice-info inline">';
        $default_text .= sprintf (
            '%1$s <a href="%2$s" target="_blank">%3$s</a> %4$s',
            esc_html__( 'Install and activate all ', 'saasland' ),
            get_admin_url(null, 'themes.php?page=tgmpa-install-plugins' ),
            esc_html__( 'required plugins', 'saasland' ),
            esc_html__( 'before you click on the "Import" button.', 'saasland' )
        );
        $default_text .= sprintf (
            ' %1$s <a href="%2$s" target="_blank">%3$s</a> %4$s',
            esc_html__( 'You will find all the pages in ', 'saasland' ),
            get_admin_url(null, 'edit.php?post_type=page' ),
            esc_html__( 'Pages.', 'saasland' ),
            esc_html__( 'Other pages will be imported along with the main Homepage.', 'saasland' )
        );
        $default_text .= '<br>';
        $default_text .= sprintf (
            '%1$s <a href="%2$s" target="_blank">%3$s</a>',
            esc_html__( 'If you fail to import the demo data, follow the alternative way', 'saasland' ),
            'https://goo.gl/mMLj3B',
            esc_html__( 'here.', 'saasland' )
        );
        $default_text .= '</div>';

        return $default_text;
    }
    add_filter( 'pt-ocdi/plugin_intro_text', 'saasland_demo_ocdi_intro_text' );

    // OneClick Demo Importer
    add_filter( 'pt-ocdi/import_files', 'saasland_demo_import_files' );
    function saasland_demo_import_files() {
        return array (

            array(
                'import_file_name'             => esc_html__( 'Saasland Main', 'saasland' ),
                'import_preview_image_url'     => 'https://saasland.droitlab.com/demofile/images/digital_agency3.jpg',
                'import_file_url'              => 'https://saasland.droitlab.com/demofile/saas/contents.xml',
                'import_widget_file_url'       => 'https://saasland.droitlab.com/demofile/saas/widgets.wie',
                'import_notice'                => __( 'All other pages will not imported with this Homepage.', 'saasland' ),
                'preview_url'                  => 'https://saaslandwp.com/demo/saas/digital-agency-3/',
                'categories'                   => array ( esc_html__( 'New', 'saasland' ), esc_html__( 'Agency', 'saasland' ) ),
                'import_redux'           => array (
                    array(
                        'file_url'   => 'https://saasland.droitlab.com/demofile/saas/theme-settings.json',
                        'option_name' => 'saasland_opt',
                    ),
                ),
            ),

            array(
                'import_file_name'             => esc_html__( 'Business', 'saasland' ),
                'import_preview_image_url'     => 'https://saasland.droitlab.com/demofile/images/business.jpg',
                'import_file_url'            => 'https://saasland.droitlab.com/demofile/saas/contents.xml',
                'import_widget_file_url'     => 'https://saasland.droitlab.com/demofile/saas/widgets.wie',
                'import_notice'                => __( 'All other pages will not imported with this Homepage.', 'saasland' ),
                'preview_url'                  => 'https://saaslandwp.com/demo/saas/business/',
                'categories'                   => array ( esc_html__( 'New', 'saasland' )),
                'import_redux'           => array (
                    array(
                        'file_url'   => 'https://saasland.droitlab.com/demofile/saas/theme-settings.json',
                        'option_name' => 'saasland_opt',
                    ),
                ),
            ),

            array(
                'import_file_name'             => esc_html__( 'Architecture', 'saasland' ),
                'import_preview_image_url'     => 'https://saasland.droitlab.com/demofile/images/architecture.jpg',
                'import_file_url'            => 'https://saasland.droitlab.com/demofile/pos/contents.xml',
                'import_widget_file_url'     => 'https://saasland.droitlab.com/demofile/pos/widgets.wie',
                'import_notice'                => __( 'All other pages will not imported with this Homepage.', 'saasland' ),
                'preview_url'                  => 'https://saaslandwp.com/demo/pos/architecture/',
                'categories'                   => array ( esc_html__( 'New', 'saasland' )),
                'import_redux'           => array (
                    array(
                        'file_url'   => 'https://saasland.droitlab.com/demofile/pos/theme-settings.json',
                        'option_name' => 'saasland_opt',
                    ),
                ),
            ),

            array(
                'import_file_name'             => esc_html__( 'Education', 'saasland' ),
                'import_preview_image_url'     => 'https://saasland.droitlab.com/demofile/images/education.jpg',
                'import_file_url'            => 'https://saasland.droitlab.com/demofile/creative/contents.xml',
                'import_widget_file_url'     => 'https://saasland.droitlab.com/demofile/creative/widgets.wie',
                'import_notice'                => __( 'All other pages will not imported with this Homepage.', 'saasland' ),
                'preview_url'                  => 'https://saaslandwp.com/demo/creative/education/',
                'categories'                   => array ( esc_html__( 'New', 'saasland' )),
                'import_redux'           => array (
                    array(
                        'file_url'   => 'https://saasland.droitlab.com/demofile/creative/theme-settings.json',
                        'option_name' => 'saasland_opt',
                    ),
                ),
            ),

            array(
                'import_file_name'             => esc_html__( 'Design Agency', 'saasland' ),
                'import_preview_image_url'     => 'https://saasland.droitlab.com/demofile/images/design_agency.jpg',
                'import_file_url'            => 'https://saasland.droitlab.com/demofile/digital-agency/contents.xml',
                'import_widget_file_url'     => 'https://saasland.droitlab.com/demofile/digital-agency/widgets.wie',
                'import_notice'                => __( 'All other pages will not imported with this Homepage.', 'saasland' ),
                'preview_url'                  => 'https://saaslandwp.com/demo/digital-agency/design-agency-2/',
                'categories'                   => array ( esc_html__( 'New', 'saasland' ), esc_html__( 'Agency', 'saasland' ) ),
                'import_redux'           => array (
                    array(
                        'file_url'   => 'https://saasland.droitlab.com/demofile/digital-agency/theme-settings.json',
                        'option_name' => 'saasland_opt',
                    ),
                ),
            ),

            array(
                'import_file_name'             => esc_html__( 'Cyber Security', 'saasland' ),
                'import_preview_image_url'     => 'https://saasland.droitlab.com/demofile/images/cyber.jpg',
                'import_file_url'            => 'https://saasland.droitlab.com/demofile/digital-agency/contents.xml',
                'import_widget_file_url'     => 'https://saasland.droitlab.com/demofile/digital-agency/widgets.wie',
                'import_notice'                => __( 'All other pages will not imported with this Homepage.', 'saasland' ),
                'preview_url'                  => 'https://saaslandwp.com/demo/digital-agency/cyber-security/',
                'categories'                   => array ( esc_html__( 'New', 'saasland' ), esc_html__( 'Agency', 'saasland' ) ),
                'import_redux'           => array (
                    array(
                        'file_url'   => 'https://saasland.droitlab.com/demofile/digital-agency/theme-settings.json',
                        'option_name' => 'saasland_opt',
                    ),
                ),
            ),

            array(
                'import_file_name'             => esc_html__( 'Design Studio', 'saasland' ),
                'import_file_url'            => 'https://saasland.droitlab.com/demofile/main/contents.xml',
                'import_widget_file_url'     => 'https://saasland.droitlab.com/demofile/main/widgets.wie',
                'import_preview_image_url'     => 'https://saasland.droitlab.com/demofile/images/design_studio.jpg',
                'preview_url'                  => 'https://saaslandwp.com/demo/saasland/',
                'categories'                   => array ( esc_html__( 'Agency', 'saasland' ) ),
                'import_redux'           => array(
                    array(
                        'file_url'   => 'https://saasland.droitlab.com/demofile/main/theme-settings.json',
                        'option_name' => 'saasland_opt',
                    ),
                ),
            ),

            array(
                'import_file_name'             => esc_html__( 'Data Analytics', 'saasland' ),
                'import_preview_image_url'     => 'https://saasland.droitlab.com/demofile/images/data_analytics.jpg',
                'import_file_url'            => 'https://saasland.droitlab.com/demofile/digital-agency/contents.xml',
                'import_widget_file_url'     => 'https://saasland.droitlab.com/demofile/digital-agency/widgets.wie',
                'import_notice'                => __( 'All other pages will not imported with this Homepage.', 'saasland' ),
                'preview_url'                  => 'https://saaslandwp.com/demo/digital-agency/data-analytics/',
                'categories'                   => array ( esc_html__( 'New', 'saasland' ), esc_html__( 'Agency', 'saasland' ) ),
                'import_redux'           => array (
                    array(
                        'file_url'   => 'https://saasland.droitlab.com/demofile/digital-agency/theme-settings.json',
                        'option_name' => 'saasland_opt',
                    ),
                ),
            ),

            array(
                'import_file_name'             => esc_html__( 'App Landing', 'saasland' ),
                'import_preview_image_url'     => 'https://saasland.droitlab.com/demofile/images/app_landing.jpg',
                'import_file_url'            => 'https://saasland.droitlab.com/demofile/app/contents.xml',
                'import_widget_file_url'     => 'https://saasland.droitlab.com/demofile/app/widgets.wie',
                'import_notice'                => __( 'All other pages will not imported with this Homepage.', 'saasland' ),
                'preview_url'                  => 'https://saaslandwp.com/demo/app/',
                'categories'                   => array ( esc_html__( 'New', 'saasland' ), esc_html__( 'App', 'saasland' ) ),
                'import_redux'           => array (
                    array(
                        'file_url'   => 'https://saasland.droitlab.com/demofile/app/theme-settings.json',
                        'option_name' => 'saasland_opt',
                    ),
                ),
            ),

            array(
                'import_file_name'             => esc_html__( 'Freelancer', 'saasland' ),
                'import_preview_image_url'     => 'https://saasland.droitlab.com/demofile/images/freelancer.jpg',
                'import_file_url'            => 'https://saasland.droitlab.com/demofile/personal-portfolio/contents.xml',
                'import_widget_file_url'     => 'https://saasland.droitlab.com/demofile/personal-portfolio/widgets.wie',
                'import_notice'                => __( 'All other pages will not imported with this Homepage.', 'saasland' ),
                'preview_url'                  => 'https://saaslandwp.com/demo/personal-portfolio/freelancer/',
                'categories'                   => array ( esc_html__( 'New', 'saasland' ), esc_html__( 'Portfolio', 'saasland' ) ),
                'import_redux'           => array (
                    array(
                        'file_url'   => 'https://saasland.droitlab.com/demofile/personal-portfolio/theme-settings.json',
                        'option_name' => 'saasland_opt',
                    ),
                ),
            ),


            array(
                'import_file_name'             => esc_html__( 'Digital Agency 1', 'saasland' ),
                'import_preview_image_url'     => 'https://saasland.droitlab.com/demofile/images/digital_agency.jpg',
                'import_file_url'            => 'https://saasland.droitlab.com/demofile/main/contents.xml',
                'import_widget_file_url'     => 'https://saasland.droitlab.com/demofile/main/widgets.wie',
                'import_notice'                => __( 'All other pages will be imported along with the main Homepage.', 'saasland' ),
                'preview_url'                  => 'https://saaslandwp.com/demo/digital-agency2',
                'categories'                     => array( esc_html__( 'Agency', 'saasland' ) ),
                'import_redux'           => array(
                    array(
                        'file_url'   => 'https://saasland.droitlab.com/demofile/main/theme-settings.json',
                        'option_name' => 'saasland_opt',
                    ),
                ),
            ),

            array(
                'import_file_name'             => esc_html__( 'Construction', 'saasland' ),
                'import_preview_image_url'     => 'https://saasland.droitlab.com/demofile/images/construction.jpg',
                'import_file_url'            => 'https://saasland.droitlab.com/demofile/pos/contents.xml',
                'import_widget_file_url'     => 'https://saasland.droitlab.com/demofile/pos/widgets.wie',
                'import_notice'                => __( 'All other pages will not imported with this Homepage.', 'saasland' ),
                'preview_url'                  => 'https://saaslandwp.com/demo/pos/construction/',
                'categories'                   => array ( esc_html__( 'New', 'saasland' ), esc_html__( 'Construction', 'saasland' ) ),
                'import_redux'           => array (
                    array(
                        'file_url'   => 'https://saasland.droitlab.com/demofile/pos/theme-settings.json',
                        'option_name' => 'saasland_opt',
                    ),
                ),
            ),

            array(
                'import_file_name'             => esc_html__( 'Product Dark', 'saasland' ),
                'import_preview_image_url'     => 'https://saasland.droitlab.com/demofile/images/product_dark.jpg',
                'import_file_url'            => 'https://saasland.droitlab.com/demofile/product-dark/contents.xml',
                'import_widget_file_url'     => 'https://saasland.droitlab.com/demofile/product-dark/widgets.wie',
                'import_notice'                => __( 'All other pages will be imported along with the main Homepage.', 'saasland' ),
                'preview_url'                  => 'https://saaslandwp.com/demo/product-dark/',
                'categories'                   => array ( esc_html__( 'Agency', 'saasland' ) ),
                'import_redux'           => array (
                    array(
                        'file_url'   => 'https://saasland.droitlab.com/demofile/product-dark/theme-settings.json',
                        'option_name' => 'saasland_opt',
                    ),
                ),
            ),

            array(
                'import_file_name'             => esc_html__( 'Point Of Sale (POS)', 'saasland' ),
                'import_preview_image_url'     => 'https://saasland.droitlab.com/demofile/images/pos.jpg',
                'import_file_url'            => 'https://saasland.droitlab.com/demofile/pos/contents.xml',
                'import_widget_file_url'     => 'https://saasland.droitlab.com/demofile/pos/widgets.wie',
                'import_notice'                => __( 'All other pages will be imported along with the main Homepage.', 'saasland' ),
                'preview_url'                  => 'https://saaslandwp.com/demo/pos/',
                'categories'                   => array ( esc_html__( 'Agency', 'saasland' ) ),
                'import_redux'           => array(
                    array(
                        'file_url'   => 'https://saasland.droitlab.com/demofile/pos/theme-settings.json',
                        'option_name' => 'saasland_opt',
                    ),
                ),
            ),

            array(
                'import_file_name'             => esc_html__( 'Digital Agency 2', 'saasland' ),
                'import_preview_image_url'     => 'https://saasland.droitlab.com/demofile/images/digital_agency2.jpg',
                'import_file_url'            => 'https://saasland.droitlab.com/demofile/digital-agency/contents.xml',
                'import_widget_file_url'     => 'https://saasland.droitlab.com/demofile/digital-agency/widgets.wie',
                'import_notice'                => __( 'All other pages will not imported with this Homepage.', 'saasland' ),
                'preview_url'                  => 'https://saaslandwp.com/demo/digital-agency/',
                'categories'                   => array ( esc_html__( 'Agency', 'saasland' ) ),
                'import_redux'           => array (
                    array(
                        'file_url'   => 'https://saasland.droitlab.com/demofile/digital-agency/theme-settings.json',
                        'option_name' => 'saasland_opt',
                    ),
                ),
            ),

            array(
                'import_file_name'             => esc_html__( 'Fashion', 'saasland' ),
                'import_preview_image_url'     => 'https://saasland.droitlab.com/demofile/images/fashion.jpg',
                'import_file_url'            => 'https://saasland.droitlab.com/demofile/fashion/contents.xml',
                'import_widget_file_url'     => 'https://saasland.droitlab.com/demofile/fashion/widgets.wie',
                'import_notice'                => __( 'All other pages will not imported with this Homepage.', 'saasland' ),
                'preview_url'                  => 'https://saaslandwp.com/demo/fashion/',
                'categories'                   => array ( esc_html__( 'eCommerce', 'saasland' ) ),
                'import_redux'           => array (
                    array(
                        'file_url'   => 'https://saasland.droitlab.com/demofile/fashion/theme-settings.json',
                        'option_name' => 'saasland_opt',
                    ),
                ),
            ),

            array(
                'import_file_name'             => esc_html__( 'Gadget', 'saasland' ),
                'import_preview_image_url'     => 'https://saasland.droitlab.com/demofile/images/home_gadget.jpg',
                'import_file_url'            => 'https://saasland.droitlab.com/demofile/gadget/contents.xml',
                'import_widget_file_url'     => 'https://saasland.droitlab.com/demofile/gadget/widgets.wie',
                'import_notice'                => __( 'All other pages will be imported along with the main Homepage.', 'saasland' ),
                'preview_url'                  => 'https://saaslandwp.com/demo/gadget/',
                'categories'                   => array ( esc_html__( 'Agency', 'saasland' ) ),
                'import_redux'           => array (
                    array(
                        'file_url'   => 'https://saasland.droitlab.com/demofile/gadget/theme-settings.json',
                        'option_name' => 'saasland_opt',
                    ),
                ),
            ),

            array(
                'import_file_name'             => esc_html__( 'Personal Portfolio', 'saasland' ),
                'import_preview_image_url'     => 'https://saasland.droitlab.com/demofile/images/home_personal_portfolio.jpg',
                'import_file_url'            => 'https://saasland.droitlab.com/demofile/personal-portfolio/contents.xml',
                'import_widget_file_url'     => 'https://saasland.droitlab.com/demofile/personal-portfolio/widgets.wie',
                'import_notice'                => __( 'All other pages will be imported along with the main Homepage.', 'saasland' ),
                'preview_url'                  => 'https://saaslandwp.com/demo/personal-portfolio/',
                'categories'                   => array ( esc_html__( 'Portfolio', 'saasland' ) ),
                'import_redux'           => array (
                    array(
                        'file_url'   => 'https://saasland.droitlab.com/demofile/personal-portfolio/theme-settings.json',
                        'option_name' => 'saasland_opt',
                    ),
                ),
            ),

            array(
                'import_file_name'             => esc_html__( 'Home Portfolio', 'saasland' ),
                'import_preview_image_url'     => 'https://saasland.droitlab.com/demofile/images/home_portfolio.jpg',
                'import_file_url'            => 'https://saasland.droitlab.com/demofile/portfolio/contents.xml',
                'import_widget_file_url'     => 'https://saasland.droitlab.com/demofile/portfolio/widgets.wie',
                'import_notice'                => __( 'All other pages will be imported along with the main Homepage.', 'saasland' ),
                'preview_url'                  => 'https://saaslandwp.com/demo/portfolio/',
                'categories'                   => array ( esc_html__( 'Portfolio', 'saasland' ) ),
                'import_redux'           => array (
                    array(
                        'file_url'   => 'https://saasland.droitlab.com/demofile/portfolio/theme-settings.json',
                        'option_name' => 'saasland_opt',
                    ),
                ),
            ),

            array(
                'import_file_name'             => esc_html__( 'Home Creative', 'saasland' ),
                'import_preview_image_url'     => 'https://saasland.droitlab.com/demofile/images/home_creative.jpg',
                'import_file_url'            => 'https://saasland.droitlab.com/demofile/creative/contents.xml',
                'import_widget_file_url'     => 'https://saasland.droitlab.com/demofile/creative/widgets.wie',
                'import_notice'                => __( 'All other pages will be imported along with the main Homepage.', 'saasland' ),
                'preview_url'                  => 'https://saaslandwp.com/demo/creative/',
                'categories'                   => array ( esc_html__( 'Portfolio', 'saasland' ) ),
                'import_redux'           => array (
                    array(
                        'file_url'   => 'https://saasland.droitlab.com/demofile/creative/theme-settings.json',
                        'option_name' => 'saasland_opt',
                    ),
                ),
            ),

            array(
                'import_file_name'             => esc_html__( 'Event & Conference', 'saasland' ),
                'import_file_url'            => 'https://saasland.droitlab.com/demofile/main/contents.xml',
                'import_widget_file_url'     => 'https://saasland.droitlab.com/demofile/main/widgets.wie',
                'import_preview_image_url'     => 'https://saasland.droitlab.com/demofile/images/event.jpg',
                'import_notice'                => __( 'All other pages will be imported along with the main Homepage.', 'saasland' ),
                'preview_url'                  => 'https://saaslandwp.com/demo/event',
                'categories'                   => array ( 'Marketing' ),
                'import_redux'           => array(
                    array(
                        'file_url'   => 'https://saasland.droitlab.com/demofile/main/theme-settings.json',
                        'option_name' => 'saasland_opt',
                    ),
                ),
            ),

            array(
                'import_file_name'             => esc_html__( 'Saas Landing', 'saasland' ),
                'import_file_url'            => 'https://saasland.droitlab.com/demofile/main/contents.xml',
                'import_widget_file_url'     => 'https://saasland.droitlab.com/demofile/main/widgets.wie',
                'import_preview_image_url'     => 'https://saasland.droitlab.com/demofile/images/demo_landing.jpg',
                'import_notice'                => __( 'All other pages will be imported along with the main Homepage.', 'saasland' ),
                'preview_url'                  => 'https://preview.droitthemes.net/wp/saasland/home-demo-landing/',
                'categories'                   => array ( esc_html__( 'New', 'saasland' ), esc_html__( 'Saas', 'saasland' ) ),
                'import_redux'           => array(
                    array(
                        'file_url'   => 'https://saasland.droitlab.com/demofile/main/theme-settings.json',
                        'option_name' => 'saasland_opt',
                    ),
                ),
            ),

            array(
                'import_file_name'             => esc_html__( 'Security Software', 'saasland' ),
                'import_file_url'            => 'https://saasland.droitlab.com/demofile/main/contents.xml',
                'import_widget_file_url'     => 'https://saasland.droitlab.com/demofile/main/widgets.wie',
                'import_preview_image_url'     => 'https://saasland.droitlab.com/demofile/images/security_software.jpg',
                'import_notice'                => __( 'All other pages will be imported along with the main Homepage.', 'saasland' ),
                'preview_url'                  => 'https://saaslandwp.com/demo/security',
                'categories'                   => array ( esc_html__( 'Saas', 'saasland' ) ),
                'import_redux'           => array(
                    array(
                        'file_url'   => 'https://saasland.droitlab.com/demofile/main/theme-settings.json',
                        'option_name' => 'saasland_opt',
                    ),
                ),
            ),

            array(
                'import_file_name'             => esc_html__( 'Tracking Software', 'saasland' ),
                'import_file_url'            => 'https://saasland.droitlab.com/demofile/main/contents.xml',
                'import_widget_file_url'     => 'https://saasland.droitlab.com/demofile/main/widgets.wie',
                'import_preview_image_url'     => 'https://saasland.droitlab.com/demofile/images/time_tracking_software.jpg',
                'import_notice'                => __( 'All other pages will be imported along with the main Homepage.', 'saasland' ),
                'preview_url'                  => 'https://saaslandwp.com/demo/time-tracking',
                'categories'                   => array ( esc_html__( 'Saas', 'saasland' ) ),
                'import_redux'           => array(
                    array(
                        'file_url'   => 'https://saasland.droitlab.com/demofile/main/theme-settings.json',
                        'option_name' => 'saasland_opt',
                    ),
                ),
            ),

            array(
                'import_file_name'             => esc_html__( 'Email Client', 'saasland' ),
                'import_file_url'            => 'https://saasland.droitlab.com/demofile/main/contents.xml',
                'import_widget_file_url'     => 'https://saasland.droitlab.com/demofile/main/widgets.wie',
                'import_preview_image_url'     => 'https://saasland.droitlab.com/demofile/images/email_client.jpg',
                'import_notice'                => __( 'All other pages will be imported along with the main Homepage.', 'saasland' ),
                'preview_url'                  => 'https://saaslandwp.com/demo/mail',
                'categories'                   => array ( esc_html__( 'Marketing', 'saasland' ) ),
                'import_redux'           => array(
                    array(
                        'file_url'   => 'https://saasland.droitlab.com/demofile/main/theme-settings.json',
                        'option_name' => 'saasland_opt',
                    ),
                ),
            ),

            array(
                'import_file_name'             => esc_html__( 'Cloud Based Saas', 'saasland' ),
                'import_file_url'            => 'https://saasland.droitlab.com/demofile/main/contents.xml',
                'import_widget_file_url'     => 'https://saasland.droitlab.com/demofile/main/widgets.wie',
                'import_preview_image_url'     => 'https://saasland.droitlab.com/demofile/images/cloud_based_saas.jpg',
                'import_notice'                => __( 'All other pages will be imported along with the main Homepage.', 'saasland' ),
                'preview_url'                  => 'https://saaslandwp.com/demo/cloud',
                'categories'                   => array ( esc_html__( 'Saas', 'saasland' ) ),
                'import_redux'           => array(
                    array(
                        'file_url'   => 'https://saasland.droitlab.com/demofile/main/theme-settings.json',
                        'option_name' => 'saasland_opt',
                    ),
                ),
            ),

            array(
                'import_file_name'             => esc_html__( 'Prototype & Wireframing', 'saasland' ),
                'import_file_url'            => 'https://saasland.droitlab.com/demofile/main/contents.xml',
                'import_widget_file_url'     => 'https://saasland.droitlab.com/demofile/main/widgets.wie',
                'import_preview_image_url'     => 'https://saasland.droitlab.com/demofile/images/prototype_wireframing.jpg',
                'import_notice'                => __( 'All other pages will be imported along with the main Homepage.', 'saasland' ),
                'preview_url'                  => 'https://saaslandwp.com/demo/prototyping',
                'categories'                   => array ( esc_html__( 'Saas', 'saasland' ) ),
                'import_redux'           => array(
                    array(
                        'file_url'   => 'https://saasland.droitlab.com/demofile/main/theme-settings.json',
                        'option_name' => 'saasland_opt',
                    ),
                ),
            ),

            array(
                'import_file_name'             => esc_html__( 'Digital Marketing', 'saasland' ),
                'import_preview_image_url'     => 'https://saasland.droitlab.com/demofile/images/digital-marketing.jpg',
                'import_file_url'            => 'https://saasland.droitlab.com/demofile/main/contents.xml',
                'import_widget_file_url'     => 'https://saasland.droitlab.com/demofile/main/widgets.wie',
                'import_notice'                => __( 'All other pages will be imported along with the main Homepage.', 'saasland' ),
                'preview_url'                  => 'https://saaslandwp.com/demo/marketing',
                'categories'                   => array ( esc_html__( 'Marketing', 'saasland' ) ),
                'import_redux'           => array(
                    array(
                        'file_url'   => 'https://saasland.droitlab.com/demofile/main/theme-settings.json',
                        'option_name' => 'saasland_opt',
                    ),
                ),
            ),

            array(
                'import_file_name'             => esc_html__( 'Software (Dark)', 'saasland' ),
                'import_preview_image_url'     => 'https://saasland.droitlab.com/demofile/images/software_dark.jpg',
                'import_file_url'            => 'https://saasland.droitlab.com/demofile/main/contents.xml',
                'import_widget_file_url'     => 'https://saasland.droitlab.com/demofile/main/widgets.wie',
                'import_notice'                => __( 'All other pages will be imported along with the main Homepage.', 'saasland' ),
                'preview_url'                  => 'https://saaslandwp.com/demo/software-dark',
                'categories'                   => array ( esc_html__( 'Saas', 'saasland' ) ),
                'import_redux'           => array(
                    array(
                        'file_url'   => 'https://saasland.droitlab.com/demofile/main/theme-settings.json',
                        'option_name' => 'saasland_opt',
                    ),
                ),
            ),

            array(
                'import_file_name'             => esc_html__( 'App Showcase', 'saasland' ),
                'import_preview_image_url'     => 'https://saasland.droitlab.com/demofile/images/app_showcase.jpg',
                'import_file_url'            => 'https://saasland.droitlab.com/demofile/main/contents.xml',
                'import_widget_file_url'     => 'https://saasland.droitlab.com/demofile/main/widgets.wie',
                'import_notice'                => __( 'All other pages will be imported along with the main Homepage.', 'saasland' ),
                'preview_url'                  => 'https://saaslandwp.com/demo/app-showcase',
                'categories'                   => array ( esc_html__( 'App', 'saasland' ) ),
                'import_redux'           => array(
                    array(
                        'file_url'   => 'https://saasland.droitlab.com/demofile/main/theme-settings.json',
                        'option_name' => 'saasland_opt',
                    ),
                ),
            ),

            array(
                'import_file_name'             => esc_html__( 'Startup', 'saasland' ),
                'import_preview_image_url'     => 'https://saasland.droitlab.com/demofile/images/startup.jpg',
                'import_file_url'            => 'https://saasland.droitlab.com/demofile/main/contents.xml',
                'import_widget_file_url'     => 'https://saasland.droitlab.com/demofile/main/widgets.wie',
                'import_notice'                => __( 'All other pages will be imported along with the main Homepage.', 'saasland' ),
                'preview_url'                  => 'https://saaslandwp.com/demo/startup',
                'categories'                   => array ( esc_html__( 'Agency', 'saasland' ) ),
                'import_redux'           => array(
                    array(
                        'file_url'   => 'https://saasland.droitlab.com/demofile/main/theme-settings.json',
                        'option_name' => 'saasland_opt',
                    ),
                ),
            ),

            array(
                'import_file_name'             => esc_html__( 'Payment Processing', 'saasland' ),
                'import_preview_image_url'     => 'https://saasland.droitlab.com/demofile/images/payment_processing.jpg',
                'import_file_url'            => 'https://saasland.droitlab.com/demofile/main/contents.xml',
                'import_widget_file_url'     => 'https://saasland.droitlab.com/demofile/main/widgets.wie',
                'import_notice'                => __( 'All other pages will be imported along with the main Homepage.', 'saasland' ),
                'preview_url'                  => 'https://saaslandwp.com/demo/payment-processing',
                'categories'                   => array ( esc_html__( 'Saas', 'saasland' ) ),
                'import_redux'           => array(
                    array(
                        'file_url'   => 'https://saasland.droitlab.com/demofile/main/theme-settings.json',
                        'option_name' => 'saasland_opt',
                    ),
                ),
            ),

            array(
                'import_file_name'             => esc_html__( 'Classic Saas', 'saasland' ),
                'import_preview_image_url'     => 'https://saasland.droitlab.com/demofile/images/classic_saas.jpg',
                'import_file_url'            => 'https://saasland.droitlab.com/demofile/main/contents.xml',
                'import_widget_file_url'     => 'https://saasland.droitlab.com/demofile/main/widgets.wie',
                'import_notice'                => __( 'All other pages will be imported along with the main Homepage.', 'saasland' ),
                'preview_url'                  => 'https://saaslandwp.com/demo/saas-2',
                'categories'                   => array ( esc_html__( 'Saas', 'saasland' ) ),
                'import_redux'           => array(
                    array(
                        'file_url'   => 'https://saasland.droitlab.com/demofile/main/theme-settings.json',
                        'option_name' => 'saasland_opt',
                    ),
                ),
            ),

            array(
                'import_file_name'             => esc_html__( 'Accounts & Billing', 'saasland' ),
                'import_preview_image_url'     => 'https://saasland.droitlab.com/demofile/images/accounts_billing.jpg',
                'import_file_url'            => 'https://saasland.droitlab.com/demofile/main/contents.xml',
                'import_widget_file_url'     => 'https://saasland.droitlab.com/demofile/main/widgets.wie',
                'import_notice'                => __( 'All other pages will be imported along with the main Homepage.', 'saasland' ),
                'preview_url'                  => 'https://saaslandwp.com/demo/accounts-billing',
                'categories'                   => array ( esc_html__( 'Saas', 'saasland' ) ),
                'import_redux'           => array(
                    array(
                        'file_url'   => 'https://saasland.droitlab.com/demofile/main/theme-settings.json',
                        'option_name' => 'saasland_opt',
                    ),
                ),
            ),

            array(
                'import_file_name'             => esc_html__( 'Home Company', 'saasland' ),
                'import_preview_image_url'     => 'https://saasland.droitlab.com/demofile/images/home_company.jpg',
                'import_file_url'            => 'https://saasland.droitlab.com/demofile/main/contents.xml',
                'import_widget_file_url'     => 'https://saasland.droitlab.com/demofile/main/widgets.wie',
                'import_notice'                => __( 'All other pages will be imported along with the main Homepage.', 'saasland' ),
                'preview_url'                  => 'https://saaslandwp.com/demo/company',
                'categories'                   => array ( esc_html__( 'Agency', 'saasland' ) ),
                'import_redux'           => array(
                    array(
                        'file_url'   => 'https://saasland.droitlab.com/demofile/main/theme-settings.json',
                        'option_name' => 'saasland_opt',
                    ),
                ),
            ),

            array(
                'import_file_name'             => esc_html__( 'CRM Software', 'saasland' ),
                'import_preview_image_url'     => 'https://saasland.droitlab.com/demofile/images/crm_software.jpg',
                'import_file_url'            => 'https://saasland.droitlab.com/demofile/main/contents.xml',
                'import_widget_file_url'     => 'https://saasland.droitlab.com/demofile/main/widgets.wie',
                'import_notice'                => __( 'All other pages will be imported along with the main Homepage.', 'saasland' ),
                'preview_url'                  => 'https://saaslandwp.com/demo/crm-software',
                'categories'                   => array ( esc_html__( 'Saas', 'saasland' ) ),
                'import_redux'           => array(
                    array(
                        'file_url'   => 'https://saasland.droitlab.com/demofile/main/theme-settings.json',
                        'option_name' => 'saasland_opt',
                    ),
                ),
            ),

            array(
                'import_file_name'             => esc_html__( 'HR Management', 'saasland' ),
                'import_preview_image_url'     => 'https://saasland.droitlab.com/demofile/images/hr_management.jpg',
                'import_file_url'            => 'https://saasland.droitlab.com/demofile/main/contents.xml',
                'import_widget_file_url'     => 'https://saasland.droitlab.com/demofile/main/widgets.wie',
                'import_notice'                => __( 'All other pages will be imported along with the main Homepage.', 'saasland' ),
                'preview_url'                  => 'https://saaslandwp.com/demo/hr-management',
                'categories'                   => array ( esc_html__( 'Saas', 'saasland' ) ),
                'import_redux'           => array(
                    array(
                        'file_url'   => 'https://saasland.droitlab.com/demofile/main/theme-settings.json',
                        'option_name' => 'saasland_opt',
                    ),
                ),
            ),


            array(
                'import_file_name'             => esc_html__( 'Saas 2 (Slider)', 'saasland' ),
                'import_preview_image_url'     => 'https://saasland.droitlab.com/demofile/images/saas_2_slider.jpg',
                'import_file_url'            => 'https://saasland.droitlab.com/demofile/main/contents.xml',
                'import_widget_file_url'     => 'https://saasland.droitlab.com/demofile/main/widgets.wie',
                'import_notice'                => __( 'All other pages will be imported along with the main Homepage.', 'saasland' ),
                'preview_url'                  => 'https://saaslandwp.com/demo/saas-2-slider',
                'categories'                     => array( esc_html__( 'Slider', 'saasland' ) ),
                'import_redux'           => array(
                    array(
                        'file_url'   => 'https://saasland.droitlab.com/demofile/main/theme-settings.json',
                        'option_name' => 'saasland_opt',
                    ),
                ),
            ),

            array(
                'import_file_name'             => esc_html__( 'Digital Shop', 'saasland' ),
                'import_preview_image_url'     => 'https://saasland.droitlab.com/demofile/images/digital_shop.jpg',
                'import_file_url'            => 'https://saasland.droitlab.com/demofile/main/contents.xml',
                'import_widget_file_url'     => 'https://saasland.droitlab.com/demofile/main/widgets.wie',
                'import_notice'                => __( 'All other pages will be imported along with the main Homepage.', 'saasland' ),
                'preview_url'                  => 'https://saaslandwp.com/demo/home-shop',
                'categories'                     => array( esc_html__( 'eCommerce', 'saasland' ) ),
                'import_redux'           => array(
                    array(
                        'file_url'   => 'https://saasland.droitlab.com/demofile/main/theme-settings.json',
                        'option_name' => 'saasland_opt',
                    ),
                ),
            ),

            array(
                'import_file_name'             => esc_html__( 'Agency Colorful', 'saasland' ),
                'import_preview_image_url'     => 'https://saasland.droitlab.com/demofile/images/agency_colorful.jpg',
                'import_file_url'            => 'https://saasland.droitlab.com/demofile/pos/contents.xml',
                'import_widget_file_url'     => 'https://saasland.droitlab.com/demofile/pos/widgets.wie',
                'import_notice'                => __( 'All other pages will be imported along with the main Homepage.', 'saasland' ),
                'preview_url'                  => 'https://saaslandwp.com/demo/pos/agency-colorful-2/',
                'categories'                   => array ( esc_html__( 'Agency', 'saasland' ), esc_html__( 'Slider', 'saasland' ), esc_html__( 'Full-Screen', 'saasland' ) ),
                'import_redux'           => array(
                    array(
                        'file_url'   => 'https://saasland.droitlab.com/demofile/pos/theme-settings.json',
                        'option_name' => 'saasland_opt',
                    ),
                ),
            ),

            array(
                'import_file_name'             => esc_html__( 'Web Hosting', 'saasland' ),
                'import_preview_image_url'     => 'https://saasland.droitlab.com/demofile/images/home_hosting.jpg',
                'import_file_url'            => 'https://saasland.droitlab.com/demofile/pos/contents.xml',
                'import_widget_file_url'     => 'https://saasland.droitlab.com/demofile/pos/widgets.wie',
                'import_notice'                => __( 'All other pages will be imported along with the main Homepage.', 'saasland' ),
                'preview_url'                  => 'https://saaslandwp.com/demo/pos/hosting-2/',
                'categories'                   => array ( esc_html__( 'Slider', 'saasland' ), esc_html__( 'Hosting', 'saasland' ) ),
                'import_redux'           => array(
                    array(
                        'file_url'   => 'https://saasland.droitlab.com/demofile/pos/theme-settings.json',
                        'option_name' => 'saasland_opt',
                    ),
                ),
            ),

            array(
                'import_file_name'             => esc_html__( 'ERP Solution', 'saasland' ),
                'import_preview_image_url'     => 'https://saasland.droitlab.com/demofile/images/erp.jpg',
                'import_file_url'            => 'https://saasland.droitlab.com/demofile/pos/contents.xml',
                'import_widget_file_url'     => 'https://saasland.droitlab.com/demofile/pos/widgets.wie',
                'import_notice'                => __( 'All other pages will be imported along with the main Homepage.', 'saasland' ),
                'preview_url'                  => 'https://saaslandwp.com/demo/pos/erp-2/',
                'categories'                   => array ( esc_html__( 'Agency', 'saasland' ) ),
                'import_redux'           => array(
                    array(
                        'file_url'   => 'https://saasland.droitlab.com/demofile/pos/theme-settings.json',
                        'option_name' => 'saasland_opt',
                    ),
                ),
            ),



            array(
                'import_file_name'             => esc_html__( 'Split Screen Slider', 'saasland' ),
                'import_preview_image_url'     => 'https://saasland.droitlab.com/demofile/images/split.jpg',
                'import_file_url'            => 'https://saasland.droitlab.com/demofile/personal-portfolio/contents.xml',
                'import_widget_file_url'     => 'https://saasland.droitlab.com/demofile/personal-portfolio/widgets.wie',
                'import_notice'                => __( 'All other pages will be imported along with the main Homepage.', 'saasland' ),
                'preview_url'                  => 'https://saaslandwp.com/demo/personal-portfolio/split/',
                'categories'                   => array ( esc_html__( 'Slider', 'saasland' ), esc_html__( 'Full-Screen', 'saasland' ) ),
                'import_redux'           => array (
                    array(
                        'file_url'   => 'https://saasland.droitlab.com/demofile/personal-portfolio/theme-settings.json',
                        'option_name' => 'saasland_opt',
                    ),
                ),
            ),

            array(
                'import_file_name'             => esc_html__( 'Analytics Software', 'saasland' ),
                'import_preview_image_url'     => 'https://saasland.droitlab.com/demofile/images/analytics_software.jpg',
                'import_file_url'            => 'https://saasland.droitlab.com/demofile/pos/contents.xml',
                'import_widget_file_url'     => 'https://saasland.droitlab.com/demofile/pos/widgets.wie',
                'import_notice'                => __( 'All other pages will be imported along with the main Homepage.', 'saasland' ),
                'preview_url'                  => 'https://saaslandwp.com/demo/pos/analytics-software-3/',
                'categories'                   => array ( esc_html__( 'Saas', 'saasland' ) ),
                'import_redux'           => array (
                    array(
                        'file_url'   => 'https://saasland.droitlab.com/demofile/pos/theme-settings.json',
                        'option_name' => 'saasland_opt',
                    ),
                ),
            ),

	        array(
		        'import_file_name'             => esc_html__( 'Support Desk', 'saasland' ),
		        'import_preview_image_url'     => 'https://saasland.droitlab.com/demofile/images/support_desk.jpg',
		        'import_file_url'            => 'https://saasland.droitlab.com/demofile/pos/contents.xml',
		        'import_widget_file_url'     => 'https://saasland.droitlab.com/demofile/pos/widgets.wie',
		        'import_notice'                => __( 'All other pages will be imported along with the main Homepage.', 'saasland' ),
		        'preview_url'                  => 'https://saaslandwp.com/demo/pos/support-3/',
		        'categories'                   => array ( esc_html__( 'Agency', 'saasland' ) ),
		        'import_redux'           => array (
			        array(
				        'file_url'   => 'https://saasland.droitlab.com/demofile/pos/theme-settings.json',
				        'option_name' => 'saasland_opt',
			        ),
		        ),
	        ),

	        array(
		        'import_file_name'             => esc_html__( 'Support Chat Platform', 'saasland' ),
		        'import_preview_image_url'     => 'https://saasland.droitlab.com/demofile/images/chat.jpg',
		        'import_file_url'            => 'https://saasland.droitlab.com/demofile/main/contents.xml',
		        'import_widget_file_url'     => 'https://saasland.droitlab.com/demofile/main/widgets.wie',
		        'import_notice'                => __( 'All other pages will be imported along with the main Homepage.', 'saasland' ),
		        'preview_url'                  => 'https://saaslandwp.com/demo/chat/',
		        'categories'                   => array ( esc_html__( 'Saas', 'saasland' ) ),
		        'import_redux'           => array(
			        array(
				        'file_url'   => 'https://saasland.droitlab.com/demofile/main/theme-settings.json',
				        'option_name' => 'saasland_opt',
			        ),
		        ),
	        ),

            array(
                'import_file_name'             => esc_html__( 'OnePage', 'saasland' ),
                'import_file_url'            => 'https://saasland.droitlab.com/demofile/onepage/contents.xml',
                'import_widget_file_url'     => 'https://saasland.droitlab.com/demofile/onepage/widgets.wie',
                'import_preview_image_url'     => 'https://saasland.droitlab.com/demofile/images/onepage.jpg',
                'import_notice'                => esc_html__( 'WooCommerce and WooCommerce Wishlist plugins are not required for this demo.', 'saasland' ),
                'preview_url'                  => 'https://saaslandwp.com/demo/onepage/',
                'categories'                   => array ( esc_html__( 'OnePage', 'saasland' ), esc_html__( 'App', 'saasland' ) ),
                'import_redux'           => array(
                    array(
                        'file_url'   => 'https://saasland.droitlab.com/demofile/onepage/theme-settings.json',
                        'option_name' => 'saasland_opt',
                    ),
                ),
            ),

            array(
                'import_file_name'             => esc_html__( 'RTL Demo', 'saasland' ),
                'import_file_url'            => 'https://saasland.droitlab.com/demofile/rtl/contents.xml',
                'import_widget_file_url'     => 'https://saasland.droitlab.com/demofile/main/widgets.wie',
                'import_preview_image_url'     => 'https://saasland.droitlab.com/demofile/rtl/rtl.png',
                'import_notice'                => esc_html__( 'After Import this demo you must change setting for RTL', 'saasland' ),
                'preview_url'                  => 'https://saaslandwp.com/demo/rtl/',
                'categories'                   => array ( esc_html__( 'RTL', 'saasland' ) ),
                'import_redux'           => array(
                    array(
                        'file_url'   => 'https://saasland.droitlab.com/demofile/rtl/theme-settings.json',
                        'option_name' => 'saasland_opt',
                    ),
                ),
            ),

        );
    }


    function saasland_demo_after_import_setup($selected_import) {
        /**
         * Import The Sliders
         */
        if ( class_exists( 'RevSlider' ) ) {
            $slider = new RevSlider();
            if ( 'Web Hosting' == $selected_import['import_file_name'] ) {
                $hosting_slider = 'https://droitthemes.com/wpplugin/demo/saasland/hosting_slider.zip';
                $slider->importSliderFromPost( true, true, $hosting_slider );
            }
        }

        // Assign menus to their locations.
        $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
        $overlay_menu = get_term_by( 'name', 'Overlay Menu', 'nav_menu' );

        set_theme_mod( 'nav_menu_locations', array (
                'main_menu' => $main_menu->term_id,
                'overlay_menu' => $overlay_menu->term_id
            )
        );

        // Disable Elementor's Default Colors and Default Fonts
        update_option( 'elementor_disable_color_schemes', 'yes' );
        update_option( 'elementor_disable_typography_schemes', 'yes' );
        update_option( 'elementor_global_image_lightbox', '' );

        //Disable Default Sidebar Widgets
        update_option( 'widget_recent-posts', 'no' );
        update_option( 'widget_recent-comments', 'no' );
        update_option( 'widget_meta', 'no' );
        update_option( 'posts_per_page', '6' );

        //Delete WP Default Post ID-1 (Hello World)
        wp_delete_post(1);
        flush_rewrite_rules();

        // Assign front page and posts page (blog page).
	    if ( 'Saasland Main' == $selected_import['import_file_name'] ) {
		    $front_page_id = get_page_by_title( 'Home - Saasland Main' );
	    }
	    if ( 'Business' == $selected_import['import_file_name'] ) {
		    $front_page_id = get_page_by_title( 'Home - Business' );
	    }
	    if ( 'Architecture' == $selected_import['import_file_name'] ) {
		    $front_page_id = get_page_by_title( 'Home - Architecture' );
	    }
	    if ( 'Education' == $selected_import['import_file_name'] ) {
		    $front_page_id = get_page_by_title( 'Home - Education' );
	    }
	    if ( 'Design Agency' == $selected_import['import_file_name'] ) {
		    $front_page_id = get_page_by_title( 'Home - Design Agency' );
	    }
	    if ( 'Cyber Security' == $selected_import['import_file_name'] ) {
		    $front_page_id = get_page_by_title( 'Home - Cyber Security' );
	    }
	    if ( 'Design Studio' == $selected_import['import_file_name'] ) {
		    $front_page_id = get_page_by_title( 'Home - Design Studio' );
	    }
	    if ( 'Data Analytics' == $selected_import['import_file_name'] ) {
		    $front_page_id = get_page_by_title( 'Home - Data Analytics' );
	    }
	    if ( 'App Landing' == $selected_import['import_file_name'] ) {
		    $front_page_id = get_page_by_title( 'Home - App Landing' );
	    }
	    if ( 'Freelancer' == $selected_import['import_file_name'] ) {
		    $front_page_id = get_page_by_title( 'Home - Freelancer' );
	    }
	    if ( 'Digital Agency 1' == $selected_import['import_file_name'] ) {
		    $front_page_id = get_page_by_title( 'Home - Digital Agency' );
	    }
	    if ( 'Construction' == $selected_import['import_file_name'] ) {
		    $front_page_id = get_page_by_title( 'Home - Construction' );
	    }
	    if ( 'Product Dark' == $selected_import['import_file_name'] ) {
		    $front_page_id = get_page_by_title( 'Home - Product Dark' );
	    }
	    if ( 'Point Of Sale (POS)' == $selected_import['import_file_name'] ) {
		    $front_page_id = get_page_by_title( 'Home - Pos' );
	    }
	    if ( 'Digital Agency 2' == $selected_import['import_file_name'] ) {
		    $front_page_id = get_page_by_title( 'Home - Digital Agency' );
	    }
	    if ( 'Fashion' == $selected_import['import_file_name'] ) {
		    $front_page_id = get_page_by_title( 'Home - Fashion' );
	    }
	    if ( 'Gadget' == $selected_import['import_file_name'] ) {
		    $front_page_id = get_page_by_title( 'Home Gadget' );
	    }
	    if ( 'Personal Portfolio' == $selected_import['import_file_name'] ) {
		    $front_page_id = get_page_by_title( 'Home - Personal Portfolio' );
	    }
	    if ( 'Home Portfolio' == $selected_import['import_file_name'] ) {
		    $front_page_id = get_page_by_title( 'Home Portfolio' );
	    }
	    if ( 'Home Creative' == $selected_import['import_file_name'] ) {
		    $front_page_id = get_page_by_title( 'Home Creative' );
	    }
	    if ( 'Event & Conference' == $selected_import['import_file_name'] ) {
		    $front_page_id = get_page_by_title( 'Home - Event' );
	    }
	    if ( 'Saas Landing' == $selected_import['import_file_name'] ) {
		    $front_page_id = get_page_by_title( 'Home - Demo Landing' );
	    }
	    if ( 'Security Software' == $selected_import['import_file_name'] ) {
		    $front_page_id = get_page_by_title( 'Home - Security' );
	    }
	    if ( 'Tracking Software' == $selected_import['import_file_name'] ) {
		    $front_page_id = get_page_by_title( 'Home - Tracking' );
	    }
	    if ( 'Email Client' == $selected_import['import_file_name'] ) {
		    $front_page_id = get_page_by_title( 'Home - Mail' );
	    }
	    if ( 'Cloud Based Saas' == $selected_import['import_file_name'] ) {
		    $front_page_id = get_page_by_title( 'Home - Cloud' );
	    }
	    if ( 'Prototype & Wireframing' == $selected_import['import_file_name'] ) {
		    $front_page_id = get_page_by_title( 'Home - Prototyping' );
	    }
	    if ( 'Digital Marketing' == $selected_import['import_file_name'] ) {
		    $front_page_id = get_page_by_title( 'Home - Marketing' );
	    }
	    if ( 'Software (Dark)' == $selected_import['import_file_name'] ) {
		    $front_page_id = get_page_by_title( 'Home - Software Dark' );
	    }
	    if ( 'App Showcase' == $selected_import['import_file_name'] ) {
		    $front_page_id = get_page_by_title( 'Home - App Showcase' );
	    }
	    if ( 'Startup' == $selected_import['import_file_name'] ) {
		    $front_page_id = get_page_by_title( 'Home - Startup' );
	    }
	    if ( 'Payment Processing' == $selected_import['import_file_name'] ) {
		    $front_page_id = get_page_by_title( 'Home - Payment Processing' );
	    }
	    if ( 'Classic Saas' == $selected_import['import_file_name'] ) {
		    $front_page_id = get_page_by_title( 'Home - Saas' );
	    }
	    if ( 'Accounts & Billing' == $selected_import['import_file_name'] ) {
		    $front_page_id = get_page_by_title( 'Home - Accounts & Billing' );
	    }
	    if ( 'Home Company' == $selected_import['import_file_name'] ) {
		    $front_page_id = get_page_by_title( 'Home - Company' );
	    }
	    if ( 'CRM Software' == $selected_import['import_file_name'] ) {
		    $front_page_id = get_page_by_title( 'Home - CRM Software' );
	    }
	    if ( 'HR Management' == $selected_import['import_file_name'] ) {
		    $front_page_id = get_page_by_title( 'Home - HR Management' );
	    }
	    if ( 'Saas 2 (Slider)' == $selected_import['import_file_name'] ) {
		    $front_page_id = get_page_by_title( 'Home - Saas 2 (Slider)' );
	    }
	    if ( 'Digital Shop' == $selected_import['import_file_name'] ) {
		    $front_page_id = get_page_by_title( 'Home - Shop' );
	    }
	    if ( 'Agency Colorful' == $selected_import['import_file_name'] ) {
		    $front_page_id = get_page_by_title( 'Home - Agency Colorful' );
	    }
	    if ( 'Web Hosting' == $selected_import['import_file_name'] ) {
		    $front_page_id = get_page_by_title( 'Home - Hosting' );
	    }
	    if ( 'ERP Solution' == $selected_import['import_file_name'] ) {
		    $front_page_id = get_page_by_title( 'Home - ERP' );
	    }
	    if ( 'Split Screen Slider' == $selected_import['import_file_name'] ) {
		    $front_page_id = get_page_by_title( 'Home - Split' );
	    }
	    if ( 'Analytics Software' == $selected_import['import_file_name'] ) {
		    $front_page_id = get_page_by_title( 'Home - Analytics Software' );
	    }
	    if ( 'Support Desk' == $selected_import['import_file_name'] ) {
		    $front_page_id = get_page_by_title( 'Home - Support Desk' );
	    }
        if ( 'Support Chat Platform' == $selected_import['import_file_name'] ) {
            $front_page_id = get_page_by_title( 'Home - Chat' );
        }
        if ( 'OnePage' == $selected_import['import_file_name'] ) {
            $front_page_id = get_page_by_title( 'Home - One page' );
        }


        $blog_page_id  = get_page_by_title( 'Blog' );

        // Set the home page and blog page
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id->ID );
        update_option( 'page_for_posts', $blog_page_id->ID );
    }
    add_action( 'pt-ocdi/after_import', 'saasland_demo_after_import_setup' );

endif;
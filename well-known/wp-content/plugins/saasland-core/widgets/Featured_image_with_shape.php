<?php
namespace SaaslandCore\Widgets;

use Elementor\Repeater;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Class Featured_image_with_shape
 * @package SaaslandCore\Widgets
 */
class Featured_image_with_shape extends Widget_Base {

    public function get_name() {
        return 'saasland_featured_image';
    }

    public function get_title() {
        return __( 'Image with Shape', 'saasland-core' );
    }

    public function get_icon() {
        return 'eicon-featured-image';
    }

    public function get_categories() {
        return [ 'saasland-elements' ];
    }

    protected function register_controls() {

        //------------------------------ Select Style ------------------------------ //
        $this->start_controls_section(
            'style_section', [
                'label' => __( 'Select Style', 'saasland-core' ),
            ]
        );

        // Style
        $this->add_control(
            'style', [
                'label' => __( 'Style', 'saasland-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'style_01' => esc_html__( '01: (single image)', 'saasland-core' ),
                    'style_02' => esc_html__( '02: (single image)', 'saasland-core' ),
                    'style_03' => esc_html__( '03: (two images)', 'saasland-core' ),
                    'style_04' => esc_html__( '04: (single image)', 'saasland-core' ),
                    'style_05' => esc_html__( '05: (two images)', 'saasland-core' ),
                    'style_06' => esc_html__( '06: (single image)', 'saasland-core' ),
                    'style_07' => esc_html__( '07: (Three images with layer)', 'saasland-core' ),
                ],
                'default' => 'style_01'
            ]
        );

        $this->end_controls_section(); //End Select Style


        // --------------------------------- Featured Images ------------------------------ //
        $this->start_controls_section(
            'contents_sec', [
                'label' => __( 'Image', 'saasland-core' ),
            ]
        );

        $this->add_control(
            'image', [
                'label' => __( 'Featured Image', 'saasland-core' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(), [
                'name' => 'image_box_shadow',
                'label' => __( 'Box Shadow', 'saasland-core' ),
                'selector' => '{{WRAPPER}} .typgraphy_img img',
                'condition' => [
                    'style' => 'style_06'
                ]
            ]
        );

        $this->add_control(
            'image2', [
                'label' => __( 'Image 02', 'saasland-core' ),
                'type' => Controls_Manager::MEDIA,
                'condition' => [
                    'style' => [ 'style_03', 'style_05' ]
                ]
            ]
        );

        $this->add_control(
            'bg_shape', [
                'label' => __( 'Background Shape', 'saasland-core' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => plugins_url( 'images/new_shape.png', __FILE__)
                ],
                'condition' => [
                    'style' => [ 'style_03', 'style_04', 'style_05' ]
                ]
            ]
        );

        $this->end_controls_section(); //End Featured Images


        //------------------------------ Style Shape ----------------------------//
        $this->start_controls_section(
            'shape_section', [
                'label' => __( 'Shape', 'saasland-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style' => ['style_01', 'style_02']
                ]
            ]
        );

        // Shape 01
        $this->add_control(
            'is_shape1', [
                'label' => __( 'Shape 01', 'saasland-core' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'saasland-core' ),
                'label_off' => __( 'No', 'saasland-core' ),
                'return_value' => 'yes',
                'default' => 'yes'
            ]
        );

        $this->add_control(
            'shape1_color', [
                'label'     => esc_html__( 'Shape 01 Color', 'saasland-core' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .seo_features_img .round_circle' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .typgraphy_img .circle_shape_1' => 'background: {{VALUE}};',
                ),
                'condition' => [
                    'is_shape1' => ['yes'],
                ],
            ]
        );

        // Shape 2
        $this->add_control(
            'is_shape2', [
                'label' => __( 'Shape 02', 'saasland-core' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'saasland-core' ),
                'label_off' => __( 'No', 'saasland-core' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'shape2_color', [
                'label'     => esc_html__( 'Shape 02 Color', 'saasland-core' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .round_circle.two' => 'background: {{VALUE}};',
                ),
                'condition' => [
                    'is_shape2' => ['yes'],
                ],
            ]
        );

        $this->end_controls_section(); //End Style Shape

        $this->start_controls_section(
            'dimension_section', [
                'label' => __( 'Dimension', 'saasland-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style' => ['style_01', 'style_02']
                ]
            ]
        );

        $this->add_responsive_control(
			'img_dimension_width',
			[
				'label' => esc_html__( 'Width', 'saasland-core' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .seo_features_img img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->add_responsive_control(
			'img_dimension_height',
			[
				'label' => esc_html__( 'Height', 'saasland-core' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'vh'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .seo_features_img img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);



        $this->end_controls_section(); //End Style Shape


        //------------------------------ Style Shape 06 ------------------------------
        $this->start_controls_section(
            'shape_section6', [
                'label' => __( 'Shape', 'saasland-core' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style' => ['style_06']
                ]
            ]
        );

        $this->add_control(
            'shape_color', [
                'label'     => esc_html__( 'Shape 01 Color', 'saasland-core' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .typgraphy_img .circle_shape_1' => 'background: {{VALUE}};',
                ),
            ]
        );

        $this->add_responsive_control(
            'shape_x_position', [
                'label' => __( 'Horizontal Position', 'saasland-core' ),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .circle_shape_1' => 'right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'shape_y_position', [
                'label' => __( 'Vertical Position', 'saasland-core' ),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .circle_shape_1' => 'bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'shape_round', [
                'label' => __( 'Shape Round', 'saasland-core' ),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .circle_shape_1' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section(); //End Style Shape 06


        //========================= Feature Image with layer =========================//
        $this->start_controls_section(
            'image_with_layer_sec', [
                'label' => __( 'Feature Image with layer', 'saasland-core' ),
                'condition' => [
                    'style' => ['style_07']
                ]
            ]
        );

        $this->add_control(
            'feature_image_01', [
                'label' => __( 'Feature Image 01', 'saasland-core' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'feature_image_02', [
                'label' => __( 'Feature Image 02', 'saasland-core' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'feature_image_03', [
                'label' => __( 'Feature Image 03', 'saasland-core' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $layers = new Repeater();
        $layers->add_control(
            'feature_image_layer', [
                'label' => __( 'Feature Image Layer', 'saasland-core' ),
                'type' => Controls_Manager::TEXT,
            ]
        );
        $this->add_control(
            'layers_label', [
                'label' => __( 'Layer Labels', 'saasland-core' ),
                'type' => Controls_Manager::REPEATER,
                'prevent_empty' => false,
                'fields' => $layers->get_controls(),
                'title_field' => '{{{ feature_image_layer }}}',
            ]
        );

        $this->end_controls_section(); //End Feature Image with layer

    }

    protected function render() {
        $settings = $this->get_settings_for_display();


        //===== Include Templates Parts
        if ( $settings['style'] == 'style_02' ) {
            include "templating/featured-image/style_01.php";
        } else {
            include "templating/featured-image/{$settings['style']}.php";
        }

    }
}
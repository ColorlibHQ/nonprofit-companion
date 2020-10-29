<?php
namespace Nonprofitelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Utils;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Nonprofit elementor hero section widget.
 *
 * @since 1.0
 */
class Nonprofit_Hero extends Widget_Base {

	public function get_name() {
		return 'nonprofit-hero';
	}

	public function get_title() {
		return __( 'Hero Section', 'nonprofit-companion' );
	}

	public function get_icon() {
		return 'eicon-slider-full-screen';
	}

	public function get_categories() {
		return [ 'nonprofit-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Hero content ------------------------------
		$this->start_controls_section(
			'hero_content',
			[
				'label' => __( 'Hero content', 'nonprofit-companion' ),
			]
        );
        
        $this->add_control(
            'banner_img',
            [
                'label' => esc_html__( 'Banner Image', 'nonprofit-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Banner Big Title', 'nonprofit-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => 'Support a Causes <br>You Care About',
            ]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Banner Sub Title', 'nonprofit-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => 'At Charity United we believe that all children in the world have the right to be <br>cared for and the right to be protected',
            ]
        );
        $this->add_control(
            'btn_text',
            [
                'label' => esc_html__( 'Button Text', 'nonprofit-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Join Us Today', 'nonprofit-companion' ),
            ]
        );
        $this->add_control(
            'btn_url',
            [
                'label' => esc_html__( 'Button URL', 'nonprofit-companion' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default'   => [
                    'url'   => '#'
                ],
            ]
        );
        
        $this->end_controls_section(); // End Hero content


    /**
     * Style Tab
     * ------------------------------ Style Title ------------------------------
     *
     */
        $this->start_controls_section(
			'style_title', [
				'label' => __( 'Style Hero Section', 'nonprofit-companion' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'big_title_col', [
				'label' => __( 'Big Title Color', 'nonprofit-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text h3' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'sub_title_col', [
				'label' => __( 'Sub Title Color', 'nonprofit-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text p' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
            'button_styles_seperator',
            [
                'label' => esc_html__( 'Button Styles', 'nonprofit-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
		$this->add_control(
			'btn_bg_col', [
				'label' => __( 'Button Bg Color', 'nonprofit-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text .boxed-btn2' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_txt_col', [
				'label' => __( 'Button Text Color', 'nonprofit-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text .boxed-btn2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_bg_hov_col', [
				'label' => __( 'Button Hover Bg Color', 'nonprofit-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text .boxed-btn2:hover' => 'background: {{VALUE}};',
				],
			]
        );
        $this->add_control(
			'btn_hvr_txt_col', [
				'label' => __( 'Button Hover Text Color', 'nonprofit-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text .boxed-btn2:hover' => 'color: {{VALUE}};',
				],
			]
        );
        
        $this->add_control(
            'slider_overlay_color_seperator',
            [
                'label' => esc_html__( 'Slider Overlay Contents', 'nonprofit-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
        $this->add_control(
			'slider_overlay_color', [
				'label' => __( 'Slider Overlay Color', 'nonprofit-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area::before' => 'background: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
	}
    
	protected function render() {
    $settings   = $this->get_settings();
    $banner_img = !empty( $settings['banner_img']['url'] ) ? $settings['banner_img']['url'] : '';    
    $sec_title  = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';    
    $sub_title  = !empty( $settings['sub_title'] ) ? $settings['sub_title'] : '';    
    $btn_text   = !empty( $settings['btn_text'] ) ? $settings['btn_text'] : '';    
    $btn_url    = !empty( $settings['btn_url']['url'] ) ? $settings['btn_url']['url'] : '';    
    ?>

    <!-- slider_area_start -->
    <div class="slider_area slider_bg_1 d-flex align-items-center" <?php echo nonprofit_inline_bg_img( esc_url( $banner_img ) ); ?>>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="single_slider">
                        <div class="slider_text">
                            <h3><?php echo wp_kses_post( nl2br( $sec_title ) )?></h3>
                            <p><?php echo wp_kses_post( nl2br( $sub_title ) )?></p>
                            <a href="<?php echo esc_url( $btn_url )?>" class="boxed-btn2"><?php echo esc_html( $btn_text )?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider_area_end -->
    <?php

    }
}
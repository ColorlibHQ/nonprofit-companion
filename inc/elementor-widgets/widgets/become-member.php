<?php
namespace Nonprofitelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Utils;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Nonprofit elementor become-member section widget.
 *
 * @since 1.0
 */
class Nonprofit_Become_Member extends Widget_Base {

	public function get_name() {
		return 'nonprofit-become-member-section';
	}

	public function get_title() {
		return __( 'Become Volunteer', 'nonprofit-companion' );
	}

	public function get_icon() {
		return 'eicon-person';
	}

	public function get_categories() {
		return [ 'nonprofit-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  Become Member Section content ------------------------------
        $this->start_controls_section(
            'become_member_content',
            [
                'label' => __( 'Become Volunteer Content', 'nonprofit-companion' ),
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'nonprofit-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Become a Volunteer', 'nonprofit-companion' ),
            ]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'nonprofit-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => 'Inspires employees and organizations to support causes they care <br>about. We do this to bring more resources to the nonprofits that are changing our world.',
            ]
        );
        $this->add_control(
            'btn_txt',
            [
                'label' => esc_html__( 'Button Text', 'nonprofit-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Join Now', 'nonprofit-companion' ),
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
        $this->add_control(
            'bg_img',
            [
                'label' => esc_html__( 'Background Image', 'nonprofit-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        
        $this->end_controls_section(); // End about us content

        //------------------------------ Style title ------------------------------
        
        // Top Section Styles
        $this->start_controls_section(
            'left_sec_style', [
                'label' => __( 'Section Styles', 'nonprofit-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
			'sec_title_col', [
				'label' => __( 'Big Title Color', 'nonprofit-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .become_volunter .volunter_text h3' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'sub_title_col', [
				'label' => __( 'Text Color', 'nonprofit-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .become_volunter .volunter_text p' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'btn_txt_col', [
				'label' => __( 'Button Color', 'nonprofit-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .become_volunter .volunter_text .boxed-btn4' => 'color: {{VALUE}}; border-color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'btn_hov_bg_col', [
				'label' => __( 'Button Hover Bg Color', 'nonprofit-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .become_volunter .volunter_text .boxed-btn4:hover' => 'background-color: {{VALUE}}; border-color: {{VALUE}};',
				],
			]
        );
        $this->add_control(
			'btn_hov_txt_col', [
				'label' => __( 'Button Hover Text Color', 'nonprofit-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .become_volunter .volunter_text .boxed-btn4:hover' => 'color: {{VALUE}} !important;',
				],
			]
        );
        $this->add_control(
			'bg_overlay_col', [
				'label' => __( 'Text Holder Bg Color', 'nonprofit-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .become_volunter .volunter_text' => 'background: {{VALUE}};',
				],
			]
        );
        $this->end_controls_section();

	}

	protected function render() {
    $settings   = $this->get_settings();
    $sec_title  = !empty( $settings['sec_title'] ) ?  $settings['sec_title'] : '';
    $sub_title  = !empty( $settings['sub_title'] ) ?  $settings['sub_title'] : '';
    $btn_txt    = !empty( $settings['btn_txt'] ) ?  $settings['btn_txt'] : '';
    $btn_url    = !empty( $settings['btn_url']['url'] ) ?  $settings['btn_url']['url'] : '';
    $bg_img     = !empty( $settings['bg_img']['url'] ) ? $settings['bg_img']['url'] : '';
    ?>
    
    <!-- become_volunter_start -->
    <div class="become_volunter volunter_bg_1" <?php echo nonprofit_inline_bg_img( esc_url( $bg_img ) ); ?>>
        <div class="container">
            <div class="row">
                <div class="col-xl-8 offset-xl-2 col-md-10 offset-md-1">
                    <div class="volunter_text text-center">
                        <h3><?php echo esc_html( $sec_title )?></h3>
                        <p><?php echo wp_kses_post( nl2br($sub_title) )?></p>
                        <a class="boxed-btn4" href="<?php echo esc_url( $btn_url )?>"><?php echo esc_html( $btn_txt )?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- become_volunter_end -->
    <?php

    }
}

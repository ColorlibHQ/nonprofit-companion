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
 * Nonprofit elementor about us section widget.
 *
 * @since 1.0
 */
class Nonprofit_About_Us extends Widget_Base {

	public function get_name() {
		return 'nonprofit-aboutus';
	}

	public function get_title() {
		return __( 'About Us', 'nonprofit-companion' );
	}

	public function get_icon() {
		return 'eicon-column';
	}

	public function get_categories() {
		return [ 'nonprofit-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  About us content ------------------------------
        $this->start_controls_section(
            'about_content',
            [
                'label' => __( 'About Content', 'nonprofit-companion' ),
            ]
        );
        $this->add_control(
            'style_type',
            [
                'label' => esc_html__( 'Select Style', 'nonprofit-companion' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'default'     => 'style_1',
                'options'     => [
                    'style_1'  => esc_html__( 'Style 1', 'nonprofit-companion' ),
                    'style_2'  => esc_html__( 'Style 2', 'nonprofit-companion' ),
                ],
            ]
        );
        $this->add_control(
            'use_minimal',
            [
                'label' => esc_html__( 'Use Minimal Option', 'nonprofit-companion' ),
                'type' => Controls_Manager::SWITCHER,
                'default'     => 'no',
                'label_on'    => esc_html__( 'Yes', 'nonprofit-companion' ),
                'label_off'   => esc_html__( 'No', 'nonprofit-companion' ),
                'return_value' => 'yes',
                'condition'    => [
                    'style_type' => 'style_1'
                ]
            ]
        );
        $this->add_control(
            'reverse_style',
            [
                'label' => esc_html__( 'Reverse Style', 'nonprofit-companion' ),
                'type' => Controls_Manager::SWITCHER,
                'default'     => 'no',
                'label_on'    => esc_html__( 'Yes', 'nonprofit-companion' ),
                'label_off'   => esc_html__( 'No', 'nonprofit-companion' ),
                'return_value' => 'yes',
                'condition'    => [
                    'style_type' => 'style_1'
                ]
            ]
        );
        $this->add_control(
            'section_img',
            [
                'label' => esc_html__( 'Section Image', 'nonprofit-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $this->add_control(
            'section_img2',
            [
                'label' => esc_html__( 'Section Image 2', 'nonprofit-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ],
                'condition'    => [
                    'style_type' => 'style_2'
                ]
            ]
        );
        $this->add_control(
            'serv_title',
            [
                'label' => esc_html__( 'Served Title', 'nonprofit-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Served Over', 'nonprofit-companion' ),
                'condition'    => [
                    'style_type'   => 'style_1',
                    'use_minimal!' => 'yes'
                ]
            ]
        );
        $this->add_control(
            'serv_value',
            [
                'label' => esc_html__( 'Served Value', 'nonprofit-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( '356728', 'nonprofit-companion' ),
                'condition'    => [
                    'style_type'   => 'style_1',
                    'use_minimal!' => 'yes'
                ]
            ]
        );
        $this->add_control(
            'serv_value_after_title',
            [
                'label' => esc_html__( 'Served Value After Text', 'nonprofit-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'people around 50+ countries', 'nonprofit-companion' ),
                'condition'    => [
                    'style_type'   => 'style_1',
                    'use_minimal!' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'right_section_seperator',
            [
                'label' => esc_html__( 'Right Section', 'nonprofit-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
                'condition'    => [
                    'style_type'   => 'style_1',
                    'use_minimal!' => 'yes'
                ]
            ]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'nonprofit-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'About Us', 'nonprofit-companion' ),
                'condition'    => [
                    'style_type'   => 'style_1',
                    'use_minimal!' => 'yes'
                ]
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'nonprofit-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => 'We’ve funded 42,113 <br>water projects for 9.6 <br>million people around <br>the world.',
            ]
        );
        $this->add_control(
            'sec_text',
            [
                'label' => esc_html__( 'About Text', 'nonprofit-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => 'Inspires employees and organizations to support causes they care <br>about. We do this to bring more resources to the nonprofits that are <br>changing our world.',
            ]
        );
        $this->add_control(
            'sec_text_right',
            [
                'label' => esc_html__( 'About Text Right', 'nonprofit-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => 'Inspires employees and organizations to support causes they care <br>about. We do this to bring more resources to the nonprofits that are <br>changing our world.',
                'condition'    => [
                    'style_type' => 'style_2'
                ]
            ]
        );
        $this->add_control(
            'btn_text',
            [
                'label' => esc_html__( 'Button Text', 'nonprofit-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Learn More', 'nonprofit-companion' ),
                'condition'    => [
                    'style_type' => 'style_1'
                ]
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
                'condition'    => [
                    'style_type' => 'style_1'
                ]
            ]
        );

        
        
        $this->end_controls_section(); // End about us content

        //------------------------------ Style title ------------------------------
        
        // Top Section Styles
        $this->start_controls_section(
            'left_sec_style', [
                'label' => __( 'About Section Styles', 'nonprofit-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'served_txt_styles_seperator',
            [
                'label' => esc_html__( 'Serve Section Styles', 'nonprofit-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        
        $this->add_control(
			'serv_title_col', [
				'label' => __( 'Served Texts Color', 'nonprofit-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about_area .about_thumb .served_over span' => 'color: {{VALUE}};',
					'{{WRAPPER}} .about_area .about_thumb .served_over h3' => 'color: {{VALUE}};',
					'{{WRAPPER}} .about_area .about_thumb .served_over p' => 'color: {{VALUE}};',
				],
			]
        );
        $this->add_control(
			'serv_bg_col', [
				'label' => __( 'Served Holder Bg Color', 'nonprofit-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about_area .about_thumb .served_over' => 'background: {{VALUE}};',
				],
			]
        );

        $this->add_control(
            'right_txt_styles_seperator',
            [
                'label' => esc_html__( 'Right Section Styles', 'nonprofit-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
			'sub_title_col', [
				'label' => __( 'Sub Title Color', 'nonprofit-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about_area .section_title span' => 'color: {{VALUE}};',
				],
                'condition'    => [
                    'style_type' => 'style_1'
                ]
			]
        );
        $this->add_control(
			'big_title_col', [
				'label' => __( 'Big Title Color', 'nonprofit-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about_area .section_title h3' => 'color: {{VALUE}};',
					'{{WRAPPER}} .about_page .about_info h3' => 'color: {{VALUE}};',
				],
			]
        );
        $this->add_control(
			'sec_txt_col', [
				'label' => __( 'Text Color', 'nonprofit-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about_area .about_right p' => 'color: {{VALUE}};',
					'{{WRAPPER}} .about_page .about_text_info p' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
            'btn_bg_col', [
                'label' => __( 'Button Bg Color', 'nonprofit-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_area .about_right .boxed_btn3' => 'background-color: {{VALUE}};',
                ],
                'condition'    => [
                    'style_type' => 'style_1'
                ]
            ]
        );
        $this->add_control(
            'btn_txt_col', [
                'label' => __( 'Button Text Color', 'nonprofit-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_area .about_right .boxed_btn3' => 'color: {{VALUE}};',
                ],
                'condition'    => [
                    'style_type' => 'style_1'
                ]
            ]
        );
        $this->add_control(
            'btn_hvr_styles_seperator',
            [
                'label' => esc_html__( 'Button Hover Styles', 'nonprofit-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
                'condition'    => [
                    'style_type' => 'style_1'
                ]
            ]
        );
        $this->add_control(
            'btn_hvr_bg_col', [
                'label' => __( 'Button Hover Bg Color', 'nonprofit-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_area .about_right .boxed_btn3:hover' => 'background-color: {{VALUE}};',
                ],
                'condition'    => [
                    'style_type' => 'style_1'
                ]
            ]
        );
        $this->add_control(
            'btn_hvr_txt_col', [
                'label' => __( 'Button Hover Text Color', 'nonprofit-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_area .about_right .boxed_btn3:hover' => 'color: {{VALUE}} !important;',
                ],
                'condition'    => [
                    'style_type' => 'style_1'
                ]
            ]
        );

        $this->end_controls_section();

    }
    
    public function nonprofit_get_about_text_section( $sub_title, $sec_title, $sec_text, $btn_text, $btn_url ) {
        ?>
        <div class="col-xl-6 col-md-6">
            <div class="about_right">
                <div class="section_title">
                    <span><?php echo esc_html( $sub_title )?></span>
                    <h3><?php echo wp_kses_post( nl2br( $sec_title ) )?></h3>
                </div>
                <p><?php echo wp_kses_post( nl2br( $sec_text ) )?></p>
                <?php
                    if ( $btn_text ) {
                        ?>
                        <a href="<?php echo esc_url( $btn_url )?>" class="boxed_btn3"><?php echo esc_html( $btn_text )?></a>
                        <?php
                    }
                ?>
            </div>
        </div>
        <?php
    }

    public function nonprofit_get_about_img_section( $use_minimal, $section_img, $serv_title, $serv_value, $serv_value_after_title ) {
        ?>
        <div class="col-xl-6 col-md-6">
            <div class="about_thumb">
                <?php 
                    if ( $section_img ) { 
                        echo $section_img;
                    }
                    if ( $use_minimal != 'yes' ) {
                    ?>
                    <div class="served_over">
                        <span><?php echo esc_html( $serv_title )?></span>
                        <h3><?php echo esc_html( $serv_value )?></h3>
                        <p><?php echo esc_html( $serv_value_after_title )?></p>
                    </div>
                    <?php
                    }
                ?>
            </div>
        </div>
        <?php
    }
    
	protected function render() {
    $settings       = $this->get_settings();    
    $style_type     = !empty( $settings['style_type'] ) ?  $settings['style_type'] : '';
    if ( $style_type == 'style_1' ) {
        $section_img     = !empty( $settings['section_img']['id'] ) ? wp_get_attachment_image( $settings['section_img']['id'], 'nonprofit_about_thumb_588x600', '', array( 'alt' => 'about image' ) ) : '';
        $use_minimal     = !empty( $settings['use_minimal'] ) ?  $settings['use_minimal'] : '';
        $reverse_style   = !empty( $settings['reverse_style'] ) ?  $settings['reverse_style'] : '';
        $serv_title      = !empty( $settings['serv_title'] ) ?  $settings['serv_title'] : '';
        $serv_value      = !empty( $settings['serv_value'] ) ?  $settings['serv_value'] : '';
        $serv_value_after_title      = !empty( $settings['serv_value_after_title'] ) ?  $settings['serv_value_after_title'] : '';
        $sub_title      = !empty( $settings['sub_title'] ) ?  $settings['sub_title'] : '';
        $btn_text       = !empty( $settings['btn_text'] ) ?  $settings['btn_text'] : '';
        $btn_url        = !empty( $settings['btn_url']['url'] ) ?  $settings['btn_url']['url'] : '';
        $wrapper_class  = $use_minimal == 'yes' ? 'about_area used_minimal' : 'about_area';
        $wrapper_class .= $reverse_style == 'yes' ? ' reversed_style' : '';
    } else {
        $section_img     = !empty( $settings['section_img']['id'] ) ? wp_get_attachment_image( $settings['section_img']['id'], 'nonprofit_about_page_thumb_558x550', '', array( 'alt' => 'about image' ) ) : '';
        $section_img2    = !empty( $settings['section_img2']['id'] ) ? wp_get_attachment_image( $settings['section_img2']['id'], 'nonprofit_about_page_thumb_558x550', '', array( 'alt' => 'about image 2' ) ) : '';
        $sec_text_right  = !empty( $settings['sec_text_right'] ) ?  $settings['sec_text_right'] : '';
    }
    $sec_title      = !empty( $settings['sec_title'] ) ?  $settings['sec_title'] : '';
    $sec_text      = !empty( $settings['sec_text'] ) ?  $settings['sec_text'] : '';
    $dynamic_class  = is_front_page() ? 'about_part padding_bottom overflow-hidden' : 'about_part padding_top overflow-hidden';
    if ( $style_type == 'style_2' ) {
        ?>
        <div class="about_page">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-md-6">
                        <div class="about_image">
                            <?php
                                if ( $section_img ) {
                                    echo $section_img;
                                }
                            ?>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="about_image">
                            <?php
                                if ( $section_img2 ) {
                                    echo $section_img2;
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="about_info">
                            <h3><?php echo wp_kses_post( nl2br( $sec_title ) )?></h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-md-6">
                        <div class="about_text_info">
                            <p><?php echo wp_kses_post( nl2br( $sec_text ) )?></p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="about_text_info">
                            <p><?php echo wp_kses_post( nl2br( $sec_text_right ) )?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } else {
        ?>
        <div class="<?php echo esc_attr( $wrapper_class )?>">
            <div class="container">
                <div class="row align-items-center">
                    <?php
                        if ( $reverse_style == 'yes' ) {
                            $this->nonprofit_get_about_text_section( $sub_title, $sec_title, $sec_text, $btn_text, $btn_url );
                            $this->nonprofit_get_about_img_section( $use_minimal, $section_img, $serv_title, $serv_value, $serv_value_after_title );
                        } else {
                            $this->nonprofit_get_about_img_section( $use_minimal, $section_img, $serv_title, $serv_value, $serv_value_after_title );
                            $this->nonprofit_get_about_text_section( $sub_title, $sec_title, $sec_text, $btn_text, $btn_url );
                        }
                    ?>  
                </div>
            </div>
        </div>
        <?php
    }
    }
}
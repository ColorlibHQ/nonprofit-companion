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
 * Nonprofit elementor causes section widget.
 *
 * @since 1.0
 */
class Nonprofit_Causes extends Widget_Base {

	public function get_name() {
		return 'nonprofit-causes';
	}

	public function get_title() {
		return __( 'Causes Section', 'nonprofit-companion' );
	}

	public function get_icon() {
		return 'eicon-heart-o';
	}

	public function get_categories() {
		return [ 'nonprofit-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  Causes content ------------------------------
        $this->start_controls_section(
            'causes_content',
            [
                'label' => __( 'About Content', 'nonprofit-companion' ),
            ]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'nonprofit-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Upcoming Cause', 'nonprofit-companion' ),
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'nonprofit-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => 'Support Nahid for <br>His pneumonia <br>treatment',
            ]
        );
        $this->add_control(
            'sec_text',
            [
                'label' => esc_html__( 'Causes Text', 'nonprofit-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => 'Inspires employees and organizations to support causes they care <br>about. We do this to bring more resources to the nonprofits that are <br>changing our world.',
            ]
        );
        $this->add_control(
            'target_raised_seperator',
            [
                'label' => esc_html__( 'Target And Raised Section', 'nonprofit-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'target_text',
            [
                'label' => esc_html__( 'Target Text', 'nonprofit-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Target', 'nonprofit-companion' ),
            ]
        );
        $this->add_control(
            'target_value',
            [
                'label' => esc_html__( 'Target Value', 'nonprofit-companion' ),
                'description' => esc_html__( 'Note: Only the \'$\' Us Dollar sign supported or input the amount only!', 'nonprofit-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( '$2783', 'nonprofit-companion' ),
            ]
        );
        $this->add_control(
            'raised_text',
            [
                'label' => esc_html__( 'Raised Text', 'nonprofit-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Raised', 'nonprofit-companion' ),
            ]
        );
        $this->add_control(
            'raised_value',
            [
                'label' => esc_html__( 'Raised Value', 'nonprofit-companion' ),
                'description' => esc_html__( 'Note: Only the \'$\' Us Dollar sign supported or input the amount only!', 'nonprofit-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( '$1530', 'nonprofit-companion' ),
            ]
        );
        $this->add_control(
            'btn_text',
            [
                'label' => esc_html__( 'Button Text', 'nonprofit-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Donate Now', 'nonprofit-companion' ),
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
            'right_section_seperator',
            [
                'label' => esc_html__( 'Right Section', 'nonprofit-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'section_img',
            [
                'label' => esc_html__( 'Right Image', 'nonprofit-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        
        $this->end_controls_section(); // End causes content

        //------------------------------ Style title ------------------------------
        
        // Top Section Styles
        $this->start_controls_section(
            'left_sec_style', [
                'label' => __( 'About Section Styles', 'nonprofit-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
			'sub_title_col', [
				'label' => __( 'Sub Title Color', 'nonprofit-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .causes_area .section_title span' => 'color: {{VALUE}};',
				],
			]
        );
        $this->add_control(
			'big_title_col', [
				'label' => __( 'Big Title Color', 'nonprofit-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .causes_area .section_title h3' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'sec_txt_col', [
				'label' => __( 'Text Color', 'nonprofit-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .causes_area .causes_info p' => 'color: {{VALUE}};',
					'{{WRAPPER}} .causes_area .causes_info .target_rais_area .single_raise span' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
            'amount_styles_seperator',
            [
                'label' => esc_html__( 'Amount Styles', 'nonprofit-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
			'amount_bg_col', [
				'label' => __( 'Amount Bg Color', 'nonprofit-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .causes_area .causes_info .target_rais_area .single_raise h4' => 'background: {{VALUE}};',
				],
			]
        );
        $this->add_control(
			'amount_txt_col', [
				'label' => __( 'Amount Text Color', 'nonprofit-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .causes_area .causes_info .target_rais_area .single_raise h4' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
            'btn_styles_seperator',
            [
                'label' => esc_html__( 'Button Styles', 'nonprofit-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'btn_bg_col', [
                'label' => __( 'Button Bg Color', 'nonprofit-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .causes_area .doante_btn .boxed_btn3' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_txt_col', [
                'label' => __( 'Button Text Color', 'nonprofit-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .causes_area .doante_btn .boxed_btn3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_hvr_bg_col', [
                'label' => __( 'Button Hover Bg Color', 'nonprofit-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .causes_area .doante_btn .boxed_btn3:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_hvr_txt_col', [
                'label' => __( 'Button Hover Text Color', 'nonprofit-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .causes_area .doante_btn .boxed_btn3:hover' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'status_bar_styles_seperator',
            [
                'label' => esc_html__( 'Status Bar Styles', 'nonprofit-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'status_bar_col', [
                'label' => __( 'Status Bar Color', 'nonprofit-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .causes_area .causes_thumb .custom_progress_bar .progress .progress-bar' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .causes_area .causes_thumb .custom_progress_bar .progress .progress-bar .value_progress' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

    }
    
    public function nonprofit_get_causes_info( $sub_title, $sec_title, $sec_text, $target_text, $target_value, $raised_text, $raised_value, $btn_text, $btn_url ) {
        ?>
        <div class="causes_info">
            <div class="section_title">
                <?php echo $sub_title ? '<span>'.esc_html( $sub_title ) .'</span>' : ''?>
                <h3><?php echo wp_kses_post( nl2br( $sec_title ) )?></h3>
            </div>
            <p><?php echo wp_kses_post( nl2br( $sec_text ) )?></p>
            <div class="target_rais_area d-flex">
                <div class="single_raise">
                    <span><?php echo esc_html( $target_text )?> :</span>
                    <h4><?php echo esc_html( $target_value )?></h4>
                </div>
                <div class="single_raise">
                    <span><?php echo esc_html( $raised_text )?> :</span>
                    <h4><?php echo esc_html( $raised_value )?></h4>
                </div>
                <div class="doante_btn">
                    <a href="<?php echo esc_url( $btn_url )?>" class="boxed_btn3"><?php echo esc_html( $btn_text )?></a>
                </div>
            </div>
        </div>
        <?php
    }

	protected function render() {
    $settings       = $this->get_settings();    
    $sub_title      = !empty( $settings['sub_title'] ) ?  $settings['sub_title'] : '';
    $sec_title      = !empty( $settings['sec_title'] ) ?  $settings['sec_title'] : '';
    $sec_text       = !empty( $settings['sec_text'] ) ?  $settings['sec_text'] : '';
    $target_text    = !empty( $settings['target_text'] ) ?  $settings['target_text'] : '';
    $target_value   = !empty( $settings['target_value'] ) ?  $settings['target_value'] : '';
    $raised_text    = !empty( $settings['raised_text'] ) ?  $settings['raised_text'] : '';
    $raised_value   = !empty( $settings['raised_value'] ) ?  $settings['raised_value'] : '';
    $btn_text       = !empty( $settings['btn_text'] ) ?  $settings['btn_text'] : '';
    $btn_url        = !empty( $settings['btn_url']['url'] ) ?  $settings['btn_url']['url'] : '';
    $section_img    = !empty( $settings['section_img']['id'] ) ? wp_get_attachment_image( $settings['section_img']['id'], 'nonprofit_causes_thumb_588x750', '', array( 'alt' => 'causes image' ) ) : '';
    $dynamic_class  = is_front_page() ? 'causes_area' : 'causes_area causes_area2';

    function get_percentage_value( $raised_value, $target_value ){
        $raised_value = str_replace( '$', '', $raised_value );
        $target_value = str_replace( '$', '', $target_value );
        $result = ($raised_value/$target_value)*100;
        return (int)$result;
    }
    ?>
    
    <!-- causes_area_start -->
    <div class="<?php echo esc_attr( $dynamic_class )?>">
        <div class="container">
            <div class="row align-items-<?php echo esc_attr( is_front_page() ? 'center' : 'end' )?>">
                <div class="col-xl-6 col-md-6">
                    <?php $this->nonprofit_get_causes_info( $sub_title, $sec_title, $sec_text, $target_text, $target_value, $raised_text, $raised_value, $btn_text, $btn_url )?>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="causes_thumb">
                        <?php 
                            if ( $section_img ) { 
                                echo $section_img;
                            }
                        ?>
                        <div class="custom_progress_bar">
                            <div class="progress">
                                <div class="progress-bar wow slideInLeft" role="progressbar" aria-valuenow="<?php echo get_percentage_value( $raised_value, $target_value )?>"
                                    aria-valuemin="0" aria-valuemax="100" style="width:<?php
                                    echo get_percentage_value( $raised_value, $target_value ) < 12 ? '12' : get_percentage_value( $raised_value, $target_value );
                                    ?>%">
                                    <div class="value_progress">
                                        <span><?php echo get_percentage_value( $raised_value, $target_value )?>%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- causes_area_end -->
    <?php
    }
}
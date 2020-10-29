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
 * Nonprofit elementor help-area section widget.
 *
 * @since 1.0
 */
class Nonprofit_Help_Area extends Widget_Base {

	public function get_name() {
		return 'nonprofit-help-areas';
	}

	public function get_title() {
		return __( 'Help Area', 'nonprofit-companion' );
	}

	public function get_icon() {
		return 'eicon-facebook-like-box';
	}

	public function get_categories() {
		return [ 'nonprofit-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Help Area content ------------------------------
		$this->start_controls_section(
			'help_area_content',
			[
				'label' => __( 'Help Area content', 'nonprofit-companion' ),
			]
        );
        $this->add_control(
            'style_type',
            [
                'label' => esc_html__( 'Select Style', 'nonprofit-companion' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'style_1',
                'options' => [
                    'style_1' => 'Style 1',
                    'style_2' => 'Style 2',
                ]
            ]
        );
        $this->add_control(
            'help_area_left_sections_seperator',
            [
                'label' => esc_html__( 'Help Area Left Contents', 'nonprofit-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'style_type' => 'style_1'
                ]
            ]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'nonprofit-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Help Them', 'nonprofit-companion' ),
                'condition' => [
                    'style_type' => 'style_1'
                ]
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'nonprofit-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'They Needs <br>your Help'
            ]
        );
        $this->add_control(
            'sec_text',
            [
                'label' => esc_html__( 'Section Text', 'nonprofit-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => esc_html__( 'Inspires employees and organizations to support causes they care about do this to bring more resources.', 'nonprofit-companion' ),
                'condition' => [
                    'style_type' => 'style_1'
                ]
            ]
        );
        $this->add_control(
            'anchor_text',
            [
                'label' => esc_html__( 'Anchor Text', 'nonprofit-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'See All Causes', 'nonprofit-companion' ),
                'condition' => [
                    'style_type' => 'style_1'
                ]
            ]
        );
        $this->add_control(
            'anchor_url',
            [
                'label' => esc_html__( 'Anchor URL', 'nonprofit-companion' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default' => [
                    'url' => '#'
                ],
                'condition' => [
                    'style_type' => 'style_1'
                ]
            ]
        );
        $this->add_control(
            'help_area_inner_settings_seperator',
            [
                'label' => esc_html__( 'Help Area Carousel Items', 'nonprofit-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'style_type' => 'style_1'
                ]
            ]
        );

		$this->add_control(
            'nonprofithelpareas', [
                'label' => __( 'Create New', 'nonprofit-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ item_title }}}',
                'fields' => [
                    [
                        'name' => 'item_img',
                        'label' => __( 'Item Image', 'nonprofit-companion' ),
                        'type' => Controls_Manager::MEDIA,
                        'default'      => [
                            'url'       => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'name' => 'item_title',
                        'label' => __( 'Item Title', 'nonprofit-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => 'Help Yeati to continue her <br>Primary Education',
                    ],
                    [
                        'name' => 'target_text',
                        'label' => __( 'Target Text', 'nonprofit-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Target', 'nonprofit-companion' ),
                    ],
                    [
                        'name' => 'target_value',
                        'label' => __( 'Target Value', 'nonprofit-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( '$2783', 'nonprofit-companion' ),
                    ],
                    [
                        'name' => 'raised_text',
                        'label' => __( 'Raised Text', 'nonprofit-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Raised', 'nonprofit-companion' ),
                    ],
                    [
                        'name' => 'raised_value',
                        'label' => __( 'Raised Value', 'nonprofit-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( '$1530', 'nonprofit-companion' ),
                    ],
                    [
                        'name' => 'btn_text',
                        'label' => __( 'Target Text', 'nonprofit-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Donate Now', 'nonprofit-companion' ),
                    ],
                    [
                        'name' => 'btn_url',
                        'label' => __( 'Target Text', 'nonprofit-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                        'default' => [
                            'url' => '#'
                        ],
                    ],                    
                ],
                'default'   => [
                    [      
                        'item_img'      => [
                            'url'       => Utils::get_placeholder_image_src(),
                        ],
                        'item_title'    => 'Help Yeati to continue her <br>Primary Education',
                        'target_text'   => __( 'Target', 'nonprofit-companion' ),
                        'target_value'  => __( '$2783', 'nonprofit-companion' ),
                        'raised_text'   => __( 'Raised', 'nonprofit-companion' ),
                        'raised_value'  => __( '$1530', 'nonprofit-companion' ),
                        'btn_text'      => __( 'Donate Now', 'nonprofit-companion' ),
                        'btn_url'       => '#',
                    ],
                    [      
                        'item_img'      => [
                            'url'       => Utils::get_placeholder_image_src(),
                        ],
                        'item_title'    => 'Help Yeati to continue her <br>Primary Education',
                        'target_text'   => __( 'Target', 'nonprofit-companion' ),
                        'target_value'  => __( '$2783', 'nonprofit-companion' ),
                        'raised_text'   => __( 'Raised', 'nonprofit-companion' ),
                        'raised_value'  => __( '$1530', 'nonprofit-companion' ),
                        'btn_text'      => __( 'Donate Now', 'nonprofit-companion' ),
                        'btn_url'       => '#',
                    ],
                ]
            ]
		);
		$this->end_controls_section(); // End help area content

    /**
     * Style Tab
     * ------------------------------ Style Section Heading ------------------------------
     *
     */

        $this->start_controls_section(
            'style_room_section', [
                'label' => __( 'Style Service Section', 'nonprofit-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'sub_title_col', [
                'label' => __( 'Sub Title Color', 'nonprofit-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .help_area .section_title span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'big_title_col', [
                'label' => __( 'Big Title Color', 'nonprofit-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .help_area .section_title h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'section_text_left_col', [
                'label' => __( 'Left Section Text Color', 'nonprofit-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .help_area .help_info p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'anchor_styles_seperator',
            [
                'label' => esc_html__( 'Anchor Text Styles', 'nonprofit-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'anchor_text_left_col', [
                'label' => __( 'Ancor Text Color', 'nonprofit-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .help_area .help_info a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'anchor_text_left_hov_col', [
                'label' => __( 'Ancor Text Hover Color', 'nonprofit-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .help_area .help_info a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

		//------------------------------ Help Area Item Style ------------------------------
		$this->start_controls_section(
			'style_serv_items_sec', [
				'label' => __( 'Style Single Item', 'nonprofit-companion' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'item_title_color', [
				'label' => __( 'Title Color', 'nonprofit-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .help_area .single_help_wrap .help_content > h3' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'amount_text_color', [
				'label' => __( 'Amount Text Color', 'nonprofit-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .help_area .single_help_wrap .donate_amount .single_amount span' => 'color: {{VALUE}};',
				],
			]
        );
		$this->add_control(
			'amount_val_color', [
				'label' => __( 'Amount Value Color', 'nonprofit-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .help_area .single_help_wrap .donate_amount .single_amount h3' => 'color: {{VALUE}};',
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
			'button_txt_color', [
				'label' => __( 'Button Color', 'nonprofit-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .help_area .single_help_wrap .boxed-btn4' => 'color: {{VALUE}}; border-color: {{VALUE}};',
				],
			]
        );
		$this->add_control(
			'button_hvr_txt_color', [
				'label' => __( 'Button Hover Text Color', 'nonprofit-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .help_area .single_help_wrap .boxed-btn4:hover' => 'color: {{VALUE}} !important;',
				],
			]
        );
		$this->add_control(
			'button_hvr_bg_color', [
				'label' => __( 'Button Hover Bg Color', 'nonprofit-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .help_area .single_help_wrap .boxed-btn4:hover' => 'background: {{VALUE}}; border-color: {{VALUE}};',
				],
			]
        );
		$this->end_controls_section();

	}
    
	protected function render() {
    $settings           = $this->get_settings();
    $style_type         = !empty( $settings['style_type'] ) ? $settings['style_type'] : '';
    if ( $style_type == 'style_1' ) {
        // call load widget script
        $this->load_widget_script(); 
        $sub_title     = !empty( $settings['sub_title'] ) ? $settings['sub_title'] : '';
        $wrapper_class = 'help_area';
        $sec_text      = !empty( $settings['sec_text'] ) ? $settings['sec_text'] : '';
        $anchor_text        = !empty( $settings['anchor_text'] ) ? $settings['anchor_text'] : '';
        $anchor_url         = !empty( $settings['anchor_url']['url'] ) ? $settings['anchor_url']['url'] : '';
    } else {
        $wrapper_class = 'help_area help_area_page';
    }
    $sec_title          = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $nonprofithelpareas = !empty( $settings['nonprofithelpareas'] ) ? $settings['nonprofithelpareas'] : '';

    function get_single_help_item( $item_img, $item_title, $target_text, $target_value, $raised_text, $raised_value, $btn_text, $btn_url ) {
        ?>
        <div class="single_help_wrap">
            <div class="thumb">
                <?php
                    if ( $item_img ) {
                        echo $item_img;
                    }
                ?>
            </div>
            <div class="help_content">
                <h3><?php echo wp_kses_post( nl2br( $item_title ) )?></h3>
                <div class="donate_amount d-flex">
                    <div class="single_amount">
                        <span><?php echo esc_html( $target_text )?> :</span>
                        <h3><?php echo esc_html( $target_value )?></h3>
                    </div>
                    <div class="single_amount">
                        <span><?php echo esc_html( $raised_text )?> :</span>
                        <h3><?php echo esc_html( $raised_value )?></h3>
                    </div>
                </div>
                <a href="<?php echo esc_url( $btn_url )?>" class="boxed-btn4 "><?php echo esc_html( $btn_text )?></a>
            </div>
        </div>
        <?php
    }
    ?>

    <!-- help_area_start -->
    <div class="<?php echo esc_attr( $wrapper_class )?>">
        <div class="container">
            <?php
            if ( $style_type == 'style_1' ) {
            ?>
            <div class="row align-items-center">
                <div class="col-xl-4">
                    <div class="help_info">
                        <div class="section_title">
                            <span><?php echo esc_html( $sub_title )?></span>
                            <h3><?php echo wp_kses_post( nl2br( $sec_title ) )?></h3>
                        </div>
                        <p><?php echo wp_kses_post( nl2br( $sec_text ) )?></p>
                        <a href="<?php echo esc_url( $anchor_url )?>"><?php echo esc_html( $anchor_text )?></a>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="help_slider_active owl-carousel">
                        <?php 
                        if( is_array( $nonprofithelpareas ) && count( $nonprofithelpareas ) > 0 ) {
                            foreach( $nonprofithelpareas as $item ) {
                                $item_img     = ( !empty( $item['item_img']['id'] ) ) ? wp_get_attachment_image( $item['item_img']['id'], 'nonprofit_help_thumb_362x268', [ 'alt' => 'help images' ] ) : '';
                                $item_title     = ( !empty( $item['item_title'] ) ) ? $item['item_title'] : '';
                                $target_text     = ( !empty( $item['target_text'] ) ) ? $item['target_text'] : '';
                                $target_value     = ( !empty( $item['target_value'] ) ) ? $item['target_value'] : '';
                                $raised_text     = ( !empty( $item['raised_text'] ) ) ? $item['raised_text'] : '';
                                $raised_value     = ( !empty( $item['raised_value'] ) ) ? $item['raised_value'] : '';
                                $btn_text     = ( !empty( $item['btn_text'] ) ) ? $item['btn_text'] : '';
                                $btn_url     = ( !empty( $item['btn_url']['url'] ) ) ? $item['btn_url']['url'] : '';

                                get_single_help_item( $item_img, $item_title, $target_text, $target_value, $raised_text, $raised_value, $btn_text, $btn_url );
                            }
                        }
                        ?>
                    </div>
                </div>
                <?php
            } else {
                ?>
                <div class="row align-items-center">
                    <div class="col-xl-12">
                        <div class="help_info">
                            <div class="section_title mb-80">
                                <h3><?php echo wp_kses_post( nl2br( $sec_title ) )?></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php 
                    if( is_array( $nonprofithelpareas ) && count( $nonprofithelpareas ) > 0 ) {
                        foreach( $nonprofithelpareas as $item ) {
                            $item_img     = ( !empty( $item['item_img']['id'] ) ) ? wp_get_attachment_image( $item['item_img']['id'], 'nonprofit_help_thumb_362x268', [ 'alt' => 'help images' ] ) : '';
                            $item_title     = ( !empty( $item['item_title'] ) ) ? $item['item_title'] : '';
                            $target_text     = ( !empty( $item['target_text'] ) ) ? $item['target_text'] : '';
                            $target_value     = ( !empty( $item['target_value'] ) ) ? $item['target_value'] : '';
                            $raised_text     = ( !empty( $item['raised_text'] ) ) ? $item['raised_text'] : '';
                            $raised_value     = ( !empty( $item['raised_value'] ) ) ? $item['raised_value'] : '';
                            $btn_text     = ( !empty( $item['btn_text'] ) ) ? $item['btn_text'] : '';
                            $btn_url     = ( !empty( $item['btn_url']['url'] ) ) ? $item['btn_url']['url'] : '';

                            echo '<div class="col-xl-4 col-lg-4 col-md-6">';
                                get_single_help_item( $item_img, $item_title, $target_text, $target_value, $raised_text, $raised_value, $btn_text, $btn_url );
                            echo '</div>';
                        }
                    }
                    ?>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    <!-- help_area_end -->
    <?php
    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            // review-active
            $('.help_slider_active').owlCarousel({
                loop:true,
                margin:30,
                items:1,
                autoplay:true,
                navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
                nav:false,
                dots:false,
                autoplayHoverPause: true,
                autoplaySpeed: 800,
                responsive:{
                    0:{
                        items:1
                    },
                    767:{
                        items:2
                    },
                    992:{
                        items:2
                    },
                    1200:{
                        items:2
                    },
                    1500:{
                        items:2
                    }
                }
            });
        })(jQuery);
        </script>
        <?php 
        }
    }	
}
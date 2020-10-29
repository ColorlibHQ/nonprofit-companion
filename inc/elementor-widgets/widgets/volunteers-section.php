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
 * Nonprofit elementor volunteer section widget.
 *
 * @since 1.0
 */
class Nonprofit_Volunteers extends Widget_Base {

	public function get_name() {
		return 'nonprofit-volunteers';
	}

	public function get_title() {
		return __( 'Volunteers', 'nonprofit-companion' );
	}

	public function get_icon() {
		return 'eicon-posts-ticker';
	}

	public function get_categories() {
		return [ 'nonprofit-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Volunteers content ------------------------------
		$this->start_controls_section(
			'volunteers_content',
			[
				'label' => __( 'Volunteers content', 'nonprofit-companion' ),
			]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'nonprofit-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'We Work For', 'nonprofit-companion' )
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'nonprofit-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'We Serve For Peoples', 'nonprofit-companion' )
            ]
        );
        $this->add_control(
            'volunteers_item_seperator',
            [
                'label' => esc_html__( 'Single Items', 'nonprofit-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );

		$this->add_control(
            'volunteers', [
                'label' => __( 'Create New', 'nonprofit-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ name }}}',
                'fields' => [
                    [
                        'name' => 'img',
                        'label' => __( 'Item Image', 'nonprofit-companion' ),
                        'type' => Controls_Manager::MEDIA,
                        'default'      => [
                            'url'       => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'name' => 'social_profiles_seperator',
                        'label' => __( 'Social Profiles', 'nonprofit-companion' ),
                        'type' => Controls_Manager::HEADING,
                        'seperator' => 'after'
                    ],
                    [
                        'name' => 'fb',
                        'label' => __( 'Facebook URL', 'nonprofit-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                        'default' => [
                            'url'       => '#',
                        ],
                    ],
                    [
                        'name' => 'tw',
                        'label' => __( 'Twitter URL', 'nonprofit-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                        'default' => [
                            'url'       => '#',
                        ],
                    ],
                    [
                        'name' => 'in',
                        'label' => __( 'Linkedin URL', 'nonprofit-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                        'default' => [
                            'url'       => '#',
                        ],
                    ],
                    [
                        'name' => 'name',
                        'label' => __( 'Member Name', 'nonprofit-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Macau Wilium', 'nonprofit-companion' ),
                    ],
                    [
                        'name' => 'designation',
                        'label' => __( 'Member Designation', 'nonprofit-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Volunteer', 'nonprofit-companion' ),
                    ],                  
                ],
                'default'   => [
                    [      
                        'img'       => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'fb'        => __( '#', 'nonprofit-companion' ),
                        'tw'        => __( '#', 'nonprofit-companion' ),
                        'in'        => __( '#', 'nonprofit-companion' ),
                        'name'      => __( 'Macau Wilium', 'nonprofit-companion' ),
                        'designation' => __( 'Volunteer', 'nonprofit-companion' ),
                    ],
                    [      
                        'img'       => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'fb'        => __( '#', 'nonprofit-companion' ),
                        'tw'        => __( '#', 'nonprofit-companion' ),
                        'in'        => __( '#', 'nonprofit-companion' ),
                        'name'      => __( 'Anila Miller', 'nonprofit-companion' ),
                        'designation' => __( 'Volunteer & Donor', 'nonprofit-companion' ),
                    ],
                    [      
                        'img'       => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'fb'        => __( '#', 'nonprofit-companion' ),
                        'tw'        => __( '#', 'nonprofit-companion' ),
                        'in'        => __( '#', 'nonprofit-companion' ),
                        'name'      => __( 'Rona Dana', 'nonprofit-companion' ),
                        'designation' => __( 'Volunteer', 'nonprofit-companion' ),
                    ],
                    [      
                        'img'       => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'fb'        => __( '#', 'nonprofit-companion' ),
                        'tw'        => __( '#', 'nonprofit-companion' ),
                        'in'        => __( '#', 'nonprofit-companion' ),
                        'name'      => __( 'Ledo Jonson', 'nonprofit-companion' ),
                        'designation' => __( 'Volunteer', 'nonprofit-companion' ),
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
                    '{{WRAPPER}} .volunteers_area .section_title span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'big_title_col', [
                'label' => __( 'Big Title Color', 'nonprofit-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .volunteers_area .section_title h3' => 'color: {{VALUE}};',
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
				'label' => __( 'Volunteer Name Color', 'nonprofit-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .volunteers_area .single_volunteer .author_name h3' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'item_desig_color', [
				'label' => __( 'Volunteer Designation Color', 'nonprofit-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .volunteers_area .single_volunteer .author_name span' => 'color: {{VALUE}};',
				],
			]
        );
        $this->add_control(
            'hvr_styles_seperator',
            [
                'label' => esc_html__( 'Hover Styles', 'nonprofit-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'item_hvr_bg_col', [
                'label' => __( 'Item Hover Bg Color', 'nonprofit-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .volunteers_area .single_volunteer .thumb .social_links::before' => 'background-color: {{VALUE}}; background-image: none',
                ],
            ]
        );
        $this->add_control(
            'social_item_hvr_text_col', [
                'label' => __( 'Social Link Hover Color', 'nonprofit-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .volunteers_area .single_volunteer .thumb .social_links ul li a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
		$this->end_controls_section();

	}
    
	protected function render() {
    $settings   = $this->get_settings();
    $sub_title  = !empty( $settings['sub_title'] ) ? $settings['sub_title'] : '';
    $sec_title  = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $volunteers = !empty( $settings['volunteers'] ) ? $settings['volunteers'] : '';
    $dynamic_class = is_front_page() ? 'service_part section_padding services_bg' : 'service_part section_padding';
    ?>
    
    <!-- volunteers_area_satrt -->
    <div class="volunteers_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-60">
                        <span><?php echo esc_html( $sub_title )?></span>
                        <h3><?php echo esc_html( $sec_title )?></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php 
                if( is_array( $volunteers ) && count( $volunteers ) > 0 ) {
                    foreach( $volunteers as $item ) {
                        $img     = ( !empty( $item['img']['id'] ) ) ? wp_get_attachment_image( $item['img']['id'], 'nonprofit_volunteer_thumb_264x290', [ 'alt' => 'volunteer images' ] ) : '';
                        $fb     = ( !empty( $item['fb']['url'] ) ) ? $item['fb']['url'] : '';
                        $tw     = ( !empty( $item['tw']['url'] ) ) ? $item['tw']['url'] : '';
                        $in     = ( !empty( $item['in']['url'] ) ) ? $item['in']['url'] : '';
                        $name   = ( !empty( $item['name'] ) ) ? $item['name'] : '';
                        $designation = ( !empty( $item['designation'] ) ) ? $item['designation'] : '';
                        ?>
                        <div class="col-xl-3 col-md-6">
                            <div class="single_volunteer">
                                <div class="thumb">
                                    <?php
                                        if ( $img ) {
                                            echo $img;
                                        }
                                    ?>
                                    <div class="social_links">
                                        <ul>
                                            <li><a href="<?php echo esc_url( $fb )?>"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="<?php echo esc_url( $tw )?>"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="<?php echo esc_url( $in )?>"><i class="fa fa-linkedin-square"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="author_name text-center">
                                    <h3><?php echo esc_html( $name )?></h3>
                                    <span><?php echo esc_html( $designation )?></span>
                                </div>
                            </div>
                        </div>
                        <?php 
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <!-- volunteers_area_end -->
    <?php
    }
}
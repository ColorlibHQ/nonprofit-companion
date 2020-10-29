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
 * Nonprofit elementor service section widget.
 *
 * @since 1.0
 */
class Nonprofit_Services extends Widget_Base {

	public function get_name() {
		return 'nonprofit-services';
	}

	public function get_title() {
		return __( 'Services', 'nonprofit-companion' );
	}

	public function get_icon() {
		return 'eicon-settings';
	}

	public function get_categories() {
		return [ 'nonprofit-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Service content ------------------------------
		$this->start_controls_section(
			'service_content',
			[
				'label' => __( 'Services content', 'nonprofit-companion' ),
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
            'service_inner_settings_seperator',
            [
                'label' => esc_html__( 'Service Items', 'nonprofit-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );

		$this->add_control(
            'nonprofitservices', [
                'label' => __( 'Create New', 'nonprofit-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ service_title }}}',
                'fields' => [
                    [
                        'name' => 'service_icon',
                        'label' => __( 'Service Icon', 'nonprofit-companion' ),
                        'label_block' => true,
                        'default'     => 'fa fa-gift',
                        'type' => Controls_Manager::ICON,
                        'options' => nonprofit_themify_icon()
                    ],
                    [
                        'name' => 'service_title',
                        'label' => __( 'Service Title', 'nonprofit-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Pure Food & Water', 'nonprofit-companion' ),
                    ],
                    [
                        'name' => 'service_text',
                        'label' => __( 'Service Text', 'nonprofit-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => __( 'Inspires employees and organizations to support causes they care about. We do this to bring more resources to the nonprofits that are', 'nonprofit-companion' ),
                    ],
                ],
                'default'   => [
                    [      
                        'service_icon'    => 'fa fa-gift',
                        'service_title'     => __( 'Pure Food & Water', 'nonprofit-companion' ),
                        'service_text'   => __( 'Inspires employees and organizations to support causes they care about. We do this to bring
                        more resources to the nonprofits that are', 'nonprofit-companion' ),
                    ],
                    [      
                        'service_icon'    => 'fa fa-gift',
                        'service_title'     => __( 'Medicine', 'nonprofit-companion' ),
                        'service_text'   => __( 'Inspires employees and organizations to support causes they care about. We do this to bring
                        more resources to the nonprofits that are', 'nonprofit-companion' ),
                    ],
                    [      
                        'service_icon'    => 'fa fa-gift',
                        'service_title'     => __( 'Education', 'nonprofit-companion' ),
                        'service_text'   => __( 'Inspires employees and organizations to support causes they care about. We do this to bring
                        more resources to the nonprofits that are', 'nonprofit-companion' ),
                    ],
                ]
            ]
		);
		$this->end_controls_section(); // End service content

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
                    '{{WRAPPER}} .servce_area .section_title span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'big_title_col', [
                'label' => __( 'Big Title Color', 'nonprofit-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .servce_area .section_title h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->end_controls_section();

		//------------------------------ Services Item Style ------------------------------
		$this->start_controls_section(
			'style_serv_items_sec', [
				'label' => __( 'Style Single Item', 'nonprofit-companion' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'item_icon_color', [
				'label' => __( 'Icon Color', 'nonprofit-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .servce_area .single_serve .serve_icon' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'item_icon_bg_color', [
				'label' => __( 'Icon Bg Color', 'nonprofit-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .servce_area .single_serve .serve_icon' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'item_title_color', [
				'label' => __( 'Title Color', 'nonprofit-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .servce_area .single_serve h3' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'item_text_color', [
				'label' => __( 'Text Color', 'nonprofit-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .servce_area .single_serve p' => 'color: {{VALUE}};',
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
            'item_hvr_icon_bg_col', [
                'label' => __( 'Item Hover Icon Bg Color', 'nonprofit-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .servce_area .single_serve:hover .serve_icon' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'item_hvr_icon_col', [
                'label' => __( 'Item Hover Icon Color', 'nonprofit-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .servce_area .single_serve:hover .serve_icon' => 'color: {{VALUE}};',
                ],
            ]
        );
		$this->end_controls_section();

	}

	protected function render() {
    $settings       = $this->get_settings();
    $sub_title      = !empty( $settings['sub_title'] ) ? $settings['sub_title'] : '';
    $sec_title      = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $nonprofitservices = !empty( $settings['nonprofitservices'] ) ? $settings['nonprofitservices'] : '';
    $dynamic_class  = is_front_page() ? 'servce_area' : 'servce_area servce_area2';
    ?>

    <!-- servce_area_start -->
    <div class="<?php echo esc_attr( $dynamic_class )?>">
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
                if( is_array( $nonprofitservices ) && count( $nonprofitservices ) > 0 ) {
                    foreach( $nonprofitservices as $service ) {
                        $service_icon     = ( !empty( $service['service_icon'] ) ) ? $service['service_icon'] : '';
                        $service_title     = ( !empty( $service['service_title'] ) ) ? $service['service_title'] : '';
                        $service_text     = ( !empty( $service['service_text'] ) ) ? $service['service_text'] : '';
                        ?>
                        <div class="col-xl-4 col-md-4">
                            <div class="single_serve text-center">
                                <div class="serve_icon">
                                    <i class="<?php echo esc_attr($service_icon)?>"></i>
                                </div>
                                <h3><?php echo esc_html( $service_title )?></h3>
                                <p><?php echo esc_html( $service_text )?> </p>
                            </div>
                        </div>
                        <?php 
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <!-- servce_area_end -->
    <?php
    }
}
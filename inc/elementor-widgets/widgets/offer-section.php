<?php
namespace Montanaelementor\Widgets;

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
 * Montana elementor offer section widget.
 *
 * @since 1.0
 */
class Montana_Offers extends Widget_Base {

	public function get_name() {
		return 'montana-offers';
	}

	public function get_title() {
		return __( 'Offers', 'montana-companion' );
	}

	public function get_icon() {
		return 'eicon-flash';
	}

	public function get_categories() {
		return [ 'montana-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Offer content ------------------------------
		$this->start_controls_section(
			'offers_content',
			[
				'label' => __( 'Offers content', 'montana-companion' ),
			]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'montana-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Our Offers', 'montana-companion' )
            ]
        );

        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'montana-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Ongoing Offers', 'montana-companion' )
            ]
        );

        $this->add_control(
            'offers_inner_settings_seperator',
            [
                'label' => esc_html__( 'Offer Items', 'montana-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );

		$this->add_control(
            'montanaoffers', [
                'label' => __( 'Create Offer', 'montana-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ list_item_1 }}}',
                'fields' => [
                    [
                        'name' => 'offer_img',
                        'label' => __( 'Offer Image', 'montana-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                    ],
                    [
                        'name' => 'item_title',
                        'label' => __( 'Offer Title', 'montana-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => __( 'Up to 35% savings on Club <br>rooms and Suites', 'montana-companion' ),
                    ],
                    [
                        'name' => 'list_item_1',
                        'label' => __( 'List Item 1', 'montana-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Luxaries condition', 'montana-companion' ),
                    ],
                    [
                        'name' => 'list_item_2',
                        'label' => __( 'List Item 2', 'montana-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( '3 Adults & 2 Children size', 'montana-companion' ),
                    ],
                    [
                        'name' => 'list_item_3',
                        'label' => __( 'List Item 3', 'montana-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Sea view side', 'montana-companion' ),
                    ],
                    [
                        'name' => 'anc_text',
                        'label' => __( 'Button Text', 'montana-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'book now', 'montana-companion' ),
                    ],
                    [
                        'name' => 'anc_url',
                        'label' => __( 'Button URL', 'montana-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                    ],
                ],
                'default'   => [
                    [      
                        'offer_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'item_title'   => __( 'Up to 35% savings on Club <br>rooms and Suites', 'montana-companion' ),
                        'list_item_1'  => __( 'Luxaries condition', 'montana-companion' ),
                        'list_item_2'  => __( '3 Adults & 2 Children size', 'montana-companion' ),
                        'list_item_3'  => __( 'Sea view side', 'montana-companion' ),
                        'anc_text'     => __( 'book now', 'montana-companion' ),
                        'anc_url'      => [
                            'url'      => '#'
                        ]
                    ],
                    [      
                        'offer_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'item_title'   => __( 'Up to 35% savings on Club <br>rooms and Suites', 'montana-companion' ),
                        'list_item_1'  => __( '3 Adults & 2 Children size', 'montana-companion' ),
                        'list_item_2'  => __( 'Luxaries condition', 'montana-companion' ),
                        'list_item_3'  => __( 'Sea view side', 'montana-companion' ),
                        'anc_text'     => __( 'book now', 'montana-companion' ),
                        'anc_url'      => [
                            'url'      => '#'
                        ]
                    ],
                    [      
                        'offer_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'item_title'   => __( 'Up to 35% savings on Club <br>rooms and Suites', 'montana-companion' ),
                        'list_item_1'  => __( 'Sea view side', 'montana-companion' ),
                        'list_item_2'  => __( '3 Adults & 2 Children size', 'montana-companion' ),
                        'list_item_3'  => __( 'Luxaries condition', 'montana-companion' ),
                        'anc_text'     => __( 'book now', 'montana-companion' ),
                        'anc_url'      => [
                            'url'      => '#'
                        ]
                    ],
                ]
            ]
		);
		$this->end_controls_section(); // End offer content

    /**
     * Style Tab
     * ------------------------------ Style Section Heading ------------------------------
     *
     */

        $this->start_controls_section(
            'style_offer_section', [
                'label' => __( 'Style Offer Heading', 'montana-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'sub_title_col', [
                'label' => __( 'Sub Title Color', 'montana-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .offers_area .section_title span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sec_title_col', [
                'label' => __( 'Big Title Color', 'montana-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .offers_area .section_title h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

		//------------------------------ Offers Style ------------------------------
		$this->start_controls_section(
			'style_serv_items_sec', [
				'label' => __( 'Style Offers Item', 'montana-companion' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'title_color', [
				'label' => __( 'Title Color', 'montana-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .offers_area .single_offers h3' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'txt_color', [
				'label' => __( 'List Item Color', 'montana-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .offers_area .single_offers ul li' => 'color: {{VALUE}};',
					'{{WRAPPER}} .offers_area .single_offers ul li::before' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_txt_color', [
				'label' => __( 'Button Text & Border Color', 'montana-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .offers_area .single_offers a' => 'color: {{VALUE}};border-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_txt_hover_color', [
				'label' => __( 'Button Hover Text & Border Color', 'montana-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .offers_area .single_offers a:hover' => 'background: {{VALUE}};border-color: {{VALUE}};color: #fff',
				],
			]
		);
		$this->end_controls_section();

	}

	protected function render() {

    $settings       = $this->get_settings();
    $sub_title      = !empty( $settings['sub_title'] ) ? $settings['sub_title'] : '';
    $sec_title      = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $services       = !empty( $settings['montanaoffers'] ) ? $settings['montanaoffers'] : '';
    $dynamic_class  = is_front_page() ? 'offers_area' : 'offers_area padding_top';
    ?>

    <!-- offers_area_start -->
    <div class="<?php echo esc_attr( $dynamic_class )?>">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-100">
                        <span><?php echo esc_html( $sub_title )?></span>
                        <h3><?php echo esc_html( $sec_title )?></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php 
                if( is_array( $services ) && count( $services ) > 0 ) {
                    foreach( $services as $service ) {
                        $item_title = ( !empty( $service['item_title'] ) ) ? $service['item_title'] : '';
                        $offer_img     = !empty( $service['offer_img']['id'] ) ? wp_get_attachment_image( $service['offer_img']['id'], 'montana_offer_thumb_362x350', '', array('alt' => $item_title ) ) : '';
                        $list_item_1 = ( !empty( $service['list_item_1'] ) ) ? $service['list_item_1'] : '';
                        $list_item_2 = ( !empty( $service['list_item_2'] ) ) ? $service['list_item_2'] : '';
                        $list_item_3 = ( !empty( $service['list_item_3'] ) ) ? $service['list_item_3'] : '';
                        $btn_text = ( !empty( $service['anc_text'] ) ) ? $service['anc_text'] : '';
                        $btn_url = ( !empty( $service['anc_url']['url'] ) ) ? $service['anc_url']['url'] : '';
                        ?>
                        <div class="col-xl-4 col-md-4">
                            <div class="single_offers">
                                <div class="about_thumb">
                                    <?php
                                        if ( $offer_img ) {
                                            echo $offer_img;
                                        }
                                    ?>
                                </div>
                                <h3><?php echo nl2br( wp_kses_post($item_title) )?></h3>
                                <ul>
                                    <li><?php echo esc_html( $list_item_1 )?></li>
                                    <li><?php echo esc_html( $list_item_2 )?></li>
                                    <li><?php echo esc_html( $list_item_3 )?></li>
                                </ul>
                                <a href="<?php echo esc_url( $btn_url )?>" class="book_now"><?php echo esc_html( $btn_text )?></a>
                            </div>
                        </div>
                        <?php 
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <!-- offers_area_end -->
    <?php
    }
}
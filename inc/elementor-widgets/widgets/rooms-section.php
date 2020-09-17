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
 * Montana elementor rooms section widget.
 *
 * @since 1.0
 */
class Montana_Rooms extends Widget_Base {

	public function get_name() {
		return 'montana-rooms';
	}

	public function get_title() {
		return __( 'Rooms', 'montana-companion' );
	}

	public function get_icon() {
		return 'eicon-navigator';
	}

	public function get_categories() {
		return [ 'montana-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Room content ------------------------------
		$this->start_controls_section(
			'rooms_content',
			[
				'label' => __( 'Rooms content', 'montana-companion' ),
			]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'montana-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Our Rooms', 'montana-companion' )
            ]
        );

        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'montana-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Ongoing Rooms', 'montana-companion' )
            ]
        );

        $this->add_control(
            'rooms_inner_settings_seperator',
            [
                'label' => esc_html__( 'Room Items', 'montana-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );

		$this->add_control(
            'montanarooms', [
                'label' => __( 'Create New', 'montana-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ item_title }}}',
                'fields' => [
                    [
                        'name' => 'room_img',
                        'label' => __( 'Room Image', 'montana-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                    ],
                    [
                        'name' => 'price_hint',
                        'label' => __( 'Price Hints', 'montana-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'From $250/night', 'montana-companion' ),
                    ],
                    [
                        'name' => 'item_title',
                        'label' => __( 'Room Title', 'montana-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Superior Room', 'montana-companion' ),
                    ],
                    [
                        'name' => 'anc_text',
                        'label' => __( 'Anchor Text', 'montana-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'book now', 'montana-companion' ),
                    ],
                    [
                        'name' => 'anc_url',
                        'label' => __( 'Anchor URL', 'montana-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                    ],
                ],
                'default'   => [
                    [      
                        'room_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'price_hint'   => __( 'From $250/night', 'montana-companion' ),
                        'item_title'   => __( 'Superior Room', 'montana-companion' ),
                        'anc_text'     => __( 'book now', 'montana-companion' ),
                        'anc_url'      => [
                            'url'      => '#'
                        ]
                    ],
                    [      
                        'room_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'price_hint'   => __( 'From $350/night', 'montana-companion' ),
                        'item_title'   => __( 'Deluxe Room', 'montana-companion' ),
                        'anc_text'     => __( 'book now', 'montana-companion' ),
                        'anc_url'      => [
                            'url'      => '#'
                        ]
                    ],
                    [      
                        'room_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'price_hint'   => __( 'From $450/night', 'montana-companion' ),
                        'item_title'   => __( 'Signature Room', 'montana-companion' ),
                        'anc_text'     => __( 'book now', 'montana-companion' ),
                        'anc_url'      => [
                            'url'      => '#'
                        ]
                    ],
                    [      
                        'room_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'price_hint'   => __( 'From $550/night', 'montana-companion' ),
                        'item_title'   => __( 'Couple Room', 'montana-companion' ),
                        'anc_text'     => __( 'book now', 'montana-companion' ),
                        'anc_url'      => [
                            'url'      => '#'
                        ]
                    ],
                ]
            ]
		);
		$this->end_controls_section(); // End room content

    /**
     * Style Tab
     * ------------------------------ Style Section Heading ------------------------------
     *
     */

        $this->start_controls_section(
            'style_room_section', [
                'label' => __( 'Style Room Heading', 'montana-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'sub_title_col', [
                'label' => __( 'Sub Title Color', 'montana-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features_room .section_title span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sec_title_col', [
                'label' => __( 'Big Title Color', 'montana-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features_room .section_title h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

		//------------------------------ Offers Style ------------------------------
		$this->start_controls_section(
			'style_serv_items_sec', [
				'label' => __( 'Style Single Item', 'montana-companion' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'sub_title_color', [
				'label' => __( 'Sub Title Color', 'montana-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .features_room .rooms_here .single_rooms .room_thumb .room_heading span' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'title_color', [
				'label' => __( 'Title Color', 'montana-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .features_room .rooms_here .single_rooms .room_thumb .room_heading h3' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'anc_txt_color', [
				'label' => __( 'Anchor Text Color', 'montana-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .features_room .rooms_here .single_rooms .room_thumb .room_heading a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .features_room .rooms_here .single_rooms .room_thumb .room_heading a::before' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'anc_txt_hvr_color', [
				'label' => __( 'Anchor Text Hover Color', 'montana-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .features_room .rooms_here .single_rooms .room_thumb .room_heading a:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .features_room .rooms_here .single_rooms .room_thumb .room_heading a:hover::before' => 'background: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();

	}

	protected function render() {

    $settings   = $this->get_settings();
    $sub_title  = !empty( $settings['sub_title'] ) ? $settings['sub_title'] : '';
    $sec_title  = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $rooms      = !empty( $settings['montanarooms'] ) ? $settings['montanarooms'] : '';
    ?>


    <!-- features_room_startt -->
    <div class="features_room">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-100">
                        <span><?php echo esc_html( $sub_title )?></span>
                        <h3><?php echo esc_html( $sec_title )?></h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="rooms_here">
            <?php 
            if( is_array( $rooms ) && count( $rooms ) > 0 ) {
                foreach( $rooms as $room ) {
                    $item_title = ( !empty( $room['item_title'] ) ) ? $room['item_title'] : '';
                    $price_hint = ( !empty( $room['price_hint'] ) ) ? $room['price_hint'] : '';
                    $room_img     = !empty( $room['room_img']['id'] ) ? wp_get_attachment_image( $room['room_img']['id'], 'montana_featured_thumb_960x600', '', array('alt' => $item_title ) ) : '';
                    $btn_text = ( !empty( $room['anc_text'] ) ) ? $room['anc_text'] : '';
                    $btn_url = ( !empty( $room['anc_url']['url'] ) ) ? $room['anc_url']['url'] : '';
                    ?>
                    <div class="single_rooms">
                        <div class="room_thumb">
                            <?php
                                if ( $room_img ) {
                                    echo $room_img;
                                }
                            ?>
                            <div class="room_heading d-flex justify-content-between align-items-center">
                                <div class="room_heading_inner">
                                    <span><?php echo esc_html( $price_hint )?></span>
                                    <h3><?php echo esc_html( $item_title )?></h3>
                                </div>
                                <a href="<?php echo esc_url( $btn_url )?>" class="line-button"><?php echo esc_html( $btn_text )?></a>
                            </div>
                        </div>
                    </div>
                    <?php 
                }
            }
            ?>
        </div>
    </div>
    <!-- features_room_end -->
    <?php
    }
}
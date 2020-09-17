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
 * Montana elementor hero section widget.
 *
 * @since 1.0
 */
class Montana_Hero extends Widget_Base {

	public function get_name() {
		return 'montana-hero';
	}

	public function get_title() {
		return __( 'Hero Slider Section', 'montana-companion' );
	}

	public function get_icon() {
		return 'eicon-slider-full-screen';
	}

	public function get_categories() {
		return [ 'montana-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Hero content ------------------------------
		$this->start_controls_section(
			'hero_content',
			[
				'label' => __( 'Hero Slider content', 'montana-companion' ),
			]
        );
		$this->add_control(
            'sliders', [
                'label' => __( 'Create Slider', 'montana-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ sub_title }}}',
                'fields' => [
                    [
                        'name' => 'slider_img',
                        'label' => __( 'Slider Image', 'montana-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                    ],
                    [
                        'name' => 'big_title',
                        'label' => __( 'Big Title', 'montana-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Montana Resort', 'montana-companion' ),
                    ],
                    [
                        'name' => 'sub_title',
                        'label' => __( 'Sub Title', 'montana-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => __( 'Unlock to enjoy the view of Martine', 'montana-companion' ),
                    ],
                ],
                'default'   => [
                    [
                        'slider_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'big_title'     => __( 'Montana Resort', 'montana-companion' ),
                        'sub_title'     => __( 'Unlock to enjoy the view of Martine', 'montana-companion' ),
                    ],
                    [
                        'slider_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'big_title'     => __( 'Life is Beautiful', 'montana-companion' ),
                        'sub_title'     => __( 'Unlock to enjoy the view of Martine', 'montana-companion' ),
                    ],
                    [
                        'slider_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'big_title'     => __( 'Montana Resort', 'montana-companion' ),
                        'sub_title'     => __( 'Unlock to enjoy the view of Martine', 'montana-companion' ),
                    ],
                    [
                        'slider_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'big_title'     => __( 'Life is Beautiful', 'montana-companion' ),
                        'sub_title'     => __( 'Unlock to enjoy the view of Martine', 'montana-companion' ),
                    ],
                ]
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
				'label' => __( 'Style Title', 'montana-companion' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'big_title_col', [
				'label' => __( 'Big Title Color', 'montana-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text h3' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'sub_title_col', [
				'label' => __( 'Sub Title Color', 'montana-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text p' => 'color: {{VALUE}};',
				],
			]
        );
		$this->end_controls_section();
	}

	protected function render() {

    // call load widget script
    $this->load_widget_script();

    $settings = $this->get_settings();
    $sliders = !empty( $settings['sliders'] ) ? $settings['sliders'] : '';
    ?>

    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="slider_active owl-carousel">
            <?php
            if( is_array( $sliders ) && count( $sliders ) > 0 ){
                foreach ( $sliders as $slider ) {
                    $slider_img = !empty( $slider['slider_img']['url'] ) ? $slider['slider_img']['url'] : '';
                    $big_title = !empty( $slider['big_title'] ) ? $slider['big_title'] : '';
                    $sub_title = !empty( $slider['sub_title'] ) ? $slider['sub_title'] : '';
                    ?>
                    <div class="single_slider d-flex align-items-center justify-content-center" <?php echo montana_inline_bg_img( esc_url( $slider_img ) ); ?>>
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="slider_text text-center">
                                        <h3><?php echo esc_html( $big_title )?></h3>
                                        <p><?php echo esc_html( $sub_title )?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
    <!-- slider_area_end --> 
    <?php

    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            // slider-active
            $('.slider_active').owlCarousel({
            loop:true,
            margin:0,
            items:1,
            autoplay:true,
            navText:['<i class="ti-angle-left"></i>','<i class="ti-angle-right"></i>'],
            nav:true,
            dots:false,
            autoplayHoverPause: true,
            autoplaySpeed: 800,
            responsive:{
                0:{
                    items:1,
                    nav:false,
                },
                767:{
                    items:1,
                    nav:false,
                },
                992:{
                    items:1
                }
            }
            });
        })(jQuery);
        </script>
        <?php 
        }
    }	
}

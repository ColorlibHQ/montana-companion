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
 * Montana elementor Slides & Contents section widget.
 *
 * @since 1.0
 */
class Montana_Slides_Contents extends Widget_Base {

	public function get_name() {
		return 'montana-slides-contents';
	}

	public function get_title() {
		return __( 'Slides & Contents', 'montana-companion' );
	}

	public function get_icon() {
		return 'eicon-slider-album';
	}

	public function get_categories() {
		return [ 'montana-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Slides & contents  ------------------------------
		$this->start_controls_section(
			'slides_content',
			[
				'label' => __( 'Slider Contents', 'montana-companion' ),
			]
        );
		$this->add_control(
            'slides_contents', [
                'label' => __( 'Create New', 'montana-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ slide_title }}}',
                'fields' => [
                    [
                        'name' => 'slider_img',
                        'label' => __( 'Slider Image', 'montana-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                    ],
                    [
                        'name' => 'slide_title',
                        'label' => __( 'Slide Title', 'montana-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Sea park', 'montana-companion' ),
                    ],
                ],
                'default'   => [
                    [
                        'slider_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'slide_title'     => __( 'Sea park', 'montana-companion' ),
                    ],
                    [
                        'slider_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'slide_title'     => __( 'Sea park 2', 'montana-companion' ),
                    ],
                    [
                        'slider_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'slide_title'     => __( 'Sea park 3', 'montana-companion' ),
                    ],
                ]
            ]
		);
        $this->end_controls_section(); // End Hero content


        // Slider below contents
        $this->start_controls_section(
			'slider_below_contents',
			[
				'label' => __( 'Slider Below Contents', 'montana-companion' ),
			]
        );

        $this->add_control(
            'left_contents',
            [
                'label' => esc_html__( 'Left Contents', 'montana-companion' ),
                'type' => Controls_Manager::WYSIWYG,
                'label_block' => true,
                'default'   => '<h3>We Serve Fresh and <br>Delicious Food</h3><p>Suscipit libero pretium nullam potenti. Interdum, blandit <br> phasellus consectetuer dolor ornare dapibus enim ut tincidunt <br> rhoncus tellus sollicitudin pede nam maecenas, dolor sem. <br> Neque sollicitudin enim. Dapibus lorem feugiat facilisi <br> faucibus et. Rhoncus.
                </p>',
            ]
        );

        $this->add_control(
            'right_contents',
            [
                'label' => esc_html__( 'Right Contents', 'montana-companion' ),
                'type' => Controls_Manager::WYSIWYG,
                'label_block' => true,
                'default'   => '<h3>We Serve Fresh and <br>Delicious Food</h3><p>Suscipit libero pretium nullam potenti. Interdum, blandit <br> phasellus consectetuer dolor ornare dapibus enim ut tincidunt <br> rhoncus tellus sollicitudin pede nam maecenas, dolor sem. <br> Neque sollicitudin enim. Dapibus lorem feugiat facilisi <br> faucibus et. Rhoncus.
                </p>',
            ]
        );

        $this->end_controls_section(); // End slider below content
	}

	protected function render() {

    // call load widget script
    $this->load_widget_script(); 
    $settings       = $this->get_settings();
    $sliders        = !empty( $settings['slides_contents'] ) ? $settings['slides_contents'] : '';
    $left_contents  = !empty( $settings['left_contents'] ) ? $settings['left_contents'] : '';
    $right_contents = !empty( $settings['right_contents'] ) ? $settings['right_contents'] : '';
    ?>
    
    <!-- about_info_area_start -->
    <div class="about_info_area">
        <div class="about_active owl-carousel">
            <?php
            if( is_array( $sliders ) && count( $sliders ) > 0 ){
                foreach ( $sliders as $slider ) {
                    $slider_img = !empty( $slider['slider_img']['url'] ) ? $slider['slider_img']['url'] : '';
                    $slide_title = !empty( $slider['slide_title'] ) ? $slider['slide_title'] : '';
                    ?>
                    <div class="single_slider" <?php echo montana_inline_bg_img( esc_url( $slider_img ) ); ?>></div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
    <!-- about_info_area_start -->

    <!-- about_main_info_start -->
    <div class="about_main_info">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-md-6">
                    <div class="single_about_info">
                        <?php echo nl2br( wp_kses_post($left_contents) )?>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="single_about_info">
                        <?php echo nl2br( wp_kses_post($right_contents) )?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about_main_info_end -->
    <?php

    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            // about_active
            $('.about_active').owlCarousel({
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

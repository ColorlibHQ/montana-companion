<?php
namespace Montanaelementor\Widgets;

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
 * Montana elementor about us section widget.
 *
 * @since 1.0
 */
class Montana_About_Us extends Widget_Base {

	public function get_name() {
		return 'montana-aboutus';
	}

	public function get_title() {
		return __( 'About Us', 'montana-companion' );
	}

	public function get_icon() {
		return 'eicon-column';
	}

	public function get_categories() {
		return [ 'montana-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  About us content ------------------------------
        $this->start_controls_section(
            'about_content',
            [
                'label' => __( 'About Content', 'montana-companion' ),
            ]
        );
        $this->add_control(
            'select_style',
            [
                'label' => esc_html__( 'Reverse Style', 'montana-companion' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'options'   => [
                    'style_1' => esc_html__( 'No', 'montana-companion' ),
                    'style_2' => esc_html__( 'Yes', 'montana-companion' ),

                ],
                'default' => 'style_1'
            ]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'montana-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'About Company', 'montana-companion' ),
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'montana-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => 'A Luxuries Hotel <br>with Nature',
            ]
        );
        $this->add_control(
            'sec_text',
            [
                'label' => esc_html__( 'Section Text', 'montana-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => esc_html__( 'Suscipit libero pretium nullam potenti. Interdum, blandit phasellus consectetuer dolor ornare dapibus enim ut tincidunt rhoncus tellus sollicitudin pede nam maecenas, dolor sem. Neque sollicitudin enim. Dapibus lorem feugiat facilisi faucibus et. Rhoncus.', 'montana-companion' ),
            ]
        );
        $this->add_control(
            'about_img_1',
            [
                'label' => esc_html__( 'Image 1', 'montana-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $this->add_control(
            'about_img_2',
            [
                'label' => esc_html__( 'Image 2', 'montana-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $this->add_control(
            'btn_text',
            [
                'label' => esc_html__( 'Anchor Text', 'montana-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Learn More', 'montana-companion' ),
            ]
        );
        $this->add_control(
            'btn_url',
            [
                'label' => esc_html__( 'Anchor URL', 'montana-companion' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default'   => [
                    'url'   => '#'
                ],
            ]
        );
        
        $this->end_controls_section(); // End about us content

        //------------------------------ Style title ------------------------------
        
        // Top Section Styles
        $this->start_controls_section(
            'left_sec_style', [
                'label' => __( 'Top Section Styles', 'montana-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
			'sub_title_col', [
				'label' => __( 'Sub title Color', 'montana-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about_area .section_title span' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'sec_title_col', [
				'label' => __( 'Big Title Color', 'montana-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about_area .section_title h3' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'sec_txt_col', [
				'label' => __( 'Text Color', 'montana-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about_area .about_info p' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'button_col', [
				'label' => __( 'Anchor Text Color', 'montana-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about_area .about_info .line-button' => 'color: {{VALUE}};',
					'{{WRAPPER}} .about_area .about_info .line-button::before' => 'background: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'button_hover_col', [
				'label' => __( 'Anchor Text Hover Color', 'montana-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about_area .about_info .line-button:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .about_area .about_info .line-button:hover::before' => 'background: {{VALUE}};',
				],
			]
        );

        $this->end_controls_section();

    }
    
    public function montana_get_about_text_section( $sub_title, $sec_title, $about_text, $anchor_url, $anchor_txt ) {
        ?>
        <div class="col-xl-5 col-lg-5">
            <div class="about_info">
                <div class="section_title mb-20px">
                    <span><?php echo esc_html( $sub_title )?></span>
                    <h3><?php echo wp_kses_post( nl2br($sec_title) )?></h3>
                </div>
                <p><?php echo esc_html( $about_text )?></p>
                <a href="<?php echo esc_url( $anchor_url )?>" class="line-button"><?php echo esc_html( $anchor_txt )?></a>
            </div>
        </div>
        <?php
    }

    public function montana_get_about_img_section( $about_img_1 = '', $about_img_2 = '' ) {
        ?>
        <div class="col-xl-7 col-lg-7">
            <div class="about_thumb d-flex">
                <?php 
                    if ( $about_img_1 ) { 
                        ?>
                        <div class="img_1">
                            <?php echo $about_img_1?>
                        </div>
                        <?php
                    }
                    if ( $about_img_2 ) { 
                        ?>
                        <div class="img_2">
                            <?php echo $about_img_2?>
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
    $section_style  = $settings['select_style'];
    $sub_title      = !empty( $settings['sub_title'] ) ?  $settings['sub_title'] : '';
    $sec_title      = !empty( $settings['sec_title'] ) ?  $settings['sec_title'] : '';
    $about_text     = !empty( $settings['sec_text'] ) ?  $settings['sec_text'] : '';
    $about_img_1    = !empty( $settings['about_img_1']['id'] ) ? wp_get_attachment_image( $settings['about_img_1']['id'], 'montana_about_thumb_652x538', '', array('alt' => $sub_title ) ) : '';
    $about_img_2    = !empty( $settings['about_img_2']['id'] ) ? wp_get_attachment_image( $settings['about_img_2']['id'], 'montana_about_thumb_652x538', '', array('alt' => $sub_title ) ) : '';
    $anchor_txt     = !empty( $settings['btn_text'] ) ?  $settings['btn_text'] : '';
    $anchor_url     = !empty( $settings['btn_url']['url'] ) ?  $settings['btn_url']['url'] : '';
    ?>

    <!-- about_area_start -->
    <div class="about_area">
        <div class="container">
            <div class="row">
                <?php
                    if ( $section_style == 'style_1' ) {
                        $this->montana_get_about_text_section( $sub_title, $sec_title, $about_text, $anchor_url, $anchor_txt );
                        $this->montana_get_about_img_section( $about_img_1, $about_img_2 );
                    } else {
                        $this->montana_get_about_img_section( $about_img_1, $about_img_2 );
                        $this->montana_get_about_text_section( $sub_title, $sec_title, $about_text, $anchor_url, $anchor_txt );
                    }
                ?>
            </div>
        </div>
    </div>
    <!-- about_area_end -->
    <?php

    }
}

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
 * Montana elementor video section widget.
 *
 * @since 1.0
 */
class Montana_Video_Section extends Widget_Base {

	public function get_name() {
		return 'montana-video-section';
	}

	public function get_title() {
		return __( 'Video Section', 'montana-companion' );
	}

	public function get_icon() {
		return 'eicon-play-o';
	}

	public function get_categories() {
		return [ 'montana-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  Video Section content ------------------------------
        $this->start_controls_section(
            'video_content',
            [
                'label' => __( 'Video Content', 'montana-companion' ),
            ]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'montana-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Montana sea view', 'montana-companion' ),
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'montana-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => 'Relax and Enjoy your <br>Vacation',
            ]
        );
        $this->add_control(
            'video_url',
            [
                'label' => esc_html__( 'Popup Video URL', 'montana-companion' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default'   => [
                    'url'   => 'https://www.youtube.com/watch?v=vLnPwxZdW4Y'
                ],
            ]
        );
        $this->add_control(
            'bg_img',
            [
                'label' => esc_html__( 'Background Image', 'montana-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
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
					'{{WRAPPER}} .video_area .video_area_inner span' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'sec_title_col', [
				'label' => __( 'Big Title Color', 'montana-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .video_area .video_area_inner h3' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'play_btn_bg_col', [
				'label' => __( 'Play Button BG Color', 'montana-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .video_area .video_area_inner a' => 'background: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'play_btn_col', [
				'label' => __( 'Play Button BG Color', 'montana-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .video_area .video_area_inner a' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
            'overlay_styles_sep',
            [
                'label' => esc_html__( 'Overlay Styles Section', 'montana-companion' ),
                'type'  => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );

        $this->add_control(
			'bg_overlay_col', [
				'label' => __( 'Background Overlay Color', 'montana-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .video_area.overlay::before' => 'background: {{VALUE}};',
				],
			]
        );

        $this->end_controls_section();

	}

	protected function render() {
        
        
    $settings  = $this->get_settings();
    $sub_title = !empty( $settings['sub_title'] ) ?  $settings['sub_title'] : '';
    $sec_title = !empty( $settings['sec_title'] ) ?  $settings['sec_title'] : '';
    $video_url = !empty( $settings['video_url']['url'] ) ?  $settings['video_url']['url'] : '';
    $bg_img    = !empty( $settings['bg_img']['url'] ) ? $settings['bg_img']['url'] : '';
    ?>

    <!-- video_area_start -->
    <div class="video_area video_bg overlay" <?php echo montana_inline_bg_img( esc_url( $bg_img ) ); ?>>
        <div class="video_area_inner text-center">
            <span><?php echo esc_html( $sub_title )?></span>
            <h3><?php echo wp_kses_post( nl2br($sec_title) )?> </h3>
            <a href="<?php echo esc_url( $video_url )?>" class="video_btn popup-video">
                <i class="fa fa-play"></i>
            </a>
        </div>
    </div>
    <!-- video_area_end -->
    <?php

    }
}

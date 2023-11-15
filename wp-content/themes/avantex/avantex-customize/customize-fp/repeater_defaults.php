<?php
/**
 * Defaults for Theme Customizer repeater.
 *
 * @package avantex
 */

$data_current_avantex_theme = wp_get_theme();
$name_current_avantex_theme = $data_current_avantex_theme->name;


if ( $name_current_avantex_theme == 'Avantex Construction' ) {
	/** SLIDER CUSTOMIZER REPEATER DEFAULT VALUES */
	define(
		'SLIDER_DEFAULTS',
		wp_json_encode(
			array(
				/*Repeater's first item*/
				array(
					'image_url' => AVANTEX_COMPANION_PLUGIN_URL . '/inc/avantex/img/slider/cons-slide1.jpg',
					'title'     => 'Construction',
					'subtitle'  => 'Workshop',
					'text'      => 'Looking for a quality work for your next project?',
					'btntitle'  => 'Explore',
					'link'      => '#',
					'id'        => 'cr_slider_cons_slide_2',
				), // every item in default string should have an unique id, it helps for translation.
			/*Repeater's second item*/
				array(
					'image_url' => AVANTEX_COMPANION_PLUGIN_URL . '/inc/avantex/img/slider/cons-slide2.jpg',
					'title'     => 'Construction',
					'subtitle'  => 'Building at Its Best',
					'text'      => 'Looking for a quality work for your next project?',
					'btntitle'  => 'Explore',
					'link'      => '#',
					'id'        => 'cr_slider_cons_slide_1',
				),
			)
		)
	);
	/** ABOUT DEFAULT VARIABLES */
	define( 'ABOUT_IMAGE', AVANTEX_COMPANION_PLUGIN_URL . 'inc/avantex/img/cons-about.jpg' );
	define( 'ABOUT_TITLE_TAG', 'Welcome to Avantex Construction' );
	define( 'ABOUT_TITLE', 'Company History' );
	define(
		'ABOUT_TEXT',
		'<p class="has-black-color has-text-color"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer at accumsan metus viverra. Integer neque lectus, pellentesque sitesit au dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer at accumsan metus viverra. Integer neque lectus, pellentesque sitesit au dolor. </p>
		<p class="has-black-color has-text-color"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer at accumsan metus viverra. Integer neque lectus, pellentesque sitesit au dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer at accumsan metus viverra. Integer neque lectus, pellentesque sitesit au dolor. </p>
		<p class="has-black-color has-text-color"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer at accumsan metus viverra. Integer neque lectus, pellentesque sitesit au dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer at accumsan metus viverra. Integer neque lectus, pellentesque sitesit au dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer at accumsan metus viverra. Integer neque lectus, pellentesque sitesit au dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer at accumsan metus viverra. Integer neque lectus, pellentesque sitesit au dolor.</p>'
	);
	/** SERVICES CUSTOMIZER REPEATER DEFAULT VALUES */
	define(
		'SERVICES_DEFAULTS',
		wp_json_encode(
			array(
				/*Repeater's first Service*/
				array(
					'choice'     => 'customizer_repeater_image',
					'icon_value' => 'fas fa-square-poll-vertical',
					'image_url'  => AVANTEX_COMPANION_PLUGIN_URL . '/inc/avantex/img/service/service-construction-3.jpg',
					'title'      => 'Constructions',
					'subtitle'   => 'Lorem ipsum dolor sit amet consectetur elit adipiscing praesent pellentesque varius ligula sit eleifend diam cursus nec.',
					'btntitle'   => 'Read More',
					'link'       => '#',
					'id'         => 'cr_serv_cons_1',
				), // every Service in default string should have an unique id, it helps for translation.
				/*Repeater's second Service*/
				array(
					'choice'     => 'customizer_repeater_image',
					'icon_value' => 'fas fa-file-code',
					'image_url'  => AVANTEX_COMPANION_PLUGIN_URL . '/inc/avantex/img/service/service-construction-2.jpg',
					'title'      => 'Interior Design',
					'subtitle'   => 'Lorem ipsum dolor sit amet consectetur elit adipiscing praesent pellentesque varius ligula sit eleifend diam cursus nec.',
					'btntitle'   => 'Read More',
					'link'       => '#',
					'id'         => 'cr_serv_cons_2',
				),
				/*Repeater's Third Service*/
				array(
					'choice'     => 'customizer_repeater_image',
					'icon_value' => 'fas fa-window-restore',
					'image_url'  => AVANTEX_COMPANION_PLUGIN_URL . '/inc/avantex/img/service/service-construction-1.jpg',
					'title'      => 'Renovation',
					'subtitle'   => 'Lorem ipsum dolor sit amet consectetur elit adipiscing praesent pellentesque varius ligula sit eleifend diam cursus nec.',
					'btntitle'   => 'Read More',
					'link'       => '#',
					'id'         => 'cr_serv_cons_3',
				),
			)
		)
	);
	/** PORTFOLIO_DEFAULTS CUSTOMIZER REPEATER DEFAULT VALUES */
	define(
		'PORTFOLIO_DEFAULTS',
		wp_json_encode(
			array(
				/* Repeater's first portfolio */
				array(
					'image_url' => AVANTEX_COMPANION_PLUGIN_URL . '/inc/avantex/img/portfolio/portfolio-construction-1.jpg',
					'title'     => '',
					'subtitle'  => 'GLOSS CREAM',
					'link'      => '#',
					'link2'     => '#',
					'id'        => 'cr_portfolio_cons_1',
				), // every portfolio in default string should have an unique id, it helps for translation.
			/* Repeater's second portfolio */
				array(
					'image_url' => AVANTEX_COMPANION_PLUGIN_URL . '/inc/avantex/img/portfolio/portfolio-construction-2.jpg',
					'title'     => '',
					'subtitle'  => 'SHAKER CLASSIC',
					'link'      => '#',
					'link2'     => '#',
					'id'        => 'cr_portfolio_cons_2',
				),
				/* Repeater's Third portfolio */
				array(
					'image_url' => AVANTEX_COMPANION_PLUGIN_URL . '/inc/avantex/img/portfolio/portfolio-construction-3.jpg',
					'title'     => '',
					'subtitle'  => 'SAVANAH WALNUT',
					'link'      => '#',
					'link2'     => '#',
					'id'        => 'cr_portfolio_cons_3',
				),
			)
		)
	);
	/** TEAM_DEFAULTS CUSTOMIZER REPEATER DEFAULT VALUES */

	define(
		'TEAM_SR_DEFAULTS',
		'[{&quot;icon&quot;:&quot;fa-brands fa-facebook&quot;,&quot;link&quot;:&quot;#&quot;,&quot;id&quot;:&quot;customizer-repeater-social-repeater-6317390b67c40&quot;},{&quot;icon&quot;:&quot;fa-brands fa-twitter&quot;,&quot;link&quot;:&quot;#&quot;,&quot;id&quot;:&quot;customizer-repeater-social-repeater-63173a9132e14&quot;},{&quot;icon&quot;:&quot;fa-brands fa-linkedin-in&quot;,&quot;link&quot;:&quot;#&quot;,&quot;id&quot;:&quot;customizer-repeater-social-repeater-6317422a80a22&quot;},{&quot;icon&quot;:&quot;fa-brands fa-instagram&quot;,&quot;link&quot;:&quot;#&quot;,&quot;id&quot;:&quot;customizer-repeater-social-repeater-6317422a80a22&quot;}]'
	);

	define(
		'TEAM_DEFAULTS',
		wp_json_encode(
			array(
				/* Repeater's first team */
				array(
					'image_url'       => AVANTEX_COMPANION_PLUGIN_URL . '/inc/avantex/img/team/team-construction-1.jpg',
					'title'           => 'Project Manager',
					'subtitle'        => 'George Big',
					'social_repeater' => TEAM_SR_DEFAULTS,
					'id'              => 'cr_team_cons_1',
				), // every team in default string should have an unique id, it helps for translation.
			/* Repeater's second team */
				array(
					'image_url'       => AVANTEX_COMPANION_PLUGIN_URL . '/inc/avantex/img/team/team-construction-2.jpg',
					'title'           => 'Quality Manager',
					'subtitle'        => 'John Doe',
					'social_repeater' => TEAM_SR_DEFAULTS,
					'id'              => 'cr_team_cons_2',
				),
				/* Repeater's Third team */
				array(
					'image_url'       => AVANTEX_COMPANION_PLUGIN_URL . '/inc/avantex/img/team/team-construction-3.jpg',
					'title'           => 'CEO',
					'subtitle'        => 'Steve Boss',
					'social_repeater' => TEAM_SR_DEFAULTS,
					'id'              => 'cr_team_cons_3',
				),
				/* Repeater's fourth team */
				array(
					'image_url'       => AVANTEX_COMPANION_PLUGIN_URL . '/inc/avantex/img/team/team-construction-4.jpg',
					'title'           => 'Sales',
					'subtitle'        => 'Paul Sold',
					'social_repeater' => TEAM_SR_DEFAULTS,
					'id'              => 'cr_team_cons_4',
				),
			)
		)
	);
	/** TESTIMONIAL DEFAULTS FOR CUSTOMIZER REPEATER */
	define(
		'TESTIMONIAL_DEFAULTS',
		wp_json_encode(
			array(
				/* Repeater's first Testimonial */
				array(
					'image_url' => AVANTEX_COMPANION_PLUGIN_URL . '/inc/avantex/img/testimonial/author-1.jpg',
					'title'     => 'Creative & Professional',
					'subtitle'  => 'It is a long established fact that a reader ill be distracted by the readable content of a page when looking at its layout.',
					'btntitle'  => 'Annah Montana',
					'shortcode' => 'Ceo xyz',
					'id'        => 'cr_Testimonial_cons_1',
				), // every Testimonial in default string should have an unique id, it helps for translation.
			/* Repeater's second Testimonial */
				array(
					'image_url' => AVANTEX_COMPANION_PLUGIN_URL . '/inc/avantex/img/testimonial/author-2.jpg',
					'title'     => 'I highly recommend',
					'subtitle'  => 'It is a long established fact that a reader ill be distracted by the readable content of a page when looking at its layout.',
					'btntitle'  => 'Jenifer Albert',
					'shortcode' => 'Founder abc firm ',
					'id'        => 'cr_Testimonial_cons_2',
				),
				/* Repeater's third Testimonial */
				array(
					'image_url' => AVANTEX_COMPANION_PLUGIN_URL . '/inc/avantex/img/testimonial/author-2.jpg',
					'title'     => 'Must consult',
					'subtitle'  => 'It is a long established fact that a reader ill be distracted by the readable content of a page when looking at its layout.',
					'btntitle'  => 'Sonya Smith',
					'shortcode' => 'Founder',
					'id'        => 'cr_Testimonial_cons_3',
				),
			)
		)
	);
	/** FUNFACT_DEFAULTS DEFAULTS FOR CUSTOMIZER REPEATER */
	define(
		'FUNFACT_DEFAULTS',
		wp_json_encode(
			array(
				/* Repeater's first Funfact */
				array(
					'icon_value' => 'fa-regular fa-circle',
					'title'      => 'Satisfied Customers',
					'subtitle'   => '965',
					'id'         => 'cr_Funfact_cons_1',
				), // every Funfact in default string should have an unique id, it helps for translation.
			/* Repeater's second Funfact */
				array(
					'icon_value' => 'fas fa-duotone fa-diagram-project',
					'title'      => 'Project Planning',
					'subtitle'   => '365',
					'id'         => 'cr_Funfact_cons_2',
				),
				/* Repeater's third Funfact */
				array(
					'icon_value' => 'fa-regular fa-object-group',
					'title'      => 'Interior Design',
					'subtitle'   => '450',
					'id'         => 'cr_Funfact_cons_3',
				),
				/** Repeater's fourth funfact */
				array(
					'icon_value' => 'fa fa-beer-mug-empty',
					'title'      => 'Cups of Coffee',
					'subtitle'   => '585',
					'id'         => 'cr_Funfact_cons_3',
				),
			)
		)
	);
	/** SPONSORS_DEFAULT DEFAULTS FOR CUSTOMIZER REPEATER */
	define(
		'SPONSORS_DEFAULT',
		wp_json_encode(
			array(
				/* Repeater's first sponsors */
				array(
					'image_url' => AVANTEX_COMPANION_PLUGIN_URL . '/inc/avantex/img/clients/client-construction-1.png',
					'title'     => 'Qatar',
					'link'      => '#',
					'id'        => 'cr_sponsors_1',
				), // every sponsors in default string should have an unique id, it helps for translation.
			/* Repeater's second sponsors */
				array(
					'image_url' => AVANTEX_COMPANION_PLUGIN_URL . '/inc/avantex/img/clients/client-construction-2.png',
					'title'     => 'Car Sport',
					'link'      => '#',
					'id'        => 'cr_sponsors_2',
				),
				/* Repeater's Third sponsors */
				array(
					'image_url' => AVANTEX_COMPANION_PLUGIN_URL . '/inc/avantex/img/clients/client-construction-3.png',
					'title'     => 'Genshin',
					'link'      => '#',
					'id'        => 'cr_sponsors_3',
				),
			)
		)
	);
	// DEFAULT THEME DATA PARENT.
} elseif ( $name_current_avantex_theme == 'Avantex Automobile' ) {
	/** AUTOMOBILE : SLIDER CUSTOMIZER REPEATER DEFAULT VALUES */
	define(
		'SLIDER_DEFAULTS',
		wp_json_encode(
			array(
				/*Repeater's first item*/
				array(
					'image_url' => AVANTEX_COMPANION_PLUGIN_URL . '/inc/avantex/img/slider/auto-slide1.png',
					'title'     => 'Welcome to powerful theme',
					'subtitle'  => 'The Avantex Creative Business',
					'text'      => 'Take Your Business To New Heights & Build The Business Of Your Dreams',
					'btntitle'  => 'Discover More',
					'link'      => '#',
					'id'        => 'cr_slider_auto_slide_1',
				), // every item in default string should have an unique id, it helps for translation.
			/*Repeater's second item*/
				array(
					'image_url' => AVANTEX_COMPANION_PLUGIN_URL . '/inc/avantex/img/slider/auto-slide2.png',
					'title'     => 'The Avantex Creative Business',
					'subtitle'  => 'AI Automotive Industry',
					'text'      => 'Stay ahead of the game with the newest cars on the market. ',
					'btntitle'  => 'Discover More',
					'link'      => '#',
					'id'        => 'cr_slider_auto_slide_2',
				),
			)
		)
	);
	/** AUTOMOBILE : ABOUT DEFAULT VARIABLES */
	define( 'ABOUT_IMAGE', AVANTEX_COMPANION_PLUGIN_URL . 'inc/avantex/img/auto-about.png' );
	define( 'ABOUT_TITLE_TAG', 'About Us' );
	define( 'ABOUT_TITLE', 'SMART CAR DRIVING TECHNOLOGY' );
	define(
		'ABOUT_TEXT',
		'<p class="has-black-color has-text-color"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer at accumsan metus viverra. Integer neque lectus, pellentesque sitesit au dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer at accumsan metus viverra. Integer neque lectus, pellentesque sitesit au dolor. </p>
		<p class="has-black-color has-text-color"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer at accumsan metus viverra. Integer neque lectus, pellentesque sitesit au dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer at accumsan metus viverra. Integer neque lectus, pellentesque sitesit au dolor. </p>'
	);
	/** AUTOMOBILE : SERVICES CUSTOMIZER REPEATER DEFAULT VALUES */
	define(
		'SERVICES_DEFAULTS',
		wp_json_encode(
			array(
				/*Repeater's first Service*/
				array(
					'choice'     => 'customizer_repeater_image',
					'icon_value' => 'fas fa-square-poll-vertical',
					'image_url'  => AVANTEX_COMPANION_PLUGIN_URL . '/inc/avantex/img/service/service-auto1.jpg',
					'title'      => 'Mod',
					'subtitle'   => 'Lorem ipsum dolor sit amet consectetur elit.',
					'btntitle'   => 'Read More',
					'link'       => '#',
					'id'         => 'cr_serv_auto_1',
				), // every Service in default string should have an unique id, it helps for translation.
				/*Repeater's second Service*/
				array(
					'choice'     => 'customizer_repeater_image',
					'icon_value' => 'fas fa-file-code',
					'image_url'  => AVANTEX_COMPANION_PLUGIN_URL . '/inc/avantex/img/service/service-auto2.jpg',
					'title'      => 'Design',
					'subtitle'   => 'Lorem ipsum dolor sit amet consectetur elit.',
					'btntitle'   => 'Read More',
					'link'       => '#',
					'id'         => 'cr_serv_auto_2',
				),
				/*Repeater's Third Service*/
				array(
					'choice'     => 'customizer_repeater_image',
					'icon_value' => 'fas fa-window-restore',
					'image_url'  => AVANTEX_COMPANION_PLUGIN_URL . '/inc/avantex/img/service/service-auto3.jpg',
					'title'      => 'Renovate',
					'subtitle'   => 'Lorem ipsum dolor sit amet consectetur elit.',
					'btntitle'   => 'Read More',
					'link'       => '#',
					'id'         => 'cr_serv_auto_3',
				),
			)
		)
	);
	/** AUTOMOBILE : PORTFOLIO_DEFAULTS CUSTOMIZER REPEATER DEFAULT VALUES */
	define(
		'PORTFOLIO_DEFAULTS',
		wp_json_encode(
			array(
				/* Repeater's first portfolio */
				array(
					'image_url' => AVANTEX_COMPANION_PLUGIN_URL . '/inc/avantex/img/portfolio/portfolio-auto1.jpg',
					'title'     => 'Factory',
					'subtitle'  => 'Refining OIL',
					'link'      => '#',
					'link2'     => '#',
					'id'        => 'cr_portfolio_auto_1',
				), // every portfolio in default string should have an unique id, it helps for translation.
			/* Repeater's second portfolio */
				array(
					'image_url' => AVANTEX_COMPANION_PLUGIN_URL . '/inc/avantex/img/portfolio/portfolio-auto2.jpg',
					'title'     => 'Chemical',
					'subtitle'  => 'Rock Material',
					'link'      => '#',
					'link2'     => '#',
					'id'        => 'cr_portfolio_auto_2',
				),
				/* Repeater's Third portfolio */
				array(
					'image_url' => AVANTEX_COMPANION_PLUGIN_URL . '/inc/avantex/img/portfolio/portfolio-auto3.jpg',
					'title'     => 'Construction Machinery',
					'subtitle'  => 'Rock Mechenics',
					'link'      => '#',
					'link2'     => '#',
					'id'        => 'cr_portfolio_auto_3',
				),
			)
		)
	);
	/** AUTOMOBILE : TEAM_DEFAULTS CUSTOMIZER REPEATER DEFAULT VALUES */

	define(
		'TEAM_SR_DEFAULTS',
		'[{&quot;icon&quot;:&quot;fa-brands fa-facebook&quot;,&quot;link&quot;:&quot;#&quot;,&quot;id&quot;:&quot;customizer-repeater-social-repeater-6317390b67c40&quot;},{&quot;icon&quot;:&quot;fa-brands fa-twitter&quot;,&quot;link&quot;:&quot;#&quot;,&quot;id&quot;:&quot;customizer-repeater-social-repeater-63173a9132e14&quot;},{&quot;icon&quot;:&quot;fa-brands fa-linkedin-in&quot;,&quot;link&quot;:&quot;#&quot;,&quot;id&quot;:&quot;customizer-repeater-social-repeater-6317422a80a22&quot;},{&quot;icon&quot;:&quot;fa-brands fa-instagram&quot;,&quot;link&quot;:&quot;#&quot;,&quot;id&quot;:&quot;customizer-repeater-social-repeater-6317422a80a22&quot;}]'
	);

	define(
		'TEAM_DEFAULTS',
		wp_json_encode(
			array(
				/* Repeater's first team */
				array(
					'image_url'       => AVANTEX_COMPANION_PLUGIN_URL . '/inc/avantex/img/team/team-auto-1.jpg',
					'title'           => 'Business Analysis',
					'subtitle'        => 'Rene B.CRUZ',
					'social_repeater' => TEAM_SR_DEFAULTS,
					'id'              => 'cr_team_auto_1',
				), // every team in default string should have an unique id, it helps for translation.
			/* Repeater's second team */
				array(
					'image_url'       => AVANTEX_COMPANION_PLUGIN_URL . '/inc/avantex/img/team/team-auto-2.jpg',
					'title'           => 'Creative Expert',
					'subtitle'        => 'LILI ALBERT',
					'social_repeater' => TEAM_SR_DEFAULTS,
					'id'              => 'cr_team_auto_2',
				),
				/* Repeater's Third team */
				array(
					'image_url'       => AVANTEX_COMPANION_PLUGIN_URL . '/inc/avantex/img/team/team-auto-3.jpg',
					'title'           => 'UI Developper',
					'subtitle'        => 'Olivia Travis',
					'social_repeater' => TEAM_SR_DEFAULTS,
					'id'              => 'cr_team_auto_3',
				),
				/* Repeater's fourth team */
				array(
					'image_url'       => AVANTEX_COMPANION_PLUGIN_URL . '/inc/avantex/img/team/team-auto-4.jpg',
					'title'           => 'Designer',
					'subtitle'        => 'Bela Alaxander',
					'social_repeater' => TEAM_SR_DEFAULTS,
					'id'              => 'cr_team_auto_4',
				),
			)
		)
	);
	/** AUTOMOBILE : TESTIMONIAL DEFAULTS FOR CUSTOMIZER REPEATER */
	define(
		'TESTIMONIAL_DEFAULTS',
		wp_json_encode(
			array(
				/* Repeater's first Testimonial */
				array(
					'image_url' => AVANTEX_COMPANION_PLUGIN_URL . '/inc/avantex/img/testimonial/author-1.jpg',
					'title'     => 'Creative & Professional',
					'subtitle'  => 'It is a long established fact that a reader ill be distracted by the readable content of a page when looking at its layout.',
					'btntitle'  => 'Annah Montana',
					'shortcode' => 'Ceo xyz',
					'id'        => 'cr_Testimonial_auto_1',
				), // every Testimonial in default string should have an unique id, it helps for translation.
			/* Repeater's second Testimonial */
				array(
					'image_url' => AVANTEX_COMPANION_PLUGIN_URL . '/inc/avantex/img/testimonial/author-2.jpg',
					'title'     => 'I highly recommend',
					'subtitle'  => 'It is a long established fact that a reader ill be distracted by the readable content of a page when looking at its layout.',
					'btntitle'  => 'Jenifer Albert',
					'shortcode' => 'Founder abc firm ',
					'id'        => 'cr_Testimonial_auto_2',
				),
				/* Repeater's third Testimonial */
				array(
					'image_url' => AVANTEX_COMPANION_PLUGIN_URL . '/inc/avantex/img/testimonial/author-2.jpg',
					'title'     => 'Must consult',
					'subtitle'  => 'It is a long established fact that a reader ill be distracted by the readable content of a page when looking at its layout.',
					'btntitle'  => 'Sonya Smith',
					'shortcode' => 'Founder',
					'id'        => 'cr_Testimonial_auto_3',
				),
			)
		)
	);
	/**AUTOMOBILE : FUNFACT_DEFAULTS DEFAULTS FOR CUSTOMIZER REPEATER */
	define(
		'FUNFACT_DEFAULTS',
		wp_json_encode(
			array(
				/* Repeater's first Funfact */
				array(
					'icon_value' => 'fas fa-thin fa-bolt',
					'title'      => 'Automotive',
					'subtitle'   => '1530',
					'id'         => 'cr_Funfact_auto_1',
				), // every Funfact in default string should have an unique id, it helps for translation.
			/* Repeater's second Funfact */
				array(
					'icon_value' => 'fas fa-thin fa-location-dot',
					'title'      => 'GPS Tracking',
					'subtitle'   => '365',
					'id'         => 'cr_Funfact_auto_2',
				),
				/* Repeater's third Funfact */
				array(
					'icon_value' => 'fas fa-thin fa-language',
					'title'      => 'Languages',
					'subtitle'   => '20',
					'id'         => 'cr_Funfact_auto_3',
				),
				/** Repeater's fourth funfact */
				array(
					'icon_value' => 'fas fa-thin fa-mobile-screen-button',
					'title'      => 'Mobile App',
					'subtitle'   => '1120',
					'id'         => 'cr_Funfact_auto_3',
				),
			)
		)
	);
	/** AUTOMOBILE : SPONSORS_DEFAULT DEFAULTS FOR CUSTOMIZER REPEATER  */
	define(
		'SPONSORS_DEFAULT',
		wp_json_encode(
			array(
				/* Repeater's first sponsors */
				array(
					'image_url' => AVANTEX_COMPANION_PLUGIN_URL . '/inc/avantex/img/clients/client-auto1.png',
					'title'     => 'BMW',
					'link'      => '#',
					'id'        => 'cr_sponsors_1',
				), // every sponsors in default string should have an unique id, it helps for translation.
			/* Repeater's second sponsors */
				array(
					'image_url' => AVANTEX_COMPANION_PLUGIN_URL . '/inc/avantex/img/clients/client-auto2.png',
					'title'     => 'SKODA',
					'link'      => '#',
					'id'        => 'cr_sponsors_2',
				),
				/* Repeater's Third sponsors */
				array(
					'image_url' => AVANTEX_COMPANION_PLUGIN_URL . '/inc/avantex/img/clients/client-auto3.png',
					'title'     => 'MG',
					'link'      => '#',
					'id'        => 'cr_sponsors_3',
				),
				/* Repeater's Fourth sponsors */
				array(
					'image_url' => AVANTEX_COMPANION_PLUGIN_URL . '/inc/avantex/img/clients/client-auto4.png',
					'title'     => 'VW',
					'link'      => '#',
					'id'        => 'cr_sponsors_4',
				),
			)
		)
	);
	// DEFAULT THEME DATA AUTOMOBILE.
} else {
	/** SLIDER CUSTOMIZER REPEATER DEFAULT VALUES - PARENT THEME */
	define(
		'SLIDER_DEFAULTS',
		wp_json_encode(
			array(
				/*Repeater's first item*/
				array(
					'image_url' => AVANTEX_COMPANION_PLUGIN_URL . '/inc/avantex/img/slider/slide2.jpg',
					'title'     => 'Changes overtime',
					'subtitle'  => 'Ideas into reality',
					'text'      => 'From mere thoughts to tangible achievements',
					'btntitle'  => 'Lets Bring it',
					'link'      => '#',
					'id'        => 'cr_slider_slide_2',
				), // every item in default string should have an unique id, it helps for translation.
			/*Repeater's second item*/
				array(
					'image_url' => AVANTEX_COMPANION_PLUGIN_URL . '/inc/avantex/img/slider/slide1.jpg',
					'title'     => 'Service on demand',
					'subtitle'  => 'Noticing Consumer Needs',
					'text'      => 'Improvements based on feedbacks',
					'btntitle'  => 'Be Our Guest',
					'link'      => '#',
					'id'        => 'cr_slider_slide_1',
				),
			)
		)
	);
	/** ABOUT DEFAULT VALUES */
	define( 'ABOUT_IMAGE', AVANTEX_COMPANION_PLUGIN_URL . 'inc/avantex/img/about.jpg' );
	define( 'ABOUT_TITLE_TAG', 'WELCOME TO AVANTEX' );
	define( 'ABOUT_TITLE', 'BUSINESS SERVICES YOUR FUTURE SUCCESS' );
	define(
		'ABOUT_TEXT',
		'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.Sed ut perspiciatis unde omnis iste natus error sit volup tatem accusan tium dolor emque totam rem.'
	);
	/** SERVICES CUSTOMIZER REPEATER DEFAULT VALUES */
	define(
		'SERVICES_DEFAULTS',
		wp_json_encode(
			array(
				/*Repeater's first Service*/
				array(
					'choice'     => 'customizer_repeater_icon',
					'icon_value' => 'fas fa-square-poll-vertical',
					'title'      => 'Marketing &amp; SEO services',
					'subtitle'   => 'Strategies to improve your online presence, increase traffic to your website, and boost your search engine rankings.',
					'btntitle'   => 'Read More',
					'link'       => '#',
					'id'         => 'cr_serv_1',
				), // every Service in default string should have an unique id, it helps for translation.
				/*Repeater's second Service*/
				array(
					'choice'     => 'customizer_repeater_icon',
					'icon_value' => 'fas fa-file-code',
					'title'      => 'Web design &amp; development',
					'subtitle'   => 'Professional design and development services to create a stunning and effective website that meets your business needs.',
					'btntitle'   => 'Read More',
					'link'       => '#',
					'id'         => 'cr_serv_2',
				),
				/*Repeater's Third Service*/
				array(
					'choice'     => 'customizer_repeater_icon',
					'icon_value' => 'fas fa-window-restore',
					'title'      => 'Graphic design &amp; branding',
					'subtitle'   => 'Eye-catching design and branding services to make your business stand out and leave an ever lasting impression.',
					'btntitle'   => 'Read More',
					'link'       => '#',
					'id'         => 'cr_serv_3',
				),
			)
		)
	);
	/** PORTFOLIO_DEFAULTS CUSTOMIZER REPEATER DEFAULT VALUES */
	define(
		'PORTFOLIO_DEFAULTS',
		wp_json_encode(
			array(
				/* Repeater's first portfolio */
				array(
					'image_url' => AVANTEX_COMPANION_PLUGIN_URL . '/inc/avantex/img/portfolio/project-1.jpg',
					'title'     => 'Financial Services Website',
					'subtitle'  => 'UI & UX Design',
					'link'      => '#',
					'link2'     => '#',
					'id'        => 'cr_portfolio_1',
				), // every portfolio in default string should have an unique id, it helps for translation.
			/* Repeater's second portfolio */
				array(
					'image_url' => AVANTEX_COMPANION_PLUGIN_URL . '/inc/avantex/img/portfolio/project-2.jpg',
					'title'     => 'E-commerce site Supply Retailer',
					'subtitle'  => 'E-commerce',
					'link'      => '#',
					'link2'     => '#',
					'id'        => 'cr_portfolio_2',
				),
				/* Repeater's Third portfolio */
				array(
					'image_url' => AVANTEX_COMPANION_PLUGIN_URL . '/inc/avantex/img/portfolio/project-3.jpg',
					'title'     => 'Blog Content Lifestyle Brand',
					'subtitle'  => 'Web Creation',
					'link'      => '#',
					'link2'     => '#',
					'id'        => 'cr_portfolio_3',
				),
			)
		)
	);
	/** TEAM_DEFAULTS CUSTOMIZER REPEATER DEFAULT VALUES */

	define(
		'TEAM_SR_DEFAULTS',
		'[{&quot;icon&quot;:&quot;fa-brands fa-facebook&quot;,&quot;link&quot;:&quot;#&quot;,&quot;id&quot;:&quot;customizer-repeater-social-repeater-6317390b67c40&quot;},{&quot;icon&quot;:&quot;fa-brands fa-twitter&quot;,&quot;link&quot;:&quot;#&quot;,&quot;id&quot;:&quot;customizer-repeater-social-repeater-63173a9132e14&quot;},{&quot;icon&quot;:&quot;fa-brands fa-linkedin-in&quot;,&quot;link&quot;:&quot;#&quot;,&quot;id&quot;:&quot;customizer-repeater-social-repeater-6317422a80a22&quot;},{&quot;icon&quot;:&quot;fa-brands fa-instagram&quot;,&quot;link&quot;:&quot;#&quot;,&quot;id&quot;:&quot;customizer-repeater-social-repeater-6317422a80a22&quot;}]'
	);

	define(
		'TEAM_DEFAULTS',
		wp_json_encode(
			array(
				/* Repeater's first team */
				array(
					'image_url'       => AVANTEX_COMPANION_PLUGIN_URL . '/inc/avantex/img/team/team1.jpg',
					'title'           => 'UI Designer',
					'subtitle'        => 'David Wilson',
					'social_repeater' => TEAM_SR_DEFAULTS,
					'id'              => 'cr_team_1',
				), // every team in default string should have an unique id, it helps for translation.
			/* Repeater's second team */
				array(
					'image_url'       => AVANTEX_COMPANION_PLUGIN_URL . '/inc/avantex/img/team/team2.jpg',
					'title'           => 'Founder & CEO',
					'subtitle'        => 'Jane Smith',
					'social_repeater' => TEAM_SR_DEFAULTS,
					'id'              => 'cr_team_2',
				),
				/* Repeater's Third team */
				array(
					'image_url'       => AVANTEX_COMPANION_PLUGIN_URL . '/inc/avantex/img/team/team3.jpg',
					'title'           => 'Director',
					'subtitle'        => 'Owen Robert',
					'social_repeater' => TEAM_SR_DEFAULTS,
					'id'              => 'cr_team_3',
				),
				/* Repeater's fourth team */
				array(
					'image_url'       => AVANTEX_COMPANION_PLUGIN_URL . '/inc/avantex/img/team/team4.jpg',
					'title'           => 'UI Developper',
					'subtitle'        => 'Olivia Travis',
					'social_repeater' => TEAM_SR_DEFAULTS,
					'id'              => 'cr_team_4',
				),
			)
		)
	);
	/** TESTIMONIAL DEFAULTS FOR CUSTOMIZER REPEATER */
	define(
		'TESTIMONIAL_DEFAULTS',
		wp_json_encode(
			array(
				/* Repeater's first Testimonial */
				array(
					'image_url' => AVANTEX_COMPANION_PLUGIN_URL . '/inc/avantex/img/testimonial/author-1.jpg',
					'title'     => 'Creative & Professional',
					'subtitle'  => 'It is a long established fact that a reader ill be distracted by the readable content of a page when looking at its layout.',
					'btntitle'  => 'Annah Montana',
					'shortcode' => 'Ceo xyz',
					'id'        => 'cr_Testimonial_1',
				), // every Testimonial in default string should have an unique id, it helps for translation.
			/* Repeater's second Testimonial */
				array(
					'image_url' => AVANTEX_COMPANION_PLUGIN_URL . '/inc/avantex/img/testimonial/author-2.jpg',
					'title'     => 'I highly recommend',
					'subtitle'  => 'It is a long established fact that a reader ill be distracted by the readable content of a page when looking at its layout.',
					'btntitle'  => 'Jenifer Albert',
					'shortcode' => 'Founder abc firm ',
					'id'        => 'cr_Testimonial_2',
				),
				/* Repeater's third Testimonial */
				array(
					'image_url' => AVANTEX_COMPANION_PLUGIN_URL . '/inc/avantex/img/testimonial/author-2.jpg',
					'title'     => 'Must consult',
					'subtitle'  => 'It is a long established fact that a reader ill be distracted by the readable content of a page when looking at its layout.',
					'btntitle'  => 'Sonya Smith',
					'shortcode' => 'Founder',
					'id'        => 'cr_Testimonial_3',
				),
			)
		)
	);
	/** FUNFACT_DEFAULTS DEFAULTS FOR CUSTOMIZER REPEATER */
	define(
		'FUNFACT_DEFAULTS',
		wp_json_encode(
			array(
				/* Repeater's first Funfact */
				array(
					'icon_value' => 'fas fa-square-poll-vertical',
					'title'      => 'Satisfied Customers',
					'subtitle'   => '965',
					'id'         => 'cr_Funfact_1',
				), // every Funfact in default string should have an unique id, it helps for translation.
			/* Repeater's second Funfact */
				array(
					'icon_value' => 'fa fa-passport',
					'title'      => 'Finish Projects',
					'subtitle'   => '365',
					'id'         => 'cr_Funfact_2',
				),
				/* Repeater's third Funfact */
				array(
					'icon_value' => 'fa fa-file-code',
					'title'      => 'Working Days',
					'subtitle'   => '450',
					'id'         => 'cr_Funfact_3',
				),
				/** Repeater's fourth funfact */
				array(
					'icon_value' => 'fa fa-beer-mug-empty',
					'title'      => 'Cups of Coffee',
					'subtitle'   => '585',
					'id'         => 'cr_Funfact_3',
				),
			)
		)
	);
	/** SPONSORS_DEFAULT DEFAULTS FOR CUSTOMIZER REPEATER */
	define(
		'SPONSORS_DEFAULT',
		wp_json_encode(
			array(
				/* Repeater's first sponsors */
				array(
					'image_url' => AVANTEX_COMPANION_PLUGIN_URL . '/inc/avantex/img/clients/client-1.png',
					'title'     => 'Qatar',
					'link'      => '#',
					'id'        => 'cr_sponsors_1',
				), // every sponsors in default string should have an unique id, it helps for translation.
			/* Repeater's second sponsors */
				array(
					'image_url' => AVANTEX_COMPANION_PLUGIN_URL . '/inc/avantex/img/clients/client-2.png',
					'title'     => 'Car Sport',
					'link'      => '#',
					'id'        => 'cr_sponsors_2',
				),
				/* Repeater's Third sponsors */
				array(
					'image_url' => AVANTEX_COMPANION_PLUGIN_URL . '/inc/avantex/img/clients/client-3.png',
					'title'     => 'Genshin',
					'link'      => '#',
					'id'        => 'cr_sponsors_3',
				),
			)
		)
	);
}

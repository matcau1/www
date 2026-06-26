<?php
namespace WLElementor\Widget;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Utils;

/**
 * WL Elementor Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class WlBlogV1 extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve WL Elementor widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'wl-blog-v1';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve WL Elementor widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'WL Blog V1', 'wl-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve WL Slider widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-posts-grid';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the WL Slider widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'wl-theme-core' ];
	}

	public function get_keywords() {
		return [ 'WL Blog V1' ];
	}

	public function get_script_depends() {
		return [ 'wl-elementor'];
	}

	// BDT Position
	protected function element_pack_position() {
	    $position_options = [
	        ''              => esc_html__('Default', 'wl-elementor'),
	        'top-left'      => esc_html__('Top Left', 'wl-elementor') ,
	        'top-center'    => esc_html__('Top Center', 'wl-elementor') ,
	        'top-right'     => esc_html__('Top Right', 'wl-elementor') ,
	        'center'        => esc_html__('Center', 'wl-elementor') ,
	        'center-left'   => esc_html__('Center Left', 'wl-elementor') ,
	        'center-right'  => esc_html__('Center Right', 'wl-elementor') ,
	        'bottom-left'   => esc_html__('Bottom Left', 'wl-elementor') ,
	        'bottom-center' => esc_html__('Bottom Center', 'wl-elementor') ,
	        'bottom-right'  => esc_html__('Bottom Right', 'wl-elementor') ,
	    ];

	    return $position_options;
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_wl-blog-v1',
			[
				'label' => esc_html__( 'WL Blog V1 Area', 'wl-elementor' ),
			]	
		);

		$this->add_control(
			'post_number',
			[
		        'label'       => __( 'Post Number', 'wl-elementor' ),
		        'type'        => Controls_Manager::TEXT,
		        'placeholder' => __( 'Post Number', 'wl-elementor' ),
		        'default'     => __( '3', 'wl-elementor' ),
		        'label_block' => true,
		    ]
		);

		$this->add_control(
            'post_orderby',
            [
                'label'   => esc_html__( 'Post Order By', 'wl-elementor' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'date',
                'options' => array(
                    'date'       => esc_html__( 'Date', 'wl-elementor' ),
                    'title'      => esc_html__( 'Title', 'wl-elementor' ),
                    'menu_order' => esc_html__( 'Menu Order', 'wl-elementor' ),
                    'rand'       => esc_html__( 'Random', 'wl-elementor' ),
                ),
            ]
        );

		$this->add_control(
			'post_order',
			[
				'label'     => esc_html__( 'Post Order', 'wl-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'asc'  => esc_html__( 'ASC', 'wl-elementor' ),
					'desc' => esc_html__( 'DESC', 'wl-elementor' ),
				],
				'default'   => 'desc',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_layout',
			[
				'label' => esc_html__( 'Layout', 'wl-elementor' ),
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label'   => esc_html__( 'Alignment', 'wl-elementor' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'wl-elementor' ),
						'icon'  => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'wl-elementor' ),
						'icon'  => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'wl-elementor' ),
						'icon'  => 'fa fa-align-right',
					],
					'justify' => [
						'title' => esc_html__( 'Justified', 'wl-elementor' ),
						'icon'  => 'fa fa-align-justify',
					],
				],
				'prefix_class' => 'elementor%s-align-',
				'description'  => 'Use align to match position',
				'default'      => 'left',
			]
		);

		$this->end_controls_section();

	}

	public function render() {
		$settings  = $this->get_settings_for_display();
		?>

    <!-- BLOG
    ================================================== -->      
    <div class="row mb-1-9 mb-sm-6 mt-n1-9">
    	<?php 

    		$orderby = $settings['post_orderby'];
        	$order = $settings['post_order'];
        	$post_number = $settings['post_number'];
        	$wp_query = new \WP_Query(array('posts_per_page' => $post_number,'post_type' => 'post',  'orderby' => $orderby, 'order' => $order));

        	$i =0;
        	
        	while ($wp_query -> have_posts()) : $wp_query -> the_post();  
        		  $i=$i+150;
        	?>

        	<div class="col-md-6 col-lg-4 mt-1-9 wow fadeInUp" data-wow-delay="<?php echo ($i); ?>ms">
                <article class="card card-style26">
                	<?php if (get_the_post_thumbnail_url() !='')  { ?>
	                    <div class="blog-img position-relative overflow-hidden">
	                        <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" class="radius-top" alt="...">
	                        <span class="category"><?php echo get_the_tag_list(); ?></span>
	                    </div>
                    <?php } ?>
                    <div class="card-body position-relative pt-2-6 pb-1-9 pb-xl-2-6 px-1-9 px-xl-2-4">
                        <div class="post-date">
                            <span class="mb-0 d-block lh-1 display-20 display-lg-17"><?php echo get_the_date('j'); ?></span>
                            <span class="d-block month"><?php echo get_the_date('M'); ?></span>
                        </div>
                        <h3 class="h4 mb-0 mt-3"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                    </div>
                    <div class="d-flex fw-bold border-top px-1-9 py-3 border-color-light-black justify-content-between">
                    	<div class="text-capitalize"><span class="font-weight-600"><i class="ti-user me-2"></i></span> <?php the_author_posts_link(); ?></div>
                    	<span><i class="ti-comment-alt me-2"></i><?php comments_number( esc_html__('0' , 'renuma') , esc_html__('1' , 'renuma' ), esc_html__('%' , 'renuma')); ?></span>
                	</div>
                </article>
            </div>

        <?php endwhile; ?>
        
    </div>
            

	<?php
	}

}
<?php
	$current_domain = str_replace(['https', 'http', '://'], '', $_SERVER['HTTP_ORIGIN']);
 
	
	//Подключаем модуль SMS.RU
	define('SMSRU_API_ID', 'XXXXXX-XXXXXX-XXXXXX-XXXXXX-XXXXXX');
	require_once  __DIR__.'/smsru/api.php';
	
	//Подключаем сбербанк
	require_once  __DIR__.'/sber/sber.api.php';
	
	//Обязательные кастомные сущности
	require_once  __DIR__.'/custom_post_types.php';
	require_once  __DIR__.'/custom_taxonomies.php';
	
	add_filter('show_admin_bar', '__return_false');	
	add_action( 'after_setup_theme', 'default_settings' );
	
	 
	
	function default_settings() {
		load_theme_textdomain( 'sdg', get_template_directory() . '/languages' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'html5', array( 'search-form' ) );
		global $content_width;
		if ( !isset( $content_width ) ) { $content_width = 1920; }
		register_nav_menus( array( 'main-menu' => esc_html__( 'Main Menu', 'woo' ) ) );
		register_nav_menus( array( 'footer-1' => esc_html__( 'Footer Column 1', 'woo' ) ) );
		register_nav_menus( array( 'footer-2' => esc_html__( 'Footer Column 2', 'woo' ) ) );
	}
	add_action( 'admin_head', 'admin_assets' );
	
	function admin_assets(){
		wp_enqueue_style("style-admin", get_bloginfo('stylesheet_directory')."/assets/css/admin.css");
		wp_enqueue_script( 'admin-js', get_bloginfo('stylesheet_directory').'/assets/js/admin.js', array( 'jquery' ), '1.0', true );
		//common_assets();
	}
	
	function common_assets(){	
		wp_enqueue_style( 'cera-pro', get_bloginfo('stylesheet_directory')."/assets/fonts/cera-pro/index.css");
		wp_enqueue_style("jquery-ui", get_bloginfo('stylesheet_directory')."/assets/plugins/jquery.ui/jquery-ui.min.css");
		wp_enqueue_script( 'jquery-ui',  get_bloginfo('stylesheet_directory').'/assets/plugins/jquery.ui/jquery-ui.min.js', array(  ), '1.0', true );
		wp_enqueue_script( 'jquery-ui-touch-punch',  get_bloginfo('stylesheet_directory').'/assets/plugins/jquery.ui/jquery.ui.touch-punch.min.js', array(  ), '1.0', true );
		wp_enqueue_style("select2", "https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css");
		wp_enqueue_script( 'select2', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js', array(  ), '1.0', true );
		echo '<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>';
	}
	
	add_action( 'wp_enqueue_scripts', 'init_assets' );
	function init_assets() {
		common_assets();
		wp_enqueue_style('style', get_stylesheet_uri().'?v=1.8' );
		wp_enqueue_style("responsive", get_bloginfo('stylesheet_directory')."/assets/css/responsive.css?v=1.2");
		wp_enqueue_script( 'global', get_bloginfo('stylesheet_directory')."/assets/js/global.js?v=1.2", array(  ), '1.0', true );
	}

	add_action('init', 'register_my_session');
	function register_my_session(){
		if( !session_id() )
			{
				session_start();
			}
	}
	
	
	add_action( 'wp_footer', 'browser_detector' );
	function browser_detector() {
		
?>
<script>
	jQuery(document).ready(function($) {
		var deviceAgent = navigator.userAgent.toLowerCase();
		if (deviceAgent.match(/(iphone|ipod|ipad)/)) {
			$("html").addClass("ios");
		}
		if (navigator.userAgent.search("MSIE") >= 0) {
			$("html").addClass("ie");
		}
		else if (navigator.userAgent.search("Chrome") >= 0) {
			$("html").addClass("chrome");
		}
		else if (navigator.userAgent.search("Firefox") >= 0) {
			$("html").addClass("firefox");
		}
		else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
			$("html").addClass("safari");
		}
		else if (navigator.userAgent.search("Opera") >= 0) {
			$("html").addClass("opera");
		}
	});
</script>
<?php
	}
	
	
	function has_content($string = ''){
		if($string != ''){
			echo 'has-content not-empty';
		}
	}
	
	
	
	// 
	// Likes
	//
	
	add_action('wp_ajax_do_toggle_like', 'do_toggle_like');
	
	function do_toggle_like(){
		if(isset($_POST['post_id'])){
			$post_id = intval($_POST['post_id']);
			$type = strval($_POST['type']);
			toggle_like($type, $post_id);
		}
		exit;
	}
	function toggle_like($type = 'area', $post_id){
		global $current_user;
		$response = [
			'status' => 500,
			'code' => 'unauthorized',
			'title' => 'Авторизуйтесь, чтобы сделать это действие'
		];
		if($current_user->ID != 0){
			$ids = get_user_meta($current_user->ID, 'likes_'.$type, true);
			$likes = get_post_meta($post_id, 'likes', true);
			if($likes == ''){
				$likes = 0;
			}
			$likes = intval($likes);
			if(!is_array($ids)){
				$ids = [];
			}
			if(!in_array($post_id, $ids)){
				array_push($ids, $post_id);
				$response = [
					'status' => 200,
					'code' => 'liked',
					'title' => 'Вам понравилось'
				];
				update_user_meta($current_user->ID, 'likes_'.$type, $ids);
				$likes++;
				$response['likes'] = $likes;
			} else {
				$new_array = [];
				foreach($ids as $id){
					if($id != $post_id){
						array_push($new_array, $id);
					}
				}
				$response = [
					'status' => 200,
					'code' => 'not_liked',
					'title' => 'Вам больше не нравится'
				];
				update_user_meta($current_user->ID, 'likes_'.$type, $new_array);
				$likes = $likes-1;
				$response['likes'] = $likes;
				
			}
			
			if( $likes <= -1){
				$likes = 0;
			}
			
			update_post_meta($post_id, 'likes', $likes);
			
		}
		
		echo json_encode($response, JSON_UNESCAPED_UNICODE);
		exit;
	}
	
	function check_like($post_id){
		global $current_user;
		$type = 'area';
		if($current_user->ID != 0){
			$ids = get_user_meta($current_user->ID, 'likes_'.$type, true);
			if(!is_array($ids)){
				$ids = [];
			}
			if(in_array($post_id, $ids)){
				return true;
			}
		}
		return false;
	}
	
?>

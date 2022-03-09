<?php
	function cptui_register_my_cpts() {
		
		/**
		* Post Type: Участки.
		*/
		
//		$labels = [
//			"name" => __( "Участки", "custom-post-type-ui" ),
//			"singular_name" => __( "Участок", "custom-post-type-ui" ),
//			"menu_name" => __( "Участки", "custom-post-type-ui" ),
//			"all_items" => __( "Участки", "custom-post-type-ui" ),
//			"add_new" => __( "Добавить участок", "custom-post-type-ui" ),
//			"add_new_item" => __( "Добавить новый участок", "custom-post-type-ui" ),
//			"edit_item" => __( "Редактировать участок", "custom-post-type-ui" ),
//			"new_item" => __( "Новый участок", "custom-post-type-ui" ),
//			"view_item" => __( "Просмотреть участок", "custom-post-type-ui" ),
//			"view_items" => __( "Просмотреть участки", "custom-post-type-ui" ),
//			"search_items" => __( "Поиск по участкам", "custom-post-type-ui" ),
//			"not_found" => __( "Участки не найдены", "custom-post-type-ui" ),
//			"not_found_in_trash" => __( "Нет участков в корзине", "custom-post-type-ui" ),
//			"parent" => __( "Родительская страница:", "custom-post-type-ui" ),
//			"featured_image" => __( "Главное изображение участка", "custom-post-type-ui" ),
//			"set_featured_image" => __( "Изменить изображение", "custom-post-type-ui" ),
//			"remove_featured_image" => __( "Удалить это изображение", "custom-post-type-ui" ),
//			"use_featured_image" => __( "Использовать это изображение как главное", "custom-post-type-ui" ),
//			"archives" => __( "Архив участков", "custom-post-type-ui" ),
//			"insert_into_item" => __( "Вставить в участок", "custom-post-type-ui" ),
//			"uploaded_to_this_item" => __( "Загрузить в участок", "custom-post-type-ui" ),
//			"filter_items_list" => __( "Фильтр участков", "custom-post-type-ui" ),
//			"items_list_navigation" => __( "Навигация по участкам", "custom-post-type-ui" ),
//			"items_list" => __( "Список участков", "custom-post-type-ui" ),
//			"attributes" => __( "Участки attributes", "custom-post-type-ui" ),
//			"name_admin_bar" => __( "Участок", "custom-post-type-ui" ),
//			"item_published" => __( "Участок добавлен", "custom-post-type-ui" ),
//			"item_published_privately" => __( "Участок теперь приватный", "custom-post-type-ui" ),
//			"item_reverted_to_draft" => __( "Участок сохранен как черновик", "custom-post-type-ui" ),
//			"item_scheduled" => __( "Участок запланирован", "custom-post-type-ui" ),
//			"item_updated" => __( "Участок обновлен.", "custom-post-type-ui" ),
//			"parent_item_colon" => __( "Родительская страница:", "custom-post-type-ui" ),
//		];
//		
//		$args = [
//			"label" => __( "Участки", "custom-post-type-ui" ),
//			"labels" => $labels,
//			"description" => "",
//			"public" => true,
//			"publicly_queryable" => true,
//			"show_ui" => true,
//			"show_in_rest" => true,
//			"rest_base" => "",
//			"rest_controller_class" => "WP_REST_Posts_Controller",
//			"has_archive" => false,
//			"show_in_menu" => true,
//			"show_in_nav_menus" => true,
//			"delete_with_user" => false,
//			"exclude_from_search" => false,
//			"capability_type" => "post",
//			"map_meta_cap" => true,
//			"hierarchical" => true,
//			"rewrite" => [ "slug" => "area", "with_front" => true ],
//			"query_var" => true,
//			"supports" => [ "title", "editor", "thumbnail" ],
//			"taxonomies" => [ "village" ],
//			"show_in_graphql" => false,
//		];
//		
//		register_post_type( "area", $args );
//		
//		/**
//		* Post Type: Дома.
//		*/
//		
//		$labels = [
//			"name" => __( "Дома", "custom-post-type-ui" ),
//			"singular_name" => __( "Дом", "custom-post-type-ui" ),
//			"menu_name" => __( "Дома", "custom-post-type-ui" ),
//			"all_items" => __( "Все дома", "custom-post-type-ui" ),
//			"add_new" => __( "Добавить дом", "custom-post-type-ui" ),
//			"add_new_item" => __( "Добавить новый дом", "custom-post-type-ui" ),
//			"edit_item" => __( "Изменить дом", "custom-post-type-ui" ),
//			"new_item" => __( "Новый дом", "custom-post-type-ui" ),
//			"view_item" => __( "Просмотр дома", "custom-post-type-ui" ),
//			"view_items" => __( "Просмотреть дома", "custom-post-type-ui" ),
//			"search_items" => __( "Поиск по домам", "custom-post-type-ui" ),
//			"not_found" => __( "Дома не найдены", "custom-post-type-ui" ),
//			"not_found_in_trash" => __( "Нет удаленных домов", "custom-post-type-ui" ),
//			"parent" => __( "Родительская страница:", "custom-post-type-ui" ),
//			"featured_image" => __( "Изображение дома", "custom-post-type-ui" ),
//			"set_featured_image" => __( "Изменить главное изображение", "custom-post-type-ui" ),
//			"remove_featured_image" => __( "Удалить главное изображение", "custom-post-type-ui" ),
//			"use_featured_image" => __( "Использовать как главное изображение", "custom-post-type-ui" ),
//			"archives" => __( "Архивы домов", "custom-post-type-ui" ),
//			"insert_into_item" => __( "Вставить в дом", "custom-post-type-ui" ),
//			"uploaded_to_this_item" => __( "Загрузить в этот дом", "custom-post-type-ui" ),
//			"filter_items_list" => __( "Фильтр домов", "custom-post-type-ui" ),
//			"items_list_navigation" => __( "Навигация по домам", "custom-post-type-ui" ),
//			"items_list" => __( "Список домов", "custom-post-type-ui" ),
//			"attributes" => __( "Атрибуты дома", "custom-post-type-ui" ),
//			"name_admin_bar" => __( "Дом", "custom-post-type-ui" ),
//			"item_published" => __( "Дом добавлен", "custom-post-type-ui" ),
//			"item_published_privately" => __( "Дом скрыт.", "custom-post-type-ui" ),
//			"item_reverted_to_draft" => __( "Дом переведен в черновик.", "custom-post-type-ui" ),
//			"item_scheduled" => __( "Дом запланирован.", "custom-post-type-ui" ),
//			"item_updated" => __( "Дом обновлен.", "custom-post-type-ui" ),
//			"parent_item_colon" => __( "Родительская страница:", "custom-post-type-ui" ),
//		];
//		
//		$args = [
//			"label" => __( "Дома", "custom-post-type-ui" ),
//			"labels" => $labels,
//			"description" => "",
//			"public" => true,
//			"publicly_queryable" => true,
//			"show_ui" => true,
//			"show_in_rest" => true,
//			"rest_base" => "",
//			"rest_controller_class" => "WP_REST_Posts_Controller",
//			"has_archive" => false,
//			"show_in_menu" => true,
//			"show_in_nav_menus" => true,
//			"delete_with_user" => false,
//			"exclude_from_search" => false,
//			"capability_type" => "post",
//			"map_meta_cap" => true,
//			"hierarchical" => true,
//			"rewrite" => [ "slug" => "house", "with_front" => true ],
//			"query_var" => true,
//			"supports" => [ "title", "editor", "thumbnail" ],
//			"taxonomies" => [ "house_type" ],
//			"show_in_graphql" => false,
//		];
//		
//		register_post_type( "house", $args );
//		
//		/**
//		* Post Type: Истории.
//		*/
//		
//		$labels = [
//			"name" => __( "Истории", "custom-post-type-ui" ),
//			"singular_name" => __( "История", "custom-post-type-ui" ),
//			"menu_name" => __( "Истории", "custom-post-type-ui" ),
//			"all_items" => __( "Все истории", "custom-post-type-ui" ),
//			"add_new" => __( "Добавить", "custom-post-type-ui" ),
//			"add_new_item" => __( "Добавить историю", "custom-post-type-ui" ),
//			"edit_item" => __( "Изменить историю", "custom-post-type-ui" ),
//			"new_item" => __( "Новая история", "custom-post-type-ui" ),
//			"view_item" => __( "Просмотреть историю", "custom-post-type-ui" ),
//			"view_items" => __( "Просмотр историй", "custom-post-type-ui" ),
//			"search_items" => __( "Поиск по историям", "custom-post-type-ui" ),
//			"not_found" => __( "Истории не найдены", "custom-post-type-ui" ),
//			"not_found_in_trash" => __( "No Истории found in trash", "custom-post-type-ui" ),
//			"parent" => __( "Parent История:", "custom-post-type-ui" ),
//			"featured_image" => __( "Изображение истории", "custom-post-type-ui" ),
//			"set_featured_image" => __( "Изменить главное изображение", "custom-post-type-ui" ),
//			"remove_featured_image" => __( "Удалить главное изображение", "custom-post-type-ui" ),
//			"use_featured_image" => __( "Использовать это изображение как главное", "custom-post-type-ui" ),
//			"archives" => __( "История archives", "custom-post-type-ui" ),
//			"insert_into_item" => __( "Insert into История", "custom-post-type-ui" ),
//			"uploaded_to_this_item" => __( "Upload to this История", "custom-post-type-ui" ),
//			"filter_items_list" => __( "Filter Истории list", "custom-post-type-ui" ),
//			"items_list_navigation" => __( "Истории list navigation", "custom-post-type-ui" ),
//			"items_list" => __( "Истории list", "custom-post-type-ui" ),
//			"attributes" => __( "Истории attributes", "custom-post-type-ui" ),
//			"name_admin_bar" => __( "История", "custom-post-type-ui" ),
//			"item_published" => __( "История добавлена", "custom-post-type-ui" ),
//			"item_published_privately" => __( "История published privately.", "custom-post-type-ui" ),
//			"item_reverted_to_draft" => __( "История reverted to draft.", "custom-post-type-ui" ),
//			"item_scheduled" => __( "История scheduled", "custom-post-type-ui" ),
//			"item_updated" => __( "История обновлена.", "custom-post-type-ui" ),
//			"parent_item_colon" => __( "Parent История:", "custom-post-type-ui" ),
//		];
//		
//		$args = [
//			"label" => __( "Истории", "custom-post-type-ui" ),
//			"labels" => $labels,
//			"description" => "",
//			"public" => true,
//			"publicly_queryable" => true,
//			"show_ui" => true,
//			"show_in_rest" => true,
//			"rest_base" => "",
//			"rest_controller_class" => "WP_REST_Posts_Controller",
//			"has_archive" => false,
//			"show_in_menu" => true,
//			"show_in_nav_menus" => true,
//			"delete_with_user" => false,
//			"exclude_from_search" => false,
//			"capability_type" => "post",
//			"map_meta_cap" => true,
//			"hierarchical" => false,
//			"rewrite" => [ "slug" => "stories", "with_front" => true ],
//			"query_var" => true,
//			"menu_icon" => "dashicons-images-alt",
//			"supports" => [ "title", "editor", "thumbnail", "excerpt" ],
//			"taxonomies" => [ "village" ],
//			"show_in_graphql" => false,
//		];
//		
//		register_post_type( "stories", $args );
//		
//		/**
//		* Post Type: Платежи.
//		*/
//		
//		$labels = [
//			"name" => __( "Платежи", "custom-post-type-ui" ),
//			"singular_name" => __( "Платеж", "custom-post-type-ui" ),
//			"menu_name" => __( "Платежи", "custom-post-type-ui" ),
//			"all_items" => __( "Все платежи", "custom-post-type-ui" ),
//			"add_new" => __( "Новый платеж", "custom-post-type-ui" ),
//			"add_new_item" => __( "Добавить платеж", "custom-post-type-ui" ),
//			"edit_item" => __( "Редактировать платеж", "custom-post-type-ui" ),
//			"new_item" => __( "Новый платеж", "custom-post-type-ui" ),
//			"view_item" => __( "Просмотреть платеж", "custom-post-type-ui" ),
//			"view_items" => __( "Просмотреть платежи", "custom-post-type-ui" ),
//			"search_items" => __( "Поиск по платежам", "custom-post-type-ui" ),
//			"not_found" => __( "Платеж не найден", "custom-post-type-ui" ),
//			"not_found_in_trash" => __( "No платежи found in trash", "custom-post-type-ui" ),
//			"parent" => __( "Parent платеж:", "custom-post-type-ui" ),
//			"featured_image" => __( "Featured image for this платеж", "custom-post-type-ui" ),
//			"set_featured_image" => __( "Set featured image for this платеж", "custom-post-type-ui" ),
//			"remove_featured_image" => __( "Remove featured image for this платеж", "custom-post-type-ui" ),
//			"use_featured_image" => __( "Use as featured image for this платеж", "custom-post-type-ui" ),
//			"archives" => __( "Архив платежей", "custom-post-type-ui" ),
//			"insert_into_item" => __( "Insert into платеж", "custom-post-type-ui" ),
//			"uploaded_to_this_item" => __( "Upload to this платеж", "custom-post-type-ui" ),
//			"filter_items_list" => __( "Filter платежи list", "custom-post-type-ui" ),
//			"items_list_navigation" => __( "платежи list navigation", "custom-post-type-ui" ),
//			"items_list" => __( "платежи list", "custom-post-type-ui" ),
//			"attributes" => __( "платежи attributes", "custom-post-type-ui" ),
//			"name_admin_bar" => __( "платеж", "custom-post-type-ui" ),
//			"item_published" => __( "Платеж создан", "custom-post-type-ui" ),
//			"item_published_privately" => __( "платеж published privately.", "custom-post-type-ui" ),
//			"item_reverted_to_draft" => __( "платеж reverted to draft.", "custom-post-type-ui" ),
//			"item_scheduled" => __( "платеж scheduled", "custom-post-type-ui" ),
//			"item_updated" => __( "Платеж обновлен", "custom-post-type-ui" ),
//			"parent_item_colon" => __( "Parent платеж:", "custom-post-type-ui" ),
//		];
//		
//		$args = [
//			"label" => __( "Платежи", "custom-post-type-ui" ),
//			"labels" => $labels,
//			"description" => "",
//			"public" => true,
//			"publicly_queryable" => true,
//			"show_ui" => true,
//			"show_in_rest" => true,
//			"rest_base" => "",
//			"rest_controller_class" => "WP_REST_Posts_Controller",
//			"has_archive" => false,
//			"show_in_menu" => true,
//			"show_in_nav_menus" => true,
//			"delete_with_user" => false,
//			"exclude_from_search" => false,
//			"capability_type" => "post",
//			"map_meta_cap" => true,
//			"hierarchical" => false,
//			"rewrite" => [ "slug" => "payment", "with_front" => true ],
//			"query_var" => true,
//			"menu_icon" => "dashicons-money-alt",
//			"supports" => [ "title", "author" ],
//			"taxonomies" => [ "village", "payment_category" ],
//			"show_in_graphql" => false,
//		];
//		
//		register_post_type( "payment", $args );
	}
	
	add_action( 'init', 'cptui_register_my_cpts' );

?>
<?php
	function cptui_register_my_taxes() {
		
		/**
		* Taxonomy: Посёлки.
		*/
		
//		$labels = [
//			"name" => __( "Посёлки", "custom-post-type-ui" ),
//			"singular_name" => __( "Посёлок", "custom-post-type-ui" ),
//			"menu_name" => __( "Посёлки", "custom-post-type-ui" ),
//			"all_items" => __( "Все посёлки", "custom-post-type-ui" ),
//			"edit_item" => __( "Редактировать посёлок", "custom-post-type-ui" ),
//			"view_item" => __( "Просмотреть посёлок", "custom-post-type-ui" ),
//			"update_item" => __( "Обновить имя посёлка", "custom-post-type-ui" ),
//			"add_new_item" => __( "Добавить посёлок", "custom-post-type-ui" ),
//			"new_item_name" => __( "Имя нового посёлка", "custom-post-type-ui" ),
//			"parent_item" => __( "Родительская категория", "custom-post-type-ui" ),
//			"parent_item_colon" => __( "Родительская категория:", "custom-post-type-ui" ),
//			"search_items" => __( "Поиск по посёлкам", "custom-post-type-ui" ),
//			"popular_items" => __( "Популярные посёлки", "custom-post-type-ui" ),
//			"separate_items_with_commas" => __( "Separate Посёлки with commas", "custom-post-type-ui" ),
//			"add_or_remove_items" => __( "Добавить или удалить посёлки", "custom-post-type-ui" ),
//			"choose_from_most_used" => __( "Choose from the most used Посёлки", "custom-post-type-ui" ),
//			"not_found" => __( "Проекты не найдены", "custom-post-type-ui" ),
//			"no_terms" => __( "Нет посёлков", "custom-post-type-ui" ),
//			"items_list_navigation" => __( "Посёлки list navigation", "custom-post-type-ui" ),
//			"items_list" => __( "Посёлки list", "custom-post-type-ui" ),
//			"back_to_items" => __( "Назад к посёлкам", "custom-post-type-ui" ),
//		];
//		
//		
//		$args = [
//			"label" => __( "Посёлки", "custom-post-type-ui" ),
//			"labels" => $labels,
//			"public" => true,
//			"publicly_queryable" => true,
//			"hierarchical" => true,
//			"show_ui" => true,
//			"show_in_menu" => true,
//			"show_in_nav_menus" => true,
//			"query_var" => true,
//			"rewrite" => [ 'slug' => 'village', 'with_front' => true, ],
//			"show_admin_column" => false,
//			"show_in_rest" => true,
//			"show_tagcloud" => false,
//			"rest_base" => "village",
//			"rest_controller_class" => "WP_REST_Terms_Controller",
//			"show_in_quick_edit" => false,
//			"show_in_graphql" => false,
//		];
//		register_taxonomy( "village", [ "area", "payment" ], $args );
//		
//		/**
//		* Taxonomy: Метки.
//		*/
//		
//		$labels = [
//			"name" => __( "Метки", "custom-post-type-ui" ),
//			"singular_name" => __( "Метка", "custom-post-type-ui" ),
//			"menu_name" => __( "Метки", "custom-post-type-ui" ),
//			"all_items" => __( "Все метки", "custom-post-type-ui" ),
//			"edit_item" => __( "Редактировать метку", "custom-post-type-ui" ),
//			"view_item" => __( "Просмотреть метку", "custom-post-type-ui" ),
//			"update_item" => __( "Обновить имя метки", "custom-post-type-ui" ),
//			"add_new_item" => __( "Добавить новую метку", "custom-post-type-ui" ),
//			"new_item_name" => __( "Имя новой метки", "custom-post-type-ui" ),
//			"parent_item" => __( "Родительская категория", "custom-post-type-ui" ),
//			"parent_item_colon" => __( "Родительская категория:", "custom-post-type-ui" ),
//			"search_items" => __( "Поиск по меткам", "custom-post-type-ui" ),
//			"popular_items" => __( "Популярные метки", "custom-post-type-ui" ),
//			"separate_items_with_commas" => __( "Separate метки with commas", "custom-post-type-ui" ),
//			"add_or_remove_items" => __( "Добавить или удалить метки", "custom-post-type-ui" ),
//			"choose_from_most_used" => __( "Choose from the most used метки", "custom-post-type-ui" ),
//			"not_found" => __( "Метки не найдены", "custom-post-type-ui" ),
//			"no_terms" => __( "Нет меток", "custom-post-type-ui" ),
//			"items_list_navigation" => __( "метки list navigation", "custom-post-type-ui" ),
//			"items_list" => __( "метки list", "custom-post-type-ui" ),
//			"back_to_items" => __( "Back to метки", "custom-post-type-ui" ),
//		];
//		
//		
//		$args = [
//			"label" => __( "Метки", "custom-post-type-ui" ),
//			"labels" => $labels,
//			"public" => true,
//			"publicly_queryable" => true,
//			"hierarchical" => false,
//			"show_ui" => true,
//			"show_in_menu" => true,
//			"show_in_nav_menus" => true,
//			"query_var" => true,
//			"rewrite" => [ 'slug' => 'feature', 'with_front' => true, ],
//			"show_admin_column" => false,
//			"show_in_rest" => true,
//			"show_tagcloud" => false,
//			"rest_base" => "feature",
//			"rest_controller_class" => "WP_REST_Terms_Controller",
//			"show_in_quick_edit" => false,
//			"show_in_graphql" => false,
//		];
//		register_taxonomy( "feature", [ "area", "house" ], $args );
//		
//		/**
//		* Taxonomy: Коммуникации.
//		*/
//		
//		$labels = [
//			"name" => __( "Коммуникации", "custom-post-type-ui" ),
//			"singular_name" => __( "Коммуникация", "custom-post-type-ui" ),
//			"menu_name" => __( "Коммуникации", "custom-post-type-ui" ),
//			"all_items" => __( "Коммуникации", "custom-post-type-ui" ),
//			"edit_item" => __( "Изменить коммуникация", "custom-post-type-ui" ),
//			"view_item" => __( "Просмотреть коммуникацию", "custom-post-type-ui" ),
//			"update_item" => __( "Обновить имя коммуникации", "custom-post-type-ui" ),
//			"add_new_item" => __( "Добавить коммуникация", "custom-post-type-ui" ),
//			"new_item_name" => __( "New коммуникация name", "custom-post-type-ui" ),
//			"parent_item" => __( "Parent коммуникация", "custom-post-type-ui" ),
//			"parent_item_colon" => __( "Parent коммуникация:", "custom-post-type-ui" ),
//			"search_items" => __( "Search коммуникации", "custom-post-type-ui" ),
//			"popular_items" => __( "Popular коммуникации", "custom-post-type-ui" ),
//			"separate_items_with_commas" => __( "Separate коммуникации with commas", "custom-post-type-ui" ),
//			"add_or_remove_items" => __( "Add or remove коммуникации", "custom-post-type-ui" ),
//			"choose_from_most_used" => __( "Choose from the most used коммуникации", "custom-post-type-ui" ),
//			"not_found" => __( "No коммуникации found", "custom-post-type-ui" ),
//			"no_terms" => __( "No коммуникации", "custom-post-type-ui" ),
//			"items_list_navigation" => __( "коммуникации list navigation", "custom-post-type-ui" ),
//			"items_list" => __( "коммуникации list", "custom-post-type-ui" ),
//			"back_to_items" => __( "Back to коммуникации", "custom-post-type-ui" ),
//		];
//		
//		
//		$args = [
//			"label" => __( "Коммуникации", "custom-post-type-ui" ),
//			"labels" => $labels,
//			"public" => true,
//			"publicly_queryable" => true,
//			"hierarchical" => false,
//			"show_ui" => true,
//			"show_in_menu" => true,
//			"show_in_nav_menus" => true,
//			"query_var" => true,
//			"rewrite" => [ 'slug' => 'communication', 'with_front' => true, ],
//			"show_admin_column" => false,
//			"show_in_rest" => true,
//			"show_tagcloud" => false,
//			"rest_base" => "communication",
//			"rest_controller_class" => "WP_REST_Terms_Controller",
//			"show_in_quick_edit" => false,
//			"show_in_graphql" => false,
//		];
//		register_taxonomy( "communication", [ "area", "house" ], $args );
//		
//		/**
//		* Taxonomy: Категории платежей.
//		*/
//		
//		$labels = [
//			"name" => __( "Категории платежей", "custom-post-type-ui" ),
//			"singular_name" => __( "Категория платежей", "custom-post-type-ui" ),
//			"menu_name" => __( "Категории платежей", "custom-post-type-ui" ),
//			"all_items" => __( "Категории платежей", "custom-post-type-ui" ),
//			"edit_item" => __( "Изменить категорию", "custom-post-type-ui" ),
//			"view_item" => __( "Просмотр категории", "custom-post-type-ui" ),
//			"update_item" => __( "Обновить имя категории", "custom-post-type-ui" ),
//			"add_new_item" => __( "Добавить категорию", "custom-post-type-ui" ),
//			"new_item_name" => __( "Имя новой категории", "custom-post-type-ui" ),
//			"parent_item" => __( "Родительская категория", "custom-post-type-ui" ),
//			"parent_item_colon" => __( "Родительская категория:", "custom-post-type-ui" ),
//			"search_items" => __( "Search категории платежей", "custom-post-type-ui" ),
//			"popular_items" => __( "Popular категории платежей", "custom-post-type-ui" ),
//			"separate_items_with_commas" => __( "Separate категории платежей with commas", "custom-post-type-ui" ),
//			"add_or_remove_items" => __( "Add or remove категории платежей", "custom-post-type-ui" ),
//			"choose_from_most_used" => __( "Choose from the most used категории платежей", "custom-post-type-ui" ),
//			"not_found" => __( "No категории платежей found", "custom-post-type-ui" ),
//			"no_terms" => __( "No категории платежей", "custom-post-type-ui" ),
//			"items_list_navigation" => __( "категории платежей list navigation", "custom-post-type-ui" ),
//			"items_list" => __( "категории платежей list", "custom-post-type-ui" ),
//			"back_to_items" => __( "Back to категории платежей", "custom-post-type-ui" ),
//		];
//		
//		
//		$args = [
//			"label" => __( "Категории платежей", "custom-post-type-ui" ),
//			"labels" => $labels,
//			"public" => true,
//			"publicly_queryable" => true,
//			"hierarchical" => true,
//			"show_ui" => true,
//			"show_in_menu" => true,
//			"show_in_nav_menus" => true,
//			"query_var" => true,
//			"rewrite" => [ 'slug' => 'payment_category', 'with_front' => true, ],
//			"show_admin_column" => false,
//			"show_in_rest" => true,
//			"show_tagcloud" => false,
//			"rest_base" => "payment_category",
//			"rest_controller_class" => "WP_REST_Terms_Controller",
//			"show_in_quick_edit" => false,
//			"show_in_graphql" => false,
//		];
//		register_taxonomy( "payment_category", [ "payment" ], $args );
//		
//		
//		/**
//		* Taxonomy: Типы дома.
//		*/
//		
//		$labels = [
//			"name" => __( "Типы дома", "custom-post-type-ui" ),
//			"singular_name" => __( "Тип дома", "custom-post-type-ui" ),
//			"menu_name" => __( "Типы дома", "custom-post-type-ui" ),
//			"all_items" => __( "Все типы", "custom-post-type-ui" ),
//			"edit_item" => __( "Редактировать тип", "custom-post-type-ui" ),
//			"view_item" => __( "Просмотреть тип", "custom-post-type-ui" ),
//			"update_item" => __( "Update тип дома name", "custom-post-type-ui" ),
//			"add_new_item" => __( "Add new тип дома", "custom-post-type-ui" ),
//			"new_item_name" => __( "New тип дома name", "custom-post-type-ui" ),
//			"parent_item" => __( "Parent тип дома", "custom-post-type-ui" ),
//			"parent_item_colon" => __( "Parent тип дома:", "custom-post-type-ui" ),
//			"search_items" => __( "Search типы дома", "custom-post-type-ui" ),
//			"popular_items" => __( "Popular типы дома", "custom-post-type-ui" ),
//			"separate_items_with_commas" => __( "Separate типы дома with commas", "custom-post-type-ui" ),
//			"add_or_remove_items" => __( "Add or remove типы дома", "custom-post-type-ui" ),
//			"choose_from_most_used" => __( "Choose from the most used типы дома", "custom-post-type-ui" ),
//			"not_found" => __( "No типы дома found", "custom-post-type-ui" ),
//			"no_terms" => __( "No типы дома", "custom-post-type-ui" ),
//			"items_list_navigation" => __( "типы дома list navigation", "custom-post-type-ui" ),
//			"items_list" => __( "типы дома list", "custom-post-type-ui" ),
//			"back_to_items" => __( "Back to типы дома", "custom-post-type-ui" ),
//		];
//		
//		
//		$args = [
//			"label" => __( "Типы дома", "custom-post-type-ui" ),
//			"labels" => $labels,
//			"public" => true,
//			"publicly_queryable" => true,
//			"hierarchical" => true,
//			"show_ui" => true,
//			"show_in_menu" => true,
//			"show_in_nav_menus" => true,
//			"query_var" => true,
//			"rewrite" => [ 'slug' => 'house_type', 'with_front' => true, ],
//			"show_admin_column" => false,
//			"show_in_rest" => true,
//			"show_tagcloud" => false,
//			"rest_base" => "house_type",
//			"rest_controller_class" => "WP_REST_Terms_Controller",
//			"show_in_quick_edit" => true,
//			"show_in_graphql" => false,
//		];
//		register_taxonomy( "house_type", [ "house" ], $args );
//			
	}
	add_action( 'init', 'cptui_register_my_taxes' );

?>
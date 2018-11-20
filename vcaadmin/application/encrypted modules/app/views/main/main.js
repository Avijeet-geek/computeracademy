var app=angular.module('groveusCms',['ui.bootstrap','ui.router','summernote','angularUtils.directives.dirPagination']);
app.config(function($stateProvider, $urlRouterProvider) {
    $urlRouterProvider.otherwise('/home');
    $stateProvider
    	.state
    	('home', {
	        url: '/home',
	        templateUrl: 'dashboard/admin',
	        controller: 'ctrl_dashboard'
    	})
    	.state
    	('menu', {
	        url: '/menu',
	        templateUrl: 'menu',
	        controller: 'ctrl_menu'
    	})
    	.state
    	('service_head', {
	        url: '/service_head',
	        templateUrl: 'service_head',
	        controller: 'ctrl_service_head'
    	})
    	
    	.state
    	('plans', {
	        url: '/plans',
	        templateUrl: 'plans',
	        controller: 'ctrl_plans'
    	})
    	
    	
    	.state
    	('socialmedia', {
	        url: '/socialmedia',
	        templateUrl: 'socialmedia',
	        controller: 'ctrl_socialmedia'
    	})
    	
   	.state
    	('admin_profile', {
	        url: '/admin_profile',
	        templateUrl: 'admin_profile',
	        controller: 'ctrl_admin'
    	})
    	
    	.state
    	('enquiry', {
	        url: '/enquiry',
	        templateUrl: 'enquiry',
	        controller: 'ctrl_enquiry'
    	})
    	
    	
    	.state
    	('contact', {
	        url: '/contact',
	        templateUrl: 'contact',
	        controller: 'ctrl_contact'
    	})
    	
    	.state
    	('career', {
	        url: '/career',
	        templateUrl: 'career',
	        controller: 'ctrl_career'
    	})
    	.state
    	('services', {
	        url: '/services',
	        templateUrl: 'services',
	        controller: 'ctrl_services'
    	})

    	.state
    	('change_logo', {
	        url: '/change_logo',
	        templateUrl: 'change_logo',
	        controller: 'ctrl_change_logo'
    	})
    	.state
    	('filemanager', {
	        url: '/filemanager',
	        templateUrl: 'filemanager',
	        controller: 'ctrl_filemanager'
    	})
    	.state
    	('setting_page', {
	        url: '/setting_page',
	        templateUrl: 'setting_page',
	        controller: 'ctrl_setting_page'
    	})
    	.state
    	('developer', {
	        url: '/developer',
	        templateUrl: 'developer',
	        controller: 'ctrl_developer'
    	})
    		.state
    	('setting_api', {
	        url: '/setting_api',
	        templateUrl: 'setting_api',
	        controller: 'ctrl_setting_api'
    	})
    	.state
    	('slider', {
	        url: '/slider',
	        templateUrl: 'slider',
	        controller: 'ctrl_slider'
    	})
    	.state
    	('blog', {
	        url: '/blog',
	        templateUrl: 'blog',
	        controller: 'ctrl_blog'
    	})
    	.state
    	('testimonial', {
	        url: '/testimonial',
	        templateUrl: 'testimonial',
	        controller: 'ctrl_testimonial'
    	})
    	.state
    	('sets_profile', {
	        url: '/sets_profile',
	        templateUrl: 'sets_profile',
	        controller: 'ctrl_sets_profile'
    	})
    	.state
    	('blocks', {
	        url: '/blocks',
	        templateUrl: 'blocks',
	        controller: 'ctrl_blocks'
    	})
    	.state
    	('formbuilder', {
	        url: '/formbuilder',
	        templateUrl: 'formbuilder',
	        controller: 'ctrl_form'
    	})
    	.state
    	('subcategory', {
	        url: '/subcategory',
	        templateUrl: 'subcategory',
	        controller: 'ctrl_subcat'
    	})
    	.state
    	('items', {
	        url: '/items',
	        templateUrl: 'items',
	        controller: 'ctrl_items'
    	})
    	.state
    	('slider_img', {
	        url: '/slider_img',
	        templateUrl: 'slider_img',
	        controller: 'ctrl_slider_img'
    	})
    	.state
    	('category', {
	        url: '/category',
	        templateUrl: 'category',
	        controller: 'ctrl_cat'
    	})
    	.state
    	('page', {
	        url: '/page',
	        templateUrl: 'page',
	        controller: 'ctrl_page'
    	})
	    .state
	    ('users', {
	        url: '/users',
	        templateUrl: 'users',
	        controller: 'ctrl_users'
	    })
	     .state
		('uploads', {
	        url: '/uploads',
	        templateUrl: 'uploads',
	        controller: 'ctrl_uploads'
	    })
	    .state
		('dbbackup', {
	        url: '/dbbackup',
	        templateUrl: 'dbbackup',
	    })
	    .state
		('user_manager', {
	        url: '/user_manager',
	        templateUrl: 'user_manager',
	        controller: 'ctrl_user_manager'
	    })
	    .state
		('gallery', {
	        url: '/gallery',
	        templateUrl: 'gallery',
	        controller: 'ctrl_gallery'
	    })
	    .state
		('news', {
	        url: '/news',
	        templateUrl: 'news',
	        controller: 'ctrl_news'
	    })
	    .state
		('change_password', {
	        url: '/change_password',
	        templateUrl: 'login/change_password',
	        controller: 'ctrl_login'
	    })
	    .state
		('logs', {
	        url: '/logs',
	        templateUrl: 'logs',
	        controller: 'ctrl_logs'
	    })
	    
	    
	    .state
		('help', {
	        url: '/help',
	        templateUrl: 'template/help'
	    })
	    .state
		('vechiles_inside', {
	        url: '/vechiles_inside',
	        templateUrl: 'weight_session/vechiles_inside',
	        controller: 'ctrl_vehicles_inside'
	    })
	    .state
		('user_privileges', {
	        url: '/user_privileges',
	        templateUrl: 'user_privileges',
	        controller: 'ctrl_user_privileges_master'
	    })
	     .state
		('settings', {
	        url: '/settings',
	        templateUrl: 'settings',
	        controller: 'ctrl_settings'
	    })
	    .state
		('test', {
	        url: '/test',
	        templateUrl: 'temp_form_type',
	        controller: 'ctrl_temp_form_type'
	    })
});
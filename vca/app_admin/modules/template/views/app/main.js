
var app=angular.module('examBios',['ui.bootstrap','ui.router','summernote','angularUtils.directives.dirPagination']);

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
		('department', {
	        url: '/department',
	        templateUrl: 'department',
	        controller: 'ctrl_department'
	    })
	    .state
		('guestbook', {
	        url: '/guestbook',
	        templateUrl: 'guestbook',
	        controller: 'ctrl_guestbook'
	    })
	    .state
		('contact', {
	        url: '/contact',
	        templateUrl: 'contact',
	        controller: 'ctrl_contact'
	    })
	    .state
		('booking', {
	        url: '/booking',
	        templateUrl: 'booking',
	        controller: 'ctrl_booking'
	    })
	     .state
		('hotdeal', {
	        url: '/hotdeal',
	        templateUrl: 'hotdeal',
	        controller: 'ctrl_hotdeal'
	    })
	    .state
		('doctor', {
	        url: '/doctor',
	        templateUrl: 'doctor',
	        controller: 'ctrl_doctor'
	    })
	    .state
		('timetable', {
	        url: '/timetable',
	        templateUrl: 'timetable',
	        controller: 'ctrl_timetable'
	    })
	    .state
		('news', {
	        url: '/news',
	        templateUrl: 'news',
	        controller: 'ctrl_news'
	    })
	     .state
		('appointment', {
	        url: '/appointment',
	        templateUrl: 'appointment',
	        controller: 'ctrl_appointment'
	    })
	    .state
		('gallery', {
	        url: '/gallery',
	        templateUrl: 'gallery',
	        controller: 'ctrl_gallery'
	    })
	    .state
		('slider', {
	        url: '/slider',
	        templateUrl: 'slider',
	        controller: 'ctrl_slider'
		})
		.state
		('course', {
	        url: '/course',
	        templateUrl: 'course',
	        controller: 'ctrl_course'
		})
		.state
		('services', {
	        url: '/services',
	        templateUrl: 'services',
	        controller: 'ctrl_services'
	    })
	    .state
		('help', {
	        url: '/help',
	        templateUrl: 'template/help'
		})
	
});
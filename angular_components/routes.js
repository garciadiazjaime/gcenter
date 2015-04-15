angular.module('mint.app.routes', [])
	.config([
		'$stateProvider',
		'$urlRouterProvider',
		function($stateProvider,
			$urlRouterProvider) {

			$stateProvider
				.state('home', {
					url: '/',
					views: {
						'main-view': {
							controller: 'ReportController',
							templateUrl: '/partial/home'
						}
					}
				});

			$urlRouterProvider.otherwise('/');
		}
	]);
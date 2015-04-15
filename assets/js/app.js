var mintApp = angular.module('mintApp', [
	'ui.router',
	'ui.bootstrap',
	'ngAnimate',
	'mint.app.routes',
	'mint.app.NavigationController',
	'mint.app.ReportController'
]).config(['$locationProvider',
	function($locationProvider) {
		$locationProvider.html5Mode({
			enabled: true,
			requireBase: false
		});
	}
]);
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
angular.module('mint.app.NavigationController', [])
	.controller('NavigationController', ['$scope', function($scope) {

		$scope.$on('loadPage', function(_, data) {
			console.log(data);
		});

		var init = function() {
			console.log('NavigationController');
		};

		init();
	}]);
angular.module('mint.app.ReportController', [])
	.controller('ReportController', ['$scope', function($scope) {

		var init = function() {
			console.log('ReportController');
			$scope.$emit('loadPage', 'home');
		};

		init();
	}]);
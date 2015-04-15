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
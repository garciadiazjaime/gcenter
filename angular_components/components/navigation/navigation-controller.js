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
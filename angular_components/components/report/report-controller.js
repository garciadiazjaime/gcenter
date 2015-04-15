angular.module('mint.app.ReportController', [])
	.controller('ReportController', ['$scope', function($scope) {

		var init = function() {
			console.log('ReportController');
			$scope.$emit('loadPage', 'home');
		};

		init();
	}]);
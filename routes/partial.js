exports.home = function(req, res, next) {
	console.log('partial: home');
	res.render('section/home', {
		title: 'yea'
	});
};


exports.about_us = function(req, res, next) {
	console.log('partial: about_us');
	res.render('section/about-us', {
		title: 'wuuu'
	});
};
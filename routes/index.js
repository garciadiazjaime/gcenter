exports.partial = require('./partial');

exports.home = function(req, res) {
	console.log('section: home');
	res.render('layout/base', {
		msg: 'Welcome to the Practical Node.js!!'
	});
};
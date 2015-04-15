var express = require('express'),
	http = require('http'),
	path = require('path'),
	routes = require('./routes');
	// mongoskin = require('mongoskin'),
	// dbUrl = process.env.MONGOHQ_URL || 'mongodb://@localhost:27017/qchc',
	// db = mongoskin.db(dbUrl, {
	// 	safe: true
	// }),
	// collection = {
	// 	place: db.collection('place'),
	// };

var session = require('express-session'),
	logger = require('morgan'),
	errorHandler = require('errorhandler'),
	cookieParser = require('cookie-parser'),
	bodyParser = require('body-parser'),
	methodOverride = require('method-override');

var app = express();

// app.use(function(req, res, next) {
// 	if (!collection.place) return next(new Error("No collections."));
// 	req.collection = collection;
// 	return next();
// });

app.set('port', process.env.PORT || 3000);
app.set('views', path.join(__dirname, 'template'));
app.set('view engine', 'jade');

app.use(logger('dev'));
app.use(bodyParser.json());
app.use(bodyParser.urlencoded());
app.use(express.static(path.join(__dirname, 'assets')));
app.use(express.static(path.join(__dirname, 'bower_components')));

app.get('/partial/home', routes.partial.home);
app.get('/', routes.home);

app.all('*', function(req, res) {
	res.send(404);
});

http.createServer(app).listen(app.get('port'), function() {
	console.info('Express server listening on port ' + app.get('port'));
});
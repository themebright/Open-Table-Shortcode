var del   = require( 'del' );
var fs    = require( 'fs' );
var gulp  = require( 'gulp' );
var shell = require( 'gulp-shell' );
var wpPot = require( 'gulp-wp-pot' );
var zip   = require( 'gulp-zip' );

var pkg = JSON.parse( fs.readFileSync( 'package.json' ) );

gulp.task( 'translate', function() {
	return gulp.src( '**/*.php' )
		.pipe( wpPot( {
			domain: pkg.name,
			package: 'Shortcode for OpenTable Widget',
		} ) )
		.pipe( gulp.dest( pkg.name + '/languages/' + pkg.name + '.pot' ) );
} )

gulp.task( 'copy', [ 'translate' ], function( cb ) {
	return gulp.src( [
  	'**',
  	'!node_modules/',
  	'!node_modules/**',
  	'!gulpfile.js',
  	'!package.json',
  	'!dotorg-assets/',
  	'!dotorg-assets/**'
  ] )
  	.pipe( gulp.dest( 'temp/' + pkg.name + '/' ) );
} );

gulp.task( 'zip', [ 'copy' ], function() {
	return gulp.src( 'temp/' + pkg.name + '/**/*' )
		.pipe( zip( pkg.name + '-' + pkg.version + '.zip' ) )
		.pipe( gulp.dest( 'temp/' ) );
} );

gulp.task( 'export', [ 'zip' ], shell.task( 'mv temp/' + pkg.name + '-' + pkg.version + '.zip ~/Desktop/' ) );

gulp.task( 'clean', [ 'export' ], function() {
	return del( 'temp/' );
} );

gulp.task( 'default', [ 'translate', 'copy', 'zip', 'export', 'clean' ] );

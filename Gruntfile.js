module.exports = function(grunt) {


	require('load-grunt-tasks')(grunt);

	grunt.initConfig({

		watch: {

			less: {
				files: ['assets/**/*.less'],
				tasks: ['less:dist', 'rsync'],
			},

			js : {
				files: ['assets/js/**/*.js'],
				// tasks: ['jshint'],
				options: {
					livereload: true,
					livereloadOnError: false,
					spawn: false
				}
			},
			
			css: {
				files: ['assets/css/*.css'],
				// tasks: [ 'wait'],
				options: {
					livereload: true,
					livereloadOnError: false,
					spawn: false
				}
			},

			other: {
				files: ['**/*.php'],
				options: {
					livereload: true,
				}
			}
		},

		jshint: {
			all: ['assets/js/**/*.js', '!assets/js/vendor/**/*.js']
		},

		less: {
			dist: {
				options: {
					compress: false,
					sourceMap: true,
					sourceMapFilename: "assets/css/dwlaventurier.min.css.map", //Write the source map to a separate file with the given filename.
          sourceMapURL: 'dwlaventurier.min.css.map', // the complete url and filename put in the compiled css file
          sourceMapBasepath: 'assets/css/', // Sets sourcemap base path, defaults to current working directory.
          sourceMapRootpath: '', // adds this path onto the sourcemap filename and less file paths

				},
				files: {
					"assets/css/dwlaventurier.min.css": "assets/less/flat/flat.less"
				},
			}
		},

		rsync: {
			options: {
				// args: ["-q"],
				//exclude: [".git*","assets/less","node_modules"],
				recursive: true
			},
			dist: {
				options: {
					// src: ["./assets/css/dw-timeline-pro-flat.min.css", "./assets/css/dw-timeline-pro-flat.min.css.map"],
					// dest: "/var/www/html/laventurierviking/wp-content/themes/dw-timeline-pro/assets/css/",

					src: "./assets/css",
					dest: "/var/www/html/laventurierviking/wp-content/themes/dwlaventurier/assets",
					host: "laventurier@onlinet",
				}
			}
		},

		wait: {
			options: {
				delay: 5000
			},
			pause: {      
				options: {
					
				}
			},
		},

	});

grunt.registerTask('default', ['watch']);
};
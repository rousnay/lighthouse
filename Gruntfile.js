     /*!
     * @author Md. Mozahidur Rahman
     */
     'use strict';
     
    //Grunt Module function
    module.exports = function (grunt) {

    //Grunt Configuration
    grunt.initConfig({

    //Get package meta data
    pkg: grunt.file.readJSON('package.json'),


    //Set project object
    project: {
    	bower: 'src/components'
    },


    // //Project banner
    // tag: {
    // 	banner: '/*!\n' +
    // 	' * <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> \n' +
    // 	' * @author <%= pkg.author %>\n' +
    // 	' * @version <%= pkg.version %>\n' +
    // 	' * Copyright <%= pkg.copyright %>. Injected Motion . <%= pkg.license %> licensed.\n' +
    // 	' */\n'
    // },


    //concat

    // concat:{
    // 	options:{
    // 		seperator: "\n\n"
    // 	},

    // 	js: {
    // 		files: {
    // 			'<%= project.js %>/lighthouse-settings.js': ['<%= project.src %>/js/lighthouse-settings.js'],
    // 			'<%= project.dist %>/js/vendor.js': ['<%= project.bower %>/bootstrap-sass/assets/javascripts/bootstrap.js', '<%= project.bower %>/retina.js/dist/retina.js']
    // 		}
    // 	},

    // 	build: {
    // 		files: {
    // 			'<%= project.build %>/js/app.min.js': ['<%= project.dist %>/js/jquery.min.js','<%= project.dist %>/js/main.min.js','<%= project.dist %>/js/vendor.min.js']
    // 		}
    // 	},
    // },
    
//copy

copy: {
  dev: {
    files: [
      // includes files within path
      {expand: true, flatten: true, src: ['src/js/**'], dest: 'js/', filter: 'isFile'},
      {expand: true, flatten: true, src: ['<%= project.bower %>/jquery/dist/*.min.js'], dest: 'js/', filter: 'isFile'},
      // includes files within path and its sub-directories
      //{expand: true, src: ['path/**'], dest: 'dest/'},

      // makes all src relative to cwd
      //{expand: true, cwd: 'path/', src: ['**'], dest: 'dest/'},

      // flattens results to a single level
      //{expand: true, flatten: true, src: ['path/**'], dest: 'dest/', filter: 'isFile'},
    ],
  },

},

    uglify: {
    	my_target: {
    		files: [{
    			expand: true,
    			cwd: 'js',
    			src: ['*.js', '!*.min.js'],
    			dest: 'js',
    			ext: '.min.js'
    		}]
    	}
    },

   //Sass
   sass:{
   	dev: {
   		options: {
   			style: 'expanded',
   			//lineNumbers: true,
   			//compass: true
   			sourcemap: 'none'
   		},
   		files:{
   			'css/style.css' : 'src/sass/style.scss'
   		}
   	},
   	dist: {
   		options: {
   			style: 'compressed',
   			sourcemap: 'none'
   		},
   		files:{
   			'css/style.min.css' : 'src/sass/style.scss'
   		}
   	},

   },

   //Autoprefixer
   autoprefixer:{
   	options:{
   		browsers:['last 2 versions']
   	},

   	multiple_files:{
   		expand:true,
   		flatten:true,
   		src:'<%= project.css %>/*.css',
   		dist:''
   	}
   },

// //cssmin
// cssmin: {
// 	dist: {
// 		files: [{
// 			expand: true,
// 			cwd: 'dist/css/',
// 			src: ['*.css', '!*.min.css'],
// 			dest: 'dist/css/',
// 			ext: '.min.css'
// 		}]
// 	},
// 	build: {
// 		options: {
// 			keepSpecialComments: 0,
// 		},
// 		files: [{
// 			expand: true,
// 			cwd: 'build/css/',
// 			src: ['*.css', '!*.min.css'],
// 			dest: 'build/css/',
// 			ext: '.min.css'
// 		}]
// 	}
// },


// //Uncss
// uncss: {
// 	dist: {
// 		options: {
// 			report       : 'min'
// 		},
// 		files: {
// 			'build/css/app.css': ['<%= project.dist %>/index.html']
// 		}
// 	}
// },

  //jshint
  jshint: {
    // beforeconcat: ['<%= project.src %>/js/script.js', '<%= project.src %>/js/script1.js'],
    // afterconcat: ['<%= project.js %>/main.js'],
    // afteruglify: ['<%= project.build %>/js/app.min.js']
        options: {
      curly: true,
      eqeqeq: true,
      eqnull: true,
      browser: true,
      globals: {
        jQuery: true
      },
    },
    all: ['src/js/*.js'],
  },

   //Watch
   watch: {
    	// options: {
    	// 	livereload: true,
    	// },
    	css: {
    	files: 'src/{,*/}*.{scss,js}',
    	tasks: ['copy','uglify','sass','autoprefixer','jshint']
    }
}
});

    // Load the plugin manually
    //grunt.loadNpmTasks('grunt-contrib-uglify');

    
    //Load the Grunt plugins automatically
    require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

    //Default task, Run `grunt` on the command line
    grunt.registerTask('default', ['watch']);
    
    //Build task, Run `grunt build` on the command line
    // grunt.registerTask('build', ['concat:js','copy', 'sass:dist', 'cssmin:dist', 'uncss', 'uglify','concat:build','cssmin:build']);
    
};
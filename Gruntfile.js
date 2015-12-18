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
    	src: 'src',
    	css:'css',
    	js:'js',
    	bower: 'src/components'
    },


    //Project banner
    tag: {
    	banner: '/*!\n' +
    	' * <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> \n' +
    	' * @author <%= pkg.author %>\n' +
    	' * @version <%= pkg.version %>\n' +
    	' * Copyright <%= pkg.copyright %>. Injected Motion . <%= pkg.license %> licensed.\n' +
    	' */\n'
    },

    //concat
    concat:{
    	options:{
    		seperator: "\n\n"
    	},

    	// js: {
    	// 	files: {
    	// 		'<%= project.js %>/lighthouse-settings.js': ['<%= project.src %>/js/lighthouse-settings.js'],
    	// 		'<%= project.dist %>/js/vendor.js': ['<%= project.bower %>/bootstrap-sass/assets/javascripts/bootstrap.js', '<%= project.bower %>/retina.js/dist/retina.js']
    	// 	}
    	// },

    	// build: {
    	// 	files: {
    	// 		'<%= project.build %>/js/app.min.js': ['<%= project.dist %>/js/jquery.min.js','<%= project.dist %>/js/main.min.js','<%= project.dist %>/js/vendor.min.js']
    	// 	}
    	// },
    },
    
//copy

copy: {
	dev: {
		files:[{
			'<%= project.js %>/*.js': '<%= project.src %>/js/*.js'
		}, 
		{
			'<%= project.js %>/jquery.min.js': '<%= project.bower %>/jquery/dist/jquery.min.js'
		}, 
		// {expand: true, flatten: true, src: ['src/fonts/**'], dest: '<%= project.dist %>/fonts/', filter: 'isFile'},
		// {expand: true, flatten: true, src: ['src/img/**'], dest: '<%= project.dist %>/img/', filter: 'isFile'}
		]

	}
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
    
  //jshint
  jshint: {
  	// beforeconcat: ['<%= project.src %>/js/script.js', '<%= project.src %>/js/script1.js'],
  	// afterconcat: ['<%= project.js %>/main.js'],
  	// afteruglify: ['<%= project.build %>/js/app.min.js']
    all: ['<%= project%>/Gruntfile.js','<%= project.src %>/js/*.js','<%= project.js %>/*.js']
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
   			'<%= project.css %>/style.css' : '<%= project.src %>/sass/style.scss'

   		}
   	},
   	dist: {
   		options: {
   			style: 'compressed',
   			sourcemap: 'none'
   		},
   		files:{
   			'<%= project.css %>/style.min.css' : '<%= project.src %>/sass/style.scss'

   		}
   	},

   },

   //Autoprefixer
   autoprefixer:{
   	options:{
   		browsers:['last 2 versions']
   	},
   	//prefix all files
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


   //Watch
   watch: {
    	// options: {
    	// 	livereload: true,
    	// },
    	css: {
    	// files: '<%= project.src %>/{,*/}*.{scss,sass,js,html,jpg,gif,png}',
    	files: '<%= project.src %>/{,*/}*.{scss,js}',
    	tasks: ['copy','uglify','sass','jshint','sass','autoprefixer']
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
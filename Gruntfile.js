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

//copy
copy: {
  dev: {
    files: [
    {expand: true, flatten: true, src: ['src/js/**'], dest: 'js/', filter: 'isFile'},
    {expand: true, flatten: true, src: ['<%= project.bower %>/bootstrap-sass/assets/javascripts/bootstrap.min.js'], dest: 'js/', filter: 'isFile'},
    {expand: true, flatten: true, src: ['<%= project.bower %>/matchHeight/dist/jquery.matchHeight-min.js'], dest: 'js/', filter: 'isFile'},
    {expand: true, flatten: true, src: ['<%= project.bower %>/jquery/dist/jquery.min.js'], dest: 'js/', filter: 'isFile'}
    ],
  },
},

//uglify
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

//Clean
clean: {
    dev: ['tmp'],
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
   			'tmp/styles.css' : 'src/sass/styles.scss'
   		}
   	},
    dist: {
     options: {
      style: 'compressed',
      sourcemap: 'none'
    },
    files:{
      'tmp/styles.min.css' : 'src/sass/styles.scss'
    }
  },

},

//Autoprefixer
autoprefixer: {
  options:{
    browsers:[    'Android >= 2.3',
    'BlackBerry >= 7',
    'Chrome >= 9',
    'Firefox >= 4',
    'Explorer >= 9',
    'iOS >= 5',
    'Opera >= 11',
    'Safari >= 5',
    'OperaMobile >= 11',
    'OperaMini >= 6',
    'ChromeAndroid >= 9',
    'FirefoxAndroid >= 4',
    'ExplorerMobile >= 9']
  },

  multiple_files: {
      expand: true,
      flatten: true,
      src: 'tmp/*.css',
      dest: 'css/'
  },
},


//jshint
jshint: {
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
  dev: {
    files: 'src/{,*/}*.{scss,js}',
    tasks: ['copy','uglify','clean','sass','autoprefixer']
  }
}


});

//Load the Grunt plugins automatically
require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

//Default task, Run `grunt` on the command line
grunt.registerTask('default', ['watch']);
};
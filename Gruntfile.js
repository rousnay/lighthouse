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
    {expand: true, flatten: true, src: ['<%= project.bower %>/jquery/dist/*.min.js'], dest: 'js/', filter: 'isFile'},
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
   src:'css/*.css',
   dist:''
 }
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
  css: {
  files: 'src/{,*/}*.{scss,js}',
  tasks: ['copy','uglify','sass','autoprefixer','jshint']
}
}
});

//Load the Grunt plugins automatically
require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

//Default task, Run `grunt` on the command line
grunt.registerTask('default', ['watch']);
};
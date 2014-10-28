module.exports = function(grunt) {
  // Project config
  grunt.initConfig({
    // Read the package file
    pkg: grunt.file.readJSON('package.json'),
    // Spell out the tasks
    jshint: {
      all: ['Gruntfile.js', 'themes/conduit/javascripts/site.js']
    },
    uglify: {
      min: {
        files: {
          'themes/conduit/javascripts/site.min.js': ['themes/conduit/javascripts/partials/menu.js', 'themes/conduit/javascripts/partials/site.js']
        }
      }
    },
    compass: {
      dist: {
        options: {
          config: 'themes/conduit/config.rb',
          force: true
        }
      }
    },
    watch: {
      css: {
        files: ['themes/conduit/sass/**/*.scss'],
        tasks: ['compass:dist']
      },
      js: {
        files: ['themes/conduit/javascripts/partials/**/*.js'],
        tasks: ['jshint:all', 'uglify:min']
      }
    },
    browserSync: {
      dev: {
        bsFiles: {
          src : 'themes/conduit/*.css'
        },
        options: {
          proxy: "allmybooks.dev",
          watchTask: true // < VERY important
        }
      }
    }
  });
  
  // Load the plugin that provides the task.
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-browser-sync');
  
  // Default task(s).
  grunt.registerTask('default', ['watch']);
};
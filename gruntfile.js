module.exports = function(grunt) {

  grunt.initConfig({
    sass: {
      dist: {
        files: {
          'css/main.css': 'dev/sass/main.scss'
        }
      }
    },
    copy: {
      main: {
        files: [
          // includes files within path
          {expand: true, flatten:true, src: ['node_modules/font-awesome/fonts/*'], dest: 'fonts/', filter: 'isFile'},
          {expand: true, flatten:true, src: ['bower_components/summernote/dist/font/*'], dest: 'fonts/', filter: 'isFile'},
          {expand: true, flatten:true, src: ['node_modules/bootstrap-colorpicker/dist/img/**/*'], dest: 'img/bootstrap-colorpicker/'},
        ],
      },
    },
    // we need to clean jquery ui so it won't throw an error because of missing require() which we don't need anyway.
    strip_code: {
      options: {
        pattern: /(?:var\s)??\w+\s=\srequire\(.+\);/gi
      },
      default: {
        files: [{
          src: 'node_modules/jquery-ui/jquery-ui.js',
          dest: 'dev/tmp/jquery-ui.js'
        }]
      }
    },
    compass: {
      dev: {
         options: {              
             sassDir: ['dev/sass'],
             cssDir: ['dev/tmp/css'],
             environment: 'development'
         }
      },
      prod: {
        options: {              
           sassDir: ['dev/sass'],
           cssDir: ['dev/tmp/css'],
           environment: 'production'
        }
      }
    },
    uglify: {
      default: {
        options: {
          sourceMap: true,
          compress: {
            drop_console: true
          }
        },
        files: {
          'js/editor.js': [
            'node_modules/lodash/index.js',
            'dev/tmp/jquery-ui.js', 
            'node_modules/gridstack/dist/gridstack.js', 
            'node_modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.js',
            'bower_components/summernote/dist/summernote.js', 
            'dev/js/editor.js'
          ]
/*          'js/common.js': [
            'node_modules/bootstrap-sass/assets/javascripts/bootstrap.js'
          ]*/
        }
      }
    },
    concat: {
      options: {
        stripBanners: true,
      },
      css: {
        src: [
          'dev/tmp/css/main.css',
          'node_modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css'
        ],
        dest: 'css/main.css',
      },
      common: {
        src: [
          'node_modules/jquery/dist/jquery.min.js', 
          'node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js',
          'dev/js/handlebars.runtime-v4.0.5.js',
          'dev/tmp/templates/*.js'
        ],
        dest: 'js/common.js',
      },
    },
    handlebars: {
        individualTemplates: {
            options: {
                namespace: "AVIJST",
                partialsUseNamespace: true,
                processName: function (filePath) {
                    return filePath.replace(/^dev\/handlebars\//, '').replace(/\.hbs$/, '');
                }
            },
            files: [{
                expand: true,                  // Enable dynamic expansion
                flatten: true,
                cwd: 'dev/handlebars/',                   // Src matches are relative to this path
                src: ['*.hbs'],   // Actual patterns to match
                dest: 'dev/tmp/templates/',                  // Destination path prefix, 
                rename: function (dest, matchedSrcPath, options) {
                    return (dest + matchedSrcPath).replace(/\.hbs/i, '.js');
                },
                compress: true
            }]
        }
    },
    watch: {
      compass: {
        files: ['dev/sass/*.{scss,sass}'],
        tasks: ['compass:dev', 'concat:css']
      },
      js: {
        files: ['dev/js/*.js'],
        tasks: ['strip_code', 'uglify', 'concat:common']
      },
      hbs: {
        files: ['dev/handlebars/*.hbs'],
        tasks: ['handlebars', 'concat:common']
      },
    }
  });

  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-strip-code');
  grunt.loadNpmTasks('grunt-contrib-handlebars');

  grunt.registerTask('default', ['handlebars', 'compass:prod', 'copy', 'strip_code', 'uglify', 'concat']);

};
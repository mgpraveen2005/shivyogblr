'use strict';

module.exports = function(grunt) {
    var tt = new Date().getTime() + "";
    var js_prod = "js/production/desktop." + tt + ".min.js";
    var css_prod = "less/production/desktop." + tt + ".min.css";
    grunt.option("js_prod", js_prod);
    grunt.option("css_prod", css_prod);
    grunt.option("tt", tt);
    // 1. All configuration goes here 
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        clean: {
            tests: ['tmp'],
            css: ['less/production/*'],
            js: ['js/production/*']
        },
        watch: {
            scripts: {
                files: ['js/libs/*.js', 'js/*.js'],
                tasks: ['js-task']
            },
            css: {
                files: ['less/*.less', 'less/*/*.less'],
                tasks: ['css-task']
            }
        },
        concat: {
            basic_and_extras: {
                files: {
                    'js/production/production.js': ['js/libs/*.js', 'js/*.js']
                },
            },
        },
        uglify: {
            options: {
                mangle: true
            },
            my_target: {
                files: {
                    "<%= grunt.option(\"js_prod\") %>": ['js/production/production.js']
                }
            }
        },
        less: {
            development: {
                options: {
                    paths: ["./less"],
                    compress: true,
                    yuicompress: true,
                    optimization: 2
                },
                files: {
                    // target.css file: source.less file
                    "<%= grunt.option(\"css_prod\") %>": "less/desktop.less"
                }
            }
        },
        uncss: {
            dist: {
                files: {
                    'less/desktop.css': [
                        'templates/article-right-rail.tpl',
                        'templates/article.tpl',
                        'templates/block-template.tpl',
                        'templates/footer.tpl',
                        'templates/forum-template.tpl',
                        'templates/header.tpl',
                        'templates/home.tpl',
                        'templates/horizontal-template.tpl',
                        'templates/navbar.tpl',
                        'templates/profile-page.tpl',
                        'templates/slideshow.tpl',
                        'templates/topx-template.tpl',
                        'templates/universal.tpl',
                        'templates/vertical-template.tpl'
                    ]
                },
                options: {
                    urls: ['http://shivyogbangalore.org/']
                }
            }
        },
        cssmin: {
            combine: {
                files: {
                      "<%= grunt.option(\"css_prod\") %>": ["less/desktop.css"]
                }
            }
        },
        /*   htmlmin: {// Task
         dist: {// Target
         options: {// Target options
         removeComments: true,
         collapseWhitespace: true,
         // removeEmptyAttributes: true,
         // minifyCSS: true
         },
         files: {// Dictionary of files
         
         'templates/build/article.tpl': 'templates/article.tpl',
         'templates/build/footer.tpl': 'templates/footer.tpl'                     
         }
         }
         },*/
        targethtml: {
            dist: {
                options: {
                    curlyTags: {
                        rlsdate: "<%= grunt.option(\"tt\") %>"
                    }
                },
                files: {
                    'templates/production/header.tpl': 'templates/header.tpl',
                    'templates/production/footer.tpl': 'templates/footer.tpl'
                }
            }
        }

    });
    // 3. Where we tell Grunt we plan to use this plug-in.
    // grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-less');
    //grunt.loadNpmTasks('grunt-uncss');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-targethtml');
    //grunt.loadNpmTasks('grunt-contrib-htmlmin');

    // 4. Where we tell Grunt what to do when we type "grunt" into the terminal.
    grunt.registerTask('default', ['clean', 'concat', 'uglify', 'less', 'targethtml']);
    //grunt.registerTask('default', ['watch']);
    grunt.registerTask('js-task', ['concat', 'uglify']);
    grunt.registerTask('css-task', ['concat', 'less']);
};

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
        cssmin: {
            combine: {
                files: {
                      "<%= grunt.option(\"css_prod\") %>": ["less/desktop.css"]
                }
            }
        },
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
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-targethtml');

    // 4. Where we tell Grunt what to do when we type "grunt" into the terminal.
    grunt.registerTask('default', ['clean', 'concat', 'uglify', 'less', 'targethtml']);
};

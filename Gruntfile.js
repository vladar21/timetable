module.exports = function(grunt){


    require("matchdep").filterDev("grunt-*").forEach(grunt.loadNpmTasks);

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        htmlhint: {
            build: {
                options: {
                    'tag-pair': true,
                    'tagname-lowercase': true,
                    'attr-lowercase': true,
                    'attr-value-double-quotes': true,
                    'doctype-first': true,
                    'spec-char-escape': true,
                    'id-unique': true,
                    'head-script-disabled': true,
                    'style-disabled': true
                },
                src: ['public/index.html']
            }
        },

        uglify: {
            build: {
                files: {
                    'public/js/main.min.js': ['src/main/js/*.js'],
                    'public/js/calendar.min.js': ['src/calendar/js/*.js']
                }
            }
        },

        cssmin: {
            build: {
                files: {
                    'public/css/main.min.css': ['src/main/css/*.css'],
                    'public/css/calendar.min.css': ['src/calendar/css/*.css']
                }
            }
        }

    });

    grunt.registerTask('default', []);

};
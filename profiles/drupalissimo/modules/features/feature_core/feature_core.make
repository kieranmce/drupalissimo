
api = 2
core = 7.x

; Modules =====================================================================

projects[pathauto][subdir] = contrib
projects[pathauto][version] = 1.2

projects[token][subdir] = contrib
projects[token][version] = 1.5

projects[colorbox][subdir] = contrib
projects[colorbox][version] = 1.6

projects[markdown][subdir] = contrib
projects[markdown][version] = 1.2

projects[insert][subdir] = contrib
projects[insert][version] = 1.3

projects[ds][subdir] = contrib
projects[ds][version] = 1.9

; Libraries ===================================================================

libraries[colorbox_library][download][type] = "get"
libraries[colorbox_library][download][url] = "http://github.com/jackmoore/colorbox/archive/master.zip"
libraries[colorbox_library][directory_name] = "colorbox"
libraries[colorbox_library][destination] = "libraries"

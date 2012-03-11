api = 2
core = 7.x

; Build Kit ===================================================================

includes[] = http://drupalcode.org/project/buildkit.git/blob_plain/refs/heads/7.x-2.x:/drupal-org.make

; Modules =====================================================================

projects[libraries][subdir] = contrib
projects[libraries][version] = 1.0

; Features ====================================================================

projects[feature_core][type] = module
projects[feature_core][subdir] = features
projects[feature_core][download][type] = "git"
projects[feature_core][download][url] = git.nuvole.org:/var/git/feature_core.git

; Themes ======================================================================

projects[twist][type] = theme
projects[twist][download][type] = git
projects[twist][download][url] = git.nuvole.org:/var/git/twist.git

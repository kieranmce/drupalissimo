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
projects[feature_core][download][url] = git://github.com/drupaltraining/feature_core.git

projects[feature_news][type] = module
projects[feature_news][subdir] = features
projects[feature_news][download][type] = "git"
projects[feature_news][download][url] = git://github.com/drupaltraining/feature_news.git

projects[feature_pages][type] = module
projects[feature_pages][subdir] = features
projects[feature_pages][download][type] = "git"
projects[feature_pages][download][url] = git://github.com/drupaltraining/feature_pages.git

projects[feature_spotlight][type] = module
projects[feature_spotlight][subdir] = features
projects[feature_spotlight][download][type] = "git"
projects[feature_spotlight][download][url] = git://github.com/drupaltraining/feature_spotlight.git

; Themes ======================================================================

projects[twist][type] = theme
projects[twist][download][type] = git
projects[twist][download][url] = git://github.com/drupaltraining/twist.git

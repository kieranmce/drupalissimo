<div id='branding'><div class='limiter clearfix'>
  <div class="position left size-70"><div class='breadcrumb'><?php print $breadcrumb ?></div></div>
  <div id='toggle' class="toggle-blocks position left size-30">
    <?php if (!$user->uid): ?><div class="login-link inner right" style=""><?php print l(t('Log in'), 'user'); ?></div><?php endif; ?>
    <?php if (isset($page['branding']) && !empty($page['branding'])): ?>
      <?php print render($page['branding']) ?>
    <?php endif; ?>
  </div>
</div></div>

<div id='header' class='limiter clearfix inner'>
  <?php if ($logo): ?>
    <div class='logo'><a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /></a></div>
  <?php endif; ?>
</div>

<div id='page-title'><div class='limiter clearfix inner'>
  <div class='tabs clearfix'>
    <?php if ($primary_local_tasks): ?>
      <ul class='primary-tabs links clearfix'><?php print render($primary_local_tasks) ?></ul>
    <?php endif; ?>
  </div>
  <?php if ($title): ?>
    <?php print render($title_prefix); ?>
    <h1 class='page-title <?php print $page_icon_class ?>'>
      <?php if (!empty($page_icon_class)): ?><span class='icon'></span><?php endif; ?>
      <?php if ($title) print $title ?>
    </h1>
  <?php endif; ?>
  <?php if ($action_links): ?>
    <ul class='action-links links clearfix'><?php print render($action_links) ?></ul>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
</div></div>

<?php if ($show_messages && $messages): ?>
<div id='console'><div class='limiter clearfix inner'><?php print $messages; ?></div></div>
<?php endif; ?>

<?php if (!empty($page['featured'])): ?>
  <div id='featured'><div class='limiter clearfix inner'>
    <?php print render($page['featured']) ?>
  </div></div>
<?php endif; ?>


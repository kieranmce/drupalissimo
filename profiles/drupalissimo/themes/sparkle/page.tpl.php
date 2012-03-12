<?php print $page_header; ?>

<div id='page'><div id='main-content' class='limiter clearfix inner'><div class='main-inner clearfix'>   
  <?php if ($page['help']) print render($page['help']) ?>
  <div id='content' class='page-content clearfix'>
    <div id='page-title'><div class='clearfix inner'>
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
    
    <?php if (!empty($page['content'])) print render($page['content']) ?>
  </div>
</div></div></div>

<?php print $page_footer; ?>

<div class="sidebar-object">
  <ul>
    <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("sidebar_info")) : endif; ?>   
  </ul>
</div>
<div class="sidebar-object">
  <h3>Litteraturtips</h3>
  <?php if (function_exists('printPostsPerPosttype')) printPostsPerPosttype('litteraturtips', 5, true); ?>
</div>
<div class="sidebar-object sidebar-object-no-border">
  <?php
  global $rc;
  if (method_exists($rc, 'rep_carousel'))
    $rc->rep_carousel('rep-carousel', false);
  ?>
</div>
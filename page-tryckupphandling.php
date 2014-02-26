<?php
/**
 * 
 * 
 */
?>



<?php get_header();
?>
<div class="container">
  <div class="row">
    <div class="col-sm-3" id="nav-sidebar">
      <?php include 'snippets/eu_widget_sidebar.php'; ?>
    </div>  

    <div class="col-sm-6">
      <h1><?php the_title(); ?></h1>
      <?php
      global $rfaq;
      if (method_exists($rfaq, 'displayFAQ'))
      $rfaq->displayFAQ();
      ?>
    </div>

    <div class="col-sm-3">
      <?php include 'snippets/eu_sidebar.php'; ?>
    </div>

  </div>
</div>  <!-- end container -->
<?php get_footer(); ?>




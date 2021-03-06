<?php get_header();
?>
<div class="container">
  <div class="row">
    <div class="col-sm-3" id="nav-sidebar">
    <?php include 'snippets/eu_widget_sidebar.php';?>
    </div>
    <?php
    if (have_posts()) : while (have_posts()) : the_post();
        ?>
        <div class="col-sm-6 rep-content">
          <article id="post-<?php the_ID(); ?>" <?php post_class("rep-article"); ?>>
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
          </article>
        </div>  
        <?php
      endwhile;
    else:
      ?>
      <div class="span12">  
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
      </div>
    <?php endif; ?>  
    <div class="col-sm-3">
      <?php include 'snippets/eu_sidebar.php';?>
    </div>
  </div>
</div>  <!-- end container -->
<?php get_footer(); ?>
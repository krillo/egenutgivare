<?php get_header(); ?>
<div class="container">
  <div class="row">
    <?php //if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
    <div class="col-sm-3" id="nav-sidebar">
      <?php include 'snippets/eu_widget_sidebar.php';?>
    </div>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="col-sm-6">
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
          </article>
          <?php comments_template(); ?>
        </div>   
        <?php
      endwhile;
    else:
      ?>
      <div class="col-sm-7">
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
      </div>
    <?php endif; ?>  
    <div class="col-sm-3">
      <?php include 'snippets/eu_sidebar.php';?>
    </div>
  </div>
</div>  <!-- end container -->
<?php get_footer(); ?>
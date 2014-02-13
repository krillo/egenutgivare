<?php get_header(); ?>
<div class="container">
  <div class="row" id="">
    <div class="col-sm-2" id="nav-sidebar">
      <?php if (function_exists('rep_page_hierarchy')) rep_page_hierarchy(); ?>
    </div>  
    <?php if (have_posts()) : ?>
      <div class="col-sm-7">
        <h1><?php single_cat_title(); ?></h1>
        <?php while (have_posts()) : the_post(); ?>
          <div class="row">
            <article id="post-<?php the_ID(); ?>" class="col-sm-12">
              <header>
                <h2><?php the_title(); ?></h2>
                <div class="pub-info"><i class="fa fa-calendar-o"></i><time pubdate="pubdate"><?php the_modified_date(); ?></time> <i class="fa fa-pencil"></i>Skriven av <?php the_author(); ?> <i class="fa fa-tags"></i> <?php the_tags(' '); ?></div>
              </header>
              <div class="archive-content"><?php the_excerpt(); ?>
                <a href="<?php the_guid(); ?>"> Läs mer &raquo;</a>
              </div>
            </article>
          </div>
        <?php endwhile; ?>
        <?php
        if (function_exists('bootstrap3_pagination')) {
          bootstrap3_pagination();
        }
        ?>        
      </div>
    <?php else: ?>
      <div class="row">
        <div class="col-sm-7">
          <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        </div>
      </div>
    <?php endif; ?>  
    <div class="col-sm-3">
      <?php include 'snippets/eu_sidebar.php';?>
    </div>
  </div>
</div>  <!-- end container -->
<?php get_footer(); ?>
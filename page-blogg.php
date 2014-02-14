<?php
/**
 * Template Name: Blogg
 * @author Kristain Erendi
 * @subpackage Template
 * 
 * Notice! don't forget to copy the header-home 
 */
get_header();
?>
<div class="container">
  <div class="row">
    <div class="col-sm-3" id="nav-sidebar">
      <?php include 'snippets/eu_widget_sidebar.php'; ?>
    </div>  

    <div class="col-sm-6">
      <h1>Blogg</h1>
      <?php
      $myposts = get_posts('');
      foreach ($myposts as $post) :
        setup_postdata($post);
        ?>
        <div class="row post-item">
          <div class="col-sm-12">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
              <h2><?php the_title(); ?></h2>
              <div class="pub-info"><i class="fa fa-calendar-o"></i><time pubdate="pubdate"><?php the_modified_date(); ?></time> <i class="fa fa-thumb-tack"></i><?php the_category(', '); ?> <i class="fa fa-tags"></i><?php the_tags(' '); ?></div>
              <?php the_excerpt(); ?>
              <a href="<?php the_permalink(); ?>"  title="<?php the_title_attribute(); ?>">Läs mer</a>
            </article>
          </div>
        </div>
        <?php
      endforeach;
      wp_reset_postdata();
      ?>
    </div>
    
    <div class="col-sm-3">
      <?php include 'snippets/eu_sidebar.php'; ?>
    </div>
    
    
    
  </div>
</div>
<?php get_footer(); ?>
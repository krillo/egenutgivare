<?php get_header();
?>
<div class="container">
  <div class="row">
    <?php //if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
    <div class="col-md-2" id="nav-sidebar">
      <?php if (function_exists('rep_page_hierarchy')) rep_page_hierarchy(); ?>
    </div>
    <?php
    if (have_posts()) : while (have_posts()) : the_post();
        ?>
        <div class="col-md-7 rep-content">
          <article id="post-<?php the_ID(); ?>" <?php post_class("rep-article"); ?>>
            <h1><?php the_title(); ?></h1>
            <?php echo wp_get_attachment_image(get_field('bild'), 'profile-thumb');?><br>
            Yrke: <?php the_field('yrke')?><br>
            Hemsida: <?php the_field('hemsida')?><br>
            Email: <?php the_field('email')?><br>
            Telefon: <?php the_field('telefon')?><br>
            Om mig: <br><?php the_field('om_mig')?>
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
    <div class="col-md-3">
<?php include 'snippets/eu_sidebar.php'; ?>
    </div>    
  </div>
</div>  <!-- end container -->
<?php get_footer(); ?>
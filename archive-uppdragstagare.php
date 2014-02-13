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
          <div class="row archive-uppdragstagare">
            <article id="post-<?php the_ID(); ?>" class="col-sm-12">
              <header class="col-sm-12">
                <h2><?php the_title(); ?></h2>
                <div class="spotlight-info">(<?php the_field('yrke'); ?>)</div>
                <div class="spotlight-contact"><i class="fa fa-home" style="padding-left:0;"></i><a href="<?php the_field('hemsida'); ?>" target="_blank"><?php the_field('hemsida'); ?></a>  <i class="fa fa-envelope"></i><a href="mailto:<?php the_field('e-mail'); ?>" target="_blank"><?php the_field('e-mail'); ?></a> <i class="fa fa-phone-square"></i><a href="tel:+<?php the_field('telefon'); ?>"><?php the_field('telefon'); ?></a></div>
              </header>
                <div class="col-sm-5">
                  <?php echo wp_get_attachment_image(get_field('bild'), 'profile-thumb'); ?>
                </div>  
              <div class="archive-content col-sm-7"><?php echo mb_substr(get_field('om_mig'), 0, 230); ?><br/>
                <a href="<?php the_permalink(); ?>" class="btn btn-default btn-xs"> Läs mer om <?php the_title(); ?></a>
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
<?php
/**
 * Template Name: Förstasidan
 * @author Kristain Erendi
 * @subpackage Template
 * 
 * Notice! don't forget to copy the header-home 
 */
//rep_get_header_home();
get_header();
?>
<div class="container" id="main-container">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div class="row">
        <div  class="col-md-9">
          <div class="col-md-8 rep-inner-left">
            <div class="cat-container-border">
              <?php if (function_exists('printPostsPerCat')) eu_printPostsPerCat('Okategoriserade', 1, 0, 300); ?>
            </div>
            <a href="/" class="btn btn-primary" style="float:right;">Läs mer av de senaste</a>
          </div>  
          <div class="col-md-4 rep-inner-right">
            <div class="cat-container-border">
              <?php if (function_exists('printPostsPerCat')) eu_printPostsPerCat('Okategoriserade', 1, 1, 60, 'cat-minimum'); ?>
            </div>
            <div class="cat-container-border">
              <?php if (function_exists('printPostsPerCat')) eu_printPostsPerCat('Okategoriserade', 1, 2, 60, 'cat-minimum'); ?>
            </div>
            <div class="cat-container-border">
              <?php if (function_exists('printPostsPerCat')) eu_printPostsPerCat('Okategoriserade', 1, 3, 60, 'cat-minimum'); ?>
            </div>

          </div>  
          <div class="row">
            <div class="col-md-12 ">
              <?php printSpotlight('uppdragstagare', 1, true, 320); ?>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12 ">
              <div class="spotlight-border tryckupphandling">
                <div class="spotlight spotlight-no-footer">
                  <div class="col-md-12">
                    <div class="spotlight-heading">
                      <h2>Tryckupphandling</h2>
                    </div>
                    <div class="clearfix"></div>
                    <div class="spotlight-txt">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id dolor id nibh ultricies vehicula ut id elit. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.Morbi leo risus, porta ac consectetur ac, vestibulum at
                    </div>
                    <a href="/tryckupphandling/" class="btn btn-primary spotlight-button" style="float:right;">Läs mer om tryckupphandling</a>
                  </div>
                </div>              
              </div>
            </div>
          </div>

        </div>
        <?php
      endwhile;
    endif;
    ?>



    <div class="col-md-3">
      <div class="sidebar-object sidebar-object-no-border">
        <?php
        global $rc;
        if (method_exists($rc, 'rep_carousel'))
          $rc->rep_carousel('rep-carousel', false);
        ?>
      </div>
      <div class="sidebar-object">
        <ul>
          <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("sidebar_info")) : endif; ?>   
        </ul>
      </div>
      <div class="sidebar-object">
        <h3>Litteraturtips</h3>
        <?php if (function_exists('printPostsPerPosttype')) printPostsPerPosttype('litteraturtips', 5, true); ?>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>


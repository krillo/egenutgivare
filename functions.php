<?php

/**
 * Egenutgivare
 * Author: Kristian Erendi
 * Author URI: http://reptilo.se/
 * Date: 2014-02-07
 * @package WordPress
 * @subpackage egenutgivare
 * @since Egenutgivare 1.0
 */
include_once 'bin/eu_posttypes.php';
include_once get_template_directory() . "/bin/ReptiloCarousel.php";
include_once get_template_directory()."/bin/ReptiloFAQ.php";

/**
 * custom size for images
 */
if ( function_exists( 'add_image_size' ) ) { 
	add_image_size('profile-thumb', 200, 180, true);
	add_image_size('bokomslag', 45, 70, true);
}

/**
 * Display posts from:
 * 1. post type
 * 2. nbr
 * 3. random order or latest
 *  
 * @global Post $post
 * @param string $posttype
 * @param int $nbr
 * @param boolean $random
 */
function printPostsPerPosttype($posttype = 'litteraturtips', $nbr = 1, $random = false, $nbrDigits = 40) {
  global $post;
  $args = array('post_type' => $posttype, 'posts_per_page' => $nbr);
  if ($random) {
    $args['orderby'] = 'rand';
  }
  $loop = new WP_Query($args);
  if ($loop->have_posts()):
    $i = 0;
    while ($loop->have_posts()) : $loop->the_post();
      if($i % 2 == 0){
        $zebra_class = 'zebra'; 
      } else {
        $zebra_class = ''; 
      }
      $i++;  
      $img = wp_get_attachment_image(get_field('bild'), 'bokomslag');
      $title = mb_substr(get_the_title(), 0, 32). '..';
      $author = mb_substr(get_field('forfattare'), 0, 32). '..';
      $text = mb_substr(get_field('text'), 0, 32);
      $text = $text == ''? $text : $text. '..';
      $url = get_field('isbn');  //notis its is now a link!!
      $readingbox .= <<<RB
        <div class="posttype-container $zebra_class">
          <div class="posttype-img">
            $img
          </div>        
          <div class="posttype-content">
            <b>$title</b><br/>
            $author<br/>
            $text<br/>
            <a href="$url" target="_blank" class="">Läs mer om boken</a>
          </div>
        </div>              
RB;
    endwhile;
  endif;
  wp_reset_query();
  echo $readingbox;
}

/**
 * Display posts from a category.
 * Bootstrap 3 style
 * 
 * @global type $post
 * @param type $category  - the slug
 * @param type $nbr - nbr of posts to show
 */
function eu_printPostsPerCat($category = 'aktuellt', $nbr = 1, $offset = 0, $nbrDigits = 100, $extraclass = '', $nbrDigitsTitle = 30) {
  global $post;
  $nbr = $nbr + $offset;
  $args = array('category_name' => $category, 'posts_per_page' => $nbr);
  $loop = new WP_Query($args);
  if ($loop->have_posts()):
    $i = 0;
    while ($loop->have_posts()) : $loop->the_post();
      if ($i >= $offset) {
        $guid = get_permalink();
        if ($extraclass == 'cat-minimum') {  //small version
          if(strlen(get_the_title()) > $nbrDigitsTitle){
            $title = mb_substr(get_the_title(), 0, $nbrDigitsTitle).'...';
          } else {
            $title = get_the_title();
          }
          $content = mb_substr(get_the_excerpt(), 0, $nbrDigits) . ' &nbsp;' . '<a href="' . $guid . '" target="" class="">Läs mer...</a>';
        } else {
          $title = get_the_title();
          $content = mb_substr(get_the_excerpt(), 0, $nbrDigits) . '...' . '<br/><a href="' . $guid . '" target="" class="btn btn-default btn-xs">Läs mer</a>';
        }
        $modified_date = get_the_modified_date();
        $author = get_the_author();
        $the_tags = '';
        $posttags = get_the_tags();
        if ($posttags) {
          foreach ($posttags as $tag) {
            $the_tags .= $tag->name . ' ';
          }
        }
        $img = '';
        if (has_post_thumbnail()) {
          $img = get_the_post_thumbnail(null, 'profile-thumb');
        }
        $readingbox .= <<<RB
<div class="cat-container $extraclass">
  <section>
    <h2><a href="$guid">$title</a></h2>
    <div class="pub-info"><i class="fa fa-calendar-o"></i><time pubdate="pubdate">$modified_date</time> <i class="fa fa-tags"></i>$the_tags</div>
    <div class="pub-info-small"><i class="fa fa-calendar-o"></i><time pubdate="pubdate">$modified_date</time></div>
    <div>
      $img
      <div class="cat-content">
        $content
      </div>
    </div>
  </section>
</div>
RB;
      }
      $i++;
    endwhile;
  endif;
  wp_reset_query();
  echo $readingbox;
}





/**
 * Display posts from:
 * 1. post type
 * 2. nbr
 * 3. random order or latest
 *  
 * @global Post $post
 * @param string $posttype
 * @param int $nbr
 * @param boolean $random
 */
function printSpotlight($posttype = 'uppdragstagare', $nbr = 1, $random = true, $nbrDigits = 400) {
  global $post;
  $args = array('post_type' => $posttype, 'posts_per_page' => $nbr);
  if ($random) {
    $args['orderby'] = 'rand';
  }
  $loop = new WP_Query($args);
  if ($loop->have_posts()):
    while ($loop->have_posts()) : $loop->the_post();
      $content = mb_substr(get_field('om_mig'), 0, $nbrDigits) . '...';
      $name = get_the_title();
      $guid = get_permalink();
      $img = wp_get_attachment_image(get_field('bild'), 'profile-thumb');
      $work = get_field('yrke');
      $homepage = get_field('hemsida');
      $email = get_field('e-mail');
      $phone = get_field('telefon');
      $readingbox .= <<<RB
             <div class="spotlight-border">
             <div class="spotlight">
              <div class="col-sm-8">
                <div class="spotlight-heading">
                  <h2><a href="$guid">$name</a></h2><div class="spotlight-info"> - $work</div>
                </div>
                <div class="clearfix"></div>      
                <div class="spotlight-txt">
                  $content
                </div>
                <a href="$guid" class="btn btn-primary spotlight-button" style="float:left;">Läs mer om $name</a>
              </div>
              <div class="col-sm-4">
                $img
              </div>
            </div>              
            </div>              
RB;
    endwhile;
  endif;
  wp_reset_query();
  echo $readingbox;
}

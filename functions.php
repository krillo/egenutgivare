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

/**
 * Display posts from a post type.
 * 
 * Bootstrap 3 style
 * 
 * @global type $post
 * @param type $category  - the slug
 * @param type $nbr - nbr of posts to show
 */

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
function printPostsPerPosttype($posttype = 'litteraturtips', $nbr = 1, $random = false) {
  global $post;
  $args = array('post_type' => $posttype, 'posts_per_page' => $nbr);
  if ($random) {
    $args['orderby'] = 'rand';
  }
  $loop = new WP_Query($args);
  if ($loop->have_posts()):
    while ($loop->have_posts()) : $loop->the_post();
      //$content = mb_substr(get_the_content(), 0, $nbrDigits) . '...';
      $content = get_the_excerpt();
      $title = get_the_title();
      $guid = get_the_guid();
      $readingbox .= <<<RB
<div class="cat-container">
  <section>
    <h2>Aktuellt just nu: <span>$title</span></h2>
    <p>$content</p>
    <a href="$guid" target="" class="btn btn-default btn-xs">Läs mer</a>
  </section>
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
function eu_printPostsPerCat($category = 'aktuellt', $nbr = 1, $offset = 0, $nbrDigits = 100, $extraclass = '') {
  global $post;
  $nbr = $nbr + $offset;
  $args = array('category_name' => $category, 'posts_per_page' => $nbr);
  $loop = new WP_Query($args);
  if ($loop->have_posts()):
    $i = 0;
    while ($loop->have_posts()) : $loop->the_post();
      if ($i >= $offset) {
        if($extraclass == 'cat-minimum'){  //small version
          $content = mb_substr(get_the_excerpt(), 0, $nbrDigits) .' &nbsp;'. '<a href="'.$guid.'" target="" class="">Läs mer...</a>';
        }else{
          $content = mb_substr(get_the_excerpt(), 0, $nbrDigits) . '...' . '<br/><a href="'.$guid.'" target="" class="btn btn-default btn-xs">Läs mer</a>';
        }        
        $title = get_the_title();
        $guid = get_the_guid();
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
          $img = get_the_post_thumbnail(null, 'thumbnail');
        }
        $readingbox .= <<<RB
<div class="cat-container $extraclass">
  <section>
    <h2>$title</h2>
    <div class="pub-info"><i class="fa fa-calendar-o"></i><time pubdate="pubdate">$modified_date</time> <i class="fa fa-pencil"></i>Skriven av $author <i class="fa fa-tags"></i>$the_tags</div>
    <div class="pub-info-small">Av $author</div>
    <div>
      $img
      <div class="">
        $content
      <div>
    <div>
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


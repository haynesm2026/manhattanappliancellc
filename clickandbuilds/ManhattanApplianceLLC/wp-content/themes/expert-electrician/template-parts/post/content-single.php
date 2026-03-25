<?php
/**
 * Template part for displaying Single Posts
 *
 * @subpackage Expert Electrician
 * @since 1.0
 * @version 1.4
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="single-post">
    <div class="article_content">
      <div class="article-text">
        <h3 class="single-post"><?php the_title();?></h3>
        <div class="post-date">
          <span class="entry-date"><span><?php echo esc_html( get_the_date()); ?></span></span>
        </div>
        <?php if(has_post_thumbnail()) { ?>
          <?php the_post_thumbnail(); ?>  
        <?php }?>
        <p><?php the_content(); ?></p>
        <div class="single-post-tags mt-3"><?php the_tags(); ?></div>
        <hr>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</article>
<?php
/**
 * Posts Layout 4 for Optimizer
 *
 * Displays The Posts in Layout 4
 *
 * @package Optimizer
 *
 * @since Optimizer 1.0
 */
global $optimizer;

?>

<div class="lay4">
    <div class="center">
        <div class="lay4_wrap<?php if (!is_active_sidebar('sidebar')) { ?> no_sidebar<?php } ?>">
            <div class="lay4_inner">
                <?php if (have_posts()): ?><?php while (have_posts()): ?><?php the_post(); ?>
                    <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">

                        <!--POST THUMBNAIL START-->
                        <?php $no_post_thumb = false; //initialize variable to prevent undefined errors?>
                        <!--CALL TO POST IMAGE-->
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post_image">
                                <div class="imgwrap">
                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a></div>
                            </div>
                        <?php elseif (!optimizer_gallery_thumb() == ''): ?>
                            <div class="post_image">
                                <div class="imgwrap">
                                    <div class="icon_wrap animated fadeInUp">
                                        <a href="<?php the_permalink(); ?>" title="Mehr Lesen"><i
                                                    class="fa fa-plus"></i></a>
                                    </div>
                                    <a href="<?php the_permalink(); ?>"><img
                                                src="<?php echo optimizer_gallery_thumb(); ?>"
                                                alt="<?php the_title_attribute(); ?>" class="thn_thumbnail"/></a></div>
                            </div>
                        <?php elseif (!optimizer_first_image() == ''): ?>
                            <div class="post_image">
                                <div class="imgwrap">
                                    <a href="<?php the_permalink(); ?>"><img alt="<?php the_title(); ?>"
                                                                             src="<?php echo optimizer_first_image(); ?>"/></a>
                                </div>
                            </div>
                        <?php else :
                            //if post has no thumbnail, first image or gallery, set $no_post_thumb to true to make post content 100%
                            $no_post_thumb = true;

                        endif; ?>

                        <!--POST THUMBNAIL END-->

                        <!--POST CONTENT START-->
                        <!-- if $no_post_thumb is true, add style tag which makes the element's width 100%-->
                        <div class="post_content" <?php if($no_post_thumb){echo 'style="width:100%;"';} ?>>
                            <h2 class="postitle"><a href="<?php the_permalink(); ?>"
                                                    title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                            </h2>

                            <!--META INFO START-->
                            <?php if (!empty ($optimizer['post_info_id'])) { ?>
                                <div class="single_metainfo">
                                    <!--DATE-->
                                    <i class="fa-calendar"></i><a
                                            class="comm_date"><?php the_time(get_option('date_format')); ?></a>
                                    <!--AUTHOR-->
                                    <i class="fa-user"></i><?php global $authordata;
                                    echo get_the_author(); ?>
                                    <!--CATEGORY-->
                                    <i class="fa-th-list"></i>
                                    <div class="catag_list"><?php the_category(', '); ?></div>
                                </div>
                            <?php } ?>
                            <!--META INFO START-->

                            <?php optimizer_excerpt('optimizer_excerptlength_teaser', 'optimizer_excerptmore'); ?>

                        </div>
                        <!--POST CONTENT END-->
                        <!--Read More Button-->
                        <div class="blog_mo"><a href="<?php the_permalink(); ?>">+ Mehr Lesen</a></div>

                    </div>
                <?php endwhile ?>

                <?php endif ?>
            </div><!--lay4_inner class END-->

            <!--PAGINATION START-->
            <div class="ast_pagenav">
                <?php the_posts_pagination(array('mid_size' => 2, 'prev_text' => '', 'next_text' => '', 'screen_reader_text ' => '')); ?>
            </div>
            <!--PAGINATION END-->

            <?php wp_reset_postdata(); ?>

        </div><!--lay4_wrap class END-->

        <!--SIDEBAR START-->
        <?php get_sidebar(); ?>
        <!--SIDEBAR END-->

    </div><!--center class END-->
</div><!--lay4 class END-->

<?php

/* -Data comes from user, do we need sanitization? 
   -or validate to make sure its ok to comment */
// If the current post is protected by a password and the visitor has not yet entered the password, return early without loading the comments.
if (post_password_required()) {
    return;
}
?>

<section id="comments" class="comments-container"> <!-- Wrapper for comments -->
    <?php if (have_comments()) : ?>
        <h2 class="comments-title-container">
            <?php $comments_number = get_comments_number(); ?>
            <?php echo $comments_number; ?> Comments →
            <span class="comments-title"><?php the_title(); ?></span>
        </h2>

        <ol class="comment-list">
            <?php
            wp_list_comments(
                array(
                    'style'      => 'ol',
                    'short_ping' => true,
                    'avatar_size' => 50,
                )
            );
            ?>
        </ol>

        <?php the_comments_pagination(); ?>

        <?php
        // If comments are closed and there are comments, let's leave a note.
        if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) :
        ?>
            <p class="no-comments"><?php _e('Comments are closed.', 'minimal-text-domain'); ?></p>
        <?php endif; ?>

    <?php endif; ?>
    <?php comment_form(); ?>
</section>
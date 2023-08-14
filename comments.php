<?php

/* -Data comes from user, do we need sanitization? 
   -or validate to make sure its ok to comment */
// If the current post is protected by a password and the visitor has not yet entered the password, return early without loading the comments.
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">
    <?php if (have_comments()) : ?>
        <h2 class="comments-title">
            <?php
            $comments_number = get_comments_number();
            if ('1' === $comments_number) {
                /* translators: %s: post title */
                printf(_x('One thought on &ldquo;%s&rdquo;', 'comments title', 'minimal-text-domain'), get_the_title());
            } else {
                printf(
                    /* translators: 1: number of comments, 2: post title */
                    _nx(
                        '%1$s thought on &ldquo;%2$s&rdquo;',
                        '%1$s thoughts on &ldquo;%2$s&rdquo;',
                        $comments_number,
                        'comments title',
                        'minimal-text-domain'
                    ),
                    number_format_i18n($comments_number),
                    get_the_title()
                );
            }
            ?>
        </h2>

        <ol class="comment-list">
            <?php
            wp_list_comments(
                array(
                    'style'      => 'ol',
                    'short_ping' => true,
                    'avatar_size'=> 50,
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

    <?php endif; // Check for have_comments(). ?>

    <?php comment_form(); ?>
</div><!-- #comments -->
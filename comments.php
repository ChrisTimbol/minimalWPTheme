<?php
/*
 * The template for displaying Comments.
 * The area of the page that contains comments and the comment form.
 *
 */
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
            <p class="no-comments"><?php _e('Comments are closed.', 'text-domain'); ?></p>
        <?php endif; ?>

    <?php endif; ?>
    <?php
    $args = array(
        'class_submit' => 'submit-button', // Adding a custom class to the submit button
        'label_submit' => __('Post Comment', 'text-domain'), // Label for the submit button
    );
    comment_form($args);
?>
</section>
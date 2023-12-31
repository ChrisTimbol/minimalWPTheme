<?php
/**
 * The template for displaying Comments.
 * The area of the page that contains comments and the comment form.
 */

// Exit if the post is password protected.
if (post_password_required()) {
    return;
}

// Initialize variables.
$comments_number = get_comments_number();
?>

<section id="comments" class="comments-container"> <!-- Wrapper for comments -->

    <?php if (have_comments()) : ?>
        <h2 class="comments-title-container">
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
        // If comments are closed and there are comments, leave a note.
        if (!comments_open() && $comments_number && post_type_supports(get_post_type(), 'comments')) :
        ?>
            <p class="no-comments"><?php _e('Comments are closed.', 'minimalistic'); ?></p>
        <?php endif; ?>

    <?php endif; ?>

    <?php
    $args = array(
        'class_submit' => 'submit-button', // Adding a custom class to the submit button
        'label_submit' => __('Post Comment', 'minimalistic'), // Label for the submit button
    );
    comment_form($args);
    ?>

</section>

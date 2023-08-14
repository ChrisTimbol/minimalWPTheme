<?php
get_header();
?>
<section class="page-container">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
    ?>
        <header class="page-header">
            <h2 class="page-title">
                <?php the_title(); ?>
            </h2>
        </header>
        <div class="page-content">
            <?php the_content(); ?>
        </div>
    <?php
        endwhile;
    else: 
        echo '<p>No page found.</p>';
    endif;
    ?>
</section>
<?php get_footer(); ?>
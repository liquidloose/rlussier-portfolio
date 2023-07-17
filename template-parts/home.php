<?php /* Template Name: Home Template */ ?>

<?php get_header(); ?>
<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php
        if (have_posts()) {

            // Load posts loop.
            while (have_posts()) {
                the_post();
                the_content();
            }
        }
        ?>

        <!-- wp:create-block/todo-list -->
        <div>
            <div>
                <p class="wp-block-create-block-todo-list">Todo List – hello from the saved content!</p>
            </div>
            <div>
                <p class="wp-block-create-block-todo-list">Todo List – hello from the saved content!</p>
            </div>
        </div>
        <p class="wp-block-create-block-todo-list">Todo List – hello from the saved content!</p>

        <p class="wp-block-create-block-todo-list">Todo List – hello from the saved content!</p>
        <!-- /wp:create-block/todo-list -->
    </main><!-- #main -->
</div><!-- #primary -->
<?php get_footer(); ?>
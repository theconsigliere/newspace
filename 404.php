<?php get_header(); ?>

<div id="content">

    <div id="inner-content" class="wrap">

        <main id="main" class="main" role="main" itemscope itemprop="mainContentOfPage"
            itemtype="https://schema.org/Blog">

            <?php
			header("HTTP/1.1 301 Moved Permanently");
			header("Location: " . get_bloginfo('url'));
			exit();
			?>

        </main>

    </div>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
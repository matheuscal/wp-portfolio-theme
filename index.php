<?php get_header(); ?>
<div id="bg"></div>
    <!-- Intro Section -->
    <div id="introSectionBlackener">
    </div>
    <video id='introVideo' muted loop autoplay>
        <source src=<?php echo get_template_directory_uri() . '/media/bg-video.mp4' ?> type='video/mp4'>
    </video>
    <section id="introSection" class='pt-5 container'>
        <!-- Header -->
        <header class='mt-3 text-center'>
            <h1 class='header-h1'><?php echo get_theme_mod( 'portfolio-header-title'); ?></h1>
            <h3 class='header-h2'><?php echo get_theme_mod('portfolio-header-description1'); ?></h3>
            <h4 class='header-h3 mt-4'><?php echo get_theme_mod( 'portfolio-header-description2'); ?></h4>
        </header> <!-- //Header -->
        
        <!-- Main Content Area -->
        <div id='introContent' class="content">
            <?php dynamic_sidebar( 'section1-body'); ?>

            <!-- Arrow to next section -->
            <a href='#secondSection' class='next-section-button text-center d-flex flex-column'>
                <i class='fas fa-sort-down fa-3x'></i>
                <span><?php echo get_theme_mod( 'portfolio-header-arrowtext'); ?></span>
            </a>
            
    </section> <!-- //#introSection -->
    <!-- Projects Section -->
    <section id='secondSection'>
        <h2 id='projectsTitle' class='text-center h4 mt-1 mt-md-3'><?php echo get_theme_mod('portfolio-header2-description'); ?></h2>
        <div id="section2Container">
            <?php dynamic_sidebar( 'section2-body' );?>
        </div>
    </section> <!-- //#secondSection -->
</div> <!-- //.content -->
    
<?php get_footer(); ?>

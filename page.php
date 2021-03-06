
<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold"><?php the_title(); ?></h1>
            <div class="custom-breadcrumbs">
              <a href="#">Home</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong><?php the_title(); ?></strong></span>
            </div>
          </div>
        </div>
      </div>
    </section>

    
      <section class="site-section" id="next-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
      </section>  

<?php endwhile; ?>

<?php get_footer(); ?>
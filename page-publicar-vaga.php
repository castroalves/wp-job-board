<?php acf_form_head(); ?>
<?php get_header(); ?>
    
    <?php if ( have_posts() ) : ?>

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

      <?php while ( have_posts() ) : the_post(); ?>

        <section class="site-section">
          <div class="container">
            <div class="row align-items-center mb-5">
              <div class="col-lg-8 mb-4 mb-lg-0">
                <div class="d-flex align-items-center">
                  <div>
                    <h2><?php the_title(); ?></h2>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mb-5">
              <div class="col-lg-12">
                <div class="p-4 p-md-5 border rounded">
                  <?php acf_form('publish-job'); ?>
                </div>
              </div>
            </div>
          </div>
        </section>  

      <?php endwhile; ?>

    <?php endif; ?>

<?php get_footer(); ?>
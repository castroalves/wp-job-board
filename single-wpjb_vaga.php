<?php get_header(); ?>

    <?php 
    
    while ( have_posts() ) : the_post();

      $company_logo = get_field('company_logo'); 
      $company_name = get_field('company_name');
      $job_type = get_field('job_type');
    
    ?>

    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold"><?php the_title(); ?></h1>
            <div class="custom-breadcrumbs">
              <a href="<?php echo site_url(); ?>">Home</a> <span class="mx-2 slash">/</span>
              <a href="<?php echo site_url('/vagas'); ?>">Vagas</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong><?php the_title(); ?></strong></span>
            </div>
          </div>
        </div>
      </div>
    </section>

    
    <section class="site-section">
      <div class="container">
        <div class="row align-items-center mb-5">
          <div class="col-lg-8 mb-4 mb-lg-0">
            <div class="d-flex align-items-center">
              <div class="border p-2 d-inline-block mr-3 rounded">
                <img src="<?php echo $company_logo['sizes']['thumbnail']; ?>" 
                      width="<?php echo $company_logo['sizes']['thumbnail-width']; ?>" 
                      height="<?php echo $company_logo['sizes']['thumbnail-height']; ?>" 
                      title="<?php echo $company_logo['title']; ?>">
              </div>
              <div>
                <h2><?php the_title(); ?></h2>
                <div>
                  <span class="ml-0 mr-2 mb-2"><span class="icon-briefcase mr-2"></span><?php echo $company_name; ?></span>
                  <span class="m-2"><span class="icon-room mr-2"></span><?php the_field('job_city'); ?>, <?php the_field('job_state'); ?></span>
                  <span class="m-2"><span class="icon-clock-o mr-2"></span><span class="text-primary"><?php echo $job_type['label']; ?></span></span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="row">
              <!-- <div class="col-6">
                <a href="#" class="btn btn-block btn-light btn-md"><span class="icon-heart-o mr-2 text-danger"></span>Save Job</a>
              </div> -->
              <div class="col-6">
                <a href="<?php echo site_url('/aplicar?job_id=' . get_the_ID()); ?>" class="btn btn-block btn-primary btn-md">Aplicar</a>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-8">
            <div class="mb-5">
              <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-align-left mr-3"></span>Descrição</h3>
              <?php the_content(); ?>
            </div>
            <!-- <div class="mb-5">
              <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-rocket mr-3"></span>Responsibilities</h3>
              <ul class="list-unstyled m-0 p-0">
                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>Necessitatibus quibusdam facilis</span></li>
                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>Velit unde aliquam et voluptas reiciendis n Velit unde aliquam et voluptas reiciendis non sapiente labore</span></li>
                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>Commodi quae ipsum quas est itaque</span></li>
                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span></li>
                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>Deleniti asperiores blanditiis nihil quia officiis dolor</span></li>
              </ul>
            </div>

            <div class="mb-5">
              <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-book mr-3"></span>Education + Experience</h3>
              <ul class="list-unstyled m-0 p-0">
                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>Necessitatibus quibusdam facilis</span></li>
                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>Velit unde aliquam et voluptas reiciendis non sapiente labore</span></li>
                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>Commodi quae ipsum quas est itaque</span></li>
                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span></li>
                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>Deleniti asperiores blanditiis nihil quia officiis dolor</span></li>
              </ul>
            </div>

            <div class="mb-5">
              <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-turned_in mr-3"></span>Other Benifits</h3>
              <ul class="list-unstyled m-0 p-0">
                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>Necessitatibus quibusdam facilis</span></li>
                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>Velit unde aliquam et voluptas reiciendis non sapiente labore</span></li>
                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>Commodi quae ipsum quas est itaque</span></li>
                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span></li>
                <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>Deleniti asperiores blanditiis nihil quia officiis dolor</span></li>
              </ul>
            </div> -->

            <div class="row mb-5">
              <!-- <div class="col-6">
                <a href="#" class="btn btn-block btn-light btn-md"><span class="icon-heart-o mr-2 text-danger"></span>Save Job</a>
              </div> -->
              <div class="col-6">
                <a href="<?php echo site_url('/aplicar?job_id=' . get_the_ID()); ?>" class="btn btn-block btn-primary btn-md">Aplicar</a>
              </div>
            </div>

          </div>
          <div class="col-lg-4">
            <div class="bg-light p-3 border rounded mb-4">
              <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Resumo</h3>
              <ul class="list-unstyled pl-3 mb-0">
                <li class="mb-2"><strong class="text-black">Publicada em:</strong> <?php echo get_the_date(); ?></li>
                <li class="mb-2"><strong class="text-black">Vagas Disponíveis:</strong> <?php the_field('job_vacancy'); ?></li>
                <li class="mb-2"><strong class="text-black">Tipo de Trabalho:</strong> <?php echo $job_type['label']; ?></li>
                <li class="mb-2"><strong class="text-black">Experiência:</strong> <?php the_field('job_experience'); ?></li>
                <li class="mb-2"><strong class="text-black">Cidade:</strong> <?php the_field('job_city'); ?>, <?php the_field('job_state'); ?></li>
                <li class="mb-2"><strong class="text-black">Faixa Salarial:</strong> <?php the_field('job_salary'); ?></li>
                <li class="mb-2"><strong class="text-black">Aplicar Até:</strong> <?php the_field('job_deadline'); ?></li>
              </ul>
            </div>

            <div class="bg-light p-3 border rounded">
              <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Redes Sociais</h3>
              <div class="px-3">
                <a href="<?php the_field('company_facebook'); ?>" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-facebook"></span></a>
                <a href="<?php the_field('company_twitter'); ?>" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
                <a href="<?php the_field('company_linkedin'); ?>" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
                <a href="<?php the_field('company_website'); ?>" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-pinterest"></span></a>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>

<?php endwhile; ?>

<?php get_footer(); ?>
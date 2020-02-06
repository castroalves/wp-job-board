<?php get_header(); ?>

    <!-- HOME -->
    <section class="section-hero home-section overlay inner-page bg-image" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/hero_1.jpg');" id="home-section">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-12">
                    <div class="mb-5 text-center">
                        <h1 class="text-white font-weight-bold">
                            O Jeito Mais Fácil<br />
                            de Conseguir o Emprego dos Sonhos
                        </h1>
                        <p>Milhares de profissionais encontram vagas de trabalho aqui!</p>
                    </div>
                    <?php get_search_form(); ?>
                </div>
            </div>
        </div>
        <a href="#next" class="scroll-button smoothscroll">
            <span class=" icon-keyboard_arrow_down"></span>
        </a>
    </section>

    <?php 

        $keyword = get_query_var('s');
        $post_type = get_query_var('post_type');
        $job_state = $_GET['job_state'];
        $job_type = $_GET['job_type'];

        $args = [
            'posts_per_page' => -1,
            'post_type' => $post_type,
            'post_status' => 'publish',
            's' => $keyword
        ];

        if ( ! empty($job_state) || ! empty($job_type) ) {
            $args['meta_query'] = [
                'relation' => 'OR',
                array(
                    'key' => 'job_state',
                    'value' => $job_state
                ),
                array(
                    'key' => 'job_type',
                    'value' => $job_type
                ),
            ];
        }

        $search_query = new WP_Query( $args );

        if ( $search_query->have_posts() ) : 
            $count_posts = $search_query->found_posts;
    ?>

    <section class="site-section" id="next">
        <div class="container">

            <div class="row mb-5 justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="section-title mb-2"><?php echo $count_posts; ?> Vagas Encontradas</h2>
                </div>
            </div>
            
            <ul class="job-listings mb-5">

            <?php while ( $search_query->have_posts() ) : 
                $search_query->the_post();

                $job_type = get_field('job_type');
                $badge = $job_type['value'] === 'full_time' ? 'success' : 'danger';
                $company_logo = get_field('company_logo');
            ?>
            
            <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
            <a href="<?php the_permalink(); ?>"></a>
            <div class="job-listing-logo">
                <img src="<?php echo $company_logo['url'] ?>" alt="<?php the_field('company_name'); ?>" class="img-fluid">
            </div>

            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                <h2><?php the_title() ?></h2>
                <strong><?php the_field('company_name'); ?></strong>
                </div>
                <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                <span class="icon-room"></span> <?php the_field('job_city'); ?>, <?php the_field('job_state'); ?>
                </div>
                <div class="job-listing-meta">
                <span class="badge badge-<?php echo $badge; ?>"><?php echo $job_type['label']; ?></span>
                </div>
            </div>
            
            </li>

    <?php endwhile; wp_reset_query(); ?>
            
            </ul>
    
            <div class="row pagination-wrap">
                <div class="col-md-6 text-center text-md-left mb-4 mb-md-0">
                <span>Exibindo 1-7 de 3.167 Vagas</span>
                </div>
                <div class="col-md-6 text-center text-md-right">
                <div class="custom-pagination ml-auto">
                    <a href="#" class="prev">Anterior</a>
                    <div class="d-inline-block">
                    <a href="#" class="active">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#">4</a>
                    </div>
                    <a href="#" class="next">Próxima</a>
                </div>
                </div>
            </div>
    
            </div>
            </section>

    <?php endif; ?>
    
    <section class="py-5 bg-image overlay-primary fixed overlay" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/hero_1.jpg');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                <h2 class="text-white">Procurando trabalho?</h2>
                <p class="mb-0 text-white lead">Junte-se a milhares de profissionais e encontre uma vaga agora mesmo!</p>
                </div>
                <div class="col-md-3 ml-auto">
                <a href="<?php echo home_url('/entrar'); ?>" class="btn btn-warning btn-block btn-lg">Criar Conta</a>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
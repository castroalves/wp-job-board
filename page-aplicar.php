<?php 

/**
 * Template Name: Aplicar Para Vaga
 * Template Post Type: page
 */

get_header(); 

$job_id = (int) $_GET['job_id'];
$submitted = (bool) $_GET['submitted'];
$company_email = 'contato@empresa.com';
$job_title = get_the_title($job_id);


$success = '';
if ( $submitted ) {
    $name = $_GET['fname'] . ' ' . $_GET['lname'];
    $email = $_GET['email'];
    $linkedin = $_GET['linkedin'];
    $portfolio = $_GET['portfolio'];

    $message = "Nome: $name\nE-mail: $email\nLinkedin: $linkedin\nPortfolio: $portfolio";

    $headers[] = 'From: WP Job Board <wordpress@wp-job-board.local>';

    $subject = 'Tem um candidato interessado na vaga para ' . $_GET['job_title'];

    if ( wp_mail($company_email, $subject, $message, $headers) ) {
        $success = 'Sua aplicação foi enviada com sucesso!';
    };
}


?>
    
    <?php if ( have_posts() ) : ?>

    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/hero_1.jpg');" id="home-section">
        <div class="container">
        <div class="row">
            <div class="col-md-7">
            <h1 class="text-white font-weight-bold"><?php the_title(); ?> para <?php echo $job_title; ?></h1>
            <div class="custom-breadcrumbs">
                <a href="/">Home</a> <span class="mx-2 slash">/</span>
                <span class="text-white"><strong><?php the_title(); ?></strong></span>
            </div>
            </div>
        </div>
        </div>
    </section>

    <section class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mx-auto">
    
                    <?php while ( have_posts() ) : the_post(); ?>

                    <?php if ($submitted): ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-success">
                                <?php echo $success; ?>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <form action="" class="">

                        <div class="row form-group">
                            <div class="col-md-6 mb-3 mb-md-0">
                            <label class="text-black" for="fname">Nome</label>
                            <input type="text" id="fname" name="fname" class="form-control">
                            </div>
                            <div class="col-md-6">
                            <label class="text-black" for="lname">Sobrenome</label>
                            <input type="text" id="lname" name="lname" class="form-control">
                            </div>
                        </div>

                        <div class="row form-group">
                            
                            <div class="col-md-12">
                            <label class="text-black" for="email">Email</label> 
                            <input type="email" id="email" name="email" class="form-control">
                            </div>
                        </div>

                        <div class="row form-group">
                            
                            <div class="col-md-12">
                            <label class="text-black" for="linkedin">Linkedin</label> 
                            <input type="linkedin" id="linkedin" name="linkedin" class="form-control">
                            </div>
                        </div>

                        <div class="row form-group">
                            
                            <div class="col-md-12">
                            <label class="text-black" for="portfolio">Portfólio</label> 
                            <input type="portfolio" id="portfolio" name="portfolio" class="form-control">
                            </div>
                        </div>

                        <!-- <div class="row form-group">
                            <div class="col-md-12">
                            <label class="text-black" for="message">Carta de Apresentação</label> 
                            <textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Escreva sua mensagem ou perguntas aqui..."></textarea>
                            </div>
                        </div> -->

                        <div class="row form-group">
                            <div class="col-md-12">
                            <input type="submit" value="Enviar Aplicação" class="btn btn-primary btn-md text-white">
                            </div>
                        </div>

                        <input type="hidden" name="job_id" value="<?php echo $job_id; ?>">
                        <input type="hidden" name="job_title" value="<?php echo $job_title; ?>">
                        <input type="hidden" name="submitted" value="true">

            
                        </form>
                    
                    <?php endwhile; ?>

                </div>
            </div>
        </div>
    </section>

    <?php endif; ?>

<?php get_footer(); ?>
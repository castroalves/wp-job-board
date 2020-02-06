
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

    
    <div class="col-md-12 mx-auto">

            <section class="site-section">
                <div class="container">

                    <?php if ( ! empty($success) ) : ?>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-success">
                                <?php echo $success; ?>
                            </div>
                        </div>
                    </div>

                    <?php endif; ?>

                    <?php 
                    $register = $_GET['register'];
                    if ( $register === 'true' ) : ?>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-success">
                                A senha foi enviada para seu e-mail!
                            </div>
                        </div>
                    </div>

                    <?php endif; ?>

                    <?php if ( isset( $_GET['publish_job_message'] ) ) : ?>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-info">
                                <?php echo $_GET['publish_job_message']; ?>
                            </div>
                        </div>
                    </div>

                    <?php endif; ?>

                    <?php if ( isset( $_GET['apply_job_message'] ) ) : ?>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-info">
                                <?php echo $_GET['apply_job_message']; ?>
                            </div>
                        </div>
                    </div>

                    <?php endif; ?>

                    <div class="row">
                    <div class="col-lg-6 mb-5">
                        <h2 class="mb-4">Crie Sua Conta</h2>

                        <form method="POST" action="<?php echo site_url('wp-login.php?action=register', 'login_post') ?>" class="p-4 border rounded">
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                <label class="text-black" for="user_login">Nome de Usuário</label>
                                <input type="text" name="user_login" id="user_login" class="form-control" placeholder="Login">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                <label class="text-black" for="user_email">Email</label>
                                <input type="text" name="user_email" id="user_email" class="form-control" placeholder="E-mail">
                                </div>
                            </div>

                            <?php do_action('register_form'); ?>
                            <input type="hidden" name="user-cookie" value="1" />
                            <input type="hidden" name="redirect_to" value="<?php echo esc_attr($_SERVER['REQUEST_URI']); ?>?register=true">

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <input type="submit" value="Criar Conta" class="btn px-4 btn-primary text-white">
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="col-lg-6">
                        <h2 class="mb-4">Acessar Sua Conta</h2>
                        
                        <div class="p-4 border rounded">
                            <?php wp_login_form([
                                'remember' => true,
                                'label_username' => 'Nome de usuário ou e-mail',
                                'label_password' => 'Senha',
                                'label_log_in' => 'Acessar Conta',
                                'label_remember' => __( 'Quero ser lembrado' )
                            ]); ?>
                        </div>
                    </div>
                    </div>
                </div>
            </section>

        </div>

<?php endwhile; ?>

<?php get_footer(); ?>
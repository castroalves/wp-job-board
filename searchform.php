<?php

$job_state = isset($_GET['job_state']) ? $_GET['job_state'] : '';
$job_type = isset($_GET['job_type']) ? $_GET['job_type'] : '';

?>
<form role="search" method="get" class="search-jobs-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="row mb-5">
        <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
            <input  type="search" 
                    class="form-control form-control-lg" 
                    placeholder="Título da Vaga, Empresa..."
                    value="<?php echo get_search_query(); ?>" 
                    name="s" />
            <input type="hidden" value="wpjb_vaga" name="post_type" id="post_type" />
        </div>
        <?php 
        $estados_brasileiros = array(
            ''   => 'Estado',
            'AC' => 'Acre',
            'AL' => 'Alagoas',
            'AP' => 'Amapá',
            'AM' => 'Amazonas',
            'BA' => 'Bahia',
            'CE' => 'Ceará',
            'DF' => 'Distrito Federal',
            'ES' => 'Espírito Santo',
            'GO' => 'Goiás',
            'MA' => 'Maranhão',
            'MT' => 'Mato Grosso',
            'MS' => 'Mato Grosso do Sul',
            'MG' => 'Minas Gerais',
            'PA' => 'Pará',
            'PB' => 'Paraíba',
            'PR' => 'Paraná',
            'PE' => 'Pernambuco',
            'PI' => 'Piauí',
            'RJ' => 'Rio de Janeiro',
            'RN' => 'Rio Grande do Norte',
            'RS' => 'Rio Grande do Sul',
            'RO' => 'Rondônia',
            'RR' => 'Roraima',
            'SC' => 'Santa Catarina',
            'SP' => 'São Paulo',
            'SE' => 'Sergipe',
            'TO' => 'Tocantins'
            );
        ?>
        <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
            <select name="job_state" id="job-state" class="selectpicker" data-style="btn-white btn-lg" data-width="100%" data-live-search="true" title="Estado">

            <?php foreach ( $estados_brasileiros as $sigla => $estado ) : ?>
                <option value="<?php echo $sigla; ?>" <?php selected($job_state, $sigla); ?>><?php echo $estado; ?></option>
            <?php endforeach;?>

            </select>
        </div>
        <?php 
            $arr_job_types = [
                '' => 'Tipo de Trabalho',
                'temporary' => 'Temporário',
                'part_time' => 'Meio Período',
                'full_time' => 'Período Integral',
            ]; 
        ?>
        <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
            <select name="job_type" id="job-type" class="selectpicker" data-style="btn-white btn-lg" data-width="100%" data-live-search="true" title="Tipo de Trabalho">
                <?php foreach ($arr_job_types as $value => $label) : ?>
                <option value="<?php echo $value; ?>" <?php selected($job_type, $value); ?>><?php echo $label; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
            <button type="submit" class="btn btn-primary btn-lg btn-block text-white btn-search"><span class="icon-search icon mr-2"></span>Pesquisar Vagas</button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 popular-keywords">
            <h3>Áreas Mais Buscadas:</h3>
            <ul class="keywords list-unstyled m-0 p-0">
                <li><a href="#" class="">Design</a></li>
                <li><a href="#" class="">Marketing</a></li>
                <li><a href="#" class="">Desenvolvimento</a></li>
            </ul>
        </div>
    </div>
</form>
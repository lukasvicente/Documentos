<?php

require_once "app/control/UtilWebservice.php";
require_once "app/control/Url.php";

$key = Url::getURL(1);
$url = URL::getBase();

?>


<div class="container">
    <div class="section">
        <nav class="teal lighten-2">
            <div class="nav-wrapper">
                <div class="col s12">
                    <a href="<?php echo $url; ?>" class="breadcrumb"><i style="margin-left:20px;"
                                                                        class="material-icons">home</i></a>
                    <a href="<?php echo $url; ?>Sede" class="breadcrumb">Sede</a>
                </div>
            </div>
        </nav>
    </div>

    <?php

    function mountSobreJson()
    {
        $GRUPO_SERVICO_WEBSERVICE =
            UtilWebservice::$HOST_NAME .
            UtilWebservice::$PROJECT_NAME .
            UtilWebservice::$WEBSERVICE_DIRECTORY .
            "SedeSiteWebservice.class.php";

        $jsonData = file_get_contents($GRUPO_SERVICO_WEBSERVICE);
        $jsonServicos = json_decode($jsonData, true);
        $successServico = $jsonServicos[UtilWebservice::$SUCCESS_TAG];
        $dadosJson = $jsonServicos[UtilWebservice::$DADOS_TAG];

        if ($successServico == 1) {

            mountSede($dadosJson);

        } else if ($successServico == 2) {

            echo '    
        <div class="chip">
            Nenhum valor foi encontrado.
            <i class="close material-icons">close</i>
        </div>
    <br>';

        } else if ($successServico == 0) {

            echo '    
        <div class="chip">
            Ocorreu um problema, tente novamente.
            <i class="close material-icons">close</i>
        </div>
    <br>';


        }

    }

    function mountSede($values)
    {

        $htmlcard = '
            <ul class="collapsible popout">
            ';
        echo $htmlcard;

        foreach ($values as $value){

            $htmlcard = '
            <li>
            <div class="collapsible-header"><i class="material-icons">location_on</i> '.$value['nome'].' - '. strtoupper($value['cidade']) .'/'.$value['uf'].'</div>
            <div class="collapsible-body">
                <span>

        <div class="row">
                <div class="col s12"><p class="align-center"></p></div>
                <div class="col s12 m6">

                    <h5 class="teal-text">Endereço</h5>

                <hr class="intro-divider">
                    <br>
                    <p class="text-darken-1"><b>Logradouro:</b> '.$value['logradouro'].'</p>
                    <p class="text-darken-1"><b>Bairro:</b> '.$value['bairro'].'</p>
                    <p class="text-darken-1"><b>Cidade:</b> '.$value['cidade'].'/'.$value['uf'].'</p>
                    <p class="text-darken-1"><b>CEP:</b> '.$value['cep'].'</p>
                    '.$value['descricao'].'
                    
                    <br>

                </div>

        <div class="col s12 m6">

            <h5 class="teal-text">Google Maps</h5>
            <hr class="intro-divider">
            <br>
       '.$value['googlemaps'].'
            </div>

                </span>
            </div>

        </li>
            ';
            echo $htmlcard;
        }

        $htmlcard = ' </ul>';

        echo $htmlcard;
    }

    print_r(mountSobreJson());
    ?>






</div>


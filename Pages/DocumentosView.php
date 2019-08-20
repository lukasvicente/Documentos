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
                    <a href="<?php echo $url; ?>" class="breadcrumb"><i style="margin-left:20px;" class="material-icons">home</i></a>
                    <a href="<?php echo $url; ?>Documentos" class="breadcrumb">Documentos</a>
                </div>
            </div>
        </nav>
    </div>
</div>

<?php
 
require_once "app/control/UtilWebservice.php";

function mountTipoDocumentoJson()
{
    $GRUPO_SERVICO_WEBSERVICE =
        UtilWebservice::$HOST_NAME .
        UtilWebservice::$PROJECT_NAME .
        UtilWebservice::$WEBSERVICE_DIRECTORY .
        "TipoDocumentoWebservice.class.php";

    $jsonData = file_get_contents($GRUPO_SERVICO_WEBSERVICE);
    $jsonServicos = json_decode($jsonData, true);
    $successServico = $jsonServicos[UtilWebservice::$SUCCESS_TAG];
    $dadosJson = $jsonServicos[UtilWebservice::$DADOS_TAG];

    if ($successServico == 1) {

        mountTipoDocumentos($dadosJson);
        mountDocumentos($dadosJson);

    } else if ($successServico == 2) {

        //new TMessage( 'INFO', 'Nenhum valor foi encontrado.' );

    } else if ($successServico == 0) {

        //new TMessage( 'INFO', 'Ocorreu um problema, tente novamente.' );

    }

}

function mountTipoDocumentos($values)
{
    $div = '  
      <div class="container">
      <div class="section">
      <div class="row">
      <div class="section scrollspy">
      <div class="col s12">
      <ul class="tabs tabs-fixed-width z-depth-1">';

    echo $div;

    foreach ($values as $value) {

        $div = '<li class="tab col s3"><a href="#' . $value['nome'] . '">' . $value['nome'] . '</a></li>';

        echo $div;

    }

    echo "</ul></div></div> </div>";
}

function mountDocumentos($values)
{

    $ano = '';
    $tipo = '';

    //----- JONAS -----

    //var_dump($values);

    foreach($values as $tiposDocumentos) {

        $html = '<div id="' . $tiposDocumentos['nome'] .'" class="col s12"> <ul class="collapsible popout" data-collapsible="accordion">';

        for($ano = 2012; $ano <= date('Y'); $ano++) {

            $GRUPO_SERVICO_WEBSERVICE =
                UtilWebservice::$HOST_NAME .
                UtilWebservice::$PROJECT_NAME .
                UtilWebservice::$WEBSERVICE_DIRECTORY .
                "DocumentoWebservice.class.php";

            $json = UtilWebservice::callWebservice("DocumentoWebservice", ['ano' => $ano, 'tipo_documento' => $tiposDocumentos['nome']], 'POST' );
            $dados = $json[UtilWebservice::$DADOS_TAG];

            if (!empty($dados)){

            $html .= '<li>  <div class="collapsible-header"><i class="material-icons">date_range</i>'. $ano .'</div>';

            $tempMes = '';

            foreach($dados as $dado) {
                if ($tiposDocumentos['nome'] != "BALANCETES"){

                    $nome = " - " . $dado['nome_documento'];

                }

                if($tempMes != $dado['mes']) {

                    $tempMes = $dado['mes'];

                    $html .= '<div class="collapsible-body"><span><a href="' .UtilWebservice::$HOST_NAME . UtilWebservice::$PROJECT_NAME . $dado['link'] .'" target="_blank">' . $tempMes .$nome. '</a></span></div>';

                }

            }

            $html .= '</li>';
            }
        }

        $html .= "</ul> </div>";

        echo $html;

    }

    //-----------------

        
    
}

print_r(mountTipoDocumentoJson());

?>

            </div>
        </div>
    </div>
<br><br>
</div>
<br><br>

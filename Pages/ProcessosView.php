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
                    <a href="<?php echo $url; ?>Processos" class="breadcrumb">Processos</a>
                </div>
            </div>
        </nav>
    </div>

    <?php

    require_once "app/control/UtilWebservice.php";

    function mountProcessoJson()
    {
        $GRUPO_SERVICO_WEBSERVICE =
            UtilWebservice::$HOST_NAME .
            UtilWebservice::$PROJECT_NAME .
            UtilWebservice::$WEBSERVICE_DIRECTORY .
            "ProcessoWebservice.class.php";

        $jsonData = file_get_contents($GRUPO_SERVICO_WEBSERVICE);
        $jsonServicos = json_decode($jsonData, true);
        $successServico = $jsonServicos[UtilWebservice::$SUCCESS_TAG];
        $dadosJson = $jsonServicos[UtilWebservice::$DADOS_TAG];

        if ($successServico == 1) {

            mountProcesso($dadosJson);

        } else if ($successServico == 2) {

            echo '    
        <div class="chip">
            Nenhum valor foi encontrado.
            <i class="close material-icons">close</i>
        </div>
    <br>';
            //new TMessage( 'INFO', 'Nenhum valor foi encontrado.' );

        } else if ($successServico == 0) {

            echo '    
        <div class="chip">
            Ocorreu um problema, tente novamente.
            <i class="close material-icons">close</i>
        </div>
    <br>';

        }

    }

    function mountProcesso($values)
    {
        if (!filter_input(INPUT_GET, 'key')) {
            $div = '   <div class="row">

            <h3 class="header center orange-text">Processos Coletivos</h3>

            <p class="header center orange-text">Informações sobre os processos coletivos da Emater/RN</p>
            <div class="col s12 m12 l12">
            <table class="striped">
                <thead>
                <tr>
                    <th></th>
                    <th>Processo</th>
                    <th>Número</th>
                    <th>Situação</th>
                </tr>
                </thead>

            <tbody>';

            echo $div;

            foreach ($values as $value) {

                $div = ' <tr>
                        <td><a class="btn-floating pulse btn-small waves-effect waves-light grey darken-2 tooltipped" 
                        data-position="top" data-tooltip="Vizualizar" href="index.php?page=Processos&key=' . $value['id'] . '"><i class="material-icons">search</i></a></td>
                        <td>' . $value['nome'] . '</td>
                        <td>' . $value['numero'] . '</td>
                        <td>' . $value['situacao'] . '</td>
                        
                </tr>';

                echo $div;

            }

            echo "           
            </tbody>
            </table>
        ";
        }

        foreach ($values as $value) {



            if ($value['id'] == $_GET['key']) {

                $div = '
    <h4 class="header center black-text">' . $value['nome'] . " - " . $value['numero'] . '</h4> 
    <br>
       <ul class="collapsible popout" data-collapsible="expandable">
            <li>
                <div class="collapsible-header active"><i class="material-icons">info_outline</i>DADOS DO PROCESSO</div>
                  <div class="collapsible-body">
                    <span>
                         <p><b>Nome: </b> ' . $value['nome'] . '</p>
                         <p><b>Número: </b> ' . $value['numero'] . '</p>
                         <p><b>Origem: </b> ' . $value['origem'] . '</p>
                         <p><b>Autor: </b> ' . $value['autor'] . '</p>
                         <p><b>Descrição: </b> ' . $value['descricao'] . '</p>
                    </span>
                   </div>
            </li>
            <li>
                <div class="collapsible-header active"><i class="material-icons">description</i>DOCUMENTOS</div>
                <div class="collapsible-body">
                    <span>
                          <div class="collection">
                          ';
                $host = UtilWebservice::$HOST_NAME .
                    UtilWebservice::$PROJECT_NAME ;

                $key = $_GET['key'];

                $json = UtilWebservice::callWebservice("ProcessoDocumentoWebservice", [], 'POST' );
                $dados = $json[UtilWebservice::$DADOS_TAG];
                foreach ( $dados as $dado ){

                    if ($key == $dado['processo_id']){

                $div .='<a href="'.$host.'app/documents/site/processo/'.$dado['arquivo'].'" target="_blank" class="collection-item"><i class=" small material-icons">picture_as_pdf</i> ' . $dado['nome'] . '</a>
                           ';
                    }
                }
                $div .='
                          </div>
          
                    </span>
                </div>
            </li>

        </ul>
    ';

                echo $div;
            }
        }
    }

    print_r(mountProcessoJson());
    if (!filter_input(INPUT_GET, 'key')) {
        echo "<br>
            <p><font color=red><b>*</b></font> Para consultar valores, <a href=\"#\">clique aqui.</a></p>";
    }


    ?>


</div>
</div>
</div>

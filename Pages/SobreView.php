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
                    <a href="<?php echo $url; ?>Sobre" class="breadcrumb">Sobre</a>
                </div>
            </div>
        </nav>
    </div>

    <?php

    require_once "app/control/UtilWebservice.php";

    function mountSobreJson()
    {
        $GRUPO_SERVICO_WEBSERVICE =
            UtilWebservice::$HOST_NAME .
            UtilWebservice::$PROJECT_NAME .
            UtilWebservice::$WEBSERVICE_DIRECTORY .
            "SobreWebservice.class.php";

        $jsonData = file_get_contents($GRUPO_SERVICO_WEBSERVICE);
        $jsonServicos = json_decode($jsonData, true);
        $successServico = $jsonServicos[UtilWebservice::$SUCCESS_TAG];
        $dadosJson = $jsonServicos[UtilWebservice::$DADOS_TAG];

        if ($successServico == 1) {

            mountSobre($dadosJson);

        } else if ($successServico == 2) {

            //new TMessage( 'INFO', 'Nenhum valor foi encontrado.' );

        } else if ($successServico == 0) {

            //new TMessage( 'INFO', 'Ocorreu um problema, tente novamente.' );

        }

    }

    function mountDiretorJson()
    {
        $GRUPO_SERVICO_WEBSERVICE =
            UtilWebservice::$HOST_NAME .
            UtilWebservice::$PROJECT_NAME .
            UtilWebservice::$WEBSERVICE_DIRECTORY .
            "DiretorWebservice.class.php";

        $jsonData = file_get_contents($GRUPO_SERVICO_WEBSERVICE);
        $jsonServicos = json_decode($jsonData, true);
        $successServico = $jsonServicos[UtilWebservice::$SUCCESS_TAG];
        $dadosJson = $jsonServicos[UtilWebservice::$DADOS_TAG];

        if ($successServico == 1) {

            mountDiretor($dadosJson);

        } else if ($successServico == 2) {

            //new TMessage( 'INFO', 'Nenhum valor foi encontrado.' );

        } else if ($successServico == 0) {

            //new TMessage( 'INFO', 'Ocorreu um problema, tente novamente.' );

        }

    }

    function mountPresidenteJson()
    {
        $GRUPO_SERVICO_WEBSERVICE =
            UtilWebservice::$HOST_NAME .
            UtilWebservice::$PROJECT_NAME .
            UtilWebservice::$WEBSERVICE_DIRECTORY .
            "PresidenteAnteriorWebservice.class.php";

        $jsonData = file_get_contents($GRUPO_SERVICO_WEBSERVICE);
        $jsonServicos = json_decode($jsonData, true);
        $successServico = $jsonServicos[UtilWebservice::$SUCCESS_TAG];
        $dadosJson = $jsonServicos[UtilWebservice::$DADOS_TAG];

        if ($successServico == 1) {

            mountPresidente($dadosJson);

        } else if ($successServico == 2) {

            //new TMessage( 'INFO', 'Nenhum valor foi encontrado.' );

        } else if ($successServico == 0) {

            //new TMessage( 'INFO', 'Ocorreu um problema, tente novamente.' );

        }

    }

    function mountSobre($values)
    {

        echo '<div class="card">

        <div align="justify">
            <div class="card-tabs">
                <ul class="tabs tabs-fixed-width z-depth-1">';

        foreach ($values as $value) {

            $div = ' <li class="tab"><a class="active" href="#' . $value['nome_low'] . '">' . $value['titulo'] . '</a></li>';


            echo $div;

        }

        echo '</ul>
            </div>
            <div class="card-content  lighten-4">
                ';

        foreach ($values as $value) {
            if ($value['nome_low'] <> "diretores") {
                $div = '<div id="' . $value['nome_low'] . '">' . $value['descricao'] . '</div>';

                echo $div;
            }


        }

    }

    function mountDiretor($values)
    {

        echo '<div id="diretores">
        <ul class="collapsible popout" data-collapsible="accordion">';

        foreach ($values as $value) {

            $div = '
              <li>
        <div class="collapsible-header"><i class="material-icons">personal</i>
            <p>' . $value['nome_tipodiretor'] . '</p>
        </div>
        <div class="collapsible-body">
      <span>
     <div class="col s12 m8 offset-m2 l6 offset-l3">
        <div class="card-panel grey lighten-5 z-depth-1">
          <div class="row valign-wrapper">
            <div class="col s2">
              <img src="app/images/perfil.png" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
            </div>
            <div class="col s10">

              <span class="black-text">
               <p><b>' . $value['nome_diretor'] . '</b><br><br>' . $value['descricao'] . '</p>
                    
              </span>

            </div>

          </div>
             <div class="intro-message center-align">
            
				 <hr class="intro-divider">
				 <br>
				 <span class="valign-wrapper" class="black-text"> — ' . $value['discurso'] . '</span>
			</div>
        </div>
      </div>
      </span></div>
    </li>';


            echo $div;

        }

        echo '';


    }

    function mountPresidente($values)
    {

        echo '<br>
            <div class="intro-message center-align">
                <h4>Administrações Anteriores</h4>

            </div>
            <div class="card-content  lighten-4">
                <br>
                <table class="highlight">
                    <thead>
                    <tr>
                        <th>Ano</th>
                        <th>Presidente</th>

                    </tr>
                    </thead>';

        foreach ($values as $value) {

            $div = ' 
            <tbody>
                    <tr>
                        <td>' . $value['datainicio'] . " - " . $value['datafim'] . '</td>
                        <td>' . $value['nome_diretor'] . '</td>

                    </tr>
                    </tbody>';


            echo $div;

        }

        echo '
                </table>
            </div>
        </ul>


    </div>

</div>
</div>
</div>
</div>';

    }

    print_r(mountSobreJson());
    print_r(mountDiretorJson());
    print_r(mountPresidenteJson());

    ?>



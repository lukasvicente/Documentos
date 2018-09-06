<div class="container">
    <div class="section">
        <nav class="teal lighten-2">
            <div class="nav-wrapper">
                <div class="col s12">
                    <a href="index.php" class="breadcrumb"><i style="margin-left:20px;" class="material-icons">home</i></a>
                    <a href="index.php?page=Processos" class="breadcrumb">Processos</a>
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

            //new TMessage( 'INFO', 'Nenhum valor foi encontrado.' );

        } else if ($successServico == 0) {

            //new TMessage( 'INFO', 'Ocorreu um problema, tente novamente.' );

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
                    <th>Processo</th>
                    <th>Numero</th>
                </tr>
                </thead>

            <tbody>';

            echo $div;

            foreach ($values as $value) {

                $div = ' <tr>
                        <td>' . $value['nome'] . '</td>
                        <td>' . $value['numero'] . '</td>
                        <td><a href="index.php?page=Processos&key=' . $value['id'] . '">Detalhar</a></td>
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

                $div = '<h4 class="header center orange-text">' . $value['nome'] ." - ".$value['numero']. '</h4> 
                        <br><p>' . $value['descricao'] . '</p>';

                echo $div;
            }
        }
    }
    print_r(mountProcessoJson());
    ?>




            <br>
            <p><font color=red><b>*</b></font> Para consultar valores, <a href="#">clique aqui.</a></p>
        </div>
    </div>
</div>

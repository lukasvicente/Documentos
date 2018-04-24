<div class="container">
    <div class="section">
        <nav class="light-blue lighten-1">
            <div class="nav-wrapper">
                <div class="col s12">
                    <a href="index.php" class="breadcrumb"><i style="margin-left:20px;" class="material-icons">home</i></a>
                    <a href="index.php?page=Noticias" class="breadcrumb">Noticias</a>
                </div>
            </div>
        </nav>
    </div>

    <div class="row">

        <?php

        require_once "app/control/UtilWebservice.php";

        function mountCategoriaJson()
        {
            $GRUPO_SERVICO_WEBSERVICE =
                UtilWebservice::$HOST_NAME .
                UtilWebservice::$PROJECT_NAME .
                UtilWebservice::$WEBSERVICE_DIRECTORY .
                "CategoriaWebservice.class.php";

            $jsonData = file_get_contents($GRUPO_SERVICO_WEBSERVICE);
            $jsonServicos = json_decode($jsonData, true);
            $successServico = $jsonServicos[UtilWebservice::$SUCCESS_TAG];
            $dadosJson = $jsonServicos[UtilWebservice::$DADOS_TAG];

            if ($successServico == 1) {

                mountCategoria($dadosJson);

            } else if ($successServico == 2) {

                //new TMessage( 'INFO', 'Nenhum valor foi encontrado.' );

            } else if ($successServico == 0) {

                //new TMessage( 'INFO', 'Ocorreu um problema, tente novamente.' );

            }

        }

        function mountCategoria($values)
        {
            $div = '
<div class="col s12 m4 l3">
            <div class="collection">
                <a  class="collection-item active"><i class="material-icons tiny">arrow_forward</i> CATEGORIA</a>
                ';

            echo $div;

            foreach ($values as $value) {

                $div = '<a href="index.php?page=' . $value['nome'] . '" class="collection-item">' . $value['nome'] . '</a>';

                echo $div;

            }

            echo "           
            </div>
        ";
        }

        function mountNoticiaJson()
        {
            $GRUPO_SERVICO_WEBSERVICE =
                UtilWebservice::$HOST_NAME .
                UtilWebservice::$PROJECT_NAME .
                UtilWebservice::$WEBSERVICE_DIRECTORY .
                "NoticiaSiteWebservice.class.php";

            $jsonData = file_get_contents($GRUPO_SERVICO_WEBSERVICE);
            $jsonServicos = json_decode($jsonData, true);
            $successServico = $jsonServicos[UtilWebservice::$SUCCESS_TAG];
            $dadosJson = $jsonServicos[UtilWebservice::$DADOS_TAG];

            if ($successServico == 1) {

                mountNoticia($dadosJson);

            } else if ($successServico == 2) {

                //new TMessage( 'INFO', 'Nenhum valor foi encontrado.' );

            } else if ($successServico == 0) {

                //new TMessage( 'INFO', 'Ocorreu um problema, tente novamente.' );

            }

        }

        function mountNoticia($values)
        {
            $i = 0;

            $numberPage = intval((filter_input(INPUT_GET, 'p')) ? filter_input(INPUT_GET, 'p') : "1");

            // CALCULA O INICIO DA PAGINAÇÃO COM O "NUMERO DA PAGINA INFORMADO"
            $valor_pag_begin = ((($numberPage - 1) * 3) + $numberPage) - ($numberPage - 1);
            $valor_pag_end = $numberPage * 3;

            $div = '<div class="col s12 m8 l9">

            <div class="row">';

            echo $div;


            foreach ($values as $value) {

                if (!filter_input(INPUT_GET, 'key')) {

                    $div = '
                <div class="col s12 m6">
                    <div class="card tiny">
                        <div class="card-image">
                            <img src="' . UtilWebservice::$HOST_NAME . UtilWebservice::$PROJECT_NAME . '/app/images/site/' . $value['nomearquivo'] . '">
                            <span class="card-title"></span>
                        </div>
                        <div class="card-content">
                            <p class="grey-text"> <i class="material-icons tiny">watch_later</i> &nbsp;' . $value['dia'] . ', ' . $value['mes'] . ' ' . $value['ano'] ." - ".$value['tempo']. '</p><br>
                           <a href="index.php?page=Noticias&key=' . $value['id'] . '"> <p>' . $value['titulo'] . '</p></a>
                        </div>
                        <div class="card-action">
                            <a href="index.php?page=Noticias&key=' . $value['id'] . '"><i class="material-icons tiny">subject</i>&nbsp;Leia Mais</a>
                        </div>
                    </div>
                </div>';

                    echo $div;
                }
                if ($value['id'] == $_GET['key']) {

                    //if para sem imagem
                    if ($value['nomearquivo'] <> "semimagem.jpg") {

                        $img = '<img class="hide-on-small-only" id="img-noticia" src="' . UtilWebservice::$HOST_NAME . UtilWebservice::$PROJECT_NAME . '/app/images/site/' . $value['nomearquivo'] . '">';
                    }

                    $div = '
                <h5><b>' . $value['titulo'] . '</b></h5>
                <hr class="intro-divider"> <br>
                <a class="grey-text"> <i class="material-icons tiny">watch_later</i> &nbsp;' . $value['dia'] . ' de ' . $value['mes'] . ' ' . $value['ano'] . ' | ' . $value['hora'] . ' </a>
                <br> <br>
                 <div">' . $img . $value['descricao'] . '
                 <br><br>
                 </div>';

                    echo $div;
                }
            }
            if (!filter_input(INPUT_GET, 'key')) {


                echo '
            </div>

        </div>
        <center>
        <ul class="pagination">
            <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
            <li class="active"><a href="#!">1</a></li>
            <li class="waves-effect"><a href="#!">2</a></li>
            <li class="waves-effect"><a href="#!">3</a></li>
            <li class="waves-effect"><a href="#!">4</a></li>
            <li class="waves-effect"><a href="#!">5</a></li>
            <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
        </ul>
        </center>
    ';
            }
        }

        if (!filter_input(INPUT_GET, 'key')) {

            print_r(mountCategoriaJson());
        }
        echo "</div>";

        print_r(mountNoticiaJson());

        ?>


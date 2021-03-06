<div class="container">
    <div class="section">
        <nav class="teal lighten-2">
            <div class="nav-wrapper">
                <div class="col s12">
                    <a href="index.php" class="breadcrumb"><i style="margin-left:20px;" class="material-icons">home</i></a>
                    <a href="index.php?page=Galeria" class="breadcrumb">Galeria</a>
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
                "SubMenuWebservice.class.php";

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
                "GaleriaWebservice.class.php";

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
            //quantidade de registros por pagina
            $qReg = 4;

            $numberPage = intval((filter_input(INPUT_GET, 'p')) ? filter_input(INPUT_GET, 'p') : "1");

            // CALCULA O INICIO DA PAGINAÇÃO COM O "NUMERO DA PAGINA INFORMADO"
            $valor_pag_begin = ((($numberPage - 1) * $qReg) + $numberPage) - ($numberPage - 1);
            $valor_pag_end = $numberPage * $qReg;

            $div = '<div class="col s12 m8 l9">

            ';

            echo $div;


            foreach ($values as $value) {
                $i++;

          if( $i >= $valor_pag_begin  and $i <=  $valor_pag_end ){

                if (!filter_input(INPUT_GET, 'key')) {
                $titulo = $value['titulo'];
                    $div = '
        <div class="col s12 m6">
          <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
              <img class="activator" src="' . UtilWebservice::$HOST_NAME . UtilWebservice::$PROJECT_NAME . 'app/images/site/galeria/' . $value['arquivo'] . '" width="320" height="205">
            </div>
            <div class="card-content">
              <span class="card-title activator grey-text text-darken-4"><p class="truncate">' . $value['titulo'] . '</p><i class="material-icons right">more_vert</i></span>
            </div>
            <div class="card sticky-action">
            
                <div class="card-action"><a href="index.php?page=Galeria&key=' . $value['id'] . '">VEJA MAIS</a></div>
            </div>
            <div class="card-reveal">
              <span class="card-title grey-text text-darken-4">' . $value['titulo'] . '<i class="material-icons right">close</i></span>
              <p>' . $value['descricao'] . '</p>
            </div>
          </div>
        </div>';

                    echo $div;
                }
            }
                if ($value['id'] == $_GET['key']) {

                    //if para sem imagem
                    if ($value['nomearquivo'] <> "semimagem.jpg") {

                        $img = '<img class="responsive-img  materialboxed " id="img-noticia" src="' . UtilWebservice::$HOST_NAME . UtilWebservice::$PROJECT_NAME . 'app/images/site/' . $value['nomearquivo'] . '">';
                    }

                    $div = '
                <h5 class="center-align"><b>' . $value['titulo'] . '</b></h5>
                <hr class="intro-divider"> <br>
                <a class="grey-text"> <i class="material-icons tiny">watch_later</i> &nbsp;' . $value['dia'] . ' de ' . $value['mes'] . ' ' . $value['ano'] . ' | ' . $value['hora'] . ' </a>
                <br> <br>';

                    echo $div;

                    $GRUPO_SERVICO_WEBSERVICE =
                        UtilWebservice::$HOST_NAME .
                        UtilWebservice::$PROJECT_NAME .
                        UtilWebservice::$WEBSERVICE_DIRECTORY .
                        "GaleriaImagemWebservice.class.php";

                    $json = UtilWebservice::callWebservice("GaleriaImagemWebservice", ['galeria_id' => $value['id']], 'POST' );
                    $dados = $json[UtilWebservice::$DADOS_TAG];

                    $galleryHtml = '<div class="demo-gallery">
                                    <ul id="lightgallery" class="list-unstyled row">';

                    foreach($dados as $dado) {

                    $galleryHtml .= '
                                
                    <li class="col-xs-6 col-sm-4 col-md-3" data-responsive="' . UtilWebservice::$HOST_NAME . UtilWebservice::$PROJECT_NAME . 'app/images/site/galeria/' . $dado['foto_arquivo'] . '" data-src="' . UtilWebservice::$HOST_NAME . UtilWebservice::$PROJECT_NAME . 'app/images/site/galeria/' . $dado['foto_arquivo'] . '" data-sub-html="<h4>' . $dado['titulo'] . '</h4><p>' . $dado['foto_descricao'] . '</p>">
                        <a href="">
                            <img class="img-responsive" src="' . UtilWebservice::$HOST_NAME . UtilWebservice::$PROJECT_NAME . 'app/images/site/galeria/' . $dado['foto_arquivo'] . '">
                        </a>
                    </li>';

                    }
                    $galleryHtml .= ' 
                        </ul>
                    </div>';

                    echo $galleryHtml;
                }

        }

            if (!filter_input(INPUT_GET, 'key')) {

                echo '
            
        </div>';
            }

        if( !filter_input(INPUT_GET, 'key') ){
          getPagination( ceil(count($values) /$qReg), $numberPage  );
        }
}

    function getPagination( $count, $page )
    {

    $numberPage = intval((filter_input(INPUT_GET, 'p')) ? filter_input(INPUT_GET, 'p') : "1");

       
        $back = $numberPage - 1;

      $div = '<center>
        <ul class="pagination">
            <li class="waves-effect"><a href="index.php?page=Galeria&p='.$back.'"><i class="material-icons">chevron_left</i></a></li>';
      echo $div;

        
      for ($i=1; $i <= $count ; $i++) { 

        if ($numberPage == $i) 
        {
            $classe = 'class="active"';
        }else{
            $classe = '';
        }
        
        $forward = $numberPage + 1;

        $div = ' <li '.$classe.' ><a href="index.php?page=Galeria&p='.$i.'">'.$i.'</a></li>';
        echo $div;
      }

      if ($count > $numberPage) 
      {
        echo '<li class="waves-effect"><a href="index.php?page=Galeria&p='.$forward.'"><i class="material-icons">chevron_right</i></a></li>';
      }
    

    echo '</ul>
        </center>';
    }
        if (!filter_input(INPUT_GET, 'key')) {

            print_r(mountCategoriaJson());
        }
        echo "</div>";

        print_r(mountNoticiaJson());

?>


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
                    <div class="card tiny">
                        <div class="card-image" >
                            <img src="' . UtilWebservice::$HOST_NAME . UtilWebservice::$PROJECT_NAME . '/app/images/site/' . $value['nomearquivo'] . '" width="320" height="205">
                            <span class="card-title"></span>
                        </div>
                        <div class="card-content">
                            <p class="grey-text"> <i class="material-icons tiny">watch_later</i> &nbsp;' . $value['dia'] . ', ' . $value['mes'] . ' ' . $value['ano'] . '</p><br>
                           <a href="index.php?page=Noticias&key=' . $value['id'] . '"> <p class="truncate">' . $titulo  . '</p></a>
                        </div>
                        <div class="card-action">
                            <a href="index.php?page=Noticias&key=' . $value['id'] . '"><i class="material-icons tiny">subject</i>&nbsp;Leia Mais</a>
                        </div>
                    </div>
                </div>';

                    echo $div;
                }
            }
                if ($value['id'] == $_GET['key']) {

                    //if para sem imagem
                    if ($value['nomearquivo'] <> "semimagem.jpg") {

                        $img = '<img class="responsive-img  materialboxed " id="img-noticia" src="' . UtilWebservice::$HOST_NAME . UtilWebservice::$PROJECT_NAME . '/app/images/site/' . $value['nomearquivo'] . '">';
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
            <li class="waves-effect"><a href="index.php?page=Noticias&p='.$back.'"><i class="material-icons">chevron_left</i></a></li>'; 
      echo $div;

        
      for ($i=1; $i <= $count ; $i++) { 

        if ($numberPage == $i) 
        {
            $classe = 'class="active"';
        }else{
            $classe = '';
        }
        
        $forward = $numberPage + 1;

        $div = ' <li '.$classe.' ><a href="index.php?page=Noticias&p='.$i.'">'.$i.'</a></li>'; 
        echo $div;
      }

      if ($count > $numberPage) 
      {
        echo '<li class="waves-effect"><a href="index.php?page=Noticias&p='.$forward.'"><i class="material-icons">chevron_right</i></a></li>'; 
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


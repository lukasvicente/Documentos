<main class="container section no-pad-bot">
    <div class="row" >
<?php

//ini_set('display_errors', 1);
//ini_set('display_startup_erros', 1);
//error_reporting(E_ALL);
require_once "app/control/UtilWebservice.php";
require_once "app/control/Url.php";


function mountSliderJson()
{
        $GRUPO_SERVICO_WEBSERVICE =
        UtilWebservice::$HOST_NAME .
        UtilWebservice::$PROJECT_NAME .
        UtilWebservice::$WEBSERVICE_DIRECTORY .
        "SliderNoticiaWebservice.class.php";

        $jsonData = file_get_contents( $GRUPO_SERVICO_WEBSERVICE );
        $jsonServicos = json_decode( $jsonData, true );
        $successServico = $jsonServicos[UtilWebservice::$SUCCESS_TAG];
        $dadosJson = $jsonServicos[UtilWebservice::$DADOS_TAG];



        if( $successServico == 1 )
        {

            mountSlider( $dadosJson );

        }else if( $successServico == 2 )
        {

            //new TMessage( 'INFO', 'Nenhum valor foi encontrado.' );

        }else if( $successServico == 0 )
        {

            //new TMessage( 'INFO', 'Ocorreu um problema, tente novamente.' );

        }
}



    function mountSlider( $values )
    {
        
        $url = URL::getBase();
                
        $div = '
         <div class="slider">
        <ul class="slides bluee lighten-1 z-depth-4" style="border-radius: 15px 50px 30px; ">
        ';

        echo $div;

        foreach ($values as $key) {

       $descricao = substr( $key['descricao'], 0,80 ) . "...";
       $titulo =  $key['titulo']. "...";

       //$className =  'sliderdiv';
       $div = '<li> 
        <a href="'.$url.'Noticias/'.$key['apelido'].'/'.$key['id'].'"> 
       <img style="border-radius: 15px 50px 30px; padding: 100px; " src="'. UtilWebservice::$HOST_NAME . UtilWebservice::$PROJECT_NAME .'app/images/site/'. strtolower($key['tipo']) .'/'. $key['nomearquivo'] .'"> <div  class="caption center-align sliderdiv">
                <h4 style="text-shadow: 2px 2px #000;">'.  $titulo .'</h4>
                
             </div> </a>
              </li>
             ';


  echo $div;

    }
        $div =' 
    </ul>
  </div>
';
        echo $div;
  }

echo '<div class="row">
            <div class="col s12 m4 l8"><p>';

        print_r(mountSliderJson());

echo '</p></div>';
    ?>

        <div class="col s12 m4 l4">
            <p align="center">
            <img  id="img_borda_home" class="responsive-img  materialboxed " width="280"
                 src="app/images/40anosAssema.jpg">
            </p>
        </div>
    </div>
    <div class="intro-message center-align">
        <h3>Destaques</h3>
        <hr class="intro-divider">
    </div>
<?php

        $DESTAQUE_SERVICO_WEBSERVICE =
        UtilWebservice::$HOST_NAME .
        UtilWebservice::$PROJECT_NAME .
        UtilWebservice::$WEBSERVICE_DIRECTORY .
        "DestaqueWebservice.class.php";

        $jsonData = file_get_contents( $DESTAQUE_SERVICO_WEBSERVICE );
        $jsonServicos = json_decode( $jsonData, true );
        $successServico = $jsonServicos[UtilWebservice::$SUCCESS_TAG];
        $dadosJson = $jsonServicos[UtilWebservice::$DADOS_TAG];

        if( $successServico == 1 )
        {

            mountDestaque( $dadosJson );


        }else if( $successServico == 2 )
        {

            //new TMessage( 'INFO', 'Nenhum valor foi encontrado.' );

        }else if( $successServico == 0 )
        {

            //new TMessage( 'INFO', 'Ocorreu um problema, tente novamente.' );

        }



function mountDestaque( $values )
    {
        echo '<div class="row">';

        foreach ($values as $key) {

            $descricao = substr($key['descricao'], 0, 80) . "...";
            $titulo = substr($key['titulo'], 0, 50) . "...";


            $div1 = '

      <div class="col s12 m4 l4"> <!-- Note that "m4 l3" was added -->
        <div>

          <div class="card-panel hoverable"> <i class="material-icons tiny">description</i> <b>' . $key['titulo'] . '</b>  <br>&nbsp; <div align="justify">' . $key['descricao'] . '</div>
        </div>

      </div>  <!-- Grey navigation panel

              This content will be:
          3-columns-wide on large screens,
          4-columns-wide on medium screens,
          12-columns-wide on small screens  -->
      </div>';
            echo $div1;


    }

  }
?>

      </div>

<div class="intro-message center-align">
    <h3>Serviços</h3>
    <hr class="intro-divider">
</div>


<div class="section">

    <!--   Icon Section   -->
    <div class="row">
        <div class="col s12 m4">
            <div class="icon-block">
                <h2 class="center light-blue-text"><i class="material-icons">local_hospital</i></h2>
                <h5 class="center">Plano de Saúde</h5>

                <p class="light">Declaração do Imposto de Renda dos Planos de Saúde da ASSEMA/RN.</p>
                <div class="center">
                    <a href="http://servicos.emater.rn.gov.br/assemarn/documentos/PlanoSaude.php" target="_blank"
                       id="download-button" class="btn-large waves-effect waves-light blue">Consultar</a>
                </div>
            </div>

        </div>
        <div class="col s12 m4">
            <div class="icon-block">
                <h2 class="center light-blue-text"><i class="material-icons">group</i></h2>
                <h5 class="center">Dissidio Coletivo</h5>

                <p class="light">Para consultar os valores do dissidio coletivo e sobre o processo URV</p>
                <div class="center">
                    <a href="http://servicos.emater.rn.gov.br/assemarn/documentos/Dissidio.php" target="_blank"
                       id="download-button" class="btn-large waves-effect waves-light blue">Consultar</a>
                </div>
            </div>

        </div>

    </div>
</div>

</div>

<div class="intro-message center-align">
    <h3>Parceiros</h3>
    <hr class="intro-divider">
</div>

<div class="col  m3 s6 center-align">
    <a href="#">
        <img height="130px" src="app/images/ceres.png" alt="">
    </a>
    <a href="http://www.emater.rn.gov.br/" target="_blank">
        <img height="130px" src="app/images/LOGO_EMATER.png" alt="">
    </a>
</div>

</main>


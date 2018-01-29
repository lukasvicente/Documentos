<?php 

//ini_set('display_errors', 1);
//ini_set('display_startup_erros', 1);
//error_reporting(E_ALL);
require_once "app/control/UtilWebservice.php"; 
  
        $GRUPO_SERVICO_WEBSERVICE =
        UtilWebservice::$HOST_NAME .
        UtilWebservice::$PROJECT_NAME .
        UtilWebservice::$WEBSERVICE_DIRECTORY .
        "SliderMulherWebservice.class.php";

        $jsonData = file_get_contents( $GRUPO_SERVICO_WEBSERVICE );
        $jsonServicos = json_decode( $jsonData, true );
        $successServico = $jsonServicos[UtilWebservice::$SUCCESS_TAG];
        $dadosJson = $jsonServicos[UtilWebservice::$DADOS_TAG];
        
        $div = '<main class="container section no-pad-bot">
        <div class="row" > <div class="slider">
        <ul class="slides">
        ';

        echo $div;

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

    function mountSlider( $values )
    {
        foreach ($values as $key) {

        
        $div = '<li> <img src="'. UtilWebservice::$HOST_NAME . UtilWebservice::$PROJECT_NAME .'app/images/mulheres/'. strtolower($key['tipo']) .'/'. $key['nomearquivo'] .'">';
        $div .= '<div class="caption center-align style="text-shadow: 2px 2px #000;"><h3>'.$key['titulo'].'</h3>';
        
  echo $div;

    }
  }

  $div ='</div>
      </li>
      
    </ul>
  </div>
';
echo $div;
    ?>
<section>


    <div class="intro-message center-align">
      <h3>Parceiros</h3>
      <hr class="intro-divider">
    </div>

    <div class="col  m3 s6 center-align">
      <a href="#">
        <img height="110px" src="app/images/ceres.png" alt="">
      </a>
    </div>

    
  <div/>
</main>
<section/>


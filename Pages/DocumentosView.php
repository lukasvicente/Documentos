
  <div class="container">
    <div class="section">
<nav class="light-blue lighten-1">
  <div class="nav-wrapper">
    <div class="col s12">
      <a href="index.php" class="breadcrumb"><i style="margin-left:20px;" class="material-icons">home</i></a>
      <a href="index.php?page=Documentos" class="breadcrumb">Documentos</a>
    </div>
  </div>
</nav>
    </div>
  </div>

<?php 

require_once "app/control/UtilWebservice.php"; 
  
        $GRUPO_SERVICO_WEBSERVICE =
        UtilWebservice::$HOST_NAME .
        UtilWebservice::$PROJECT_NAME .
        UtilWebservice::$WEBSERVICE_DIRECTORY .
        "DocumentoWebservice.class.php";

        $jsonData = file_get_contents( $GRUPO_SERVICO_WEBSERVICE );
        $jsonServicos = json_decode( $jsonData, true );
        $successServico = $jsonServicos[UtilWebservice::$SUCCESS_TAG];
        $dadosJson = $jsonServicos[UtilWebservice::$DADOS_TAG];
        



        if( $successServico == 1 )
        {
        
            mountDocumentos( $dadosJson );
             
        }else if( $successServico == 2 )
        {
             
            //new TMessage( 'INFO', 'Nenhum valor foi encontrado.' );
             
        }else if( $successServico == 0 )
        {
             
            //new TMessage( 'INFO', 'Ocorreu um problema, tente novamente.' );
             
        }

function mountDocumentos( $values )
    {
      $div = '  
      <div class="container">
      <div class="section">
      <div class="row">
      <div class="section scrollspy">
      <div class="col s12">
      <ul class="tabs tab-demo z-depth-1">';

      echo $div;


      foreach ($values as $key) {

      $div = '<li class="tab col s3"><a href="#'.$key['tipo'].'">'.$key['tipo'].'</a></li>';
     
      echo $div;

      }

      echo "</ul></div>";
  }


?>


    <div id="BALANCETES" class="col s12">
    <ul class="collapsible" data-collapsible="accordion">
    <li>
      <div class="collapsible-header"><i class="material-icons">date_range</i>2017</div>
      <div class="collapsible-body"><span>Janeiro</span></div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">date_range</i>2016</div>
      <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">date_range</i>2015</div>
      <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
    </li>
  </ul>
    </div>

    <div id="PORTARIAS" class="col s12">Test 2</div>
    <div id="test3" class="col s12">Test 3</div>
    <div id="test4" class="col s12">Test 4</div>
  </div>
</div>
    </div>
    <br><br>
  </div>
<br><br>

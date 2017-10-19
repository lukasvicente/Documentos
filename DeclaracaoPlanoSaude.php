<?php require_once "util.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>ASSEMA - RN</title>

  <!-- CSS  -->
<?php setStyle(); ?>
</head>
<body>
  <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="index.php" class="brand-logo">Logo</a>
 
 
    </div>
  </nav>
  <div class="container">
    <p>Declaramos para os devidos fins, junto a RECEITA FEDERAL, que o(s) associado(s), efetuou(aram) durante o exerc&iacute;cio de 2015, os pagamentos com planos de sa&uacute;de de acordo com os valores descritos abaixo.</p>
  </div> 
  <div class="container">
  <div class="col s12 m4 l8"> 

<a href="PlanoSaude.php" id="download-button" class="btn waves-effect waves-light blue">Voltar
<i class="material-icons right">arrow_back</i>
</a>

<a href="#" id="download-button" class="btn waves-effect waves-light green">Imprimir
<i class="material-icons right">file_download</i>
</a>

  <?php
  require_once "app/model/DeclaracaoRecord.php";
  $objects = DeclaracaoRecord::getData();

 
  echo "<table align=center class='striped'> ";

  echo "<thead> <tr><td  >Plano</td><td  >Tipo</td><td  >Nome</td><td  >CPF</td><td  >Valor</td></tr> </thead>";
  foreach ( $objects as $object ) {
    if ($_POST['cpf'] == $object['titular']) {
      
    
  echo " <tr><td>".$object['plano']."</td><td>".$object['tipo']."</td><td>".$object['nome']."</td><td  >".$object['paciente']."</td><td>".$object['valor']."</td></tr>  
      ";
}

  }
  ?>
 
 </div> 
 </div>
  <?php setScripts(); ?>
  </body>
</html>

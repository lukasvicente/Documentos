<?php require_once "../util.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>ASSEMA - RN</title>

  <!-- CSS  -->
  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="../lib/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../lib/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="../index.php" class="brand-logo">Logo</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="#">Navbar Link</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h3 class="header center orange-text">Declarações IRPF</h3>

<p id="carregamento"></p>
   
<script type="text/javascript">
 
  function Refresh()
  {

     window.location.reload();
  }
  
  function valida(form){

    if(form.cpf.value=="")
    {
      alert("Preencha o campo CPF corretamente!");
      form.cpf.focus();
      Refresh();
    return false;
    }

}
    </script>

    <form name="formirpf" action="DeclaracaoPlanoSaude.php" method="POST" class="col s12" onsubmit="return valida(this);return false;">
      <div class="row">
        <div class="input-field col s6">
          <input placeholder="Somente Números" name="cpf"  id="cpf"  type="text" class="validate" maxlength="11">
          <label for="cpf">CPF</label>
        </div>
 
      </div>

 
<a href="../index.php?page=Documentos" id="download-button" class="btn waves-effect waves-light blue">Voltar
<i class="material-icons right">arrow_back</i>
</a>
&nbsp;
  <button class="btn waves-effect waves-light" type="submit" id="geral" name="envgeral"
  onclick="myFunction()"
  >Declaração
    <i class="material-icons right">arrow_forward</i>
  </button>

<script>
function myFunction() {
 
    var html;

    html =` <center>
<div class="preloader-wrapper big active">
    <div class="spinner-layer spinner-blue-only">
      <div class="circle-clipper left">
        <div class="circle"></div>
      </div><div class="gap-patch">
        <div class="circle"></div>
      </div><div class="circle-clipper right">
        <div class="circle"></div>
      </div>
    </div>
  </div>
  </center> ` ;
 
    document.getElementById("carregamento").innerHTML = html;
}

</script>

    </form>

      </div>
      <br><br>

  </div>


  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">

        </div>

        <div class="col s12 m4">


        </div>

        <div class="col s12 m4">

        </div>
      </div>

    </div>

    <br><br><br> 
  </div>

<!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="../lib/js/materialize.js"></script>
  <script src="../lib/js/init.js"></script>
  <script src="../lib/js/app.js"></script>
  <script src="../lib/js/carousel.js"></script>

  <footer class="page-footer orange">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text"> 
          <a class="white-text text-lighten-3" href="http://www.assemarn.com.br">ASSEMA/RN</a>
          </h5>
          <p class="grey-text text-lighten-4">Associação dos Servidores da Emater-RN Centro Administrativo do Estado – BR-101 km 0 – CEP 59064.901 – Lagoa Nova – Natal-RN CGC 08.455.941/0001-21.</p>
          <p class="grey-text text-lighten-4">
           Fone 84 3234-9490 – Cel. 84 9950-9341
          </p>
          <p class="grey-text text-lighten-4">
           E-Mail: assemarn@assemarn.com.br
          </p>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Settings</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Connect</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
        Copyright © 2017 Associação dos Servidores da Emater-RN. Todos os direitos reservados.
      </div>
    </div>
  </footer>

  </body>
</html>

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

 
<a href="index.php" id="download-button" class="btn waves-effect waves-light blue">Voltar
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

  
  <?php setFooter(); ?>
  <?php setScripts(); ?>
  </body>
</html>

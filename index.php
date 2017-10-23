<?php require_once "util.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>ASSEMA - RN</title>

<?php setStyle(); ?>

</head>
<body>
  <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="index.php" class="brand-logo">Logo</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="#">SITE ASSEMA</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="#">SITE ASSEMA</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center orange-text">Declarações e Documentos</h1>

      <div class="row center">

      </div>
      <br><br>

    </div>
  </div>


  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">local_hospital</i></h2>
            <h5 class="center">Plano de Saúde</h5>

            <p class="light">Declaração do Imposto de Renda dos Planos de Saúde da ASSEMA/RN.</p>
          </div>
          <div>
                  <a href="PlanoSaude.php" id="download-button" class="btn-large waves-effect waves-light blue">Consultar</a>
                  </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">group</i></h2>
            <h5 class="center">Dissidio Coletivo</h5>

            <p class="light">By utilizing elements and principles of Material Design, we were able to create a framework that incorporates components and animations that provide more feedback to users. Additionally, a single underlying responsive system across all platforms allow for a more unified user experience.</p>
          </div>
          <div>
          <a href="http://materializecss.com/getting-started.html" id="download-button" class="btn-large waves-effect waves-light blue">Consultar</a>
           </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">settings</i></h2>
            <h5 class="center">Serviços</h5>

            <p class="light">We have provided detailed documentation as well as specific code examples to help new users get started. We are also always open to feedback and can answer any questions a user may have about Materialize.</p>
          </div>
        </div>
      </div>

    </div>
    <br><br>
  </div>

  <?php setFooter(); ?>
  <?php setScripts(); ?>
  
  </body>
</html>

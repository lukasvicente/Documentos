<?php require_once "util.php";
require_once "app/control/UtilWebservice.php";
set_time_limit(0);
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <meta name="author" content="Lucas Vicente - lucasvicente2@gmail.com" />
    <title>ASSEMA - RN</title>
  <link rel="icon" type="image/x-icon" href="app/images/favicon.ico" sizes="16x16">

<?php setStyle(); ?>

</head>
<body>

  <?php setHeader();?>    

  <main>
  <?php
  setMain( isset( $_GET["page"] ) ? $_GET["page"] : NULL ); 
  ?>
  </main>

    
  <?php
  setFooter();  
  setScripts(); 
  ?>

  </body>
</html>

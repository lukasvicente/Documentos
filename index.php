<?php require_once "util.php";
require_once "app/control/UtilWebservice.php";
set_time_limit(0);
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>ASSEMA - RN</title>

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

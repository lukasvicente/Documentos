<?php

function formatarCpf($param){

$nbr_cpf = $param;

$parte_um     = substr($nbr_cpf, 0, 3);
$parte_dois   = substr($nbr_cpf, 3, 3);
$parte_tres   = substr($nbr_cpf, 6, 3);
$parte_quatro = substr($nbr_cpf, 9, 2);

$monta_cpf = "$parte_um.$parte_dois.$parte_tres-$parte_quatro";

return $monta_cpf;
}

$MenuOptions = [

    "Sobre" => "Sobre",
    "Noticias" => "Noticias",
    "Documentos" => "Documentos",
    "Contato" => "Contato"
    
];

function setMain( $page )
{
    if ( !empty( $page ) &&  file_exists( "Pages/{$page}View.php" ) ) {
        require_once "Pages/{$page}View.php";
    } else {
        require_once "Pages/HomeView.php";
    }
}

function setHeader()
{
    global $MenuOptions;

    $header = file_get_contents( "lib/html/header.html" );

    $options = "";
    foreach ( $MenuOptions as $page => $option ) {
       $options .= '<li><a href="index.php?page='.$option.'">'.$page.'</a></li>';
    }

    $header = str_replace( "{OPTIONS}", $options, $header );

    echo $header;
}
function setFooter()
{
    $footer = file_get_contents( "lib/html/footer.html" );

    $ano = date('Y');
    $footer = str_replace( "{ANO}", $ano, $footer );

    echo $footer;
}

function setStyle()
{
    echo file_get_contents( "lib/html/style.html" );
}

function setScripts()
{
    echo file_get_contents( "lib/html/scripts.html" );
}
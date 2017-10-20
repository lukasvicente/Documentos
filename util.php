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
function setFooter()
{
    echo file_get_contents( "lib/html/footer.html" );
}

function setStyle()
{
    echo file_get_contents( "lib/html/style.html" );
}

function setScripts()
{
    echo file_get_contents( "lib/html/scripts.html" );
}
 <?php
 require_once "app/control/Url.php";


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
    $key = URL::getURL(0);

    if (  file_exists( "Pages/{$page}View.php" ) )
    {
        require_once "Pages/{$page}View.php";
    }
    elseif ($key == null)
    {
        require_once "Pages/HomeView.php";
    }else
    {
        require_once "Pages/error404.php";

    }
}

function setHeader()
{
    $url = URL::getBase();
    global $MenuOptions;

    $header = file_get_contents( "lib/html/header.html" );

    $options = "";

   

    foreach ( $MenuOptions as $page => $option ) {
       $options .= '<li><a href="'.$url.$option.'">'.$page.'</a></li>';
    }

    $header = str_replace( "{OPTIONS}", $options, $header );
    $header = str_replace( "{URL}", $url, $header );

    echo $header;
}
function setFooter()
{
    
    $footer = file_get_contents( "lib/html/footer.html" );


    $ano = date('Y');
    $url = URL::getBase();
    $footer = str_replace( "{ANO}", $ano, $footer );
    $footer = str_replace( "{URL}", $url, $footer );

    echo $footer;
}

function setStyle()
{
    $style =  file_get_contents( "lib/html/style.html" );
    $url = URL::getBase();
    $versao = uniqid();
    $style = str_replace( "{URL}", $url, $style );
    $style = str_replace( "{VERSAO}", $versao, $style );

    echo $style;
}

function setScripts()
{
    $script = file_get_contents( "lib/html/scripts.html" );

    $versao = uniqid();
    $url = URL::getBase();

    $script = str_replace( "{URL}", $url, $script );
    $script = str_replace( "{VERSAO}", $versao, $script );

    echo $script;
}
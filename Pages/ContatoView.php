<?php

require_once "app/control/UtilWebservice.php";
require_once "app/control/Url.php";

$key = Url::getURL(1);
$url = URL::getBase();

?>


<div class="container">
    <div class="section">
        <nav class="teal lighten-2">
            <div class="nav-wrapper">
                <div class="col s12">
                    <a href="<?php echo $url; ?>" class="breadcrumb"><i style="margin-left:20px;" class="material-icons">home</i></a>
                    <a href="<?php echo $url; ?>Contato" class="breadcrumb">Contato</a>
                </div>
            </div>
        </nav>
    </div>

    <div class="row">
        <div class="col s12"><p class="align-center"></p></div>
        <div class="col s12 m6"><p>

            <div class="row">
                <form class="col s12" action="index.php?page=Contato" method="post">
                    <ul class="collection">
                        <li class="collection-item active">Mande sua mensagem</li>

                    </ul>
                    <div class="row">

                        <div class="input-field col s12">

                            <input required placeholder="Ex.: Ana" name="nome" id="nome" type="text" class="validate">
                            <label for="nome">Nome</label>
                        </div>

                        <div class="input-field col s12">
                            <input required  placeholder="Ex.: exemplo@exemplo.com" name="email" id="email" type="email" class="validate">
                            <label for="email" data-error="Inválido" data-success="Válido">E-mail</label>
                        </div>

                        <div class="input-field col s12">
                            <input required  placeholder="Ex.: Sugestão, Reclamação etc." name="assunto" id="assunto" type="text" class="validate">
                            <label for="assunto">Assunto</label>
                        </div>

                        <div class="input-field col s12">
                            <textarea required name="texto" id="texto" class="materialize-textarea"></textarea>
                            <label for="texto">Mensagem</label>

                            <button class="btn waves-effect waves-light" type="submit" name="action" value="enviar">Enviar
                                <i class="material-icons right">send</i>
                            </button>

                        </div>

                    </div>

                </form>

            </div>

            </p></div>
        <div class="col s12 m6">

            <ul class="collection">
                <li class="collection-item active">SEDE ADMINISTRATIVA</li>
            </ul>

            <div class="blue-text">
                <p>Centro Administrativo - s/n Km 2 - Lagoa Nova, Natal/RN -
                 59064-901</p>
                Prédio da Emater/RN
                </p>
            </div>

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3969.1841204418256!2d-35.21711158523274!3d-5.829646695775913!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7b2556255555555%3A0xcdc0b38782dfa748!2sAssocia%C3%A7%C3%A3o+dos+Servidores+da+Emater+RN!5e0!3m2!1spt-BR!2sbr!4v1527520719852"
                    width="100%" height="350" frameborder="0" style="border:0" allowfullscreen>
            </iframe>
            </p></div>
    </div>


    <?php

    require_once "app/control/UtilWebservice.php";

    $para = "contato@assemarn.com.br";
    $email_servidor = "assemarn@assemarn.com.br";
    $nome = $_POST['nome'];
    $assunto = $_POST['assunto'];
    $email = $_POST['email'];
    $mensagem = $_POST['texto'];
    $data_envio = date('d/m/Y');
    $hora_envio = date('H:i:s');

    if ( (!empty($assunto)) && (!empty($nome)) && (!empty($email)) && (!empty($mensagem)) )
    {

        enviaEmail($email,$assunto,$mensagem,$para, $nome);

        $script = '
        <script type="text/javascript">
        alert("Enviado com Sucesso");
        </script>
        ';
        echo $script;
    }

    function enviaEmail($de, $assunto, $mensagem, $para, $nome)
    {
        $headers = "From: $nome <$de>\r\n" .
            "Reply-To: $de\r\n" .
            "X-Mailer: PHP/" . phpversion() . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        $mensagem = $mensagem . " <br><br><br> Mensagem enviada pelo site.";

        mail($para, utf8_decode($assunto), utf8_decode($mensagem), $headers);
    }

    //$token = md5(uniqid(""));
    //echo $token;
    ?>


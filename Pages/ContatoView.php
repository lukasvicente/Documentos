<div class="container">
    <div class="section">
        <nav class="light-blue lighten-1">
            <div class="nav-wrapper">
                <div class="col s12">
                    <a href="index.php" class="breadcrumb"><i style="margin-left:20px;" class="material-icons">home</i></a>
                    <a href="index.php?page=Contato" class="breadcrumb">Contato</a>
                </div>
            </div>
        </nav>
    </div>

    <div class="row">
    <div class="col s12"><p class="align-center"> </p></div>
    <div class="col s12 m6"><p>

     <div class="row">
    <form class="col s12">
<ul class="collection">
      <li class="collection-item active">Mande sua mensagem</li>

    </ul>
      <div class="row">
            
        <div class="input-field col s12">

          <input id="nome" type="text" class="validate">
          <label for="nome">Nome</label>
        </div>

         <div class="input-field col s12">
          <input id="email" type="email" class="validate">
          <label for="email" data-error="Inválido" data-success="Válido">E-mail</label>
        </div>

        <div class="input-field col s12">
          <input id="assunto" type="text" class="validate">
          <label for="assunto">Assunto</label>
        </div>

        <div class="input-field col s12">
          <textarea id="textarea1" class="materialize-textarea"></textarea>
          <label for="textarea1">Mensagem</label>
        </div>
        <button class="btn waves-effect waves-light" type="submit" name="action">Enviar
        <i class="material-icons right">send</i>
        </button>
        
      </div>
      
    </form>

  </div>

  </p></div>
    <div class="col s12 m6">
    <div class=" blue-text"> 
        <p>Centro Administrativo - s/n Km 2 - Lagoa Nova, Natal/RN<p> 59064-901</p>
        Prédio da Emater/RN
        </p>
    </div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3969.1841204418256!2d-35.21711158523274!3d-5.829646695775913!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7b2556255555555%3A0xcdc0b38782dfa748!2sAssocia%C3%A7%C3%A3o+dos+Servidores+da+Emater+RN!5e0!3m2!1spt-BR!2sbr!4v1527520719852" width="100%" height="290" frameborder="0" style="border:0" allowfullscreen>       
    </iframe>
    </p></div>
  </div>


        <?php

        require_once "app/control/UtilWebservice.php";

        
?>


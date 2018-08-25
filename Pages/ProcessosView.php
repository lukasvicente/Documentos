<div class="container">
    <div class="section">
        <nav class="teal lighten-2">
            <div class="nav-wrapper">
                <div class="col s12">
                    <a href="index.php" class="breadcrumb"><i style="margin-left:20px;" class="material-icons">home</i></a>
                    <a href="index.php?page=Processos" class="breadcrumb">Processos</a>
                </div>
            </div>
        </nav>
    </div>
</div>
<div class="row">

    <div class="container">
        <div class="col s12 m8 l7">
            <br>
            <h3 class="header center orange-text">Consultar Processo</h3>
            <p class="header center orange-text">Processos EMATER-RN</p>
            <br>

            <p id="carregamento"></p>

            <script type="text/javascript">

                function Refresh() {

                    window.location.reload();
                }

                function valida(form) {

                    if (form.cpf.value == "") {
                        alert("Preencha o campo CPF corretamente!");
                        form.cpf.focus();
                        Refresh();
                        return false;
                    }

                }
            </script>
            <div class="nav-wrapper container">

                <div id="modal1" class="modal">
                    <div class="modal-content">
                        <h4><i class="small material-icons">notifications_active</i> Alerta</h4>
                        <p>O CPF deve ser informado.</p>
                    </div>
                    <div class="modal-footer">
                        <a href="Dissidio.php" class="modal-action modal-close waves-effect waves-green btn-flat">OK</a>
                    </div>
                </div>


                <form name="formirpf" action="DissidioList.php" method="POST" class="col s12"
                      onsubmit="return valida(this);return false;">


                    <div class="row">
                        <div class="input-field col s12">
                            <select>
                                <option value="" disabled selected>::.Selecione.::</option>
                                <option value="1">Dissidio Coletivo nº 1312300-89</option>
                                <option value="2">Precatorio nº 138700-89</option>
                                <option value="3">URV nº 131230-89</option>
                            </select>

                        </div>
                        <br>
                        <div class="input-field col s9">
                            <input placeholder="Somente Números" name="cpf" id="cpf" type="text" class="validate"
                                   maxlength="11">
                            <label for="cpf">CPF</label>
                        </div>


                        <a href="index.php" id="download-button" class="btn waves-effect waves-light blue">Voltar
                            <i class="material-icons right">arrow_back</i>
                        </a>
                        &nbsp;
                        <button class="btn waves-effect waves-light blue" type="submit" id="geral" name="envgeral"
                                onclick="myFunction()"
                        >Consultar
                            <i class="material-icons right">arrow_forward</i>
                        </button>
                    </div>
            </div>
            <script>

                function myFunction() {

                    var html;

                    html = ` <center>
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
  </center> `;

                    document.getElementById("carregamento").innerHTML = html;
                }

            </script>

            </form>
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col s12 m4 l4">
            <h3 class="header center orange-text">Processos Coletivos</h3>

            <p class="header center orange-text">Informações sobre os processos coletivos</p>

            <table class="striped">
                <thead>
                <tr>
                    <th>Advogado</th>
                    <th class="right-align">Relação dos Servidores</th>

                </tr>
                </thead>

                <tbody>
                <tr>
                    <td>Dr. Mariza</td>
                    <td class="right-align"><a href="documents/servidores_mariza.pdf" target="_blank">Download</a></td>

                </tr>
                <tr>
                    <td>Dr. Breno/Eliete</td>
                    <td class="right-align"><a href="documents/servidores_breno.pdf" target="_blank">Download</a></td>

                </tr>
                <tr>
                    <td>Dr. Manoel <font color=red><b>*</b></font></td>
                    <td class="right-align"><a href="documents/servidores_manoel.pdf" target="_blank">Download</a></td>

                </tr>

                </tbody>
            </table>
            <p><font color=red><b>*</b></font> Obs.: Documento não é URV</p>
        </div>
    </div>

</div>
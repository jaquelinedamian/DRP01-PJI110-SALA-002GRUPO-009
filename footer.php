
<div class="footer2 mt-auto text-white-50">
 
    <ul class="nav justify-content-center">
      <li class="nav-item"><a href="index.html" class="nav-link px-2 text-body-secondary">Home</a></li>
      <li class="nav-item"><a href="login.html" class="nav-link px-2 text-body-secondary">Login</a></li>
      <li class="nav-item"><a href="cadastro.html" class="nav-link px-2 text-body-secondary">Cadastro</a></li>
  
    </ul>
    <p class="text-center">© 2024 TurmaTec</p>

  </div>
  
  
<script>
function adicionarOpcaoSelecionada(id) {
    var select = document.getElementById(id);
    var idNumber = parseInt(id.match(/\d+/)[0]);
    var opcoesSelecionadasDiv = document.getElementById("opcoesSelecionadas" + idNumber);

    var opcaoSelecionada = select.options[select.selectedIndex].text;

    // Verifica se a opção já foi selecionada
    if (opcoesSelecionadasDiv.querySelector(".opcao-selecionada[data-opcao='" + opcaoSelecionada + "']")) {
        alert("Esta opção já foi selecionada.");
        return;
    }

    var novaOpcaoDiv = document.createElement("div");
    novaOpcaoDiv.textContent = opcaoSelecionada;
    novaOpcaoDiv.className = "opcao-selecionada";
    novaOpcaoDiv.setAttribute("data-opcao", opcaoSelecionada);

    var botaoRemover = document.createElement("button");
    botaoRemover.textContent = "x";
    botaoRemover.addEventListener("click", function() {
        opcoesSelecionadasDiv.removeChild(novaOpcaoDiv);
    });

    novaOpcaoDiv.appendChild(botaoRemover);
    opcoesSelecionadasDiv.appendChild(novaOpcaoDiv);
}
</script>   
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>

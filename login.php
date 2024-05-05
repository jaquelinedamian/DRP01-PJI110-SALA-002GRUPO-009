<?php include 'header0.php'; ?>


<!-- Pagina Login-->
<div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
  <div class="form-signin w-100 m-auto">
    <form id="login-form">
      <br>
      <div class="col-12 col-sm-12 col-xl-2"> <a href="index.php" class="text-decoration-none nav-link text-white"> <img src="img/Logo-preto.svg" alt="logo" width="150" > </a> </div>
      <!--<img class="mb-4" src="" alt="" width="72" height="57">-->
      <h1 class="h3 mb-3 fw-normal">Faça seu login</h1>
      <div class="form-floating">
        <input type="email" class="form-control" id="floatingInput username" placeholder="Digite seu email">
        <label for="floatingInput">E-mail</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword password" placeholder="Senha">
        <label for="floatingPassword">Senha</label>
      </div>
      <div class="text-start my-3"> <!-- Button trigger modal -->
        
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalrecuperar"> Esqueci a senha </button>
		  
		<a href="cadastro.php" class="text-white text-decoration-none"> <button type="button" class="btn btn-primary" > Fazer cadastro </button></a>
        
        <!-- Modal --></div>
      <a href="pagina-inicial.php">
      <button class="btn btn-primary w-100 py-2 " type="button" id="login-btn">Entrar</button>
      </a>
    </form>
    <div class="modal fade" id="modalrecuperar" tabindex="-1" aria-labelledby="modalrecuperar" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="modalrecuperar">Recuperar conta</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <label>Digite seu e-mail</label>
            <input type="email">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary">Enviar</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Fim modal tabela --> 
  </div>
</div>

<?php include 'footer.php'; ?>
		
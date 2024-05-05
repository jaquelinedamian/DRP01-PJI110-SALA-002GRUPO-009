<?php include 'header0.php'; ?>

<!-- Pagina Cadastro-->

<div class="container">
	<br><br>
  <h1>Cadastro</h1>
  <form>
    <div class="mb-3">
      <label class="form-label">Digite seu nome</label>
      <input class="form-control" type="text" placeholder="">
    </div>
    <div class="mb-3">
      <label class="form-label">Digite seu e-mail</label>
      <input type="email" class="form-control" >
      <div id="emailHelp" class="form-text">Nunca compartilharemos seu e-mail com mais ninguém.</div>
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Digite sua senha</label>
      <input type="password" class="form-control" id="password">
    </div>
    <div class="mb-3">
      <label for="anexarfoto">Foto de Perfil</label>
      <input type="file" class="form-control-file" id="anexarfoto">
    </div>
    <a href="pos-cadastro.php">
    <button type="button" class="btn btn-primary">Cadastrar</button>
    </a>
  </form>
</div>
<br><br>
<?php include 'footer.php'; ?>
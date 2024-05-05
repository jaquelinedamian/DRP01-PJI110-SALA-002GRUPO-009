<!doctype html>
<html lang="pt-BR" data-bs-theme="auto">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="Alunos Univesp">
<link rel="icon" type="image/png" href="img/favicon.png">
<title>TurmaTec - Página Inicial</title>
<link rel="stylesheet" href="css/css@3">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/customstyle.css" rel="stylesheet">
<link href="css/headers.css" rel="stylesheet">
<link href="css/dashboard.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.13.18/jquery.timepicker.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.13.18/jquery.timepicker.min.js"></script> 
<script src="js/form-selecao.js"></script>
</head>
<body class="pg">
<header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark"> <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="index.php"><img src="img/logobranco.svg" alt="" width="150px"/></a>
  <ul class="navbar-nav flex-row d-md-none">
    <li class="nav-item text-nowrap">
      <button class="nav-link px-3 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSearch" aria-controls="navbarSearch" aria-expanded="false" aria-label="Toggle search"> </button>
    </li>
    <li class="nav-item text-nowrap">
      <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation"> MENU </button>
    </li>
  </ul>
</header>
<div class="container-fluid">
<div class="row">
<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
  <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="sidebarMenuLabel"><img src="img/logo-borda.svg" alt="" width="150px"/></h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
      <ul class="nav flex-column">
        <li class="nav-item"> <a class="nav-link active d-flex align-items-center gap-2" href="pagina-inicial.php"> <img src="img/inicial.png" width="30" height="30" alt="">Pagina inicial </a> </li>
        <li class="nav-item"> <a class="nav-link d-flex align-items-center gap-2" href="grades-horarias.php"> <img src="img/gerar-grade.png" width="30" height="30" alt=""> Grades Horarias </a> </li>
        <li class="nav-item"> <a class="nav-link d-flex align-items-center gap-2" href="professores.php"> <img src="img/icone-professor.png" width="30" height="30" alt="">Professores </a> </li>
        <li class="nav-item"> <a class="nav-link d-flex align-items-center gap-2" href="turmas.php"> <img src="img/icone-turma.png" width="30" height="30" alt="">Turmas </a> </li>

      </ul>

      <ul class="nav flex-column mb-auto">
        <li class="nav-item"> <a class="nav-link d-flex align-items-center gap-2" href="perfil.php"> <img src="img/perfil.png" width="30" height="30" alt="">Perfil </a> </li>
        <li class="nav-item"> <a class="nav-link d-flex align-items-center gap-2" href="#"> Sign out </a> </li>
      </ul>
    </div>
  </div>
</div>
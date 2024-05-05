<?php include 'header.php'; ?>
<!-- inicio pagina -->

<?php include 'conexao.php'; ?>
<?php

// Verifique se o formulário foi enviado
if ( $_SERVER[ "REQUEST_METHOD" ] == "POST" ) {
  // Verifique se todos os campos necessários estão preenchidos
  if ( isset( $_POST[ 'nome_grade' ] ) && isset( $_POST[ 'turmas' ] ) && isset( $_POST[ 'professores' ] ) ) {
    // Capture os dados do formulário
    $nome_grade = $_POST[ 'nome_grade' ];
    $turmas = implode( ',', $_POST[ 'turmas' ] ); // Transforme o array de IDs em uma string
    $professores = implode( ',', $_POST[ 'professores' ] ); // Transforme o array de IDs em uma string

    // Prepare e execute a consulta SQL para inserir os dados na tabela
    $sql = "INSERT INTO `grade_horaria_cadastro` (`nome`, `professores`, `turmas`) VALUES ('$nome_grade', '$professores', '$turmas')";

    if ( $conn->query( $sql ) === TRUE ) {
      echo "As informações foram gravadas com sucesso na tabela.<br>";
    } else {
      echo "Erro ao gravar as informações: " . $conn->error . "<br>";
    }
  } else {
    echo "Por favor, preencha todos os campos obrigatórios.<br>";
  }
}





// Consulta SQL para obter todas as grades cadastradas
$sql_grades = "SELECT * FROM `grade_horaria_cadastro`";
$result_grades = $conn->query( $sql_grades );

// Verifique se há resultados da consulta
if ( $result_grades->num_rows > 0 ) {
  // Exiba os dados das grades
  echo "<div class='col-md-9 ms-sm-auto col-lg-10 px-md-4'>";
  echo "<div>";
  while ( $row_grade = $result_grades->fetch_assoc() ) {
    echo "<p> " . $row_grade[ "nome" ] . " | Professores: " . $row_grade[ "professores" ] . " | Turmas: " . $row_grade[ "turmas" ] . "</p>";
  }
  echo "</div>";
  echo "</div>";
} else {
  echo "Nenhuma grade horária cadastrada.<br>";
}

?>
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<section class="nome">
  <div class="container">
    <h2 class="card-title">Criar Grade Horária</h2>
    <p>Crie sua grade horária aqui</p>
    <form method="post" action="">
      <div class="row">
        <div class="col-12">
          <div class="input-group"> <span class="input-group-text">Nome da Grade</span>
            <input type="text" class="form-control" name="nome_grade">
          </div>
        </div>
      </div>
      <br>
      <section class="turma">
        <div class="container">
          <div class="row">
            <div class="col-6">
              <label>Escolha as turmas</label>
              <br>
              <?php
              // Consulta SQL para obter as turmas cadastradas
              $sql_turmas = "SELECT * FROM turmas";
              $result_turmas = $conn->query( $sql_turmas );

              if ( $result_turmas->num_rows > 0 ) {
                while ( $row_turma = $result_turmas->fetch_assoc() ) {
                  echo "<input type='checkbox' name='turmas[]' value='" . $row_turma[ "id" ] . "'> " . $row_turma[ "nome" ] . "<br>";
                }
              } else {
                echo "Nenhuma turma cadastrada.";
              }
              ?>
            </div>
            <div class="col-6">
              <label>Escolha os professores</label>
              <br>
              <?php
              // Consulta SQL para obter os professores cadastrados
              $sql_professores = "SELECT * FROM Professores";
              $result_professores = $conn->query( $sql_professores );

              if ( $result_professores->num_rows > 0 ) {
                while ( $row_professor = $result_professores->fetch_assoc() ) {
                  echo "<input type='checkbox' name='professores[]' value='" . $row_professor[ "id" ] . "'> " . $row_professor[ "nome" ] . "<br>";
                }
              } else {
                echo "Nenhum professor cadastrado.";
              }
              
              ?>
            </div>
          </div>
        </div>
      </section>
      <br>
      <div class="col-12">
        <input type="submit" class="btn btn-primary" value="Salvar">
      </div>
    </form>
  </div>
</section>
<hr>
<?php include 'footer.php'; ?>

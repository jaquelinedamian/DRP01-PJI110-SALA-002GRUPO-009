<?php include 'header.php'; ?>
<!-- inicio pagina -->

<!-- Inclui o arquivo de conexão com o banco de dados-->
<?php include 'conexao.php'; ?>
<?php
// Consulta SQL para obter as turmas cadastradas
$sql = "SELECT * FROM `turmas`";
$result = $conn->query( $sql );

// Consulta SQL para obter os professores cadastrados
$sql_grade = "SELECT * FROM `turmas`";
$result_grade = $conn->query( $sql_grade );


// Verifica se o formulário foi enviado
if ( $_SERVER[ "REQUEST_METHOD" ] == "POST" ) {
  // Prepara os dados para inserção
  $nome_grade = $_POST[ "nome_grade" ];
  $professores_selecionados = $_POST[ "professores" ];

  // Insere os dados na tabela de turmas
  $sql_insert_turma = "INSERT INTO turmas (nome) VALUES ('$nome_grade')";
  if ( $conn->query( $sql_insert_turma ) === TRUE ) {
    $turma_id = $conn->insert_id; // Obtém o ID da turma inserida

    // Insere a associação entre a turma e os professores selecionados
    foreach ( $professores_selecionados as $professor_id ) {
      $sql_insert_relacionamento = "INSERT INTO turma_professor (id_grade, id_professor) VALUES ('$turma_id', '$professor_id')";
      $conn->query( $sql_insert_relacionamento );
    }

    // Feedback ao usuário
    echo "Turma cadastrada com sucesso!";
    echo "<meta http-equiv='refresh' content='0'>"; // Atualiza a página para exibir a nova turma
  } else {
    echo "Erro ao cadastrar turma: " . $conn->error;
  }
}





?>


<br>
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="pgprofessor">
    <div class="container"><br>
      <h2>Turmas Cadastradas</h2>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Nome da Turma</th>
            <th>Data de Criação</th>
            <th>Professores</th>
            <th>Opções</th>
              
          </tr>
        </thead>
        <tbody>
          <?php
          if ( $result->num_rows > 0 ) {
            while ( $row = $result->fetch_assoc() ) {
              echo "<tr>";
              echo "<td>" . $row[ "id" ] . "</td>";
              echo "<td>" . $row[ "nome" ] . "</td>";
              echo "<td>" . $row[ "data" ] . "</td>"; // Certifique-se de ajustar o nome da coluna conforme necessário

                echo "<td>" . $row_professor_turma["id"] . "</td>";

        
        
              include 'opcoes.php';

              echo "</tr>";
            }
          } else {
            echo "<tr><td colspan='3'>Nenhuma turma cadastrada</td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
    <br>
    <div class="container">
      <h2>Cadastrar Nova Turma</h2>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <label for="nome_grade">Nome da Turma:</label>
      <br>
      <input type="text" id="nome_grade" name="nome_grade">
      <br>
      <br>
      <input class="btn btn-primary" type="submit" value="Cadastrar">
      <hr>
      </form>


    </div>
  </div>
  <br>
  <br>
  <h2>Depois de cadastrar a a turma você deve associar a turma aos professor</h2>
  
  <a href="gravar_professor_turma.php" class="btn btn-primary">Associar professores a turma</a>
  <br><br><br>
  
</div>


<?php
// Consulta SQL para obter os dados da tabela Professor_Turma
$sql_professor_turma = "SELECT * FROM Professor_Turma";
$result_professor_turma = $conn->query($sql_professor_turma);

// Verifica se há resultados na tabela Professor_Turma
if ($result_professor_turma->num_rows > 0) {
    // Itera sobre cada linha de resultado
    while ($row_professor_turma = $result_professor_turma->fetch_assoc()) {
        echo "<tr>";

        echo "<td>" . $row_professor_turma["id_grade"] . "</td>"; // Coluna de ID da turma na tabela Professor_Turma
        
        echo "<td>" . $row_professor_turma["nome_grade"] . "</td>"; // Coluna de ID da turma na tabela Professor_Turma

        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='3'>Nenhum registro encontrado na tabela Professor_Turma</td></tr>";
}
?>









<!-- fim form -->
<?php include 'footer.php'; ?>

<?php include 'header.php'; ?>
<?php
// Incluir o arquivo de conexão com o banco de dados
include 'conexao.php';

// Verificar se o formulário foi enviado
if ( $_SERVER[ "REQUEST_METHOD" ] == "POST" ) {
  // Capturar os valores dos campos do formulário
  $professores_selecionados = isset( $_POST[ 'professores' ] ) ? $_POST[ 'professores' ] : array();
  $id_turma = $_POST[ 'id_turma' ];

  // Verificar se pelo menos um professor foi selecionado
  if ( empty( $professores_selecionados ) ) {
    echo "Nenhum professor selecionado.";
  } else {
    // Preparar a declaração SQL para inserção
    $sql_insert_relacao = "INSERT INTO Professor_Turma (id_turma, id_professor, nome_professor, nome_turma) VALUES (?, ?, ?, ?)";
    // Preparar a declaração para execução
    $stmt = $conn->prepare( $sql_insert_relacao );

    // Verificar se a preparação da declaração foi bem-sucedida
    if ( $stmt ) {
      // Iterar sobre os professores selecionados e inserir os relacionamentos na tabela
      foreach ( $professores_selecionados as $id_professor ) {
        // Consultar o nome do professor
        $sql_nome_professor = "SELECT nome FROM Professores WHERE id = ?";
        $stmt_nome_professor = $conn->prepare( $sql_nome_professor );
        $stmt_nome_professor->bind_param( "i", $id_professor );
        $stmt_nome_professor->execute();
        $stmt_nome_professor->bind_result( $nome_professor );
        $stmt_nome_professor->fetch();
        $stmt_nome_professor->close();

        // Consultar o nome da turma
        $sql_nome_turma = "SELECT nome FROM turmas WHERE id = ?";
        $stmt_nome_turma = $conn->prepare( $sql_nome_turma );
        $stmt_nome_turma->bind_param( "i", $id_turma );
        $stmt_nome_turma->execute();
        $stmt_nome_turma->bind_result( $nome_turma );
        $stmt_nome_turma->fetch();
        $stmt_nome_turma->close();

        // Inserir os dados na tabela Professor_Turma
        $stmt->bind_param( "iiss", $id_turma, $id_professor, $nome_professor, $nome_turma );
        if ( !$stmt->execute() ) {
          echo "Erro ao inserir relacionamento: " . $stmt->error;
          break; // Se ocorrer um erro, interrompe o loop
        }
      }

      // Feedback ao usuário
      echo "Relacionamentos entre turmas e professores gravados com sucesso!";

      // Fechar a declaração
      $stmt->close();
    } else {
      echo "Erro ao preparar declaração SQL: " . $conn->error;
    }
  }
}
?>
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <?php
  // Consulta SQL para obter as informações da tabela Professor_Turma
  $sql_professor_turma = "SELECT id, id_professor, id_turma, nome_professor, nome_turma FROM Professor_Turma";
  $result_professor_turma = $conn->query( $sql_professor_turma );
  ?>
  <br>
  <br>
  <h2>Relação entre professores e turmas</h2>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>ID do Professor</th>
        <th>ID da Turma</th>
        <th>Nome do Professor</th>
        <th>Nome da Turma</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if ( $result_professor_turma->num_rows > 0 ) {
        while ( $row_professor_turma = $result_professor_turma->fetch_assoc() ) {
          echo "<tr>";
          echo "<td>" . $row_professor_turma[ "id" ] . "</td>";
          echo "<td>" . $row_professor_turma[ "id_professor" ] . "</td>";
          echo "<td>" . $row_professor_turma[ "id_turma" ] . "</td>";
          echo "<td>" . $row_professor_turma[ "nome_professor" ] . "</td>";
          echo "<td>" . $row_professor_turma[ "nome_turma" ] . "</td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='5'>Nenhum resultado encontrado.</td></tr>";
      }
      ?>
    </tbody>
  </table>
  <br>
  <br>
  <h2>Associe os professores às turmas</h2>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="professores">Selecionar Professores:</label>
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
    <br>
    <label for="turma">Selecionar Turma:</label>
    <br>
    <select id="turma" name="id_turma">
      <?php
      // Consulta SQL para obter as turmas cadastradas
      $sql_turmas = "SELECT * FROM turmas";
      $result_turmas = $conn->query( $sql_turmas );

      if ( $result_turmas->num_rows > 0 ) {
        while ( $row_turma = $result_turmas->fetch_assoc() ) {
          echo "<option value='" . $row_turma[ "id" ] . "'>" . $row_turma[ "nome" ] . "</option>";
        }
      } else {
        echo "<option value=''>Nenhuma turma cadastrada</option>";
      }
      ?>
    </select>
    <br>
    <br>
    <input type="submit" value="Cadastrar">
  </form>
  <br>
  <br>
  <br>
</div>
<?php include 'footer.php'; ?>

<?php
// Inclui o arquivo de conexão com o banco de dados
include 'conexao.php';

// Consulta SQL para obter as turmas cadastradas
$sql = "SELECT * FROM turmas";
$result = $conn->query($sql);

// Consulta SQL para obter os professores cadastrados
$sql_professores = "SELECT * FROM Professores";
$result_professores = $conn->query($sql_professores);

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepara os dados para inserção
    $nome_turma = $_POST["nome_turma"];
    $professores_selecionados = $_POST["professores"];

    // Insere os dados na tabela de turmas
    $sql_insert_turma = "INSERT INTO turmas (nome) VALUES ('$nome_turma')";
    if ($conn->query($sql_insert_turma) === TRUE) {
        $turma_id = $conn->insert_id; // Obtém o ID da turma inserida

        // Insere a associação entre a turma e os professores selecionados
        foreach ($professores_selecionados as $professor_id) {
            $sql_insert_relacionamento = "INSERT INTO turma_professor (id_turma, id_professor) VALUES ('$turma_id', '$professor_id')";
            $conn->query($sql_insert_relacionamento);
        }

        // Feedback ao usuário
        echo "Turma cadastrada com sucesso!";
        echo "<meta http-equiv='refresh' content='0'>"; // Atualiza a página para exibir a nova turma
    } else {
        echo "Erro ao cadastrar turma: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Turmas Cadastradas</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Turmas Cadastradas</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome da Turma</th>
                <th>Data de Criação</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["nome"] . "</td>";
                    echo "<td>" . $row["data_criacao"] . "</td>"; // Certifique-se de ajustar o nome da coluna conforme necessário
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>Nenhuma turma cadastrada</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <h2>Cadastrar Nova Turma</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nome_turma">Nome da Turma:</label><br>
        <input type="text" id="nome_turma" name="nome_turma"><br><br>

        <label for="professores">Selecionar Professores:</label><br>
        <select id="professores" name="professores[]" multiple>
            <?php
            if ($result_professores->num_rows > 0) {
                while($row_professor = $result_professores->fetch_assoc()) {
                    echo "<option value='" . $row_professor["id"] . "'>" . $row_professor["nome"] . "</option>";
                }
            } else {
                echo "<option value=''>Nenhum professor cadastrado</option>";
            }
            ?>
        </select><br><br>

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>

<?php
// Fecha a conexão
$conn->close();
?>

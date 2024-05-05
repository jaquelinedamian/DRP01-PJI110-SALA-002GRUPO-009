<?php
// Inclui o arquivo de conexão com o banco de dados
include 'conexao.php';

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados do formulário
    $nome = $_POST['nome'];
    $hpi = $_POST['hpi'];
    $hpc = $_POST['hpc'];
    $hpl = $_POST['hpl'];
    $hora_semana = $_POST['hora_semana'];

    // Prepara a query SQL para inserir os dados na tabela Professores
    $sql = "INSERT INTO Professores (nome, hpi, hpc, hpl, hora_semana) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Verifica se a preparação da declaração foi bem-sucedida
    if ($stmt) {
        // Associa os parâmetros e executa a inserção
        $stmt->bind_param("sssss", $nome, $hpi, $hpc, $hpl, $hora_semana);
        if ($stmt->execute()) {
            echo "Professor cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar o professor: " . $conn->error;
        }
        // Fecha a declaração preparada
        $stmt->close();
    } else {
        echo "Erro ao preparar a declaração SQL: " . $conn->error;
    }
} else {
    echo "O formulário não foi submetido.";
}

// Fecha a conexão com o banco de dados
$conn->close();
?>

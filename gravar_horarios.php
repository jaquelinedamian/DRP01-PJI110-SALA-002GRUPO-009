<?php
// Inclui o arquivo de conexão com o banco de dados
include 'conexao.php';

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se os horários foram selecionados
    if (isset($_POST['horarios'])) {
        // Verifica se os professores foram selecionados
        if (isset($_POST['professores'])) {
            // Loop pelos professores selecionados
            foreach ($_POST['professores'] as $id_professor) {
                // Prepara e executa a inserção dos horários associados ao professor
                $sql = "INSERT INTO horarios_aulas (dia_semana, horario, disponivel, id_professor) VALUES (?, ?, 1, ?)";
                $stmt = $conn->prepare($sql);

                // Verifica se a preparação da declaração foi bem-sucedida
                if ($stmt) {
                    // Faz um loop pelos horários selecionados e executa a inserção
                    foreach ($_POST['horarios'] as $horario) {
                        $dia_semana = explode("-", $horario)[0];
                        $horario_aula = explode("-", $horario)[1];
                        $stmt->bind_param("ssi", $dia_semana, $horario_aula, $id_professor);
                        $stmt->execute();
                    }
                } else {
                    echo "Erro ao preparar a declaração SQL: " . $conn->error;
                }
            }
            echo "Horários gravados com sucesso!";
        } else {
            echo "Nenhum professor selecionado.";
        }
    } else {
        echo "Nenhum horário selecionado.";
    }
} else {
    echo "O formulário não foi submetido.";
}

// Fecha a conexão com o banco de dados
$conn->close();
?>


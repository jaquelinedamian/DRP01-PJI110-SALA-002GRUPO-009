<?php
// Inclui o arquivo de conexão com o banco de dados
include 'conexao.php';

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se os dados do professor foram recebidos
    if (isset($_POST['nome_professor']) && isset($_POST['total_horas_semana']) && isset($_POST['horarios'])) {
        $nome_professor = $_POST['nome_professor'];
        $total_horas_semana = $_POST['total_horas_semana'];

        // Insere o professor na tabela Professores
        $sql_insert_professor = "INSERT INTO Professores (nome, total_horas_semana) VALUES (?, ?)";
        $stmt_insert_professor = $conn->prepare($sql_insert_professor);
        $stmt_insert_professor->bind_param("si", $nome_professor, $total_horas_semana);
        $stmt_insert_professor->execute();
        $id_professor = $stmt_insert_professor->insert_id;

        // Insere os horários na tabela horarios_aulas associados ao professor
        $sql_insert_horarios = "INSERT INTO horarios_aulas (dia_semana, horario, disponivel, id_professor) VALUES (?, ?, 1, ?)";
        $stmt_insert_horarios = $conn->prepare($sql_insert_horarios);

        // Verifica se a preparação da declaração foi bem-sucedida
        if ($stmt_insert_horarios) {
            // Faz um loop pelos horários selecionados e executa a inserção
            foreach ($_POST['horarios'] as $horario) {
                $dia_semana = explode("-", $horario)[0];
                $horario_aula = explode("-", $horario)[1];
                $stmt_insert_horarios->bind_param("ssi", $dia_semana, $horario_aula, $id_professor);
                $stmt_insert_horarios->execute();
            }
            echo "Professor cadastrado com sucesso e horários associados!";
        } else {
            echo "Erro ao preparar a declaração SQL para inserir horários: " . $conn->error;
        }

        // Fecha a declaração preparada
        $stmt_insert_horarios->close();
    } else {
        echo "Dados do professor ou horários não recebidos.";
    }
} else {
    echo "O formulário não foi submetido.";
}

// Fecha a conexão com o banco de dados
$conn->close();
?>

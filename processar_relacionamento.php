
<?php
include 'conexao.php';

// Receber os dados do formulário
$professor_id = $_POST['professor'];
$turma_id = $_POST['turma'];

// Consultar o banco de dados para obter os detalhes do professor selecionado
$query_professor = "SELECT * FROM Professores WHERE id = $professor_id";
$resultado_professor = $conexao->query($query_professor);
$professor = $resultado_professor->fetch_assoc();

// Consultar o banco de dados para obter os detalhes da turma selecionada
$query_turma = "SELECT * FROM turmas WHERE id = '$turma_id'";
$resultado_turma = $conexao->query($query_turma);
$turma = $resultado_turma->fetch_assoc();

// Exibir os detalhes do professor e da turma
echo "<h2>Detalhes do Relacionamento</h2>";
echo "<p><strong>Professor:</strong> " . $professor['nome'] . "</p>";
echo "<p><strong>Turma:</strong> " . $turma['nome'] . "</p>";

// Fechar a conexão com o banco de dados
$conexao->close();
?>

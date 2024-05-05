
<?php include 'conexao.php'; ?>
<?php


// Function to get schedule data
function getScheduleData($conn) {
    $sql = "SELECT * FROM Professor_Turma";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    $schedule = array(
        '8:00 - 9:00' => array('segunda' => '', 'terca' => '', 'quarta' => '', 'quinta' => '', 'sexta' => ''),
        '9:00 - 10:00' => array('segunda' => '', 'terca' => '', 'quarta' => '', 'quinta' => '', 'sexta' => ''),
        '10:00 - 11:00' => array('segunda' => '', 'terca' => '', 'quarta' => '', 'quinta' => '', 'sexta' => ''),
        '11:00 - 12:00' => array('segunda' => '', 'terca' => '', 'quarta' => '', 'quinta' => '', 'sexta' => ''),
        '13:00 - 14:00' => array('segunda' => '', 'terca' => '', 'quarta' => '', 'quinta' => '', 'sexta' => ''),
        '14:00 - 15:00' => array('segunda' => '', 'terca' => '', 'quarta' => '', 'quinta' => '', 'sexta' => '')
    );

    while ($row = $result->fetch_assoc()) {
        $hora = $row['hora'];
        $dia = $row['dia'];
        $id_professor_turma = $row['id_professor_turma'];
        $nome_professor = $row['nome_professor'];
        $nome_turma = $row['nome_turma'];

        if (isset($schedule[$hora][$dia])) {
            if (empty($schedule[$hora][$dia])) {
                $schedule[$hora][$dia] = "ID: $id_professor_turma<br>Professor: $nome_professor<br>Turma: $nome_turma";
            } else {
                $schedule[$hora][$dia].= "<br><br>ID: $id_professor_turma<br>Professor: $nome_professor<br>Turma: $nome_turma";
            }
        }
    }

    return $schedule;
}

// Function to display schedule
function displaySchedule($schedule) {
    echo '<table border="1">';
    echo '<tr>';
    echo '<th>Hora</th>';
    echo '<th>Segunda-feira</th>';
    echo '<th>Terça-feira</th>';
    echo '<th>Quarta-feira</th>';
    echo '<th>Quinta-feira</th>';
    echo '<th>Sexta-feira</th>';
    echo '</tr>';

    foreach ($schedule as $hora => $dias) {
        echo '<tr>';
        echo "<td>$hora</td>";
        foreach ($dias as $dia => $info) {
            echo "<td>$info</td>";
        }
        echo '</tr>';
    }

    echo '</table>';
}

// Get schedule data
$schedule = getScheduleData($conn);

// Display schedule
if (!empty($schedule)) {
    displaySchedule($schedule);
} else {
    echo "Nenhum registro encontrado na tabela Professor_Turma";
}

// Close database connection
$conn->close();

?>
<?php
// Configurações do banco de dados
$servername = "localhost";
$username = "jaqueli1_p1teste";
$password = "jaq44Xvta!";
$database = "jaqueli1_bancop1teste";

// Cria conexão
$conn = new mysqli($servername, $username, $password, $database);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>

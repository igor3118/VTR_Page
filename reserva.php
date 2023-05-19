<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "seu_banco_de_dados";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Processar o formulário de reserva
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $carro = $_POST["carro"];
    $nome = $_POST["nome"];
    $data = $_POST["data"];

    // Inserir a reserva no banco de dados
    $sql = "INSERT INTO reservas (carro, nome, data) VALUES ('$carro', '$nome', '$data')";
    if ($conn->query($sql) === TRUE) {
        echo "Reserva efetuada com sucesso!";
    } else {
        echo "Erro ao efetuar reserva: " . $conn->error;
    }
}

$conn->close();
?>
<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "dev";
$password = "dev";
$dbname = "teste";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    var_dump('ConnectionError : ' . $conn->connect_error);
}


// Processar o formulário de reserva
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $car = $_POST["car"];
    $quantidade = $_POST["quantidade"];
    $name = $_POST["name"];
    $reservation_date = $_POST["reservation_date"];
    $time = $_POST["time"];
    $chefe = $_POST["chefe"];
    

    // Inserir a reserva no banco de dados
    $sql = "INSERT INTO reservations (car, quantidade, name, reservation_date, time, chefe) VALUES ('$car','$quantidade', '$name', '$reservation_date', '$time', '$chefe')";
    if ($conn->query($sql) === TRUE) {
        echo "Reserva efetuada com sucesso!";
    } else {
        echo "Erro ao efetuar reserva: " . $conn->error;
    }
}

$conn->close();
?>
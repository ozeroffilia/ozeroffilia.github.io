<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Allow: POST');
    http_response_code(405);
    exit('Method Not Allowed');
}

// Подключение к базе данных
$host = '127.0.0.1';
$dbname = 'service-center';
$user = 'postgres';
$password = 'cosmos';

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}

// Получение данных из формы
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$phone_number = $_POST['phone_number'];
$email = $_POST['email'];
$device_type = $_POST['device_type'];
$problem_description = $_POST['problem_description'];

// Подготовка SQL-запроса
$sql = "INSERT INTO user_data (first_name, last_name, phone_number, email, device_type, problem_description) VALUES (:first_name, :last_name, :phone_number, :email, :device_type, :problem_description)";

// Подготовка и выполнение запроса с использованием подготовленных выражений
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':first_name', $first_name);
$stmt->bindParam(':last_name', $last_name);
$stmt->bindParam(':phone_number', $phone_number);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':device_type', $device_type);
$stmt->bindParam(':problem_description', $problem_description);

// Выполнение запроса
if ($stmt->execute()) {
    echo "success"; // Возвращаем успешный статус
    header("Location: index.html");
    exit();
} else {
    echo "Ошибка при добавлении данных в базу данных."; // Возвращаем статус ошибки
}

// Закрытие соединения
$pdo = null;
?>

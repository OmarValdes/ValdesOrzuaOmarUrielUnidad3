<?php
session_start();

require 'conexion.php'; // Asegúrate de que este archivo contiene la conexión PDO

if (isset($_SESSION['email'])) {
    try {
        $query = $cnnPDO->prepare('UPDATE usuarios SET session_token = NULL WHERE email = :email');
        $query->bindParam(':email', $_SESSION['email']);
        $query->execute();
    } catch (PDOException $e) {
        $error = "Error de base de datos: " . $e->getMessage();
        // Manejar el error apropiadamente
    }
}

session_unset();
session_destroy();
header('Location: index.html');
?>

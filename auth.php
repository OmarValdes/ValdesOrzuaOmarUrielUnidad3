<?php
// Verifica si la sesión aún no ha sido iniciada. Si no, la inicia.
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Función para verificar si el usuario está autenticado
function isAuthenticated() {
    // Devuelve true si existe una sesión con 'email', lo que indica que el usuario está autenticado.
    return isset($_SESSION['email']);
}

// Función para verificar si el usuario tiene un rol específico
function hasRole($role) {
    // Devuelve true si el rol del usuario en la sesión coincide con el rol proporcionado.
    return isset($_SESSION['role']) && $_SESSION['role'] === $role;
}

// Función para proteger una ruta específica en función del rol del usuario
function protectRoute($role) {
    // Si el usuario no está autenticado o no tiene el rol adecuado, lo redirige a la página de inicio de sesión.
    if (!isAuthenticated() || !hasRole($role)) {
        header("Location: login.php");  // Redirige a 'login.php' si el usuario no está autenticado o no tiene el rol adecuado.
        exit();  // Termina el script después de la redirección
    }
}
?>

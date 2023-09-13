<?php
session_start();

if (isset($_SESSION['user']['m_role']) && $_SESSION['user']['m_role'] == 3) {
    if (isset($_GET['login_as'])) {
        $_SESSION['login_as'] = $_GET['login_as'];
        
        // Use a ternary operator to set the path based on the 'login_as' value
        $path = ($_GET['login_as'] == 'admin') ? '../pages/admin.php' : '../pages/home.php';

        header("Location: $path"); // Redirect to the desired page
        exit;
    } else {
        // Handle the case where 'login_as' is not set in the URL
        // Display an error message or redirect to an error page
    }
} else {
    // Handle the case where the user does not have the 'super' role
    // Display an error message or redirect to an error page
}
?>
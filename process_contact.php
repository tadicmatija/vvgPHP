<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $lastname = trim($_POST['lastname']);
    $email = trim($_POST['email']);
    $country = trim($_POST['country']);
    $newsletter = isset($_POST['newsletter']) ? 1 : 0;
    $message = trim($_POST['message']);

    try {
        $stmt = $pdo->prepare("INSERT INTO contact_messages (name, lastname, email, country, newsletter, message) 
                              VALUES (?, ?, ?, ?, ?, ?)");
        
        $stmt->execute([
            $name,
            $lastname,
            $email,
            $country,
            $newsletter,
            $message
        ]);

        header('Location: contact.php?status=success');
        exit();

    } catch (PDOException $e) {
        error_log("Error saving contact message: " . $e->getMessage());
        
        header('Location: contact.php?status=error');
        exit();
    }
} else {
    header('Location: contact.php');
    exit();
}
?>
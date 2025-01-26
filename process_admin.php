<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    switch ($action) {
        case 'add':
            try {
                $stmt = $pdo->prepare("INSERT INTO users (firstname, lastname) VALUES (?, ?)");
                $stmt->execute([
                    $_POST['firstname'],    
                    $_POST['lastname'] 
                ]);
                header('Location: admin.php?success=added');
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage(); // For testing - remove in production
                // header('Location: admin.php?error=add_failed');
            }
            break;

        case 'edit':
            try {
                $stmt = $pdo->prepare("UPDATE users SET firstname = ?, lastname = ? WHERE id = ?");
                $stmt->execute([
                    $_POST['firstname'],
                    $_POST['lastname'],
                    $_POST['id']
                ]);
                header('Location: admin.php');
            } catch (PDOException $e) {
                header('Location: admin.php?error=update_failed');
            }
            break;

        case 'delete':
            try {
                $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
                $stmt->execute([$_POST['id']]);
                header('Location: admin.php');
            } catch (PDOException $e) {
                header('Location: admin.php?error=delete_failed');
            }
            break;
    }
}
?>
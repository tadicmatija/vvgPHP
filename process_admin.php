<?php
session_start();

if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    switch ($action) {
        case 'add':
            $id = time();
            $_SESSION['users'][$id] = [
                'name' => $_POST['name'],
                'lastname' => $_POST['lastname']
            ];
            break;

        case 'edit':
            $id = $_POST['id'];
            if (isset($_SESSION['users'][$id])) {
                $_SESSION['users'][$id] = [
                    'name' => $_POST['name'],
                    'lastname' => $_POST['lastname']
                ];
            }
            break;

        case 'delete':
            $id = $_POST['id'];
            if (isset($_SESSION['users'][$id])) {
                unset($_SESSION['users'][$id]);
            }
            break;
    }
}

header('Location: admin.php');
exit();
?>
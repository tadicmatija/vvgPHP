<?php
session_start();

// Initialize users array in session if it doesn't exist
if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <!-- Your existing navbar here -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">PHP projekt</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'news.php' ? 'active' : ''; ?>" href="news.php">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'active' : ''; ?>" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'about.php' ? 'active' : ''; ?>" href="about.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'admin.php' ? 'active' : ''; ?>" href="admin.php">Administration</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <?php if(!isset($_SESSION['user_id'])): ?>
                        <li class="nav-item">
                            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'register.php' ? 'active' : ''; ?>" href="register.php">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'login.php' ? 'active' : ''; ?>" href="login.php">Login</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container my-4">
        <h1 class="mb-4">Administration</h1>

        <!-- Add User Form -->
        <div class="card mb-4">
            <div class="card-header">
                <h2 class="h5 mb-0">Add New User</h2>
            </div>
            <div class="card-body">
                <form action="process_admin.php" method="POST">
                    <input type="hidden" name="action" value="add">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="mb-3">
                                <label for="lastname" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" required>
                            </div>
                        </div>
                        <div class="col-md-2 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary mb-3">Add User</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Users Display -->
        <div class="row">
            <?php if (!empty($_SESSION['users'])): ?>
                <?php foreach ($_SESSION['users'] as $id => $user): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title h5"><?php echo htmlspecialchars($user['name'] . ' ' . $user['lastname']); ?></h3>
                                <div class="mt-3">
                                    <button class="btn btn-sm btn-warning me-2" onclick="editUser(<?php echo $id; ?>)">Edit</button>
                                    <form action="process_admin.php" method="POST" class="d-inline">
                                        <input type="hidden" name="action" value="delete">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <p class="text-muted">No users added yet.</p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Edit Modal -->
        <div class="modal fade" id="editModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form action="process_admin.php" method="POST">
                            <input type="hidden" name="action" value="edit">
                            <input type="hidden" name="id" id="edit_id">
                            <div class="mb-3">
                                <label for="edit_name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="edit_name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit_lastname" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="edit_lastname" name="lastname" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; <?php echo date('Y'); ?> Matija Tadić - Veleučilište Velika Gorica</p>
                </div>
                <div class="col-md-6 text-end">
                    <a href="https://github.com/tadicmatija/vvgphp" target="_blank" class="text-white">
                        <i class="fab fa-github fa-2x"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    function editUser(id) {
        const users = <?php echo json_encode($_SESSION['users'] ?? []); ?>;
        const user = users[id];
        
        document.getElementById('edit_id').value = id;
        document.getElementById('edit_name').value = user.name;
        document.getElementById('edit_lastname').value = user.lastname;
        
        new bootstrap.Modal(document.getElementById('editModal')).show();
    }
    </script>
</body>
</html>
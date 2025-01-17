<?php
session_start();
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
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
        <h1 class="mb-4">About Our Company</h1>
        <h2 class="mb-4">Leading Innovation in Technology</h2>

        <div class="row mb-5">
    <div class="col-md-6 mx-auto"> 
            <div class="ratio ratio-16x9" style="max-width: 500px; margin: 0 auto;"> 
                <iframe 
                    src="https://www.youtube.com/embed/JhHMJCUmq28?si=2USEwXVXeCjdIspR" 
                    title="About Our Company" 
                    allowfullscreen
                    style="max-width: 100%; max-height: 300px;">
                </iframe>
            </div>
        </div>
    </div>

        <div class="row">
            <div class="col-md-4 mb-4">
                <article>
                    <h3>Our History</h3>
                    <p>Founded in 2010, our company has grown from a small startup to a leading provider of innovative solutions. 
                    Through dedication and hard work, we've established ourselves as pioneers in the technology sector, 
                    consistently delivering cutting-edge solutions to our clients worldwide.</p>
                </article>
            </div>

            <div class="col-md-4 mb-4">
                <article>
                    <h3>Our Mission</h3>
                    <p>We are committed to pushing the boundaries of what's possible in technology. Our mission is to create 
                    innovative solutions that empower businesses and individuals to achieve their goals. We believe in 
                    sustainable development and responsible innovation that benefits society as a whole.</p>
                </article>
            </div>

            <div class="col-md-4 mb-4">
                <article>
                    <h3>Our Values</h3>
                    <p>Innovation, integrity, and excellence form the cornerstone of our company culture. We believe in 
                    fostering a collaborative environment where creativity thrives and where our team members can grow 
                    both personally and professionally. Our commitment to these values guides every decision we make.</p>
                </article>
            </div>
        </div>
    </main>

    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; <?php echo date('Y'); ?>  Matija Tadić - Veleučilište Velika Gorica</p>
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
</body>
</html>
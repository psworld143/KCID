<?php
session_start();
require_once 'connection/db_connection.php';

$sample_users = [
    'admin' => [
        'password' => 'admin123',
        'role' => 'admin',
        'redirect' => 'admin/admin.php'
    ],
    'principal' => [
        'password' => 'principal123',
        'role' => 'principal',
        'redirect' => 'users/principal/dashboard.php'
    ],
    'psds' => [
        'password' => 'psds123',
        'role' => 'psds',
        'redirect' => 'users/psds/dashboard.php'
    ],
    'sgod' => [
        'password' => 'sgod123',
        'role' => 'sgod',
        'redirect' => 'users/sgod/sgod_consolidated_reports.php'
    ],
    'cid' => [
        'password' => 'cid123',
        'role' => 'cid',
        'redirect' => 'users/cid/cid_consolidated_reports.php'
    ],
    'sds' => [
        'password' => 'sds123',
        'role' =>'sds',
        'redirect' => 'users/sds/sds_consolidated_reports.php'
    ]


];

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (isset($sample_users[$username]) && $sample_users[$username]['password'] === $password) {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $sample_users[$username]['role'];
        header('Location: ' . $sample_users[$username]['redirect']);
        exit();
    } else {
        $error = 'Invalid username or password';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - School Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h1>Welcome Back</h1>
            <p>Please login to your account</p>
        </div>
        <?php if ($error): ?>
            <div class="error-message"><?php echo $error; ?></div>
        <?php endif; ?>
        <form method="POST" action="">
            <div class="form-group">
                <label for="username">Username</label>
                <i class="fas fa-user"></i>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <i class="fas fa-lock"></i>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
                <i class="fas fa-eye toggle-password" onclick="togglePassword()"></i>
            </div>
            <button type="submit" class="login-btn">Login</button>
        </form>
       
    </div>
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.querySelector('.toggle-password');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html> 
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    $title = "Login";
    require '../global/header.php';
    ?>
    <link rel="stylesheet" href="../css/login_style.css">

</head>
<body>

<div class="container d-flex justify-content-center align-items-center">
    <div class="login-container row g-0">
        <!-- Left: Welcome Section -->
        <div class="col-md-6 welcome-section">
            <h2>Welcome to KOHICRI System</h2>
            <p>Your centralized system for managing cooperative members, transactions, and records efficiently.
                Please log in with your credentials to continue.</p>
        </div>

        <!-- Right: Login Form -->
        <div class="col-md-6 login-section">
            <h4 class="login-title">Login</h4>
            <form action="../controller/login_exec.php" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>

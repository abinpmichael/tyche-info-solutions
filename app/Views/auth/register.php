<!-- app/Views/auth/register.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>

    <?php if (session()->getFlashdata('error')): ?>
        <p style="color:red;"><?php echo session()->getFlashdata('error'); ?></p>
    <?php endif; ?>

    <form action="auth/register" method="post">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="password" name="confirm_password" placeholder="Confirm Password" required><br>
        <button type="submit">Register</button>
    </form>

    <p>Already have an account? <a href="<?= base_url('login') ?>">Login</a></p>
</body>
</html>

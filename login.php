<body>
    <h1>Create Account</h1>
    <a href="/converter.php">Continue without account</a></p>
    <form action="Includes/Login_handler.php" method="post">
        <input type="text" name="email" id="login_textField" placeholder="Enter email here!" required>
        <input type="password" name="password" id="login_textField" placeholder="Enter password here!" required>
        <input type="submit" name="account_type" value="Login">
    </form>
    <p>Already have an account? <a href="/login.php">Log in Here!</a></p>
</body>

</html>
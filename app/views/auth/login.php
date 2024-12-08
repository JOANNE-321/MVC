<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" 
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style>
        body {
            background: lightgreen;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .form-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        .form-header {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.5rem;
            color: black;
        }
        .btn-primary {
            background-color: green;
            border: none;
        }
        .btn-primary:hover {
            background-color: darkgreen;
        }
        .form-footer {
            text-align: center;
            margin-top: 15px;
            font-size: 0.9rem;
        }
        .login-link {
            color: green;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="form-header">
            <h3>Login</h3>
        </div>
        <?php if (isset($error)): ?>
            <p class="text-danger text-center"><?= htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <form action="/login" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Enter your username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
        <div class="form-footer">
            Don't have an account? <a href="/register" class="register-link">Register</a>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-gtEjrD/SeCtmOS2XbW5tkeCkMuW035F8g05p3zU7H60p6DOnoJ7fnS+Z+OAGxN0x" crossorigin="anonymous"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style>
        .form-container {
            width: 40%;
            margin: 50px auto;
            background-color: lightgreen;
            padding: 40px;
            border-radius: 20px;
        }

        h1 {
            color: black;
            font-size: 36px;
            font-weight: bold;
            margin-top: 20px;
            margin-bottom: 30px;
            text-align: center;
        }

        .form-control, .btn {
            width: 100%;
        }

        .btn-update {
            background-color: #006400; /* Dark green */
            border-color: #006400;
            color: white;
        }

        .btn-update:hover {
            background-color: #228B22; /* Forest green */
            border-color: #228B22;
        }
    </style>
</head>
<body class="bg-light">

    <h1>Edit User Information</h1>

    <div class="form-container">
        <?php if (!isset($user) || !is_array($user)): ?>
            <div class="alert alert-danger">User data not found or invalid. Please try again later.</div>
        <?php else: ?>
            <form action="/update/<?= htmlspecialchars($user['id']); ?>" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" value="<?= htmlspecialchars($user['name']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?= htmlspecialchars($user['email']); ?>" required>
                </div>

                <button type="submit" class="btn btn-update">Update User</button>
            </form>
        <?php endif; ?>
    </div>

</body>
</html>

</html>


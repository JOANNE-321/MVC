<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information Registration Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    
    <style>
        .form-container {
            width: 40%;
            margin: 50px auto 0 auto; 
            background-color: lightblue;
            padding: 40px;
            border-radius: 20px;   
        }

        h1 {
            color: black;
            font-size: 36px;
            font-weight: bold;
            margin-top: 20px; 
            margin-bottom: 30px; 
        }

        .form-control, .btn {
            width: 100%;
        }
    </style>
</head>
<body class="bg-light">

    <h1 class="text-center mb-4">New User Registration Form</h1>

    <div class="form-container">
        <form action="/store" method="POST">

            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Add User</button>
        </form>
    </div>
    
</body>
</html>

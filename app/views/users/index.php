<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style>
        body {
            background-color: #f4f7fc;
            font-family: Arial, Helvetica, sans-serif;
            margin-top: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            width: 80%;
            max-width: 900px;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 32px;
            font-weight: 600;
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }

        .logout-button {
            float: right;
            margin-bottom: 20px;
        }

        .table th, .table td {
            text-align: center;
        }

        .actions a {
            margin-right: 10px;
            width: 70px;
        }

        .actions form {
            display: inline;
        }

        .btn {
            border-radius: 5px;
            font-weight: 500;
        }

        .btn-edit {
            background-color: yellow;
            border-color: yellow;
        }

        .btn-delete {
            background-color: red;
            border-color: red;
        }

        .add-user-btn {
            display: block;
            width: 100%;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    
    <h1>List of Users</h1>

    <!-- Logout Button -->
    <a href="#" class="btn btn-danger logout-button" data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</a>

    <!-- User Table -->
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= htmlspecialchars($user['name']); ?></td>
                <td><?= htmlspecialchars($user['email']); ?></td>
                <td class="actions">
                    <a href="/edit/<?= $user['id']; ?>" class="btn btn-edit">Edit</a>
                    <!-- Delete Button with Confirmation Modal -->
                    <a href="#" class="btn btn-delete" data-bs-toggle="modal" data-bs-target="#deleteModal-<?= $user['id']; ?>">Delete</a>
                </td>
            </tr>

            <!-- Delete Confirmation Modal -->
            <div class="modal fade" id="deleteModal-<?= $user['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete <?= htmlspecialchars($user['name']); ?>?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <form action="/delete/<?= $user['id']; ?>" method="POST" style="display:inline;">
                                <button type="submit" class="btn btn-danger">Yes, Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Add User Button -->
    <div class="add-user-btn">
        <a href="/create" class="btn btn-success btn-add-user">Add User</a>
    </div>

</div>

<!-- Logout Confirmation Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Confirm Logout</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to logout?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <a href="/logout" class="btn btn-danger">Yes, Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS (for Modal) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

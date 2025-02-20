<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Quickstart - Basic</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Lato';
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                User List
            </a>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="offset-md-2 col-md-8">
            <div class="card">
                @if (isset($user))
                <div class="card-header">
                    Update User
                </div>
                <div class="card-body">
                    <!-- Update User Form -->
                    <form action="{{url('update_user')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <!-- User Name -->
                        <div class="mb-3">
                            <label for="task-name" class="form-label">User</label>
                            <input type="text" name="user_name" id="user-name" class="form-control" value="{{$user->name}}">
                        </div>
                        <!-- User Email -->
                        <div class="mb-3">
                            <label for="User-email" class="form-label">Email</label>
                            <input type="text" name="user_email" id="user-email" class="form-control" value="{{$user->email}}">
                        </div>
                        <!-- User Password-->
                        <div class="mb-3">
                            <label for="User-password" class="form-label">Password</label>
                            <input type="password" name="user_password" id="user-password" class="form-control" value="****">
                        </div>
                        <!-- Update User Button -->
                        <div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-plus me-2"></i>Update User
                            </button>
                        </div>
                    </form>
                </div>
                @else
                <div class="card-header">
                    New User
                </div>
                <div class="card-body">
                    <!-- New User Form -->
                    <form action="create_user" method="POST">
                        @csrf
                        <!-- User Name -->
                        <div class="mb-3">
                            <label for="User-name" class="form-label">User</label>
                            <input type="text" name="User_name" id="User-name" class="form-control" value="">
                        </div>
                        <!-- User Email -->
                        <div class="mb-3">
                            <label for="User-email" class="form-label">Email</label>
                            <input type="text" name="User_email" id="User-email" class="form-control" value="">
                        </div>
                        <!-- User Password-->
                        <div class="mb-3">
                            <label for="User-password" class="form-label">Password</label>
                            <input type="text" name="User_password" id="User-password" class="form-control" value="">
                        </div>
                        <!-- Add User Button -->
                        <div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-plus me-2"></i>Add User
                            </button>
                        </div>
                    </form>
                </div>
                @endif
            </div>

            <!-- Current Tasks -->
            <div class="card mt-4">
                <div class="card-header">
                    Current Users
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <form action="/delete_user/{{$user->id}}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash me-2"></i>Delete
                                        </button>
                                    </form>
                                    <form action="/edit_user/{{$user->id}}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-info">
                                                <i class="fa fa-info me-2"></i>Edit
                                            </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

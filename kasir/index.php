<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Login</title>
    <style>
        body {
            background-image: url('assets/1.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            color: white;
            padding: 20px;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 300px;
            margin: 0 auto;
            background-color: rgba(0, 0, 0, 0.1);
            padding: 30px;
            border-radius: 10px;
        }
        h2 {
            text-align: center;
        }
        .form-label {
            font-weight: bold;
            color: #ffffff;
        }
        input[type="text"],
        input[type="password"] {
            color: white;
            border: none;
            background-color: #1a2b32;
            padding: 10px;
            width: 100%;
            margin-bottom: 15px;
            border-radius: 5px;
        }
        input[type="text"]:focus,
        input[type="password"]:focus {
            outline: none;
        }
        .btn-primary {
            width: 50%;
            background-color: #007bff;
            color: #ffffff;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 5px;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<form action="aksi/login.php" method="post" class="container">
    <div>
        <h2>login dulu yukk...</h2>
    </div>
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input required type="text" name="username" id="username">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input required type="password" name="password" id="password">
    </div>
    <button type="submit" class="btn-primary">Login</button>
</form>

</body>
</html>

<!DOCTYPE html>
<html lang="en">

</html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Admin Sign In</title>
    <style>
        .container {
            min-height: 100vh;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="text-center">
            <div class="col-sm-12">
                <h1 class="fw-bold">Admin Sign In</h1>
            </div>

            <div class="col-sm-12">
                <label class="form-label">User Name</label>
                <input type="text" class="form-control" id="un">
            </div>


            <div class="col-sm-12">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" id="pw">
            </div>

            <div class="col-sm-12 mt-2">
                <button class="btn btn-info" onclick="signIn();">Sign In</button>
            </div>
        </div>
    </div>

    <script src="assets/script.js"></script>
</body>

</html>
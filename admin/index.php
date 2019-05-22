
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <title>Admin Login</title>
</head>
<body>
    <div class="content-wrapper">
        <div class="container"><br><br>
            <div class="col-md-12">
                <h4>Administrator</h4><hr>
            </div>
            </div>
            <form action="home.php" method="POST">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <label for=""> Username:</label>
                        <input type="text" name="uname" class="form-control" autocomplete="off" id="uname" required>
                        <label for="">Password:</label>
                        <input type="password" name="pass" id="pass" class="form-control" autocomplete="off" required><br>
                        <button type="submit" name="submit" class="btn btn-success center-block">Log in </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
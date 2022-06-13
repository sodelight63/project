<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>login_emp</title>
</head>
<body>
    
    <div class="container text-center">
        <h1 class="mt-5">Login employee</h1>
    <form action="" class="form-horiontal mt-3" method="post">
        <div class="form-groop">
            <div class="row">
                <label for="username" class="col-sm-3 control-label">Username</label>
                <div class="col-sm-9">
                    <input type="text" name="txt_username" class="form-control" placeholder="Enter your username...">
                </div>
            </div>            
        </div>
        <div class="form-groop">
            <div class="row">
                <label for="password" class="col-sm-3 control-label">Password</label>
                <div class="col-sm-9">
                    <input type="text" name="txt_password" class="form-control" placeholder="Enter your password...">
                </div>
            </div>            
        </div>
        <div class="form-groop">
            <div class="row">
                <div class="col-sm-12">
                    <input type="submit" name="btn_login" class="btn btn-success" value="login">
                </div>
            </div>            
        </div>
        <div class="form-grop">
            <div class="row">
                <div class="col-sm-12">
                    <p>you don't have a account register here<a href="register.php">register</a></p>
                </div>
            </div>
        </div>
    </form>
    </div>

</body>
</html>
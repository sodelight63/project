<?php

    require_once('conn.php');

    if (isset($_REQUEST['btn_registr'])) {
        $username_emp =strip_tags($_REQUEST['txt_username']);
        $email_emp =strip_tags($_REQUEST['txt_email']);
        $password_emp =strip_tags($_REQUEST['txt_password']);

        if (empty($username_emp)){
            $errormsg[] = "Please enter username";
        } else if (empty($email_emp)){
            $errormsg[] = "Please enter email";
        } else if (!filter_var($email_emp, FILTER_VALIDATE_EMAIL)){
            $errormsg[] = "Please enter a valid email address";
        } else if (empty($password_emp)){
            $errormsg[] = "Please enter password";
        } else if (strlen($password_emp) < 6 ){
            $errormsg[] = "Password must be atleast 6 characters";
        } else {
            try{
                $select_stmt = $conn->prepare("SELECT username, email FROM employee WHERE username = :username_emp OR email = :email_emp");
                $select_stmt->execute(array('username_emp' => $username_emp, 'email_emp' => $email_emp));
            
                if ($row['username'] == $username_emp) {
                    $errorMsg[] = "Sorry username already exists";
                } else if ($row['email'] == $email_emp) {
                    $errorMsg[] = "Sorry email already exists";
                } else if (!isset($errorMsg)) {
                    $new_password = password_hash($password_emp, PASSWORD_DEFAULT);
                    $insert_stmt = $conn->prepare("INSERT INTO employee (username, email, password_emp) VALUES (:username_emp, :email_emp, :password_emp)");
                    if ($insert_stmt->execute(array(
                        ':username_emp' => $username_emp,
                        ':email_emp' => $email_emp,
                        ':password_emp' => $new_password
                    ))) {
                        $registerMsg = "Register successfully... Please click on login account link";
                    }
                }
            } catch(PDOException $e){
                $e->getMessage();

            }

        }
    } 

?>

<!DOCTYPE  html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>register</title>
</head>
<body>
    
    <div class="container text-center">
        <h1 class="mt-5">Register Employee</h1>
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
                <label for="username" class="col-sm-3 control-label">email</label>
                <div class="col-sm-9">
                    <input type="text" name="txt_email" class="form-control" placeholder="Enter your email...">
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
                    <input type="submit" name="btn_register" class="btn btn-primary" value="register">
                </div>
            </div>            
        </div>
        <div class="form-grop">
            <div class="row">
                <div class="col-sm-12">
                    <p>you have a account login here<a href="index_login_emp.php">login</a></p>
                </div>
            </div>
        </div>
    </form>
    </div>

</body>
</html>
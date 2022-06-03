<?php
session_start();
include('conn.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>แก้ไขข้อมูล</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3>แก้ไขข้อมูลลูกค้า
                            <a href="index_emp.php" class="btn btn-danger float-end">ย้อนกลับ</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <?php
                        if(isset($_GET['employee_id'])){
                            $employee_id = $_GET['employee_id'];
                            $query = "SELECT * FROM employee WHERE employee_id =:employee_id";
                            $stmt = $conn->prepare($query);
                            $data = [':employee_id'=> $employee_id];
                            $stmt->execute($data);

                            $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        }
                        ?>
                        <form action="crud.php" method="POST">
                            <input type="hidden" name="employee_id" value="<?=$result['employee_id']?>">
                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="name_emp" class="form-control" value="<?=$result['name_emp']?>"/>
                            </div>
                            <div class="mb-3">
                                <label>Surname</label>
                                <input type="text" name="surname_emp" class="form-control" value="<?=$result['surname_emp']?>"/>
                            </div>
                            <div class="mb-3">
                                <label>Phone</label>
                                <input type="text" name="phone_emp" class="form-control" value="<?=$result['phone_emp']?>"/>
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="text" name="email_emp" class="form-control" value="<?=$result['email_emp']?>"/>
                            </div>
                            <div class="mb-3">
                                <label>Address</label>
                                <input type="text" name="adress_emp" class="form-control" value="<?=$result['adress_emp']?>" />
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="edit_emp" class="btn btn-primary">แก้ไขข้อมูล</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>
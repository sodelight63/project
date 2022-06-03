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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>แก้ไขข้อมูล</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3>แก้ไขข้อมูลลูกค้า
                            <a href="index.emp.php" class="btn btn-danger float-end">ย้อนกลับ</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <?php
                        if(isset($_GET['customer_id'])){
                            $customer_id = $_GET['customer_id'];
                            $query = "SELECT * FROM customer WHERE customer_id =:customer_id";
                            $stmt = $conn->prepare($query);
                            $data = [':customer_id'=> $customer_id];
                            $stmt->execute($data);

                            $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        }
                        ?>
                        <form action="crud.php" method="POST">
                            <input type="hidden" name="customer_id" value="<?=$result['customer_id']?>">
                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="name_ct" class="form-control" value="<?=$result['name_ct']?>"/>
                            </div>
                            <div class="mb-3">
                                <label>Surname</label>
                                <input type="text" name="surname_ct" class="form-control" value="<?=$result['surname_ct']?>"/>
                            </div>
                            <div class="mb-3">
                                <label>Phone</label>
                                <input type="text" name="phone_ct" class="form-control" value="<?=$result['phone_ct']?>"/>
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="text" name="email_ct" class="form-control" value="<?=$result['email_ct']?>"/>
                            </div>
                            <div class="mb-3">
                                <label>Address</label>
                                <input type="text" name="adress_ct" class="form-control" value="<?=$result['adress_ct']?>" />
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="edit_cus" class="btn btn-primary">แก้ไขข้อมูล</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
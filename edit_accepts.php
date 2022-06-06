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
    <title>แก้ไขข้อมูลรับเข้าอะไหล่</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3>แก้ไขข้อมูลรับเข้าอะไหล่
                            <a href="index_accepts.php" class="btn btn-danger float-end">ย้อนกลับ</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <?php
                        if(isset($_GET['accept_id'])){
                            $accept_id = $_GET['accept_id'];
                            $query = "SELECT * FROM accepts WHERE accept_id =:accept_id";
                            $stmt = $conn->prepare($query);
                            $data = [':accept_id'=> $accept_id];
                            $stmt->execute($data);

                            $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        }
                        ?>
                        <form action="crud.php" method="POST">
                            <input type="hidden" name="accept_id" value="<?=$result['accept_id']?>">
                            <div class="mb-3">
                                <label>ชื่ออะไหล่</label>
                                <input type="text" name="accept_name" class="form-control" value="<?=$result['accept_name']?>"/>
                            </div>
                            <div class="mb-3">
                                <label>จำนวน</label>
                                <input type="text" name="accept_quanlity" class="form-control" value="<?=$result['accept_quanlity']?>"/>
                            </div>
                            <div class="mb-3">
                                <label>วันที่รับเข้า</label>
                                <input type="date" name="accept_date" class="form-control" value="<?=$result['accept_date']?>"/>
                            
                            <div class="mb-3">
                                <button type="submit" name="edit_accept" class="btn btn-primary">แก้ไขข้อมูล</button>
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
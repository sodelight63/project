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
    <title>แก้ไขข้อมูลmodel</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3>แก้ไขข้อmodel
                            <a href="index_model.php" class="btn btn-danger float-end">ย้อนกลับ</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <?php
                        if(isset($_GET['model_id'])){
                            $model_id = $_GET['model_id'];
                            $query = "SELECT * FROM model WHERE model_id =:model_id";
                            $stmt = $conn->prepare($query);
                            $data = [':model_id'=> $model_id];
                            $stmt->execute($data);

                            $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        }
                        ?>
                        <form action="crud.php" method="POST">
                            <input type="hidden" name="model_id" value="<?=$result['model_id']?>">
                            <div class="mb-3">
                                <label>ชื่อรุ่นฝาสูบ</label>
                                <input type="text" name="model_name" class="form-control" value="<?=$result['model_name']?>"/>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="edit_model" class="btn btn-primary">แก้ไขข้อมูล</button>
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
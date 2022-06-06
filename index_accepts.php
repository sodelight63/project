<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>index_accepts</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <?php if (isset($_SESSION['message'])) : ?>
                    <h5 class="alert alert-success"><?= $_SESSION['message']; ?></h5>
                <?php
                    unset($_SESSION['message']);
                endif;
                ?>
                <div class="card">
                    <div class="card-header">
                        <h3>ข้อมูลลูกค้า
                            <a href="Add_accepts.php" class="btn btn-primary float-end">เพิ่มข้อมูล</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>รหัสรับเข้าอะไหล่</th>
                                    <th>ชื่ออะไหล่</th>
                                    <th>จำนวน</th>
                                    <th>วันที่รับเข้า</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require 'conn.php';
                                $sql = "SELECT * FROM accepts";
                                $stmt = $conn->query($sql);
                                while ($row = $stmt->fetch()) {
                                ?>
                                    <tr>
                                        <td><?= $row['accept_id']; ?></td>
                                        <td><?= $row['accept_name']; ?></td>
                                        <td><?= $row['accept_quanlity']; ?></td>
                                        <td><?= $row['accept_date']; ?></td>
                                        <td><a href="Edit_accepts.php?accept_id=<?= $row['accept_id'] ?>" class="btn btn-primary">แก้ไข</a></td>
                                        <td>
                                            <form action="crud.php" method="POST">
                                                <button type="submit" name="delete_accepts" value="<?= $row['accept_id'] ?>" class="btn btn-danger">ลบ</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
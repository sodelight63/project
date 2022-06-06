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
    <title>เพิ่มข้อมูลaccepts</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3>เพิ่มข้อมูลรับเข้าอะไหล่</h3>
                    </div>
                    <div class="card-body">
                        <form action="crud.php" method="POST">
                            <div class="mb-3">
                                <label>ชื่ออะไหล่</label>
                                <input type="text" name="accept_name" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>	จำนวน</label>
                                <input type="text" name="accept_quanlity" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>วันที่รับเข้า</label>
                                <input type="date" name="accept_date" class="form-control" />
                            </div>
                            
                            <div class="mb-3">
                                <button type="submit" name="save_accept" class="btn btn-primary">เพิ่มข้อมูล</button>
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
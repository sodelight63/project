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
    <title>เพิ่มข้อมูลmodel</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3>เพิ่มข้อมูลประเภท</h3>
                    </div>
                    <div class="card-body">
                        <form action="crud.php" method="POST">
                            <div class="mb-3">
                                <label>ชื่อรุ่นฝาสูบ</label>
                                <input type="text" name="model_name" class="form-control" />
                            </div> 
                            <div class="mb-3">
                                <button type="submit" name="save_model" class="btn btn-primary">เพิ่มข้อมูล</button>
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
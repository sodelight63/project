<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>เพิ่มข้อมูล</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3>เพิ่มข้อมูลลูกค้า</h3>
                    </div>
                    <div class="card-body">
                        <form action="crud.php" method="POST">
                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="name_emp" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Surname</label>
                                <input type="text" name="surname_emp" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Phone</label>
                                <input type="text" name="phone_emp" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="text" name="email_emp" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Address</label>
                                <input type="text" name="adress_emp" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_emp" class="btn btn-primary">เพิ่มข้อมูล</button>
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
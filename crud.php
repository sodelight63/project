<?php
session_start();
include('conn.php');


if (isset($_POST['save_emp'])) {
    $name_emp = $_POST['name_emp'];
    $surname_emp = $_POST['surname_emp'];
    $phone_emp = $_POST['phone_emp'];
    $email_emp = $_POST['email_emp'];
    $adress_emp = $_POST['adress_emp'];

    $query = "INSERT INTO employee(name_emp,surname_emp,phone_emp,email_emp,adress_emp) VALUES(:name_emp,:surname_emp,:phone_emp,:email_emp,:adress_emp)";
    $query_run = $conn->prepare($query);

    $data = [
        ':name_emp' => $name_emp,
        ':surname_emp' => $surname_emp,
        ':phone_emp' => $phone_emp,
        ':email_emp' => $email_emp,
        ':adress_emp' => $adress_emp
    ];
    $query_execute = $query_run->execute($data);

    if ($query_execute) {
        $_SESSION['message'] = "เพิ่มข้อมูลสำเร็จ";
        header('Location: index_emp.php');
        exit(0);
    } else {
        $_SESSION['message'] = "เพิ่มข้อมูลไม่สำเร็จ";
        header('Location: index_emp.php');
        exit(0);
    }
}

if (isset($_POST['edit_emp'])) {
    $employee_id = $_POST['employee_id'];
    $name_emp = $_POST['name_emp'];
    $surname_emp = $_POST['surname_emp'];
    $phone_emp = $_POST['phone_emp'];
    $email_emp = $_POST['email_emp'];
    $adress_emp = $_POST['adress_emp'];

    try {
        $query = "UPDATE employee SET name_emp = :name_emp, surname_emp = :surname_emp, phone_emp = :phone_emp, email_emp = :email_emp, adress_emp = :adress_emp WHERE employee_id = :employee_id";
        $stmt = $conn->prepare($query);

        $data = [
            ':name_emp' => $name_emp,
            ':surname_emp' => $surname_emp,
            ':phone_emp' => $phone_emp,
            ':email_emp' => $email_emp,
            ':adress_emp' => $adress_emp,
            ':employee_id' => $employee_id
        ];
        $query_execute = $stmt->execute($data);
        if ($query_execute) {
            $_SESSION['message'] = "แก้ไขข้อมูลสำเร็จ";
            header('Location: index_emp.php');
            exit(0);
        } else {
            $_SESSION['message'] = "แก้ไขข้อมูลไม่สำเร็จ";
            header('Location: index_emp.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

if (isset($_POST['delete_emp'])) {
    $employee_id = $_POST['delete_emp'];
    try {
        $query = "DELETE FROM employee WHERE employee_id = :employee_id";
        $stmt = $conn->prepare($query);

        $data = [
            ':employee_id' => $employee_id
        ];
        $query_execute = $stmt->execute($data);
        if ($query_execute) {
            $_SESSION['message'] = "ลบข้อมูลสำเร็จ";
            header('Location: index_emp.php');
            exit(0);
        } else {
            $_SESSION['message'] = "ลบข้อมูลไม่สำเร็จ";
            header('Location: index_emp.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
if (isset($_POST['save_model'])) {
    $model_name = $_POST['model_name'];
    $query = "INSERT INTO model(model_name) VALUES (:model_name)";
    $query_run = $conn->prepare($query);
    $data = [
        ':model_name' => $model_name
    ];
    $query_execute = $query_run->execute($data);

    if ($query_execute) {
        $_SESSION['message'] = "เพิ่มข้อมูลสำเร็จ";
        header('Location: index_model.php');
        exit(0);
    } else {
        $_SESSION['message'] = "เพิ่มข้อมูลไม่สำเร็จ";
        header('Location: index_model.php');
        exit(0);
    }
}
if (isset($_POST['edit_model'])) {
    $model_id = $_POST['model_id'];
    $model_name = $_POST['model_name'];
    try {
        $query = "UPDATE model SET model_name = :model_name WHERE model_id = :model_id";
        $stmt = $conn->prepare($query);

        $data = [
            ':model_name' => $model_name,
            ':model_id' => $model_id

        ];
        $query_execute = $stmt->execute($data);
        if ($query_execute) {
            $_SESSION['message'] = "แก้ไขข้อมูลสำเร็จ";
            header('Location: index_model.php');
            exit(0);
        } else {
            $_SESSION['message'] = "แก้ไขข้อมูลไม่สำเร็จ";
            header('Location: index_model.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
if (isset($_POST['delete_model'])) {
    $model_id = $_POST['delete_model'];
    try {
        $query = "DELETE FROM model WHERE model_id = :model_id";
        $stmt = $conn->prepare($query);

        $data = [
            ':model_id' => $model_id
        ];
        $query_execute = $stmt->execute($data);
        if ($query_execute) {
            $_SESSION['message'] = "ลบข้อมูลสำเร็จ";
            header('Location: index_model.php');
            exit(0);
        } else {
            $_SESSION['message'] = "ลบข้อมูลไม่สำเร็จ";
            header('Location: index_model.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
if (isset($_POST['save_accept'])) {
    $accept_name = $_POST['accept_name'];
    $accept_quanlity = $_POST['accept_quanlity'];
    $accept_date = $_POST['accept_date'];
    
    $query = "INSERT INTO accepts(accept_name,accept_quanlity,accept_date) VALUES(:accept_name,:accept_quanlity,:accept_date)";
    $query_run = $conn->prepare($query);
    $data = [

        ':accept_name' => $accept_name,
        ':accept_quanlity' => $accept_quanlity,
        ':accept_date' => $accept_date,

    ];
    $query_execute = $query_run->execute($data);

    if ($query_execute) {
        $_SESSION['message'] = "เพิ่มข้อมูลสำเร็จ";
        header('Location: index_accepts.php');
        exit(0);
    } else {
        $_SESSION['message'] = "เพิ่มข้อมูลไม่สำเร็จ";
        header('Location: index_accepts.php');
        exit(0);
    }
}
if (isset($_POST['edit_accept'])) {
    $accept_name = $_POST['accept_name'];
    $accept_quanlity = $_POST['accept_quanlity'];
    $accept_date = $_POST['accept_date'];
    $accept_id = $_POST['accept_id']; 
    try {
        $query = "UPDATE accepts SET accept_name = :accept_name, accept_quanlity = :accept_quanlity, accept_date = :accept_date WHERE accept_id = :accept_id";
        $stmt = $conn->prepare($query);

        $data = [
            ':accept_name' => $accept_name,
            ':accept_quanlity' => $accept_quanlity,
            ':accept_date' => $accept_date,
            ':accept_id' => $accept_id
       

        ];
        $query_execute = $stmt->execute($data);
        if ($query_execute) {
            $_SESSION['message'] = "แก้ไขข้อมูลสำเร็จ";
            header('Location: index_accepts.php');
            exit(0);
        } else {
            $_SESSION['message'] = "แก้ไขข้อมูลไม่สำเร็จ";
            header('Location: index_accepts.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
if (isset($_POST['delete_accepts'])) {
    $accept_id = $_POST['delete_accepts'];
    try {
        $query = "DELETE FROM accepts WHERE accept_id = :accept_id";
        $stmt = $conn->prepare($query);

        $data = [
            ':accept_id' => $accept_id
        ];
        $query_execute = $stmt->execute($data);
        if ($query_execute) {
            $_SESSION['message'] = "ลบข้อมูลสำเร็จ";
            header('Location: index_accepts.php');
            exit(0);
        } else {
            $_SESSION['message'] = "ลบข้อมูลไม่สำเร็จ";
            header('Location: index_accepts.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
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
?>
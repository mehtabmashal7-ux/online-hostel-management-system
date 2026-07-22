<?php
include 'connection.php';

if (isset($_POST['save_student'])) {

    $student_name = $_POST['student_name'];
    $father_name  = $_POST['father_name'];
    $phone        = $_POST['phone'];
    $email        = $_POST['email'];
    $room_no      = $_POST['room_no'];
    $cnic         = $_POST['cnic'];
    $address      = $_POST['address'];

    $sql = "INSERT INTO students 
    (student_name, father_name, phone, email, room_no, cnic, address)
    VALUES 
    ('$student_name', '$father_name', '$phone', '$email', '$room_no', '$cnic', '$address')";

    mysqli_query($conn, $sql);

    echo "<script>alert('Student Added Successfully');</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Student Form</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    margin:0;
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background: linear-gradient(135deg, #0f172a, #1e293b);
    font-family: Arial;
}

/* CARD */
.form-card{
    width: 380px;
    background: rgba(255,255,255,0.08);
    backdrop-filter: blur(12px);
    border: 1px solid rgba(255,255,255,0.15);
    border-radius: 16px;
    padding: 22px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.4);
    color: white;
}

/* TITLE */
.title{
    text-align:center;
    font-size:18px;
    font-weight:600;
    margin-bottom:15px;
    letter-spacing:1px;
}

/* INPUTS */
.form-control{
    background: rgba(255,255,255,0.1);
    border: none;
    color: white;
    font-size:13px;
}

.form-control::placeholder{
    color: rgba(255,255,255,0.6);
}

.form-control:focus{
    box-shadow:none;
    background: rgba(255,255,255,0.15);
    color:white;
}

/* BUTTON */
.btn-custom{
    width:100%;
    background:#3b82f6;
    border:none;
    padding:8px;
    border-radius:10px;
    font-size:14px;
    font-weight:500;
}

.btn-custom:hover{
    background:#2563eb;
}
</style>
</head>

<body>

<div class="form-card">

    <div class="title">Student Registration</div>

    <form method="POST">

        <input type="text" name="student_name" class="form-control mb-2" placeholder="Student Name" required>

        <input type="text" name="father_name" class="form-control mb-2" placeholder="Father Name" required>

        <input type="text" name="phone" class="form-control mb-2" placeholder="Phone" required>

        <input type="email" name="email" class="form-control mb-2" placeholder="Email">

        <input type="text" name="room_no" class="form-control mb-2" placeholder="Room No" required>

        <input type="text" name="cnic" class="form-control mb-2" placeholder="CNIC">

        <textarea name="address" class="form-control mb-3" rows="2" placeholder="Address"></textarea>

        <button type="submit" name="save_student" class="btn btn-custom">
            Save Student
        </button>

    </form>

</div>

</body>
</html>
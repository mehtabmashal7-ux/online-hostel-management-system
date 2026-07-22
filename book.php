<?php
include 'connection.php';

if (isset($_POST['book'])) {

    $student_name   = $_POST['student_name'];
    $phone          = $_POST['phone'];
    $room_no        = $_POST['room_no'];
    $total_students = $_POST['total_students'];
    $booking_date   = $_POST['booking_date'];
    $months         = $_POST['duration_months'];
    $fee            = $_POST['fee_per_month'];

    $total_amount = $months * $fee;

    $sql = "INSERT INTO booking 
    (student_name, phone, room_no, total_students, booking_date, duration_months, fee_per_month, total_amount)
    VALUES 
    ('$student_name', '$phone', '$room_no', '$total_students', '$booking_date', '$months', '$fee', '$total_amount')";

    mysqli_query($conn, $sql);

    echo "<script>alert('Room Booked Successfully');</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Room Booking</title>
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
    color:white;
}

/* CARD */
.card-box{
    width:420px;
    background: rgba(255,255,255,0.08);
    backdrop-filter: blur(12px);
    border: 1px solid rgba(255,255,255,0.15);
    border-radius: 16px;
    padding: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.4);
}

/* TITLE */
.title{
    text-align:center;
    font-size:18px;
    font-weight:600;
    margin-bottom:15px;
}

/* INPUTS */
.form-control{
    background: rgba(255,255,255,0.1);
    border:none;
    color:white;
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
    background:#f59e0b;
    border:none;
    padding:8px;
    border-radius:10px;
    font-size:14px;
}

.btn-custom:hover{
    background:#d97706;
}

/* BACK */
.back{
    display:block;
    text-align:center;
    margin-top:10px;
    font-size:13px;
    color:#60a5fa;
    text-decoration:none;
}
.back:hover{
    color:#3b82f6;
}
</style>
</head>

<body>

<div class="card-box">

    <div class="title">Room Booking</div>

    <form method="POST">

        <input type="text" name="student_name" class="form-control mb-2" placeholder="Student Name" required>

        <input type="text" name="phone" class="form-control mb-2" placeholder="Phone" required>

        <input type="text" name="room_no" class="form-control mb-2" placeholder="Room No" required>

        <input type="number" name="total_students" class="form-control mb-2" placeholder="Total Students in Room" required>

        <input type="date" name="booking_date" class="form-control mb-2" required>

        <input type="number" name="duration_months" class="form-control mb-2" placeholder="Duration (Months)" required>

        <input type="number" name="fee_per_month" class="form-control mb-3" placeholder="Fee Per Month" required>

        <button type="submit" name="book" class="btn btn-custom">
            Book Room
        </button>

    </form>

    <a href="userdashboard.php" class="back">⬅ Back to Dashboard</a>

</div>

</body>
</html>
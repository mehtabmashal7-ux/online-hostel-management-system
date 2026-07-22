<?php
include 'connection.php';

$message = '';

if(isset($_POST['add_room']))
{
    $room_no = mysqli_real_escape_string($conn,$_POST['room_no']);
    $room_type = mysqli_real_escape_string($conn,$_POST['room_type']);
    $capacity = mysqli_real_escape_string($conn,$_POST['capacity']);
    $monthly_rent = mysqli_real_escape_string($conn,$_POST['monthly_rent']);
    $status = mysqli_real_escape_string($conn,$_POST['status']);

    $query = "INSERT INTO rooms
    (room_no, room_type, capacity, monthly_rent, status)
    VALUES
    ('$room_no','$room_type','$capacity','$monthly_rent','$status')";

    if(mysqli_query($conn,$query))
    {
        $message = "Room Added Successfully";
    }
    else
    {
        $message = "Error: ".mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Add Room</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

body{
    background:#0b1220;
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    padding:30px;
}

.form-card{
    width:100%;
    max-width:700px;
    background:#111827;
    border-radius:18px;
    padding:30px;
    border:1px solid rgba(255,255,255,.08);
    box-shadow:0 20px 40px rgba(0,0,0,.3);
}

.form-header{
    display:flex;
    align-items:center;
    gap:15px;
    margin-bottom:25px;
}

.form-header i{
    width:55px;
    height:55px;
    border-radius:12px;
    background:#2563eb;
    color:white;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:22px;
}

.form-header h2{
    color:white;
    font-size:24px;
}

.form-header p{
    color:#94a3b8;
    font-size:14px;
}

.alert{
    background:#16a34a;
    color:white;
    padding:12px;
    border-radius:10px;
    margin-bottom:20px;
}

.row{
    display:flex;
    gap:15px;
    margin-bottom:18px;
}

.input-box{
    flex:1;
}

label{
    display:block;
    margin-bottom:7px;
    color:#cbd5e1;
    font-size:14px;
}

input,
select{
    width:100%;
    padding:13px;
    border:none;
    border-radius:10px;
    background:#1f2937;
    color:white;
    font-size:14px;
}

input:focus,
select:focus{
    outline:2px solid #3b82f6;
}

.btn{
    width:100%;
    padding:14px;
    border:none;
    border-radius:10px;
    background:#2563eb;
    color:white;
    font-size:15px;
    font-weight:600;
    cursor:pointer;
    transition:.3s;
}

.btn:hover{
    background:#1d4ed8;
}

.back-btn{
    display:inline-block;
    margin-top:15px;
    text-decoration:none;
    color:#94a3b8;
}

.back-btn:hover{
    color:white;
}

@media(max-width:768px){

.row{
    flex-direction:column;
}

.form-card{
    padding:20px;
}

}

</style>
</head>
<body>

<div class="form-card">

    <div class="form-header">
        <i class="fa-solid fa-bed"></i>

        <div>
            <h2>Add New Room</h2>
            <p>Hostel Room Management System</p>
        </div>
    </div>

    <?php if($message!=''){ ?>
        <div class="alert">
            <?php echo $message; ?>
        </div>
    <?php } ?>

    <form method="POST">

        <div class="row">

            <div class="input-box">
                <label>Room Number</label>
                <input type="text" name="room_no" required>
            </div>

            <div class="input-box">
                <label>Room Type</label>
                <select name="room_type">
                    <option>Single</option>
                    <option>Double</option>
                    <option>Triple</option>
                    <option>VIP</option>
                </select>
            </div>

        </div>

        <div class="row">

            <div class="input-box">
                <label>Capacity</label>
                <input type="number" name="capacity" required>
            </div>

            <div class="input-box">
                <label>Monthly Rent</label>
                <input type="number" name="monthly_rent" required>
            </div>

        </div>

        <div class="row">

            <div class="input-box">
                <label>Status</label>
                <select name="status">
                    <option>Available</option>
                    <option>Occupied</option>
                    <option>Maintenance</option>
                </select>
            </div>

        </div>

        <button type="submit" name="add_room" class="btn">
            <i class="fa-solid fa-plus"></i> Add Room
        </button>

    </form>

    <a href="admindashboard.php" class="back-btn">
        <i class="fa-solid fa-arrow-left"></i> Back to Dashboard
    </a>

</div>

</body>
</html>
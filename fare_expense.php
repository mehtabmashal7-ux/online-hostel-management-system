<?php
include 'connection.php';

/* GET ROOMS */
$rooms = mysqli_query($conn, "SELECT room_no FROM rooms");

if (isset($_POST['save'])) {

    $room_no = $_POST['room_no'];
    $month = $_POST['month'];
    $room_rent = $_POST['room_rent'];
    $mess_expense = $_POST['mess_expense'];
    $electricity = $_POST['electricity_bill'];
    $water = $_POST['water_bill'];
    $other = $_POST['other_expense'];

    $total = $room_rent + $mess_expense + $electricity + $water + $other;

    $sql = "INSERT INTO fare_expense 
    (room_no, month, room_rent, mess_expense, electricity_bill, water_bill, other_expense, total)
    VALUES 
    ('$room_no', '$month', '$room_rent', '$mess_expense', '$electricity', '$water', '$other', '$total')";

    mysqli_query($conn, $sql);

    echo "<script>alert('Expense Added Successfully');</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Fare & Expense</title>
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
.form-control, select{
    background: rgba(255,255,255,0.1);
    border:none;
    color:white;
    font-size:13px;
}

select option{
    color:black;
}

.form-control::placeholder{
    color: rgba(255,255,255,0.6);
}

.form-control:focus, select:focus{
    box-shadow:none;
    background: rgba(255,255,255,0.15);
    color:white;
}

/* BUTTON */
.btn-custom{
    width:100%;
    background:#22c55e;
    border:none;
    padding:8px;
    border-radius:10px;
    font-size:14px;
}

.btn-custom:hover{
    background:#16a34a;
}

/* BACK LINK */
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

    <div class="title">Fare & Hostel Expenses</div>

    <form method="POST">

        <!-- ROOM DROPDOWN -->
        <select name="room_no" class="form-control mb-2" required>
            <option value="">Select Room No</option>
            <?php while($row = mysqli_fetch_assoc($rooms)) { ?>
                <option value="<?php echo $row['room_no']; ?>">
                    <?php echo $row['room_no']; ?>
                </option>
            <?php } ?>
        </select>

        <input type="text" name="month" class="form-control mb-2" placeholder="Month (e.g. June 2026)" required>

        <input type="number" name="room_rent" class="form-control mb-2" placeholder="Room Rent">

        <input type="number" name="mess_expense" class="form-control mb-2" placeholder="Mess Expense">

        <input type="number" name="electricity_bill" class="form-control mb-2" placeholder="Electricity Bill">

        <input type="number" name="water_bill" class="form-control mb-2" placeholder="Water Bill">

        <input type="number" name="other_expense" class="form-control mb-3" placeholder="Other Expense">

        <button type="submit" name="save" class="btn btn-custom">
            Save Expense
        </button>

    </form>

    <a href="admindashboard.php" class="back">⬅ Back to Dashboard</a>

</div>

</body>
</html>
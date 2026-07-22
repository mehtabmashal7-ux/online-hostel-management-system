<?php
include 'connection.php';

$data = null;
$not_found = false;

if (isset($_GET['room_no'])) {

    $room_no = $_GET['room_no'];

    $query = "SELECT * FROM fare_expense WHERE room_no = '$room_no' ORDER BY id DESC";

    $data = mysqli_query($conn, $query);

    if (mysqli_num_rows($data) == 0) {
        $not_found = true;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Rent Search</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    margin:0;
    background: linear-gradient(135deg, #0f172a, #1e293b);
    font-family: Arial;
    color:white;
}

/* BOX */
.box{
    width:600px;
    margin:60px auto;
    background: rgba(255,255,255,0.08);
    backdrop-filter: blur(12px);
    padding:20px;
    border-radius:14px;
    box-shadow:0 10px 30px rgba(0,0,0,0.4);
}

/* INPUT */
.form-control{
    background: rgba(255,255,255,0.1);
    border:none;
    color:white;
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
    background:#3b82f6;
    border:none;
}

.btn-custom:hover{
    background:#2563eb;
}

/* TABLE */
.table{
    color:white;
    font-size:13px;
}

.table thead{
    background:#22c55e;
}

/* ERROR */
.error{
    text-align:center;
    color:#f87171;
    margin-top:10px;
}

/* BACK */
.back{
    display:block;
    margin-top:10px;
    text-align:center;
    color:#60a5fa;
    text-decoration:none;
}
</style>
</head>

<body>

<div class="box">

    <h5 class="text-center mb-3">Search Rent by Room No</h5>

    <form method="GET">
        <input type="text" name="room_no" class="form-control mb-2" placeholder="Enter Room No" required>

        <button type="submit" class="btn btn-custom w-100">
            Search
        </button>
    </form>

    <hr>

    <?php if ($data && mysqli_num_rows($data) > 0) { ?>

        <table class="table table-bordered text-center">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Room No</th>
                    <th>Month</th>
                    <th>Room Rent</th>
                    <th>Mess</th>
                    <th>Electricity</th>
                    <th>Water</th>
                    <th>Other</th>
                    <th>Total</th>
                </tr>
            </thead>

            <tbody>

            <?php while($row = mysqli_fetch_assoc($data)) { ?>

                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['room_no']; ?></td>
                    <td><?php echo $row['month']; ?></td>
                    <td><?php echo $row['room_rent']; ?></td>
                    <td><?php echo $row['mess_expense']; ?></td>
                    <td><?php echo $row['electricity_bill']; ?></td>
                    <td><?php echo $row['water_bill']; ?></td>
                    <td><?php echo $row['other_expense']; ?></td>
                    <td><?php echo $row['total']; ?></td>
                </tr>

            <?php } ?>

            </tbody>

        </table>

    <?php } elseif(isset($_GET['room_no']) && $not_found) { ?>

        <div class="error">
            ❌ No record found for this Room No
        </div>

    <?php } ?>

    <a href="userdashboard.php" class="back">⬅ Back to Dashboard</a>

</div>

</body>
</html>
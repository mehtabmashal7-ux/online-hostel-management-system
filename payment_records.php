<?php
include 'connection.php';

$result = mysqli_query($conn, "SELECT * FROM fare_expense ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>Expense Reports</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background: linear-gradient(135deg, #0f172a, #1e293b);
    font-family: Arial;
    color: white;
}

/* HEADER */
.header{
    text-align:center;
    padding:20px;
    font-size:22px;
    font-weight:600;
    letter-spacing:1px;
}

/* CARD */
.card-box{
    background: rgba(255,255,255,0.08);
    backdrop-filter: blur(12px);
    border: 1px solid rgba(255,255,255,0.15);
    border-radius: 14px;
    padding: 15px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.4);
}

/* TABLE */
.table{
    color:white;
    font-size:13px;
}

.table thead{
    background: rgba(34,197,94,0.8);
}

.table tbody tr{
    background: rgba(255,255,255,0.05);
    transition:0.2s;
}

.table tbody tr:hover{
    background: rgba(255,255,255,0.12);
}

/* BACK BUTTON */
.back-btn{
    display:inline-block;
    margin:15px 0;
    padding:8px 14px;
    background:#ef4444;
    color:white;
    text-decoration:none;
    border-radius:8px;
    font-size:13px;
    transition:0.2s;
}

.back-btn:hover{
    background:#dc2626;
    color:white;
}

/* TOTAL BADGE */
.total-badge{
    background:#22c55e;
    padding:5px 8px;
    border-radius:8px;
}
</style>
</head>

<body>

<div class="container mt-4">

    <!-- BACK -->
    <a href="admindashboard.php" class="back-btn">⬅ Back to Dashboard</a>

    <div class="header">
        Expense Reports
    </div>

    <div class="card-box">

        <div class="table-responsive">

            <table class="table table-hover align-middle text-center">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Month</th>
                        <th>Room Rent</th>
                        <th>Mess</th>
                        <th>Electricity</th>
                        <th>Water</th>
                        <th>Other</th>
                        <th>Total</th>
                        <th>Date</th>
                    </tr>
                </thead>

                <tbody>

                <?php while($row = mysqli_fetch_assoc($result)) { ?>

                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['month']; ?></td>
                        <td><?php echo $row['room_rent']; ?></td>
                        <td><?php echo $row['mess_expense']; ?></td>
                        <td><?php echo $row['electricity_bill']; ?></td>
                        <td><?php echo $row['water_bill']; ?></td>
                        <td><?php echo $row['other_expense']; ?></td>
                        <td>
                            <span class="total-badge">
                                <?php echo $row['total']; ?>
                            </span>
                        </td>
                        <td><?php echo $row['created_at']; ?></td>
                    </tr>

                <?php } ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>
</html>
<?php
include 'connection.php';
$result = mysqli_query($conn, "SELECT * FROM students ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>Student Records</title>
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
    background: rgba(59,130,246,0.8);
}

.table tbody tr{
    background: rgba(255,255,255,0.05);
    transition:0.2s;
}

.table tbody tr:hover{
    background: rgba(255,255,255,0.12);
}

/* ROOM BADGE */
.badge-room{
    background:#3b82f6;
    padding:5px 8px;
    border-radius:8px;
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
</style>
</head>

<body>

<div class="container mt-4">

    <!-- BACK BUTTON -->
    <a href="admindashboard.php" class="back-btn">
        ⬅ Back to Dashboard
    </a>

    <div class="header">
        Student Records
    </div>

    <div class="card-box">

        <div class="table-responsive">

            <table class="table table-hover align-middle text-center">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Student Name</th>
                        <th>Father Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Room No</th>
                        <th>CNIC</th>
                        <th>Address</th>
                        <th>Date</th>
                    </tr>
                </thead>

                <tbody>

                <?php while($row = mysqli_fetch_assoc($result)) { ?>

                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['student_name']; ?></td>
                        <td><?php echo $row['father_name']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td>
                            <span class="badge-room">
                                <?php echo $row['room_no']; ?>
                            </span>
                        </td>
                        <td><?php echo $row['cnic']; ?></td>
                        <td><?php echo $row['address']; ?></td>
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
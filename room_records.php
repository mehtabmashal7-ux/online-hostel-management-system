<?php
include 'connection.php';

$result = mysqli_query($conn,"SELECT * FROM rooms ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Room Records</title>

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
    color:white;
    padding:25px;
}

.container{
    max-width:1300px;
    margin:auto;
}

.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px;
}

.title{
    font-size:28px;
    font-weight:700;
}

.add-btn{
    background:#2563eb;
    padding:12px 18px;
    color:white;
    text-decoration:none;
    border-radius:10px;
    font-weight:600;
}

.add-btn:hover{
    background:#1d4ed8;
}

.table-card{
    background:#111827;
    border-radius:15px;
    overflow:hidden;
    border:1px solid rgba(255,255,255,.08);
}

table{
    width:100%;
    border-collapse:collapse;
}

th{
    background:#1f2937;
    padding:15px;
    text-align:left;
    color:white;
}

td{
    padding:15px;
    border-top:1px solid rgba(255,255,255,.05);
    color:#cbd5e1;
}

tr:hover{
    background:#162033;
}

.badge{
    padding:6px 12px;
    border-radius:20px;
    font-size:12px;
    font-weight:600;
    color:white;
}

.available{
    background:#16a34a;
}

.occupied{
    background:#dc2626;
}

.maintenance{
    background:#f59e0b;
}

.back{
    display:inline-block;
    margin-top:20px;
    color:#94a3b8;
    text-decoration:none;
}

.back:hover{
    color:white;
}

@media(max-width:900px){

    .table-card{
        overflow-x:auto;
    }

    table{
        min-width:800px;
    }
}

</style>

</head>
<body>

<div class="container">

    <div class="header">

        <h1 class="title">
            <i class="fa-solid fa-bed"></i>
            Room Records
        </h1>

        <a href="rooms.php" class="add-btn">
            <i class="fa-solid fa-plus"></i>
            Add Room
        </a>

    </div>

    <div class="table-card">

        <table>

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Room No</th>
                    <th>Room Type</th>
                    <th>Capacity</th>
                    <th>Monthly Rent</th>
                    <th>Status</th>
                    <th>Created Date</th>
                </tr>
            </thead>

            <tbody>

            <?php

            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_assoc($result))
                {
            ?>

                <tr>

                    <td><?php echo $row['id']; ?></td>

                    <td><?php echo htmlspecialchars($row['room_no']); ?></td>

                    <td><?php echo htmlspecialchars($row['room_type']); ?></td>

                    <td><?php echo $row['capacity']; ?></td>

                    <td>
                        Rs. <?php echo number_format($row['monthly_rent']); ?>
                    </td>

                    <td>

                    <?php

                    if($row['status'] == "Available")
                    {
                        echo "<span class='badge available'>Available</span>";
                    }
                    elseif($row['status'] == "Occupied")
                    {
                        echo "<span class='badge occupied'>Occupied</span>";
                    }
                    else
                    {
                        echo "<span class='badge maintenance'>Maintenance</span>";
                    }

                    ?>

                    </td>

                    <td>
                        <?php echo date('d M Y', strtotime($row['created_at'])); ?>
                    </td>

                </tr>

            <?php

                }
            }
            else
            {
                echo "
                <tr>
                    <td colspan='7' style='text-align:center;padding:25px;'>
                        No Room Records Found
                    </td>
                </tr>";
            }

            ?>

            </tbody>

        </table>

    </div>

    <a href="admindashboard.php" class="back">
        <i class="fa-solid fa-arrow-left"></i>
        Back to Dashboard
    </a>

</div>

</body>
</html>
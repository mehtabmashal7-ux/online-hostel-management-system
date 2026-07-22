<?php
include 'connection.php';

$result = mysqli_query($conn,"SELECT * FROM expense ORDER BY id DESC");

$total_expense = mysqli_query($conn,"SELECT SUM(expense_amount) as total FROM expense");
$total = mysqli_fetch_assoc($total_expense);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Expense Reports</title>

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
    color:white;
    text-decoration:none;
    padding:12px 18px;
    border-radius:10px;
    font-weight:600;
}

.add-btn:hover{
    background:#1d4ed8;
}

.summary{
    background:#111827;
    border-radius:15px;
    padding:20px;
    margin-bottom:20px;
    border:1px solid rgba(255,255,255,.08);
}

.summary h2{
    color:#22c55e;
    margin-top:8px;
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
    color:white;
}

.mess{background:#16a34a;}
.electricity{background:#dc2626;}
.gas{background:#f59e0b;}
.internet{background:#2563eb;}
.water{background:#06b6d4;}
.salary{background:#8b5cf6;}
.maintenance{background:#ec4899;}
.other{background:#64748b;}

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
    min-width:1000px;
}

}

</style>
</head>
<body>

<div class="container">

    <div class="header">

        <h1 class="title">
            <i class="fa-solid fa-chart-line"></i>
            Expense Reports
        </h1>

        <a href="total_expense.php" class="add-btn">
            <i class="fa-solid fa-plus"></i>
            Add Expense
        </a>

    </div>

    <div class="summary">
        <p>Total Hostel Expense</p>
        <h2>
            Rs. <?php echo number_format($total['total'] ?? 0); ?>
        </h2>
    </div>

    <div class="table-card">

        <table>

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Expense Type</th>
                    <th>Month</th>
                    <th>Amount</th>
                    <th>Expense Date</th>
                    <th>Description</th>
                    <th>Created</th>
                </tr>
            </thead>

            <tbody>

            <?php

            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    $class = strtolower($row['expense_type']);
            ?>

            <tr>

                <td><?php echo $row['id']; ?></td>

                <td>
                    <span class="badge <?php echo $class; ?>">
                        <?php echo htmlspecialchars($row['expense_type']); ?>
                    </span>
                </td>

                <td><?php echo htmlspecialchars($row['expense_month']); ?></td>

                <td>
                    Rs. <?php echo number_format($row['expense_amount']); ?>
                </td>

                <td><?php echo date('d M Y',strtotime($row['expense_date'])); ?></td>

                <td>
                    <?php echo htmlspecialchars($row['description']); ?>
                </td>

                <td>
                    <?php echo date('d M Y',strtotime($row['created_at'])); ?>
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
                        No Expense Records Found
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
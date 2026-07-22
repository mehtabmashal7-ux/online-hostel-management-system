<?php
include 'connection.php';

$message = '';

if(isset($_POST['add_expense']))
{
    $expense_type = mysqli_real_escape_string($conn,$_POST['expense_type']);
    $expense_month = mysqli_real_escape_string($conn,$_POST['expense_month']);
    $expense_amount = mysqli_real_escape_string($conn,$_POST['expense_amount']);
    $expense_date = mysqli_real_escape_string($conn,$_POST['expense_date']);
    $description = mysqli_real_escape_string($conn,$_POST['description']);

    $query = "INSERT INTO expense
    (expense_type,expense_month,expense_amount,expense_date,description)
    VALUES
    ('$expense_type','$expense_month','$expense_amount','$expense_date','$description')";

    if(mysqli_query($conn,$query))
    {
        $message = "Expense Added Successfully";
    }
    else
    {
        $message = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Total Expense</title>

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

.card{
width:100%;
max-width:800px;
background:#111827;
border-radius:18px;
padding:30px;
border:1px solid rgba(255,255,255,.08);
box-shadow:0 20px 40px rgba(0,0,0,.3);
}

.header{
display:flex;
align-items:center;
gap:15px;
margin-bottom:25px;
}

.icon{
width:55px;
height:55px;
background:#2563eb;
border-radius:12px;
display:flex;
align-items:center;
justify-content:center;
color:white;
font-size:22px;
}

.header h2{
color:white;
margin-bottom:5px;
}

.header p{
color:#94a3b8;
font-size:14px;
}

.success{
background:#16a34a;
color:white;
padding:12px;
border-radius:10px;
margin-bottom:20px;
}

.row{
display:flex;
gap:15px;
margin-bottom:15px;
}

.input-box{
flex:1;
}

label{
display:block;
margin-bottom:6px;
color:#cbd5e1;
font-size:14px;
}

input,
select,
textarea{
width:100%;
padding:12px;
border:none;
border-radius:10px;
background:#1f2937;
color:white;
}

textarea{
height:100px;
resize:none;
}

input:focus,
select:focus,
textarea:focus{
outline:2px solid #3b82f6;
}

.btn{
width:100%;
padding:14px;
background:#2563eb;
border:none;
border-radius:10px;
color:white;
font-size:15px;
font-weight:600;
cursor:pointer;
}

.btn:hover{
background:#1d4ed8;
}

.back{
display:inline-block;
margin-top:15px;
text-decoration:none;
color:#94a3b8;
}

.back:hover{
color:white;
}

@media(max-width:768px){

.row{
flex-direction:column;
}

}

</style>
</head>
<body>

<div class="card">

<div class="header">

<div class="icon">
<i class="fa-solid fa-money-bill-wave"></i>
</div>

<div>
<h2>Add Hostel Expense</h2>
<p>Manage hostel monthly expenses</p>
</div>

</div>

<?php
if($message!='')
{
echo "<div class='success'>$message</div>";
}
?>

<form method="POST">

<div class="row">

<div class="input-box">
<label>Expense Type</label>
<select name="expense_type" required>
<option value="">Select Expense</option>
<option>Mess</option>
<option>Electricity</option>
<option>Gas</option>
<option>Internet</option>
<option>Water</option>
<option>Salary</option>
<option>Maintenance</option>
<option>Other</option>
</select>
</div>

<div class="input-box">
<label>Month</label>
<select name="expense_month" required>
<option>January</option>
<option>February</option>
<option>March</option>
<option>April</option>
<option>May</option>
<option>June</option>
<option>July</option>
<option>August</option>
<option>September</option>
<option>October</option>
<option>November</option>
<option>December</option>
</select>
</div>

</div>

<div class="row">

<div class="input-box">
<label>Amount (Rs)</label>
<input type="number" name="expense_amount" required>
</div>

<div class="input-box">
<label>Expense Date</label>
<input type="date" name="expense_date" required>
</div>

</div>

<div class="input-box" style="margin-bottom:15px;">
<label>Description</label>
<textarea name="description"></textarea>
</div>

<button type="submit" name="add_expense" class="btn">
<i class="fa-solid fa-plus"></i>
Add Expense
</button>

</form>

<a href="admindashboard.php" class="back">
<i class="fa-solid fa-arrow-left"></i>
Back to Dashboard
</a>

</div>

</body>
</html>
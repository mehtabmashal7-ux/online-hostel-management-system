<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

$admin = $_SESSION['admin'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Dashboard</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:"Segoe UI",sans-serif}
body{background:#0b1220;color:#fff}

/* Sidebar */
.sidebar{
position:fixed;left:0;top:0;width:270px;height:100vh;
background:linear-gradient(180deg,#0f172a,#0b1220);
padding:20px;border-right:1px solid rgba(255,255,255,.08);
overflow-y:auto;
}

.logo{
text-align:center;
font-size:20px;
font-weight:700;
padding:12px;
border-radius:10px;
background:rgba(245,158,11,.1);
color:#f59e0b;
margin-bottom:25px;
}

.menu-item{margin-bottom:8px}

.menu-btn{
display:flex;
justify-content:space-between;
align-items:center;
padding:12px 14px;
border-radius:10px;
cursor:pointer;
transition:.3s;
color:#cbd5e1;
}

.menu-btn:hover{
background:rgba(245,158,11,.12);
}

.left{
display:flex;
align-items:center;
gap:12px;
}

.icon{
width:34px;
height:34px;
display:flex;
align-items:center;
justify-content:center;
background:rgba(245,158,11,.12);
border-radius:8px;
color:#f59e0b;
}

.arrow{transition:.3s}

.submenu{
display:none;
margin-left:20px;
}

.submenu a{
display:block;
padding:10px;
margin:4px 0;
text-decoration:none;
color:#94a3b8;
border-radius:8px;
font-size:13px;
}

.submenu a:hover{
background:rgba(245,158,11,.12);
color:#fff;
}

.menu-item.active .submenu{display:block}
.menu-item.active .arrow{transform:rotate(180deg)}

/* Header */
.header{
margin-left:270px;
height:70px;
display:flex;
justify-content:space-between;
align-items:center;
padding:0 25px;
background:rgba(255,255,255,.03);
border-bottom:1px solid rgba(255,255,255,.08);
}

.title{
font-size:22px;
font-weight:600;
}

.admin-box{
display:flex;
align-items:center;
gap:10px;
padding:8px 15px;
border-radius:30px;
background:rgba(245,158,11,.12);
}

.avatar{
width:35px;
height:35px;
border-radius:50%;
display:flex;
align-items:center;
justify-content:center;
background:linear-gradient(135deg,#f59e0b,#ef4444);
font-weight:bold;
}

.logout{
padding:10px 16px;
background:#ef4444;
color:white;
text-decoration:none;
border-radius:8px;
margin-left:10px;
}

/* Content */
.content{
margin-left:270px;
padding:30px;
}

.grid{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(240px,1fr));
gap:20px;
}

.card{
height:180px;
border-radius:16px;
padding:20px;
position:relative;
overflow:hidden;
display:flex;
flex-direction:column;
justify-content:flex-end;
background-size:cover;
background-position:center;
transition:.4s;
text-decoration:none;
color:white;
}

.card::before{
content:"";
position:absolute;
inset:0;
background:linear-gradient(to top,rgba(0,0,0,.85),rgba(0,0,0,.2));
}

.card>*{
position:relative;
z-index:2;
}

.card i{
font-size:22px;
color:#f59e0b;
margin-bottom:6px;
}

.card:hover{
transform:translateY(-8px);
box-shadow:0 20px 40px rgba(0,0,0,.4);
}

.card p{
font-size:13px;
color:#cbd5e1;
margin-top:5px;
}
</style>
</head>
<body>

<div class="sidebar">
    <div class="logo">HOSTEL ADMIN</div>

    <div class="menu-item">
        <div class="menu-btn" onclick="toggleMenu(this)">
            <div class="left"><i class="fa-solid fa-bed icon"></i><span>Rooms</span></div>
            <i class="fa-solid fa-chevron-down arrow"></i>
        </div>
        <div class="submenu">
            <a href="rooms.php">Add Rooms</a>
            <a href="room_records.php">Room Records</a>
        </div>
    </div>

    <div class="menu-item">
        <div class="menu-btn" onclick="toggleMenu(this)">
            <div class="left"><i class="fa-solid fa-sack-dollar icon"></i><span>Total Expense</span></div>
            <i class="fa-solid fa-chevron-down arrow"></i>
        </div>
        <div class="submenu">
            <a href="total_expense.php"> Add Expense </a>
            <a href="expense_reports.php">Expense Records</a>
        </div>
    </div>
    <div class="menu-item">
        <div class="menu-btn" onclick="toggleMenu(this)">
            <div class="left"><i class="fa-solid fa-user-graduate icon"></i><span>Student Management</span></div>
            <i class="fa-solid fa-chevron-down arrow"></i>
        </div>
        <div class="submenu">
            <a href="student_management.php">Students</a>
            <a href="student_records.php">Student Records</a>
        </div>
    </div>

    <div class="menu-item">
        <div class="menu-btn" onclick="toggleMenu(this)">
            <div class="left"><i class="fa-solid fa-money-bill-transfer icon"></i><span>Fare + Expense</span></div>
            <i class="fa-solid fa-chevron-down arrow"></i>
        </div>
        <div class="submenu">
            <a href="fare_expense.php">Fare Details</a>
            <a href="payment_records.php">Payment Records</a>
        </div>
    </div>
</div>

<div class="header">
    <div class="title">Admin Dashboard</div>

    <div style="display:flex;align-items:center;">
        <div class="admin-box">
            <div class="avatar"><?php echo strtoupper($admin[0]); ?></div>
            <span><?php echo htmlspecialchars($admin); ?></span>
        </div>
        <a class="logout" href="logout.php">Logout</a>
    </div>
</div>

<div class="content">
    <div class="grid">

        <a href="rooms.php" class="card" style="background-image:url('https://images.unsplash.com/photo-1527030280862-64139fba04ca?auto=format&fit=crop&w=1200&q=80');">
            <i class="fa-solid fa-bed"></i>
            <h3>Rooms</h3>
            <p>Manage hostel room availability and occupancy.</p>
        </a>

        <a href="total_expense.php" class="card" style="background-image:url('https://images.unsplash.com/photo-1554224155-1696413565d3?auto=format&fit=crop&w=1200&q=80');">
            <i class="fa-solid fa-sack-dollar"></i>
            <h3>Total Expense</h3>
            <p>Monitor hostel expenses and reports.</p>
        </a>

        <a href="rooms.php" class="card" style="background-image:url('https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=1200&q=80');">
            <i class="fa-solid fa-building"></i>
            <h3>Room Management</h3>
            <p>Create, update and maintain room records.</p>
        </a>

        <a href="student_management.php" class="card" style="background-image:url('https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=1200&q=80');">
            <i class="fa-solid fa-user-graduate"></i>
            <h3>Student Management</h3>
            <p>Manage student profiles and allocations.</p>
        </a>

        <a href="fare_expense.php" class="card" style="background-image:url('https://images.unsplash.com/photo-1450101499163-c8848c66ca85?auto=format&fit=crop&w=1200&q=80');">
            <i class="fa-solid fa-money-bill-transfer"></i>
            <h3>Fare + Expense</h3>
            <p>Handle fee payments and additional charges.</p>
        </a>

    </div>
</div>

<script>
function toggleMenu(element){
    element.parentElement.classList.toggle('active');
}
</script>

</body>
</html>

<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>User Dashboard</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
* {
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family: "Segoe UI", sans-serif;
}

body {
    background:#0f172a;
    color:#fff;
}

/* SIDEBAR */
.sidebar {
    position: fixed;
    left: 0;
    top: 0;
    width: 270px;
    height: 100%;
    background: linear-gradient(180deg, #0b1220, #0f172a);
    padding: 20px;
    border-right: 1px solid rgba(255,255,255,0.06);
    display: flex;
    flex-direction: column;
}

/* LOGO */
.logo {
    font-size: 18px;
    font-weight: 700;
    color: #38bdf8;
    letter-spacing: 1px;
    margin-bottom: 30px;
    padding: 10px 12px;
    border-radius: 10px;
    background: rgba(56,189,248,0.08);
    text-align: center;
}

/* NAV LINKS */
.nav a {
    position: relative;
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 14px;
    margin: 6px 0;
    color: #cbd5e1;
    text-decoration: none;
    border-radius: 10px;
    font-size: 14px;
    transition: all 0.3s ease;
    overflow: hidden;
}

/* ICON BOX */
.nav a i {
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(56,189,248,0.12);
    border-radius: 8px;
    color: #38bdf8;
    font-size: 14px;
    transition: 0.3s;
}

/* HOVER EFFECT */
.nav a:hover {
    background: rgba(56,189,248,0.10);
    color: #ffffff;
    transform: translateX(6px);
}

.nav a:hover i {
    background: #38bdf8;
    color: #0f172a;
}

/* ACTIVE STYLE (optional use class="active") */
.nav a.active {
    background: rgba(56,189,248,0.18);
    color: white;
    border-left: 3px solid #38bdf8;
}

/* SUBTLE GLOW LINE */
.nav a::before {
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 3px;
    background: transparent;
    transition: 0.3s;
}

.nav a:hover::before {
    background: #38bdf8;
}

/* HEADER */
.header {
    margin-left:260px;
    height:70px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:0 25px;
    background: rgba(255,255,255,0.03);
    backdrop-filter: blur(10px);
    border-bottom:1px solid rgba(255,255,255,0.08);
}

.title {
    font-size:18px;
    font-weight:600;
    color:#e2e8f0;
}

.user {
    display:flex;
    align-items:center;
    gap:10px;
    background: rgba(56,189,248,0.1);
    padding:8px 14px;
    border-radius:30px;
    border:1px solid rgba(56,189,248,0.2);
}

.avatar {
    width:32px;
    height:32px;
    border-radius:50%;
    background: linear-gradient(135deg,#38bdf8,#6366f1);
    display:flex;
    align-items:center;
    justify-content:center;
    font-weight:bold;
}

/* CONTENT */
.content {
    margin-left:260px;
    padding:30px;
}

/* HERO */
.hero {
    background: linear-gradient(135deg,#1e3a8a,#0ea5e9);
    padding:25px;
    border-radius:16px;
    margin-bottom:25px;
    box-shadow:0 10px 30px rgba(0,0,0,0.3);
}

.hero h2 {
    font-size:22px;
}

.hero p {
    margin-top:5px;
    opacity:0.9;
}

/* CARDS */
.grid {
    display:grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap:20px;
}

.card {
    position: relative;
    height: 160px;
    border-radius: 16px;
    overflow: hidden;
    padding: 20px;
    color: white;
    display:flex;
    flex-direction:column;
    justify-content:flex-end;
    transition:0.4s;
    background-size: cover;
    background-position: center;
    border:1px solid rgba(255,255,255,0.08);
}

.card::before {
    content:"";
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background: linear-gradient(to top, rgba(0,0,0,0.75), rgba(0,0,0,0.2));
    z-index:1;
}

.card i, .card h3, .card p {
    position:relative;
    z-index:2;
}

.card i {
    font-size:22px;
    color:#38bdf8;
    margin-bottom:5px;
}

.card h3 {
    font-size:16px;
    margin-bottom:5px;
}

.card p {
    font-size:12px;
    color:#cbd5e1;
}

.card:hover {
    transform: translateY(-10px) scale(1.02);
    box-shadow: 0 15px 35px rgba(0,0,0,0.4);
}
</style>

</head>
<body>

<div class="sidebar">

    <div class="logo">HOSTEL SYSTEM</div>

    <div class="nav">
        <a href="room_records.php"><i class="fa-solid fa-bed"></i> Rooms</a>
        <a href="book.php"><i class="fa-solid fa-door-open"></i> Book Room</a>
        <a href="rent.php"><i class="fa-solid fa-receipt"></i> Rent Status</a>
    </div>

</div>
<!-- HEADER -->
<div class="header">
    <div class="title">feel like home</div>

    <div class="user">
        <div class="avatar">
            <?php echo strtoupper($username[0]); ?>
        </div>
        <span><?php echo htmlspecialchars($username); ?></span>
    </div>
</div>

<!-- CONTENT -->
<div class="content">

    <!-- HERO -->
    <div class="hero">
        <h2>Welcome back, <?php echo htmlspecialchars($username); ?> 👋</h2>
        <p>Manage your hostel rooms, bookings and payments in one place.</p>
    </div>
<div class="grid">

    <div class="card" style="background-image:url('https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?auto=format&fit=crop&w=1200&q=80');"
        <i class="fa-solid fa-bed"></i>
        <h3>Rooms</h3>
        <p>Explore available rooms with full details and capacity.</p>
    </div>

    <div class="card" style="background-image:url('https://images.unsplash.com/photo-1528909514045-2fa4ac7a08ba?auto=format&fit=crop&w=1200&q=80');"
        <i class="fa-solid fa-door-open"></i>
        <h3>Book Room</h3>
        <p>Reserve your room instantly with confirmation system.</p>
    </div>

    <div class="card" style="background-image:url('https://images.unsplash.com/photo-1554224155-6726b3ff858f?auto=format&fit=crop&w=1200&q=80');"
        <i class="fa-solid fa-file-invoice-dollar"></i>
        <h3>Rent Status</h3>
        <p>Check your monthly rent payment history and dues.</p>
    </div>

    <div class="card" style="background-image:url('https://images.unsplash.com/photo-1554224154-22dec7ec8818?auto=format&fit=crop&w=1200&q=80');"
        <i class="fa-solid fa-wallet"></i>
        <h3>Other Charges</h3>
        <p>Electricity, maintenance and extra service charges.</p>
    </div>

</div>

</div>

</body>
</html>
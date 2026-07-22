<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Online Hostel Management System</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<style>
/* =========================
   GLOBAL STYLES
========================= */

body{
    font-family:Segoe UI,Arial,sans-serif;
    background:#f5f7fc;
    color:#1e293b;
    overflow-x:hidden;
}

html{
    scroll-behavior:smooth;
}

/* =========================
   NAVBAR
========================= */

.navbar{
    background:rgba(255,255,255,.95);
    backdrop-filter:blur(12px);
    box-shadow:0 4px 25px rgba(0,0,0,.08);
    padding:12px 0;
}

.navbar-brand{
    font-weight:700;
    font-size:1.4rem;
}

.nav-link{
    font-weight:500;
    transition:.3s;
}

.nav-link:hover{
    color:#2563eb !important;
}

/* =========================
   HERO SECTION
========================= */

.hero{
    padding:120px 0 80px;
    background:linear-gradient(
        135deg,
        #eef4ff 0%,
        #ffffff 60%,
        #f5f3ff 100%
    );
}

.gradient{
    background:linear-gradient(
        90deg,
        #2563eb,
        #7c3aed
    );
    -webkit-background-clip:text;
    -webkit-text-fill-color:transparent;
}

.hero h1{
    font-weight:800;
    line-height:1.2;
}

.hero-img{
    width:100%;
    border-radius:24px;
    box-shadow:0 20px 50px rgba(0,0,0,.12);
}

/* =========================
   BUTTONS
========================= */

.btn-main{
    background:linear-gradient(
        90deg,
        #2563eb,
        #7c3aed
    );
    border:none;
    color:#fff;
    border-radius:50px;
    padding:14px 30px;
    font-weight:600;
    transition:.3s;
}

.btn-main:hover{
    transform:translateY(-3px);
    box-shadow:0 12px 25px rgba(37,99,235,.25);
    color:white;
}

/* =========================
   SECTIONS
========================= */

.section{
    padding:90px 0;
}

.section-title{
    font-weight:800;
    margin-bottom:15px;
}

.section-subtitle{
    color:#64748b;
}

/* =========================
   GENERAL CARDS
========================= */

.cardx{
    background:#fff;
    border:none;
    border-radius:24px;
    box-shadow:0 10px 30px rgba(0,0,0,.08);
    padding:25px;
    height:100%;
    transition:.35s;
}

.cardx:hover{
    transform:translateY(-8px);
    box-shadow:0 18px 40px rgba(0,0,0,.12);
}

/* =========================
   FEATURE CARDS
========================= */

.feature-img{
    width:100%;
    height:180px;
    object-fit:cover;
    border-radius:16px;
    margin-bottom:18px;
}

.feature-card h4{
    font-weight:700;
    margin-bottom:10px;
}

.feature-card p{
    color:#64748b;
}

.icon-big{
    font-size:2rem;
    color:#2563eb;
}

.stats-card{
    background:#fff;
    border-radius:24px;
    padding:35px 25px;
    text-align:center;
    position:relative;
    overflow:hidden;
    box-shadow:0 15px 40px rgba(0,0,0,.08);
    transition:all .4s ease;
    height:100%;
}

.stats-card::before{
    content:"";
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:5px;
    background:linear-gradient(
        90deg,
        #2563eb,
        #7c3aed
    );
}

.stats-card:hover{
    transform:translateY(-10px);
    box-shadow:0 25px 50px rgba(37,99,235,.15);
}

.stats-icon{
    width:80px;
    height:80px;
    margin:auto;
    margin-bottom:20px;
    border-radius:50%;
    background:linear-gradient(
        135deg,
        #2563eb,
        #7c3aed
    );
    display:flex;
    align-items:center;
    justify-content:center;
}

.stats-icon i{
    color:#fff;
    font-size:32px;
}

.stats-card h2{
    font-size:3rem;
    font-weight:800;
    margin-bottom:8px;
    background:linear-gradient(
        90deg,
        #2563eb,
        #7c3aed
    );
    -webkit-background-clip:text;
    -webkit-text-fill-color:transparent;
}

.stats-card h5{
    font-weight:700;
    margin-bottom:12px;
    color:#1e293b;
}

.stats-card p{
    color:#64748b;
    font-size:14px;
    line-height:1.7;
    margin:0;
}

/* =========================
   ABOUT SECTION
========================= */

.about-img{
    width:100%;
    border-radius:24px;
    box-shadow:0 20px 50px rgba(0,0,0,.12);
}

.about-list i{
    color:#22c55e;
    margin-right:10px;
}

/* =========================
   CONTACT FORM
========================= */

.form-control{
    border-radius:12px;
    padding:12px 15px;
    border:1px solid #dbe2ea;
}

.form-control:focus{
    box-shadow:none;
    border-color:#2563eb;
}

/* =========================
   FOOTER
========================= */

.footer{
    background:#0f172a;
    color:#fff;
    padding:60px 0 20px;
}

.footer h5{
    margin-bottom:20px;
    font-weight:700;
}

.footer p{
    color:#cbd5e1;
}

.footer a{
    color:#cbd5e1;
    text-decoration:none;
    transition:.3s;
}

.footer a:hover{
    color:#60a5fa;
}

.social-icons i{
    font-size:20px;
    margin-right:15px;
    cursor:pointer;
    transition:.3s;
}

.social-icons i:hover{
    color:#60a5fa;
}

/* =========================
   RESPONSIVE
========================= */

@media(max-width:768px){

.hero{
    text-align:center;
    padding:100px 0 60px;
}

.hero h1{
    font-size:2.4rem;
}

.section{
    padding:70px 0;
}

.stats-card h2{
    font-size:2.2rem;
}

.feature-img{
    height:160px;
}

}
</style>
</head>
<body>

<nav class="navbar navbar-expand-lg fixed-top">
<div class="container">
<a class="navbar-brand fw-bold"><i class="bi bi-buildings-fill"></i> OHMS</a>
<div class="d-flex align-items-center gap-2">
    <a href="#features" class="me-3 text-decoration-none">Features</a>
    <a href="#about" class="me-3 text-decoration-none">About</a>

    <!-- Register Button -->
    <a href="register.php" class="btn btn-outline-primary px-4 rounded-pill fw-semibold">
        Register
    </a>

    <!-- Login Button -->
    <a href="login.php" class="btn btn-main">
        Login
    </a>
</div>
</div>
</nav>

<section class="hero">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-6">
<span class="badge bg-primary mb-3">Smart Hostel Solution</span>
<h1 class="display-4 fw-bold">Online <span class="gradient">Hostel Management</span> System</h1>
<p class="lead my-4">Manage students, rooms, fees, attendance, complaints and reports from a single professional platform.</p>
<a href="login.php" class="btn btn-main">Login to System</a>
</div>
<div class="col-lg-6">
<img class="hero-img" src="https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?w=1200">
</div>
</div>
</div>
</section>
<h2 class="section-title text-center">
    Trusted by Modern Hostels
</h2>

<!-- Statistics Section -->
<section class="section py-5">
    <div class="container">

        <div class="text-center mb-3">
            <span class="badge bg-primary px-4 py-2 rounded-pill">
                Performance Overview
            </span>
        </div>

        <div class="text-center mb-5">
            <h2 class="fw-bold display-6">
                Trusted by Modern Hostels
            </h2>

            <p class="text-muted mx-auto" style="max-width:700px;">
                Streamlining hostel operations through smart room allocation,
                student management, fee tracking, and real-time reporting.
            </p>
        </div>

        <div class="row g-4">

            <!-- Students -->
            <div class="col-lg-3 col-md-6">
                <div class="stats-card">
                    <div class="stats-icon">
                        <i class="bi bi-people-fill"></i>
                    </div>

                    <h2>10K+</h2>

                    <h5>Students Managed</h5>

                    <p>
                        Securely managing student records, accommodation
                        details, and hostel activities.
                    </p>
                </div>
            </div>

            <!-- Rooms -->
            <div class="col-lg-3 col-md-6">
                <div class="stats-card">
                    <div class="stats-icon">
                        <i class="bi bi-house-door-fill"></i>
                    </div>

                    <h2>500+</h2>

                    <h5>Rooms Allocated</h5>

                    <p>
                        Efficient room allocation, occupancy tracking,
                        and vacancy management.
                    </p>
                </div>
            </div>

            <!-- Hostels -->
            <div class="col-lg-3 col-md-6">
                <div class="stats-card">
                    <div class="stats-icon">
                        <i class="bi bi-buildings-fill"></i>
                    </div>

                    <h2>100+</h2>

                    <h5>Hostels Supported</h5>

                    <p>
                        Supporting institutions with centralized
                        hostel administration solutions.
                    </p>
                </div>
            </div>

            <!-- Efficiency -->
            <div class="col-lg-3 col-md-6">
                <div class="stats-card">
                    <div class="stats-icon">
                        <i class="bi bi-graph-up-arrow"></i>
                    </div>

                    <h2>99%</h2>

                    <h5>Operational Efficiency</h5>

                    <p>
                        Reducing manual work through automation
                        and real-time reporting tools.
                    </p>
                </div>
            </div>

        </div>

    </div>
</section>

<section id="features" class="section bg-white">
<div class="container">
<div class="text-center mb-5">
<h2 class="fw-bold">Core Features</h2>
<p class="text-muted">Everything required to manage a hostel efficiently.</p>
</div>

<div class="row g-4">
<div class="col-md-4"><div class="cardx"><img class="feature-img" src="https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?w=600"><h4><i class="bi bi-house-door-fill text-primary"></i> Room Management</h4><p>Allocate rooms, track occupancy and manage hostel capacity.</p></div></div>
<div class="col-md-4"><div class="cardx"><img class="feature-img" src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=600"><h4><i class="bi bi-people-fill text-primary"></i> Student Records</h4><p>Maintain complete student profiles and hostel history.</p></div></div>
<div class="col-md-4"><div class="cardx"><img class="feature-img" src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=600"><h4><i class="bi bi-cash-coin text-primary"></i> Fee Management</h4><p>Track payments, dues and financial reports.</p></div></div>
<div class="col-md-4"><div class="cardx"><img class="feature-img" src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=600"><h4><i class="bi bi-bar-chart-fill text-primary"></i> Reports</h4><p>Generate detailed hostel performance reports.</p></div></div>
<div class="col-md-4"><div class="cardx"><img class="feature-img" src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=600"><h4><i class="bi bi-bell-fill text-primary"></i> Notifications</h4><p>Send notices, alerts and announcements instantly.</p></div></div>
<div class="col-md-4"><div class="cardx"><img class="feature-img" src="https://images.unsplash.com/photo-1516321497487-e288fb19713f?w=600"><h4><i class="bi bi-shield-lock-fill text-primary"></i> Security</h4><p>Role-based access control and secure data protection.</p></div></div>
</div>
</div>
</section>

<section id="about" class="section">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-6">
<img class="about-img" src="https://images.unsplash.com/photo-1555854877-bab0e564b8d5?w=1200">
</div>
<div class="col-lg-6">
<h2 class="fw-bold mb-4"><i class="bi bi-info-circle-fill text-primary"></i> About Our System</h2>
<p>The Online Hostel Management System simplifies hostel administration by digitizing student registration, room allocation, fee collection and reporting.</p>
<div class="mt-4">
<p><i class="bi bi-check-circle-fill text-success"></i> Easy Student Registration</p>
<p><i class="bi bi-check-circle-fill text-success"></i> Automated Fee Collection</p>
<p><i class="bi bi-check-circle-fill text-success"></i> Complaint Management</p>
<p><i class="bi bi-check-circle-fill text-success"></i> Real-Time Analytics & Reports</p>
</div>
</div>
</div>
</div>
</section>

<section id="contact" class="section bg-white">
<div class="container">
<div class="cardx p-5">
<h2 class="text-center mb-4"><i class="bi bi-envelope-fill"></i> Contact Us</h2>
<div class="row">
<div class="col-md-6">
<input class="form-control mb-3" placeholder="Your Name">
<input class="form-control mb-3" placeholder="Email Address">
<input class="form-control mb-3" placeholder="Phone Number">
</div>
<div class="col-md-6">
<textarea class="form-control" rows="6" placeholder="Write your message..."></textarea>
</div>
</div>
<div class="text-center mt-4">
<button class="btn btn-main">Send Message</button>
</div>
</div>
</div>
</section>

<footer class="footer">
<div class="container">
<div class="row">
<div class="col-md-4">
<h5><i class="bi bi-buildings-fill"></i> Online Hostel Management System</h5>
<p>Professional software solution for modern hostel administration.</p>
</div>
<div class="col-md-4">
<h5><i class="bi bi-link-45deg"></i> Quick Links</h5>
<p><a href="#">Home</a><br><a href="#features">Features</a><br><a href="#about">About</a><br><a href="#contact">Contact</a></p>
</div>
<div class="col-md-4">
<h5><i class="bi bi-telephone-fill"></i> Contact Information</h5>
<p><i class="bi bi-envelope-fill"></i> info@hostelms.com<br>
<i class="bi bi-geo-alt-fill"></i> Pakistan<br>
<i class="bi bi-telephone-fill"></i> +92 XXX XXXXXXX</p>
</div>
</div>
<hr>
<p class="text-center">© 2026 Online Hostel Management System. All Rights Reserved.</p>
</div>
</footer>

</body>
</html>

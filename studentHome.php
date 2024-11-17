<?php 

    session_start();

    if(!isset($_SESSION['username']) || $_SESSION['usertype']=='admin'){
        header("location:login.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/student.css">
</head>
<body>
    <!-- Header -->
    <header class="bg-dark text-white p-3">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <img src="images/logo1.png" alt="University Logo" class="h-70">
            </div>
            <div>
                <a href="#" class="text-white me-4">My Dashboard</a>
                
                <img src="https://via.placeholder.com/40" alt="Profile Icon" class="rounded-circle">
            </div>
        </div>
    </header>

    <!-- Greeting Section -->
    <section class="bg-danger text-white py-5">
        <div class="container text-center">
            <h1>👋 Hello! Karunesh</h1>
            <button class="btn btn-light mt-3">Click Here to Start Your Application</button>
        </div>
    </section>

    <!-- Progress Bar -->
    <div class="progress-bar-container bg-dark py-3">
        <div class="container">
            <div class="d-flex justify-content-between text-white">
                <div class="step active">Submit Application Form</div>
                <div class="step">Acceptance Letter Pending</div>
            </div>
        </div>
    </div>

    <!-- Application Section -->
    <section class="text-center py-5">
        <div class="container">
            <img src="https://via.placeholder.com/300" alt="No Applications Found" class="img-fluid">
            <p class="mt-4">No Applications Found!</p>
            
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

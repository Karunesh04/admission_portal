<?php

session_start();

if (!isset($_SESSION['username']) || $_SESSION['usertype'] == 'student') {
    header("location:login.php");
}

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);

    if (isset($_POST['approve'])) {
        $conn->query("UPDATE admission_requests SET status = 'Approved' WHERE id = $id");
    } elseif (isset($_POST['reject'])) {
        $conn->query("UPDATE admission_requests SET status = 'Rejected' WHERE id = $id");
    }

    header("Location: index.html");
    exit();
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin.css">
    <title>Admin Dashboard</title>
</head>

<body>
    <div class="sidebar">
        <h2>Admission Portal</h2>
        <ul>
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Admissions</a></li>
            <li><a href="#">Reports</a></li>
        </ul>
    </div>
    <div class="main-content">
        <header>
            <div class="header-title">Dashboard</div>
            <div class="header-profile">
                <span>Admin</span>
                <div class="dropdown">
                    <button class="dropbtn">Profile</button>
                    <div class="dropdown-content">
                        <a href="#">Profile</a>
                        <a href="#">Change Password</a>
                        <a href="#">Logout</a>
                    </div>
                </div>
            </div>
        </header>
        <div class="dashboard-content">
            <div class="card total-requests">Total Requests: <span>6</span></div>
            <div class="card approved-requests">Approved: <span>3</span></div>
            <div class="card pending-requests">Pending: <span>2</span></div>
            <div class="card rejected-requests">Rejected: <span>1</span></div>
        </div>
        <table class="requests-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Marks</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'db.php';
                $result = $conn->query("SELECT * FROM admission_requests");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['marks']}</td>
                            <td>{$row['status']}</td>
                            <td>
                                <form action='process.php' method='POST'>
                                    <input type='hidden' name='id' value='{$row['id']}'>
                                    <button name='approve' class='approve'>Approve</button>
                                    <button name='reject' class='reject'>Reject</button>
                                </form>
                            </td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
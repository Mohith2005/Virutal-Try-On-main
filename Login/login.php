<?php
$conn = mysqli_connect("localhost", "root", "", "flipzone");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    $username = $_REQUEST['b'];
    $passcode = $_REQUEST['d'];
    // Step 3: Execute the Query
    $sql = "SELECT * FROM users WHERE username='$username' AND password ='$passcode'";
    $result = $conn->query($sql);   
    if ($result->num_rows > 0) {
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['passcode'] = $passcode;
            header("Location: ../Home/home.html");
            exit;
    }else {
        echo "<script>alert('You are Not Registered Kindly Register then login')</script>";
    }
$conn->close();
?>
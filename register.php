<?php
include 'config.php'; // DB connection

if (isset($_POST['register'])) {

    $name  = $_POST['name'];
    $email = $_POST['email'];
    $pass  = $_POST['password'];
    $phone = $_POST['phone'];
    $sex   = $_POST['sex'];
    $address = $_POST['address'];

    // Combine DOB
    $dob = $_POST['day'] . "-" . $_POST['month'] . "-" . $_POST['year'];

    // Languages
    if (!empty($_POST['languages'])) {
        $languages = implode(", ", $_POST['languages']);
    } else {
        $languages = "";
    }

    // Hash password (GOOD PRACTICE ✅)
    $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

    // Insert query
    $sql = "INSERT INTO users 
            (name, email, password, phone, sex, dob, languages, address) 
            VALUES 
            ('$name', '$email', '$hashedPass', '$phone', '$sex', '$dob', '$languages', '$address')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('Registration Successful!');
                window.location.href='login.html';
              </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<?php      
    include('connection.php');  
    $username = $_POST['user'];  
    $password = $_POST['pass'];  
    
    // to prevent from mysqli injection  
    $username = stripcslashes($username);  
    $password = stripcslashes($password);  
    $username = mysqli_real_escape_string($con, $username);  
    $password = mysqli_real_escape_string($con, $password);  
    
    $sql = "select * from login where username = '$username' and password = '$password'";  
    $result = mysqli_query($con, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);  
    
    if ($count == 1) {  
        echo "<h1><center> Login successful </center></h1>";  
        
        // Replace this with your actual username
        $username = "haris";

        // Redirect to home.html with the username as a parameter
        header("Location: home.html?username=" . urlencode($username));
        exit(); 
    } else {  
        echo "<h1> Login failed. Invalid username or password.</h1>";  
    }
?>  

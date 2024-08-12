<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
    <title>Zyra parlour</title>

</head>
<body>
<section id="homepage">
    <div class=Homepage>
        <div class=container>
            <div class=topnav>
                
                <a href="#about">About</a>
                <a href="#login">Login</a>
                <a href="#service_page">Service</a>
                <a href="#homepage">Home</a>
    </div>
    <div class="title">
        <p class="zyra">ZYRA 
            <p class="booking">PARLOUR APPOINTMENT BOOKING</p>
    </div>
</div>    
</div>
</section>

        <!-- Service Page -->
<section id="service_page">
<div id="servicepage">
    <table>
        <tr>
            <td><img src="images\fruit_facial.jpg " alt="no-img"></td>
            <td><img src="images\charcoal-img.jpg" alt="no-img"></td>
            <td><img src="images\Manicure-img.jpg" alt="no-img"></td>
        </tr>
        <tr>
            <td><h6> Fruit Facial</h6></td>
            <td><h6>Chorcoal Facial</h6></td>
            <td><h6>Menicure</h6></td>
        </tr>
        <tr>
            <td><img src="images\pedicure_img.jpg" alt="no-img"> </td>
            <td><img src="images\layercut_img.jpg" alt="no-img"> </td>
            <td><img src="images\straighteing.jpg" alt="no-img"> </td>
        </tr>
        <tr>
            <td><h6>Pedicure</td>
            <td><h6>Layered cut</td>
            <td><h6>Straighteing</td>
        </tr>
    </table>
</div>
</section>
    <!-- login page -->
    <section id="login">
        <div>
            <div id = "frm">  
                <h1>Login</h1><br> 
                <form name="f1" action = "appointment.php" onsubmit = "return validation()" method = "POST">  
                
                        <label > Email : </label>
                        <input type = "email" id ="user" name  = "user" placeholder="E-mail "/><br><br>  
                    
                        <label> Password : </label>  
                        <input type = "password" id ="pass" name  = "pass" placeholder="password" />  <br><br>
                        
                        <input class="btn btn-primary" type="submit" value="login" >
                        <a id="register" href="register.php" >Register</a>
                    
                </form>  
            </div>  
            
<?php
session_start();

$host = 'localhost';
$db = 'parlour_manage';
$user = 'root'; // Your database username -->
$pass = ''; // Your database password -->

//Create a connection
$conn = new mysqli($host, $user, $pass, $db);

//Check connection
if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Retrieve user from database
    $stmt = $conn->prepare("SELECT password FROM login WHERE username = ? and password = ?");
    $stmt->bind_param("ss", $username,$password);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) 
    {
        $stmt->bind_result($password);
        $stmt->fetch();
        
        //Verify password
        $varb=false;
        if ($password='password'&& $username='username') 
        {
            $varb=true;
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $username = $_POST['username'];
            echo "Login successful! Welcome,".$username;
            
        } 
        
    } 
    else if ($password!='password'&& $username!='username') 
        {
            
            echo "Invalid Username and Password";
            
        } 

    $stmt->close();
}

$conn->close();
?>

        <!-- About section -->
<section id="about">
    <table>
        <tr>
        <td id="contact">
            <h2>Contact Us</h2>
                <p>Address: 123 Beauty Street, Tuticorin</p>
                <p>Phone: (123) 456-7890</p>
                <p>Email: zyra@beautyparlour.com</p>
                
        </td> 
        <td id="bussiness-hours">
            <h2>Business Hours</h2>
                <p>Monday to Friday: 9 AM - 8 PM</p>
                <p>Saturday: 10 AM - 6 PM</p>
                <p>Sunday: Closed</p>
        </td>   
        </tr>

    </table>
    <footer id="footer">
        <i class="bi bi-facebook"></i>
        <i class="bi bi-instagram"></i>
        <i class="bi bi-twitter"></i>   
    </footer>
    
    
</section>
</body>
</html>
            
<?php
include('db.php');

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $first_name = $_POST['first-name'];
    $last_name = $_POST['last-name'];
    $gender = $_POST['gender'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $address = $_POST['address'];
    $phone_number = $_POST['phoneNumber'];

    //                                                     database columns
    $sql = "INSERT INTO users(username, password_hash, email, first_name, last_name, gender, address, phone_number )
    VALUES('$username', '$password', '$email', '$first_name', '$last_name', '$gender', '$address', '$phone_number')";

    if($conn->query($sql)===TRUE){
        echo "<script>alert('Registration Successful. Please log in.');</script>";
    } else{
        echo "Error: " .$sql ."<br>". $conn->error;
    }
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="register.css"> 
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form method="post" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" placeholder="Enter Username" name="username" required>

            <label for="email">Email:</label>
            <input type="email" id="email" placeholder="Enter Email" name="email" required>

            <label for="first-name">First Name:</label>
            <input type="text" id="first-name" placeholder="Enter First Name" name="first-name" required>

            <label for="last-name">Last Name:</label>
            <input type="text" id="last-name" placeholder="Enter Last Name" name="last-name" required>

            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="" disabled selected>Select Your Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>

            <label for="password">Password:</label>
            <input type="password" id="password" placeholder="Enter Password" name="password" minlength="8" required>

            <label for="address">Address:</label>
            <select id="address" name="address" required>
                <option value="" disabled selected>Select Your Location</option>
                <option value="Metro Manila">Metro Manila</option>
                <option value="Abra">Abra</option>
                <option value="Apayao">Apayao</option>
                <option value="Benguet">Benguet</option>
                <option value="Ifugao">Ifugao</option>
                <option value="Kalinga">Kalinga</option>
                <option value="Mountain Province">Mountain Province</option>
                <option value="Ilocos Norte">Ilocos Norte</option>
                <option value="Ilocos Sur">Ilocos Sur</option>
                <option value="La Union">La Union</option>
                <option value="Pangasinan">Pangasinan</option>
                <option value="Batanes">Batanes</option>
                <option value="Cagayan">Cagayan</option>
                <option value="Isabela">Isabela</option>
                <option value="Nueva Vizcaya">Nueva Vizcaya</option>
                <option value="Quirino">Quirino</option>
                <option value="Aurora">Aurora</option>
                <option value="Bataan">Bataan</option>
                <option value="Bulacan">Bulacan</option>
                <option value="Nueva Ecija">Nueva Ecija</option>
                <option value="Pampanga">Pampanga</option>
                <option value="Tarlac">Tarlac</option>
                <option value="Zambales">Zambales</option>
                <option value="Batangas">Batangas</option>
                <option value="Cavite">Cavite</option>
                <option value="Laguna">Laguna</option>
                <option value="Quezon">Quezon</option>
                <option value="Rizal">Rizal</option>
                <option value="Marinduque">Marinduque</option>
                <option value="Occidental Mindoro">Occidental Mindoro</option>
                <option value="Oriental Mindoro">Oriental Mindoro</option>
                <option value="Palawan">Palawan</option>
                <option value="Romblon">Romblon</option>
                <option value="Albay">Albay</option>
                <option value="Camarines Norte">Camarines Norte</option>
                <option value="Camarines Sur">Camarines Sur</option>
                <option value="Catanduanes">Catanduanes</option>
                <option value="Masbate">Masbate</option>
                <option value="Sorsogon">Sorsogon</option>
                <option value="Aklan">Aklan</option>
                <option value="Antique">Antique</option>
                <option value="Capiz">Capiz</option>
                <option value="Guimaras">Guimaras</option>
                <option value="Iloilo">Iloilo</option>
                <option value="Negros Occidental">Negros Occidental</option>
                <option value="Bohol">Bohol</option>
                <option value="Cebu">Cebu</option>
                <option value="Negros Oriental">Negros Oriental</option>
                <option value="Siquijor">Siquijor</option>
                <option value="Biliran">Biliran</option>
                <option value="Eastern Samar">Eastern Samar</option>
                <option value="Leyte">Leyte</option>
                <option value="Northern Samar">Northern Samar</option>
                <option value="Samar">Samar</option>
                <option value="Southern Leyte">Southern Leyte</option>
                <option value="Zamboanga del Norte">Zamboanga del Norte</option>
                <option value="Zamboanga del Sur">Zamboanga del Sur</option>
                <option value="Zamboanga Sibugay">Zamboanga Sibugay</option>
                <option value="Bukidnon">Bukidnon</option>
                <option value="Camiguin">Camiguin</option>
                <option value="Lanao del Norte">Lanao del Norte</option>
                <option value="Misamis Occidental">Misamis Occidental</option>
                <option value="Misamis Orienta">Misamis Orienta</option>
                <option value="Davao de Oro">Davao de Oro</option>
                <option value="Davao del Norte">Davao del Norte</option>
                <option value="Davao del Sur">Davao del Sur</option>
                <option value="Davao Occidental">Davao Occidental</option>
                <option value="Davao Oriental">Davao Oriental</option>
                <option value="Cotabato">Cotabato</option>
                <option value="Sarangani">Sarangani</option>
                <option value="South Cotabato">South Cotabato</option>
                <option value="Sultan Kudarat">Sultan Kudarat</option>
                <option value="Agusan del Norte">Agusan del Norte</option>
                <option value="Agusan del Sur">Agusan del Sur</option>
                <option value="Dinagat Islands">Dinagat Islands</option>
                <option value="Surigao del Norte">Surigao del Norte</option>
                <option value="Surigao del Sur">Surigao del Sur</option>
                <option value="Basilan">Basilan</option>
                <option value="Lanao del Sur">Lanao del Sur</option>
                <option value="Maguindanao">Maguindanao</option>
                <option value="Sulu">Sulu</option>
                <option value="Tawi-Tawi">Tawi-Tawi</option>
                <!-- Add more options as needed -->
            </select>

            <label for="phone-number">Phone Number:</label>
            <input type="number" id="phonenumber" placeholder="Enter Phone Number" name="phoneNumber" maxlength="11" oninput="if(this.value.length > 11) this.value = this.value.slice(0, 11);" required>

            <button type="submit" class="reg-btn">Create Account</button>
        </form>
        <p class="login-here">Already have an account?</p>
        <a href="login.php"><button type="button" class="login-btn">Login</button></a>
    </div>
</body>
</html>

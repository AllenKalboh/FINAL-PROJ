<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skincare Profile Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f4;
            color: #333;
            font-family: Arial, sans-serif;
            margin: 0;
        }
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 80px; /* Thin width by default */
            background-color: #fff;
            border-right: 1px solid #ddd;
            padding: 20px 10px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            transition: width 0.3s ease;
            overflow-x: hidden; /* Prevent horizontal scroll */
        }
        .sidebar:hover {
            width: 220px; /* Expanded width on hover */
        }
        .sidebar a {
            color: #333;
            display: flex;
            align-items: center;
            padding: 10px 15px; /* Added right padding for spacing */
            text-decoration: none;
            margin-bottom: 10px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
            box-sizing: border-box; /* Ensure padding and borders are included in the element's total width and height */
        }
        .sidebar a i {
            font-size: 24px;
            margin-right: 15px; /* Ensure consistent spacing */
            transition: opacity 0.3s ease;
        }
        .sidebar a span {
            display: none; /* Hide text by default */
            font-size: 16px;
            white-space: nowrap; /* Prevent text from wrapping */
        }
        .sidebar:hover a span {
            display: inline; /* Show text on hover */
        }
        .sidebar:hover a i {
            opacity: 1; /* Ensure icon remains visible */
        }
        .sidebar a:hover {
            background-color: #f0f0f0;
        }
        .content {
            margin-left: 80px; /* Adjust margin to fit the thin sidebar */
            padding: 20px;
        }
        .profile-header {
            display: flex;
            align-items: center;
            border-bottom: 1px solid #ddd;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }
        .profile-header img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            border: 2px solid #ddd;
        }
        .profile-header h1 {
            margin: 0;
            font-size: 24px;
        }
        .profile-header p {
            margin: 5px 0 0;
            font-size: 16px;
            color: #555;
        }
        .profile-info h2 {
            margin-top: 0;
        }
        .profile-info p {
            line-height: 1.6;
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <a href="#"><i class="fas fa-home"></i><span>Home</span></a>
        <a href="#"><i class="fas fa-box"></i><span>Products</span></a>
        <a href="#"><i class="fas-solid fa-cart-shopping"></i><span>My Orders</span></a>
        <a href="#"><i class="fas fa-cog"></i><span>Settings</span></a>
        <a href="#"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a>
    </div>

    <div class="content">
        <div class="container">
            <div class="profile-header">
                <img src="https://via.placeholder.com/100" alt="Profile Picture">
                <div class="ml-3">
                    <h1>Patrick Allen Skrrrr/h1>
                    <p>User</p>
                </div>
            </div>
            <div class="profile-info">
                <h2>About Me</h2>
                <p> SINIGANG MIX PAMINTA LUYA </p>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter Reset Code</title>
    <link rel="stylesheet" href="enter-code.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
            font-family: 'Poppins', sans-serif;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            border: 2px solid black;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
            font-weight: 600;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            text-align: center;
        }
        .form-group input[type="submit"] {
            background-color: #ccc;
            color: #333;
            border: none;
            cursor: pointer;
            padding: 10px;
            border-radius: 4px;
        }
        .form-group input[type="submit"]:hover {
            background-color: #bbb;
        }
    </style>
    <script>
        function enforceMaxLength(event) {
            const input = event.target;
            if (input.value.length > 6) {
                input.value = input.value.slice(0, 6);
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Enter Code from your Email</h2>
        <form action="verify-code.php" method="post">
            <div class="form-group">
                <label for="reset_code">Reset Code:</label>
                <input type="number" id="reset_code" name="reset_code" required placeholder=" * * * * * * "
                       min="0" max="999999" oninput="enforceMaxLength(event)" style="text-align: center;">
            </div>
            <div class="form-group">
                <input type="submit" value="Verify Code">
            </div>
        </form>
    </div>
</body>
</html>

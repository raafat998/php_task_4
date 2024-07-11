


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f8f9fa;
}

.container {
    text-align: center;
}

.logo img {
    width: 272px;
    height: 92px;
    margin-bottom: 20px;
}

.search-form {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.search-box {
    width: 560px;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #dfe1e5;
    border-radius: 24px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    outline: none;
}

.search-box:focus {
    border-color: #4285f4;
    box-shadow: 0 2px 5px rgba(66, 133, 244, 0.3);
}

.buttons {
    margin-top: 20px;
}

.search-button,
.lucky-button {
    background-color: #f8f9fa;
    border: 1px solid #dfe1e5;
    color: #202124;
    padding: 10px 20px;
    font-size: 14px;
    border-radius: 4px;
    margin: 0 5px;
    cursor: pointer;
}

.search-button:hover,
.lucky-button:hover {
    border-color: #c6c6c6;
}

.search-button:focus,
.lucky-button:focus {
    border-color: #4285f4;
    outline: none;
}

    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="https://www.google.com/images/branding/googlelogo/2x/googlelogo_color_272x92dp.png" alt="Google Logo">
        </div>
        <form class="search-form" action="redirect.php" method="get">
            <input type="text" class="search-box" name="url" placeholder="Search Google">
            <div class="buttons">
                <input type="submit" class="search-button" value="بحث Google">
            </div>
        </form>
    </div>
</body>
</html>

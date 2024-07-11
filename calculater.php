<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* تنسيق النموذج */
form {
    width: 300px;
    margin: 50px auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    background-color: #f9f9f9;
}

/* تنسيق المدخلات */
input[type="text"], select {
    width: calc(100% - 22px);
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #28a745;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

input[type="submit"]:hover {
    background-color: #218838;
}

.result {
    margin-top: 20px;
    font-size: 18px;
    font-weight: bold;
    text-align: center;
    color: #333;
}

    </style>
</head>
<body>
<form action="calculater.php" method="post">
    <input type="text" name="num1" placeholder="Number 1"><br>
    <input type="text" name="num2" placeholder="Number 2"><br>
    Operation: <select name="operation">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select><br>
    <input type="submit" value="Calculate">
    <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operation = $_POST['operation'];

    switch ($operation) {
        case '+':
            $result = $num1 + $num2;
            break;
        case '-':
            $result = $num1 - $num2;
            break;
        case '*':
            $result = $num1 * $num2;
            break;
        case '/':
            if ($num2 != 0) {
                $result = $num1 / $num2;
            } else {
                $result = 'Division by zero error';
            }
            break;
        default:
            $result = 'Invalid operation';
    }
    echo "Result: $result";
}
?>

</form>
</body>
</html>






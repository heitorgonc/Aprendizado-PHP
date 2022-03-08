<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <div>
        <h1>Finance</h1>
    </div>
    <div>
        <form action="/controller/saveFinanceController.php" method="POST">
            <input type="text" name="financeTitle" placeholder="Título de finança">
            <input type="text" name="financeValue" placeholder="Valor da finança">
            <input type="text" name="financeDate" placeholder="Data da finança">
            <input type="submit" value="Gravar finança">
            <a href="/template/listFinancesTemplate.php">Listar Finanças</a>
        </form>
    </div>
</body>
</html>
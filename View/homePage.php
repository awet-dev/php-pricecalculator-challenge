<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
    <select name="customers">
        <?php foreach ($customers as $customer) :?>
            <option value="<?php echo $customer->getFirstName()?>"><?php echo $customer->getFirstName()." ".$customer->getLastName()?></option>
        <?php endforeach;?>
    </select>
</form>
</body>
</html>
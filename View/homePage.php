<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Document</title>
</head>
<body class="container">
<!--<div class="dropdown-menu">-->
<!--    <form class="px-4 py-3">-->
<!--        <div class="form-group">-->
<!--            <label for="exampleDropdownFormEmail1">Email address</label>-->
<!--            <input type="email" class="form-control" id="exampleDropdownFormEmail1" placeholder="email@example.com">-->
<!--        </div>-->
<!--        <div class="form-group">-->
<!--            <label for="exampleDropdownFormPassword1">Password</label>-->
<!--            <input type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Password">-->
<!--        </div>-->
<!--        <div class="form-check">-->
<!--            <input type="checkbox" class="form-check-input" id="dropdownCheck">-->
<!--            <label class="form-check-label" for="dropdownCheck">-->
<!--                Remember me-->
<!--            </label>-->
<!--        </div>-->
<!--        <button type="submit" class="btn btn-primary">Sign in</button>-->
<!--    </form>-->
<!--    <div class="dropdown-divider"></div>-->
<!--    <a class="dropdown-item" href="#">New around here? Sign up</a>-->
<!--    <a class="dropdown-item" href="#">Forgot password?</a>-->
<!--</div>-->



<form action="" method="post" class="form">
    <select name="product">
        <?php foreach ($products as $product) :?>
            <option value="<?php echo $product->getId()?>"><?php echo $product->getName()?> - <?php echo $product->getPrice()?> </option>
        <?php endforeach;?>
    </select>
    <select name="customer">
        <?php foreach ($customers as $customer) :?>
            <option value="<?php echo $customer->getId()?>"><?php echo $customer->getFirstName()." ".$customer->getLastName()?></option>
        <?php endforeach;?>
    </select>
    <input type="submit" value="Check">
</form>
<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Product</th>
        <th scope="col">Price</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row"><?php echo isset($data)? var_dump($data): ""?></th>
        <th scope="row"><?php echo isset($customer)? $customer->getFirstName(): ""?></th>
        <th scope="row"><?php echo isset($customer)? $customer->getFirstName(): ""?></th>
        <th scope="row"><?php echo isset($customer)? $customer->getFirstName(): ""?></th>
        <th scope="row"><?php echo isset($customer)? $customer->getFirstName(): ""?></th>
    </tr>
    <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
    </tr>
    <tr>
        <th scope="row">3</th>
        <td colspan="2">Larry the Bird</td>
        <td>@twitter</td>
    </tr>
    </tbody>
</table>

</body>
</html>
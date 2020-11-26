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

<?php if (isset($myCustomer) && isset($myProduct) && isset($data)):?>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Product</th>
            <th scope="col">Price</th>
            <th scope="col">Discount</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row"><?php echo $myCustomer->getFirstName()?></th>
            <th scope="row"><?php echo $myCustomer->getLastName()?></th>
            <th scope="row"><?php echo $myProduct->getName()?></th>
            <th scope="row"><?php echo ($myProduct->getPrice()/100)." €"?></th>
            <th scope="row"><?php echo (($myProduct->getPrice()-$data[0]['finalPrice'])/100)." €"?></th>
        </tr>
        <tr>
            <td colspan="5" class="text-center"><h2>Discounts</h2></td>
        </tr>
        <tr>
            <td scope="row">Final Price</td>
            <td scope="row">Variable Group Detail</td>
            <td scope="row">Fix Group Detail</td>
            <td scope="row" colspan="2">Customer Discount Detail</td>
        </tr>
        <tr>
            <th scope="row"><?php echo ($data[0]['finalPrice']/100)." €"?></th>
            <th scope='row'>
                <?php if ($data[0]['varGroup'] !== []): ?>
                    <?php foreach ($data[0]['varGroup'] as $varGroup): ?>
                        <li><?php echo "VarGroup :".$varGroup->getName()?></li>
                        <li><?php echo "Var Discount(%) :".$varGroup->getVarDiscount()?></li>
                    <?php endforeach;?>
                <?php endif;?>
            </th>
            <th scope='row'>
                <?php if ($data[0]['fixGroup'] !== []): ?>
                    <?php foreach ($data[0]['fixGroup'] as $fixGroup): ?>
                        <li><?php echo "FixGroup :".$fixGroup->getName()?></li>
                        <li><?php echo "Fix Discount :".($fixGroup->getFixDiscount()/100)." €"?></li>
                    <?php endforeach;?>
                <?php endif;?>
            </th>
            <th scope="row" colspan="2">
                <li><?php echo $data[0]['customer']->getFixDiscount()." €"?></li>
                <li><?php echo $data[0]['customer']->getVarDiscount()." %"?></li>
            </th>
        </tr>
        </tbody>
    </table>
<?php endif;?>

</body>
</html>
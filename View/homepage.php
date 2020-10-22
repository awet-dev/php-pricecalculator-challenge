<!doctype html>
<html lang="en">
<head>
    <title>Price Calculator</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

<header>
    <h1>Welcome to my site</h1>
</header>

<form method = "POST">

    <div class="dropdown">

        <select name="customer" id="customer">
            <?php foreach ($customers as $customer): ?>
                <option name="customer" value="<?php echo $customer->getId()?>"><?php echo $customer->getFirstName()." ".$customer->getLastName()?></option>
            <?php endforeach; ?>
        </select>

    </div>

    <div class="dropdown">

        <select name="product" id="name">
            <?php foreach ($products as $product): ?>
                <option name="product" value="<?php echo $product->getId()?>"><?php echo $product->getName()?></option>
            <?php endforeach; ?>
        </select>

    </div>
    <input type="submit" value="order">

</form>

<section class="m-3">
    <?= $order ?>
</section>

<footer>
    &copy; Awet & Victoria <?php echo date('Y')?>
</footer>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
crossorigin="anonymous"></script>
</body>
</html>
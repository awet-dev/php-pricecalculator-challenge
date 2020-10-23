<?php require 'includes/header.php'?>
    <section>
        <h4>Info page</h4>
        <form action="" method="get">
            <input name="customerName" type="text">
            <input type="submit" value="Log In">
        </form>
        <?php if (isset($_GET['customerName'])):?>
            <?php foreach ($customers as $customer):?>
                <?php if ($_GET['customerName'] == $customer->getFirstName().' '.$customer->getLastName()):?>
                    <p><a href="index.php">Back to homepage</a></p>
                <?php endif;?>
            <?php  endforeach;?>
        <?php endif;?>
    </section>>
<?php require 'includes/footer.php'?>
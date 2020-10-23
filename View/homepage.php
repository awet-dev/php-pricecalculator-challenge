<?php
declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require 'includes/header.php'?>
    <!-- this is the view, only simple if's and loops here.
    Anything complex should be calculated in the model -->

    <article class="container bg-info">
        <!-- Select customer & product -->
        <section class="row m-3">

            <div class="card center-block m-auto mt-5">

                <form method="POST">
                    <div id="dropdown">
                        <select class="mb-1" name="customer">
                            <option value="0">Customer</option>
                            <?php
                            foreach ($customers as $customer) {
                                echo '<option value="'.$customer->getId().'">'.$customer->getFirstName().' '.$customer->getLastName().'</option>';
                            } ?>
                        </select>
                    </div>
                    <div id="dropdown">
                        <select class="mb-1" name="product">
                            <option value="0">Product</option>
                            <?php
                            foreach ($products as $product) {
                                echo '<option value="'.$product->getId().'">'.ucfirst($product->getName()).' | '.($product->getPrice()/100). ' &euro;</option>';
                            } ?>
                        </select>
                    </div>
                    <input id="linkBtn" type="submit" name="send" value="Checkout">
                </form>
            </div>

        </section>
        <!-- Output order -->

        <div class="row">

            <div class = "col p-3 d-inline-block">
                <div class = "card">

                    <?= $order ?>

                </div>
            </div>


            <div class = "col p-3 d-inline-block">
                <div class = "card">

                    <?php if (isset($tableData)) : ?>
                        <table>
                            <tr>
                                <th style="border: gray 1px solid">FixCustomer</th>
                                <td style="border: gray 1px solid"><?php echo ($tableData['fixCustomer']/100)." Euro"?></td>
                            </tr>
                            <tr>
                                <th style="border: gray 1px solid">VarCustomer</th>
                                <td style="border: gray 1px solid"><?php echo ($tableData['varCustomer']/100)." Euro"?></td>
                            </tr>
                            <tr>
                                <th style="border: gray 1px solid">ResultGroupFix</th>
                                <td style="border: gray 1px solid"><?php echo ($tableData['resultGroupFix']/100)." Euro"?></td>
                            </tr>
                            <tr>
                                <th style="border: gray 1px solid">ResultGroupVar</th>
                                <td style="border: gray 1px solid"><?php echo ($tableData['resultGroupVar']/100)." Euro"?></td>
                            </tr>
                        </table>
                    <?php endif;?>

                </div>
            </div>

        </div>

    </article>

<?php require 'includes/footer.php'?>
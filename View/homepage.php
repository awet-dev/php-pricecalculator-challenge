<?php
declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require 'includes/header.php'?>
    <!-- this is the view, only simple if's and loops here.
    Anything complex should be calculated in the model -->

    <article>
        <!-- Select customer & product -->
        <section class="m-3">
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
        </section>
        <!-- Output order -->
        <section class="m-3">
            <?= $order ?>
        </section>
        <?php if (isset($tableData)) : ?>
            <table>
                <tr>
                    <th style="border: gray 1px solid">FixCustomer</th>
                    <th style="border: gray 1px solid">VarCustomer</th>
                    <th style="border: gray 1px solid">ResultGroupFix</th>
                    <th style="border: gray 1px solid">ResultGroupVar</th>
                </tr>
                <tr>
                    <td style="border: gray 1px solid"><?php echo ($tableData['fixCustomer']/100)." Euro"?></td>
                    <td style="border: gray 1px solid"><?php echo ($tableData['varCustomer']/100)." Euro"?></td>
                    <td style="border: gray 1px solid"><?php echo ($tableData['resultGroupFix']/100)." Euro"?></td>
                    <td style="border: gray 1px solid"><?php echo ($tableData['resultGroupVar']/100)." Euro"?></td>
                </tr>
            </table>
        <?php endif;?>
    </article>

<?php require 'includes/footer.php'?>
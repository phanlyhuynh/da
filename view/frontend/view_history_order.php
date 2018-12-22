
<table class="table">
    <tr>
        <td>Name Product</td>
        <td>Price</td>

    </tr>
    <?php
    foreach ($detail_orders as $detail_order) {
        $i = 0;
        foreach ($detail_order['product'] as $product) {
            $i++;
            ?>
            <tr>
                <td> <?php echo $product['c_name']; ?></td>
                <td> <?php echo $product['c_price']; ?></td>
            </tr>
        <?php }
    }?>
</table>

	<?php $products = include 'pzpi-18-4-mykhailova-yuliia-lab4-products_list.php'; ?><!-- отримання списку товарів -->
<?php
	$products = $_SESSION['cart'];//отримання списку товарів з сесії, які користувач хоче купити
	$finalSum = "0";//остаточна сума для сплати
	$id = 1;//номер товару для таблиці
?>

<main>
    <form method="post" action="pzpi-18-4-mykhailova-yuliia-lab4-processing.php?action"><!-- створення форми для таблиці кошика -->
        <?php if (count($products) != 0) : ?><!-- цикл по товарам, які є у кошику -->

            <table style="margin-left: 35%; width: 30%; height: auto; margin-bottom: 20px; margin-top: 100px;">
                <thead>
                <tr><!-- заголовки таблиці: номер, ім'я, інструмент, вартість, кількість, сума' -->
                    <td style="color: black; font-weight: bold; background-color: #b0c4de;">№</td>
                    <td style="color: black; font-weight: bold; background-color: #b0c4de;">Name</td>
                    <td style="color: black; font-weight: bold; background-color: #b0c4de;">Instrument</td>
                    <td style="color: black; font-weight: bold; background-color: #b0c4de;">Price</td>
                    <td style="color: black; font-weight: bold; background-color: #b0c4de;">Amount</td>
                    <td style="color: black; font-weight: bold; background-color: #b0c4de;">Sum</td>
                    <td style="border-color: white;" ></td>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($products as $key => $product) : ?>
                    <tr><!-- вивід даних по кожний товар у кошику -->
                        <td><?php echo $id++; ?></td>
                        <td><?php echo $product['title']; ?></td>
                        <td><?php echo $product['instrument']; ?></td>
                        <td><?php echo $product['price']; ?></td>
                        <td><?php echo $product['amount']; ?></td>
                        <td><?php $sum = bcmul($product['price'], $product['amount'], 2);
                            $finalSum = bcadd($finalSum, $sum, 2);
                            echo bcadd($sum, "0", 2); ?></td><!-- підрарахунок загальної суми по конкретному товару та загальної суми -->
                        <td style="text-align: center;">
                            <button style="border-color: white;" name="<?php echo $key; ?>"><i style="font-size: 30px;" class="fas fa-trash"></i></button><!-- кнопка для видалення конкретного товару -->
                        </td>
                    </tr>
                <?php endforeach; ?><!-- кінець циклу -->
                <tr><!-- рядок таблиці для виводу фінальної сумми заказу -->
                    <td colspan="5" style="border-color: white; text-align: right">Total:</td>
                    <td><?php echo $finalSum; ?></td>
                    <td style="border-color: white;"></td>
                </tr>
                <script>
                    function OnBuy() {//подія на купівлю товарів у кошику 
                        alert("You paid <?php echo $finalSum; ?> $.");
                    }
                </script>
                </tbody>
            </table>
            	<div style="margin-bottom: 21%; display: flex; justify-content: center;">
                    <div style="margin-right: 5%;"><input class="clear" type="submit" value="Clear" name="cancel"/></div><!-- кнопка очищення товарів із кошика -->
                    <div style="border-color: white;"><input class="buy" type="submit" value=" Buy " name="pay" style="background: green" onclick="OnBuy();" /></div><!-- кнопка купівлі всіх товарів у кошику -->
                </div>
        <?php else : ?>
        <div style="display: table; margin: 15% auto; border: 0 solid white; ">
            <a style="font-size: 40px; font-weight: bold; color: black;   font-family: 'Montserrat Alternates', sans-serif;
" href="pzpi-18-4-mykhailova-yuliia-lab4-index.php">Back to products</a><!-- якщо товарів у кошику немає, користувачу пропонується перейти до головної сторінки -->
        </div>
        <?php endif; ?>
    </form>
</main>
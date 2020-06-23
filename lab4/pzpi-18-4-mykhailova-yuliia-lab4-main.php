<?php $products = include 'pzpi-18-4-mykhailova-yuliia-lab4-products_list.php'; ?> <!-- включення списку товарів в тіло сторінки -->
	<main style="text-align: center;"> <!-- головний блок сторінки -->
		<form method="post" action="pzpi-18-4-mykhailova-yuliia-lab4-processing.php?action=buy"><!-- формування форми методом "пост", дією "купити" -->
		<?php foreach ($products as $product) : ?> <!-- виводимо кожний товар зі списку за допомогою циклу із застосування стилів -->
			<div style="margin: 5%; display: inline-block;">
			<div class= "product_photo"><img width="380px" height= "auto" src="img/<?php echo $product['imageSrc'];?>"></div><!-- картинка до товару -->
			<div class="product_text"><?php echo $product['title'];?><br><br>Instrument - <?php echo $product['instrument'];?><br><!-- інстумент, для якого розраховані ноти -->
			<p style="font-size: 30px; font-weight: bold; color: orange;"><?php echo $product['price'];?>$</p><!-- вартість 1го набору нот -->
			<input type="number" name="<?php echo $product['title']; ?>" min="0" max="999"/> <!-- поле для вводу кількості товарів на купівлю, є лічильник з кроком 1 для пришвидшенного вводу кількості -->
			</div></div>
		<?php endforeach ?><!-- кінець циклу перераховування товарів -->
		<br><input type="submit" value="Send to cart" name="buy" class="buttonAdd"/></form><!-- кнопка "Додати до кошика" -->
	</main>
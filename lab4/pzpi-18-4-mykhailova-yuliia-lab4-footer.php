<footer> <!-- підвал сайту, який запитує домени та автоматично вирішує, чи буде активна ссилка на сторінку -->
   <?php $url = array(); preg_match("/[a-z]+\.php/", $_SERVER['REQUEST_URI'], $url); ?> <!-- запит -->
    <div style="justify-content: center;" class="footer">
        
        <div><a style="color: white;" <?php if(count($url) != 0 && $url[0] != "pzpi-18-4-mykhailova-yuliia-lab4-index.php?action=main_page") echo "href=\"pzpi-18-4-mykhailova-yuliia-lab4-index.php?action=main_page\"" ?>>Home</a></div> 
<!-- перехід на сторінку Додому -->
    	<div><a style="color: white;" <?php echo "href=\"pzpi-18-4-mykhailova-yuliia-lab4-index.php?action=main_page\"" ?>>Products</a></div>
<!-- перехід на сторінку Товари -->
	  <?php 
      $login = $_SESSION['login'];?><!-- перевірка, чи зайшов користувач у систему -->
        <div><a style="color: white;" <?php if(count($login)!=0) echo "href=\"pzpi-18-4-mykhailova-yuliia-lab4-index.php?action=cart\"" ?>>Cart</a></div>
<!-- перехід на сторінку Корзини покупок -->
        <div><a style="color: white;">About us</a></div>
        <!-- перехід на сторінку Про сайт -->
    </div>
</footer>
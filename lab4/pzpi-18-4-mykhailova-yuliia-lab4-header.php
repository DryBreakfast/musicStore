<header><!-- шапка сайту, який запитує домени та автоматично вирішує, чи буде активна ссилка на сторінку -->
  <?php $url = array(); preg_match("/[a-z]+\.php/", $_SERVER['REQUEST_URI'], $url); ?>
  <nav>
	<div class="menu">
    <ul>
      <li style="margin-top: 20px;"><a <?php if(count($url) != 0 && $url[0] != "pzpi-18-4-mykhailova-yuliia-lab4-index.php?action=main_page") echo "href=\"pzpi-18-4-mykhailova-yuliia-lab4-index.php?action=main_page\"" ?>><i class="fas fa-home"></i> Home</a></li>
      <!-- перехід на сторінку Додому -->
      <!-- перехід на сторінку Каталог, який включає в себе дві категорії товарів -->
      <li style="margin-top: 20px;"><a <?php echo "href=\"pzpi-18-4-mykhailova-yuliia-lab4-index.php?action=main_page\"" ?>><i class="fas fa-bars"></i> Catalog</a>
        <ul>
          <li><a href="#">Guitar</a></li>
          <li><a href="#">Piano</a></li>
        </ul>
      </li>
      <?php 
      $login = $_SESSION['login'];//перевірка, чи зайшов користувач у систему
      if (count($login) != 0) : ?>
      <!-- перехід на сторінку Корзина покупок -->
      <li style="margin-top: 20px;"><a <?php if($url[0] != "pzpi-18-4-mykhailova-yuliia-lab4-index.php?action=cart") echo "href=\"pzpi-18-4-mykhailova-yuliia-lab4-index.php?action=cart\"" ?>><i class="fas fa-shopping-basket"></i> Cart</a></li>
      <li style="margin-top: 20px;"><a <?php if($url[0] != "pzpi-18-4-mykhailova-yuliia-lab4-index.php?action=profile") echo "href=\"pzpi-18-4-mykhailova-yuliia-lab4-index.php?action=profile\"" ?>><i class="fas fa-user-circle"></i> Profile</a></li>
      <li style="margin-top: 20px;"><a <?php if($url[0] != "pzpi-18-4-mykhailova-yuliia-lab4-processing.php?action=logout") echo "href=\"pzpi-18-4-mykhailova-yuliia-lab4-processing.php?action=logout\"" ?>><i class="fas fa-sign-out-alt"></i> Logout</a></li>
      <?php else : ?><!-- якщо користувач не зайшов у систему, відображати тільку вкладку входу -->
      <li style="margin-top: 20px;"><a <?php if($url[0] != "pzpi-18-4-mykhailova-yuliia-lab4-index.php?action=login") echo "href=\"pzpi-18-4-mykhailova-yuliia-lab4-index.php?action=login\"" ?>><i class="fas fa-sign-in-alt"></i> Login</a></li>
        
       <?php endif; ?>
    </ul>
  </div>
</nav>
</header>
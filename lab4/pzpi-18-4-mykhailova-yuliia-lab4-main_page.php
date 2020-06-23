 <?php 
      $login = $_SESSION['login'];//перевірка, чи зайшов користувач у систему
      if (count($login) != 0) : ?>
	 <?php include 'pzpi-18-4-mykhailova-yuliia-lab4-main.php' ?><!-- підключення файлу тіла сторінки -->
	 <?php else : ?><!-- якщо користувач не зайшов, відображати вікно помилки -->
	 <div style="display: table; margin: 15% auto; border: 0 solid white; ">
            <a style="font-size: 40px; font-weight: bold; color: black;   font-family: 'Montserrat Alternates', sans-serif;
">Please, login first</a><!-- якщо товарів у кошику немає, користувачу пропонується перейти до головної сторінки -->
        </div>
	 <?php endif; ?>
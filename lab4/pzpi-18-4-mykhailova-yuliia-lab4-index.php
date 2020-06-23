<?php session_start();?><!-- початок сесії -->
<!DOCTYPE html>
<html lang="en"><!-- мова сайту -->
<head>
	<meta charset="UTF-8"><!-- тип кодування -->
	<title>Tabs store</title><!-- назва сайту -->
	<link rel="stylesheet" href="css/pzpi-18-4-mykhailova-yuliia-lab4-style.css"><!-- підключення файлу стилів -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous"><!-- підключення іконок -->
	<link href="https://fonts.googleapis.com/css?family=Andika|Montserrat+Alternates|Marck+Script" rel="stylesheet"><!-- підключення шрифтів -->
</head>
<body>
	<?php include 'pzpi-18-4-mykhailova-yuliia-lab4-header.php' ?><!-- підключення файлу шапки -->
	<?php 
	if (isset ($_GET['action'])) { //обробка дії з форми на головній сторінці
		$page=$_GET['action'];
	}
	else{
		$page='main_page';
	}
    require_once("pzpi-18-4-mykhailova-yuliia-lab4-$page.php");
        ?>
	<?php include 'pzpi-18-4-mykhailova-yuliia-lab4-footer.php' ?><!-- підключення файлу підвалу сторінки -->
</body>
</html>
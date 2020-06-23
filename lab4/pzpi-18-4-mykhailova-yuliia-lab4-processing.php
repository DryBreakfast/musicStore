<?php
session_start(); //початок сесії для зберігання товарів у кошику


function user_age($y, $m, $d) { // у якості параметрів - рік, день, місяць
    if($m > date('m') || $m == date('m') && $d > date('d'))
      return (date('Y') - $y - 1); // якщо дня народження в цьому році ще не було, то -1
    else
      return (date('Y') - $y); // якщо день народження вже був у цоьму році, то віднімаємо від цього року рік народження
  }

if (isset ($_GET['action'])) { //обробка дії з форми на головній сторінці
	switch($_GET['action']){
        case 'buy'://дія "купити"
        $products = include 'pzpi-18-4-mykhailova-yuliia-lab4-products_list.php'; //підключення списку товарів
            $basketProducts = $_SESSION['cart'] == null ? array() : $_SESSION['cart'];//отримання існуючого кошика, якщо він не порожній
            foreach ($products as $prod) {//проходження по всім товарам у списку товарів
                    $title = $prod['title'];//отримання кількості товару, який хоче придбати користувач
                    if (isset($_POST[$title])&&(int)$_POST[$title]>0) {//перевірка на коректність вводу даних(кількості товару)
                        $flag=1;//флаг перевірки вже наявності товару у кошику
                        $amount = bcadd($_POST[$title], "0", 0);//зчитування кількості товарів, який хоче придбати користувач
                        $currentProductToAdd=array('title'=>$title,'instrument'=>$prod['instrument'], 'price'=>$prod['price'],'amount'=>$amount);//створення масиву товару, який додається у кошик
                        foreach ($basketProducts as $key => $value) {//перевірка, чи є товар вже у кошику
                            if($value['title']==$currentProductToAdd['title']){
                                $basketProducts[$key]['amount']=bcadd($value['amount'], $currentProductToAdd['amount']);
                                $flag=0;
                            }
                        }
                        if($flag==1){
                            array_push($basketProducts, $currentProductToAdd);//додавання товару, чкощо його немає у кошику
                        }
                    }
                }
            $_SESSION['cart']=$basketProducts;//переоголошення масиву товарів у сесії
            header('Location: pzpi-18-4-mykhailova-yuliia-lab4-index.php?action=cart');// перехід на сторінку кошика
            exit;
            break;
        case 'login':
                    $user_info = include 'pzpi-18-4-mykhailova-yuliia-lab4-credential.php'; //підключення інформації про користувача
                    $login_info=array();
                    $name=$_POST['name'];
                    $password=$_POST['password'];
                    if($name==$user_info['userName']&&$password==$user_info['password']){
                        array_push($login_info, array('name'=>$name,'data'=>date('l jS \of F Y h:i:s A')));
                        $_SESSION['login']=$login_info;
                        unset($_SESSION['error']);
                        header('Location: pzpi-18-4-mykhailova-yuliia-lab4-index.php?action=main_page');// перехід на головну сторінку
                        exit;  
                    }else{
                        $_SESSION['error']='error';//сесія, яка зберігає наявність помилки
                        header('Location: pzpi-18-4-mykhailova-yuliia-lab4-index.php?action=login');// перехід на сторінку входу
                        exit;
                    }
                    
                    break;
        case 'logout':
                    unset($_SESSION['login']);//якщо користувач виходить з системи, сесія очищується
                    unset($_SESSION['error']);
                    unset($_SESSION['profile_change_error']);
                    header('Location: pzpi-18-4-mykhailova-yuliia-lab4-index.php?action=main_page');// перехід на сторінку кошика
                    exit; 
                    break;
        case 'save':
                    $user_info = include 'pzpi-18-4-mykhailova-yuliia-lab4-profile_data.php';//зчитування вже наявної інформації про користувача
                    $name=$_POST['user_name'];//зчитування введеного ім'я'
                    $surname=$_POST['user_surname'];//зчитування прізвища
                    $date=$_POST['birth_date'];//зчитування дати народження 
                    $text=$_POST['about'];//зчитування інформації про користувача
                   
                    $y=$date[0].$date[1].$date[2].$date[3];//рік
                    $m=$date[5].$date[6];//місяць
                    $d=$date[8].$date[9];//день у рядку з датою
                    $photo_name=basename($_FILES['upload']['name']);//зчитування ім'я файлу фото
                    if(!strlen($photo_name))//перевірка, чи було завантажено фото
                    {
                        $photo_name=$user_info['photo'];//якщо ні - беремо те, яке було попередньо завантажено
                    }

                    $arr_profile = "<?php return array( 'name' => '$name', 'surname' => '$surname', 'birth_date' => '$date', 'about' => '$text', 'photo' => '$photo_name'); ?>";//оновленний масив даних про користувача

                    if(!strlen($_POST['user_name'])||!strlen($_POST['user_surname'])||!strlen($_POST['birth_date'])||!strlen($_POST['about']))
                    {//перевірка, чи всі поля запонені
                        $_SESSION['profile_change_error']='Some fields are empty!';
                    }
                    else if(strlen($_POST['birth_date'])>10||$y>date('Y'))
                    {//перевірка, чи коректний введено рік
                        $_SESSION['profile_change_error']='Non-valid date!';
                    }
                    else if(strlen($name)<1||strlen($surname)<1||strlen($text)<50)
                    {//перевірка, чи достатня довжина полів вводу
                        $_SESSION['profile_change_error']='Some fields are too short!';
                    }
                    else if(user_age($y, $m, $d)<=16)
                    {//перевірка, чи є користувачу 16 років і більше
                        $_SESSION['profile_change_error']='You are too young!';
                    }
                    else if(substr($photo_name, -4)!='.png'&&substr($photo_name, -4)!='.jpg'&&substr($photo_name, -4)!='jpeg'&&substr($photo_name, -4)!='.gif')
                    {//перевірка формату фото
                         $_SESSION['profile_change_error']='Wrong file format!';
                    }
                    else 
                    {//при проходженні всіх перевірок, масив сесії з помилками очищується
                        unset($_SESSION['profile_change_error']);
                        file_put_contents("pzpi-18-4-mykhailova-yuliia-lab4-profile_data.php", $arr_profile);//завантаження оновленого масиву даних про користувача
                        move_uploaded_file($_FILES['upload']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/img/'.$photo_name);//завантаження фото до папки проекту
                    }
                   
                    header('Location: pzpi-18-4-mykhailova-yuliia-lab4-index.php?action=profile');//перехід до сторінки профілю
                    exit; 
                    break;

    }

    if(isset($_POST['pay'])) {//купівля у кошику
        unset($_SESSION['cart']);//очищення сесії
        header('Location: pzpi-18-4-mykhailova-yuliia-lab4-index.php?action=main_page');//перехід до главної
        exit;
    }
    else if(isset($_POST['cancel'])) {//очищення кошику
        unset($_SESSION['cart']);//очищення сесії
        header('Location: pzpi-18-4-mykhailova-yuliia-lab4-index.php?action=cart');//перехід до главної
        exit;
    }
    else {
        foreach ($_SESSION['cart'] as $key => $product) {//видалення конкретного товару з кошика
            if (isset($_POST[$key])) {
                unset($_SESSION['cart'][$key]);
                header('Location: pzpi-18-4-mykhailova-yuliia-lab4-index.php?action=cart');//перехід до главної
                exit;
            }
        }
    }
}
?>
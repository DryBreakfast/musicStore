	<main>
		<?php $user_info = include 'pzpi-18-4-mykhailova-yuliia-lab4-profile_data.php'; ?><!-- підключення даних про профіль користувача -->
		
		<form style=" margin-top: 8%;align-items: center; justify-content: center; text-align: center;" method="post" action="pzpi-18-4-mykhailova-yuliia-lab4-processing.php?action=save"  enctype="multipart/form-data">
			<?php if(isset($_SESSION['profile_change_error'])):?><!-- рядок, який показує відповідну помилку при неправильному заповненні форми профілю -->
		<div style="font-family: 'Montserrat Alternates', sans-serif; color: red; margin-bottom: 2%;">
			<?php echo $_SESSION['profile_change_error'];?>
		</div>
		<?php endif; ?>
			<div style="width: 50%;margin-left: 30%; margin-bottom: 50px; font-family: 'Montserrat Alternates', sans-serif; display: flex; flex-direction: row; align-items: center;">
  		<div style="display: flex; flex-direction: column; align-items: center;margin-left: 5%; margin-right: 10%;">
  			<img width="300px" height="300px" src="img/<?php echo $user_info['photo'];?>" style="margin-bottom: 30px; border: 1px solid black;">
  			<input accept="image/jpg,image/png" style="font-family: 'Montserrat Alternates', sans-serif;" type="file" name="upload" value="Open file"></div><!-- вікно із фото -->
  		<div style=" display: flex; flex-direction: column; justify-content: center; align-items: center;">
  			<label for="user_name">Name</label><!-- поле для вводу ім'я -->
  			<input style="font-family: 'Montserrat Alternates', sans-serif;" type="text" name="user_name" value="<?php echo $user_info['name'];?>"><br>
  			<label for="user_surname">Surname</label><!-- поле для вводу прізвища -->
  			<input style="font-family: 'Montserrat Alternates', sans-serif;" type="text" name="user_surname" value="<?php echo $user_info['surname'];?>"><br>
  			<label for="birth_date">Date of birth</label><!-- поле для вводу дати народження -->
  			<input style="width: 165px; height: 23px; font-family: 'Montserrat Alternates', sans-serif;" type="date" name="birth_date" value="<?php echo $user_info['birth_date'];?>"><br>
  			<label for="about">About you</label><!-- поле для вводу інформації про користувача -->
  			<textarea cols="50" rows="10" style=" font-family: 'Montserrat Alternates', sans-serif;" name="about"><?php echo $user_info['about'];?></textarea>
  		</div></div>
  		<input style="margin-bottom: 10%;" type="submit" value="Save" name="save" class="buttonAdd"/><!-- кнопка для збереження змінень у профілі -->
		</form>
	</main>
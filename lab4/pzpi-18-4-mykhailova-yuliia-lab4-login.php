	<main>
		<div style=" margin-top: 15%; margin-bottom: 15%;" class="login">
			<form style=" border: 2px solid black; width: 40%;margin-left: 30%;" class="login" method="post" action="pzpi-18-4-mykhailova-yuliia-lab4-processing.php?action=login">
				<table style="margin-top: 3%; margin-left: 25%; width:50%;">
					<?php if(isset($_SESSION['error'])):?><!-- перевірка, чи були помилки при вході у систему -->
  						<tr>
                         <td colspan="2" style="text-align: center; color: red; border-color: white;">Wrong name or password!</td><!-- повідомлення про невірний пароль або ім'я при вході -->
                     </tr>
                     <?php endif; ?>
  				<tr>
   					<td style="border-color: white;">Enter name:</td>
    				<td style="border-color: white;"><input style="font-size: 15px; font-family: 'Montserrat Alternates', sans-serif;" type="text" name="name" placeholder="Name"/></td><!-- рядок з полем для вводу ім'я -->
  				</tr>
  				<tr>
    				<td style="border-color: white;">Enter password:</td>
    				<td style="border-color: white;"><input style="font-size: 15px; font-family: 'Montserrat Alternates', sans-serif;" type="password" name="password" placeholder="Password"/></td><!-- рядок з полем для вводу паролю -->
  				</tr>
				</table>
				 <br><br><br>
				<input type="submit" name="submit" class="buttonAdd" value="Login"/><!-- кнопка підтвердження входу у систему -->
			</form>
		</div>

	</main>
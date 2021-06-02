<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
	<title>WT-7</title>
</head>
<body>
	<form action = "?php $_PHP_SELF ?" method = "POST" enctype="multipart/form-data">
		<p>
			<label for="name">Имя</label>
			<input type="text" name="name" class="input" value="<?php echo (isset($_POST['name']))?$_POST['name']:'';?>" required>
		</p>
		<p>
			<label for="mobilePhone">Телефон</label>
			<input type="text" name="phone" class="input phone" value="<?php if (preg_match("/^((8|\+375)[\- ]?)?\(?\d{3,5}\)?[\- ]?\d{1}[\- ]?\d{1}[\- ]?\d{1}[\- ]?\d{1}[\- ]?\d{1}(([\- ]?\d{1})?[\- ]?\d{1})?$/", $_POST['phone'])) echo (isset($_POST['phone']))?$_POST['phone']:'';?>" required>
			<label><?php if (!preg_match("/^((8|\+375)[\- ]?)?\(?\d{3,5}\)?[\- ]?\d{1}[\- ]?\d{1}[\- ]?\d{1}[\- ]?\d{1}[\- ]?\d{1}(([\- ]?\d{1})?[\- ]?\d{1})?$/", $_POST['phone']) && $_POST['phone'] != "") echo "Некорректно введён телефон!"; ?></label>
		</p>
		<p>
			<label for="mail">Email</label>
			<input type="text" name="email" class="mail" value="<?php if (preg_match("/[-a-z0-9!#$%&'*_`{|}~]+[-a-z0-9!#$%&'*_`{|}~\.=?]*@[a-zA-Z0-9_-]+[a-zA-Z0-9\._-]+/i", $_POST['email'])) echo (isset($_POST['email']))?$_POST['email']:'';?>" required>
			<label><?php if (!preg_match("/[-a-z0-9!#$%&'*_`{|}~]+[-a-z0-9!#$%&'*_`{|}~\.=?]*@[a-zA-Z0-9_-]+[a-zA-Z0-9\._-]+/i", $_POST['email']) && $_POST['email'] != "") echo "Некорректно введён email!"; ?></label>
		</p>
		<p>
			<label for="theme">Тема</label>
			<input type="text" name="theme" class="input" value="<?php echo (isset($_POST['theme']))?$_POST['theme']:'';?>">
		</p>
		<p>
			<textarea class="input" placeholder="Текст сообщения" name="textarea" cols="45" rows="6"><?php echo (isset($_POST['textarea']))?$_POST['textarea']:'';?></textarea>
		</p>
		<p>
			<input type="submit" name="submit" value="Отправить">
		</p>
	</form>
	<?php 
	$from = "yug.777@mail.ru";

	$subject = 'Благодарность';
	$message = "Воу воу воу. Спасибо за отправку формы";

	$headers = "From: $from" . "\r\n" . "Reply-To: $from" . "\r\n" . "X-Mailer: PHP/" . phpversion();

	if (!preg_match("/^((8|\+375)[\- ]?)?\(?\d{3,5}\)?[\- ]?\d{1}[\- ]?\d{1}[\- ]?\d{1}[\- ]?\d{1}[\- ]?\d{1}(([\- ]?\d{1})?[\- ]?\d{1})?$/", $_POST['phone']) && $_POST['phone'] != "") {
		echo "<style>.phone { border: 1px solid red}</style>";
	}
	if (!preg_match("/[-a-z0-9!#$%&'*_`{|}~]+[-a-z0-9!#$%&'*_`{|}~\.=?]*@[a-zA-Z0-9_-]+[a-zA-Z0-9\._-]+/i", $_POST['email']) && $_POST['email'] != ""){
		echo "<style>.mail { border: 1px solid red}</style>";
	} else {
		$to = trim($_POST['email']);

		if (mail($to, $subject, $message, $headers)) {
			echo "Отправлено";
		} else {
			echo "Не отправлено";
		}
	}
	?>
</body>
</html>
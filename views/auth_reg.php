<?php

if(isset($_POST['reg']))
{
    $pass1 = (trim($_POST['reg_pass']));
    $pass2 = (trim($_POST['reg_pass_rep']));
    $email = (trim($_POST['reg_email']));
    $check_email = mysqli_query($db, "SELECT * FROM users WHERE `email` = '$email'");
    $error_reg = '';
    $email_busy = '';

    if(!preg_match("/^((([0-9A-Za-z]{1}[-0-9A -z\.]{1,}[0-9A-Za-z]{1})|([0-9А-Яа-я]{1}[-0-9А-я\.]{1,}[0-9А-Яа-я]{1}))@([-A-Za-z]{1,}\.){1,2}[-A-Za-z]{2,})$/", $email) || empty($email))
    {
        echo '<script type="text/javascript">';
        echo 'alert("ПОЛЕ (ЕЛЕКТРОННА ПОШТА) ЗАПОВНЕННЕ НЕПРАВИЛЬНО!");';
        echo '</script>';
    }
    else if(!preg_match("/(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z-_].{7,20}$/", $pass1) || empty($pass1))
    {
        echo '<script type="text/javascript">';
        echo 'alert("ПОЛЕ (ПАРОЛЬ) ЗАПОВНЕННЕ НЕПРАВИЛЬНО!");';
        echo '</script>';
    }
    else if(($pass1 != $pass2) || empty($pass2))
    {
        echo '<script type="text/javascript">';
        echo 'alert("ПАРОЛІ НЕ ЗБІГАЮТЬСЯ!");';
        echo '</script>';

    }

    else if(mysqli_num_rows($check_email))
    {
        echo '<script type="text/javascript">';
        echo 'alert("EMAIL ВЖЕ ІСНУЄ!");';
        echo '</script>';
    }

    else if($pass1 && $pass2 && $email)
    {
        $saltedPassword = password_hash($_POST['reg_pass'],PASSWORD_BCRYPT);
        $result = mysqli_query($db, "INSERT INTO users (email,password) VALUES ('$email','$saltedPassword')") or die("Значення не занесені");
        echo '<script type="text/javascript">';
        echo 'alert("ВИ ЗАРЕЄСТРОВАНІ!");';
        echo '</script>';
    }

}

if(isset($_POST['auth']))
{

    $email = (trim($_POST['auth_email']));
    $password = (trim($_POST['auth_pass']));
    $result = mysqli_query($db, ("SELECT * FROM users WHERE `email` = '$email'"));



    if (mysqli_num_rows($result) > 0)
    {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($_POST['auth_pass'], $user['password']))
        {

            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['email'] =  $user['email'];
            $_SESSION['admin'] =  $user['admin'];
            session_start();
            echo '<script type="text/javascript">';
            echo 'window.location.href="'."/index.php?action=admin_panel".'";';
            echo '</script>';

        }
        else
        {
            echo '<script type="text/javascript">';
            echo 'alert("НЕПРАВИЛЬНА ПОШТА АБО ПАРОЛЬ!");';
            echo '</script>';

        }
    }
    else{
        echo '<script type="text/javascript">';
        echo 'alert("ТАКОЇ ПОШТИ НЕ ІСНУЄ!");';
        echo '</script>';
    }

}
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <title>PeopleSearch</title>
    <meta charset="UTF-8">
    <meta name="description" content="Описания">
    <meta name="theme-color" content="#BD744E">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/ico" href="#">
    <link rel="stylesheet" href="../assets/css/libs.min.css">
    <link rel="stylesheet" href="../assets/css/main.css">
</head>
<body>
<div class="auth_reg small-10 row align-justify align-top">
		<form action="" method="POST" class="reg small-12 medium-5" data-abide novalidate>
			<h4 class="reg-title large-12 text-center">Реєстрація</h4>
			<div class="grid-x grid-margin-x">
				<div class="cell">
					<div data-abide-error class="alert callout" style="display: none;">
						<p><i class="fi-alert"></i>Поля заповнені невірно</p>
					</div>
				</div>
			</div>
			<div class="grid-x grid-margin-x">
				<div class="cell small-12">
					<label>Поштова адреса
						<input type="email" placeholder="example@mail.com" id="email" name="reg_email" required pattern="email">
						<span class="form-error">
         Почтова адреса написана невірно!
        </span>
					</label>
					<p class="help-text">Введіть будь ласка свою поштову адресу</p>
				</div>
				<div class="cell small-12">
					<label>Пароль
						<input type="password" id="password" placeholder="Пароль" name="reg_pass" aria-describedby="Пароль має маи розмір не маньше 3 символів і не більше 18"
									 required >
						<span class="form-error">
        	Пароль написаний неправильно!
        </span>
					</label>
					<p class="help-text">Введіть пароль будь ласка</p>
				</div>
				<div class="cell small-12">
					<label>Повторіть пароль
						<input type="password" placeholder="Повторіть пароль" name="reg_pass_rep" aria-describedby="Паролі мають збігатись" required pattern="alpha_numeric"
									 data-equalto="password">
						<span class="form-error">
         		Паролі не збігаються
        </span>
					</label>
				</div>
			</div>
			<div class="grid-x grid-margin-x">
				<fieldset class="cell small-12">
					<button class="button alert reg small-12" type="submit" name="reg" value="Registration">Зареєструватись</button>
				</fieldset>
			</div>
		</form>
		<form action="" method="POST" class="auth small-12 medium-5" data-abide novalidate>
			<h4 class="auth-title large-12 text-center">Авторизація</h4>
			<div class="grid-x grid-margin-x">
				<div class="cell">
					<div data-abide-error class="alert callout" style="display: none;">
						<p><i class="fi-alert"></i>Поля заповнені невірно</p>
					</div>
				</div>
			</div>
			<div class="grid-x grid-margin-x">
				<div class="cell small-12">
					<label>Поштова адреса
						<input type="email" placeholder="example@mail.com" name="auth_email" id="AuthEmail" required pattern="email">
						<span class="form-error">
         Почтова адреса написана невірно!
        </span>
					</label>
					<p class="help-text">Введіть будь ласка свою поштову адресу</p>
				</div>
				<div class="cell small-12">
					<label>Пароль
						<input type="password" id="Authpassword" placeholder="Пароль" name="auth_pass" aria-describedby="Пароль має маи розмір не маньше 3 символів і не більше 18"
									 required >
						<span class="form-error">
        	Пароль написаний неправильно!
        </span>
					</label>
					<p class="help-text">Введіть пароль будь ласка</p>
				</div>
			</div>
			<div class="grid-x grid-margin-x">
				<fieldset class="cell small-12">
					<button class="button alert auth small-12" type="submit" name="auth" value="Authorization">Увійти</button>
				</fieldset>
			</div>
		</form>
	</div>
<script src="../assets/js/libs.min.js"></script>
<script src="../assets/js/main.js"></script>
<script>
    jQuery(document).foundation();
</script>
</body>
</html>
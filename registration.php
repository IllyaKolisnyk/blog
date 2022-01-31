<!DOCTYPE html>
<html lang="ua">
<head>
	<?php
		$website_title = 'ДОБРА НОВИНА - Реєстрація на сайті';
		require 'blocks/head.php';
	?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<style>
		input {
			text-align: center;
		}
        form {
            padding-top: 0;
        }
        h1 {
            color: #0d6efd;
        }
	</style>
</head>
<body>
<?php require 'blocks/header.php'; ?>
<main class="container mt-5">
	<div class="row">
		<div class="col-md-8 core_site">
			<div class="wrap">
				<form action="ajax/registration.php" id="regForm">
					<h1 class="mb-4">Форма реєстрації</h1><br>
					<label for="usersurname">Введіть ваше прізвище:</label>
					<input type="text" name="usersurname" id="usersurname" class="form-control">
					<label for="username">Введіть ваше ім'я:</label>
					<input type="text" name="username" id="username" class="form-control">
					<label for="email">Введіть ваш email:</label>
					<input type="email" name="email" id="email" class="form-control">
					<label for="login">Введіть ваш логін:</label>
					<input type="text" name="login" id="login" class="form-control">
					<label for="password">Введіть ваш пароль:</label>
					<input type="password" name="password" id="password" class="form-control">
					<label for="password_again">Введіть ваш пароль ще раз:</label>
					<input type="password" name="password_again" id="password_again" class="form-control">
					<div class="alert alert-danger mt-5" id="errorBlock"></div>
					<button type="submit" class="btn btn-primary mt-3" id="reg_user">Зареєструватися</button>
				</form>
			</div>
		</div>
			<?php require 'blocks/aside.php'; ?>
	</div>
</main>
<?php require 'blocks/footer.php'; ?>
<script type="text/javascript">
	$("#regForm").submit(function(event) {
		event.preventDefault();
		let usersurname = $('#usersurname').val();
		let username = $('#username').val();
		let email = $('#email').val();
		let login = $('#login').val();
		let password = $('#password').val();
		let password_again = $('#password_again').val();
		$.post('ajax/registration.php',
			{'usersurname' : usersurname, 'username' : username, 'email' : email, 'login' : login, 'password' : password, 'password_again' : password_again},
			function(data) {
				if (data == 'Готово') {
					$('#reg_user').text('Все готово');
					$('#errorBlock').hide();
				} else {
					$('#errorBlock').show();
					$('#errorBlock').text(data);
				}
			})
	});
</script>
</body>
</html>
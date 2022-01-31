<!DOCTYPE html>
<html lang="ua">
<head>
	<?php
		$website_title = 'ДОБРА НОВИНА - Авторизація на сайті';
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
        h1, h2 {
            color: #0d6efd;
        }
        h2 {
            text-align: center;
        }
	</style>
</head>
<body>
<?php require 'blocks/header.php'; ?>
<main class="container mt-5">
	<div class="row">
		<div class="col-md-8 core_site">
			<?php
                if(!isset($_COOKIE['login'])):
            ?>
			<div class="wrap">
				<form action="ajax/auth.php" id="loginForm">
					<h1 class="mb-4">Форма авторизації</h1><br>
					<label for="login">Введіть ваш логін:</label>
					<input type="text" name="login" id="login" class="form-control">
					<label for="password">Введіть ваш пароль:</label>
					<input type="password" name="password" id="password" class="form-control">
					<div class="alert alert-danger mt-5" id="errorBlock"></div>
					<button type="submit" class="btn btn-primary mt-3" id="auth_user">Увійти</button>
				</form>
			</div>
			<?php else: ?>
            <h2>Кабінет користувача</h2><br><br>
            <?php
                    echo "Ваш логін:\n<span style='color: #0d6efd;'>".$_COOKIE['login']."</span><br><br>Якщо хочете вийти з профілю, нажміть на кнопку знизу:<br><br>";
            ?>
            <button type="submit" class="btn btn-danger" id="exit_btn">Exit</button>
            <?php endif; ?>
		</div>
			<?php require 'blocks/aside.php'; ?>
	</div>
</main>
<?php require 'blocks/footer.php'; ?>
<script type="text/javascript">
    $("#exit_btn").click(function() {
        $.ajax({
        url: 'ajax/exit.php',
        type: 'POST',
        cache: false,
        data: {},
        dataType: 'html',
        success: function (data) {
            document.location.reload(true);
        }
        });
    });
    $("#loginForm").submit(function(event) {
		event.preventDefault();
		let login = $('#login').val();
		let password = $('#password').val();
		$.post('ajax/auth.php',
			{'login' : login, 'password' : password},
			function(data) {
				if (data == 'Готово') {
					$('#auth_user').text('Готово');
					$('#errorBlock').hide();
					document.location.reload(true);
				} else {
					$('#errorBlock').show();
					$('#errorBlock').text(data);
				}
			})
	});
</script>
</body>
</html>
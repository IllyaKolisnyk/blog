<!DOCTYPE html>
<html lang="ua">
<head>
    <?php
    $website_title = 'ДОБРА НОВИНА - Контакти';
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
                <form action="ajax/contacts.php" id="contactForm">
                    <h1 class="mb-4">Зворотній зв'язок</h1><br>
                    <label for="username">Введіть ваше ім'я:</label>
                    <input type="text" name="username" id="username" class="form-control">
                    <label for="email">Введіть ваш email:</label>
                    <input type="email" name="email" id="email" class="form-control">
                    <label for="message">Введіть ваше повідомлення:</label>
                    <textarea type="text" name="message" id="message" class="form-control"></textarea>
                    <div class="alert alert-danger mt-5" id="errorBlock"></div>
                    <button type="submit" class="btn btn-primary mt-3" id="send_contact">Відправити</button>
                </form>
            </div>
        </div>
        <?php require 'blocks/aside.php'; ?>
    </div>
</main>
<?php require 'blocks/footer.php'; ?>
<script type="text/javascript">
    $("#contactForm").submit(function(event) {
        event.preventDefault();
        let username = $('#username').val();
        let email = $('#email').val();
        let message = $('#message').val();
        $.post('ajax/contacts.php',
            {'username' : username, 'email' : email, 'message' : message},
            function(data) {
                if (data == 'Готово') {
                    $('#send_contact').text('Все готово');
                    $('#errorBlock').hide();
                    $('#username').val("");
                    $('#email').val("");
                    $('#message').val();
                } else {
                    $('#errorBlock').show();
                    $('#errorBlock').text(data);
                }
            })
    });
</script>
</body>
</html>
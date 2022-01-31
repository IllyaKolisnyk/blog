<?php
    if(!isset($_COOKIE['login'])) {
        header('Location: auth.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="ua">
<head>
    <?php
    $website_title = 'ДОБРА НОВИНА - Додавання статті на сайті';
    require 'blocks/head.php';
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        input {
            text-align: center;
        }
        h1 {
            color: #0d6efd;
        }
        form {
            padding-top: 0;
        }
    </style>
</head>
<body>
<?php require 'blocks/header.php'; ?>
<main class="container mt-5">
    <div class="row">
        <div class="col-md-8 core_site">
            <div class="wrap">
                <form action="ajax/add_article.php" id="add_article-Form">
                    <h1 class="mb-4">Додавання статті</h1><br>
                    <label for="title">Заголовок статті</label>
                    <input type="text" name="title" id="title" class="form-control">
                    <label for="intro">Інтро статті</label>
                    <textarea name="intro" id="intro" class="form-control"></textarea>
                    <label for="text">Текст статті</label>
                    <textarea name="text" id="text" class="form-control"></textarea>
                    <div class="alert alert-danger mt-5" id="errorBlock"></div>
                    <button type="submit" class="btn btn-primary mt-3" id="add_article">Додати</button>
                </form>
            </div>
        </div>
        <?php require 'blocks/aside.php'; ?>
    </div>
</main>
<?php require 'blocks/footer.php'; ?>
<script type="text/javascript">
    $("#add_article-Form").submit(function(event) {
        event.preventDefault();
        let title = $('#title').val();
        let intro = $('#intro').val();
        let text = $('#text').val();
        $.post('ajax/add_article.php',
            {'title' : title, 'intro' : intro, 'text' : text},
            function(data) {
                if (data == 'Готово') {
                    $('#add_article').text('Все готово');
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
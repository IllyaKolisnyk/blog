<!DOCTYPE html>
<html lang="ua">
<head>
    <?php
    require_once 'mysql_connect.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM `articles` WHERE `id` = :id";
    $query = $pdo->prepare($sql);
    $query->execute(['id' => $id]);
    $article = $query->fetch(PDO::FETCH_OBJ);
    $website_title = $article->title;
    require 'blocks/head.php';
    ?>
    <style>
        h1, h3, h4 {
            text-align: center;
        }
        h1 {
            color: #0d6efd;
        }
        .container-fluid span {
            color: #0d6efd;
        }
        label {
            margin-bottom: 10px;
        }
        form {
            margin-top: 55px;
        }
    </style>
</head>
<body>
<?php require 'blocks/header.php'; ?>
<main class="container mt-5">
    <div class="row">
        <div class="col-md-8 core_site">
            <div class="container-fluid py-5 bg-light">
                <h1><?=$article->title?></h1><br>
                <p><b>Автор статті:</b> <span><?=$article->avtor?></p></span>
                <p><?php
                    $date = date('d ', $article->date);
                    $mounth = ["Січня", "Лютого", "Березня", "Квітня", "Травня", "Червня", "Липня", "Серпня", "Вересня", "Жовтня", "Листопада", "Грудня"];
                    $date .= $mounth[date('n', $article->date) - 1];
                    $date .= date(' H:i', $article->date);
                    echo '<b>Час публікації:</b> '.$date;
                ?></p>
                <p><?=$article->intro?></p>
                <p><?=$article->text?></p>
            </div>
            <form action="news.php?id=<?=$_GET['id']?>" method="post" id="commentForm">
                <h3 class="mt-2">Коментарі</h3>
                <label for="username">Введіть ваше ім'я:</label>
                <input type="text" name="username" id="username" class="form-control" value="<?php
                if (isset($_COOKIE['login']))
                    echo $_COOKIE['login'];
                ?>">
                <label for="message">Введіть текст вашого коментаря:</label>
                <textarea name="message" id="message" class="form-control"></textarea>
                <button type="submit" class="btn btn-primary mt-3" id="add_comment">Прокоментувати</button>
            </form>
            <?php
            if(isset($_POST['username']) && isset($_POST['message'])) {
                $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
                $message = trim(filter_var($_POST['message'], FILTER_SANITIZE_STRING));
                $article_id = $_GET['id'];
                $sql = "INSERT INTO comments(username, message, article_id) VALUES ('$username', '$message', '$article_id')";
                $query = $pdo->query($sql);
            }
            $sql = "SELECT * FROM `comments` WHERE `article_id` = :id ORDER BY `id` DESC";
            $query = $pdo->prepare($sql);
            $query->execute(['id' => $_GET['id']]);
            /*while($row = $query->fetch(PDO::FETCH_OBJ)) {
                echo '<p>'.$row->username.'<br>'.$row->message.'</p><hr><br>';
            }*/
            $comments = $query->fetchAll(PDO::FETCH_OBJ);
            foreach ($comments as $comment) {
                echo "<div class='alert alert-info mt-5'><h4>$comment->username</h4><p>$comment->message</p></div>";
            }
            ?>
        </div>
        <?php require 'blocks/aside.php'; ?>
</main>
<?php require 'blocks/footer.php'; ?>
</body>
</html>
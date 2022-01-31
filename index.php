<!DOCTYPE html>
<html lang="ua">
<head>
	<?php
		$website_title = 'ДОБРА НОВИНА - Головна сторінка';
		require 'blocks/head.php';
	?>
    <style>
        h2 {
            text-align: center;
            color: #0d6efd;
        }
    </style>
</head>
<body>
<?php require 'blocks/header.php'; ?>
<main class="container mt-5">
	<div class="row">
		<div class="col-md-8 core_site">
			<?php
                require_once 'mysql_connect.php';
                $sql = "SELECT * FROM `articles` ORDER BY `articles`.`date` DESC";
                $query = $pdo->query($sql);
                while($row = $query->fetch()) {
                    echo "<h2>".$title = $row['title']."</h2><br><br>"."<p>".$intro = $row['intro']."</p>"."<p><b>Автор статті:</b> <span style='color: #0d6efd;'>".$avtor = $row['avtor']."</p></span><a href='news.php?id=".$id = $row['id']."' title='".$title = $row['title']."'><button class='btn btn-warning mb-5'>Прочитати більше</button><br></a>";
                }
            ?>
		</div>
			<?php require 'blocks/aside.php'; ?>
	</div>
</main>
<?php require 'blocks/footer.php'; ?>
</body>
</html>
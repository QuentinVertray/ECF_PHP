<?php
use ECF\User;
use ECF\Posts;
use ECF\Database;
include_once __DIR__ . DIRECTORY_SEPARATOR . "template" . DIRECTORY_SEPARATOR . "header.php";

$pdo = new Database();
$stmt = $pdo->prepare("SELECT title, createdAt, user.name AS author, body FROM posts JOIN user ON posts.userId = user.id");
$stmt->execute();

$posts = $stmt->setFetchMode(PDO::FETCH_CLASS, Posts::class);

$posts = $stmt->fetchAll();

// Pour l'AJAX, regarder les cours du 19/10 et 20/10
?>

    <h1>Bienvenue</h1>
    <?php foreach ($posts as $post) : ?>
    <div class="card" style="width: 18rem;">
        <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" role="img" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"></rect><text x="50%" y="50%" fill="#dee2e6" dy=".3em"></text></svg>
        <div class="card-body">
            <h5 class="card-title"><?= $post->getTitle() ?></h5>
            <p class="card-text"><?= $post->getCreatedAt() ?>.</p>
            <p class="card-text"><?= $post->getAuthor() ?></p>
            <p class="card-text"><?= $post->getBody() ?></p>
            <a href="#" class="btn btn-primary">Voir l'article</a>
        </div>
    </div>
    <?php endforeach ?>

<?php
include_once __DIR__ . DIRECTORY_SEPARATOR . "template" . DIRECTORY_SEPARATOR . "footer.php";
?>
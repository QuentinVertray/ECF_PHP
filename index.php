<?php
use ECF\Posts;
use ECF\Database;
include_once __DIR__ . DIRECTORY_SEPARATOR . "template" . DIRECTORY_SEPARATOR . "header.php";

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max($page, 1);
$limit = 12;
$offset = ($page - 1) * $limit;

$pdo = new Database();
$stmt = $pdo->prepare("SELECT posts.id, title, createdAt, user.name AS author, body FROM posts JOIN user ON posts.userId = user.id LIMIT :limit OFFSET :offset");
$stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();

$posts = $stmt->setFetchMode(PDO::FETCH_CLASS, Posts::class);

$posts = $stmt->fetchAll();



$prevPage = $page - 1;
$nextPage = $page + 1;
// Pour l'AJAX, regarder les cours du 19/10 et 20/10
?>

    <h1>Bienvenue</h1>
    <div class="container">
        <div class="row">
            <?php foreach ($posts as $post) : ?>
            <div class="col-md-3 mb-3">
                    <div class="card" style="width: 18rem;">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" role="img" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"></rect><text x="50%" y="50%" fill="#dee2e6" dy=".3em"></text></svg>
                        <div class="card-body">
                            <h5 class="card-title"><?= $post->getTitle() ?></h5>
                            <p class="card-text"><?= $post->getCreatedAt() ?>.</p>
                            <p class="card-text"><?= $post->getAuthor() ?></p>
                            <p class="card-text"><?= substr($post->getBody(), 0, 50) ?></p>
                            <a href="article.php?id=<?= $post->getId() ?>" class="btn btn-primary">Voir
                                l'article</a>
                        </div>
                    </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col text-start">
                <?php if ($page > 1): ?>
                    <a href="index.php?page=<?= $prevPage ?>" class="btn btn-primary">Précedent</a>
                <?php else: ?>

                <?php endif; ?>
            </div>
            <div class="col text-end">
                <?php if ($page <= 8): ?>
                    <a href="index.php?page=<?= $nextPage ?>" class="btn
                    btn-primary">Suivant</a>
                <?php else: ?>

                <?php endif; ?>
            </div>
        </div>
    </div>



<?php
include_once __DIR__ . DIRECTORY_SEPARATOR . "template" . DIRECTORY_SEPARATOR . "footer.php";
?>
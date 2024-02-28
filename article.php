<?php
use ECF\Posts;
use ECF\Comments;
use ECF\Database;
include_once __DIR__ . DIRECTORY_SEPARATOR . "template" . DIRECTORY_SEPARATOR . "header.php";

$pdo = new Database();

$articleId = isset($_GET['id']) ? intval($_GET['id']) : 0;

$articleStmt = $pdo->prepare("SELECT title, body FROM posts WHERE id = :articleId LIMIT 1");
$articleStmt->execute(['articleId' => $articleId]);
$article = $articleStmt->fetch(PDO::FETCH_OBJ);


$stmt = $pdo->prepare("SELECT name, email, comments.body FROM comments WHERE postId = :articleId LIMIT 2");
$stmt->execute(['articleId' => $articleId]);

$comments = $stmt->setFetchMode(PDO::FETCH_CLASS, Comments::class);

$comments = $stmt->fetchAll();



?>


<?php if ($article) : ?>
    <h3><?= $article->title ?></h3>
    <p><?= $article->body ?></p>
<?php else : ?>
    <p>Article non trouvé.</p>
<?php endif ?>

<h3>Les commentaires</h3>
<?php foreach ($comments as $comment) : ?>
    <div class="card mb-4">
        <div class="card-body">
            <p><?= $comment->getName() ?></p>
            <p><?= $comment->getEmail() ?></p>
            <p><?= $comment->getBody() ?></p>
        </div>
    </div>
<?php endforeach ?>

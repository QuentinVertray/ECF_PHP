<?php
use ECF\Posts;
use ECF\User;
use ECF\Database;
include_once __DIR__ . DIRECTORY_SEPARATOR . "template" . DIRECTORY_SEPARATOR . "header.php";

$pdo = new Database();
$posts = $pdo->query("SELECT posts.id, title, createdAt, user.name AS author, body FROM posts JOIN user ON posts.userId = user.id")->fetchAll(PDO::FETCH_CLASS,
    Posts::class);
?>

    <h1>Administration</h1>

    <h3>Gestion des utilisateurs</h3>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th># ID</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Created at</th>
                    <th>User ID</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($posts as $post) : ?>
                        <tr>
                            <td><?= $post->getID() ?></td>
                            <td><?= $post->getTitle() ?></td>
                            <td><?= $post->getBody() ?></td>
                            <td><?= $post->getCreatedAt() ?></td>
                            <td><?= $post->getAuthor() ?></td>
                            <td><a href="edit.php?id=<?= $post->getID()?>"
                                   class="btn
                            btn-success">Modifier</a><a href="#"
                                   class="btn
                            btn-danger">Supprimer</a></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

<?php
include_once __DIR__ . DIRECTORY_SEPARATOR . "template" . DIRECTORY_SEPARATOR . "footer.php";
?>
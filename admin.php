<?php
use ECF\User;
use ECF\Database;
include_once __DIR__ . DIRECTORY_SEPARATOR . "template" . DIRECTORY_SEPARATOR . "header.php";

$pdo = new Database();
$users = $pdo->query("SELECT * FROM user")->fetchAll(PDO::FETCH_CLASS,
    User::class);

dump($users);
?>

    <h1>Administration</h1>

    <h3>Gestion des utilisateurs</h3>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th># ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><?= $user->getID() ?></td>
                            <td><?= $user->getName() ?></td>
                            <td><?= $user->getEmail() ?></td>
                            <td><?= $user->getRole() ?></td>
                            <td><a href="edit.php?id=<?= $user->getID()?>"
                                   class="btn
                            btn-success">Modifier</a></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

<?php
include_once __DIR__ . DIRECTORY_SEPARATOR . "template" . DIRECTORY_SEPARATOR . "footer.php";
?>
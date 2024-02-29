<?php
use ECF\Posts;
use ECF\Database;
include_once __DIR__ . DIRECTORY_SEPARATOR . "template" . DIRECTORY_SEPARATOR . "header.php";

if(isset($_GET['id'])){
    $pdo = new Database();
    $stmt = $pdo->prepare("SELECT posts.id, title, createdAt, user.name AS author, body FROM posts JOIN user ON posts.userId = user.id WHERE posts.id = :id");
    $stmt->execute(['id' => $_GET['id']]);
    $stmt->setFetchMode(PDO::FETCH_CLASS, Posts::class);
    /**
     * @var Posts $posts
     */
    $posts = $stmt->fetch();
}else{
    header('Location: admin.php');
}

if(!empty($_POST)){
    $query = "UPDATE posts SET ";

    /** @var $posts */
    if($_POST['name'] !== $posts->getTitle()){
        $query .= "name = '" . $_POST['name'] ."'";
    }

    if($_POST['email'] !== $posts->getBody()){
        $query .=",email = '" . $_POST['email']."'";
    }

    if($_POST['role'] !== $posts->getCreatedAt()){
        $query .= ",role = '" . $_POST['role']."'";
    }

    $query .= " WHERE id = " . $posts->getId();

    /** @var $pdo */
    $pdo->query($query);
}

?>

<h1>Editer post N°<?= $posts->getID()?> </h1>

<form class="row g-3" method="POST" action="#">
    <div class="col-md-4">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" value="<?=
        $posts->getTitle() ?>" required>
    </div>
    <div class="col-md-4">
        <label class="form-label">Body</label>
        <div class="input-group">
            <input type="text" name="body" class="form-control" value="<?=
            $posts->getBody() ?>">
        </div>
    </div>
    <div class="col-md-4">
        <label class="form-label">Date</label>
        <input type="text" name="email" class="form-control" value="<?=
        $posts->getCreatedAt() ?>" required>
    </div>
    <div class="col-12">
        <button class="btn btn-primary" type="submit">Modifier</button>
    </div>
</form>
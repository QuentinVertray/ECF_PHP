<?php
use ECF\User;
use ECF\Database;
include_once __DIR__ . DIRECTORY_SEPARATOR . "template" . DIRECTORY_SEPARATOR . "header.php";

if(isset($_GET['id'])){
    $pdo = new Database();
    $stmt = $pdo->prepare("SELECT * FROM user WHERE id = :id");
    $stmt->execute(['id' => $_GET['id']]);
    $stmt->setFetchMode(PDO::FETCH_CLASS, User::class);
    /**
     * @var User $user
     */
    $user = $stmt->fetch();
}else{
    header('Location: admin.php');
}

if(!empty($_POST)){
    $query = "UPDATE user SET ";

    /** @var $user */
    if($_POST['name'] !== $user->getName()){
        $query .= "name = '" . $_POST['name'] ."'";
    }

    if($_POST['email'] !== $user->getEmail()){
        $query .=",email = '" . $_POST['email']."'";
    }

    if($_POST['role'] !== $user->getRole()){
        $query .= ",role = '" . $_POST['role']."'";
    }

    $query .= " WHERE id = " . $user->getId();

    /** @var $pdo */
    $pdo->query($query);
}

?>

<h1>Editer l'utilisateur N°<?= $user->getID()?> </h1>

<form class="row g-3" method="POST" action="#">
    <div class="col-md-4">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" value="<?=
        $user->getName() ?>" required>
    </div>
    <div class="col-md-4">
        <label class="form-label">Login</label>
        <div class="input-group">
            <span class="input-group-text" id="inputGroupPrepend2">@</span>
            <input type="text" name="login" class="form-control" value="<?=
            $user->getUsername() ?>" disabled>
        </div>
    </div>
    <div class="col-md-4">
        <label class="form-label">Email</label>
        <input type="text" name="email" class="form-control" value="<?=
        $user->getEmail() ?>" required>
    </div>
    <div class="col-md-3">
        <label class="form-label">Role</label>
        <select class="form-select" name="role" required>
            <option selected value="user">User</option>
            <option value="admin">Admin</option>
        </select>
    </div>
    <div class="col-12">
        <button class="btn btn-primary" type="submit">Modifier</button>
    </div>
</form>
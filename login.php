<?php
include_once __DIR__ . DIRECTORY_SEPARATOR . "template" . DIRECTORY_SEPARATOR . "header.php";

use ECF\User;
use ECF\Database;

$error = null;
$success = null;

if(!empty($_POST)){
    try {
        $pdo = new Database();
        $stmt = $pdo->prepare("SELECT * FROM user WHERE username = :username");
        $stmt->bindParam('username', $_POST['login'], PDO::PARAM_STR);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, User::class);
        /**
         * @var User $user
         */
        $user = $stmt->fetch();

        if($user){
            if($user->verifMDP($_POST['password'])){
                $success = "Vous êtes connectés";
                $_SESSION['user'] = true;
                $_SESSION['role'] = $user->getRole();
                header('Location: index.php');
            }else{
                $error = "Le mot de passe est incorrect";
            }
        }else{
            $error = "Le login est incorrect";
        }
    } catch (\PDOException $e){
        echo $e->getMessage();
    }
}
?>
<?php if(isset($_SESSION['user'])) : ?>
    <div class="alert alert-danger" role="alert">
        Vous êtes déjà connectés à votre session
    </div>
<?php else : ?>

    <?php if($error) : ?>
        <div class="alert alert-danger" role="alert">
            <?= $error ?>
        </div>
    <?php endif ?>

    <?php if($success) : ?>
        <div class="alert alert-success" role="alert">
            <?= $success ?>
        </div>
    <?php else: ?>
        <div class="row mt-3">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h1>Se connecter</h1>
                <form method="post" action="#">
                    <div class="mb-3">
                        <label for="inputLogin" class="form-label">Login</label>
                        <input required type="text" class="form-control" name="login"
                               id="inputLogin" placeholder="Login">
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword" class="form-label">Password</label>
                        <input required type="password" class="form-control"
                               name="password" id="inputPassword"
                               placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary">Se connecter</button>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    <?php endif ?>
<?php endif ?>

<?php
include_once __DIR__ . DIRECTORY_SEPARATOR . "template" . DIRECTORY_SEPARATOR . "footer.php";
?>
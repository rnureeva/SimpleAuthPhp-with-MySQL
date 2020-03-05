<?php
session_start();
$_SESSION['auth_user'] = false;
$error = false;
$success = false;
if (isset($_POST['send'])) {
	$host= 'localhost';
	$user= 'root';
	$password= '1qa2ws3ed';
	$dbname= 'test';
	$connect = mysqli_connect($host, $user, $password, $dbname);
	if(mysqli_connect_errno()) {
		echo mysqli_connect_error();
	} else {
		$email = $_POST['login'];
		$password = $_POST['password'];
		$query = "SELECT * FROM users WHERE email='$email' AND password= '$password'";
		$data = mysqli_query($connect,$query);
		if (mysqli_num_rows($data) == 1) {
			$success = true;
			$_SESSION['auth_user'] = true;
			$_SESSION['login '] = $_POST["login"];
			setcookie("login", $_POST['login'], time()+60*60*24*31, '/');
		} else {
			$error = true;
		}
	}
}
if (isset($_GET['chao'])) {
    session_unset();
    unset ($_SESSION['login']);
    session_destroy();
    unset($_SESSION['auth_user']);
    setcookie("login", "", time()-60, '/');
    header('Location: /?login=yes');
}
require ($_SERVER['DOCUMENT_ROOT'].'/template/header.php');
?>

    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td class="left-collum-index">

                <h1>Welcome to Project page!</h1>
                <p>Tell about this project to your friends!</p>


            </td>
            <td class="right-collum-index">

                <? if ((isset($_GET['login']) == 'yes' || $error == true)): ?>
                 <div class="project-folders-menu">
                    <ul class="project-folders-v">
                        <li class="project-folders-v-active"><a href="#">Authorization</a></li>
                        <li><a href="">Registration</a></li>
                        <li><a href="#">Fogot password?</a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>

                <div class="index-auth">
                    <form action="/" method="post">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td class="iat" <?= (!isset($_COOKIE["login"])) ? '': 'hidden' ?>
                                    <label for="login_id">Your email:</label>
                                    <input id="login_id" size="30" name="login" value="<?=$_COOKIE["login"] ?? ""?>" >
                                </td>
                            </tr>
                            <tr>
                                <td class="iat">
                                    <label for="password_id">Your password:</label>
                                    <input id="password_id" size="30" name="password" type="password" value="<?=$_POST['password'] ?? ""?>" >
                                </td>
                            </tr>
                            <tr>
                                <td><input type="submit" value="Log in" name="send"></td>
                            </tr>
                        </table>
                    </form>
                </div>
            <? endif; ?>
            <?php if ($error) {
                require_once ($_SERVER['DOCUMENT_ROOT'].'/include/error.php');
            } elseif ($success) {
                require_once ($_SERVER['DOCUMENT_ROOT'].'/include/success.php');
            }
            ?>
            </td>
        </tr>
    </table>

<?php require ($_SERVER['DOCUMENT_ROOT'].'/template/footer.php'); ?>

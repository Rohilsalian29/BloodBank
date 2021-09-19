<?php
require_once 'php/DBConnect.php';
$db = new DBConnect();
$db->authLogin();
// After successfull login taking the user to the home screen

$invalid=NULL;
if(isset($_POST['loginBtn'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $flag = $db->login($username, $password);
    if($flag){
        header("Location: http://localhost/dashboard/bloodbank/home.php");
    } else {
        $message = "Username of password was incorrect!";
    }
}
$title="Login";
// include 'layout/_login_nav.php';
include 'layout/_header.php'; 
?>

<div class="container">
<div class="row">
    <div class="col-md-7">
        <?php if(isset($message)): ?>
        <div class="alert-danger"><?= $message; ?></div>
        <?php endif; ?>
        <div class="panel">
            <div class="panel-heading">
                <div class="col-md-7">
                    <h2> Login </h2>
                </div>
                <!-- <h5 class="heading"> User Login </h5> -->
            </div>
            <div class="panel-body">
                <form class="form-vertical" role="form" method="post" action="index.php" autocomplete="off">
                    <div class="form-group">
                        <input type="text" class="form-control" required="true" name="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="password" required="true" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div class="form-group loginBtn">
                        <button type="submit" name="loginBtn" class="btn btn-danger btn-sm"> Admin Login</button>
                        <a href="users/" class="btn btn-sm btn-primary">Donor/User</a>
                        
                    </div>
                </form>
            </div>
			</div>
        </div>
    </div>

</div>

<?php include 'layout/_footer.php'; ?>


<?php
function Login($Username, $Password, $pdo)
{
    $parameters = array(
        ':Username' => $Username
    );

    $sth = $pdo->prepare('SELECT * FROM login WHERE Username = :Username');

    $sth->execute($parameters);

    
	if ($sth->rowCount() == 1) 
	{
		$row = $sth->fetch();
    if ($row['Password'] == $Password) 
		{

			$_SESSION['UserID'] = $row['UserID'];
			$_SESSION['Username'] = $Username;
			$_SESSION['login_string'] = $Password;

			return true;
		 } 
		 else 
		 {
			return false;
		 }
	}
	else
	{
		return false;
	}
}
$error = NULL;
if (isset($_POST['Login'])) {
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];

    if (Login($Username, $Password, $pdo)) {
		echo "You Logged In";
		
    } else {
        $error = "The Password or the Username is incorrect";
        require('LoginForm.php');
    }
} else {
    require('LoginForm.php');
}

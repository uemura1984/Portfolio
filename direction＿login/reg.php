<?php
$status='no';
if(isset($_POST['username'])){
	$username=htmlspecialchars($_POST['username'],ENT_QUOTES);
	$password=htmlspecialchars($_POST['password'],ENT_QUOTES);
	require_once('dbh.php');
	$stmt=$dbh->prepare('INSERT INTO usrlist VALUES(?,?)');
	if($stmt->execute(array($username,$password))){
		$status='ok';	

	}else{
		$status='failed';

	}

}


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link type="text/css" rel="stylesheet" href="style.css">
<title>新規登録</title>
</head>
<body>
<div class="container">
	<div class="content">
		<h1>新規登録</h1>
		<?php if($status=='ok'):?>
			<p>登録できました</p>		
		<?php elseif($status=='failed'): ?>
			<p>既にそのユーザー名は登録済みです</p>
		<?php else: ?>
			<form action="reg.php" method="post">
				<p>ユーザー名<br><input type="text" name="username" required></p>
				<p>パスワード<br><input type="password" name="password" required></p>
				<input type="submit" value="登録">

			</form>
		<?php endif; ?>
		<a href="index.html">トップに戻る</a>
	</div>
</div>
</body>
</html>
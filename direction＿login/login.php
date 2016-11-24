<?php
$status='none';
if(isset($_POST['username']) && isset($_POST['password'])){
$username=htmlspecialchars($_POST['username'],ENT_QUOTES);
$password=htmlspecialchars($_POST['password'],ENT_QUOTES);
require_once('dbh.php');
$stmt=$dbh->prepare('SELECT count(*) FROM usrlist WHERE name=? AND pass=?');
$stmt->execute(array($username,$password));
//echo '条件に合致する行数'.$stmt->fetchColumn();

	if($stmt->fetchColumn()==1){
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
<title></title>
</head>
<body>
<div class="container">
	<div class="content">
		<h1>ログイン</h1>
		<?php if($status=='logged_in'): ?>
			<p>ログイン済み</p>
			<p>以下表示コンテンツ</p>
		<?php elseif($status=='ok'): ?>
			<p>ログイン成功</p>
			<p>以下表示コンテンツ</p>
		<?php elseif($status=='failed'): ?>
			<p>ログイン失敗</p>
			<a href="login.php">ログイントップへ</a>

		<?php else: ?>
			<form action="login.php" method="post">
				<p>お名前<br>
					<input type="text" name="username"></p>
				<p>パスワード<br>
					<input type="password" name="password"></p>
				<input type="submit" value="ログイン">

			</form>
		<?php endif; ?>
	</div>
</div>

</body>
</html>
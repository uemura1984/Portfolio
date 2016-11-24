<?php
$w='ir';

/*
GETで受ける変数が一つの場合
isset($_GET['news'])
複数ある場合
$_SERVER['REQUEST_METHOD']==='GET'
もしGET送信で何か送られて来れば
*/

if($_SERVER['REQUEST_METHOD']==='GET'){
$w=htmlspecialchars($_GET['news'],ENT_QUOTES);

$word=array(
	'ir'=>'トップ',
	'y'=>'社会',
	's'=>'スポーツ',
	'e'=>'エンタメ',
	'w'=>'国際'
);

$more=htmlspecialchars($_GET['more'],ENT_QUOTES)

}



//リクエストをする
$request = 'http://news.google.com/news?hl=ja&ned=us&ie=UTF-8&oe=UTF-8
&output=rss&topic='.$w;
 
$result=simplexml_load_file($request);
/*
echo '<pre>';
print_r($result);

echo '</pre>';
*/
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link type="text/css" rel="stylesheet" href="./css/main.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="./js/main.js"></script>
<title>news</title>
</head>
<body>
<div class="container">
	<h1>Googleニュース検索</h1>
	<nav>
		<ul>
			<li><a href="index.php?news=ir">top</a></li>
			<li><a href="index.php?news=y">社会</a></li>
			<li><a href="index.php?news=s">スポーツ</a></li>
			<li><a href="index.php?news=e">エンタメ</a></li>
			<li><a href="index.php?news=w">国際</a></li>
		</ul>
	</nav>
	<div class="search">
		<form action="result.php" method="POST">
			<input type="text" name="word">
			<input type="submit" value="トップニュースから検索する">	
		</form>
	</div>
	<div class="content">
		<h2><?php 
			if(isset($_GET['news'])){
				
				echo $word[$w];

			}else{
				echo 'トップ';
			}

		?>
		ニュース</h2>

		<?php foreach($result->channel->item as $item):?>
				<div class="box">
				<a href="<?php echo $item->link ;?>" target="blank"><h2><?php echo $item->title; ?></h2></a>	
				<p><?php echo $item->description; ?></p>
				</div>
			<?php endforeach; ?>
		<?php if(isset($_GET['news'])): ?>
			<a href="index.php?">もっと見る</a>
		<?php endif; ?>

	</div>
</div>
</body>
</html>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Games I Want | News</title>
	<link rel="shortcut icon" href="img/favicon.png" type="image/png"/>
	<link rel="stylesheet" href="css/news.css">
	<link rel="stylesheet" href="fontawesome/css/all.css">
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
</head>
<body>
<?php
	include_once('header.php');
?>

<div class="container main-container">
	<?php
		require_once ('controllers/connection.php');
		
		$conn = new connection();
		$conn->connect();
		
		$query = "select
 					news_id,
 					title,
 					shortdesc,
 					fulldesc,
 					DATE_FORMAT(releasedate,'%M %d, %Y') as 'releasedate'
 				  from news order by releasedate desc, news_id desc limit 10";
		
		$result = $conn->command->query($query);
		
		if ($result){
			$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
			
			if (count($rows) > 0){
				$ctl = 0;
				
				for ($i = 0; $i < count($rows); $i++){
					if ($ctl == 0){
						echo '<div class="row">';
						echo    '<div class="news-container left" id="'.$rows[$i]{"news_id"}.'">';
						echo        '<div class="ribbon"><span>'.$rows[$i]{"releasedate"}.'</span></div>';
						echo        '<div class="img-container"><img src="img/news/thumb'.$rows[$i]{"news_id"}.'.jpg" alt=""></div>';
						echo        '<div class="news-title">';
						echo            '<div class="title">'.$rows[$i]{"title"}.'</div>';
						echo            '<hr>';
						echo            '<div class="short-desc">'.$rows[$i]{"shortdesc"}.'</div>';
						echo            '<div class="read-more">Read More</div>';
						echo        '</div>';
						echo    '</div>';
						
						if ($i == (count($rows) - 1)){
							echo    '</div>';
						}
						
						$ctl = 1;
					}else{
						echo    '<div class="news-container right" id="'.$rows[$i]{"news_id"}.'">';
						echo        '<div class="ribbon"><span>'.$rows[$i]{"releasedate"}.'</span></div>';
						echo        '<div class="img-container"><img src="img/news/thumb'.$rows[$i]{"news_id"}.'.jpg" alt=""></div>';
						echo        '<div class="news-title">';
						echo            '<div class="title">'.$rows[$i]{"title"}.'</div>';
						echo            '<hr>';
						echo            '<div class="short-desc">'.$rows[$i]{"shortdesc"}.'</div>';
						echo            '<div class="read-more">Read More</div>';
						echo        '</div>';
						echo    '</div>';
						echo   '</div>';
						
						$ctl = 0;
					}
				}
			}
		}
	?>
</div>

<div class="news-modal">
	<i class="fas fa-times" id="btn-close-modal"></i>
	<div class="container">
		<div class="modal-content">
			<div class="preloader"></div>
		</div>
	</div>
</div>

<?php
	include_once('footer.php');
?>

<script type="text/javascript" src="js/news.js"></script>
<script type="text/javascript" src="js/header.js"></script>
</body>
</html>
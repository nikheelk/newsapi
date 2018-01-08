<!DOCTYPE html>
<html lang="en">
<head>
  <title>Top Headlines</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<link href="style.css" type="text/css" rel="stylesheet"  />
<script>
	$(document).ready(function(){    
	   $('#myModal').modal('show');
	});
</script>
<?php
	$newsId = $_GET['id'];
	$url = 'https://newsapi.org/v2/top-headlines?sources='.$newsId.'&apiKey=7c0be0af6b9b4d53840b91eca24f4b10';
	$urlArticles = file_get_contents($url);
	$urlArticlesArray = json_decode($urlArticles, true);
	$articles = $urlArticlesArray['articles'];
	foreach($articles as $key=>$value) {
		$ids = $value['author'];
		$title = $value['title'];
		$description = $value['description'];
		$url = $value['url'];
		$urlToImage = $value['urlToImage'];
		$published = $value['publishedAt'];
?>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" onClick="javascript:window.location='index.php'">&times;</button>
        <h4 class="modal-title">News Information</h4>
      </div>
      <div class="modal-body">		
		<p><b>News Headline : </b><?php echo $title ?></p>
		<p><b>News Description : </b><?php echo $description ?></p>
		<p><b>Date : </b><?php echo $published ?></p>
		<p><b>Author : </b><?php echo $ids ?></p>
		<p><img src="<?php echo $urlToImage ?>"></img></p>	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" onClick="javascript:window.location='index.php'">Close</button>
      </div>
    </div>
  </div>
</div>
<?php			
      }
?>
</body>
</html>
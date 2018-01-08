<link href="style.css" type="text/css" rel="stylesheet"  />
<?php
	$urlArticles = file_get_contents('https://newsapi.org/v2/sources?apiKey=7c0be0af6b9b4d53840b91eca24f4b10');		
	$urlArticlesArray = json_decode($urlArticles, true);
	$sources = $urlArticlesArray['sources'];
	echo '<table><th>News Sources</th>';
	echo '<tr><td>';
	echo '<ul>';
	foreach($sources as $key=>$value) {
			$newId = $value['id'];
			echo '<li><a href="information.php?id=' .$newId. '"><font>'.$value['name'].'</font></a><br></li>';
         }
	echo '</ul>';
	echo '</td></tr>';
	echo '</table>';
?>


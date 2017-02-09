<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>RSS Reader</title>
		<link rel="stylesheet" type="text/css" href="style/stylesheet.css">
	</head>
	<body>
		<h1>RSS Reader</h1>

		<main>
			<?php 
				function get_feed($url) {
					$content = file_get_contents($url);
					$xml = new SimpleXmlElement($content);
					
					echo '<img id="feed-image" src="'.$xml->channel->image->url.'"></img>';
					echo '<h2 id="feed-title">'.$xml->channel->title.'</h2>';
					

					foreach ($xml->channel->item as $entry) {
						echo '<a href="'.$entry->link.'"><div class="rss-item">';
						echo $entry->title.'<br><i>'.$entry->pubDate;
						echo '</i></div></a>';
					}
				}

				if (isset($_GET['rss_url'])) {
					get_feed($_GET['rss_url']);
				} else {
					?>
						<form>
							<input type="text" name="rss_url" id="rss_url">
						</form>
					<?php
				}
			?>
		</main>

		
	</body>
</html>
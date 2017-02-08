<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
	</head>
	<body>
		<?php 
			function get_feed($url) {
				$content = file_get_contents($url);
				$xml = new SimpleXmlElement($content);

				echo '<h2>'.$xml->channel->title.'</h2>';
				echo '<img src="'.$xml->channel->image->url.'"></img>';

				echo '<ul>';

				foreach ($xml->channel->item as $entry) {
					echo '<li><a href="'.$entry->link.'">'.$entry->title.'</a> - <i>'.$entry->pubDate.'</i></li>';
				}

				echo '</ul>';
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
	</body>
</html>
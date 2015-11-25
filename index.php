<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<style>
		li{list-style-type: none;}
		</style>
		<?php if(empty($_GET)): ?>

			<form action="index.php" method="GET">
 				<?php
 					$id = 0;
 					$class = 0;
 					$dirSystem = array();
 					$lastDirSystem = array();
 					$lastIsDir = DIRECTORY_SEPARATOR;
 					$showPath = "";
					foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator('.')) as $path)
					{
						echo("$path<br>\n");
					}				
 				?>
 				<input type="submit" value="OK">
			</form>
		<?php  
			else:
				
			endif;
		?>
	</body>
</html>

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
		
		<script>
		function toggle(source) {
			var checkboxes = document.getElementsByTagName("input");
			for (var i = 0, len = checkboxes.length; i < len; i++) 
			{
  				if(checkboxes[i]["value"].indexOf(source.value) != -1)
  					checkboxes[i].checked = source.checked;
			}
		}
		</script>

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
						$path = substr($path, 1);
						if(substr($path, strlen($path)-2) == "..") 
							continue;
						if(substr($path, strlen($path)-1) == ".") 
							$path = substr($path, 0, strlen($path)-1);
						$showPath = $path;						
						$dirSystem = explode(DIRECTORY_SEPARATOR, $path);
						unset($dirSystem[count($dirSystem)-1]);
						unset($dirSystem[0]);
						$dif = count($dirSystem) - count($lastDirSystem);
						//echo("<b>$dif </b>"); //DEBUG

						//Kontrola jestli se jedná o soubor nebo složku a následné odsazení souborů
						$isDir = substr($path, strlen($path)-1) == DIRECTORY_SEPARATOR;
						if($isDir != DIRECTORY_SEPARATOR && $lastIsDir == DIRECTORY_SEPARATOR)
							$dif += 1;
						else if($isDir == DIRECTORY_SEPARATOR && $lastIsDir != DIRECTORY_SEPARATOR)
							$dif -= 1;
						//Příprava outputu
						$output = "<li><input type='checkbox' name='$id' value='$path' onClick='toggle(this)'>$showPath</li>";
						//Dorovnávání rozdílu do 0
						while($dif != 0)
						{							
							if($dif > 0)
							{
								$class++;
								$output = "<ol>$output";
								$dif--;
							}
							else
							{
								$output = "</ol>$output";
								$dif++;
							}
						}

						echo("\t\t\t\t$output\n");

						///////////
						///DEBUG///
						///////////
						foreach ($dirSystem as $key => $value) {
							//echo("$key: $value, "); //DEBUG
						}					
						///////////
						///DEBUG///
						///////////
   						
   						$lastDirSystem = $dirSystem;
   						$lastIsDir = $isDir;
   						$id++;
					}
					echo("\t\t\t\t</ol></ol>\n")					
 				?>
 				<input type="submit" value="OK">
			</form>
		<?php  
			else:
				
			endif;
		?>
	</body>
</html>

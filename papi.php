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
 					$dir = '.';
$directories = array();
$files_list  = array();
$files = scandir($dir);
foreach($files as $file){
   if(($file != '.') && ($file != '..')){
      if(is_dir($dir.'/'.$file)){
         $directories[]  = $file;

      }else{
         $files_list[]    = $file;

      }
   }
}

foreach($directories as $directory){
   echo '<li class="folder">'.$directory.'</li>';
}
foreach($files_list as $file_list){
   echo '<li class="file">'.$file_list.'</li>';
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

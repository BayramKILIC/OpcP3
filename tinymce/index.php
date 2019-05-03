<!DOCTYPE html>
<html>
<head>
   
</head>
<body>
<?php 
if (!isset($_POST['texte'])) {  ?>
	

	<form action="index.php" method="post">
		<div>
        	<label for="titre">Titre</label><br />
        	<input type="text" id="titre" name="titre" />
    	</div>
  		<textarea class="tinymce" id="texte" name="texte"></textarea>
  		<input type="submit" />
	</form>

  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="plugin/tinymce/tinymce.min.js"></script>
  <script type="text/javascript" src="plugin/tinymce/init-tinymce.js"></script>
 <?php
  	} else {

  		echo htmlspecialchars($_POST['texte']);
  	}


?>



</body>
</html>
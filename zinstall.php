<?php
$flag = 0;
$error_list = array();

if(!version_compare(PHP_VERSION, "5.2.2", ">=")) {
  $error_list[] = 'El sistema requiere una versión PHP mayor a 5.2.2';
  $flag = 1;
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
	<meta charset="UTF-8" />
	<meta name="language" content="en" />
	<title>Instalación</title>
<link href="<?php echo $_SERVER['REQUEST_URI']?>/../css/installation.css" type="text/css" rel="stylesheet">
    </head>
   <body>
   <div class="container">
   <div class="content">
	<div class="header">
		<h1 class="title">Instalación</h1>
		<span>Bienvenido al instalador! Estamos verificando que el sistema cumpla los requerimientos.</span>
	</div>


<?php if($flag == 1) { ?>
	<div class="require-note">
    <h2 class="title">No se podrá instalar el sistema... </h2>
	<ul class="error-list">
<?php
	foreach($error_list as $err)
	   echo "<li>".$err."</li>";
	echo '</ul></div>';
}

else {
    /*
	unlink('install.php');
    */

    echo '<div class="req-finish">';
    echo 'Se completó la revisión de requisitos exitosamente.<br> <a href="configForm.php">Ingresa aquí</a> para conectar la base de datos.</div>';
}
?>

</div></div>
</body>
</html>



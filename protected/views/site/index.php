<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
	<meta charset="UTF-8" />
	<meta name="language" content="en" />
	<title>Instalación</title>
<link href="<?php echo Yii::app()->baseUrl; ?>/css/installation.css" type="text/css" rel="stylesheet">
    </head>
   <div class="container">
   <div class="content">
	<div class="header">
        <h1 class="title">Instalación</h1>
	</div>


<?php

	$sql = file_get_contents(Yii::app()->basePath.'/data/db.sql');
	$command=Yii::app()->db->createCommand($sql);
	$command->execute();

echo '<span style="float: left; margin-top:10px; color: green; font-size: 15px;">Se ha finalizado el proceso de configuración de la base de datos. <br> Favor de hacer click '.CHtml::link('aquí', 'createOrg').' para registrar un Instituto.</span>';

?>

</div>
</div></body>
</html>

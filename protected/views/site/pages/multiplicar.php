<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
    <meta charset="UTF-8" />
    <meta name="language" content="en" />
    <title>Juegos</title>
    <link href="<?php echo Yii::app()->baseUrl; ?>/css/newstyle.css" type="text/css" rel="stylesheet">
    </head>
<body>
    <div class="container">
        <div id="content">
            <h1>
                <?php echo CHtml::link('Regresar', array('page', 'view'=>'juegos'), array('class'=>'changeForm')); ?>
            </h1>
<div class="row">
<iframe style="margin:0 auto; display: block" width="600" height="492"
src="http://www.cyberkidz.es/cyberkidz/library/rekenen/groep4/rekenen1/spel.swf?spelUrl=library/rekenen/groep4/rekenen1/&spelNaam=Tablas%20de%20multiplicar%201,2,5%20y%2010" frameborder="0"></iframe>
</div>
        </div>
    </div>
</body>

<?php echo $this; ?>
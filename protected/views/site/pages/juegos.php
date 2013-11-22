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
            <h1>Lista de Juegos</h1>
            <h2>Matemáticas</h2>
            <ul>
                <li><?php echo CHtml::link('Tablas de Multiplicar', array('page', 'view'=>'multiplicar'), array('class'=>'changeForm')); ?></li>
            </ul>

            <h2>Geografía</h2>
            <ul>
                <li><?php echo CHtml::link('Banderas del Mundo', array('page', 'view'=>'banderas'), array('class'=>'changeForm')); ?></li>
            </ul>
        </div>
    </div>
</body>

<?php echo $this; ?>
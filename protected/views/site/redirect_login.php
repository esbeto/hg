<br />
<h2>Los datos se guardaron con éxito. Te hemos enviado los detalles de login al email registrado.</h2>

<p><?php echo CHtml::link('Click aquí',Yii::app()->createUrl('site/login'));?> para ingresar </p>


<div style="color: green; font-size: 17px; font-weight: 700;">
<?php //$userCount = User::model()->count();
	$user = User::model()->findByPk(1);
	echo 'Tu usuario y contraseña son: '.$user->user_organization_email_id."\n";
  //}
?>
</div>

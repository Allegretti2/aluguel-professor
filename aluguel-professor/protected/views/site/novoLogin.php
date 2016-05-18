<fieldset>
	<legend>Login</legend>
	<?php
		echo CHtml::beginForm(Yii::app()->createAbsoluteUrl("site/novoLogin"), 'POST', array());
		echo CHtml::label('CPF: ', 'label_cpf');
		echo CHtml::textField('Pessoa[CPF]', '', array('maxlength'=>11));
		echo "<br />";
		
		echo CHtml::label('Senha: ', 'label_senha');
		echo CHtml::passwordField('Pessoa[Senha]', '', array('maxlength'=>14));
		echo "<br />";
		
		echo CHtml::submitButton('Enviar');
	?>
</fieldset>
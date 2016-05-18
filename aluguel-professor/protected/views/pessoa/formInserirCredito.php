<?php
	echo CHtml::beginForm(Yii::app()->createAbsoluteUrl("pessoa/inserirCredito"), 'POST', array());
	echo CHtml::label('Quantidade para depositar: ', 'label_deposito', array());
	echo CHtml::textField('Pessoa[Depositar]', "", array());
	echo CHtml::submitButton('Enviar', array());
?>
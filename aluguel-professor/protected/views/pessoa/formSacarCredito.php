<?php
	echo CHtml::beginForm(Yii::app()->createAbsoluteUrl("pessoa/sacarCredito"), 'POST', array());
	echo CHtml::label('Quantidade para sacar: ', 'label_sacar', array());
	echo CHtml::textField('Pessoa[Sacar]', "", array());
	echo CHtml::submitButton('Enviar', array());
?>
<?php
	echo CHtml::beginForm(Yii::app()->createAbsoluteUrl("disciplina/salvarDisciplina"), 'POST', array());
	echo CHtml::activeHiddenField($disciplina, 'CodDisciplina', array());
	echo CHtml::label('Nome da disciplina: ', 'label_nome_disc', array());
	echo CHtml::activeTextField($disciplina, "NomeDisciplina", array());
	
	echo "<br />";
	
	echo CHtml::label('Preço: ', 'label_preco_disc', array());
	echo CHtml::activeTextField($disciplina, "PrecoDisciplina", array());
	
	echo "<br />";
	
	echo CHtml::submitButton('Enviar', array());
?>
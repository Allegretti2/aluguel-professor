<?php
	echo CHtml::beginForm(Yii::app()->createAbsoluteUrl("pessoa/meuPerfil"), 'POST', array());
	echo CHtml::activeHiddenField($pessoa, 'CodPessoa', array());
	
	echo CHtml::label('Nome: ', 'label_nome');
	echo CHtml::activeTextField($pessoa, 'NomePessoa', array('required'=>true, 'maxlenght'=>20));
	echo "<br />";
	
	echo CHtml::label('CPF: ', 'label_cpf');
	echo CHtml::activeTextField($pessoa, 'CPFPessoa', array('required'=>true, 'maxlenght'=>11));
	echo "<br />";
	
	echo CHtml::label('Email: ', 'label_email');
	echo CHtml::activeTextField($pessoa, 'EmailPessoa', array('required'=>true, 'maxlenght'=>20));
	echo "<br />";
	
	echo CHtml::label($pessoa->isNewRecord ? 'Senha: ' : 'Nova senha: ', 'label_senha');
	echo CHtml::passwordField('Pessoa[NovaSenha]', '', array('required'=>true, 'maxlenght'=>14));
	echo "<br />";
	
	echo CHtml::label('Insira novamente a senha: ', 'label_senha2');
	echo CHtml::passwordField('Pessoa[SenhaRepetida]', '', array('required'=>true, 'maxlenght'=>14));
	echo "<br />";
	
	if ($pessoa->isNewRecord)
	{
		echo CHtml::label('Você é um(a): ', 'label_categoria');
		echo CHtml::radioButtonList('Pessoa[Indicador]', '', array(1=>'Aluno(a)', 2=>'Professor(a)'), array('required'=>true, 'separator' => " | "));
		echo "<br />";
	}
	
	echo CHtml::submitButton(!Yii::app()->user->isGuest ? 'Atualizar Cadastro' : 'Abrir uma conta');
?>
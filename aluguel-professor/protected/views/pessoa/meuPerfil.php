<style>
div.form-perfil {
    text-align: center;
}
</style>

<?php
	if ($pessoa->isNewRecord)
		$legend = 'Cadastro';
	else
		$legend = 'Editar Perfil';
?>
<fieldset>
	<legend><?=$legend;?></legend>
	<div class="form-perfil">
		<?php
			echo CHtml::beginForm(Yii::app()->createAbsoluteUrl("pessoa/meuPerfil"), 'POST', array());
			if ($pessoa->isNewRecord)
			{
				echo CHtml::label('Você é um(a): ', 'label_categoria');
				echo CHtml::radioButtonList('Pessoa[Indicador]', '', array(1=>'Aluno(a)', 2=>'Professor(a)'), array('required'=>true, 'separator' => " "));
				echo "<br /><br />";
			}
			?>
			<div class="row">
			<div class="column medium-7" style="text-align: right; margin-right: 10px;">
			<?php
				echo CHtml::activeHiddenField($pessoa, 'CodPessoa', array('style'=>'margin-bottom: 8px;'));
				echo "<br />";
				
				echo CHtml::label('Nome: ', 'label_nome');
				echo CHtml::activeTextField($pessoa, 'NomePessoa', array('required'=>true, 'maxlenght'=>20, 'style'=>'margin-bottom: 8px;'));
				echo "<br />";
				
				echo CHtml::label('Data de nascimento: ', '', array());
				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
					'name' => 'Pessoa[DataNascimentoPessoa]',
					'value'=>$pessoa->DataNascimentoPessoa,
					'options' => array(
						'showAnim' => 'slideDown',
						'dateFormat'=>'dd/mm/yy',
					),
					'language' => 'pt',
					//'htmlOptions'=>array('required'=>true,'size'=>'20', 'class'=>'date', 'onchange' => 'calculaNumeroDias()', 'onblur'=>"calculaNumeroDias()", 'disabled'=> isset($readonly) ? true : false),
				));
				echo "<br />";
				
				echo CHtml::label('Gênero: ', 'label_genero');
				echo CHtml::activeRadioButtonList($pessoa, 'GeneroPessoa', array('F'=>'Feminino', 'M'=>'Masculino'), array('required'=>true, 'separator' => " "));
				echo "<br /><br />";
				
				echo CHtml::label('CPF: ', 'label_cpf');
				echo CHtml::activeTextField($pessoa, 'CPFPessoa', array('required'=>true, 'maxlenght'=>11, 'style'=>'margin-bottom: 8px;'));
				echo "<br />";
				
				echo CHtml::label('Email: ', 'label_email');
				echo CHtml::activeTextField($pessoa, 'EmailPessoa', array('required'=>true, 'maxlenght'=>20, 'style'=>'margin-bottom: 8px;'));
				echo "<br />";
				
				echo CHtml::label('Endereço: ', 'label_endereco');
				echo CHtml::activeTextField($pessoa, 'EnderecoPessoa', array('required'=>true, 'maxlenght'=>20, 'style'=>'margin-bottom: 8px;'));
				echo "<br />";
				
				echo CHtml::label('Número: ', 'label_numero');
				echo CHtml::activeTextField($pessoa, 'NumeroPessoa', array('maxlenght'=>5, 'style'=>'margin-bottom: 8px;'));
				echo "<br />";
				
				echo CHtml::label('Bairro: ', 'label_bairro');
				echo CHtml::activeTextField($pessoa, 'BairroPessoa', array('required'=>true, 'maxlenght'=>20, 'style'=>'margin-bottom: 8px;'));
				echo "<br />";
				
				echo CHtml::label('CEP: ', 'label_cep');
				echo CHtml::activeTextField($pessoa, 'CEPPessoa', array('maxlenght'=>9, 'style'=>'margin-bottom: 8px;'));
				echo "<br />";
				
				echo CHtml::label('Telefone: ', 'label_telefone');
				echo CHtml::activeTextField($pessoa, 'TelefonePessoa', array('required'=>true, 'maxlenght'=>13, 'style'=>'margin-bottom: 8px;'));
				echo "<br />";
				
				echo CHtml::label($pessoa->isNewRecord ? 'Senha: ' : 'Nova senha: ', 'label_senha');
				echo CHtml::passwordField('Pessoa[NovaSenha]', '', array('required'=>($pessoa->isNewRecord ? true : false), 'maxlenght'=>14, 'style'=>'margin-bottom: 8px;'));
				echo "<br />";
				
				echo CHtml::label('Confirmar senha: ', 'label_senha2');
				echo CHtml::passwordField('Pessoa[SenhaRepetida]', '', array('required'=> ($pessoa->isNewRecord ? true : false), 'maxlenght'=>14, 'style'=>'margin-bottom: 8px;'));
				echo "<br /><br />";
			?>
			</div>
			<div class="column medium-5"></div>
			</div>
			<?php
				
			echo CHtml::submitButton(!Yii::app()->user->isGuest ? 'Atualizar Cadastro' : 'Abrir uma conta', array('class' => 'btn',));
		?>
	</div>
</fieldset>
<?php
	$this->widget('zii.widgets.grid.CGridView', array(
		'dataProvider'=>$dp,
		'columns'=>array(
			array(
				'header'=>'Nome da Disciplina',
				'value'=>'$data->NomeDisciplina',
			),
			array(
				'header'=>'Preço (R$)',
				'name'=>'PrecoDisciplina',
			),
			array
			(
				'class'=>'CButtonColumn',
				'template'=>'{update}{delete}',
				'buttons'=>array(
					'update'=>array(
						'url'=>'Yii::app()->createUrl("disciplina/viewOrNewDisciplina", array("CodDisciplina"=>$data->CodDisciplina))',	
					),
					'delete'=>array(
						'url'=>'Yii::app()->createUrl("disciplina/deletarDisciplina", array("CodDisciplina"=>$data->CodDisciplina))',
					),
				),
			),
		),
	));
?>
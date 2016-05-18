<?php

class DisciplinaController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
	
	public function actionSalvarDisciplina()
	{
		if (isset($_POST))
		{
			if (empty($_POST['Disciplina']['CodDisciplina']))
			{
				$disciplina = new Disciplina;
				$disciplina->attributes = $_POST['Disciplina'];
				$disciplina->CodPessoa = Yii::app()->user->CodPessoa;
				$disciplina->IndicadorExcluido = 'N';
				$disciplina->save();
			}
			else
			{
				$disciplina = Disciplina::model()->findByPk($_POST['Disciplina']['CodDisciplina']);
				$disciplina->attributes = $_POST['Disciplina'];
				$disciplina->save();
			}
			
			Yii::app()->user->setFlash('success', "Disciplina salva com sucesso!");
			$this->render('index', array());
		}
		else
		{
			Yii::app()->user->setFlash('error', "Dados não foram enviados!");
			$this->render('index', array());
		}
	}
	
	public function actionViewOrNewDisciplina()
	{
		if (isset($_GET['CodDisciplina']))
		{
			$disciplina = Disciplina::model()->findByPk($_GET['CodDisciplina']);
			if (!$disciplina)
			{
				Yii::app()->user->setFlash('error', "Disciplina não encontrada!");
				$this->redirect('minhasDisciplinas');
			}
		}
		else
			$disciplina = new Disciplina;
		
		$this->render('formDisciplina', array('disciplina'=>$disciplina));
	}
	
	public function actionDeletarDisciplina()
	{
		if (isset($_GET['CodDisciplina']))
		{
			$disciplina = Disciplina::model()->findByPk($_GET['CodDisciplina']);
			if (!$disciplina)
				Yii::app()->user->setFlash('error', "Disciplina não encontrada!");
			else
			{
				$disciplina->IndicadorExcluido = 'S';
				
				if (!$disciplina->save())
					Yii::app()->user->setFlash('error', "Não foi possível excluir a disciplina!");
				else
					Yii::app()->user->setFlash('error', "Disciplina removida com sucesso!");
			}
		}
		
		$this->redirect('minhasDisciplinas');
	}
	
	public function actionMinhasDisciplinas()
	{
		$criteria = new CDbCriteria;
		$criteria->addCondition('t.CodPessoa = ' . Yii::app()->user->CodPessoa);
		
		$disciplinas = Disciplina::model()->findAll($criteria);
		
		$dataProvider = new CArrayDataProvider($disciplinas, array(
			'keyField'=>'CodDisciplina',
			'id'=>'disc',
			'pagination'=>array(
				'pageSize'=>10,
			),
		));
		
		
		$this->render('minhasDisciplinas', array('dp'=>$dataProvider));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}
<?php

class PessoaController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
	
	public function actionMeuPerfil()
	{
		if (!isset($_POST['Pessoa']))
		{
			if (!Yii::app()->user->isGuest)
				$pessoa = Pessoa::model()->findByPk(Yii::app()->user->CodPessoa);
			else
				$pessoa = new Pessoa;
			
			$this->render('meuPerfil', array('pessoa'=>$pessoa));
		}
		else
		{
			$temErro = false;
			
			if (!empty($_POST['Pessoa']['CodPessoa']))
				$pessoa = Pessoa::model()->findByPk($_POST['Pessoa']['CodPessoa']);
			else
				$pessoa = new Pessoa;
			
			//CVarDumper::dump($_POST['Pessoa'], 10 ,true);die;
			$pessoa->attributes = $_POST['Pessoa'];
			
			if ($_POST['Pessoa']['NovaSenha'] == $_POST['Pessoa']['SenhaRepetida'])
				$pessoa->SenhaPessoa = md5($_POST['Pessoa']['NovaSenha']);
			else
				$temErro = true;
			
			if ($pessoa->isNewRecord)
			{
				if ($_POST['Pessoa']['Indicador'] == 1)
				{
					$pessoa->IndicadorFuncionario = 'N';
					$pessoa->IndicadorProfessor = 'N';
				}
				else
				{
					$pessoa->IndicadorFuncionario = 'N';
					$pessoa->IndicadorProfessor = 'S';
				}
			}
			
			$pessoa->IndicadorExcluido = 'N';
			if (!$temErro)
			{
				$pessoa->save();
				$this->redirect(array('site/novoLogin'));
			}
			else
				$x=1; //EXIBE MENSAGEM DE ERRO
		}
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
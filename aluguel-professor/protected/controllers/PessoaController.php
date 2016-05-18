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
			
			$pessoa->attributes = $_POST['Pessoa'];
			//$pessoa->DataNascimentoPessoa = date($_POST['Pessoa']['DataNascimentoPessoa']);
			if (!empty($_POST['Pessoa']['NovaSenha']) && !empty($_POST['Pessoa']['SenhaRepetida']))
			{
				if ($_POST['Pessoa']['NovaSenha'] == $_POST['Pessoa']['SenhaRepetida'])
					$pessoa->SenhaPessoa = md5($_POST['Pessoa']['NovaSenha']);
				else
					$temErro = true;
			}
			
			if ($pessoa->isNewRecord)
			{
				$pessoa->SaldoPessoa = 0;
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
				if ($pessoa->isNewRecord)
					Yii::app()->user->setFlash('success', "Cadastro realizado com sucesso!");
				else
					Yii::app()->user->setFlash('success', "Informações atualizadas com sucesso!");
				
				$pessoa->save();
				$this->redirect(array('site/index'));
			}
			else
			{
				Yii::app()->user->setFlash('error', "Não foi possível salvar as informações!");
				$this->redirect('meuPerfil');
			}
		}
	}
	
	public function actionInserirCredito()
	{
		if (isset($_POST['Pessoa']))
		{
			$pessoa = Pessoa::model()->findByPk(Yii::app()->user->CodPessoa);
			$pessoa->SaldoPessoa += $_POST['Pessoa']['Depositar'];
			$pessoa->save();
			$this->render('index');
		}
		else
			$this->render('formInserirCredito');
	}
	
	public function actionSacarCredito()
	{
		if (isset($_POST['Pessoa']))
		{
			$pessoa = Pessoa::model()->findByPk(Yii::app()->user->CodPessoa);
			$qtdSacar = $_POST['Pessoa']['Sacar'];
			
			if ($pessoa->SaldoPessoa < $qtdSacar)
				$pessoa->SaldoPessoa -= $pessoa->SaldoPessoa;
			else
				$pessoa->SaldoPessoa -= $_POST['Pessoa']['Sacar'];
			
			$pessoa->save();
			$this->render('index');
		}
		else
			$this->render('formSacarCredito');
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
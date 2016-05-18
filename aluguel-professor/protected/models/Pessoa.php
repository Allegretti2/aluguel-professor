<?php

/**
 * This is the model class for table "pessoa".
 *
 * The followings are the available columns in table 'pessoa':
 * @property integer $CodPessoa
 * @property string $NomePessoa
 * @property string $CPFPessoa
 * @property string $EmailPessoa
 * @property string $GeneroPessoa
 * @property string $EnderecoPessoa
 * @property string $NumeroPessoa
 * @property string $BairroPessoa
 * @property string $CEPPessoa
 * @property string $TelefonePessoa
 * @property string $DataNascimentoPessoa
 * @property string $SenhaPessoa
 * @property string $SaldoPessoa
 * @property string $IndicadorProfessor
 * @property string $IndicadorFuncionario
 * @property string $IndicadorExcluido
 */
class Pessoa extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pessoa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NomePessoa, CPFPessoa, EmailPessoa, GeneroPessoa, EnderecoPessoa, BairroPessoa, CEPPessoa, TelefonePessoa, DataNascimentoPessoa, SenhaPessoa, SaldoPessoa, IndicadorProfessor, IndicadorFuncionario', 'required'),
			array('NomePessoa, EmailPessoa, EnderecoPessoa, BairroPessoa', 'length', 'max'=>20),
			array('CPFPessoa', 'length', 'max'=>11),
			array('GeneroPessoa, IndicadorProfessor, IndicadorFuncionario, IndicadorExcluido', 'length', 'max'=>1),
			array('NumeroPessoa', 'length', 'max'=>5),
			array('CEPPessoa', 'length', 'max'=>9),
			array('TelefonePessoa', 'length', 'max'=>13),
			array('SenhaPessoa', 'length', 'max'=>32),
			array('SaldoPessoa', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('CodPessoa, NomePessoa, CPFPessoa, EmailPessoa, GeneroPessoa, EnderecoPessoa, NumeroPessoa, BairroPessoa, CEPPessoa, TelefonePessoa, DataNascimentoPessoa, SenhaPessoa, SaldoPessoa, IndicadorProfessor, IndicadorFuncionario, IndicadorExcluido', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'CodPessoa' => 'Cod Pessoa',
			'NomePessoa' => 'Nome Pessoa',
			'CPFPessoa' => 'Cpfpessoa',
			'EmailPessoa' => 'Email Pessoa',
			'GeneroPessoa' => 'Genero Pessoa',
			'EnderecoPessoa' => 'Endereco Pessoa',
			'NumeroPessoa' => 'Numero Pessoa',
			'BairroPessoa' => 'Bairro Pessoa',
			'CEPPessoa' => 'Ceppessoa',
			'TelefonePessoa' => 'Telefone Pessoa',
			'DataNascimentoPessoa' => 'Data Nascimento Pessoa',
			'SenhaPessoa' => 'Senha Pessoa',
			'SaldoPessoa' => 'Saldo Pessoa',
			'IndicadorProfessor' => 'Indicador Professor',
			'IndicadorFuncionario' => 'Indicador Funcionario',
			'IndicadorExcluido' => 'Indicador Excluido',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('CodPessoa',$this->CodPessoa);
		$criteria->compare('NomePessoa',$this->NomePessoa,true);
		$criteria->compare('CPFPessoa',$this->CPFPessoa,true);
		$criteria->compare('EmailPessoa',$this->EmailPessoa,true);
		$criteria->compare('GeneroPessoa',$this->GeneroPessoa,true);
		$criteria->compare('EnderecoPessoa',$this->EnderecoPessoa,true);
		$criteria->compare('NumeroPessoa',$this->NumeroPessoa,true);
		$criteria->compare('BairroPessoa',$this->BairroPessoa,true);
		$criteria->compare('CEPPessoa',$this->CEPPessoa,true);
		$criteria->compare('TelefonePessoa',$this->TelefonePessoa,true);
		$criteria->compare('DataNascimentoPessoa',$this->DataNascimentoPessoa,true);
		$criteria->compare('SenhaPessoa',$this->SenhaPessoa,true);
		$criteria->compare('SaldoPessoa',$this->SaldoPessoa,true);
		$criteria->compare('IndicadorProfessor',$this->IndicadorProfessor,true);
		$criteria->compare('IndicadorFuncionario',$this->IndicadorFuncionario,true);
		$criteria->compare('IndicadorExcluido',$this->IndicadorExcluido,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pessoa the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

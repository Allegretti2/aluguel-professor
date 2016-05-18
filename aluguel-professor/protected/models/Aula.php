<?php

/**
 * This is the model class for table "aula".
 *
 * The followings are the available columns in table 'aula':
 * @property integer $CodAula
 * @property integer $CodDisciplina
 * @property integer $CodPessoaAluno
 * @property string $DataAula
 * @property string $LocalAula
 * @property string $IndicadorAulaRealizadaAluno
 * @property string $IndicadorAulaRealizadaProfessor
 * @property string $IndicadorExcluido
 */
class Aula extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'aula';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CodDisciplina, CodPessoaAluno, DataAula, LocalAula, IndicadorAulaRealizadaAluno, IndicadorAulaRealizadaProfessor, IndicadorExcluido', 'required'),
			array('CodDisciplina, CodPessoaAluno', 'numerical', 'integerOnly'=>true),
			array('LocalAula', 'length', 'max'=>20),
			array('IndicadorAulaRealizadaAluno, IndicadorAulaRealizadaProfessor, IndicadorExcluido', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('CodAula, CodDisciplina, CodPessoaAluno, DataAula, LocalAula, IndicadorAulaRealizadaAluno, IndicadorAulaRealizadaProfessor, IndicadorExcluido', 'safe', 'on'=>'search'),
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
			'CodAula' => 'Cod Aula',
			'CodDisciplina' => 'Cod Disciplina',
			'CodPessoaAluno' => 'Cod Pessoa Aluno',
			'DataAula' => 'Data Aula',
			'LocalAula' => 'Local Aula',
			'IndicadorAulaRealizadaAluno' => 'Indicador Aula Realizada Aluno',
			'IndicadorAulaRealizadaProfessor' => 'Indicador Aula Realizada Professor',
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

		$criteria->compare('CodAula',$this->CodAula);
		$criteria->compare('CodDisciplina',$this->CodDisciplina);
		$criteria->compare('CodPessoaAluno',$this->CodPessoaAluno);
		$criteria->compare('DataAula',$this->DataAula,true);
		$criteria->compare('LocalAula',$this->LocalAula,true);
		$criteria->compare('IndicadorAulaRealizadaAluno',$this->IndicadorAulaRealizadaAluno,true);
		$criteria->compare('IndicadorAulaRealizadaProfessor',$this->IndicadorAulaRealizadaProfessor,true);
		$criteria->compare('IndicadorExcluido',$this->IndicadorExcluido,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Aula the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

<?php

/**
 * This is the model class for table "disciplina".
 *
 * The followings are the available columns in table 'disciplina':
 * @property integer $CodDisciplina
 * @property string $NomeDisciplina
 * @property double $PrecoDisciplina
 * @property integer $CodPessoa
 * @property string $IndicadorExcluido
 */
class Disciplina extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'disciplina';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NomeDisciplina, PrecoDisciplina, CodPessoa, IndicadorExcluido', 'required'),
			array('CodPessoa', 'numerical', 'integerOnly'=>true),
			array('PrecoDisciplina', 'numerical'),
			array('NomeDisciplina', 'length', 'max'=>20),
			array('IndicadorExcluido', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('CodDisciplina, NomeDisciplina, PrecoDisciplina, CodPessoa, IndicadorExcluido', 'safe', 'on'=>'search'),
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
			'CodDisciplina' => 'Cod Disciplina',
			'NomeDisciplina' => 'Nome Disciplina',
			'PrecoDisciplina' => 'Preco Disciplina',
			'CodPessoa' => 'Cod Pessoa',
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

		$criteria->compare('CodDisciplina',$this->CodDisciplina);
		$criteria->compare('NomeDisciplina',$this->NomeDisciplina,true);
		$criteria->compare('PrecoDisciplina',$this->PrecoDisciplina);
		$criteria->compare('CodPessoa',$this->CodPessoa);
		$criteria->compare('IndicadorExcluido',$this->IndicadorExcluido,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Disciplina the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

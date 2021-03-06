<?php

/**
 * This is the model class for table "eva_alternativa".
 *
 * The followings are the available columns in table 'eva_alternativa':
 * @property string $ALT_ID
 * @property string $PRE_ID
 * @property string $ALT_NOMBRE
 * @property integer $ALT_DESHABILITADO
 *
 * The followings are the available model relations:
 * @property Pregunta $pRE
 * @property Pregunta[] $preguntas
 * @property Respuesta[] $respuestas
 */
class Alternativa extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'eva_alternativa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('PRE_ID, ALT_NOMBRE, ALT_DESHABILITADO', 'required'),
			array('ALT_DESHABILITADO', 'numerical', 'integerOnly'=>true),
			array('PRE_ID', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ALT_ID, PRE_ID, ALT_NOMBRE, ALT_DESHABILITADO', 'safe', 'on'=>'search'),
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
			'pRE' => array(self::BELONGS_TO, 'Pregunta', 'PRE_ID'),
			'preguntas' => array(self::HAS_MANY, 'Pregunta', 'ALT_ID'),
			'respuestas' => array(self::HAS_MANY, 'Respuesta', 'ALT_ID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ALT_ID' => 'Alt',
			'PRE_ID' => 'Pre',
			'ALT_NOMBRE' => 'Alt Nombre',
			'ALT_DESHABILITADO' => 'Alt Deshabilitado',
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

		$criteria->compare('ALT_ID',$this->ALT_ID,true);
		$criteria->compare('PRE_ID',$this->PRE_ID,true);
		$criteria->compare('ALT_NOMBRE',$this->ALT_NOMBRE,true);
		$criteria->compare('ALT_DESHABILITADO',$this->ALT_DESHABILITADO);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Alternativa the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

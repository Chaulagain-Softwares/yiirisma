<?php

/**
 * This is the model class for table "membership".
 *
 * The followings are the available columns in table 'membership':
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email_address
 * @property string $username
 * @property string $password
 * @property string $extra
 *
 * The followings are the available model relations:
 * @property Membershipmeta[] $membershipmetas
 */
class Membership extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Membership the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'membership';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('first_name, last_name, email_address, username, password', 'required'),
			array('first_name, last_name, username, password', 'length', 'max'=>32),
			array('email_address', 'length', 'max'=>64),
			array('extra', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, first_name, last_name, email_address, username, password, extra', 'safe', 'on'=>'search'),
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
			'membershipmetas' => array(self::HAS_MANY, 'Membershipmeta', 'mebership_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'email_address' => 'Email Address',
			'username' => 'Username',
			'password' => 'Password',
			'extra' => 'Extra',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('email_address',$this->email_address,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('extra',$this->extra,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
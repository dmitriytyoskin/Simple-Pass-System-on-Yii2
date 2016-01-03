<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Guest extends ActiveRecord
{
	public function rules()
	{
		return [
		[['name','direction','passnum','receiver',],'required'],
		];

	}
} 
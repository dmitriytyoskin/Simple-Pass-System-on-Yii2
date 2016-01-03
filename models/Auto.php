<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Auto extends ActiveRecord
{
	public function rules()
	{
		return [
		[['name','carnum','trailnum','licence','company','goods','workshop'],'required'],
		];

	}
} 
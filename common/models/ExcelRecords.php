<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "excel_records".
 *
 * @property string $id
 * @property string $path
 *  @property string $type
 */
class ExcelRecords extends \yii\db\ActiveRecord
{
    //public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'excel_records';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['path'], 'file',  'extensions' => 'xls, xlsx','maxSize'=>1024*1024*20],
            //[['path'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'path' => 'Upload File',
        ];
    }
}

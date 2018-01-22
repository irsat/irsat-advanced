<?php

namespace frontend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\Expression;
/**
 * This is the model class for table "{{%tbl_data_induk_siswa}}".
 *
 * @property integer $id
 * @property integer $nis
 * @property string $nama
 * @property string $alamat
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $nama_ortu
 * @property integer $tahun_masuk
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 */
class DataIndukSiswa extends \yii\db\ActiveRecord
{
     public function behaviors(){
        return [
            [
                'class' =>TimestampBehavior::className(),
                'value' => new Expression('NOW()'),
            ],
            BlameableBehavior::className()
        ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tbl_data_induk_siswa}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nis', 'nama', 'alamat', 'tempat_lahir', 'tanggal_lahir', 'nama_ortu', 'tahun_masuk'], 'required'],
            [['id', 'nis', 'tahun_masuk', 'created_by', 'updated_by'], 'integer'],
            [['tanggal_lahir', 'created_at', 'updated_at'], 'safe'],
            [['nama', 'alamat', 'tempat_lahir', 'nama_ortu'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nis' => Yii::t('app', 'Nis'),
            'nama' => Yii::t('app', 'Nama'),
            'alamat' => Yii::t('app', 'Alamat'),
            'tempat_lahir' => Yii::t('app', 'Tempat Lahir'),
            'tanggal_lahir' => Yii::t('app', 'Tanggal Lahir'),
            'nama_ortu' => Yii::t('app', 'Nama Ortu'),
            'tahun_masuk' => Yii::t('app', 'Tahun Masuk'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }
}

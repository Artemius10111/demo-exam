<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "problem".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $timestamp
 * @property int|null $idUser
 * @property int|null $idCategory
 * @property string|null $status
 * @property string|null $photoBefore
 * @property string|null $photoAfter
 *
 * @property Category $idCategory0
 * @property User $idUser0
 */
class Problem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'problem';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description', 'status'], 'string'],
            [['timestamp'], 'safe'],
            [['idUser', 'idCategory'], 'integer'],
            [['name', 'photoBefore', 'photoAfter'], 'string', 'max' => 255],
            [['idCategory'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['idCategory' => 'id']],
            [['idUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['idUser' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'description' => 'Описание',
            'timestamp' => 'Дата создания',
            'idUser' => 'Id User',
            'idCategory' => 'Категория',
            'status' => 'Статус',
            'photoBefore' => 'Photo Before',
            'photoAfter' => 'Photo After',
        ];
    }

    /**
     * Gets query for [[IdCategory0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'idCategory']);
    }

    /**
     * Gets query for [[IdUser0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser0()
    {
        return $this->hasOne(User::class, ['id' => 'idUser']);
    }
}

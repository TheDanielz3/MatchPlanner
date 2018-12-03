<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "pessoa".
 *
 * @property int $id
 * @property string $Nome
 * @property int $Idade
 * @property string $Morada
 * @property int $NIF
 * @property string $Email
 */
class Pessoa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pessoa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nome', 'Idade', 'Morada', 'NIF', 'Email'], 'required'],
            [['Idade', 'NIF'], 'integer'],
            [['Nome', 'Morada'], 'string', 'max' => 80],
            [['Email'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Nome' => 'Nome',
            'Idade' => 'Idade',
            'Morada' => 'Morada',
            'NIF' => 'Nif',
            'Email' => 'Email',
        ];
    }
}

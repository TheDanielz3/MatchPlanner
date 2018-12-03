<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "clientes".
 *
 * @property int $IdCliente
 * @property string $Nome
 * @property string $Morada
 * @property string $Contacto
 */
class Clientes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clientes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nome', 'Morada', 'Contacto'], 'required'],
            [['Nome', 'Morada'], 'string', 'max' => 100],
            [['Contacto'], 'string', 'max' => 70],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdCliente' => 'Id Cliente',
            'Nome' => 'Nome',
            'Morada' => 'Morada',
            'Contacto' => 'Contacto',
        ];
    }
}

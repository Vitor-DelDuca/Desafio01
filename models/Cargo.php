<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%cargo}}".
 *
 * @property int $id
 * @property string $cargo
 *
 * @property Funcionario[] $funcionarios
 */
class Cargo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cargo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cargo'], 'required', 'message' =>'Campo obrigatório'],
            [['cargo'], 'string', 'max' => 50],
            [['cargo'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cargo' => 'Cargo',
        ];
    }

    /**
     * Gets query for [[Funcionarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFuncionarios()
    {
        return $this->hasMany(Funcionario::className(), ['cargo_id' => 'id']);
    }
}

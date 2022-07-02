<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%funcionario}}".
 *
 * @property int $id
 * @property string $nome
 * @property string $cpf
 * @property string|null $logradouro
 * @property string|null $cep
 * @property string|null $cidade
 * @property string|null $estado
 * @property int|null $numero
 * @property string|null $complemento
 * @property int|null $cargo_id
 *
 * @property Cargo $cargo
 */
class Funcionario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'funcionario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'cpf'], 'required', 'message' =>'Campo obrigatório'],
            [['numero', 'cargo_id'], 'default', 'value' => null],
            [['numero', 'cargo_id'], 'integer'],
            [['nome', 'logradouro'], 'string', 'max' => 80],
            [['cpf'], 'string', 'max' => 11],
            [['cep'], 'string', 'max' => 8],
            [['cidade', 'complemento'], 'string', 'max' => 50],
            [['estado'], 'string', 'max' => 2],
            [['cpf'], 'unique'],
            [['nome'], 'unique'],
            [['cargo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cargo::className(), 'targetAttribute' => ['cargo_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'cpf' => 'Cpf',
            'logradouro' => 'Logradouro',
            'cep' => 'Cep',
            'cidade' => 'Cidade',
            'estado' => 'Estado',
            'numero' => 'Numero',
            'complemento' => 'Complemento',
            'cargo_id' => 'Cargo ID',
        ];
    }

    /**
     * Gets query for [[Cargo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCargo()
    {
        return $this->hasOne(Cargo::className(), ['id' => 'cargo_id']);
    }
}

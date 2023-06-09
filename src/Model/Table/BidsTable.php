<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Bids Model
 *
 * @property \App\Model\Table\ProcurementsTable&\Cake\ORM\Association\BelongsTo $Procurements
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Bid get($primaryKey, $options = [])
 * @method \App\Model\Entity\Bid newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Bid[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Bid|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bid saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bid patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Bid[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Bid findOrCreate($search, callable $callback = null, $options = [])
 */
class BidsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('bids');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Procurements', [
            'foreignKey' => 'listing_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'vendor_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->decimal('bid_amount')
            ->requirePresence('bid_amount', 'create')
            ->notEmptyString('bid_amount');

        $validator
            ->scalar('status')
            ->maxLength('status', 20)
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['listing_id'], 'Procurements'));
        $rules->add($rules->existsIn(['vendor_id'], 'Users'));

        return $rules;
    }
}
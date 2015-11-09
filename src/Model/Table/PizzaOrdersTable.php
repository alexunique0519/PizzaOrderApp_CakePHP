<?php
namespace App\Model\Table;

use App\Model\Entity\PizzaOrder;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PizzaOrder Model
 *
 */
class PizzaOrdersTable extends Table
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

        $this->table('pizzaOrders');

        $this->addBehavior('Timestamp');

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
            ->requirePresence('userName', 'create')
            ->notEmpty('userName');

        $validator
            ->requirePresence('postalCode', 'create')
            ->notEmpty('postalCode');

        $validator
            ->requirePresence('province', 'create')
            ->notEmpty('province');

        $validator
            ->requirePresence('city', 'create')
            ->notEmpty('city');

        $validator
            ->requirePresence('size', 'create')
            ->notEmpty('size');

        $validator
            ->requirePresence('topping', 'create')
            ->notEmpty('topping');

        $validator
            ->requirePresence('crustType', 'create')
            ->notEmpty('crustType');

        $validator
            ->add('email', 'valid', ['rule' => 'email'])
            ->requirePresence('email', 'create')
            ->notEmpty('email');
        
        $validator
            ->requirePresence('telNumber', 'create')
            ->notEmpty('telNumber')
            ->add('reg_no', 'validFormat', [
                'rule' => array('phoneNumber', '/^\(?([1-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/'),
                'message' => 'Please enter a valid telephone number.'
            ]);
       // $validator
        //    ->requirePresence('orderStatus', 'create')
         //   ->notEmpty('orderStatus');

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
        //$rules->add($rules->isUnique(['email']));
        return $rules;
    }
}

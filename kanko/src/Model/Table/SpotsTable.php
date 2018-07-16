<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Spots Model
 *
 * @property \App\Model\Table\RoutesTable|\Cake\ORM\Association\BelongsToMany $Routes
 * @property \App\Model\Table\TagsTable|\Cake\ORM\Association\BelongsToMany $Tags
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsToMany $Users
 *
 * @method \App\Model\Entity\Spot get($primaryKey, $options = [])
 * @method \App\Model\Entity\Spot newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Spot[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Spot|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Spot|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Spot patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Spot[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Spot findOrCreate($search, callable $callback = null, $options = [])
 */
class SpotsTable extends Table
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

        $this->setTable('spots');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Routes', [
            'foreignKey' => 'spot_id',
            'targetForeignKey' => 'route_id',
            'joinTable' => 'routes_spots'
        ]);
        $this->belongsToMany('Tags', [
            'foreignKey' => 'spot_id',
            'targetForeignKey' => 'tag_id',
            'joinTable' => 'spots_tags'
        ]);
        $this->belongsToMany('Users', [
            'foreignKey' => 'spot_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'spots_users'
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
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('spot_name')
            ->maxLength('spot_name', 255)
            ->requirePresence('spot_name', 'create')
            ->notEmpty('spot_name');

        $validator
            ->scalar('spot_description')
            ->maxLength('spot_description', 1024)
            ->allowEmpty('spot_description');

        $validator
            ->scalar('spot_address')
            ->maxLength('spot_address', 255)
            ->requirePresence('spot_address', 'create')
            ->notEmpty('spot_address');

        $validator
            ->dateTime('start_date')
            ->allowEmpty('start_date');

        $validator
            ->dateTime('end_date')
            ->allowEmpty('end_date');

        return $validator;
    }
}

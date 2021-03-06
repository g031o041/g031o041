<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tags Model
 *
 * @property \App\Model\Table\RoutesTable|\Cake\ORM\Association\BelongsToMany $Routes
 * @property \App\Model\Table\SpotsTable|\Cake\ORM\Association\BelongsToMany $Spots
 *
 * @method \App\Model\Entity\Tag get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tag newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Tag[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tag|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tag|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tag patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tag[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tag findOrCreate($search, callable $callback = null, $options = [])
 */
class TagsTable extends Table
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

        $this->setTable('tags');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Routes', [
            'foreignKey' => 'tag_id',
            'targetForeignKey' => 'route_id',
            'joinTable' => 'routes_tags'
        ]);
        $this->belongsToMany('Spots', [
            'foreignKey' => 'tag_id',
            'targetForeignKey' => 'spot_id',
            'joinTable' => 'spots_tags'
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
            ->scalar('tag_name')
            ->maxLength('tag_name', 255)
            ->requirePresence('tag_name', 'create')
            ->notEmpty('tag_name');

        $validator
            ->scalar('tag_description')
            ->maxLength('tag_description', 255)
            ->allowEmpty('tag_description');

        return $validator;
    }
}

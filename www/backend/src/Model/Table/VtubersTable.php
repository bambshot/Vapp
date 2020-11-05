<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Vtubers Model
 *
 * @property \App\Model\Table\VtuberGroupsTable&\Cake\ORM\Association\BelongsTo $VtuberGroups
 * @property \App\Model\Table\YoutubeChannelsTable&\Cake\ORM\Association\BelongsTo $YoutubeChannels
 *
 * @method \App\Model\Entity\Vtuber newEmptyEntity()
 * @method \App\Model\Entity\Vtuber newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Vtuber[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Vtuber get($primaryKey, $options = [])
 * @method \App\Model\Entity\Vtuber findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Vtuber patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Vtuber[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Vtuber|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Vtuber saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Vtuber[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Vtuber[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Vtuber[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Vtuber[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class VtubersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('vtubers');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('VtuberGroups', [
            'foreignKey' => 'vtuber_group_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('YoutubeChannels', [
            'foreignKey' => 'youtube_channel_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('description')
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->nonNegativeInteger('age')
            ->requirePresence('age', 'create')
            ->notEmptyString('age');

        $validator
            ->nonNegativeInteger('sex')
            ->requirePresence('sex', 'create')
            ->notEmptyString('sex');

        $validator
            ->decimal('height')
            ->greaterThanOrEqual('height', 0)
            ->requirePresence('height', 'create')
            ->notEmptyString('height');

        $validator
            ->date('debut_date')
            ->requirePresence('debut_date', 'create')
            ->notEmptyDate('debut_date');

        $validator
            ->date('birthday')
            ->requirePresence('birthday', 'create')
            ->notEmptyDate('birthday');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['vtuber_group_id'], 'VtuberGroups'), ['errorField' => 'vtuber_group_id']);
        $rules->add($rules->existsIn(['youtube_channel_id'], 'YoutubeChannels'), ['errorField' => 'youtube_channel_id']);

        return $rules;
    }
}

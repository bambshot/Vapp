<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VtuberGroups Model
 *
 * @property \App\Model\Table\YoutubeChannelsTable&\Cake\ORM\Association\BelongsTo $YoutubeChannels
 * @property \App\Model\Table\VtubersTable&\Cake\ORM\Association\HasMany $Vtubers
 *
 * @method \App\Model\Entity\VtuberGroup newEmptyEntity()
 * @method \App\Model\Entity\VtuberGroup newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\VtuberGroup[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VtuberGroup get($primaryKey, $options = [])
 * @method \App\Model\Entity\VtuberGroup findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\VtuberGroup patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VtuberGroup[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\VtuberGroup|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VtuberGroup saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VtuberGroup[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\VtuberGroup[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\VtuberGroup[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\VtuberGroup[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class VtuberGroupsTable extends Table
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

        $this->setTable('vtuber_groups');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('YoutubeChannels', [
            'foreignKey' => 'youtube_channel_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Vtubers', [
            'foreignKey' => 'vtuber_group_id',
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
            ->scalar('site_url')
            ->maxLength('site_url', 2048)
            ->requirePresence('site_url', 'create')
            ->notEmptyString('site_url');

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
        $rules->add($rules->existsIn(['youtube_channel_id'], 'YoutubeChannels'), ['errorField' => 'youtube_channel_id']);

        return $rules;
    }
}

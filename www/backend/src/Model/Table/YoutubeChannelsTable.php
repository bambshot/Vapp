<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * YoutubeChannels Model
 *
 * @property \App\Model\Table\ChannelsTable&\Cake\ORM\Association\BelongsTo $Channels
 * @property \App\Model\Table\VtuberGroupsTable&\Cake\ORM\Association\HasMany $VtuberGroups
 * @property \App\Model\Table\VtubersTable&\Cake\ORM\Association\HasMany $Vtubers
 *
 * @method \App\Model\Entity\YoutubeChannel newEmptyEntity()
 * @method \App\Model\Entity\YoutubeChannel newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\YoutubeChannel[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\YoutubeChannel get($primaryKey, $options = [])
 * @method \App\Model\Entity\YoutubeChannel findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\YoutubeChannel patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\YoutubeChannel[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\YoutubeChannel|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\YoutubeChannel saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\YoutubeChannel[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\YoutubeChannel[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\YoutubeChannel[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\YoutubeChannel[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class YoutubeChannelsTable extends Table
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

        $this->setTable('youtube_channels');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('VtuberGroups', [
            'foreignKey' => 'youtube_channel_id',
        ]);
        $this->hasMany('Vtubers', [
            'foreignKey' => 'youtube_channel_id',
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
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('thumbnail')
            ->maxLength('thumbnail', 2048)
            ->requirePresence('thumbnail', 'create')
            ->notEmptyString('thumbnail');

        $validator
            ->scalar('description')
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

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
        $rules->add($rules->existsIn(['channel_id'], 'Channels'), ['errorField' => 'channel_id']);

        return $rules;
    }
}

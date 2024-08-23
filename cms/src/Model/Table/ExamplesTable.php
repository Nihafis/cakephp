<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Examples Model
 *
 * @method \App\Model\Entity\Example newEmptyEntity()
 * @method \App\Model\Entity\Example newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Example> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Example get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Example findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Example patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Example> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Example|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Example saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Example>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Example>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Example>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Example> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Example>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Example>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Example>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Example> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ExamplesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('examples');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
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
            ->scalar('name')
            ->maxLength('name', 50)
            ->notEmptyString('name');

        $validator
            ->scalar('detail')
            ->requirePresence('detail', 'create')
            ->notEmptyString('detail');

        $validator
            ->numeric('price')
            ->requirePresence('price', 'create')
            ->notEmptyString('price');

        $validator
            ->integer('stock')
            ->notEmptyString('stock');

        $validator
            ->integer('status')
            ->notEmptyString('status');

        $validator
            ->dateTime('create_date')
            ->allowEmptyDateTime('create_date');

        $validator
            ->scalar('topic_type')
            ->maxLength('topic_type', 50)
            ->allowEmptyString('topic_type');

        $validator
            ->dateTime('update_time')
            ->allowEmptyDateTime('update_time');

        return $validator;
    }
}

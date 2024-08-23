<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CatergoriesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CatergoriesTable Test Case
 */
class CatergoriesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CatergoriesTable
     */
    protected $Catergories;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Catergories',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Catergories') ? [] : ['className' => CatergoriesTable::class];
        $this->Catergories = $this->getTableLocator()->get('Catergories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Catergories);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CatergoriesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

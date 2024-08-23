<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExamplesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExamplesTable Test Case
 */
class ExamplesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ExamplesTable
     */
    protected $Examples;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Examples',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Examples') ? [] : ['className' => ExamplesTable::class];
        $this->Examples = $this->getTableLocator()->get('Examples', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Examples);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ExamplesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

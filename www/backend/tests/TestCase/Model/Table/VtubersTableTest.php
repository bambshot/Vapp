<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VtubersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VtubersTable Test Case
 */
class VtubersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\VtubersTable
     */
    protected $Vtubers;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Vtubers',
        'app.VtuberGroups',
        'app.YoutubeChannels',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Vtubers') ? [] : ['className' => VtubersTable::class];
        $this->Vtubers = $this->getTableLocator()->get('Vtubers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Vtubers);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

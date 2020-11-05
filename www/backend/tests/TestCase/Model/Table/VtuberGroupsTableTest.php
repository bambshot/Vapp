<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VtuberGroupsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VtuberGroupsTable Test Case
 */
class VtuberGroupsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\VtuberGroupsTable
     */
    protected $VtuberGroups;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.VtuberGroups',
        'app.YoutubeChannels',
        'app.Vtubers',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('VtuberGroups') ? [] : ['className' => VtuberGroupsTable::class];
        $this->VtuberGroups = $this->getTableLocator()->get('VtuberGroups', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->VtuberGroups);

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

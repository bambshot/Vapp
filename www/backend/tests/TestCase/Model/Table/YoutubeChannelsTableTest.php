<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\YoutubeChannelsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\YoutubeChannelsTable Test Case
 */
class YoutubeChannelsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\YoutubeChannelsTable
     */
    protected $YoutubeChannels;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.YoutubeChannels',
        'app.Channels',
        'app.VtuberGroups',
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
        $config = $this->getTableLocator()->exists('YoutubeChannels') ? [] : ['className' => YoutubeChannelsTable::class];
        $this->YoutubeChannels = $this->getTableLocator()->get('YoutubeChannels', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->YoutubeChannels);

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

<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateYoutubeChannels extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('youtube_channels');
        $table->addColumn('channel_id', 'string', [
            'default' => null,
            'limit' => 100,
            'null' => false
        ]);
        $table->addColumn('name', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => false
        ]);
        $table->addColumn('thumbnail', 'string', [
            'default' => null,
            'limit' => 2048,
            'null' => false
        ]);
        $table->addColumn('description', 'text', [
            'default' => null,
            'null' => false
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }
}

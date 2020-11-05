<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateVtuberGroups extends AbstractMigration
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
        $table = $this->table('vtuber_groups');
        $table->addColumn('name', 'string', [
            'default' => null,
            'limit' => 100,
            'null' => false
        ]);
        $table->addColumn('site_url', 'string', [
            'default' => null,
            'limit' => 2048,
        ]);

        $table->addColumn('youtube_channel_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
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

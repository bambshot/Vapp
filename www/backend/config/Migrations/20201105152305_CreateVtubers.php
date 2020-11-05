<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateVtubers extends AbstractMigration
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
        $table = $this->table('vtubers');
        $table->addColumn('name', 'string', [
            'default' => null,
            'limit' => 100,
            'null' => false
        ]);
        $table->addColumn('description', 'text', [
            'default' => null,
        ]);
        $table->addColumn('age', 'integer', [
            'default' => null,
            'limit' => 10,
            'signed' => false,
        ]);
        $table->addColumn('sex', 'integer', [
            'default' => null,
            'null' => false,
            'signed' => false,
        ]);
        $table->addColumn('height', 'decimal', [
            'default' => null,
            'precision' => 8,
            'scale' => 2,
            'signed' => false,
        ]);
        $table->addColumn('debut_date', 'date', [
            'default' => null,
        ]);
        $table->addColumn('birthday', 'date', [
            'default' => null,
        ]);

        $table->addColumn('vtuber_group_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
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

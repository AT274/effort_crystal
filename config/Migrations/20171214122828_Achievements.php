<?php
use Migrations\AbstractMigration;

class Achievements extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
      $table = $this->table('achievements');
      $table->addColumn('title', 'string',[
      'default' => null,
      'limit' => 20,
      'null' => false
      ]);
      $table->addColumn('target', 'integer',[
        'default' => 1,
        'null' => false,
      ]);
      $table->addColumn('description', 'string',[
        'default' => null,
        'limit' => 100
      ]);
      $table->addColumn('created', 'timestamp');
      $table->addColumn('modified', 'timestamp');
      $table -> create();
    }
}

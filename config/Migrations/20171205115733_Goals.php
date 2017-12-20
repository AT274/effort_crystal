<?php
use Migrations\AbstractMigration;

class Goals extends AbstractMigration
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
      $table = $this->table('goals');
      $table->addColumn('title', 'string',[
        'default' => null,
        'limit' => 20,
        'null' => false,
      ]);
      $table->addColumn('target', 'integer',[
        'default' => 1,
      ]);
      $table->addColumn('description', 'string',[
        'default' => null,
        'limit' => 100,
        'null' => true,
      ]);
      $table->addColumn('progress', 'integer',[
        'default' => 0,
      ]);
      $table->addColumn('due_date', 'timestamp');
      $table->addColumn('created', 'timestamp');
      $table->addColumn('modified', 'timestamp');
      $table -> create();
    }

}

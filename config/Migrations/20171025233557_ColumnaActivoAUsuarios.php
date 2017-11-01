<?php
use Migrations\AbstractMigration;

class ColumnaActivoAUsuarios extends AbstractMigration
{

    public function up()
    {

        $this->table('users')
            ->addColumn('activo', 'boolean', [
                'after' => 'nombre',
                'default' => '0',
                'length' => null,
                'null' => false,
            ])
            ->update();
    }

    public function down()
    {

        $this->table('users')
            ->removeColumn('activo')
            ->update();
    }
}


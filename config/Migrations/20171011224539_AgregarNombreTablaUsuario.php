<?php
use Migrations\AbstractMigration;

class AgregarNombreTablaUsuario extends AbstractMigration
{

    public function up()
    {

        $this->table('users')
            ->addColumn('nombre', 'string', [
                'after' => 'role',
                'default' => null,
                'length' => 50,
                'null' => false,
            ])
            ->update();
    }

    public function down()
    {

        $this->table('users')
            ->removeColumn('nombre')
            ->update();
    }
}


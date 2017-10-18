<?php
use Migrations\AbstractMigration;

class CambioTamanioColumnaNombre extends AbstractMigration
{

    public function up()
    {

        $this->table('carreras')
            ->changeColumn('nombre', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->update();

        $this->table('libretas')
            ->changeColumn('nombre', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->update();

        $this->table('materias')
            ->changeColumn('nombre', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->update();

        $this->table('users')
            ->changeColumn('nombre', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->update();
    }

    public function down()
    {

        $this->table('carreras')
            ->changeColumn('nombre', 'string', [
                'default' => null,
                'length' => 50,
                'null' => false,
            ])
            ->update();

        $this->table('libretas')
            ->changeColumn('nombre', 'string', [
                'default' => null,
                'length' => 50,
                'null' => true,
            ])
            ->update();

        $this->table('materias')
            ->changeColumn('nombre', 'string', [
                'default' => null,
                'length' => 50,
                'null' => true,
            ])
            ->update();

        $this->table('users')
            ->changeColumn('nombre', 'string', [
                'default' => null,
                'length' => 50,
                'null' => false,
            ])
            ->update();
    }
}


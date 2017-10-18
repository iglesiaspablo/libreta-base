<?php
use Migrations\AbstractMigration;

class AgregadoAnioCursadoAMaterias extends AbstractMigration
{

    public function up()
    {

        $this->table('materias')
            ->addColumn('anio_cursado', 'string', [
                'after' => 'nombre',
                'default' => null,
                'length' => 50,
                'null' => false,
            ])
            ->update();
    }

    public function down()
    {

        $this->table('materias')
            ->removeColumn('anio_cursado')
            ->update();
    }
}


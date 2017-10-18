<?php
use Migrations\AbstractMigration;

class AgregadoCarreraIdEnMaterias extends AbstractMigration
{

    public function up()
    {

        $this->table('materias')
            ->addColumn('carrera_id', 'uuid', [
                'after' => 'anio_cursado',
                'default' => null,
                'length' => null,
                'null' => false,
            ])
            ->update();
    }

    public function down()
    {

        $this->table('materias')
            ->removeColumn('carrera_id')
            ->update();
    }
}


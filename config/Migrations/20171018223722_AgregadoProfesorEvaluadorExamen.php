<?php
use Migrations\AbstractMigration;

class AgregadoProfesorEvaluadorExamen extends AbstractMigration
{

    public function up()
    {

        $this->table('examens')
            ->addColumn('profesor_evaluador', 'string', [
                'after' => 'condicion_anterior',
                'default' => null,
                'length' => 255,
                'null' => false,
            ])
            ->update();
    }

    public function down()
    {

        $this->table('examens')
            ->removeColumn('profesor_evaluador')
            ->update();
    }
}


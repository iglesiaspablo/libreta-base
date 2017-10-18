<?php
use Migrations\AbstractSeed;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Utility\Text;

/**
 * Users seed.
 */
class DatabaseSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $hasher = new DefaultPasswordHasher();
        $password = $hasher->hash('admin');
        $faker = Faker\Factory::create();

        $adminId = Text::UUID();
        $data = [
            'id' => $adminId,
            'nombre' => 'Administrador Maestro',
            'username'   => 'admin',
            'password'   => $password,
            'role'       => 'admin',
            'created'    => date("Y-m-d H:i:s"),
            'modified'   => date("Y-m-d H:i:s")
        ];
        $table = $this->table('users');
        $table->truncate();
        $table->insert($data)->save();
        
        $password = $hasher->hash('secret');
        $userData = [];
        $usersIds = [$adminId];
        for ($i = 0; $i < 10; $i++)
        {
            $id = Text::UUID();
            $userData[] = [
                'id' => $id,
                'nombre' => $faker->firstName() . " " . $faker->lastName(),
                'username'   => $faker->userName,
                'password'   => $password,
                'role'       => "alumno",
                'created'    => date("Y-m-d H:i:s"),
                'modified'   => date("Y-m-d H:i:s")
            ];
            $usersIds[] = $id;
        }

        $table = $this->table('users');
        $table->insert($userData)->save();

        $carreraData = [];
        $carrerasIds = [];
        for ($i = 0; $i < 5; $i++)
        {
            $id = Text::UUID();
            $carreraData[] = [
                'id' => $id,
                'nombre' => $faker->sentence($nbWords = 4, $variableNbWords = true),
                'created'    => date("Y-m-d H:i:s"),
                'modified'   => date("Y-m-d H:i:s")
            ];
            $carrerasIds[] = $id;
        }

        $table = $this->table('carreras');
        $table->truncate();
        $table->insert($carreraData)->save();

        $materiaData = [];
        $materiasIds = [];
        for ($i = 0; $i < 40; $i++)
        {
            $id = Text::UUID();
            $materiaData[] = [
                'id' => $id,
                'nombre' => $faker->sentence($nbWords = 3, $variableNbWords = true),
                'anio_cursado' => $faker->randomElement($array = array("primero", "segundo", "tercero")),
                'carrera_id' => $faker->randomElement($carrerasIds),
                'created'    => date("Y-m-d H:i:s"),
                'modified'   => date("Y-m-d H:i:s")
            ];
            $materiasIds[] = $id;
        }

        $table = $this->table('materias');
        $table->truncate();
        $table->insert($materiaData)->save();

        $libretaData = [];
        $libretasIds = [];
        for ($i = 0; $i < 20; $i++)
        {
            $id = Text::UUID();
            $libretaData[] = [
                'id' => $id,
                'nombre' => $faker->sentence($nbWords = 2, $variableNbWords = true),
                'carrera_id' => $faker->randomElement($carrerasIds),
                'user_id' => $faker->randomElement($usersIds),
                'created'    => date("Y-m-d H:i:s"),
                'modified'   => date("Y-m-d H:i:s")
            ];
            $libretasIds[] = $id;
        }

        $table = $this->table('libretas');
        $table->truncate();
        $table->insert($libretaData)->save();

    }
}
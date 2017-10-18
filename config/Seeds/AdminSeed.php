<?php
use Migrations\AbstractSeed;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Utility\Text;

/**
 * Admin seed.
 */
class AdminSeed extends AbstractSeed
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
        $data = [
            'id' => Text::UUID(),
            'nombre' => 'Administrador Maestro',
            'username'   => 'admin_1',
            'password'   => $password,
            'role'       => 'admin',
            'created'    => date("Y-m-d H:i:s"),
            'modified'   => date("Y-m-d H:i:s")
        ];
        $table = $this->table('users');
        $table->truncate();
        $table->insert($data)->save();
    }
}
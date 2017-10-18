<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Materia Entity
 *
 * @property string $id
 * @property string $nombre
 * @property string $anio_cursado
 * @property string $carrera_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Carrera $carrera
 * @property \App\Model\Entity\Examen[] $examens
 */
class Materia extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'nombre' => true,
        'anio_cursado' => true,
        'carrera_id' => true,
        'created' => true,
        'modified' => true,
        'carrera' => true,
        'examens' => true
    ];
}

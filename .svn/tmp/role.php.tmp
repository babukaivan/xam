<?php
namespace App\Model;

class Role extends \PHPixie\ORM\Model {

    public $id_field='id';
    public $table='role';

    protected $has_many=array(
        'users'=>array(
            'model'=>'role',
            'key'=>'id_role',
            'foreign_key' => 'id_user',
            'through' => 'users_roles'
        )
    );
}
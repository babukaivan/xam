<?php
namespace App\Model;

class User extends \PHPixie\ORM\Model {

    public $id_field='id';    //Name of the column with the id user
    public $table='user';    //Name of the user table

    //A user can have multiple roles - has_many relation
    protected $has_many=array(
        'roles'=>array(                    //Use this name for orm->get() in $this->pixie->orm->get('roles')
            'model'=>'role',            //The model class "targeted"
            'key'=>'id_user',            //The user key in the relation table
            'foreign_key' => 'id_role',    //The role key in the relation table
            'through' => 'users_roles'    //The relation table
        )
    );

    public function createUser($data,$role_id = 2) ///$role_id = 1 ( admin ), $role_id = 2 ( simple user )
    {
//        print_r($data);exit;
        $user = $this->pixie->orm->get('user')->where('email',$data['email'])->find();
        if ($user->loaded())
            throw new \Exception('User with email:'.$data['email'].' already exists');

        $user = $this->pixie->orm->get('user');
        $user->email = $data['email'];
        $user->username = $data['email'];
        $user->created_at = date('Y-m-d H:i:s',time());
        $user->password = $this->pixie->auth->provider('password')->hash_password($data['password']);
        if ( isset($data['user_type']) ) {
            $user->user_type = $data['user_type'];
        } else {
            $user->user_type = 'simple';
        }

        if ( isset($data['tw_id']) ) {
            $user->tw_id = $data['tw_id'];
        }

        $user->save();

        $user_role_sign = $this->pixie->orm->get('usersroles');
        $user_role_sign->id_user = $user->id;
        if ( in_array($role_id,array(1,2)) ) {
            $user_role_sign->id_role = $role_id;
        } else {
            $user_role_sign->id_role = 2;
        }

        $user_role_sign->save();
    }
}
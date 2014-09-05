<?php


namespace App\Model;

class Comments extends \PHPixie\ORM\Model {

    public $id_field='id';
    public $table='comments';

    protected $has_many=array(
        'childs'=>array(
            'model'=>'comments',
//            'through'=>'bidimages',

            //the key for current table in joining table
            'key'=>'parent_comment_id',

            //the key for foreign (trees) table in joining table
//            'foreign_key'=>'bid_id'
        )
    );

    protected $belongs_to=array(

        //Set the name of the relation, this defines the
        //name of the property that you can access this relation with
        'author'=>array(

            //name of the model to link
            'model'=>'user',

            //key in 'fairies' table
            'key'=>'user_id'
        )
    );

}
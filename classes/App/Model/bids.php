<?php


namespace App\Model;

class Bids extends \PHPixie\ORM\Model {

    public $id_field='id';
    public $table='bids';

    protected $has_many=array(
        'images'=>array(
            'model'=>'bidimages',
//            'through'=>'bidimages',

            //the key for current table in joining table
            'key'=>'bid_id',

            //the key for foreign (trees) table in joining table
//            'foreign_key'=>'bid_id'
        )
    );

}
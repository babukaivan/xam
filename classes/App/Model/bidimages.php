<?php


namespace App\Model;

class Bidimages extends \PHPixie\ORM\Model {

    public $id_field='id';
    public $table='bidimages';

    protected $belongs_to=array(

        //Set the name of the relation, this defines the
        //name of the property that you can access this relation with
        'image'=>array(

            //name of the model to link
            'model'=>'bids',

            //key in 'fairies' table
            'key'=>'bid_id'
        )
    );

}
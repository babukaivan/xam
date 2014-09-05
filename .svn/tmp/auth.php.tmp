<?php
return array(
    'default' => array(
        'model' => 'user',

        //Login providers
        'login' => array(
            'password' => array(
                'login_field' => 'email',

                //Make sure that the corresponding field in the database
                //is at least 50 characters long
                'password_field' => 'password'
            ),
            'facebook' => array(

                //Facebook App ID and Secret
                'app_id' => '804190332964460',
                'app_secret' => '0f8acef94ae68fe480fe108eafbf820e',

                //Permissions to request from the user
                'permissions'  => array('user_about_me','email'),


                'fbid_field' => 'fb_id',

                //Redirect user here after he logs in
                'return_url' => '/'
            )
        ),

        //Role driver configuration
        'roles' => array(
            'driver' => 'relation',
            'type' => 'has_many',
            'name_field' => 'name', //Column for the name of the roles
            'relation' => 'roles'   //Name of the role table
        )
    )
);

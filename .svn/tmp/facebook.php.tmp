<?php
namespace App\Controller;
class Facebook extends \PHPixie\Auth\Controller\Facebook{

    //This method gets called for new users
    //$access_token is the users access token
    //$return_url is the url to redirect the user to
    //after you are done (it can be null if you are
    //using the popup way, it means that the popup
    //will be closed after the login)
    //$display_mode is either 'page' or 'popup'
    public function new_user($access_token, $return_url, $display_mode) {

        //Facebook provider allows use to request
        //URLs with CURL, but you can use any other way of
        //fetching a URL here.
        $data = $this->provider
            ->request("https://graph.facebook.com/me?access_token=".$access_token);
        $data = json_decode($data);

        //Save the new user
        $user = $this->pixie->orm->get('user');
        $user->username = $data->first_name;
        $user->email = $data->email;
        $user->fb_id = $data->id;
        $user->fb_accesstoken = $access_token;
        $user->created_at = date('Y-m-d H:i:s',time());
        $user->updated_at = date('Y-m-d H:i:s',time());
        $user->user_type = 'fb';
        $user->save();

        $user_role_sign = $this->pixie->orm->get('usersroles');
        $user_role_sign->id_user = $user->id;
        $user_role_sign->id_role = 2;
        $user_role_sign->save();

        //Finally set the user inside the provider
        $this->provider->set_user($user, $access_token);

        //And redirect him back.
        $this->return_to_url($display_mode, $return_url);
    }
}
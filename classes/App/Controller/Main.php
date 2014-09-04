<?php

namespace App\Controller;

class Main extends \App\Page {

    public function action_index(){
        $this->view->subview = 'hello';
        $bids_list = $this->pixie->db->query('select')->table('bids')
            ->where('status',1)
            ->join(array('bidimages','t'),array('t.bid_id','bids.id'))
            ->fields('bids.type','bids.id','bids.avto_number','bids.address','bids.date','bids.status','bids.created_at','bids.updated_at','t.img')
            ->group_by('t.bid_id')
            ->order_by('bids.created_at','desc')
            ->execute();


//        $tree=$this->pixie->orm->get('bids')->where('status',1)->find_all();
//
//        foreach ($tree as $ot) {            //Getting 3 fairies living in the Oak tree.
//            $imgs = $ot->images
//                ->find_all();
//
//            foreach ( $imgs as $one ) {
//                $this->pixie->debug->log($one->img_small);
//            }
//
//        }

        $this->view->bids_list = $bids_list;
    }

    public function action_details(){
        $this->view->subview = 'details';
        $bid_id = $this->request->param('id');
        $bid = $this->pixie->orm->get('bids')->where('id',$bid_id)->find();
        $this->view->bid = $bid;
        $imgs = $this->pixie->orm->get('bidimages')->where('bid_id',$bid->id)->find_all()->as_array();

        $this->view->imgs = $imgs;
    }

    public function action_login() {
        $auth = $this->pixie->auth;
        if($auth->user() && $auth->has_role('user'))
            $this->redirect('/');

        if ($this->request->method === 'POST' && $this->request->post('formType') === 'login') {
            $validate = $this->pixie->validate->get($this->request->post());
            $validate->field('password')
                ->rule('filled')
                ->rule('min_length', 8)
                ->error('Invalid password');
            $validate->field('email')
                ->rule('filled')
                ->rule('email')
                ->error('Invalid email');

            if ($validate->valid()) {
                $email = $this->request->post('email');
                $password = $this->request->post('password');
                //Attempt to login the user using his email and password
                $isLogged = $this->pixie->auth->provider('password')->login($email, $password);

                if ($isLogged) {
                    $this->view->msg = $this->messanger('success', 'You are now connected into the website /o/');
                    $this->redirect('/main/login');
                }  else {
                    $this->view->msg = $this->messanger('warning', 'Bad login');
                }

            } else {
                $err = '';
                foreach ( $validate->errors() as $error ) {
                    $err .=  $this->messanger('warning',$error[0]);
                }
                $this->view->msg = $err;
            }
        }
        //Include 'login.php' subview
        $this->view->subview = 'login';
    }

    public function action_register()
    {
        $auth = $this->pixie->auth;

        if($auth->user() && $auth->has_role('user')) $this->redirect('/');

        if ($this->request->method === 'POST' && $this->request->post('formType') === 'signup') {
            $validate = $this->pixie->validate->get($this->request->post());
            $validate->field('password')
                ->rule('filled')
                ->rule('min_length', 8)
                ->error('Invalid password (must contain 8+ characters)');
            $validate->field('passwordCheck')
                ->rule('filled')
                ->rule('same_as', 'password')
                ->error('Passwords do not match');
            $validate->field('email')
                ->rule('filled')
                ->rule('email')
                ->error('Invalid email');

            if ($validate->valid()) {
                //Create account
                $this->pixie->orm->get('user')->createUser($this->request->post(),2);
                $this->view->msg = $this->messanger('success','Ви зарегіструвалися!!');
                $this->redirect('/');
            } else {
                $err = '';
                foreach ( $validate->errors() as $error ) {
                    $err .=  $this->messanger('warning',$error[0]);
                }
                $this->view->msg = $err;
            }
            $this->view->post = $this->request->post();
        }
        $this->view->subview = 'register';
    }

    public function action_logout() {
        $this->pixie->auth->logout();
        $this->redirect('/main/login');
    }

    public function action_callback(){

        $this->execute = false;
        if(!empty($_GET['oauth_verifier']) && !empty($_SESSION['oauth_token']) && !empty($_SESSION['oauth_token_secret']))
        {

            $twitteroauth = new \TwitterOAuth('ITlBdzRbRksdmpsIPYmW3YPT0', 'Qm7ZGLWF04Zvq7brXlI23toFJXG52YuObQwgxhj1vuXqNZaDdj', $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);

            $access_token = $twitteroauth->getAccessToken($_GET['oauth_verifier']);

            $_SESSION['access_token'] = $access_token;

            $user_info = $twitteroauth->get('account/verify_credentials');

            if ($user_info->name)
            {
                $user = $this->pixie->orm->get('user')
                    ->where('tw_id', $user_info->id)
                    ->where('user_type','tw')
                    ->find();
                if ($user->loaded()) {

                } else {
                    $data_arr = array(
                        'email' => $user_info->screen_name,
                        'password' => $user_info->screen_name,
                        'user_type' => 'tw',
                        'tw_id' => $user_info->id
                    );
                    $this->pixie->orm->get('user')->createUser($data_arr,2);
                }
                $this->pixie->auth->provider('password')->tw_login($user_info->screen_name);

                $this->response->body = '<script type="text/javascript">// <![CDATA[
                                            window.close();
                                    // ]]></script>';
            }
        }else{
            $twitteroauth = new \TwitterOAuth('ITlBdzRbRksdmpsIPYmW3YPT0', 'Qm7ZGLWF04Zvq7brXlI23toFJXG52YuObQwgxhj1vuXqNZaDdj');

            $request_token = $twitteroauth->getRequestToken('http://xam.local.com/main/callback');


            $_SESSION['oauth_token'] = $request_token['oauth_token'];
            $_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];

            if($twitteroauth->http_code==200){
                $url = $twitteroauth->getAuthorizeURL($request_token['oauth_token']);
                header('Location: '. $url);
            } else {

            }
        }

    }

    public function action_addbid(){
        $formdata = array();
        if($this->logged_in('user')) {
            $userId = $this->pixie->auth->user()->id;
            if ($this->request->method === 'POST') {
                $imd_cnt = 0;
                $formdata = $this->request->post();
                if ( isset($formdata['files']) ) {
                    foreach ( $formdata['files'] as $file ) {
                        if ( $file != '' ) {
                            $imd_cnt++;
                        }
                    }
                }
                $validate = $this->pixie->validate->get($this->request->post());
                if ( $imd_cnt > 0 ) {
                    $validate->field('avto_number')
                        ->rule('filled')
                        ->error('Номер авто обовязковий');
                    $validate->field('address')
                        ->rule('filled')
                        ->error('Адреса обовязкова');
                    $validate->field('datetime')
                        ->rule('filled')
                        ->error('Дата обовязкова');
                    if ($validate->valid()) {
                        $new_bid = $this->pixie->orm->get('bids');
                        $new_bid->type = $formdata['type'];
                        $new_bid->avto_number = $formdata['avto_number'];
                        $new_bid->address = $formdata['address'];
                        $new_bid->lat = $formdata['lat'];
                        $new_bid->lng = $formdata['lng'];
                        $new_bid->date = $formdata['datetime'];
                        $new_bid->comment = $formdata['comment'];
                        $new_bid->status = 0;
                        $new_bid->created_at = date("Y-m-d H:i:s",time());
                        $new_bid->updated_at = date("Y-m-d H:i:s",time());

                        $new_bid->save();

                        if ( isset($formdata['files']) && !empty($formdata['files']) ) {
                            foreach ( $formdata['files'] as $one_img ) {
                                if ( $one_img != '' ) {
                                    //                                $r_img = $one_img;
                                    $one_img = substr($one_img,1);
                                    $file_path = $one_img;
                                    $unique_id = uniqid();
                                    $file = $unique_id.basename($one_img);
                                    $ext = pathinfo($one_img, PATHINFO_EXTENSION);
                                    switch ( $ext ) {
                                        case 'jpg' :
                                            $one_img = imagecreatefromjpeg($one_img);
                                            break;
                                        case 'jpeg' :
                                            $one_img = imagecreatefromjpeg($one_img);
                                            break;
                                        case 'png' :
                                            $one_img = imagecreatefrompng($one_img);
                                            break;
                                    }
                                    $one_img_mini = \Utills::resize_image_crop($one_img,100,100);
                                    $one_img_big = \Utills::resize_image_crop($one_img,480,360);

                                    if ( !is_dir('uploads/bids/'.$userId) ) {
                                        $oldmask = umask(0);
                                        mkdir('uploads/bids/'.$userId, 0777);
                                        umask($oldmask);
                                    }
                                    $mini_file = 'uploads/bids/'.$userId.'/mini_'.$file;
                                    $big_file = 'uploads/bids/'.$userId.'/big_'.$file;
                                    imagejpeg($one_img_mini,$mini_file);
                                    imagejpeg($one_img_big,$big_file);

                                    $new_bid_image = $this->pixie->orm->get('bidimages');
                                    $new_bid_image->bid_id = $new_bid->id;
                                    $new_bid_image->img = '/'.$big_file;
                                    $new_bid_image->img_small = '/'.$mini_file;
                                    $new_bid_image->user_id = $userId;
                                    $new_bid_image->save();


//                                rename($file_path, 'uploads/bids/'.$userId.'/'.$file);
                                  copy($file_path,'uploads/bids/'.$userId.'/'.$file);

                                }
                            }
                        }

                        $this->redirect('/');

                    } else {
                        $err = '';
                        foreach ( $validate->errors() as $error ) {
                            $err .=  $this->messanger('warning',$error[0]);
                        }
                        $this->view->msg = $err;
                    }

                } else {
                    $this->view->msg = $this->messanger('warning','Загрузіть фото');
                }
            }
        }
        $this->view->formdata = $formdata;
        $this->view->subview = 'addbid';
    }

}

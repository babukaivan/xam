<?php

namespace App\Controller;

class Admin extends \App\Admin {

    public function action_index(){
        if(!$this->logged_in('admin'))
            return;

        $this->view->admin = $this->pixie->auth->user();

        //Include 'hello.php' subview
        $this->view->subview = 'hello_admin';

    }

    public function action_register()
    {
        $auth = $this->pixie->auth;

        if($auth->user()) $this->redirect('/admin');

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
                $this->pixie->orm->get('user')->createUser($this->request->post(),1);
                $this->view->msg = $this->messanger('success','User created !!');
                $this->redirect('/admin/login');
            } else {
                $err = '';
                foreach ( $validate->errors() as $error ) {
                    $err .=  $this->messanger('warning',$error[0]);
                }
                $this->view->msg = $err;
            }
            $this->view->post = $this->request->post();
        }
        $this->view->subview = 'register_admin';
    }

    public function action_login() {
        $auth = $this->pixie->auth;

        if($auth->user() && $this->pixie->auth->has_role('admin')) $this->redirect('/admin');
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
                    $this->redirect('/admin');
                } else {
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
        $this->view->subview = 'login_admin';
    }

    public function action_logout() {
        $this->pixie->auth->logout();
        $this->redirect('/admin/login');
    }

    public function action_bids_list(){
        if(!$this->logged_in('admin'))
            return;;
        $this->view->subview = 'bids_list';
        $bids_list = $this->pixie->db->query('select')->table('bids')
            ->join(array('bidimages','t'),array('t.bid_id','bids.id'))
            ->fields('bids.type','bids.id','bids.avto_number','bids.address','bids.date','bids.status','bids.created_at','bids.updated_at','t.img_small')
            ->group_by('t.bid_id')
            ->execute();
//        $this->pixie->debug->log($bids_list->as_array());


        $this->view->bids_list = $bids_list;
    }
    public function action_block(){
        $this->execute = false;
        $bid_id = $this->request->param('id');
        $bid = $this->pixie->orm->get('bids')->where('id',$bid_id)->find();
        if ( $bid ) {
            $bid->status = 0;
            $bid->save();
        }
        $this->redirect('/admin/bids_list');
    }
    public function action_unblock(){
        $this->execute = false;
        $bid_id = $this->request->param('id');
        $bid = $this->pixie->orm->get('bids')->where('id',$bid_id)->find();
        if ( $bid ) {
            $bid->status = 1    ;
            $bid->save();
        }
        $this->redirect('/admin/bids_list');
    }
}

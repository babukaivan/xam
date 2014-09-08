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
    public function action_comments(){
        $this->view->subview = 'comment_list';
        $bid_id = $this->request->param('id');
        $bid = $this->pixie->orm->get('bids')->where('id',$bid_id)->find();
        $this->view->bid = $bid;

        $comments = $this->pixie->orm->get('comments')->where('parent_comment_id',0)->where('topic_id',$bid_id)->order_by('created_at','asc')->find_all();

        $tree = $this->build_comments_tree($comments);
        $this->view->tree = $tree;
    }

    public function action_blockcomment(){
        $this->execute = false;
        $comm_id = $this->request->param('id');
        $comment = $this->pixie->orm->get('comments')->where('id',$comm_id)->find();
        $comment->status = 1;
        $comment->save();
        $this->redirect('/admin/comments/'.$comment->topic_id);
    }
    public function action_unblockcomment(){
        $this->execute = false;
        $comm_id = $this->request->param('id');
        $comment = $this->pixie->orm->get('comments')->where('id',$comm_id)->find();
        $comment->status = 0;
        $comment->save();
        $this->redirect('/admin/comments/'.$comment->topic_id);
    }

    public function action_showimages(){
        $this->execute = false;
        $bid_id = $this->request->post('bid_id');

        $imgs = $this->pixie->orm->get('bidimages')->where('bid_id',$bid_id)->find_all();
        $this->execute = false;

        $ret = '';
        if ( !empty($imgs) ) {
            foreach ( $imgs as $imm ) {
                $ret .= '<a  rel="group" class="fnc" href="'.str_replace('big_','',$imm->img).'"><img src="'.str_replace('big_','',$imm->img).'" /></a>';
            }
        }

        $this->response->body = $ret;

    }

    public  function build_comments_tree($comments){
        $tree = '';
        foreach ($comments as $one_com) {
            $tree .= '<div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>'.
                ( $one_com->status == 0  ? '<a style="float:right" class="reply btn btn-danger" href="/admin/blockcomment/'.$one_com->id.'">Блокувати</a>' : '<a style="float:right" class="reply btn btn-success" href="/admin/unblockcomment/'.$one_com->id.'">Розблокувати</a>' )
                .'<div class="media-body">
                    <h4 class="media-heading">'. ( $one_com->user_id != 0  ? $one_com->author->username : 'Анонім' )
                .'<small> '. $one_com->created_at .'</small>
                    </h4>'.
                $one_com->message;
            ?>
            <?php
            $replies = $one_com->childs;
            if ( (int)$replies->count_all() > 0 ) {
                $tree .= $this->build_comments_tree($replies->find_all());
            }

            $tree .= '</div></div>';
        }
        return $tree;
    }
}

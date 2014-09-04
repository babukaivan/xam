<?php

namespace App;

/**
 * Base controller
 *
 * @property-read \App\Pixie $pixie Pixie dependency container
 */
class Page extends \PHPixie\Controller {

	protected $view;
    protected $auth;

    public function messanger($type,$message){
        $template = '<div class="alert alert-'.$type.' alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                      <strong>'.ucfirst($type).'!</strong> '.$message.'
                    </div>';
        if ( in_array($type,array('success','info','warning','danger')) ) {
            return $template;
        }
    }

	public function before() {
		$this->view = $this->pixie->view('layout');
        $role =  $this->pixie->auth->has_role('user');
        if ( $this->pixie->auth->user() && $role  ) {
            $usr = $this->pixie->auth->user();
        } else {
            $usr = false;
        }

        $this->view->user = $usr;


        $this->view->msg = '';
	}

	public function after() {
		$this->response->body = $this->view->render();
	}

    protected function logged_in($role = null){
        if($this->pixie->auth->user() == null){
            $this->redirect('/');
            return false;
        }

        if($role && !$this->pixie->auth->has_role($role)){
            $this->redirect('/');
            return false;
        }

        return true;
    }

}

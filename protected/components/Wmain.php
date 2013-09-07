<?php
class Wmain extends CWidget
{
    public $view;
    public $model;
    
    public function init()
    {
    	parent::init();
    }
    public function run(){
    	switch ($this->view){
    		case 'menu':
    			$this->render('menu',array('model'=>$this->model));
    			break;
    		default:
    			$this->render($this->view,array('model'=>$this->model));
    	}
    	
    	
    }
}
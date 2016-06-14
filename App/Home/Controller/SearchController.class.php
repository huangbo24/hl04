<?php
namespace Home\Controller;
use Think\Controller;
class SearchController extends Controller {
    
    // 搜索
    public function Search(){
    	$key = trim($_POST['key']);
    	if(empty($key)){

    		//是空值就返回zhuyemian   		
    		$this->redirect('Index/Index');
	       }else {
	       	
	       	
	       	
	       	
	       	
	       	
	       	$this->display("Search:recommend");
	       	

    		}
    		

	
    	}
  
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}
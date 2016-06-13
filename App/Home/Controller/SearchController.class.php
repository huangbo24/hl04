<?php
namespace Home\Controller;
use Think\Controller;
class SearchController extends Controller {
	//前台首页
    public function index(){
    	//var_dump(get_defined_constants(true));
   
    	$this->display();

    }
    

    
    // 搜索
    public function search(){
    	$key = trim($_POST['key']);
    	//调用台词方法
    	$this->dialogue();
    	// 1. 搜索电影
    	$mv['filmname'] = array('like', "%{$key}%");
    	$mv['status']   = array('in', '1,2');
    	$mv['_logic']   = 'and';
    
    	// 搜索分类
    	$mt['typename'] = array('like', "%{$key}%");
    
    	// 搜索长评
    	$map['title']   = array('like', "%{$key}%");
    
    	$findmv = M('movie')->where($mv)->select();
    	$findty = M('type')->where($mt)->select();
    	$findlr = M('longreview')->where($map)->select();
    
    	if ($findmv && count($findmv)) {
    		// 1. 搜索电影
    		import('ORG.Util.Page');
    		$where['filmname'] = array('like', "%{$key}%");
    		$where['status'] = array('in', '1,2');
    		$where['_logic'] = 'and';
    
    		$count = M('movie')->where($where)->count(); // 满足条件的总记录数
    		$Page = new Page($count, 10); // 实例化分页类
    		$show = $Page->show();  // 分页显示输出
    
    		$Mactor = D('Movie');
    		$list = $Mactor->relation('actorlist')->where($where)->order('clicknum desc')->limit($Page->firstRow.','.$Page->listRows)->select();
    			
    
    		$this->assign('tag', "电影搜索："." ".$key);
    		$this->assign('list', $list);
    		$this->assign('page', $show);
    			
    		//友情链接
    		$this->link();
    		$this->display("Typelist/tags");
    
    	}elseif ($findty && count($findty)) {
    		// 2. 搜索分类
    		$tags = $findty;

    		$tid = $findty[0]['id'];
    		$typename = $findty[0]['typename'];
    
    		//分页
    		$Model = new Model();
    		$movies = $Model->query("SELECT m.* FROM mm_movie m LEFT JOIN mm_movie_type mt ON mt.fid=m.id WHERE mt.tid={$tid} AND m.status in (1,2)");
    
    		import('ORG.Util.Page');        //导入分页类
    		$count = count($movies);      //满足要求的总记录数
    
    		$Page = new Page($count, 10);   //实例化分页类
    
    		$show = $Page->show();          // 分页显示输出
    		// 分页数据查询
    		$list = $Model->query("SELECT m.* FROM mm_movie m LEFT JOIN mm_movie_type mt ON mt.fid=m.id WHERE mt.tid={$tid} AND m.status in (1,2) ORDER BY clicknum DESC LIMIT {$Page->firstRow},{$Page->listRows}");
    
    		$this->assign('tag', "电影标签：".$typename);
    			
    		$this->assign('list', $list);
    		$this->assign('page', $show);
    			
    		//友情链接
    		$this->link();
    		$this->display("Typelist/tags");
		} else {
    		$this->assign("tag", "搜索：".$key);
    				$this->hot();
    				$this->dialogue();
    				//友情链接
    				$this->link();
    				$this->display("recommend");
    		}
	
    	}
  
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}
<?php 
	class controller{
		public $model;
		public function __construct(){
			$this->model = new model();
		}
		public function view($src,$data){
			extract($data);
			ob_start();
			if(file_exists($src))
				include $src;
			$content = ob_get_contents();
			ob_get_clean();
			echo $content;
		}
	}
 ?>
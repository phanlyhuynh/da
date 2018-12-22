<?php 
	class controller_home extends controller{
		public function __construct(){
			parent::__construct();
			//---------
						
			//---------
			//load view
			include "view/frontend/view_home.php";
		}
	}
	new controller_home();
 ?>
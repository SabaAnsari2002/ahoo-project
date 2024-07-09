<?php
 class ahooController extends CI_Controller{
	 
	 public function index()
	 {		 
		 $this->load->view('main_index');
	 }
	 
	 //agter login index:
	 
	 public function userIndex(){
		 
		 $this->load->library('session');
		 $userID = $this->session->userdata('userID');
		 		 
		  $this->load->model('dataModel');

          $data['info'] = $this->dataModel->showUserInformation($userID);
		 
			$this->load->view('user_index',$data);

	 }
	 	 public function adminIndex(){
		 
		 $this->load->library('session');
		 $userID = $this->session->userdata('userID');
		 		 
		  $this->load->model('dataModel');

          $data['info'] = $this->dataModel->showUserInformation($userID);
		 
			$this->load->view('admin_index',$data);

	 }
	 
	 //index page methods:
	 public function goToIndex($id)
	{
		  $this->load->model('dataModel');

          $data['info'] = $this->dataModel->showUserInformation($id);

		 if($id==10){
		     $this->load->view('sign_in');
		 }
		 else if($id==20){
		     $this->load->view('sign_up');
		 }
		 else if($id==1 || $id==2){
		     $this->load->view('insert_admin1',$data);
		 }
		 else if($id==3){
		     $this->load->view('insert_admin3',$data);
		 }
		 else if($id==4){
		     $this->load->view('insert_admin4',$data);
		 }
		 else if($id==5){
		     $this->load->view('insert_admin5',$data);
		 }
		 else if($id==6){
		     $this->load->view('insert_admin6',$data);
		 }
		 else if($id==7){
		     $this->load->view('insert_main_admin',$data);
		 }

	}
	
// Sign up methods:
public function insertUserData()
{
     $this->load->library('form_validation');
    // اعتبارسنجی فرم
    $this->form_validation->set_rules('fname', 'نام', 'required|min_length[2]|regex_match[/^[آ-ا-ب-پ-ت-ث-ج-چ-ح-خ-د-ذ-ر-ز-ژ-س-ش-ص-ض-ط-ظ-ع-غ-ف-ق-ه-ک-گ-ل-ن-م-و-ه-ی]+(\s[آ-ا-ب-پ-ت-ث-ج-چ-ح-خ-د-ذ-ر-ز-ژ-س-ش-ص-ض-ط-ظ-ع-غ-ف-ق-ه-ک-گ-ل-ن-م-و-ه-ی]+)*$/]');
    $this->form_validation->set_rules('lname', 'نام خانوادگی', 'required|min_length[3]|regex_match[/^[آ-ا-ب-پ-ت-ث-ج-چ-ح-خ-د-ذ-ر-ز-ژ-س-ش-ص-ض-ط-ظ-ع-غ-ف-ق-ه-ک-گ-ل-ن-م-و-ه-ی]+(\s[آ-ا-ب-پ-ت-ث-ج-چ-ح-خ-د-ذ-ر-ز-ژ-س-ش-ص-ض-ط-ظ-ع-غ-ف-ق-ه-ک-گ-ل-ن-م-و-ه-ی]+)*$/]');
    $this->form_validation->set_rules('email', 'ایمیل', 'valid_email|callback_check_unique_email');
$this->form_validation->set_rules('pass', 'رمز عبور', 'required|min_length[8]|callback_password_check');
    $this->form_validation->set_rules('user', 'نام کاربری', 'required|callback_check_unique_username');

    // پیامهای خطا
    $this->form_validation->set_message('regex_match', '%s باید فقط شامل حروف الفبا باشد.');
    $this->form_validation->set_message('min_length', 'حداقل طول %s %s کاراکتر است.');
    $this->form_validation->set_message('required', '%s نمیتواند خالی باشد.');
    $this->form_validation->set_message('valid_email', '%s باید طبق فرمت درستی وارد شود.');
    $this->form_validation->set_message('check_unique_email', 'ایمیل وارد شده تکراری است.');
    $this->form_validation->set_message('check_unique_username', 'نام کاربری وارد شده تکراری است.');


    if ($this->form_validation->run() == FALSE) {
        $this->load->view('sign_up');
    } else {
        $data = array(
            'fname' => $this->input->post('fname'),
            'lname' => $this->input->post('lname'),
            'email' => $this->input->post('email'),
            'pass' => $this->input->post('pass'),
            'user' => $this->input->post('user')
        );

        $this->load->model('dataModel');
        $result = $this->dataModel->insertUserData($data);
        if ($result) {
            $this->load->view('user_sign_up_success_alert');
        } else {
            $this->load->view('user_sign_up_error_alert');
        }
    }
}

public function check_unique_email($email)
{
    // بررسی تکراری نبودن ایمیل در دیتابیس
    $this->load->model('dataModel');
    return !$this->dataModel->is_email_exists($email);
}

public function check_unique_username($username)
{
    // بررسی تکراری نبودن نام کاربری در دیتابیس
    $this->load->model('dataModel');
    return !$this->dataModel->is_username_exists($username);
}

public function password_check($str) {
    if (!preg_match('/[a-z]/', $str)) {
        $this->form_validation->set_message('password_check', 'رمز عبور باید شامل حداقل یک حرف کوچک انگلیسی باشد.');
        return FALSE;
    } elseif (!preg_match('/[A-Z]/', $str)) {
        $this->form_validation->set_message('password_check', 'رمز عبور باید شامل حداقل یک حرف بزرگ انگلیسی باشد.');
        return FALSE;
    } elseif (!preg_match('/[0-9]/', $str)) {
        $this->form_validation->set_message('password_check', 'رمز عبور باید شامل حداقل یک عدد باشد.');
        return FALSE;
    } elseif (!preg_match('/[@#]/', $str)) {
        $this->form_validation->set_message('password_check', 'رمز عبور باید شامل حداقل یکی از کاراکترهای @ یا # باشد.');
        return FALSE;
    } else {
        return TRUE;
    }
}

	 //Sign in methods:
	 public function signIn() {
		$this->load->model('dataModel');

		$condition = "/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/";
  
        $username = $this->input->post('user');
        $password = $this->input->post('pass');
		  
        $result = $this->dataModel->signIn($username,$password);
        if ($result==FALSE) {
			$this->session->set_flashdata('error','نام کاربری یا رمز عبور اشتباه می باشد.');
			//echo '<font color=red>Invalid username and/or password.</font><br />';
            $this->load->view('sign_in');
        } 
		else {
			$this->load->model('dataModel');
			$userID= $this->dataModel->getUserID($username);
			
			if($userID){
			    $this->load->library('session');
		        $this->session->set_userdata('userID', $userID);
				$data['info'] = $this->dataModel->showUserInformation($userID);

				if($userID==1 || $userID==2 || $userID==3 || $userID==4 || $userID==5 || $userID==6 || $userID==7){
					$this->load->view('admin_index.php',$data);
				}else{
			    //$this->load->library('session');
		            $this->session->set_userdata('userID', $userID);				
				
				    $this->load->view('user_index.php',$data);
			    }
				
		     }

	    }
    }  

	 //Edit user information methods:
	 public function showUserInformation()
	 {		 
	    $this->load->library('session');
        $userID = $this->session->userdata('userID');
		 
		$this->load->model('dataModel');

        $data['info'] = $this->dataModel->showUserInformation($userID);
        $this->load->view('Edit_user_information', $data);
	 }

	 public function updateInformation()
	 {
		 $this->load->library('form_validation');
		 // اعتبارسنجی فرم
		 $this->form_validation->set_rules('fname', 'نام', 'required|min_length[2]|regex_match[/^[آ-ا-ب-پ-ت-ث-ج-چ-ح-خ-د-ذ-ر-ز-ژ-س-ش-ص-ض-ط-ظ-ع-غ-ف-ق-ه-ک-گ-ل-ن-م-و-ه-ی]+(\s[آ-ا-ب-پ-ت-ث-ج-چ-ح-خ-د-ذ-ر-ز-ژ-س-ش-ص-ض-ط-ظ-ع-غ-ف-ق-ه-ک-گ-ل-ن-م-و-ه-ی]+)*$/]');
		 $this->form_validation->set_rules('lname', 'نام خانوادگی', 'required|min_length[3]|regex_match[/^[آ-ا-ب-پ-ت-ث-ج-چ-ح-خ-د-ذ-ر-ز-ژ-س-ش-ص-ض-ط-ظ-ع-غ-ف-ق-ه-ک-گ-ل-ن-م-و-ه-ی]+(\s[آ-ا-ب-پ-ت-ث-ج-چ-ح-خ-د-ذ-ر-ز-ژ-س-ش-ص-ض-ط-ظ-ع-غ-ف-ق-ه-ک-گ-ل-ن-م-و-ه-ی]+)*$/]');
		 $this->form_validation->set_rules('email', 'ایمیل', 'valid_email');
		 $this->form_validation->set_rules('pass', 'رمز عبور', 'required|min_length[8]|callback_password_check');
		 $this->form_validation->set_rules('user', 'نام کاربری', 'required');

		 // پیامهای خطا
		 $this->form_validation->set_message('regex_match', '%s باید فقط شامل حروف الفبا باشد.');
		 $this->form_validation->set_message('min_length', 'حداقل طول %s %s کاراکتر است.');
		 $this->form_validation->set_message('required', '%s نمیتواند خالی باشد.');
		 $this->form_validation->set_message('valid_email', '%s باید طبق فرمت درستی وارد شود.');

		 if ($this->form_validation->run() == FALSE)
                {
	               $this->load->library('session');
                   $userID = $this->session->userdata('userID');
		 
		           $this->load->model('dataModel');

                   $data['info'] = $this->dataModel->showUserInformation($userID);
                   $this->load->view('Edit_user_information', $data);

                }
                else
                {
	    $this->load->library('session');
        $userID = $this->session->userdata('userID');
		 
		 $this->load->model('dataModel');
		 $result=$this->dataModel->updateInformation($userID);
		 
					
		 $this->load->model('dataModel');

          $data['info'] = $this->dataModel->showUserInformation($userID);
			
		 if($result){
			 if($userID==1|$userID==2|$userID==3|$userID==4|$userID==5|$userID==6|$userID==7){
			 $this->load->view('admin_success_alert',$data);
			 
			 }else
		      $this->load->view('user_success_alert',$data);
		 }
		 else {
             if($userID==1|$userID==2|$userID==3|$userID==4|$userID==5|$userID==6|$userID==7){
			 $this->load->view('admin_error_alert',$data);
			 
			 }else
		      $this->load->view('user_error_alert',$data);		 }
     }	
	 
}	 
 //Insert Poem Methods:
	 public function insertPoem()
	{
		   	$this->load->library('session');
		    $adminID = $this->session->userdata('userID');
		 	$this->load->model('dataModel');

		    $data['info'] = $this->dataModel->showUserInformation($adminID);
		 
		 //form validation
		 
		 $this->load->library('form_validation');	
		
	   $this->form_validation->set_rules('name', 'عنوان شعر', 'required');		
	   $this->form_validation->set_rules('poem', ' متن شعر ', 'required');
//	   $this->form_validation->set_rules('book', ' اثر شاعر ', 'required');
//	   $this->form_validation->set_rules('form', ' قالب شعر ', 'required');
//	   $this->form_validation->set_rules('pname', ' شاعر ', 'required');
	   $this->form_validation->set_message('required', '%s نمیتواند خالی باشد.');
		 
	   if ($this->form_validation->run() == FALSE){
		if($adminID==1 || $adminID==2){
		     $this->load->view('insert_admin1',$data);
		 }
		 else if($adminID==3){
		     $this->load->view('insert_admin3',$data);
		 }
		 else if($adminID==4){
		     $this->load->view('insert_admin4',$data);
		 }
		 else if($adminID==5){
		     $this->load->view('insert_admin5',$data);
		 }
		 else if($adminID==6){
		     $this->load->view('insert_admin6',$data);
		 }
		 else if($adminID==7){
		     $this->load->view('insert_main_admin',$data);
		 }
		   

	   }else{
		 $result=$this->dataModel->insertPoem($_POST,$adminID);
		   
		 if($result==true){
			
			$this->load->view('admin_success_alert',$data);
		 }
		 else{
			$this->load->view('admin_error_alert',$data);
		 }
	   }		 
	 		
	 	 }	
	 //Show poem methods:
	 
	 public function showAllPoem() {
		 $this->load->library('session');
      $userID= $this->session->userdata('userID');
       $this->load->model('dataModel');

       $data1 = $this->dataModel->showUserInformation($userID);
       $data2 = $this->dataModel->showAllPoem($userID);

       $data['data1'] = json_encode($data1);
       $data['data2'] = json_encode($data2);

		 if($userID==7){
            $this->load->view('showPoem_mainadmin', $data);
		 }else{
            $this->load->view('showPoem', $data);
		 }
   }

	//deletePoem:
	public function deletePoem($poemId) {
		$this->load->library('session');
		$userID= $this->session->userdata('userID');
		$this->load->model('dataModel');

		$result = $this->dataModel->deletePoem($poemId);

		$data1 = $this->dataModel->showUserInformation($userID);
		$data2 = $this->dataModel->showAllPoem($userID);

		$data['data1'] = json_encode($data1);
		$data['data2'] = json_encode($data2);

		if($result){
			$this->load->view('showPoem_mainadmin', $data);
		}
	}

	//edit poem value
	 public function showPoemValue($poemID){
		$this->load->library('session');
		$adminID = $this->session->userdata('userID');
		$this->load->model('dataModel');
		 
	   $data1 = $this->dataModel->showUserInformation($adminID);
       $data2 = $this->dataModel->fetchPoemValue($poemID);

       $data['data1'] = json_encode($data1);
       $data['data2'] = json_encode($data2);


		 
		 if($adminID==1 || $adminID==2){
			$this->load->view('EditPoem_admin1', $data);
		 }
		 else if ($adminID==3){
			$this->load->view('EditPoem_admin3', $data);
		 }
		 else if ($adminID==4){
			$this->load->view('EditPoem_admin4', $data);
		 }
		 else if ($adminID==5){
			$this->load->view('EditPoem_admin5', $data);
		 }
		 else if ($adminID==6){
			$this->load->view('EditPoem_admin6', $data);
		 }
		 else if ($adminID==7){
			$this->load->view('EditPoem_main_admin', $data);
		 }
 	}
 
	 public function Editpoems(){
		 
		$this->load->library('session');
		$adminID = $this->session->userdata('userID');
		$this->load->model('dataModel');
		 
		 //form validation:
		 $this->load->library('form_validation');	
		
	   $this->form_validation->set_rules('name', 'عنوان شعر', 'required');		
	   $this->form_validation->set_rules('poem', ' متن شعر ', 'required');
	   $this->form_validation->set_message('required', '%s نمیتواند خالی باشد.');
		 
	   if ($this->form_validation->run() == FALSE){
		   $data1 = $this->dataModel->showUserInformation($adminID);
           $data2 = $this->dataModel->fetchPoemValue($_POST['id']);

           $data['data1'] = json_encode($data1);
           $data['data2'] = json_encode($data2);
		   
		 if($adminID==1 || $adminID==2){
			$this->load->view('EditPoem_admin1', $data);
		 }
		 else if ($adminID==3){
			$this->load->view('EditPoem_admin3', $data);
		 }
		 else if ($adminID==4){
			$this->load->view('EditPoem_admin4', $data);
		 }
		 else if ($adminID==5){
			$this->load->view('EditPoem_admin5', $data);
		 }
		 else if ($adminID==6){
			$this->load->view('EditPoem_admin6', $data);
		 }
		 else if ($adminID==7){
			$this->load->view('EditPoem_main_admin', $data);
		 }

	   }else{
          $data['info'] = $this->dataModel->showUserInformation($adminID);
      
		 $result=$this->dataModel->updatePoem($adminID,$_POST['id']);
		 
		 
		 if($result==true){
			
			$this->load->view('admin_success_alert',$data);
		 }
		 else{
			$this->load->view('admin_error_alert',$data);
		 }		   
	   }
		 
	 }
	 //inside poet:
	  public function insidePoet($id) {
		  
		$this->load->model('dataModel');		  
		  
       $data1 = $this->dataModel->poetBio($id);
       $data2 = $this->dataModel->getBooks($id);

       $data['data1'] = json_encode($data1);
       $data['data2'] = json_encode($data2);
		  
       $this->load->view('inside_poet', $data);
		  
    }

	  public function loginInsidePoet($id) {
		 $this->load->library('session');
        $userID= $this->session->userdata('userID');
		  
		$this->load->model('dataModel');		  
		  
       $data1 = $this->dataModel->poetBio($id);
       $data2 = $this->dataModel->getBooks($id);
       $data3 = $this->dataModel->showUserInformation($userID);

       $data['data1'] = json_encode($data1);
       $data['data2'] = json_encode($data2);
       $data['data3'] = json_encode($data3);
		
       if($userID==1|$userID==2|$userID==3|$userID==4|$userID==5|$userID==6|$userID==7){
			 $this->load->view('admin_inside_poet', $data);
			 
	    }else{
		      $this->load->view('user_inside_poet',$data);		 
	   }
		  
    }

	 
    public function getPoemsByBook() {
        $bookId = $this->input->post('book_id');
        $poems = $this->dataModel->getPoemsByBook($bookId);
        echo json_encode($poems);
    }
	 

	 //inside poem task:
	 
	 	public function showAPoem($poemId){
		$this->load->model('dataModel');		  
		  
       $data2 = $this->dataModel->showAPoem($poemId);
       $data3 = $this->dataModel->poetPic($poemId);
       $data4 = $this->dataModel->showComments($poemId);

       $data['data2'] = json_encode($data2);
       $data['data3'] = json_encode($data3);
       $data['data4'] = json_encode($data4);
			
	   $this->load->view('inside_poem',$data);		 

	}
 	 
	 	public function loginShowAPoem($poemId){
		 $this->load->library('session');
        $userID= $this->session->userdata('userID');
		  
		$this->load->model('dataModel');		  
		  
       $data1 = $this->dataModel->showUserInformation($userID);
       $data2 = $this->dataModel->showAPoem($poemId);
       $data3 = $this->dataModel->poetPic($poemId);
       $data4 = $this->dataModel->showComments($poemId);

       $data['data1'] = json_encode($data1);
       $data['data2'] = json_encode($data2);
       $data['data3'] = json_encode($data3);
       $data['data4'] = json_encode($data4);
			
       if($userID==1|$userID==2|$userID==3|$userID==4|$userID==5|$userID==6|$userID==7){
			 $this->load->view('admin_inside_poem', $data);
			 
	    }else{
		      $this->load->view('user_inside_poem',$data);		 
	   }
 }
	 
	 //cpmment task:
    public function insertComment($poemId)
    {
		 $this->load->library('session');
        $userID= $this->session->userdata('userID');		
        $this->load->model('datamodel');
		
		 $this->load->library('form_validation');	
		
	   $this->form_validation->set_rules('name', ' نام مستعار ', 'required');		
	   $this->form_validation->set_rules('comment', ' متن دیدگاه ', 'required');
	   $this->form_validation->set_message('required', '%s نمیتواند خالی باشد.');
		 
	   if ($this->form_validation->run() == FALSE){
       $data1 = $this->dataModel->showUserInformation($userID);
       $data2 = $this->dataModel->showAPoem($poemId);
       $data3 = $this->dataModel->poetPic($poemId);
       $data4 = $this->dataModel->showComments($poemId);

       $data['data1'] = json_encode($data1);
       $data['data2'] = json_encode($data2);
       $data['data3'] = json_encode($data3);
       $data['data4'] = json_encode($data4);
		   
	       if($userID==1|$userID==2|$userID==3|$userID==4|$userID==5|$userID==6|$userID==7){
			 $this->load->view('admin_inside_poem', $data);
			 
	        }else{
		      $this->load->view('user_inside_poem',$data);		 
	        }
		   

		   
	   }else{
        $result=$this->datamodel->insertComment($userID,$poemId,$_POST);
		
       $data1 = $this->dataModel->showUserInformation($userID);
       $data2 = $this->dataModel->showAPoem($poemId);
       $data3 = $this->dataModel->poetPic($poemId);
       $data4 = $this->dataModel->showComments($poemId);

       $data['data1'] = json_encode($data1);
       $data['data2'] = json_encode($data2);
       $data['data3'] = json_encode($data3);
       $data['data4'] = json_encode($data4);
		   
		   
		if($result){
	       if($userID==1|$userID==2|$userID==3|$userID==4|$userID==5|$userID==6|$userID==7){
			 $this->load->view('admin_inside_poem', $data);
			 
	        }else{
		      $this->load->view('user_inside_poem',$data);		 
	        }
			
		}
		else{
	       if($userID==1|$userID==2|$userID==3|$userID==4|$userID==5|$userID==6|$userID==7){
			 $this->load->view('admin_error_alert', $data);
			 
	        }else{
		      $this->load->view('user_error_alert',$data);		 
	        }
			
		}		   
	   }
		
	}
	 
	 //simple search task:
	 
     public function simpleSearchPoem() {
        $this->load->model('dataModel');
		 
        $data = $this->dataModel->simpleSearchPoem($_POST['poem']);
		 if ($data==false){
			 $this->load->view('no_result_alert');
		 }else{
			 $data['data'] = json_encode($data);
			 $this->load->view('search_result',$data );
		 }		 
    }
	 
	 //simple search after login:
     public function loginSimpleSearchPoem() {
	   $this->load->library('session');
       $userID= $this->session->userdata('userID');	 
		 
       $this->load->model('dataModel');

       $data1 = $this->dataModel->showUserInformation($userID);
       $data2 = $this->dataModel->simpleSearchPoem($_POST['poem']);
		 
       $data['data1'] = json_encode($data1);

		 if ($data2==false){
	       if($userID==1|$userID==2|$userID==3|$userID==4|$userID==5|$userID==6|$userID==7){
			 $this->load->view('admin_no_result_alert', $data);
			 
	        }else{
		      $this->load->view('user_no_result_alert',$data);		 
	        }
		 }else{
			 $data['data2'] = json_encode($data2);
	       if($userID==1|$userID==2|$userID==3|$userID==4|$userID==5|$userID==6|$userID==7){
			 $this->load->view('admin_search_result', $data);
			 
	        }else{
		      $this->load->view('user_search_result',$data);		 
	        }
		 }		 
		 
    }

	// filtering search (after submit):

	public  function search()
	{
		$this->load->model('datamodel');
		$data = $this->dataModel->filterRes($_POST['poetField'],$_POST['formField'],$_POST['bookField']);

		if ($data == false){
			$this->load->view('no_result_alert');
		}else{
			$data['data'] = json_encode($data);
			$this->load->view('search_result',$data );
		}
	}

	public function logedinSearch() {
		$this->load->library('session');
		$userID= $this->session->userdata('userID');

		$this->load->model('dataModel');

		$data1 = $this->dataModel->showUserInformation($userID);
		$data2 = $this->dataModel->filterRes($_POST['poetField'],$_POST['formField'],$_POST['bookField']);

		$data['data1'] = json_encode($data1);

		if ($data2==false){
			if($userID==1|$userID==2|$userID==3|$userID==4|$userID==5|$userID==6|$userID==7){
				$this->load->view('admin_no_result_alert', $data);

			}else{
				$this->load->view('user_no_result_alert',$data);
			}
		}else{
			$data['data2'] = json_encode($data2);
			if($userID==1|$userID==2|$userID==3|$userID==4|$userID==5|$userID==6|$userID==7){
				$this->load->view('admin_search_result', $data);

			}else{
				$this->load->view('user_search_result',$data);
			}
		}
	}

//ajax
	 
	 function searchAjax ()
    {
        $inputs = json_decode(file_get_contents('php://input'), true);
        $poets = $inputs->poets;
        $books = $inputs->books;
        $forms = $inputs->forms;

        $this->load->model('datamodel');
        //set conditions
        $this->dataModel->poet_condition($poets);
        $this->dataModel->book_condition($books);
        $this->dataModel->form_condition($forms);

        echo $this->dataModel->final_sql();
//        $result = $this->dataModel->fetchData($this->final_sql());


//        header('Content-Type: application/json');
        var_dump($result);
    }
 
 }

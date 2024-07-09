<?php

class dataModel extends CI_Model
{
// Sign up methods:
public function insertUserData($data)
{
    $result = $this->db->insert('user', $data);
    return $result;
}

public function is_username_exists($username)
{
    $this->db->where('user', $username);
    $query = $this->db->get('user');
    return $query->num_rows() > 0;
}

public function is_email_exists($email)
{
    $this->db->where('email', $email);
    $query = $this->db->get('user');
    return $query->num_rows() > 0;
}

public function __construct()
{
    parent::__construct();
    $this->load->database();
}

	//Get User ID:
	public function getUserID($username){
		$condition="user='".$username."' or email='".$username."'";
		$query=$this->db->get_where('user',$condition);
		
		foreach($query->result() as $row){
			return $row->id;
		}
	}
	
	
	//Sign in methods:
	public function signIn($username,$password) {
        $sqlUsername="select * from user where user='".$username."' and pass='".$password."'";
	    $sqlPassword="select * from user where email='".$username."' and pass='".$password."'";
		
	    $condition = "/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/";
		
        $result1=$this->db->query($sqlUsername);	
	    $result2=$this->db->query($sqlPassword);
		
	    if(preg_match($condition,$username)){
		    if($result2->num_rows()>0){
		        return true;
	        }
	        else{
		        return false;
	        }
	    }
	    else{
		    if($result1->num_rows()>0){
		        return true;
	        }
	        else{
			    return false;
		    }
	    }
		
    }
	

	//Edit user bio methods:	
	public function showUserInformation($id){
		$sql="select * from user where id=".$id;		
		$query = $this->db->query($sql);
        return $query->result_array();
	}

	public function updateInformation($id){
		$sql="update user set fname='".$_POST['fname']."' , lname='".$_POST['lname']."', email='".$_POST['email']."' , user='".$_POST['user']."' , pass='".$_POST['pass']."' where id=".$id;
		
		$query = $this->db->query($sql);
		if($query){
			return true;
		}
		else{
			return false;
		}

	}
	
	//Insert poem methods:
	public function insertPoem($poem,$id){
		
        $poemhtml=htmlspecialchars($poem['poem']);
		
		if($id==1){
			$sql="insert into poem(poem,name,pname,book,form,admin_id,book_id)values('".$poemhtml."','".$poem['name']."','حافظ','دیوان حافظ','غزل',1,1)";
			$this->db->query($sql);

		}else if($id==2){
			$sql="insert into poem(poem,name,pname,book,form,admin_id,book_id)values('".$poemhtml."','".$poem['name']."','خیام','رباعیات خیام','رباعی',2,2)";
			$this->db->query($sql);
			
		}else if($id==3){
			if($_POST['book']=="آینه در آینه" or $_POST['book']=="سیاه مشق"){
				$sql="call insert3poem('".$poemhtml."','".$_POST['name']."','".$_POST['book']."')";
//	            $sql="insert into poem(poem,name,pname,book,form,admin_id,book_id)values('".$poemhtml."','".$_POST['name']."','هوشنگ ابتهاج','".$_POST['book']."','غزل',3)";
                }
            else if($_POST['book']=="تاسیان"){
	            $sql="insert into poem(poem,name,pname,book,form,admin_id,book_id)values('".$poemhtml."','".$_POST['name']."','هوشنگ ابتهاج','".$_POST['book']."','کلاسیک و نیمایی',3,5)";
                }
			$this->db->query($sql);
			
		}else if($id==4){
            if($_POST['book']=="مثنوی معنوی"){
	            $sql="insert into poem(poem,name,pname,book,form,admin_id,book_id)values('".$poemhtml."','".$_POST['name']."','مولانا','".$_POST['book']."','مثنوی',4,7)";
                }
            else if($_POST['book']=="دیوان شمس"){
	            $sql="insert into poem(poem,name,pname,book,form,admin_id,book_id)values('".$poemhtml."','".$_POST['name']."','مولانا','".$_POST['book']."','غزل',4,6)";
            }
			$this->db->query($sql);
			
		}else if($id==5){
			$sql="insert into poem(poem,name,pname,book,form,admin_id,book_id)values('".$poemhtml."','".$_POST['name']."','فرخی یزدی','دیوان اشعار','".$_POST['form']."',5,8)";
			$this->db->query($sql);
			
		}else if($id==6){
             if($_POST['book']=="بوستان"){
	             $sql="insert into   poem(poem,name,pname,book,form,admin_id,book_id)values('".$poemhtml."','".$_POST['name']."','سعدی','".$_POST['book']."','مثنوی',6,9)";
             }   
             else if($_POST['book']=="دیوان اشعار"){
	             $sql="insert into   poem(poem,name,pname,book,form,admin_id,book_id)values('".$poemhtml."','".$_POST['name']."','سعدی','".$_POST['book']."','غزل',6,10)";
             }
			$this->db->query($sql);
			
		}else if($id==7){
			
			$sql="call insertmainpoem('".$poemhtml."','".$poem['name']."','".$poem['pname']."','".$poem['book']."','".$poem['form']."')";
//			$sql="insert into poem(poem,name,pname,book,form,admin_id,book_id)values('".$poemhtml."','".$poem['name']."','".$poem['pname']."','".$poem['book']."','".$poem['form']."',7)";
			$this->db->query($sql);
			
		}

		if($this->db->affected_rows()==1){
			return true;
		}
		else{
			return false;
		}

	}
	
	
	
	//show all poem  methods:
	
      public function showAllPoem($adminID){
	
		  if($adminID==7){
			  	$sql="select * from Poem order by id";

		  }else{
			  	$sql="select * from Poem where admin_id=".$adminID." order by id";

		  }
		$query = $this->db->query($sql);
    	return $query->result_array();

		}
	  public function fetchPoemValue($poemID){
		$sql="select * from poem where id=".$poemID;
		$query = $this->db->query($sql);
    	return $query->result_array();

		}
	
	//Edit Poem methods:
	
	public function updatePoem($adminID,$poemID){
           $poemhtml=htmlspecialchars($_POST['poem']);

		if($adminID==1 || $adminID==2){
		  $sql="update poem set poem='".$poemhtml."' , name='".$_POST['name']."' where  id=".$poemID." and admin_id=".$adminID;
		}

		else if($adminID==3 || $adminID==4 || $adminID==6 ){
			$sql="call update346poem('".$poemhtml."','".$_POST['name']."','".$_POST['book']."',".$poemID.",".$adminID.")";

//			$sql="update poem set poem='".$poemhtml."' , name='".$_POST['name']."' , book='".$_POST['book']."' where  id=".$poemID." and admin_id=".$adminID;
		}
		else if($adminID==5){
		  $sql="update poem set poem='".$poemhtml."' , name='".$_POST['name']."' , form='".$_POST['form']."' where  id=".$poemID." and admin_id=".$adminID;
		}
		else if($adminID==7){
		  $sql="call updatemainpoem('".$poemhtml."','".$_POST['name']."','".$_POST['pname']."','".$_POST['book']."','".$_POST['form']."',".$poemID.",".$adminID.")";

//		  $sql="update poem set poem='".$poemhtml."' , name='".$_POST['name']."' , form='".$_POST['form']."', book='".$_POST['book']."' , pname='".$_POST['pname']."' where  id=".$poemID." and admin_id=".$adminID;
		}
		
		 $query= $this->db->query($sql);
		 if($query){
			return true;
		}
		else{
			return false;
		}

	}
	
	//delete poem main admin:
	public function deletePoem($poemid) {
        $sql="delete from poem where id=".$poemid;

		 $query= $this->db->query($sql);
		 if($query){
			return true;
		}
		else{
			return false;
		}
		
	}
    //inside poet:
	
	public function getBooks($poetid) {
        $sql="select id,bname from book where poet_id=".$poetid;

	     $query = $this->db->query($sql); 
        return $query->result();
		
	}

    public function getPoemsByBook($bookId) {
        $sql = "SELECT poem.name , poem.poem,poem.id as p_id FROM poem INNER JOIN book ON poem.book_id = book.id WHERE book.id = " . $bookId;
		$query = $this->db->query($sql);
        return $query->result();
	}

	
	//inside poet biography:
	
	public function poetBio($poetid){
		
	    $sql="select * from poet where id=".$poetid;

	     $query = $this->db->query($sql);

		 return $query->result_array();

	 }
	
	//inside poem photos:
	public function poetPic($poemid){
		
	    $sql="select poet.id as pid,poet.name as poet_name from poet inner join poem on poet.name=poem.pname where poem.id=".$poemid;

	     $query = $this->db->query($sql);

		 return $query->result_array();

	 }
	
	
	//inside poem task:
	public function showAPoem($poemId){
		$sql="select * from poem where id=".$poemId;
		$query = $this->db->query($sql);
		 return $query->result_array();

	}
	
	//insert comment:
	public function insertComment($userId,$poemId){
		$sql="INSERT INTO comments (user_id,uname,comment,comment_date,poem_id) VALUES(".$userId.",'".$_POST['name']."','".$_POST['comment']."', NOW(), '".$poemId ."')";
		$query = $this->db->query($sql);
        if ($query)
            return true;
        else
            return false;

	}
	
	//show comment:
    public function showComments($poemId){

        $query = "SELECT * from comments WHERE poem_id = ".$poemId;
        $sql = $this->db->query($query);
        return $sql->result_array();
    }	
	//simple search:

    public function simpleSearchPoem($word) {
        $sql = "SELECT * from poem WHERE poem like '%".$word."%' or book like '%".$word."%' or form like '%".$word."%' or pname like '%".$word."%'";
		
        $query = $this->db->query($sql);

		if ($query->num_rows() > 0) {
            $result=$query->result_array();
		}else{
			$result=false;
		}
		return $result;
    }


	// filtering search (after submit):

	public  function filterRes($pname,$form,$book)
	{
		$final_sql = "SELECT id, name, poem, pname, form, book FROM poem";
		if ($pname!=""){
			if ($book!="") {
				if ($form != "")
					$final_sql .= " WHERE pname = '".$pname."' AND book = '".$book."' AND form = '".$form."'";// اگر شاعر و کتاب و قالب انتخاب کرده بود
				else $final_sql .= " WHERE pname = '".$pname."' AND book = '".$book."'"; // اگر شاعر و کتاب انتخاب کرده بود
			} else {
				if ($form != "")
					$final_sql .= " WHERE pname = '".$pname."' AND form = '".$form."'";// اگر شاعر و قالب انتخاب کرده بود
				else $final_sql .= " WHERE pname = '".$pname."'"; // اگر شاعر انتخاب کرده بود
			}
		} else{
			if ($book!= ""){
				if ($form!="")
					$final_sql .= " WHERE book = '".$book."' AND form = '".$form."'"; // اگر کتاب و قالب انتخاب کرده بود
				else  $final_sql .= " WHERE book = '".$book."'"; // اگر فقط کتاب انتخاب کرده بود

			}  else {
				if ($form!="")
					$final_sql .= " WHERE form = '".$form."'"; // اگر فقط قالب انتخاب کرده بود
			}
		}
		// اگر هیچ گزینه ای انبخاب نشده بود همه رو خروجی میده

		$query=$this->db->query($final_sql);
		$result = $query->result_array();

		if(isset($result))
			return $result;
		else
			return false;
	}


}

<?php 
  require 'models/users.php';
  require_once('config.php');
 class userController {
    function __construct(){
     include('models/usersModel.php');
     $this->obj = new homeModule();
    }

    public function mvcHandler() 
    {
        $act = isset($_GET['act']) ? $_GET['act'] : NULL;
        switch ($act) 
        {
            case 'add' :                    
                $this->insert();
                break;						
            case 'update':
                $this->update();
                break;				
            case 'delete' :					
                $this -> delete();
                break;
            case 'filterByCity' :					
                $this -> filterByCity();
                break;
            case 'exportToJson' :					
                $this -> exportToJson();
                break;
            case 'exportToXml' :					
                $this -> exportToXml();
                break;								
            default:
                $this->home();
        }
    }		
    // page redirection
    public function pageRedirect($url)
    {
        header('Location:'.$url);
    }	

    function home(){
       $userArr = $this->obj->home();
       include('views/home.php');
    }
    function insert(){
        $usertb = new users();
        if (isset($_POST['addbtn'])) {
            $usertb->first_name = trim($_POST['first_name']);
            $usertb->last_name = trim($_POST['last_name']);
            $usertb->email = trim($_POST['email']);
            $usertb->street = trim($_POST['street']);
            $usertb->zip_code = trim($_POST['zip_code']);
            $usertb->city = trim($_POST['city']);
            $last_id = $this->obj->insertRecord($usertb);
            if($last_id){			
                $this->pageRedirect(BASE_URL);
            }else{
                echo "Something went wrong..., try again.";
            }
        }
    }

    public function update()
    {
        try
        {
            if (isset($_POST['updateBtn'])) 
            {
                $usertb = new users();
                $usertb->first_name = trim($_POST['first_name']);
                $usertb->last_name = trim($_POST['last_name']);
                $usertb->email = trim($_POST['email']);
                $usertb->street = trim($_POST['street']);
                $usertb->zip_code = trim($_POST['zip_code']);
                $usertb->city = trim($_POST['city']);
                $usertb->id = trim($_POST['id']);
                $isDone = $this->obj->updateRecord($usertb);
                if($isDone){			
                    $this->pageRedirect(BASE_URL);
                }else{
                    echo "Something went wrong..., try again.";
                }

            }elseif(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
                 $id=$_GET['id'];
                 $result=$this->obj->selectRecord($id);
                 include('views/update.php');
            }else{
                echo "Invalid operation.";
            }
        }
        catch (Exception $e) 
        {		
            throw $e;
        }
    }
    public function delete(){
        if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
            $id=$_GET['id'];
            $isDone=$this->obj->deleteRecord($id);
            if($isDone){			
                $this->pageRedirect(BASE_URL);
            }else{
                echo "Something went wrong..., try again.";
            }
        }
    
    }

    public function filterByCity(){
        if(isset($_POST["key"]) && !empty(trim($_POST["key"]))){
            $key=$_POST["key"];
            $userArr=$this->obj->filterByCity($key);
            include('views/home.php');
        }
    }
    public function exportToJson(){
           $res = $this->obj->exportToJson();
           header('Content-disposition: attachment; filename=file.json');
           header('Content-type: application/json');
           echo $res;
    }
    public function exportToXml(){
        $res = $this->obj->exportToXml();
        $this->createXMLfile($res);
 }
 public function createXMLfile($userArr){
  
    $filePath = 'book.xml';
 
    $dom     = new DOMDocument('1.0', 'utf-8'); 
 
    $root      = $dom->createElement('books'); 
 
    for($i=0; $i<count($userArr); $i++){
      
      $userId        =  $userArr[$i]['id'];  
 
      $firstName      =   htmlspecialchars($userArr[$i]['first_name']);
 
      $lastName    =  $userArr[$i]['last_name']; 
 
      $email     =  $userArr[$i]['email']; 
 
      $street      =  $userArr[$i]['street']; 
 
      $zipCode  =  $userArr[$i]['zip_code'];  
 
      $book = $dom->createElement('book');
 
      $book->setAttribute('id', $userId);
 
      $firstName     = $dom->createElement('title', $firstName); 
 
      $book->appendChild($firstName); 
 
      $lastName   = $dom->createElement('lastName', $lastName); 
 
      $book->appendChild($lastName); 
 
      $email    = $dom->createElement('email', $email); 
 
      $book->appendChild($email); 
 
      $street     = $dom->createElement('ISBN', $street); 
 
      $book->appendChild($street); 
      
      $zipCode = $dom->createElement('category', $zipCode); 
 
      $book->appendChild($zipCode);

      $root->appendChild($book);
 
    }
 
    $dom->appendChild($root); 
 
    
    header('Content-type: text/xml');
    header('Content-Disposition: attachment; filename="text.xml"');
    
    echo $dom->save($filePath);
  }
 }

?>
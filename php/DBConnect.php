<?php

class DBConnect {
    private $db = NULL;

    const DB_SERVER = "localhost";
    const DB_USER = "root";
    const DB_PASSWORD = "";
    const DB_NAME = "donor";

    public function __construct() {
        $dsn = 'mysql:dbname=' . self::DB_NAME . ';host=' . self::DB_SERVER;
        try {
            $this->db = new PDO($dsn, self::DB_USER, self::DB_PASSWORD);
        } catch (PDOException $e) {
            throw new Exception('Connection failed:' .
            $e->getMessage());
        }
        return $this->db;
    }
    
    public function auth(){
        session_start();
        if(! isset($_SESSION['username'])){
            header("Location: http://localhost/bloodbank");
        }       
    }
    public function authLogin(){
        session_start();
        if(isset($_SESSION['username'])){
            header("Location: http://localhost/dashboard/bloodbank/home.php");
        }
    }
    
    public function checkAuth(){
        session_start();
        if(! isset($_SESSION['username'])){
            return false;
        } else {
            return true;
        }
    }


    public function login($username, $password){
        $stmt = $this->db->prepare("SELECT * FROM employees WHERE username=? AND password=?");
        $stmt->execute([$username,$password]);
        if($stmt->rowCount() > 0){
            session_start();
            $emp = $stmt->fetchAll();
            foreach($emp as $e){
                $_SESSION['id'] = $e['id'];
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                $_SESSION['firstName'] = $e['f_name'];
                $_SESSION['middleName'] = $e['m_name'];
                $_SESSION['lastName'] = $e['l_name'];
                $_SESSION['birthDay'] = $e['b_day'];
                $_SESSION['pcrNumber'] = $e['prc_nr'];
                $_SESSION['designation'] = $e['designation'];
                $_SESSION['landline'] = $e['landline'];
                $_SESSION['mobile'] = $e['mobile'];
                
            }
            
            return true;
        } else {
            return false;
        }
    }
    
    public function addDonor($fname,$lname,$sex,$bType,$dob,$address,$city,$mobile){
        $stmt = $this->db->prepare("INSERT INTO donors (fname,lname,sex,b_type,bday,h_address,city,mobile) VALUES (?,?,?,?,?,?,?,?)");
        $stmt->execute([$fname,$lname,$sex,$bType,$dob,$address,$city,$mobile]);
        return true;
        
    }
    
    public function searchDonorWithBloodGroup($bloodGroup){
        $stmt = $this->db->prepare("SELECT * FROM donors WHERE b_type LIKE ?");
        $stmt->execute([$bloodGroup]);
        return $stmt->fetchAll();
    }
    
    public function searchDonorByCity($city){
        $stmt = $this->db->prepare("SELECT * FROM donors WHERE city LIKE ?");
        $stmt->execute(["%".$city."%"]);
        return $stmt->fetchAll();
    }
    
    public function logout(){
        session_start();
        session_destroy();
        header("Location: http://localhost/dashboard/bloodbank/index.php");
    }
    
    public function getDonorProfileById($id){
        $stmt = $this->db->prepare("SELECT *FROM donors WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetchAll();
    }
    
}

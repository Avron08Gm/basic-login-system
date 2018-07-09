<?php
class Dbh {
    private $servername;
    private $dbname;
    private $username;
    private $password;
    private function connect($db_name)
    {
        $this->servername='localhost';
        $this->username='root';
        $this->password='';
        $this->dbname=$db_name;
        try{
        $dsn='mysql:host='.$this->servername.';dbname='.$this->dbname.';charset=utf8';
        $pdo=new PDO($dsn,$this->username,$this->password);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $pdo;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage(); 
        }
    }
    public function get_data($user_name)
    {
        $stmt=$this->connect('log_sys')->prepare('Select * from users where user_name=?');
        $stmt->execute([$user_name]);
        return $stmt->fetch();
    }
    public function check_data($usr_name,$pass)
    {
        $comm=$this->connect('log_sys')->prepare('select pass_key,id from pass where user_name=?');
        $comm->execute([$usr_name]);
        $data=$comm->fetch();
        if(empty($data['id']))return 0;
        if(password_verify($pass,$data['pass_key']))
        {
           return 1;
        }
        return 0;
    }
    public function add_data($user_name,$pass,$fname,$lname)
    {
        $conn=$this->connect('log_sys');
        $stmt=$conn->prepare('insert into users(first_name,last_name,user_name) values(?,?,?)');
        $stmt->execute([$fname,$lname,$user_name]);
        $hash=password_hash($pass,PASSWORD_DEFAULT);
        $stmt=$conn->prepare('insert into pass(pass_key,user_name) values(?,?)');
        $stmt->execute([$hash,$user_name]);
    }
    public function unique_user ($uname)
    {
        $data=$this->connect('log_sys')->prepare('select id from users where user_name=?');
        $data->execute([$uname]);
        $data=$data->fetch();
        return isset($data['id']);
    }
}
?>
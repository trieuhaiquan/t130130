<?php

class Model_mindex
{
    public $db;
    public function __construct() {
        $this->db= new mysqli(HOST, USER_DB, PASS_DB, DB_NAME);
        $this ->db->set_charset("utf8");
    }
    public function addtag($tag,$iduser)
    {
        $sql="INSERT INTO managetags (tentag,trangthai,iduser) VALUES ('$tag',1,'$iduser')";
         if(!$rs = $this->db->query($sql)) die( $this->db->error);
    }
    public function tag($iduser)
    {
       $data=array();
        $sql ="SELECT id,tentag FROM managetags WHERE trangthai=1 and iduser =$iduser ORDER BY id ASC ";
        if(!$kq = $this->db->query($sql)) die( $this->db->error);
        foreach ($kq as $row) $data[] = $row;
        return $data; 
    }
    public function xoatag($idtag,$iduser)
    {
       $sql= "UPDATE managetags SET trangthai=0 WHERE id=$idtag and iduser = $iduser";
         if(!$rs = $this->db->query($sql)) die( $this->db->error);
    }
    public function fixtag($tag,$idtag,$iduser)
    {
       $sql= "UPDATE managetags SET tentag='$tag' WHERE id=$idtag and iduser=$iduser";
         if(!$rs = $this->db->query($sql)) die( $this->db->error);
    }
    public function addtime($idtag,$timestart,$timeend,$priority,$timestart2,$timeend2,$totalestimate,$iduser)
    {
        $sql="INSERT INTO managetime (idtag,timestart,timeend,status,priority,timestart2,timeend2,totalestimate,iduser) VALUES ('$idtag','$timestart','$timeend',1,'$priority','$timestart2','$timeend2','$totalestimate','$iduser')";
         if(!$rs = $this->db->query($sql)) die( $this->db->error);
    }
    public function managetime($iduser)
    {
        $data=array();
        $sql ="select time.id,idtag,timestart,timeend,status,priority,tentag,timestart2,timeend2 from managetime as time , managetags as tag where (status =1 or status=2) and time.idtag = tag.id and time.iduser = '$iduser' order by status DESC";
        if(!$kq = $this->db->query($sql)) die( $this->db->error);
        foreach ($kq as $row) $data[] = $row;
        return $data; 
    }
    public function managetime2($idtime,$iduser)
    {
        $data=array();
        $sql ="select time.id,idtag,timestart,timeend,status,priority,tentag,timestart2,timeend2,timestartreal from managetime as time , managetags as tag where status =2 and time.idtag = tag.id and time.id ='$idtime' and time.iduser=$iduser order by priority ASC ";
        if(!$kq = $this->db->query($sql)) die( $this->db->error);
        foreach ($kq as $row) $data[] = $row;
        return $data; 
    }
        public function managetime3($iduser)
    {
        $data=array();
        $sql ="select count(status) as dem from managetime where status =2 and iduser = $iduser";
        $rs=$this->db->query($sql) or die($this ->db->error);
        $row= $rs->fetch_row();  $dem=$row[0];
        return $dem;

    }
    public function xoatime($idtime,$iduser)
    {
        $sql ="delete from managetime where id='$idtime' and iduser = $iduser";
         if(!$rs = $this->db->query($sql)) die( $this->db->error);
    }
    public function fixtime($idtag,$timestart,$timeend,$priority,$timestart2,$timeend2,$idtime,$totalestimate,$iduser)
    {
       $sql= "UPDATE managetime SET idtag='$idtag' , timestart = '$timestart', timestart2='$timestart', timeend ='$timeend',timeend2='$timeend', priority='$priority',totalestimate='$totalestimate'  WHERE id='$idtime' and iduser=$iduser";
         if(!$rs = $this->db->query($sql)) die( $this->db->error);
    }
    public function updatetime($idtime,$iduser)
    {
        $sql= "UPDATE managetime SET status='2', timestartreal = now(), datestart = now() WHERE id=$idtime and iduser = $iduser";
         if(!$rs = $this->db->query($sql)) die( $this->db->error);
    }
        public function endtime($idtime,$total,$iduser)
    {
        $sql= "UPDATE managetime SET status='3', timeendreal = now(),totaltime='$total' WHERE id=$idtime and `iduser`='$iduser'";
         if(!$rs = $this->db->query($sql)) die( $this->db->error);
    }
    public function workdone($iduser)
    {
        $data=array();
        $sql ="select time.id,idtag,timestart,timeend,status,priority,tentag,timestart2,timeend2,timeendreal,timestartreal,totaltime,totalestimate from managetime as time , managetags as tag where status =3 and time.idtag = tag.id and time.iduser = $iduser order by priority ASC";
        if(!$kq = $this->db->query($sql)) die( $this->db->error);
        foreach ($kq as $row) $data[] = $row;
        return $data; 
    }
    public function search($tag,$dstart,$dend,$iduser)
    {
        $data=array();
        $sql="select tentag,timestart,timeend,timeendreal,status,sum(totaltime) as totaltimereal, sum(totalestimate) as totalestimate,datestart from managetags as tag, managetime as time where(time.idtag = tag.id and status =3) and (idtag like '%$tag%' and datestart BETWEEN '$dstart' and '$dend') and  time.iduser = $iduser Group by datestart order by datestart ";
        if(!$kq = $this->db->query($sql)) die( $this->db->error);
        foreach ($kq as $row) $data[] = $row;
        return $data; 
        
    }
    public function user()
    {
        $data=array();
        $sql="select email from user";
        if(!$kq = $this->db->query($sql)) die( $this->db->error);
        foreach ($kq as $row) $data[] = $row;
        return $data; 
    }
    public function register($name,$email,$pass1)
    {
         $sql="INSERT INTO user (name,email,pass) VALUES ('$name','$email',md5('$pass1'))";
         if(!$rs = $this->db->query($sql)) die( $this->db->error);
    }
    public function login($email,$pass)
    {
        $data=array();
        $sql="select id,email,pass,name from user where email ='$email' and pass='$pass'";
        if(!$kq = $this->db->query($sql)) die( $this->db->error);
	if ($kq->num_rows==0) return false;
	$row = $kq->fetch_assoc();
        $_SESSION['login_id']=$row['id'];
	$_SESSION['login_user']=$row['name'];
	$_SESSION['login_email']=$row['email'];
        $_SESSION['password'] = $row['pass'];
	return true;
    }
}
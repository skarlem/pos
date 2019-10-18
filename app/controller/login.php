<?php





$query=1;
// $user='admin@gmail.com';
// $pass='123';



    $email = mysqli_real_escape_string(getConn3(),$_POST['email']);
    $pass= mysqli_real_escape_string(getConn3(),md5($_POST['password']));
            
    $sql="SELECT * FROM member WHERE member_email='$email' and member_pw='$pass' and member_status!='blocked'  and member_level='admin'";

    $result= mysqli_query(getConn3(),$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $data = mysqli_fetch_assoc($result);
    $count = mysqli_num_rows($result);
   //$count =1;
    $_SESSION['member']=$count;
    $_SESSION['user']=$email;
    $_SESSION['ip_add'] = get_client_ip();
    $date = date('Y/m/d H:i:s');


if(isset($_POST['login-submit'])){

   if($email=="lynette9543@gmail.com" || $email=="mhounicmhounic@gmail.com" || $email =="oneheartwellness@yahoo.com"){
        $_SESSION['login']=true;     
        login_log($email,$date,$link);
        
           include("template/pos.php");
           //exit();
    }else{
        $_SESSION['login']=false; 
       
        include('template/login.php');
    }

 
}else{
    
    include('template/login.php');
    $_SESSION['login']=false; 
    
}
?>
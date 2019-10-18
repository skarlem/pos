<?php

//pdo

////////////// POS CONTROL /////////////////
///////////// POS CONTROL /////////////////

error_reporting(0);
ini_set('display_errors', 0);





///GET AND HANDLE POST POS USING JS
if(isset($_POST['ccf_id'])){
    $ccf_id = $_POST['ccf_id'];
        
    
	//  if(isLocalhost()){
			
		 $con = mysqli_connect('localhost','root','','ccf');
	//  }else{
			
        //  $con = mysqli_connect('pogsnet07023.ipagemysql.com','dim_1heart','dimskie@123','oneheart');
	//   }
   
   
    if (!$con) {
        die('Could not connect: ' . mysqli_error($con));

    }

    mysqli_select_db($con,"member_points");

    $sql="SELECT prp,concat(member_fname,' ',member_lname) as name from member_points inner join member on member_points.member_id = member.member_id  where member.member_id = $ccf_id";
    $result = mysqli_query($con,$sql);

    $row = mysqli_fetch_array($result);
    if($row >0){
        echo 'Member Name = '.$row[1].' Current PRP = '.$row[0];
    }
}










if(isset($_POST['submit-form'])){
date_default_timezone_set('Asia/Manila');
    //single inputs
    $total_price = $_POST['total_price_r'];
   // $total_quantity = $_POST['total_quantity_r'];
    $payment_type = $_POST['payment_type_r'];
    $customer_type = $_POST['cus_type_r'];
    $member_id = $_POST['member_id_r'];
    $change = $_POST['change_r'];
    $no_of_items = $_POST['quantity_r'];
    $payment = $_POST['payment_r'];
    $note = $_POST['sales_note'];


    //array inputs
    $product_name = $_POST['product_name_print'];
   // $product_id = $_POST['product_id_print'];
    $quantity = $_POST['quantity_print'];
    $price = $_POST['price_print'];
    $unit_price = $_POST['unit_price_print'];
    $product_id = $_POST['product_id_print'];
   


    $customer_name = $_POST['customer_name_r'];

    $array = array(
        $product_name,
        $quantity,
        $unit_price,
        $price  
    );

    $inventory_array = array(
        $product_id,
        $quantity
    );
    $date = date('Y/m/d H:i:s');

    $member_name = getAccountName($member_id);
    
    $string = implode(',',$product_name);

    $member_arr = array(
        $date,
        $customer_type,
        $payment_type,
        $total_price,
        $payment,
        $change,
        $no_of_items,
        $string,
        $member_id,
        $member_name,
        $note
    );
    $walk_in = array(
        $date,
        $customer_type,
        $payment_type,
        $total_price,
        $payment,
        $change,
        $no_of_items,
        $string,
        $member_id,
        $customer_name,
        $note
    );

    $sys_event = 'PRP DEDUCTION';
    $sys_value = 'YOU HAVE BEEN DEDUCTED '.$total_price.' FROM YOUR LAST PURCHASE';

    $sys_log = array(
        $sys_event,
        $sys_value,
        $member_id,
        $date
    );

    try {

        if($customer_type=="member"){
           
            if($payment_type=="prp"){
			
              // echo getAccount(getConn3(),$member_id);
                updatePrp(getConn2(),$total_price,$member_id);
              // var_dump( $member_arr);
               addTransactionsMember($member_arr,$link);
               echo $member_name;
               insertPrpLogs($sys_log);
            }else{

                addTransactionsMember($walk_in,$link);
	
            }
            
        }else{
		
		//var_dump($walk_in);
           addTransactionsNonMember($walk_in,$link);
	
        }
       updateInventoryCount($product_id,$link,$quantity,$product_id);
        
       echo "<script>location.href='pos.php';</script>";
       
        exit();
        
        
    }catch(PDOException $e){
        echo $sql . "<br>" . $e->getMessage();
    }
    
   

}
/////////////// INVENTORY CONTROL ///////////////
/////////////// INVENTORY CONTROL ///////////////
/////////////// INVENTORY CONTROL ///////////////

if(isset($_POST['add_submit'])){
    $data = array(
        $product_name = $_POST['product_name'],
        $quantity = $_POST['quantity'],
        $cost = $_POST['cost'],
        $price = $_POST['price'],
        $member_price = $_POST['member_price'],
        $product_code = $_POST['product_code']
    );
    $date = date('Y/m/d H:i:s');
    $imploded_data = implode(" ",$data);
    addProduct($data,$link);
    add_logs($imploded_data,$date,'ADD',$_SESSION['user'],$link);
    header('Location: inventory.php');    
    exit();
}

if(isset($_POST['edit_submit'])){
    
        $id = $_POST['id'];    
        $name = $_POST['product_name'];
        $quantity = $_POST['quantity'];
        $cost = $_POST['cost'];
        $price = $_POST['price'];
        $member_price = $_POST['member_price'];
        $product_code = $_POST['product_code'];
        $date = date('Y/m/d H:i:s');

        $data = array(
            $name ,
            $quantity,
            $cost ,
            $price ,
            $member_price,
            $product_code
        );
        $imploded_data = implode(" ",$data);


        add_logs($imploded_data,$date,'EDIT',$_SESSION['user'],$link);
        editProduct($name,$quantity,$cost,$price,$member_price,$product_code,$id,$link);
        header('Location: inventory.php');
        exit();
}
if(isset($_POST['delete_id'])){
    $id = array($_POST['delete_id']);
    deleteProduct($id,$link);
    header('Location: inventory.php');    
    exit();
}




?>
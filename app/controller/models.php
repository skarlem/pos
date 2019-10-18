<?php
///SEARCH MEMBER ID NAME AND CURRENT PRP
function getMemberName($ccf_id){
    
// //$con = mysqli_connect('pogsnet07023.ipagemysql.com','dim_1heart','dimskie@123','oneheart');
// $con = mysqli_connect('localhost','root','','ccf');
// if (!$con) {
//     die('Could not connect: ' . mysqli_error($con));

// }

    mysqli_select_db(getConn2(),"member_points");

    $sql="SELECT prp,concat(member_fname,' ',member_lname) as name from member_points inner join member on member_points.member_id = member.member_id  where member.member_id = $ccf_id";
    $result = mysqli_query(getConn2(),$sql);

    $row = mysqli_fetch_array($result);
    if($row >0){
        $res =  'Member Name = '.$row[1].' Current PRP = '.$row[0];
    }
    mysqli_close(getConn2());
    return $res;


    
}



function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}













/////////////ACCOUNT LOGIN MODEL//////////////////
function getAccount($conn,$member_id){
    $sql="SELECT member_id FROM member WHERE member_id = $member_id";
    $result= mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    return $count;

}

function updatePrp($conn,$total_price,$member_id){
    $sql = "UPDATE `member_points` SET `prp`=`prp`- $total_price where member_id = $member_id";
    if (mysqli_query($conn, $sql)) {
       echo "Record updated successfully";
    } else {
       echo "Error updating record: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}


//PRP LOGS CCF

function insertPrpLogs($data){
  

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ccf";
    
    // $servername = "pogsnet07023.ipagemysql.com";
    // $username = "dim_1heart";
    // $password = "dimskie@123";
    // $dbname = "oneheart";
    
    //$con = mysqli_connect('pogsnet07023.ipagemysql.com','dim_1heart','dimskie@123','oneheart');

    $link = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $statement = $link->prepare('INSERT INTO `systemlogs`( `systemlogs_event`, `systemlogs_value`, `member_id`, `systemlogs_date`)
    VALUES (?, ?, ?, ?)');

    //insert to transactions
   $statement->execute($data);
   $link = null;
}



function mysqli_insertPrpLogs(){
    $stmt = getConn()->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $firstname, $lastname, $email);
}




/////////////INVENTORY MODEL//////////////////

function getSales(){
    $sql = "select * from sales_transactions order by id desc";
    $result= mysqli_query(getConn(),$sql);  
    $products =array();
    if (!$result) {
		echo "An error occurred.\n".mysqli_error(getConn());
		exit;
    }
    else{
        while($row = mysqli_fetch_array($result)){
            $products[] = $row;
        }
    }
    mysqli_close(getConn());       
    return $products;
}

function getProducts(){
    $sql = "select * from product";
    $result= mysqli_query(getConn(),$sql);  
    $products =array();
    if (!$result) {
		echo "An error occurred.\n".mysqli_error(getConn());
		exit;
    }
    else{
        while($row = mysqli_fetch_array($result)){
            $products[] = $row;
        }
    }
    mysqli_close(getConn());       
    return $products;
}

function getAccountName($member_id){

    $sql = "select CONCAT(`member_fname`, ' ', `member_lname`) as member_name from member where member_id = $member_id";
    $result= mysqli_query(getConn2(),$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count = $row['member_name'];
    return $count;

}

function addProduct($data,$link){
    $statement = $link->prepare('INSERT INTO product (name, quantity, cost, price, member_price, product_code)
    VALUES (?, ?, ?, ?, ?, ?)');

    //insert to transactions
   $statement->execute($data);
   $link = null;
}

function deleteProduct($id,$link){
    $statement = $link->prepare('DELETE FROM `product` WHERE id= ?');
    $statement->execute($id);
    $link = null;

}

function editProduct($name,$quantity,$cost,$price,$member_price,$product_code,$id,$link){
   
    $statement = $link->prepare('UPDATE `product` SET `name`=?,`quantity`=?,`cost`=?,`price`=?, `member_price`=?, `product_code`= ? WHERE id= ?');
    $statement->execute([$name,$quantity,$cost,$price,$member_price,$product_code,$id]);
    $link = null;
}

function add_logs($data,$date,$action,$user,$link){
    $statement = $link->prepare('INSERT INTO product_logs (data, date, action, user)
    VALUES (?, ?, ?, ?)');

    //insert to transactions
   $statement->execute([$data,$date,$action,$user]);
   $link = null;
}


function login_log($user,$date,$link){
    $statement = $link->prepare('INSERT INTO login_logs (user,date) values (?,?)');

    $statement->execute([$user,$date]);
    $link = null;
}





///////////// POS MODEL /////////////
function updateProductQuantity($quantity,$product_id){
    $sql = "UPDATE `product` SET`quantity`=`quantity` - $quantity WHERE `id` = $product_id";
    if (mysqli_query(getConn(), $sql)) {
        echo "Record updated successfully";
     } else {
        echo "Error updating record: " . mysqli_error(getConn());
     }
     mysqli_close(getConn());
   
}

////////////// PDO POS MODEL ////////////

function addTransactionsMember($data,$link){
    //prepared statement
    $statement = $link->prepare('INSERT INTO sales_transactions (date, customer_type, payment_type, total_price, payment, change_, no_of_items, products, member_id, member_name,note)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');

    //insert to transactions
   $statement->execute($data);
   $link = null;


   
}

function addTransactionsNonMember($data,$link){
    //prepared statement
    $statement = $link->prepare('INSERT INTO sales_transactions (date, customer_type, payment_type, total_price, payment, change_, no_of_items, products, member_id, member_name,note)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');

    //insert to transactions
   $statement->execute($data);
   $link = null;
}


function updateInventoryCount($data,$link,$quantity,$product_id){
    //prepared statement
    $sql = "UPDATE `product` SET`quantity`=`quantity` - ? WHERE `id` = ?";
    $stmt= $link->prepare($sql);

    for($i=0; $i<count($data); $i++){
        $stmt->execute([$quantity[$i],$product_id[$i]]);
    }
    $link = null;
}





?>
<?php 

if($_SESSION['login']!=true){
  header("location: index.php");
}
else{

}

include('header.php');
include('nav.php');
include('sidebar.php');



?>









    <!-- End Navbar -->
    <!-- Header -->
    <div class="header bg-gradient-primary pb-7 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          
        </div>
      </div>
    </div>
    <div class="container-fluid mt--7">

  
      <div class="row" style="height: 90%">
        <div class="col-xl-5">
          <div class="card" style="height: 100%; background:#e9ecef;">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-muted ls-1 mb-1">Overview</h6>
                  <h2 class="text-black mb-0">Sales value</h2>
                 </div>
                
              </div>
            </div>
            
            <div class="card-body">
              <!-- Chart -->
              <div class="chart">
             
                  <div class="form-group mb-2 mt--0">

                 

                      <select class="form-control btn-customer" id="purchase-type" name="purchase-type" style="color: black;border-color: silver;">
                        <option value="1">Walk-in</option>
                        <option value="2">Member</option>
                       
                      </select>
                   
                  </div>
                  <div class="form-group mb-3 mt--0">
                  <div id="customer_name">
                   <input type="text" name="customer_name"  oninput="setCustomerName(this.value)"id=""class="form-control member-id" placeholder="Customer Name" >
                
                  </div>
                   </div>
                  <div class="form-group mb-3 mt--0">
                  
                   <input type="text" name="member-id" oninput="getUserPrp(this.value),setMemberId()"id="member-id"class="form-control member-id" placeholder="Member ID" hidden>
                  </div>
                  <div id="extra" hidden> 
                  <div class="row">
                   
                      <div class="col-sm-12">
                       <div class="alert alert-primary alert-sm " style="width:100%;" id="txtHint" role="alert" hidden></div>
                      </div>
                      <div class="col-sm-5">
                     
                      </div>
                    </div>
                 
                  </div>
                  
                
                  
                  <div class="custom-control custom-radio custom-control-inline mb-3" id="prp-radio" hidden>
                    <input name="custom-radio-2" onclick="hideAmount(),handleClick(this)"class="custom-control-input" value="prp"  id="customRadio5" type="radio">
                    <label class="custom-control-label" for="customRadio5">PRP</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline mb-3" id="cash-radio" hidden>
                    <input name="custom-radio-2" onclick="showAmount(),handleClick(this)"class="custom-control-input" value="cash"  id="customRadio6" type="radio">
                    <label class="custom-control-label" for="customRadio6">CASH</label>
                  </div>



                  
                  <!-- <div class="custom-control custom-radio custom-control-inline mb-3" id="deduction-radio" hidden>
                    <input name="custom-radio-2" onclick="showAmount(),handleClick(this)"class="custom-control-input" value="deduction"  id="deduction" type="radio">
                    <label class="custom-control-label" for="customRadio6">DEDUCTION</label>
                  </div> -->

                  <!-- 
                    <div class="custom-control custom-radio custom-control-inline mb-3 float right" id="prp-radio" hidden>
                      <input type="radio" id="prp_radio" name="prp_radio" class="custom-control-input">
                      <label class="custom-control-label" for="customRadioInline1">PRP</label>
                    </div>
                  
                  <div class="custom-control custom-radio custom-control-inline mb-3">
                    <input type="radio" id="cash_radio" name="cash_radio" class="custom-control-input">
                    <label class="custom-control-label" for="customRadioInline2">Cash</label>
                  </div> -->
                  
                
      
          <div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar">                 
                  
                    <table class="table align-items-left" id="product-table">
                      <thead class="thead-light">
                        <tr>
                          <th>Product</th>
                          <th>Qty</th>
                          <th>Unit Price</th>
                          <th>Amount</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody class="list">
                        
                      </tbody>                     
                    </table>
                  
                </div>


              


                

               
              </div>
              <div class="row">
                <div class="col-sm-3">
                  <div class="input-group" style="position: relative;right: -5;bottom: -210;">
                    <div class="input-group-prepend">
                      <span class="input-group-text form-control-sm"  >Total Qty: </span>
                      
                    </div>
                    <input type="text" class="form-control form-control-sm" style="background:white;"  placeholder="0" name="total_quantity" id="total_quantity">
                  </div>
                
                </div>
              <div class="col-sm-5">
                    <div class="input-group" style="position: relative;right: -5;bottom: -210;">
                    <div class="input-group-prepend ">
                      <span class="input-group-text form-control-sm">Total Price: ₱</span>
                      <!-- <span class="input-group-text"></span> -->
                    </div>
                    <input type="text" class="form-control form-control-sm" style="background:white; "readonly placeholder="0.00" name="total_price" id="total_price"aria-label="Dollar amount (with dot and two decimal places)">
                </div>
             
             
             
                <div class="col-sm-12">
                  <div class="input-group" style="position: relative;right: -235;bottom: -180;">
                    <div class="input-group-prepend">
                      <span class="input-group-text form-control-sm">Change: ₱</span>
                      
                    </div>
                    <input type="text" class="form-control form-control-sm" style="background:white;" readonly placeholder="0.00" name="change" id="change">
                  </div>
                
                </div>
             </div>

        <div class="row">
        
      
        
        </div>


              </div>
              
           
                <div class="">  
                  <button class="btn btn-primary float-right mt--5 mb--5" style="position: relative;right: -5;bottom: -265;" data-toggle="modal" data-target="#amount_modal" type="button ">Payment</button>
                </div>
                

                <div class="">
              
              <button class="btn btn-primary float-right mt--5 mb--5" style="position: relative;right: 105;bottom: -265;" data-toggle="modal" data-target="#modal-receipt" type="button ">Summary</button>
            </div>
               
            </div>
          </div>
        </div>
        <div class="col-xl-7">
          <div class="card bg-gradient-default shadow" style="height: 100%">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-muted ls-1 mb-1">Oneheart Products</h6>
                  <h2 class="mb-0 text-white">Products</h2>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart">
              <div class="container">
              <div class="row">
              <div class="col">
              
                  <?php 
                  $mem_price = array();
                  $member_product = array();
                  $base_price = array();
                  $prod_id = array();
                   foreach( getProducts()as $row ){
                      $id = $row['id'];
                      $product_name = $row['name'];
                      $quantity = $row['quantity'];
                      $cost = $row['cost'];
                      $price = $row['price'];
                      $product_code = $row['product_code'];

                      $member_price = $row['member_price'];
                      $quan = "$('#quantity3').val()";
                      $emp = "$('#quantity3').val('')";
                      
                      array_push($mem_price,$member_price);
                      array_push($member_product,$product_name);
                      array_push($base_price,$price);
                      array_push($prod_id,$id);
                      ?>
<!--  
                <div class="col">
                qweqwe
                </div> -->
                
                <b>
                    
                              <button type="button" style="width: 49%;font-style: normal;font-size: auto !important;" class="btn bg-gradient-primary text-white mt-4" id="product_button<?php echo $id?>" data-toggle="modal" data-target="#modal<?php echo $id;?>">
                              <?php echo $product_name.'(₱'.$price.')';?>
                              </button> </b>
                             
                            <!-- Modal 3-->
                            <div class="modal fade" id="modal<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel3" aria-hidden="true">
                               <div class="modal-dialog modal-dialog-centered" role="document">
                                 <div class="modal-content">
                                   <div class="modal-header">
                                     <h2 class="modal-title" id="exampleModalLabel3"><?php echo $product_name;?></h2>
                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                     </button>
                                   </div>

                                     <div class="row mx-auto" style="width: 90%; display: inline-block;">
                                       <input type="text" id="quantity<?php echo $id?>" name="quantity<?php echo $id?>"class="form-control form-control" placeholder="Product Quantity" required>
                                     

                                     </div>
                                     
                                   <div class="modal-footer">
                                     <button type="button" class="btn btn-secondary text-gray" data-dismiss="modal">Close</button>
                                     <button type="button" class="btn btn-primary" data-dismiss="modal" 
                                     onclick="productAddToTable(
                                      '<?php echo $product_code?>',$('#quantity<?php echo $id?>').val(),$('#member_price_input<?php echo $id?>').val(),<?php echo $id?>,$('#member_price_input<?php echo $id?>').val()),$('#quantity<?php echo $id?>').val('')">Add</button>
                                   </div>
                                 </div>
                               </div>
                             </div>
                             <input type="hidden" id="member_price_input<?php echo $id?>" value="<?php echo $price?>">
                       <?php
                        
                    
                   }
                 ?>

</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      
<?php 
include('footer.php');

echo $_SESSION['member'];
?>

   
        </div>
    </div>
</body>

              
<?php
?>

<script>

function getUserPrp(data){

var xhr;
 if (window.XMLHttpRequest) { // Mozilla, Safari, ...
    xhr = new XMLHttpRequest();
} else if (window.ActiveXObject) { // IE 8 and older
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}


     xhr.open("POST", "./controller/controller.php", true); 
     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                  
     xhr.send("ccf_id="+data);
	 xhr.onreadystatechange = display_data;
	function display_data() {
	 if (xhr.readyState == 4) {
      if (xhr.status == 200) {
       //alert(xhr.responseText);	   
       $("#txtHint").attr("hidden", false);
	  document.getElementById("txtHint").innerHTML = xhr.responseText;
      } else {
        alert('There was a problem with the request.');
      }
     }
	}
}


</script>





<script>

var member_price_array = <?php echo json_encode($mem_price); ?>;
var member_product = <?php  echo json_encode($member_product)?>;
var base_price = <?php echo json_encode($base_price)?>;
var id = <?php echo json_encode($prod_id)?>;

$('.btn-customer').on('change', function(e){
  
  var cusType = $('#purchase-type').val();
  if(cusType=="2"){
    $(".member-id").attr("hidden", false);
    $("#prp-radio").attr("hidden", false);
    $("#member_id").attr("hidden", false);
    $("#cash-radio").attr("hidden", false);
    $("#deduction-radio").attr("hidden", false);
    $("#extra").attr("hidden", false);
    $('#cus_type_r').val("member");
    $("#customer_name").attr("hidden", true);
    
console.log(base_price);
    base_price.forEach(function(j){
      console.log(member_product[j]);
    });
     

    for(var i=0; i<member_price_array.length; i++){
      console.log(member_price_array.length);
        document.getElementById('product_button'+(id[i])).innerText=member_product[i]+'('+member_price_array[i]+')';
        document.getElementById('member_price_input'+(id[i])).value=member_price_array[i];
       
    }
  }else{
    $("#customer_name").attr("hidden", false);
    $(".member-id").attr("hidden", true);
    $("#extra").attr("hidden", true);
    $("#prp-radio").attr("hidden", true);
    $("#cash-radio").attr("hidden", true);
    $("#deduction-radio").attr("hidden", true);
    $('#cus_type_r').val("walk-in");
    $("#member_id").attr("hidden", false);
    
    for(var i=0; i<member_price_array.length; i++){
        document.getElementById('product_button'+(id[i])).innerText=member_product[i]+'('+base_price[i]+')';
        document.getElementById('member_price_input'+(id[i])).value=base_price[i];
       
    }
  }
  console.log(document.getElementById('purchase-type').value);
});

function hideAmount(){
  $("#member_id").attr("hidden", true);
}

function showAmount(){
  $("#member_id").attr("hidden", false);
}



function resetTotal(){
  var input = document.getElementById("total_price");
  input_value =  input.getAttribute("value");
  input_value = ""; 
}




function setTotalPrice(){
    const current_total = $('#total_price').val();
    resetTotal();
    //document.getElementById('total_price').value = getTotal(current_total,getCurrentPrice());
   
}


// function setTotalQuantity(quantity){
  
//   $('#total_quantity').attr("value", "");
//   return  current_quantity;
// }

function getFormattedDate() {
    var currentDt = new Date();
    var mm = currentDt.getMonth() + 1;
    var dd = currentDt.getDate();
    var yyyy = currentDt.getFullYear();
    var date = mm + '/' + dd + '/' + yyyy;
    
 
    return date;
}


function setDate(){

  var element = document.getElementById("modal-receipt-title");
  element.innerHTML = getFormattedDate();
 
}

$( document ).ready(function() {
  setDate();
});

function getTotalQuantity(){
  var values = [];
  var quanti = 0;
    $("input[name='quantity[]']").each(function() {
        values.push($(this).val());
    });
  for(var i =0; i<values.length; i++){
    quanti+=parseInt(values[i]);
  }
  console.log(values);
  console.log(quanti);
  $('#total_quantity').attr("value", quanti);
  

  var x = document.getElementById("product-table").rows.length-2;
  $('#quantity_r').attr("value", x);
}

function getTotalPrice(){
  var values = [];
  var quanti = 0;
    $("input[name='price[]']").each(function() {
        values.push($(this).val());
    });
  for(var i =0; i<values.length; i++){
    quanti+=Number(Math.round(values[i]+'e2')+'e-2');
  }
  console.log(values);
  console.log(quanti);
  $('#total_price').attr("value", Number(Math.round(quanti+'e2')+'e-2'));
  $('#total_price_r').attr("value", Number(Math.round(quanti+'e2')+'e-2'));
}


function getCurrentPrice(){
  var values = [];
    $("input[name='price[]']").each(function() {
        values.push($(this).val());
    });
    return values[values.length-1];
}




function getChange(){

  $('#change').val( Number(Math.round($('#amount').val() - $('#total_price').val()+'e2')+'e-2'));
 
  $('#change_r').val( Number(Math.round($('#amount').val() - $('#total_price').val()+'e2')+'e-2'));
 
  
}


function getNote(note){
  $('#sales_note').val(note);
}



function getAmount(){
  $('#payment_r').val($('#amount').val());
}







function getPrice(price,qty){
  let rnd_price = Number(Math.round(price+'e2')+'e-2')*qty;
  return Number(Math.round(rnd_price+'e2')+'e-2');
}


function getCurrentQuantity(){
  var sum = 0;
  var table = document.getElementById("product-table");
  var ths = table.getElementsByTagName('th');
  var tds = table.getElementsByClassName('quantity');
  for(var i=0;i<tds.length;i++){
    sum += isNaN(tds[i].innerText) ? 0 : parseInt(tds[i].innerText);
  }



  var totalBalance  = document.createTextNode('Total Balance ' + sum);
  console.log(totalBalance);

}



function getTotal(current_price,next_price){
  return parseFloat(current_price+next_price);
}

function productAddToTable(product_name,product_quantity,price,product_id,unit_price) {
  // First check if a <tbody> tag exists, add one if not
  if ($("#product-table tbody").length == 0) {
    $("#product-table").append("<tbody></tbody>");
  }
      
  // Append product to the table
  $("#product-table tbody").append(
    "<tr>" +
    '<td><input type="text mr-5"  name="product_name[]" id="product_id" style="background:white; width:150%" class="form-control form-control-muted" placeholder="Product ID"value="'+product_name+'('+product_quantity+')'+'" readonly></td>' +
      
      
      '<td class="quantity"><input type="number"name="quantity[]" min="1"step="1" oninput="changePrice(this)" style="background:white;" class="form-control" oninput="" placeholder="Quantity" id="product1" style="resize: none; width:100%;" value='+ product_quantity +'></td>' +
      '<td class="unit_price"><input name="unit_price[]" class="form-control form-control-muted"  style="background:white;"readonly placeholder="Unit Price" id="unit_price" style = "resize: none; width:100%;" value='+ unit_price +'></td>' +
    
      '<td class="price"><input type="text" name="price[]" style="background:white;" id="price" class="form-control form-control-muted" placeholder="Price"value="'+ getPrice(product_quantity,price)+'" readonly></td>'+
      "<td>" +  
        "<button type='button' " +
                "onclick='productDelete(this);' " +
                "class='btn btn-default'>" +
                '<i class="fas fa-trash"></i>' +
        "</button>" +
      "</td>" +
    
    "</tr>"
  );
      
  // Append product to the table
  $("#print-product-table tbody").append(
    "<tr>" +
    '<td><input type="text" name="product_name_print[]" id="product_id" style="background:white; width:150%;" class="form-control form-control-muted" placeholder="Product ID"value="'+product_name+'('+product_quantity+')'+'" readonly><input type="hidden" name="product_id_print[]" id="product_id_print" class="form-control form-control-muted" placeholder="Product ID"value="'+product_id+'" readonly></td>' +
      
     
      '<td class="quantity_r"><input name="quantity_print[]"  class="form-control form-control-muted"  style="background:white;"readonly placeholder="Quantity" id="quantity_print" style = "resize: none; width:100%;" value='+ product_quantity +'></td>' +
      '<td class="unit_price_r"><input name="unit_price_print[]" class="form-control form-control-muted"  style="background:white;"readonly placeholder="Unit Price" id="unit_price" style = "resize: none; width:100%;" value='+ unit_price +'></td>' +
     
      '<td class="price_r"><input type="text" name="price_print[]" id="price_print"  style="background:white;" class="form-control form-control-muted" placeholder="Price"value="'+ getPrice(product_quantity,price)+'" readonly></td>'+
      
    "</tr>"
  );


  getTotalQuantity();
  getTotalPrice();
  //setDate();
}



function productDelete(ctl) {
  $(ctl).parents("tr").remove();
  document.getElementById("print-product-table").deleteRow(getId(ctl));
  getTotalQuantity();
  getTotalPrice();

  
}

function changePrice(id){
  table = document.getElementById("product-table");
  r = $(id).closest("tr").index();
   //let amount = table.rows[r+1].cells[3].children[0].value;
  table.rows[r+1].cells[3].children[0].value = table.rows[r+1].cells[2].children[0].value * table.rows[r+1].cells[1].children[0].value;

  table2 = document.getElementById("print-product-table");
  r2= $(id).closest("tr").index();
   //let amount = table.rows[r+1].cells[3].children[0].value;
  console.log(table2.rows[r2].cells[1].children[0].value);
  table2.rows[r2].cells[1].children[0].value = table.rows[r+1].cells[1].children[0].value;
  table2.rows[r2].cells[3].children[0].value = table.rows[r+1].cells[3].children[0].value;
}

function  getId(element) {
   return element.parentNode.parentNode.rowIndex;
}


function setMemberId(){
  $('#member_id_r').val($('#member-id').val());
  console.log($('#member-id').val());
  console.log($('#member_id_r').val());
}


function setCustomerName(name){
  $('#customer_name_r').val(name);
  
}


function submitForm(){
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
      }).then((result) => {
        if (result.value) {
          Swal.fire(
            'Sent!',
            'Transaction recorded succesfully',
            'success'
          ).then((result) => {
              if (result.value) {
               // document.getElementById("pos-form").submit();
              
              }
            })
         
        }
      });
}

 
  



</script>



<script>
// datatables

$(document).ready(function() {
    $('#product-table').DataTable( {
        "scrollY":        "350px",
        "scrollCollapse": true,
        "paging":         false,
        "dom": 't',
        "language": {
          "zeroRecords": " "
          },
    } );
} );



var currentValue = 0;
function handleClick(myRadio) {
    
    $('#payment_type_r').val(myRadio.value);
    currentValue = myRadio.value;
    console.log(currentValue);
}
</script>







          <!-- note modal -->
          <div class="modal fade" id="addNote" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h2 class="modal-title" id="exampleModalLabel1">Sales Note</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                        <div class="row mx-auto" style="width: 90%; display: inline-block;">
                        <input type="text" id="note_id" class="form-control" placeholder="Add Note" required>
                        </div>
                        
                      
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary text-gray" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="getNote($('#note_id').val())" data-dismiss="modal">Add</button>
                      </div>
                    </div>
                  </div>
                </div> 










<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <input type="text" class="form-control" id="product1" placeholder="Enter Product Quantity">
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary"  data-dismiss="modal">Add Product</button>
      </div>
    </div>
  </div>
</div>



          <!-- Modal1 -->
          <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h2 class="modal-title" id="exampleModalLabel1">Product 1</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                        <div class="row mx-auto" style="width: 90%; display: inline-block;">
                        <input type="text" id="quantity1" class="form-control" placeholder="Product Quantity" required>
                        </div>
                        
                      
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary text-gray" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="productAddToTable('<?php echo getProducts()[0]['name']?>',$('#quantity1').val(),<?php echo getProducts()[0]['price']?>,<?php echo getProducts()[0]['id']?>,<?php echo getProducts()[0]['price']?>),$('#quantity1').val('')">Add</button>
                      </div>
                    </div>
                  </div>
                </div>  


                 <!-- Modal2 -->
               <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h2 class="modal-title" id="exampleModalLabel2">Product 2</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                        <div class="row mx-auto" style="width: 90%; display: inline-block;">
                        <input type="text" id="quantity2" class="form-control" placeholder="Product Quantity" required>
                        </div>
                        
                      
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary text-gray" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="productAddToTable('<?php echo getProducts()[1]['name']?>',$('#quantity2').val(),<?php echo getProducts()[1]['price']?>,<?php echo getProducts()[1]['id']?>,<?php echo getProducts()[1]['price']?>),$('#quantity2').val('')">Add</button>
                      </div>
                    </div>
                  </div>
                </div>

                 <!-- Modal 3-->
               <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel3" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h2 class="modal-title" id="exampleModalLabel3">Product 3</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                        <div class="row mx-auto" style="width: 90%; display: inline-block;">
                          <input type="text" id="quantity3" name="quantity3"class="form-control form-control" placeholder="Product Quantity" required>
                        </div>
                        
                      
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary text-gray" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="productAddToTable('<?php echo getProducts()[2]['name']?>',$('#quantity3').val(),100.00,<?php echo getProducts()[2]['id']?>,<?php echo getProducts()[2]['price']?>),$('#quantity3').val('')">Add</button>
                      </div>
                    </div>
                  </div>
                </div>








   <!-- Modal amount-->
   <div class="modal fade" id="amount_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel3" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h2 class="modal-title" id="exampleModalLabel3">Amount</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                        <div class="row mx-auto" style="width: 90%; display: inline-block;">
                          <input type="text" id="amount" name="amount"class="form-control form-control" placeholder="Enter Amount"  oninput="getChange(),getAmount()" required>
                        </div>
                        
                      
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary text-gray" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal"data-target="#modal-receipt" >Submit</button>
                      </div>
                    </div>
                  </div>
                </div>






  <div class="modal fade" id="modal-receipt" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">
        	
            <div class="modal-header">
                <h6 class="modal-title" id="modal-receipt-title" ></h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
                    <div class="printThis">

                                  
                              <center>
                                  <h5>Oneheart Wellness Distribution</h5>
                                  <hr>
                                  </center>
                                 

                                  <div class="container">
              <div class="row">
              <form method="POST" id="pos-form">
              <div class="col-lg-12">
              <div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar">                 
                                
                  <table class="table align-items-center" id="print-product-table">
                    <thead class="thead-gray">
                      <tr>
                        <th>Product</th>
                       
                        <th>Qty</th>
                        <th>Unit Price</th>
                        <th>Amount</th>
                        
                      </tr>
                    </thead>
                    <tbody class="list">
                      
                    </tbody>                     
                  </table>
                
              </div>

</div>

</div>
                                 

<input type="hidden" readonly  name="member_id_r" id="member_id_r" value="N/A">
                                        
<input type="hidden" readonly  name="customer_name_r" id="customer_name_r" value="N/A">

                                <div class="row mt--25">
                                  <div class="col">
                                  <div class="input-group">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text form-control-sm form-control-muted" >Customer Type: </span>
                                            
                                          </div>
                                          <input type="text" class="form-control form-control-sm form-control-muted float-right" style="background:white;" readonly placeholder="" name="cus_type_r" id="cus_type_r" value="walk-in">
                                        </div>
                                      </div>
                                  </div><!-- row end -->







                                <div class="row mt--25">
                                  <div class="col">
                                  <div class="input-group">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text form-control-sm form-control-muted" >Payment Type: </span>
                                            
                                          </div>
                                          <input type="text" class="form-control form-control-sm form-control-muted float-right" style="background:white;" readonly placeholder="" name="payment_type_r" id="payment_type_r" value="cash">
                                        </div>
                                      </div>
                                  </div><!-- row end -->

                                  <div class="row mt--25">
                                    <div class="col">
                                    <div class="input-group">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text form-control-sm form-control-muted">Total Amount Due: ₱</span>
                                            
                                          </div>
                                          <input type="text" class="form-control form-control-sm form-control-muted float-right" style="background:white;" readonly placeholder="0.00" name="total_price_r" id="total_price_r">
                                        </div>
                                    </div> 
                                  </div><!-- row end -->


                               


                                  <div class="row mt--25">
                                  <div class="col">
                                  <div class="input-group">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text form-control-sm form-control-muted" >Payment: ₱</span>
                                            
                                          </div>
                                          <input type="text" class="form-control form-control-sm form-control-muted float-right" style="background:white;" readonly placeholder="0.00" name="payment_r" id="payment_r">
                                        </div>
                                      </div>
                                  </div><!-- row end -->

                                  <div class="row mt--25">
                                  <div class="col">
                                        <div class="input-group">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text form-control-sm form-control-muted">Change: ₱</span>
                                            
                                          </div>
                                          <input type="text" class="form-control form-control-sm form-control-muted" style="background:white;" readonly placeholder="0.00" name="change_r" id="change_r">
                                        </div>
                                  </div>
                                  </div><!-- row end -->

                       
                                  <div class="row mt--25">
                                  <div class="col">
                                  <div class="input-group">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text form-control-sm form-control-muted">No. of item(s):</span>
                                            
                                          </div>
                                          <input type="text" class="form-control form-control-sm form-control-muted" style="background:white;" readonly placeholder="0" name="quantity_r" id="quantity_r">
                                        </div>
                                  
                                  </div>
  
                                  </div><!-- row end -->


                                  <div class="row mt--25">
                                  <div class="col">
                                  <div class="input-group">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text form-control-sm form-control-muted">Note:</span>
                                            
                                          </div>
                                          <input type="text" class="form-control form-control-sm form-control-muted" style="background:whitesmoke;" placeholder="Enter note here" name="sales_note" id="sales_note">
                                        </div>
                                  
                                  </div>
  
                                  </div><!-- row end -->
                                 
                                </div>
                                
                                  </div>
                                  
                            </div>
                           
                      <div class="modal-footer">
                      <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button> 
                          <button type="submit" name="submit-form"class="btn btn-secondary float-right"  id="printThis">Submit</button>
                        
                      </div>
                      </form>
        </div>





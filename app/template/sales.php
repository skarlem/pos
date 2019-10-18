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


<div class="header bg-gradient-primary pb-7 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
        </div>
      </div>
    </div>
    <div class="container-fluid mt--7">
    
      <div class="row" style="height: 90%">
        <div class="col-xl-12">
          <div class="card bg-gradient-white shadow" style="height: 110%">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-muted ls-1 mb-1">Inventory</h6>
                  <h2 class="text-black mb-0">Sales History List</h2>
                  <!-- <button class="float-left btn btn-primary">Toggle</button> -->
                </div>
               
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart">

                
                
            
                <div id="table1">
                <div class="table-responsive">
            <table class="table table-striped compact nowrap fixed" cellspacing="0"  id="inventory-table" style="width:100%;">     
                                                <thead class="bg-info text-white">
                                                    <tr>
													    
                                                        <th>ID</th>
                                                        <th>Date</th>
                                                        <th>Member ID</th>
                                                        <th>Customer Name</th>
                                                        <th>Customer Type</th>
                                                        <th>Payment Type</th>
                                                        <th>Total Amount</th>
                                                        <th>Payment</th>
                                                        <th>Change</th>
                                                        <th>No. of Items</th>
                                                        <th>Products</th>
                                                        <th>Note</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                               <?php 
                                               
                                               foreach( getSales()as $row ){
                                                $id = $row['id'];
                                                $date = $row['date'];
                                                $cus_type = $row['customer_type'];
                                                $payment_type = $row['payment_type'];
                                                $total_price = $row['total_price'];
                                                $payment = $row['payment'];
                                                $change = $row['change_'];
                                                $items = $row['no_of_items'];
                                                $product = $row['products'];
                                                $member_id = $row['member_id'];
                                                $member_name = $row['member_name'];
                                                $note = $row['note'];
                                                echo'
                                                <tr>
                                                <td>'.$id.'</td>
                                                <td>'.$date.'</td>
                                                <td>'.$member_id.'</td>
                                                <td>'.$member_name.'</td>
                                                <td>'.$cus_type.'</td>
                                                <td>'.$payment_type.'</td>
                                                <td>'.$total_price.'</td>
                                                <td>'.$payment.'</td>
                                               
                                                <td>'.$change.'</td>
                                                <td>'.$items.'</td>
                                                <td>'.$product.'</td>
                                                <td>'.$note.'</td>
                                               
                                                </tr>'; 


                                                
                                               }
                                               ?>

                                                </tbody>
                                            </table>
              
              </div>
                </div>          


            </div>
            </div>
          </div>
        </div>
       


      </div>
      
<?php 
include('footer.php');
if(isset($_POST['purchase-type'])){
  print("<pre>".print_r($_POST,true)."</pre>");
}
?>

<script>

$(document).ready(function() {
    $('#inventory-table').DataTable({
"order": [[ 0, "desc" ]],

responsive: true,
	dom: 'BRlfrtip' ,

  "lengthChange": false,

    buttons: [{
    	extend: 'excelHtml5',
		//text: '<i class="fa fa-file-excel-o"></i> Excel',
		titleAttr: 'Export to Excel',
	  className: 'btn btn-info mr-3',
		title: 'Incident Report',
		exportOptions: {
		columns: ':not(:last-child)',},
    },
    {
			extend: 'pdfHtml5',
			title : function() {
				return "ABCDE List";
		},
		
		text: 'PDF',
		orientation : 'portrait',
	
		
		titleAttr: 'Export to PDF',
		className: 'btn btn-danger',
		
		title: 'Sales Report',

		exportOptions: {
		columns: ':not(:last-child)',},
		
	}
	
	]
    });
} );
 
</script>
   
        </div>
    </div>
</body>





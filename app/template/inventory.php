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
   
      <div class="row" style="height: 100%">
        <div class="col-xl-12">
          <div class="card bg-gradient-white shadow" style="height: 100%">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-muted ls-1 mb-1">Inventory</h6>
                  <h2 class="text-black mb-0">Product List</h2>
                </div>
                <button type="button" class="btn bg-info text-white mt--0" data-toggle="modal" data-target="#add_modal">
                  Add Product
                </button>
              </div>
            </div>
            <div class="card-body">
             

               
            
            <div class="table-responsive">
            <table class="table table-striped compact nowrap fixed" cellspacing="0"  id="inventory-table" style="width:100%;">         
         
                                                <thead class="bg-info text-white">
                                                    <tr>
													    
                                                        <th>ID</th>
                                                        <th>Product Code</th>
                                                        <th>Name</th>
                                                        <th>Quantity</th>
                                                        <th>Cost</th>
                                                        <th>Price</th>
                                                        <th>Member Price</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                               <?php 
                                               
                                               foreach( getProducts()as $row ){
                                                $id = $row['id'];
                                                $product_name = $row['name'];
                                                $quantity = $row['quantity'];
                                                $cost = $row['cost'];
                                                $price = $row['price'];
                                                $member_price = $row['member_price'];
                                                $product_code = $row['product_code'];

                                                echo'
                                                <tr>
                                                <td>'.$id.'</td>
                                                <td>'.$product_code.'</td>
                                                <td>'.$product_name.'</td>
                                                <td>'.$quantity.'</td>
                                                <td>'.$cost.'</td>
                                                <td>'.$price.'</td>
                                                <td>'.$member_price.'</td>
                                                <td>
                                                <button class="btn  btn-sm btn-icon btn-3 btn-primary" type="button"  data-toggle="modal" data-target="#edit_modal'.$id.'">
                                                  <span class="btn-inner--icon"><i class="fas fa-edit"></i></span>
                                                    <span class="btn-inner--text">Edit</span>
                                                </button>

                                                <button class="btn btn-sm btn-icon btn-3 btn-primary" type="button" data-toggle="modal" data-target="#delete_modal'.$id.'">
                                                <span class="btn-inner--icon"><i class="fas fa-backspace"></i></span>
                                                  <span class="btn-inner--text">Delete</span>   
                                                </button>


                                                <button class="btn btn-sm btn-icon btn-3 btn-primary" type="button" data-toggle="modal" data-target="#view_modal'.$id.'">

                                                <span class="btn-inner--icon"><i class="fas fa-search-plus"></i></span>
                                                  <span class="btn-inner--text">View</span>   
                                                </button>


                                                </td>
                                               
                                                </tr>
                                                
                                                


                                                
                                        <div class="modal fade" id="edit_modal'.$id.'" tabindex="-1" role="dialog"  aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h2 class="modal-title" id="exampleModalLabel1"></h2>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <form method="POST">
                                  
                                  
                                  
                                              
                                                <div class="container-fluid">
                                                
                                                <input type="text" class="form-control" name="id" id="id" placeholder="Product Name" value="'.$id.'" hidden>
                                                  
                                                <div class="form-group">
                                                <div class="input-group" >
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text">Product Code:</span>
                                                      
                                                    </div>
                                                    <input type="text" class="form-control" name="product_code"  id="product_code" placeholder="Product Code" value="'.$product_code.'">
                                                  </div>
                                              </div>

                                              <div class="form-group">
                                                <div class="input-group" >
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text">Product Name:</span>
                                                      
                                                    </div>
                                                    <input type="text" class="form-control" name="product_name"  id="product_name" placeholder="Product Name" value="'.$product_name.'">
                                                  </div>
                                              </div>

                       

                        

                                              <div class="form-group">
                                                <div class="input-group" >
                                                  <div class="input-group-prepend">
                                                    <span class="input-group-text">Quantity:</span>
                                                        
                                                  </div>
                                                    <input type="text" class="form-control" name="quantity" id="quantity" placeholder="Quantity" value="'.$quantity.'">
                                                  </div>
                                              </div>

                                              <div class="form-group">
                                                <div class="input-group" >
                                                  <div class="input-group-prepend">
                                                    <span class="input-group-text">Cost:</span>
                                                        
                                                  </div> 
                                                    <input type="text" class="form-control" name="cost" id="cost" placeholder="Cost" value="'.$cost.'">
                                                  </div>
                                              </div>

                                              <div class="form-group">
                                                <div class="input-group" >
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text">Price:</span>   
                                                    </div> 
                                                  <input type="text" class="form-control"  name="price" id="price" placeholder="Price" value="'.$price.'">
                                                  </div>
                                              </div>

                                                <div class="form-group">
                                                  <div class="input-group" >
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text">Member Price:</span>   
                                                    </div> 
                                                    <input type="text" class="form-control"  name="member_price" id="member_price" placeholder="Member Price" value="'.$member_price.'">
                                                  </div>
                                                </div>
                                            </div>
                    
                        
                                                
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary text-gray" data-dismiss="modal">Close</button>
                        <button type="submit" name="edit_submit"class="btn btn-primary">Submit</button>
                      </div>
                    </div>
                    </form>
                  </div>
                </div>  


          <div class="modal fade" id="delete_modal'.$id.'" tabindex="-1" role="dialog"  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h2 class="modal-title" id="exampleModalLabel1"></h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form method="POST">
                     <div class="container-fluid">
                        <h3>Are you sure you want to remove this product?<h3>
                        <input type="hidden" name="delete_id" class="form-control form-control-flush" value="'.$id.'" >
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary text-gray" data-dismiss="modal">Cancel</button>
                        <button type="submit" id="delete_submit"class="btn btn-primary">Remove</button>
                      </div>
                    </div>
                    </form>
                  </div>
                </div>  
                            
                
              <div class="modal fade" id="view_modal'.$id.'" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h2 class="modal-title" id="exampleModalLabel1"></h2>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  
                  <div class="container-fluid">
                  <input type="text" class="form-control form-control-flush" placeholder="Fulshed input">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary text-gray" data-dismiss="modal">Close</button>
                    
                    </div>
                  </div>
                  
                </div>
            </div> 

                                                '; 


                                                
                                               }
                                               ?>

                                                </tbody>
                                            </table>
              
               
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
      "lengthChange": false,
    });
} );
 function printMe() {
    printElement(document.getElementById("printThis"));
}

function printElement(elem) {
    var domClone = elem.cloneNode(true);
    
    var $printSection = document.getElementById("printSection");
    
    if (!$printSection) {
        var $printSection = document.createElement("div");
        $printSection.id = "printSection";
        document.body.appendChild($printSection);
    }
    
    $printSection.innerHTML = "";
    $printSection.appendChild(domClone);
    window.print();
}
</script>
   
        </div>
    </div>
</body>





  <!-- Modal1 -->
  <div class="modal fade" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h2 class="modal-title" id="exampleModalLabel1"></h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="container-fluid">
                      <div id="printThis">
                    <form method="POST">
                    <div class="form-group">
                      <input type="text" class="form-control" id="product_code" name="product_code" placeholder="Product Code">
                    </div>
                        <div class="form-group">
                      <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Quantity">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" id="cost" name="cost" placeholder="Cost">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" id="price" name="price" placeholder="Price">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" id="member_price" name="member_price" placeholder="Member Price">
                    </div>
                      </div>
                    
                      </div> 
                      
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary text-gray" data-dismiss="modal">Close</button>
                        <button type="submit" name="add_submit"class="btn btn-primary">Add</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>  
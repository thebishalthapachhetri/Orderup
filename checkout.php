  <header class="masthead">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-10 align-self-end mb-4 page-title">
                	<h3 class="text-white">Checkout</h3>
                    <hr class="divider my-4" />

                </div>
                
            </div>
        </div>
    </header>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="" id="checkout-frm">
                    <h4>Confirm Delivery Information</h4>
                    <div class="form-group">
                        <label for="" class="control-label">Firstname</label>
                        <input type="text" name="first_name"class="form-control" value="">
                    </div>
                    <!-- <div class="form-group">
                        <label for="" class="control-label">Email</label> -->
                        <input type="hidden" name="last_name"  class="form-control" value="">
                    <!-- </div> -->
                    <div class="form-group">
                        <label for="" class="control-label">Contact</label>
                        <input type="text" name="mobile"  class="form-control" value="">
                    </div>
                    <!-- <div class="form-group">
                        <label for="" class="control-label">Address</label>
                        <textarea cols="30" rows="3" name="address" required="" class="form-control"></textarea>
                    </div> -->
                    <input type="hidden" name="address"  class="form-control" value="">
                    <!-- <div class="form-group">
                        <label for="" class="control-label">Email</label> -->
                        <input type="hidden" name="email"  class="form-control" value="">
                    <!-- </div>   -->
                    <div class="form-group">
                        <label for="" class="control-label">Table</label>
                        <input type="text" name="table"  class="form-control" value="<?php echo $_SESSION['table_id'] ?>">
                    </div> 

                    <div class="text-center">
                        <button class="btn btn-block btn-outline-primary">Place Order</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function(){
          $('#checkout-frm').submit(function(e){
            e.preventDefault()
          
            start_load()
            $.ajax({
                url:"admin/ajax.php?action=save_order",
                method:'POST',
                data:$(this).serialize(),
                success:function(resp){
                    if(resp==1){
                        alert_toast("Order successfully Placed.")
                        setTimeout(function(){
                            location.replace('index.php?page=home&table=<?php echo $_SESSION['table_id'];?>')
                        },1500)
                    }
                }
            })
        })
        })
    </script>
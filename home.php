 <!-- Masthead-->
        <header class="masthead">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end mb-4 page-title">
                    	<h3 class="text-white">Welcome to <?php echo $_SESSION['setting_name']; ?></h3>
                        <hr class="divider my-4" />
                        <!-- <a class="btn btn-primary btn-xl js-scroll-trigger" href="#menu">Order Now</a> -->

                    </div>
                    
                </div>
            </div>
        </header>
        <?php
         include'admin/db_connect.php';
         if(isset($_GET['table'])){
         $tableqry = $conn->query("SELECT * FROM  table_list where id=".$_GET['table']." AND activeStatus=1");
if($tableqry->fetch_assoc())
{
        ?>
	<section class="page-section" id="menu">
      
        
    <ul class="nav nav-tabs">
    <?php 
    $activeStatus=1;
       
        $qry = $conn->query("SELECT * FROM  category_list");
        while($row = $qry->fetch_assoc()):
            
        ?>
  <li class="<?php echo $activeStatus==1?'active':''; ?>" style="padding-left:30px"><a data-toggle="tab" href="#tab<?php echo $row['id'] ?>"><?php echo $row['name'] ?></a></li>

  <?php $activeStatus++; endwhile; ?>
</ul>

<div class="tab-content">
    <?php 
     $activeStatus=1;
    $qry = $conn->query("SELECT * FROM  category_list  ");
    while($cat_row = $qry->fetch_assoc()):
        ?>
  <div id="tab<?php echo $cat_row['id'] ?>" class="tab-pane fade in <?php echo $activeStatus==1?'active show':''; ?>">
    <h3><?php echo $cat_row['name'] ?></h3>
    <div id="menu-field" class="card-deck" style="margin-left:20px">
                <?php 
                
                    $qry1 = $conn->query("SELECT * FROM  product_list where category_id=".$cat_row['id']." order by rand() ");
         if($qry1->fetch_assoc())
         {
                    while($row = $qry1->fetch_assoc()):
                    ?>
                    <div class="col-lg-3">
                     <div class="card menu-item ">
                         <div class="image-card">
                        <img src="assets/img/<?php echo $row['img_path'] ?>" class="card-img-top" alt="...">
                    </div>
                        <div class="card-body">
                          <h5 class="card-title"><?php echo $row['name'] ?></h5>
                          <p class="card-text truncate"><?php echo $row['description'] ?></p>
                          <div class="text-center">
                              <button class="btn btn-sm btn-outline-primary view_prod btn-block" data-id=<?php echo $row['id'] ?>><i class="fa fa-eye"></i> View</button>
                              
                          </div>
                        </div>
                        
                      </div>
                      </div>
                    <?php endwhile; 
                    }
                    else{
                        echo "No Items Found";
                    }?>
        </div>
  </div>
  <?php $activeStatus++; endwhile; ?>

</div>

        <!-- <div id="menu-field" class="card-deck">
                <?php 
                    // include'admin/db_connect.php';
                    $qry = $conn->query("SELECT * FROM  product_list order by rand() ");
                    while($row = $qry->fetch_assoc()):
                    ?>
                    <div class="col-lg-3">
                     <div class="card menu-item ">
                         <div class="image-card">
                        <img src="assets/img/<?php echo $row['img_path'] ?>" class="card-img-top" alt="...">
                    </div>
                        <div class="card-body">
                          <h5 class="card-title"><?php echo $row['name'] ?></h5>
                          <p class="card-text truncate"><?php echo $row['description'] ?></p>
                          <div class="text-center">
                              <button class="btn btn-sm btn-outline-primary view_prod btn-block" data-id=<?php echo $row['id'] ?>><i class="fa fa-eye"></i> View</button>
                              
                          </div>
                        </div>
                        
                      </div>
                      </div>
                    <?php endwhile; ?>
        </div> -->
    </section>

    <?php 
    }
    else{
        echo "Table not available";
    }
}
else{

    ?>
<section class="page-section" id="menu">
      
        
      <ul class="nav nav-tabs">
      <?php 
      $activeStatus=1;
         
          $qry = $conn->query("SELECT * FROM  category_list");
          while($row = $qry->fetch_assoc()):
              
          ?>
    <li class="<?php echo $activeStatus==1?'active':''; ?>" style="padding-left:30px"><a data-toggle="tab" href="#tab<?php echo $row['id'] ?>"><?php echo $row['name'] ?></a></li>
  
    <?php $activeStatus++; endwhile; ?>
  </ul>
  
  <div class="tab-content">
      <?php 
       $activeStatus=1;
      $qry = $conn->query("SELECT * FROM  category_list  ");
      while($cat_row = $qry->fetch_assoc()):
          ?>
    <div id="tab<?php echo $cat_row['id'] ?>" class="tab-pane fade in <?php echo $activeStatus==1?'active show':''; ?>">
      <h3><?php echo $cat_row['name'] ?></h3>
      <div id="menu-field" class="card-deck" style="margin-left:20px">
                  <?php 
                  
                      $qry1 = $conn->query("SELECT * FROM  product_list where category_id=".$cat_row['id']." order by rand() ");
           if($qry1->fetch_assoc())
           {
                      while($row = $qry1->fetch_assoc()):
                      ?>
                      <div class="col-lg-3">
                       <div class="card menu-item ">
                           <div class="image-card">
                          <img src="assets/img/<?php echo $row['img_path'] ?>" class="card-img-top" alt="...">
                      </div>
                          <div class="card-body">
                            <h5 class="card-title"><?php echo $row['name'] ?></h5>
                            <p class="card-text truncate"><?php echo $row['description'] ?></p>
                            <div class="text-center">
                                <button class="btn btn-sm btn-outline-primary view_prod btn-block" data-id=<?php echo $row['id'] ?>><i class="fa fa-eye"></i> View</button>
                                
                            </div>
                          </div>
                          
                        </div>
                        </div>
                      <?php endwhile; 
                      }
                      else{
                          echo "No Items Found";
                      }?>
          </div>
    </div>
    <?php $activeStatus++; endwhile; ?>
  
  </div>
  
          <!-- <div id="menu-field" class="card-deck">
                  <?php 
                      // include'admin/db_connect.php';
                      $qry = $conn->query("SELECT * FROM  product_list order by rand() ");
                      while($row = $qry->fetch_assoc()):
                      ?>
                      <div class="col-lg-3">
                       <div class="card menu-item ">
                           <div class="image-card">
                          <img src="assets/img/<?php echo $row['img_path'] ?>" class="card-img-top" alt="...">
                      </div>
                          <div class="card-body">
                            <h5 class="card-title"><?php echo $row['name'] ?></h5>
                            <p class="card-text truncate"><?php echo $row['description'] ?></p>
                            <div class="text-center">
                                <button class="btn btn-sm btn-outline-primary view_prod btn-block" data-id=<?php echo $row['id'] ?>><i class="fa fa-eye"></i> View</button>
                                
                            </div>
                          </div>
                          
                        </div>
                        </div>
                      <?php endwhile; ?>
          </div> -->
      </section>
    <?php
}
    ?>
    <script>
        
        $('.view_prod').click(function(){
            uni_modal_right('Product','view_prod.php?id='+$(this).attr('data-id'))
        })
    </script>
	

<?php
require("../controllers/advert_controller.php"); 

function viewAdverts(){
  $result=select_all_adverts_ctr();
  $i=0;
  if ($result!=false) {
    while($i < count($result)){
      ?>
      <tr>
          
        <td ><?php echo $result[$i]['company_name']; ?></td>
        <td ><?php echo $result[$i]['company_email']; ?></td>
        <td>
         <form method="POST" action="../actions/updateadvert.php" id="<?php echo "deliv".$i;  ?>">
                                      <input type="hidden" name="id" value="<?php echo $result[$i]['company_id'];  ?>">
                                      <input type="hidden" name="cemail" value="<?php echo $result[$i]['company_email'];  ?>">
                                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="status" onchange="getElementById('<?php echo "deliv".$i;  ?>').submit()">
                                        <?php
                                          if($result[$i]['Approved']=="No"){
                                        ?>
                                            <option selected value=" <?php echo $result[$i]['Approved'];  ?>"> <?php echo $result[$i]['Approved'];  ?></option>
                                            
                                            <option value="Yes">Yes</option>
                                     

                                            <?php
                                              }
                                              else if($result[$i]['Approved']=="Yes"){
                                        ?>
                                            <option selected value=" <?php echo $result[$i]['Approved'];  ?>"> <?php echo $result[$i]['Approved'];  ?></option>
                                            
                                            <option value="No">No</option>
                                            

                                            <?php
                                              } 
                                        ?>
                                            
                              </select>
                          </form>
                          </td>

                          <td>
                            <div>
                              <button type="button" class="btn " data-toggle="modal" data-target='<?php echo "#exampleModal".$i;?>'><i class="fas fa-eye"></i> View Advert</button>
                              <button type="button" class="btn " data-toggle="modal" data-target='<?php echo "#complete".$i;?>' title="Delete Advert"><i class="fas fa-trash"></i> Delete Advert</button>
                            </div>
                          </td>
     


</tr>

<div class="modal fade" id='<?php echo "exampleModal".$i;?>' tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel" style="color: black;">View Advert</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <img src="<?php echo "'../images/adverts/".$result[$i]['company_image']."'";  ?>" class="rectangle" style="width: 150px;"
  alt="Avatar" />
         <br>
         <br>
                  <input type="text" style="background: white;" class="form-control" value=" <?php echo $result[$i]['company_name'];  ?>" disabled><br>
                  <input type="text" style="background: white;" class="form-control" value=" <?php echo $result[$i]['company_email'];  ?>" disabled><br>
                  <textarea type="text" style="background: white;" class="form-control"  disabled> <?php echo $result[$i]['company_info']; ?></textarea><br>
                  
                


              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                
            </div>
          </div>
        </div>
      </div>  
      <div class="modal fade" id='<?php echo "complete".$i;?>' tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel" style="color: black;">Mark Order As Completed</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <p class="modal-card-title">Do you want to delete <?php echo $result[$i]['company_name'];  ?>'s Advert?</p>
              

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                  <form method="POST" action="../actions/deladvert.php">
          <input type="hidden" value="<?php echo $result[$i]['company_id'];  ?>" name="cid">
          <input type="hidden" value="<?php echo $result[$i]['company_image'];  ?>" name="image">
          <button type="submit" class="btn btn-primary" name="delete">Yes</button>
      </form>
                
            </div>
          </div>
        </div> 
      </div>
    <?php

    $i++;
  }

}

}







?>
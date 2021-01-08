<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6">
    <form action="<?php echo base_url('fuel/InsertFuel') ?>" method="post">
      <input type="text" name="fuel" id="fuelName" placeholder="Enter Fuel Type" class="form-control" required>
      <input type="submit" value="Add" class="btn btn-success" id="fuel" style="float:right; margin-top:10px;">
    </form>
  </div>
  <div class="col-md-3"></div>
</div>

<div class="row" style="margin-top: 20px;">
  <div class="col-md-3"></div>
  <div class="col-md-6">
    <div class="panel panel-danger ">
      <div class="panel-heading"> <strong>List of Fuel Type</strong> </div>
      <div class="panel-body">
          
        <table class="table table-hover table-bordered">
          <thead>
            <th class="col-md-1" style="text-align:center;">#</th>
            <th>Name</th>
            <th class="col-md-3" style="text-align:center;">Action</th>
          </thead>
          <tbody id="afuelList">
            <?php $count=1; ?>
            <?php foreach($listOfFuel as $rows) { ?>

              <tr>
                <td style="text-align:center;"><?php echo $count++ ?></td>
                <td><?php echo $rows['name'] ?></td>
                <td style="text-align:center;">
                  <button type="button" id='<?php echo $rows['id']; ?>' class="btn btn-xs btn-info btnEdit">Edit</button>
                  <button type="button" id='<?php echo $rows['id']; ?>' class="btn btn-xs btn-danger btnDelete" onclick="Are you sure ">Delete</button>
                  
                </td>
              </tr>

            <?php }?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-md-3"></div>
</div>


<!-- Modal -->
<div id="editModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Fuel</h4>
      </div>
      <div class="modal-body">
        
          <div class="row">
            <div class="col-md-12">
              <input type="hidden" id="fuelId">
              <input type="text" name="updateFuel" id="updateFuel" class="form-control">
              <input type="button" value="Update" id="btnUpdateFuel" class="btn btn-info" data-dismiss="modal" style="float:right; margin-top:5px;" >
            </div>
          </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>






<!-- scripts -->

<script type="text/javascript">

  $(document).on('click','.btnDelete', function(){
    
    var fuelId=$(this).attr('id');

    $.ajax({
      url: "<?php echo base_url('fuel/delete') ?>",
      type: "POST",
      data:{'fuelId':fuelId}

    });
    window.location.replace('<?php echo base_url('fuel') ?>');
  });

  $(document).on('click','#btnUpdateFuel', function(){
    var fuelId=$('#fuelId').val();
    var fuelName=$('#updateFuel').val();
    $.ajax({
      url: "<?php echo base_url('fuel/update') ?>",
      type: "POST",
      data:{'fuelName':fuelName, 'fuelId':fuelId}
    });
    window.location.replace('<?php echo base_url('fuel') ?>');
  });

  $(document).on('click','.btnEdit', function(){

    var fuelId=$(this).attr('id');

      $.ajax({
        url:"<?php echo base_url('fuel/get_single_fuel') ?>",
        type:"POST",
        data:{'fuelId':fuelId},
        dataType:'json',
        success:function(data){

          $('#editModal').modal('show');
          var fuelId=data['id'];
          var fuelName = data['name'];

          $('#fuelId').val(fuelId);
          $('#updateFuel').val(fuelName);
      }

    });
  });
</script>
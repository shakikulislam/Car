<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6">
    <form action="<?php echo base_url('body/InsertBody') ?>" method="post">
      <input type="text" name="body" id="bodyName" placeholder="Enter Body Name" class="form-control" required>
      <input type="submit" value="Add" class="btn btn-success" id="body" style="float:right; margin-top:10px;">
    </form>
  </div>
  <div class="col-md-3"></div>
</div>

<div class="row" style="margin-top: 20px;">
  <div class="col-md-3"></div>
  <div class="col-md-6">
    <div class="panel panel-info">
      <div class="panel-heading"> <strong>List of Car Body</strong> </div>
      <div class="panel-body">
          
        <table class="table table-hover table-bordered">
          <thead>
            <th class="col-md-1" style="text-align:center;">#</th>
            <th>Name</th>
            <th class="col-md-3" style="text-align:center;">Action</th>
          </thead>
          <tbody id="abodyList">
            <?php $count=1; ?>
            <?php foreach($listOfBody as $rows) { ?>

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
        <h4 class="modal-title">Edit Body</h4>
      </div>
      <div class="modal-body">
        
          <div class="row">
            <div class="col-md-12">
              <input type="hidden" id="bodyId">
              <input type="text" name="updateBody" id="updateBody" class="form-control">
              <input type="button" value="Update" id="btnUpdateBody" class="btn btn-info" data-dismiss="modal" style="float:right; margin-top:5px;" >
            </div>
          </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>




<!-- javascript -->

<script type="text/javascript">

  $(document).on('click','.btnDelete', function(){
    
    var bodyId=$(this).attr('id');

    $.ajax({
      url: "<?php echo base_url('body/delete') ?>",
      type: "POST",
      data:{'bodyId':bodyId}

    });
    window.location.replace('<?php echo base_url('body') ?>');
  });

  $(document).on('click','#btnUpdateBody', function(){
    var bodyId=$('#bodyId').val();
    var bodyName=$('#updateBody').val();
    $.ajax({
      url: "<?php echo base_url('body/update') ?>",
      type: "POST",
      data:{'bodyName':bodyName, 'bodyId':bodyId}
    });
    window.location.replace('<?php echo base_url('body') ?>');
  });

  $(document).on('click','.btnEdit', function(){

    var bodyId=$(this).attr('id');

      $.ajax({
        url:"<?php echo base_url('body/get_single_body') ?>",
        type:"POST",
        data:{'bodyId':bodyId},
        dataType:'json',
        success:function(data){

          $('#editModal').modal('show');
          var bodyId=data['id'];
          var bodyName = data['name'];

          $('#bodyId').val(bodyId);
          $('#updateBody').val(bodyName);
      }

    });
  });

</script>
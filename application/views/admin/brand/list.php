<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6">
    <form action="<?php echo base_url('brand/InsertBrand') ?>" method="post">
      <input type="text" name="brand" id="brandName" placeholder="Brand Name ex: BMW" class="form-control" required>
      <input type="submit" value="Add" class="btn btn-success" id="brand" style="float:right; margin-top:10px;">
    </form>
  </div>
  <div class="col-md-3"></div>
</div>

<div class="row" style="margin-top: 20px;">
  <div class="col-md-3"></div>
  <div class="col-md-6">
    <div class="panel panel-primary">
      <div class="panel-heading"> <strong>List of Car Brand</strong> </div>
      <div class="panel-body">
          
        <table class="table table-hover table-bordered">
          <thead>
            <th class="col-md-1" style="text-align:center;">#</th>
            <th>Name</th>
            <th class="col-md-3" style="text-align:center;">Action</th>
          </thead>
          <tbody id="abrandList">
            <?php $count=1; ?>
            <?php foreach($listOfBrand as $rows) { ?>

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
        <h4 class="modal-title">Edit Brand</h4>
      </div>
      <div class="modal-body">
        
          <div class="row">
            <div class="col-md-12">
              <input type="hidden" id="brandId">
              <input type="text" name="updateBrand" id="updateBrand" class="form-control">
              <input type="button" value="Update" id="btnUpdateBrand" class="btn btn-info" data-dismiss="modal" style="float:right; margin-top:5px;" >
            </div>
          </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>








<script type="text/javascript">

  $(document).on('click','.btnDelete', function(){
    
    var brandId=$(this).attr('id');

    $.ajax({
      url: "<?php echo base_url('brand/delete') ?>",
      type: "POST",
      data:{'brandId':brandId}

    });
    window.location.replace('<?php echo base_url('brand') ?>');
  });

  $(document).on('click','#btnUpdateBrand', function(){
    var brandId=$('#brandId').val();
    var brandName=$('#updateBrand').val();
    $.ajax({
      url: "<?php echo base_url('brand/update') ?>",
      type: "POST",
      data:{'brandName':brandName, 'brandId':brandId}
    });
    window.location.replace('<?php echo base_url('brand') ?>');
  });

  $(document).on('click','.btnEdit', function(){

    var brandId=$(this).attr('id');

      $.ajax({
        url:"<?php echo base_url('brand/get_single_brand') ?>",
        type:"POST",
        data:{'brandId':brandId},
        dataType:'json',
        success:function(data){

          $('#editModal').modal('show');
          var brandId=data['id'];
          var brandName = data['name'];

          $('#brandId').val(brandId);
          $('#updateBrand').val(brandName);
      }

    });
  });

    // $(document).on('change','#classes',function(){
    //     // alert('Work...');
    //     var classesID=$(this).val();
    //     // alert(classesID);
        
    //     $.ajax({
    //         url:"<?php echo base_url('onlineexamreport/get_all_exam_by_classes') ?>",
    //         type:"POST",
    //         data:{'classesID':classesID},
    //         dataType: 'json',
    //         success: function(data){
    //             $('#online_exam').html(data);
    //         }
    //     });
        
    // });

    // $(function(){
    //     // $('#summaryRow').hide();
    //     // $('#resultRow').hide();
    //     // $('#addResultRow').hide();

    //     // var brandName=$('#brand').val();

    //     $.ajax({
    //         // url:"<?php echo base_url('brand/InsertBrand') ?>",
    //         // type:"POST",
    //         // data:{'classesID':classesID, 'onlineExamID':onlineExamID},
    //         dataType:"json",
    //         success:function(data){
    //             // var pdfStudentList=data['studentList'];
                
    //             // var index=1;
		//         var tableRow = '';
    //             var index=1;

    //             for (var row in data) {
    //                 // if(data[row]['totalObtainedMark'] == "0" || data[row]['answerFile'] != NULL || data[row]['answerFile'] != ""){
    //                     tableRow += '<tr>';
    //                     tableRow += '<td>'+(index++)+'</td>';
    //                     tableRow += '<td>'+data[row]['name']+'</td>';
    //                     tableRow += '<tr>';
    //                 // }
                    
    //             }

    //             $('#brandList').html(tableRow);
                
    //         }
    //     });
    // });
</script>
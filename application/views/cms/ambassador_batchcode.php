<section id="main-content">
  <section class="wrapper">
    <!-- page start-->
    <div class="row">

      <div class="col-lg-12">
        <!-- <section class="panel"> -->

          <div class="col-lg-4" style="padding-left: 0px; padding-right: 0px;">
            <section class="panel">
              <header class="panel-heading">
                <b>ADD AMBASSADOR ASSIGNMENT</b>
                <?php if ($flash_msg = $this->session->flash_msg): ?>
                  <br><sub style="color: <?php echo $flash_msg['color'] ?>"><?php echo $flash_msg['message'] ?></sub>
                <?php endif; ?>
              </header>
              <div class="panel-body">
                <form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url('cms/admin/add_batchcode_assignment/') ?>">

                  <div class="form-group">
                    <label>Ambassador*</label>
                    <select class="form-control" name="ambassador_id">
                      <option value="">-- Select ambassador --</option>
                      <?php foreach (get_ambassadors($this) as $value) { ?>
                        <option value="<?php echo $value->id; ?>"><?php echo $value->fname;?> <?php echo $value->lname;?></option>
                      <?php } ?>
                    </select>
                  </div>


                  <div class="form-group">
                    <label>Batchcode*</label>
                    <select class="form-control" name="batchcode_id" id="batchcode_id">
                      <option value=""> -- Select Batchcode -- </option>
                      <?php foreach (get_batchcode($this) as $value) { ?>
                        <option value="<?php echo $value->id; ?>" data-payload='<?php echo json_encode($value, JSON_HEX_APOS|JSON_HEX_QUOT)?>'><?php echo $value->batchcode_label;?></option>
                      <?php } ?>
                    </select>
                  </div>


                  <div class="form-group">
                    <label >ESO Group*</label>
                    <input type="text" class="form-control" id="eso_label" readonly>
                  </div>

                  <div class="form-group">
                    <label >Expiry Date*</label>
                    <input type="text" class="form-control" id="expiry_label" readonly>
                  </div>


                  <input type="submit" class="form-control btn-info" value="Save Assignment" style="color: white;font-size: 13px;color: #ffffff!important; float: right;">
                </form>
              </div>
            </section>

          </div>


          <div class="col-lg-8" style="padding-right: 0px;">
            <section class="panel">
              <header class="panel-heading">
                <b>ASSIGNMENT LIST</b><?php if ($update_flash_msg = $this->session->update_flash_msg): ?>
                  <br><sub style="color: <?php echo $update_flash_msg['color'] ?>"><?php echo $update_flash_msg['message'] ?></sub>
                <?php endif; ?>
              </header>
              <div class="panel-body">

                <!-- <div class="form-group" style="margin-bottom: 50px;">
                  <div class="col-md-12" style="padding-right: 0px;padding-left: 0px;">
                    <form action="" method="GET">
                      <div class="input-group m-bot10">
                        <input type="text" class="form-control" name="eso_label" placeholder="Search keyword by ESO name" value="<?php echo @$_GET['eso_label'] ?>">
                        <div class="input-group-btn">
                          <button tabindex="-1" class="btn btn-white" type="submit" id="search_keyword">Search</button>
                          
                          <button tabindex="-1" class="btn btn-white" type="button">
                            <a href="<?php echo base_url('cms/admin/eso') ?>">X </a>
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div> -->

                <div class="table-responsive" style="overflow: hidden; outline: none;" tabindex="1">
                  <table class="table table-bordered table-striped table-condensed cf" id="dynamic-table2">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Ambassador</th>
                        <th>Batchcode</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (count($res) > 0 ): ?>

                        <?php $i = 1; foreach ($res as $key => $value): ?>

                            <th scope="row"><?php echo $i++ ?></th>
                            <td><?php echo $value->ambassador_name ?></td>
                            <td><?php echo $value->batchcode_label ?></td>

                            <td>
                              <button type="button" class="edit-row-batchcode-assignment btn btn-info btn-xs"  data-payload='<?php echo json_encode($value, JSON_HEX_APOS|JSON_HEX_QUOT)?>'>
                                  <i class="fa fa-pencil"></i> Edit
                              </button>

                              <button type="button" class="delete-row-batchcode-assignment btn btn-danger btn-xs" data-id="<?php echo $value->id; ?>">
                                  <i class="fa fa-trash-o"></i> Delete
                              </button>

                            </td>
                          </tr>
                        <?php endforeach; ?>
                      <?php else: ?>
                        <tr>
                          <td colspan="4" style="text-align:center">Empty table data</td>
                        </tr>
                      <?php endif; ?>
                    </tbody>
                  </table>

                </div>
              </div>
            </section>
          </div>

          <hr>
      </div>

    </div>

    <!-- page end-->
  </section>
</section>

<!-- Modal Brand -->
<div class="modal fade modal-batchcode-assignment" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Manage</h4>
      </div>
        <div class="modal-body">

          <form role="form" method="post" id="main-form2" enctype="multipart/form-data">

            <div class="form-group">
              <label>Ambassador*</label>
              <select class="form-control" name="ambassador_id">
                <option value="">-- Select ambassador --</option>
                <?php foreach (get_ambassadors($this) as $value) { ?>
                  <option value="<?php echo $value->id; ?>"><?php echo $value->fname;?> <?php echo $value->lname;?></option>
                <?php } ?>
              </select>
            </div>


            <div class="form-group">
              <label>Batchcode*</label>
              <select class="form-control" name="batchcode_id" id="batchcode_id2">
                <option value=""> -- Select Batchcode -- </option>
                <?php foreach (get_batchcode($this) as $value) { ?>
                  <option value="<?php echo $value->id; ?>" data-payload='<?php echo json_encode($value, JSON_HEX_APOS|JSON_HEX_QUOT)?>'><?php echo $value->batchcode_label;?></option>
                <?php } ?>
              </select>
            </div>


            <div class="form-group">
              <label >ESO Group*</label>
              <input type="text" class="form-control" id="eso_label2" readonly>
            </div>

            <div class="form-group">
              <label >Expiry Date*</label>
              <input type="text" class="form-control" id="expiry_label2" readonly>
            </div>

            <div class="modal-footer">
              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
              <input class="btn btn-info" type="submit" value="Save changes">
            </div>

          </form>
        </div>
    </div>
  </div>
</div>
<!-- modal -->

<script>

  $(document).ready(function() {
    //Updating
    $('.edit-row-batchcode-assignment').on('click', function(){
      $('.modal-batchcode-assignment').modal()
      $('#main-form2')[0].reset() // reset the form
      const payload = $(this).data('payload')

      $('.modal-body select[name=ambassador_id]').val(payload.ambassador_id)
      $('.modal-body select[name=batchcode_id]').val(payload.batchcode_id)
      $('.modal-body input[id=eso_label2]').val(payload.eso_label)
      $('.modal-body input[id=expiry_label2]').val(payload.expiry_date)

      $('#main-form2').attr('action', base_url + 'cms/admin/update_batchcode_assignment/' + payload.id)
      
    })

  })

  //Deleting
  $('.delete-row-batchcode-assignment').on('click', function(){
    let p = prompt("Are you sure you want to delete this? Type DELETE to continue", "");
    if (p === 'DELETE') {
      const id = $(this).data('id')
      invokeForm(base_url + 'cms/admin/delete__batchcode_assignment', {id: id});
    }
  })

</script>

<script src="<?php echo base_url('public/admin/js/custom/') ?>generic.js"></script>
<script type="text/javascript" src="<?php echo base_url('public/admin/'); ?>assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url('public/admin/'); ?>assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url('public/admin/') ?>assets/advanced-datatable/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url('public/admin/') ?>assets/data-tables/DT_bootstrap.js"></script>

<script type="text/javascript">

  $('#batchcode_id').on('change', function(){
    var payload = $(this).find(":selected").data('payload');

    console.log(payload)
    $('#eso_label').val(payload.eso_label);
    $('#expiry_label').val(payload.expiry_date);
  });

  $('#batchcode_id2').on('change', function(){
    var payload = $(this).find(":selected").data('payload');

    console.log(payload)
    $('#eso_label2').val(payload.eso_label);
    $('#expiry_label2').val(payload.expiry_date);
  });

  $(document).ready(function(){
    $('#dynamic-table2').dataTable( {
      "aaSorting": [[ 0, "asc" ]]
    } );

  });

  $('#dynamic-table2_filter').find('input').attr('placeholder','ESO');
  $('#dynamic-table2_filter').find('input').attr('style','font-size:12px;');

</script>
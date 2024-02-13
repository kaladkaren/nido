<section id="main-content">
  <section class="wrapper">
    <!-- page start-->
    <div class="row">

      <!-- ########################### ESO ################################### -->

      <?php if($this->uri->segment(3) === 'eso') : ?>

      <div class="col-lg-12">
        <!-- <section class="panel"> -->

          <div class="col-lg-4" style="padding-left: 0px; padding-right: 0px;">
            <section class="panel">
              <header class="panel-heading">
                <b>ADD ESO</b>
                <?php if ($flash_msg = $this->session->flash_msg): ?>
                  <br><sub style="color: <?php echo $flash_msg['color'] ?>"><?php echo $flash_msg['message'] ?></sub>
                <?php endif; ?>
              </header>
              <div class="panel-body">
                <form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url('cms/admin/add_eso/') ?>">

                  <div class="form-group">
                    <label >ESO Label*</label>
                    <input type="text" class="form-control" name="eso_label" required="">
                  </div>

                  <input type="submit" class="form-control btn-success" value="Save ESO" style="color: white;font-size: 13px;color: #ffffff!important;width: 105px;float: right;">
                </form>
              </div>
            </section>

          </div>


          <div class="col-lg-8" style="padding-right: 0px;">
            <section class="panel">
              <header class="panel-heading">
                <b>ESO LIST</b><?php if ($update_flash_msg = $this->session->update_flash_msg): ?>
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
                        <th style="width: 10%;">#</th>
                        <th style="width: 50%;">ESO</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (count($res) > 0 ): ?>

                        <?php $i = 1; foreach ($res as $key => $value): ?>

                            <th scope="row"><?php echo $i++ ?></th>
                            <td><?php echo $value->eso_label ?></td>

                            <td>
                              <button type="button" class="edit-row-eso btn btn-info btn-xs"  data-payload='<?php echo json_encode($value, JSON_HEX_APOS|JSON_HEX_QUOT)?>'>
                                  <i class="fa fa-pencil"></i> Edit
                              </button>

                              <button type="button" class="delete-row-eso btn btn-danger btn-xs" data-id="<?php echo $value->id; ?>">
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

      <?php endif; ?>

      <!-- ########################### BATCHCODE ################################### -->

      <?php if($this->uri->segment(3) === 'batchcode') : ?>

      <div class="col-lg-12">
        <!-- <section class="panel"> -->

          <div class="col-lg-4" style="padding-left: 0px; padding-right: 0px;">
            <section class="panel">
              <header class="panel-heading">
                <b>ADD BATCHCODE</b>
                <?php if ($flash_msg = $this->session->flash_msg): ?>
                  <br><sub style="color: <?php echo $flash_msg['color'] ?>"><?php echo $flash_msg['message'] ?></sub>
                <?php endif; ?>
              </header>
              <div class="panel-body">
                <form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url('cms/admin/add_batchcode/') ?>">

                  <div class="form-group">
                    <label>ESO*</label>
                    <select class="form-control" name="eso_id">
                      <option value="">Select ESO</option>
                      <?php foreach (get_eso_list($this) as $value) { ?>
                        <option value="<?php echo $value->id; ?>"><?php echo $value->eso_label;?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label >Batchcode*</label>
                    <input type="text" class="form-control" name="batchcode_label" required="">
                  </div>

                  <div class="form-group">
                    <label >Expiry Date*</label>
                    <input type="date" class="form-control" name="expiry_date" required="">
                  </div>

                  <input type="submit" class="form-control btn-success" value="Save Batchcode" style="color: white;font-size: 13px;color: #ffffff!important;width: 150px;float: right;">
                </form>
              </div>
            </section>

          </div>


          <div class="col-lg-8" style="padding-right: 0px;">
            <section class="panel">
              <header class="panel-heading">
                <b>BATCHCODE LIST</b><?php if ($update_flash_msg = $this->session->update_flash_msg): ?>
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
                  <table class="table table-bordered table-striped table-condensed cf" id="dynamic-table3">
                    <thead>
                      <tr>
                        <th style="width: 10%;">#</th>
                        <th style="width: 50%;">Batchode</th>
                        <th>Expiry Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (count($res) > 0 ): ?>

                        <?php $i = 1; foreach ($res as $key => $value): ?>

                            <th scope="row"><?php echo $i++ ?></th>
                            <td><?php echo $value->batchcode_label; ?></td>
                            <td><?php echo $value->expiry_date; ?></td>
                            <td>
                              <button type="button" class="edit-row-batchcode btn btn-info btn-xs"  data-payload='<?php echo json_encode($value, JSON_HEX_APOS|JSON_HEX_QUOT)?>'>
                                  <i class="fa fa-pencil"></i> Edit
                              </button>

                              <button type="button" class="delete-row-batchcode btn btn-danger btn-xs" data-id="<?php echo $value->id; ?>">
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

      <?php endif; ?>

    </div>

    <!-- page end-->
    </section>
  </section>

  <!-- Modal -->
  <div class="modal fade modal-category" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Manage</h4>
        </div>
          <div class="modal-body">

            <form role="form" method="post" id="main-form" enctype="multipart/form-data">

              <div class="form-group">
                <label >Category Name*</label>
                <input type="text" class="form-control" name="name" placeholder="Enter category name ..." required="">
              </div>

              <div class="form-group">
                <label >Description*</label>
                <textarea class="form-control" name="description" style="height: 100px;" placeholder="Enter description ..."></textarea>
              </div>

              <div class="form-group">
                <label >Stocks *</label>
                <input type="number" class="form-control" name="stocks" placeholder="Enter stocks ..." required="required">
              </div>

              <div class="form-group">
                <label >SKU *</label>
                <input type="text" class="form-control" name="sku" placeholder="Enter SKU" required="required">
              </div>

              <div class="form-group">
                <label >Base Price *</label>
                <input type="text" class="form-control" name="base_price" placeholder="Enter base price ..." required="required">
              </div>

              <div class="form-group">
                <label >Product Video (Optional)</label><br>
                <a href="" id="product_video" target="_blank"><i class="fa fa-eye"></i> View Video</a>
                <input type="file" class="form-control" name="product_video" accept="video/mp4,video/x-m4v,video/*">
              </div>

              <div class="form-group">
                <label >Cover Photo * </label><br>
                <a href="" id="cover_photo" target="_blank"><i class="fa fa-eye"></i> View Cover Photo</a>
                <input type="file" class="form-control" name="cover_photo" required>
              </div>

              <div class="form-group">
                <label >Category Image*</label><br>
                <a href="" id="img_url" target="_blank"><i class="fa fa-eye"></i> View Category Photo</a>
                <input type="file" class="form-control" name="img_url">
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


    <!-- Modal ESO -->
  <div class="modal fade modal-eso" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Manage</h4>
        </div>
          <div class="modal-body">

            <form role="form" method="post" id="main-form2" enctype="multipart/form-data">

              <div class="form-group">
                <label >ESO Label*</label>
                <input type="text" class="form-control" name="eso_label"  required="">
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

  <!-- Modal Brand -->
  <div class="modal fade modal-batchcode" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Manage</h4>
        </div>
          <div class="modal-body">

            <form role="form" method="post" id="main-form3" enctype="multipart/form-data">

              <div class="form-group">
                <label>ESO*</label>
                <select class="form-control" name="eso_id">
                  <option value="">Select ESO</option>
                  <?php foreach (get_eso_list($this) as $value) { ?>
                    <option value="<?php echo $value->id; ?>"><?php echo $value->eso_label;?></option>
                  <?php } ?>
                </select>
              </div>

              <div class="form-group">
                <label >Batchcode*</label>
                <input type="text" class="form-control" name="batchcode_label" required="">
              </div>

              <div class="form-group">
                <label >Expiry Date*</label>
                <input type="date" class="form-control" name="expiry_date" required="">
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
      $('.edit-row-eso').on('click', function(){
        $('.modal-eso').modal()
        $('#main-form2')[0].reset() // reset the form
        const payload = $(this).data('payload')

        $('.modal-body input[name=eso_label]').removeAttr('required')
        $('.modal-body input[name=eso_label]').val(payload.eso_label)

        $('#main-form2').attr('action', base_url + 'cms/admin/update_eso/' + payload.id)
        
      })

    })

    $(document).ready(function() {
      //Updating
      $('.edit-row-batchcode').on('click', function(){
        $('.modal-batchcode').modal()
        $('#main-form3')[0].reset() // reset the form
        const payload = $(this).data('payload')

        $('.modal-body select[name=eso_id]').val(payload.eso_id)

        $('.modal-body input[name=batchcode_label]').val(payload.batchcode_label)
        $('.modal-body input[name=expiry_date]').val(payload.expiry_date)


        $('#main-form3').attr('action', base_url + 'cms/admin/update_batchcode/' + payload.id)
        
      })

    })

    //Deleting
    $('.delete-row-eso').on('click', function(){
      let p = prompt("Are you sure you want to delete this? Type DELETE to continue", "");
      if (p === 'DELETE') {
        const id = $(this).data('id')
        invokeForm(base_url + 'cms/admin/delete_eso', {id: id});
      }
    })

    $('.delete-row-batchcode').on('click', function(){
      let p = prompt("Are you sure you want to delete this? Type DELETE to continue", "");
      if (p === 'DELETE') {
        const id = $(this).data('id')
        invokeForm(base_url + 'cms/admin/delete_batchcode', {id: id});
      }
    })

  </script>

<script src="<?php echo base_url('public/admin/js/custom/') ?>generic.js"></script>
<script type="text/javascript" src="<?php echo base_url('public/admin/'); ?>assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url('public/admin/'); ?>assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url('public/admin/') ?>assets/advanced-datatable/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url('public/admin/') ?>assets/data-tables/DT_bootstrap.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#dynamic-table2').dataTable( {
      "aaSorting": [[ 0, "asc" ]]
    } );

    $('#dynamic-table3').dataTable( {
      "aaSorting": [[ 0, "asc" ]]
    } );

  });

  $('#dynamic-table2_filter').find('input').attr('placeholder','ESO');
  $('#dynamic-table2_filter').find('input').attr('style','font-size:12px;');
  
  ('#dynamic-table3_filter').find('input').attr('placeholder','Batchcode');
  $('#dynamic-table3_filter').find('input').attr('style','font-size:12px;');

</script>
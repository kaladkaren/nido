<section id="main-content">
  <section class="wrapper">
    <!-- page start-->
    <div class="row">
      <div class="col-lg-12">
        <section class="panel">

          <header class="panel-heading">
            <b>PROVINCES / AREAS</b>
            <?php if ($flash_msg = $this->session->flash_msg): ?>
              <br><sub style="color: <?php echo $flash_msg['color'] ?>"><?php echo $flash_msg['message'] ?></sub>
            <?php 
              $this->session->unset_userdata('flash_msg');
              endif; 
            ?>
          </header>

          <div class="panel-body">

            <div class="table-responsive" style="overflow: hidden; outline: none;" tabindex="1">
              <table class="table table-bordered table-striped table-condensed cf" id="dynamic-table2">
                <thead class="cf">
                  <tr>
                    <th>PROVINCES ID</th>
                    <th>PROVINCE NAME</th>
                    <th>PROVINCE CODE</th>
                    <?php if($this->session->userdata('role_id') == 1) : ?>
                      <th>ACTION</th>
                    <?php endif; ?>
                  </tr>
                </thead>
                <tbody>
                  
                  <?php if (count($res) > 0 ): ?>

                    <?php $i = 1; foreach ($res as $key => $value): ?>
                      <tr>
                        <th scope="row"><?php echo $value->id ?></th>
                        <th><?php echo $value->provDesc; ?></th>
                        <th><?php echo $value->provCode; ?></th>
                        <?php if($this->session->userdata('role_id') == 1) : ?>
                          <th>
                            <?php if($value->active == 0){?>
                              <button type="button" data-id='<?php echo $value->id; ?>'
                                class="btn btn-activate btn-success btn-xs"><i class="fa fa-check"></i> Activate</button>
                            <?php }else{ ?>
                              <button type="button" data-id='<?php echo $value->id; ?>'
                                class="btn btn-deactivate btn-danger btn-xs"><i class="fa fa-times"></i> Deactivate</button>
                              </td>
                            <?php } ?>
                          </th>
                        <?php endif; ?>
                      </tr>
                    <?php endforeach; ?>


                    <?php else: ?>
                      <tr>
                        <th scope="row"></th>
                        <td style="text-align: center;">Empty Table</td>
                        <td></td>
                      </tr>
                    <?php endif; ?>
                  </tbody>
                </table>
              </div>
            </div>

          </section>
        </div>
      </div>
    <!-- page end-->
  </section>
</section>

<script type="text/javascript">
  $('#main-form').on('submit', function (){

    let p = $('input[name=password]').val()
    let cp = $('input[id=confirm_password]').val()

    if (!(p === cp)) {
      alert('Passwords don\'t match')
      return false
    }

  });

  //Deleting
  $('.btn-deactivate').on('click', function(){

    let p = prompt("Are you sure you want to deactivate this access? Type YES to continue", "");
    if (p === 'YES') {
      const id = $(this).data('id')

      invokeForm(base_url + 'cms/admin/deactivate_province', {id: id});
    }

  })

  $('.btn-activate').on('click', function(){

    let p = prompt("Are you sure you want to activate this access? Type YES to continue", "");
    if (p === 'YES') {
      const id = $(this).data('id')

      invokeForm(base_url + 'cms/admin/activate_province', {id: id});
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
      "aaSorting": [[ 1, "asc" ]]
    } );
  });

  $('#dynamic-table2_filter').find('input').attr('placeholder','Customer Name')
  $('#dynamic-table2_filter').find('input').attr('style','font-size:12px;')
  
</script>
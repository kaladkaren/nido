<style>
@media print {
  #main-content, .print-hidden{
    display: none;
  }
}

</style>

<section id="main-content">
  <section class="wrapper">
    <!-- page start-->
    <div class="row">
      <div class="col-lg-12">

        <section class="panel">
          <header class="panel-heading">
            <b>REGISTRATION DATA</b>
            <?php if ($flash_msg = $this->session->flash_msg): ?>
              <br><sub style="color: <?php echo $flash_msg['color'] ?>"><?php echo $flash_msg['message'] ?></sub>
            <?php endif; ?>
          </header>
          <div class="panel-body">

            <div class="row">
              <div class="col-md-4" style="text-align: left; font-style: bold;">
                <p><b>Filter by Registered Date: </b></p>
              </div>

              <div class="col-md-2" style="text-align: left; font-style: bold;">
                <p><b>Filter by Area: </b></p>
              </div>

              <div class="col-md-2" style="text-align: left; font-style: bold;">
                <p><b>Filter by Ambassador: </b></p>
              </div>

            </div>

            <form action="" method="GET">
              <div class="row">
                  <div class="col-md-2">
                      <input type="date" name="from" placeholder="from" class="form-control"
                      value="<?php echo @$_GET['from'] ?>">
                  </div>
                  <div class="col-md-2">
                      <input type="date" name="to" placeholder="to" class="form-control"
                      value="<?php echo @$_GET['to'] ?>">
                  </div>

                  <div class="col-md-2">
                    <select class="form-control" name="province_id">
                      <option value="">-- SELECT PROVINCE/AREA -- </option>
                      <?php foreach (get_provinces($this) as $value) { ?>
                        <option value="<?php echo $value->id; ?>" <?=@$_GET['province_id'] == $value->id ? 'selected' : '';?> ><?php echo $value->provDesc;?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="col-md-2">
                    <select class="form-control" name="ambassador_id">
                      <option value="">-- SELECT Ambassador -- </option>
                      <?php foreach (get_users($this) as $value) { ?>
                        <option value="<?php echo $value->id; ?>" <?=@$_GET['ambassador_id'] == $value->id ? 'selected' : '';?> ><?php echo $value->fname;?> <?php echo $value->lname;?></option>
                      <?php } ?>
                    </select>
                  </div>
                  
                  <div class="col-md-4">
                      <input type="submit" value="Apply Filter" class="btn btn-info btn-sm">
                      <a href="<?php echo base_url('cms/registration') ?>">
                        <button class="btn btn-default btn-sm" type="button">Reset Filters</button>
                      </a>

                      <a href="<?php echo base_url('cms/registration/export_csv?') . $this->input->server('QUERY_STRING'); ?>" class="btn btn-sm btn-success">
                        <i class="fa fa-download"></i> Export CSV
                      </a>
                  </div>
              </div>
            </form>
            <hr>

            <!--state overview start-->
            <div class="row state-overview">
                
                <div class="col-lg-6">
                    <section class="panel">
                        <div class="symbol" style="background: #F0CB0B;">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="value">
                            <h1 class="count2">
                                <?php echo $total_registered; ?>
                            </h1><br>
                            <p>Total Registration Count</p>
                        </div>
                    </section>
                </div>

                <div class="col-lg-6">
                    <section class="panel">
                        <div class="symbol" style="background: #F0CB0B;">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="value">
                            <h1 class="count2">
                                <?php echo $total_children; ?>
                            </h1><br>
                            <p>Total Children Count</p>
                        </div>
                    </section>
                </div>

            </div>
            <!--state overview end-->

            <hr>

            <div class="table-responsive" style="overflow: hidden; outline: none;" tabindex="1">
              <table class="table table-bordered table-striped table-condensed cf" id="dynamic-table2">
                <thead class="cf">
                  <tr>
                    <th>ID</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Relationship</th>
                    <th>Contact #</th>
                    <th>Email</th>
                    <th>Birthday</th>
                    <th># of 3-5yrs old Children</th>
                    <th>Current Milk Brand</th>
                    <th>Registration Date</th>
                    <th>Area</th>
                    <th>Ambassador</th>
                    <!-- <th>Action</th> -->
                  </tr>
                </thead>
                <tbody>
                  
                  <?php if (count($res) > 0 ): ?>

                    <?php $i = 1; foreach ($res as $key => $value): ?>
                      <tr>
                        <th scope="row"><?php echo $value->id ?></th>
                        <td><?php echo $value->fname; ?></td>
                        <td><?php echo $value->lname; ?></th>
                        <td><?=$value->relationship == 1 ? 'Parent' : 'Guardian'; ?></td>
                        <td><?php echo $value->contact_num; ?></td>
                        <td><?php echo $value->email; ?></td>
                        <td><?php echo $value->birthday_f; ?></td>
                        <td><?php echo $value->number_of_children; ?></td>
                        <td><?php echo $value->current_brand_milk; ?></td>
                        <td><?php echo $value->registration_etimestamp; ?></td>
                        <td>
                          <b><?php echo $value->provDesc; ?></b><br>
                          <i><?php echo $value->city; ?></i><br>
                          <i><?php echo $value->barangay; ?></i><br>
                        </td>
                        <td><?php echo $value->ambassador_name; ?></td>
                        <!-- <td>
                            <input type="hidden" data-payload='<?php echo json_encode($value, JSON_HEX_APOS|JSON_HEX_QUOT); ?>'>

                            <button style="margin-bottom: 5px;" type="button" class="edit-row btn btn-info btn-xs"><i class="fa fa-eye"></i> View Details</button><br>

                            <button style="margin-bottom: 5px;" type="button" class="view-remarks btn btn-default btn-xs" name="button">
                              <i class="fa fa-book"></i> View Remarks
                            </button><br>

                        </td> -->
                      </tr>
                    <?php endforeach; ?>


                    <?php else: ?>
                      <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="text-align: center;">Empty Table</td>
                        <td></td>
                        <td></td>
                        <td></td>
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

  <!-- Modal -->
  <div class="modal fade view-modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Manage</h4>
        </div>
        <div class="modal-body">
          <form role="form" method="post" id="main-form">
            <div class="form-group">
              <label >Fullname</label>
              <input type="text" class="form-control" id="fullname" disabled>
            </div>

            <div class="form-group">
              <label >Email Address</label>
              <input type="text" class="form-control" id="email" disabled>
            </div>

            <div class="form-group">
              <label >Mobile Number</label>
              <input type="text" class="form-control" id="mobile_num" disabled>
            </div>

            <div class="form-group">
              <label >Address</label>
              <input type="text" class="form-control" id="address" disabled>
            </div>

            <div class="form-group" id="cart_items">
              <label ><b>Cart Items</b></label>

            </div>

            <div class="form-group">
              <label >Checkout Date</label>
              <input type="text" class="form-control" id="checkout_date_f" disabled>
            </div>

            <div class="form-group">
              <label >Total Price</label>
              <input type="number" class="form-control" id="total_amount" disabled>
            </div>
              
            <div class="modal-footer">
              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
              <!-- <input class="btn btn-info" type="submit" value="Save changes"> -->
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- modal -->

  <!-- Modal -->
  <div class="modal fade waybill-modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Manage</h4>
        </div>
        <div class="modal-body">
          <form role="form" method="post" id="main-form3">
            <div class="form-group">
              <label >Fullname</label>
              <input type="text" class="form-control" id="fullname" disabled>
            </div>

            <div class="form-group">
              <label >Address</label>
              <input type="text" class="form-control" id="address" disabled>
            </div>

            <div class="form-group" id="cart_items3">
              <label ><b>Cart Items</b></label>
            </div>

            <div class="form-group">
              <label >Total Price</label>
              <input type="number" class="form-control" id="total_amount" disabled>
            </div>
              
            <div class="modal-footer print-hidden">
              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
              <a href="javascript:window.print()">
                  <button class="btn btn-primary" type="button"><i class="fa fa-print"></i> Print Waybill</button>
              </a>

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- modal -->

  <!-- Modal -->
  <div class="modal fade remarks-modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Manage</h4>
        </div>
        <div class="modal-body">
            <div class="form-group" id="remarks_append">
              <label ><b>Remarks</b></label>
              <!-- <textarea class="form-control appended-remarks" id="cart_remarks" disabled></textarea> -->
            </div>
              
            <div class="modal-footer">
              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
            </div>
        </div>
      </div>
    </div>
  </div>
  <!-- modal -->

  <script type="text/javascript">
    $(document).ready(function() {
        //Updating
        $('.edit-row').on('click', function(){
          $('.view-modal').modal()
          $('.append-items').remove();
          $('#main-form')[0].reset() // reset the form
          const payload = $(this).siblings('input[type=hidden]').data('payload')


          $('input#fullname').val(payload.user.fname + ' ' + payload.user.lname)
          $('input#email').val(payload.user.email)
          $('input#mobile_num').val(payload.user.mnum)
          $('input#address').val(payload.shipping_address.address_line1 + ' ' + payload.shipping_address.city + ' ' + payload.shipping_address.region + ' ' + payload.shipping_address.zip_code)
          $('input#total_amount').val(payload.total_amount)
          $('input#checkout_date_f').val(payload.checkout_date_f)

          $.each(payload.cart_items , function(index, value) {
              let addon = `<div class="append-items" style="margin-top: -20px;">
                            <div class="col-md-4">
                              <label><b>Item Name</b></label>
                            </div>
                            <div class="col-md-4">
                              <label><b>Quantity</b></label>
                            </div>
                            <div class="col-md-4">
                              <label><b>Base Price</b></label>
                            </div>

                            <div class="col-md-4">
                              <input type="text" class="form-control" id="addon" value="${value.product.product_name}" readonly>
                            </div>
                            <div class="col-md-4">
                              <input type="text" class="form-control" id="addon-quantity" value="${value.quantity}" readonly>
                            </div>
                            
                            <div class="col-md-4">
                              <input type="text" class="form-control" id="addon-base_price" value="${value.base_price}" readonly>
                            </div>
                            <hr><br><br>
                          </div>`
              $('#cart_items').append(addon)
          });

          $('.view-modal').modal()
        })

        $('.print-waybill').on('click', function(){
          $('.waybill-modal').modal()
          $('.append-items').remove();
          $('#main-form3')[0].reset() // reset the form
          const payload = $(this).siblings('input[type=hidden]').data('payload')

          $('input#fullname').val(payload.user.fname + ' ' + payload.user.lname)
          $('input#address').val(payload.shipping_address.address_line1 + ' ' + payload.shipping_address.cirty + ' ' + payload.shipping_address.region + ' ' + payload.shipping_address.zip_code)
          $('input#total_amount').val(payload.total_amount)
          $('textarea#notes').val(payload.notes)

          $('select[name=status] option').each(function() {
            $(this).removeAttr('selected')
          });
          $('select[name=status] option').filter(function () { return $(this).val() == payload.status; }).attr('selected', 'selected')

          $.each(payload.cart_items , function(index, value) {
              let addon = `<div class="append-items" style="margin-top: -20px;">
                            <div class="col-md-4">
                              <label><b>Item Name</b></label>
                            </div>
                            <div class="col-md-4">
                              <label><b>Quantity</b></label>
                            </div>
                            <div class="col-md-4">
                              <label><b>Base Price</b></label>
                            </div>

                            <div class="col-md-4">
                              <input type="text" class="form-control" id="addon" value="${value.product.product_name}" readonly>
                            </div>
                            <div class="col-md-4">
                              <input type="text" class="form-control" id="addon-quantity" value="${value.quantity}" readonly>
                            </div>
                            
                            <div class="col-md-4">
                              <input type="text" class="form-control" id="addon-base_price" value="${value.base_price}" readonly>
                            </div>
                            <hr><br><br>
                          </div>`
              $('#cart_items3').append(addon)
          });
          
          $('.waybill-modal').modal()
        })

        $('.view-remarks').on('click', function(){
          $('.remarks-modal').modal()
          $('.appended-remarks').remove()
          const payload = $(this).siblings('input[type=hidden]').data('payload')

          $.each(payload.cart_remarks , function(index, value) { 
            let remarks = `
                            <textarea style="margin-bottom: 10px;" class="form-control appended-remarks" id="cart_remarks" disabled> ${value}</textarea>
                          `
            $('#remarks_append').append(remarks)
          })
          
        })

        //Deleting
        $('.btn-delete').on('click', function(){

          let p = prompt("Are you sure you want to delete this? Type DELETE to continue", "");
          if (p === 'DELETE') {
            const id = $(this).data('id')
            console.log(id);

            invokeForm(base_url + 'cms/products/delete', {id: id});
          }

        })

      })

    $('.modal').on('hidden.bs.modal', function () {
      $('#main-form1')[0].reset() // reset the form
      $('#main-form2')[0].reset() // reset the form

      $('select[name=status] option:selected').removeAttr('selected');

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
        "aaSorting": [[ 0, "desc" ]]
      } );
    });

    $('#dynamic-table2_filter').find('input').attr('placeholder','Customer Name')
    $('#dynamic-table2_filter').find('input').attr('style','font-size:12px;')
    
  </script>


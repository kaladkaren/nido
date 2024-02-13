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
            <b>DASHBOARD</b>
            <?php if ($flash_msg = $this->session->flash_msg): ?>
              <br><sub style="color: <?php echo $flash_msg['color'] ?>"><?php echo $flash_msg['message'] ?></sub>
            <?php endif; ?>
          </header>
          <div class="panel-body">

            <div class="row">
              <div class="col-md-4" style="text-align: left; font-style: bold; font-size: 20px;">
                <p><b>Welcome Back! </b> <b><em><?php echo $this->session->userdata('fname'); ?></em></b></p>
              </div>
            </div>
            <hr>

            <!--state overview start-->
            <div class="row state-overview">
                
                <div class="col-lg-6 col-sm-6">
                    <section class="panel">
                        <div class="symbol" style="background: lightgreen;">
                            <i class="fa fa-money"></i>
                        </div>
                        <div class="value">
                            <h1 class="count2">
                                <?php echo $total_registered; ?>
                            </h1><br>
                            <p>Total Registration Count</p>
                        </div>
                    </section>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <section class="panel">
                        <div class="symbol yellow">
                            <i class="fa fa-tags"></i>
                        </div>
                        <div class="value">
                            <h1 class="count3">
                                <?php echo $ambassador_count; ?>
                            </h1><br>
                            <p>Number of Active Ambassador</p>
                        </div>
                    </section>
                </div>
                

            </div>
            <!--state overview end-->

            <hr>

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
        "aaSorting": [[ 2, "desc" ]]
      } );
    });

    $('#dynamic-table2_filter').find('input').attr('placeholder','Customer Name')
    $('#dynamic-table2_filter').find('input').attr('style','font-size:12px;')
    
  </script>


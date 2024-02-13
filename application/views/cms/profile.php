<section id="main-content">
  <section class="wrapper">
    <!-- page start-->
    <div class="row">
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading">
            <b>PROFILE</b>
            <?php if ($flash_msg = $this->session->flash_msg): ?>
              <br><sub style="color: <?php echo $flash_msg['color'] ?>"><?php echo $flash_msg['message'] ?></sub>
            <?php endif; ?>
          </header>
          
          <div class="panel-body">
            <form method="POST" action="<?php echo base_url('cms/admin/update/') . $this->session->userdata('id'); ?>" enctype="multipart/form-data" id="main-form">
              <div class="form-group">
              	<div class="row">

              		<div class="col-md-6">
              			<label>First Name:</label>
	                  	<input type="text" class="form-control" name="fname" required="required" value="<?php echo $user_details->fname; ?>">
              		</div>
                  	
                  	<div class="col-md-6">
						          <label>Last Name:</label>
	                  	<input type="text" class="form-control" name="lname" required="required" value="<?php echo $user_details->lname; ?>">
                  	</div>

                </div>
              </div>

              <div class="form-group">
              	<div class="row">
              		<div class="col-md-12">
	          			<label>Email Address:</label>
	                  	<input type="text" class="form-control" name="email" required="required" value="<?php echo $user_details->email; ?>">
	                </div>
                </div>
              </div>


              <div class="form-group">
              	<div class="row">
              		<div class="col-md-12">
	          			<label>Password:</label>
	                  	<input type="password" class="form-control" name="password" required="required" placeholder="Type password">
	                </div>
                </div>
              </div>

              <div class="form-group">
              	<div class="row">
              		<div class="col-md-12">
	          			<label>Confirm Password:</label>
	                  	<input type="password" class="form-control" id="confirm_password" required="required" placeholder="Type match password">
	                </div>
                </div>
              </div>


              <div class="form-group">
              	<div class="row">
              		<div class="col-md-6">
	                  <input type="submit" class="btn btn-success btn-block" value="Update Profile">
	                </div>
	            </div>
              </div>

            </form>
          </div>

          <hr>

          <header class="panel-heading">
            <b>LIST OF YOUR REGISTRATION DATA</b>
            <?php if ($flash_msg = $this->session->flash_msg): ?>
              <br><sub style="color: <?php echo $flash_msg['color'] ?>"><?php echo $flash_msg['message'] ?></sub>
            <?php endif; ?>
          </header>

          <div class="panel-body">

            <!--state overview start-->
            <div class="row state-overview">
                
                <div class="col-lg-12">
                    <section class="panel">
                        <div class="symbol" style="background: #FF6C60;">
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

            </div>
            <!--state overview end-->

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
                    <th>Ambassador</th>
                    <!-- <th>Action</th> -->
                  </tr>
                </thead>
                <tbody>
                  
                  <?php if (count($res) > 0 ): ?>

                    <?php $i = 1; foreach ($res as $key => $value): ?>
                      <tr>
                        <th scope="row"><?php echo $value->id ?></th>
                        <th><?php echo $value->fname; ?></th>
                        <td><?php echo $value->lname; ?></th>
                        <td><?=$value->relationship == 1 ? 'Parent' : 'Guardian'; ?></td>
                        <td><?php echo $value->contact_num; ?></td>
                        <td><?php echo $value->email; ?></td>
                        <td><?php echo $value->birthday; ?></td>
                        <td><?php echo $value->number_of_children; ?></td>
                        <td><?php echo $value->current_brand_milk; ?></td>
                        <td><?php echo $value->registration_etimestamp; ?></td>
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

<script type="text/javascript">
  $('#main-form').on('submit', function (){

    let p = $('input[name=password]').val()
    let cp = $('input[id=confirm_password]').val()

    if (!(p === cp)) {
      alert('Passwords don\'t match')
      return false
    }

  })
</script>

<script src="<?php echo base_url('public/admin/js/custom/') ?>generic.js"></script>

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
  });

  $('#dynamic-table2_filter').find('input').attr('placeholder','Customer Name')
  $('#dynamic-table2_filter').find('input').attr('style','font-size:12px;')
  
</script>
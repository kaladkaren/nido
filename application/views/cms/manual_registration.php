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
            <form method="POST" action="<?php echo base_url('cms/admin/update'); ?>" enctype="multipart/form-data">
              <div class="form-group">
              	<div class="row">

              		<div class="col-md-6">
              			<label>First Name:</label>
	                  	<input type="text" class="form-control" name="title" required="required" value="<?php echo $user_details->fname; ?>">
              		</div>
                  	
                  	<div class="col-md-6">
						<label>Last Name:</label>
	                  	<input type="text" class="form-control" name="title" required="required" value="<?php echo $user_details->lname; ?>">
                  	</div>

                </div>
              </div>

              <div class="form-group">
              	<div class="row">
              		<div class="col-md-12">
	          			<label>Email Address:</label>
	                  	<input type="text" class="form-control" name="title" required="required" value="<?php echo $user_details->email; ?>">
	                </div>
                </div>
              </div>


              <div class="form-group">
              	<div class="row">
              		<div class="col-md-12">
	          			<label>Password:</label>
	                  	<input type="text" class="form-control" name="password" required="required" placeholder="Type password">
	                </div>
                </div>
              </div>

              <div class="form-group">
              	<div class="row">
              		<div class="col-md-12">
	          			<label>Confirm Password:</label>
	                  	<input type="text" class="form-control" name="confirm_password" required="required" placeholder="Type match password">
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

          </section>
        </div>
      </div>
      <!-- page end-->
    </section>
  </section>

  <!-- Modal -->
  <div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Manage</h4>
        </div>
        <div class="modal-body">

          <form role="form" method="post" id="main-form" enctype="multipart/form-data">
            
              <div class="form-group">
                  <label>Title/Heading*</label>
                  <input type="text" class="form-control" name="title" required="required" placeholder="Enter campaign/events/announcement name or heading">
              </div>

              <div class="form-group">
                  <label>Message*</label>
                  <textarea class="form-control" name="content" style="height: 150px;" placeholder="Enter short details here ..." required></textarea>
              </div>

              <div class="form-group">
                  <label >Cover Photo *</label>
                  <input type="file" class="form-control" name="cover_photo">
              </div>

              <div class="form-group">
                  <label>Type*</label>
                  <select name="type" class="form-control" required>
                    <option value="">Select</option>
                    <option value="Static">Static</option>
                    <option value="Dynamic">Dynamic</option>
                  </select>
              </div>

              <div class="form-group">
                  <label >Start Date *</label>
                  <input type="datetime-local" class="form-control" name="start_date" required>
              </div>

              <div class="form-group">
                  <label >End Date *</label>
                  <input type="datetime-local" class="form-control" name="end_date" required>
              </div>
              
              <div class="form-group">
                  <label >Send Push Notif? *</label><br>
                  <input type="checkbox" name="send_notif"> Check if you want to send push notification to every users.
              </div>

        </div>
          <div class="modal-footer">
            <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
            <input class="btn btn-info" type="submit" value="Save changes">
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- modal -->

  <script>
    $(document).ready(function() {
      //Updating
      $('.edit-row').on('click', function(){
        $('.modal').modal()
        $('#main-form')[0].reset() // reset the form
        const payload = $(this).data('payload')

        $('input[name=title]').removeAttr('required')
        $('textarea[name=content]').removeAttr('required')
        $('input[name=cover_photo]').removeAttr('required')
        $('input[name=start_date]').removeAttr('required')
        $('input[name=end_date]').removeAttr('required')

        $('input[name=title]').val(payload.title)
        $('textarea[name=content]').val(payload.content)
        // $('input[name=cover_photo]').val(payload.cover_photo)
        $('input[name=start_date]').val(payload.start_date_special)
        $('input[name=end_date]').val(payload.end_date_special)

        $('select[name=type] option').each(function() {
            $(this).removeAttr('selected')
          });
        $('select[name=type] option').filter(function () { return $(this).val() == payload.type; }).attr('selected', 'selected')

        $('#main-form').attr('action', base_url + 'cms/events/update/' + payload.id)
        
      })

      $('.modal').on('hidden.bs.modal', function () {
        $('select[name=type] option:selected').removeAttr('selected');
      })

      //Deleting
      $('.btn-delete').on('click', function(){

        let p = prompt("Are you sure you want to delete this? Type DELETE to continue", "");
        if (p === 'DELETE') {
          const id = $(this).data('id')

          invokeForm(base_url + 'cms/events/delete', {id: id});
        }

      })

    })
  </script>
  <script src="<?php echo base_url('public/admin/js/custom/') ?>generic.js"></script>

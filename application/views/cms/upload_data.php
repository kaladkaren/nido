<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <!-- page start-->

    <div class="row">
      <form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url('cms/registration/add_bulk_import')?>">
        <div class="col-lg-12">
          <section class="panel">
            <header class="panel-heading">
              <b>Bulk Import: Upload Registration</b><br>
              <sub><strong>Please download CSV Template guide for uploading multiple registration.</strong></sub>
              <?php if ($flash_msg = $this->session->flash_msg): ?>
                <br><sub style="color: <?php echo $flash_msg['color'] ?>"><?php echo $flash_msg['message'] ?></sub>
              <?php endif; ?>
            </header>
            <div class="row">
              <div class="col-md-12">
                <section class="panel">
                  <div class="panel-body">
                    <div class="form-group">
                        <div class="row">
                          <div class="col-md-3">
                            <a href="<?php echo base_url('uploads/templates/bulk_import.csv') ?>">
                              <button type="button" class="btn btn-sm btn-info">Download CSV template</button><br> <br>
                            </a>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-2">
                            <input type="file" accept=".csv" class="form-control" name="bulk_import" style="width: 500px;" required="required"> <br>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-3">
                            <input type="submit"  class="btn btn-success" value="Submit">
                          </div>
                        </div>
                      </div>
                  </div>
                </section>
              </div>
            </div>
          </section>
        </div>
      </form>
    </div>
  
  <!-- page end-->
</section>
</section>
<!--main content end-->

</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('form').on('submit', function(){
      if (confirm('Are you sure you want to submit?')) {
        return true;
      } else {
        return false;
      }
    })
  });
</script>
<script src="<?php echo base_url('public/admin/js/custom/') ?>generic.js"></script>

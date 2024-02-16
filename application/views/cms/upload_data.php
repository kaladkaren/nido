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
              <?php 
                $this->session->unset_userdata('flash_msg');
                endif; 
              ?>
            </header>

            <div class="row">
            <div class="col-md-12">
              <section class="panel">
                <div class="panel-body">


                  <div class="col-md-12">

                    <label style="color: red;"><strong>NOTE: Please make sure to enter the following format for specific columns to avoid errors upon uploading.</strong></label>

                    <div class="form-group">
                        <div class="row">

                          <div class="col-md-6">
                            <table class="table table-striped">
                              <thead>
                                <tr>
                                  <th>COLUMN NAME</th>
                                </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                    <td>Birthday</td>
                                  </tr>
                                  <tr>
                                    <td>Children Ages</td>
                                  </tr>
                                  <tr>
                                    <td><br>Relationship </td>
                                  </tr>
                                  <tr>
                                    <td><br>Area ID </td>
                                  </tr>
                              </tbody>
                            </table>
                            <br>
                          </div>

                          <div class="col-md-6">
                            <table class="table table-striped">
                              <thead>
                                <tr>
                                  <th>CORRECT FORMAT</th>
                                </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                    <td>YYYY-MM-DD : 1998-01-31</td>
                                  </tr>
                                  <tr>
                                    <td>3,5 <strong> (comma separated per child age)</strong></td>
                                  </tr>
                                  <tr>
                                    <td>1 = Parent <br> 2 = Guardian</strong></td>
                                  </tr>

                                  <tr>
                                    <td>
                                      Please refer to this <a href="<?php echo base_url('cms/admin/areas') ?>"><span style="color: blue; text-decoration: underline;">province list ID</span> </a>.</strong>
                                      <br>
                                      EX: <i><b>21</b></i> = Rizal Province
                                    </td>
                                  </tr>

                              </tbody>
                            </table>
                            <br>
                          </div>


                          <div class="col-md-12">
                            <h4>Sample CSV Inputs</h4>
                            <table class="table table-striped" style="text-align: center;">
                              <thead>
                                <tr>
                                  <th>firstname</th>
                                  <th>lastname</th>
                                  <th>contact #</th>
                                  <th>email</th>
                                  <th>birthday</th>
                                  <th>relationship</th>
                                  <th>relationship label</th>
                                  <th>number of 3-5 yrs old children</th>
                                  <th>childrens ages</th>
                                  <th>current brand of milk</th>
                                  <th>registration date</th>
                                  <th>area ID</th>
                                  <th>city</th>
                                  <th>barangay</th>

                                </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                    <td>Juan</td>
                                    <td>Dela Cruz</td>
                                    <td>9065847856</td>
                                    <td>delacruz@gmail.com</td>
                                    <td>1998-01-31</td>
                                    <td>1</td>
                                    <td>Mother</td>
                                    <td>2</td>
                                    <td>5, 4</td>
                                    <td>Bonakid</td>
                                    <td>2024-02-01</td>
                                    <td>21</td>
                                    <td>Taytay</td>
                                    <td>San Juan</td>

                                  </tr>
                                  
                              </tbody>
                            </table>
                            <br>
                          </div>


                        </div>
                        
                    </div>
                  </div>

                </div>
              </section>
            </div>
          </div>


            <div class="row">
              <div class="col-md-12">
                <section class="panel">
                  <div class="panel-body">
                    <div class="form-group">
                        <div class="row">
                          <div class="col-md-3">
                            <label>Download CSV file first.</label>
                            <a href="<?php echo base_url('uploads/templates/batch_upload_nido_format.csv') ?>">
                              <button type="button" class="btn btn-sm btn-info">Download CSV template</button><br> <br>
                            </a>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-4">
                            <label>Then upload here. Accept <b>.csv</b> file only.</label>
                            <input type="file" accept=".csv" class="form-control" name="batch_upload_nido_format" style="width: 500px;" required="required"> <br>
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

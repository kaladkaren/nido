<section id="main-content">
  <section class="wrapper">
    <!-- page start-->
    <div class="row">
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading">
            <strong>USERS LIST</strong>
            <?php if ($flash_msg = $this->session->flash_msg): ?>
              <br><sub style="color: <?php echo $flash_msg['color'] ?>"><?php echo $flash_msg['message'] ?></sub>
            <?php endif; ?>
          </header>
          <div class="panel-body">
            <p>
              <button type="button" class="add-btn btn btn-success btn-md"><strong>+ ADD NEW USER</strong></button>
            </p>
            <div class="table-responsive" style="overflow: hidden; outline: none;" tabindex="1">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (count($res) > 0 ): ?>

                    <?php $i = 1; foreach ($res as $key => $value): ?>
                      <?php 
                        $row_bg = '';
                        if($value->active == 0){
                          $row_bg = '#E8E8E8';
                        }
                      ?>
                      <tr style="background: <?php echo $row_bg;?>;">
                        <th scope="row"><?php echo $i++ ?></th>
                        <td><?php echo $value->fname ?> <?php echo $value->lname ?></td>
                        <td><?php echo $value->email ?></td>
                        <td><?php echo $value->role_name; ?></td>
                        <td>
                          <?php if($value->active == 1) : ?>
                            <button type="button" class="btn btn-primary btn-sm">Active</button>
                          <?php else: ?>
                            <button type="button" class="btn btn-default btn-sm">Inactive</button>
                          <?php endif; ?>
                        </td>
                        <td>
                          <button type="button"
                          data-payload='<?php echo json_encode(['id' => $value->id, 'email' => $value->email, 'fname' => $value->fname, 'lname' => $value->lname, 'role_id' => $value->role_id])?>'
                          class="edit-row btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit</button>

                          <?php if($value->active == 0){?>
                            <button type="button" data-id='<?php echo $value->id; ?>'
                              class="btn btn-activate btn-success btn-xs"><i class="fa fa-check"></i> Activate</button>
                          <?php }else{ ?>
                            <button type="button" data-id='<?php echo $value->id; ?>'
                              class="btn btn-deactivate btn-danger btn-xs"><i class="fa fa-times"></i> Deactivate</button>
                            </td>
                          <?php } ?>


                        </tr>
                      <?php endforeach; ?>


                    <?php else: ?>
                      <tr>
                        <td colspan="4" style="text-align:center">Empty table data</td>
                      </tr>
                    <?php endif; ?>
                  </tbody>
                </table>

                <style>
                .active_lg {
                  background: lightgray !important
                }
                </style>
                <ul class="pagination">
                    <?php
                    $page = ($this->input->get('page')) ?: 1;

                    # squery block
                    $squery =  '';
                    if ($this->input->get('squery')) {
                      $squery = "&squery=" . $this->input->get('squery');
                    }
                    # / squery block

                    for ($i=1; $i <= $total_pages; $i++) { ?>
                      <li><a
                        class="<?php echo ($i == $page) ? 'active_lg' : '' ?>"
                        href="<?php echo base_url('cms')
                        . "?page=" . $i . $squery;
                        ?>"><?php echo $i ?></a></li>
                      <?php } ?>
                </ul>
                
              </div>
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

          <form role="form" method="post" id="main-form">
            <div class="form-group">
              <label >First Name</label>
              <input type="text" class="form-control" name="fname" placeholder="First name">
            </div>

            <div class="form-group">
              <label >Name</label>
              <input type="text" class="form-control" name="lname" placeholder="Last name">
            </div>
            <div class="form-group">
              <label>Role</label>
              <select class="form-control" name="role">
                <option value="">Select a Role</option>
                <?php foreach (get_roles($this) as $value) { ?>
                  <option value="<?php echo $value->id;?>"><?php echo $value->role;?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label >Email address</label>
              <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="form-group">
              <label >Password</label>
              <input type="password" class="form-control" name="password" placeholder="New Password">
            </div>
            <div class="form-group">
              <label>Confirm Password</label>
              <input type="password" class="form-control" id="confirm_password" placeholder="Confirm New Password">
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

  <script src="<?php echo base_url('public/admin/js/custom/') ?>admin_management.js"></script>
  <script src="<?php echo base_url('public/admin/js/custom/') ?>generic.js"></script>

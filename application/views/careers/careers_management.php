            <div class="content-wrapper">
                <section class="content">
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-1">
                            <div class="box">
                                <div class="box-header">
                                    <h1 class="box-title" style="font-weight: 300; line-height: 1.1;">Careers Management</h1>
                                    <input type="button" id="button1" data-toggle="modal" data-target="#addJob" class="btn btn-success btn-md pull-right" value="Add Job">
                                </div>
                                <div class="box-body">
                                    <div class="table-responsive">
                                        <table id="table" class="table table-hover" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Title</th>
                                                    <th>Description</th>
                                                    <th>Image</th>
                                                    <th>Status</th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Add Modal -->
            <div class="modal fade" id="addJob" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title caps"><strong>Add Job</strong></h4>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-danger" id="addError" style="display: none;">
                              <?php echo $this->session->flashdata('addform_error'); echo $this->session->flashdata('addupload_error'); ?>
                          </div>
                          <form method="post" enctype="multipart/form-data" action="<?= site_url('hr/careers/add')?>">
                            <div class="form-horizontal">
                                <div class="form-group row">
                                    <label for="normal-field" class="col-lg-4 form-control-label" style="text-align: right">Job Title</label>
                                    <div class="col-lg-7">
                                        <input type="text" class="form-control" name="jobTitle" placeholder="e.g Software Developer" required="required" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="normal-field" class="col-lg-4 form-control-label" style="text-align: right">Description</label>
                                    <div class="col-lg-7">
                                       <!--  <textarea class="form-control" name="jobDesc" required="required" rows="5"></textarea> -->
                                       <textarea class="textarea" name="jobDesc" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                   </div>
                               </div>
                               <div class="form-group row">
                                <label for="normal-field" class="col-lg-4 form-control-label" style="text-align: right">Image</label>
                                <div class="col-lg-7">
                                    <input type="file" class="form-control" name="jobImage" required="required" />
                                </div>
                            </div>  
                        </div>         
                    </div>
                    <div class="modal-footer">
                      <button type="button" data-dismiss="modal" class="btn btn-danger btn-rounded" style="float: left" >Cancel</button>
                      <input type="submit" value="Add" class="btn btn-success btn-rounded" style="float: right" />  
                  </div>
              </form>
          </div>
      </div>
  </div>


  <!-- Edit Modal -->
  <div class="modal fade" id="editJob" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title caps"><strong>Edit Job</strong></h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" id="editError" style="display: none;">
                  <?php echo $this->session->flashdata('editform_error'); echo $this->session->flashdata('editupload_error'); ?>
              </div>
              <form method="post" enctype="multipart/form-data" action="<?= site_url('hr/careers/updateJob')?>">
                <div class="form-horizontal">
                    <div class="form-group row" runat="server">
                        <label for="normal-field" class="col-lg-4 form-control-label" style="text-align: right">Job Title</label>
                        <div class="col-lg-7">
                            <input type="text" class="form-control" name="jobTitle" id="jobTitle" placeholder="e.g Software Developer" required="required" />
                        </div>
                    </div>

                    <div class="form-group row" runat="server">
                        <label for="normal-field" class="col-lg-4 form-control-label" style="text-align: right">Description</label>
                        <div class="col-lg-7">
                            <textarea class="textarea" name="jobDesc" id="jobDesc" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                       </div>
                   </div>
                   <div class="form-group row" runat="server">
                    <label for="normal-field" class="col-lg-4 form-control-label" style="text-align: right">Image</label>
                    <div class="col-lg-7">
                        <img name="image" id="image" width="100" />
                        <input type="hidden" name="jobImagePath" id="jobImagePath" />
                        <input type="file" class="form-control" name="jobImage" id="jobImage" />
                    </div>
                </div>
                <div class="form-group row" runat="server">
                    <label for="normal-field" class="col-lg-4 form-control-label" style="text-align: right">Status</label>
                    <div class="col-lg-7">
                        <input type="text" class="form-control" name="status" id="status" required="required" readonly />
                    </div>
                </div>
                <input type="hidden" name="job_id" id="job_id" />
            </div> 
        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-danger btn-rounded" style="float: left" >Cancel</button>
            <input type="submit" name="insert" id="insert" value="Update" class="btn btn-success btn-rounded" style="float: right" />  
        </div>
    </form>
</div>
</div>
</div>
            <div class="content-wrapper">
                <section class="content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Careers Management</h3>
                                    <input type="button" id="button1" class="btn btn-success btn-md pull-right" value="Add Job">
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
                            <h4 class="modal-title caps"><strong>Edit Job</strong></h4>
                        </div>
                        <div class="modal-body">
                            <form method="post" enctype="multipart/form-data" action="<?= site_url('hr/careers/add')?>">
                                <div class="form-horizontal">
                                    <div class="form-group row" runat="server">
                                        <label for="normal-field" class="col-lg-4 form-control-label" style="text-align: right">Job Title</label>
                                        <div class="col-lg-7">
                                            <input type="text" class="form-control" name="jobTitle" placeholder="e.g Software Developer" required="required" />
                                        </div>
                                    </div>

                                    <div class="form-group row" runat="server">
                                        <label for="normal-field" class="col-lg-4 form-control-label" style="text-align: right">Description</label>
                                        <div class="col-lg-7">
                                            <textarea  class="form-control" name="jobDesc" required="required" rows="5"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row" runat="server">
                                        <label for="normal-field" class="col-lg-4 form-control-label" style="text-align: right">Image</label>
                                        <div class="col-lg-7">
                                            <input type="file" class="form-control" name="jobImage" required="required" />
                                        </div>
                                    </div>
                                    <button class="btn btn-success btn-rounded pull-xs-right" >Add</button>
                                    <button type="button" data-dismiss="modal" class="btn btn-danger btn-rounded pull-right" >Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Edit Modal -->
            <div class="modal fade" id="editJob" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title caps"><strong>Add Job</strong></h4>
                        </div>
                        <div class="modal-body">
                            <form method="post" enctype="multipart/form-data" action="<?= site_url('hr/careers/add')?>">
                                <div class="form-horizontal">
                                    <div class="form-group row" runat="server">
                                        <label for="normal-field" class="col-lg-4 form-control-label" style="text-align: right">Job Title</label>
                                        <div class="col-lg-7">
                                            <input type="text" class="form-control" name="jobTitle" placeholder="e.g Software Developer" required="required" />
                                        </div>
                                    </div>

                                    <div class="form-group row" runat="server">
                                        <label for="normal-field" class="col-lg-4 form-control-label" style="text-align: right">Description</label>
                                        <div class="col-lg-7">
                                            <textarea  class="form-control" name="jobDesc" required="required" rows="5"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row" runat="server">
                                        <label for="normal-field" class="col-lg-4 form-control-label" style="text-align: right">Image</label>
                                        <div class="col-lg-7">
                                            <input type="file" class="form-control" name="jobImage" required="required" />
                                        </div>
                                    </div>
                                    <button class="btn btn-success btn-rounded pull-xs-right" >Add</button>
                                    <button type="button" data-dismiss="modal" class="btn btn-danger btn-rounded pull-right" >Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

<!--         <script>
            $("#table").on("click", "tbody td", function () {
                var db = table.row(this).data();

                window.location = "<?= base_url() ?>AppView/index/" + db[0];

            });
        </script>  -->
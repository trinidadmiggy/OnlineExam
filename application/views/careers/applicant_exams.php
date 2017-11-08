            <div class="content-wrapper">
                <section class="content">
                    <div class="row">
                        <div class="col-lg-6 col-lg-offset-3">

                            <div class="box">
                                <div class="box-header">
                                    <h1 class="box-title" style="font-weight: 500; line-height: 1.1;">Applicant Examination</h1>
                                </div>
                                <div class="box-body">
                                    <div class="table-responsive">

                                        <table id="app_exams" class="table table-hover" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Applicant</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php foreach($exams as $exam) {?>
                                                <tr>
                                                    <td>
                                                        <button type='button' id="<?= $exam['app_id']?>" class='btn btn-sm btn-primary app_details' title='Applicant Details'><i class='fa fa-info'></i></button>
                                                    </td>
                                                    <td><?= $exam['fullname']; ?></td>
                                                    <td>
                                                        <?php if($exam['exam_status']) { ?>
                                                        <button type='button' id="<?= $exam['app_id']?>" class='btn btn-sm btn-secondary view-exam' title='Print/Save Exam'><i class='fa fa-print'></i></button>
                                                        <?php } else { ?>
                                                        <button type='button' id="$exam['app_id']?>" class='btn btn-sm btn-danger view-exam' title='Applicant has not yet taken the examination or has not yet finished with the examination' disabled><i class='fa fa-exclamation-triangle' ></i></button>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>


            <div class="modal fade" id="applicantDetails" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="padding: 10px; padding-bottom: 0">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title caps"><strong><input type="text" class="form-control" name="name" id="name" style="width: 200px; border:transparent; background:transparent; padding: 0" disabled /></strong></h4>
                        </div>
                        <div class="modal-body">
                            <form method="post" enctype="multipart/form-data" action="<?= site_url('hr/careers/add')?>">
                                <div class="form-horizontal">
                                    <div class="form-group row">
                                        <label for="normal-field" class="col-lg-4 form-control-label" style="text-align: right">Birthdate</label>
                                        <div class="col-lg-7">
                                            <input type="text" class="form-control" name="birthdate" id="birthdate" disabled />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="normal-field" class="col-lg-4 form-control-label" style="text-align: right">Address</label>
                                        <div class="col-lg-7">
                                            <input type="text" class="form-control" name="address" id="address" disabled/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="normal-field" class="col-lg-4 form-control-label" style="text-align: right">Contact #</label>
                                        <div class="col-lg-7">
                                            <input type="text" class="form-control" name="contact" id="contact" disabled/>
                                        </div>
                                    </div>  
                                    <div class="form-group row">
                                        <label for="normal-field" class="col-lg-4 form-control-label" style="text-align: right">Email</label>
                                        <div class="col-lg-7">
                                            <input type="text" class="form-control" name="email" id="email" disabled/>
                                        </div>
                                    </div>  
                                </div>         
                            </div>
                        </form>
                    </div>
                </div>
            </div>
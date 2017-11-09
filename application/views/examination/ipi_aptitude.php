<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1 class="text-center">
			Questronix Online Examination
		</h1>
	</section>

	
	<section class="content">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<div class="box-exam">
					<div class="progress" style="margin:0;">
						<div class="progress-bar progress-bar-warning" style="width: 14.286%">
							Verbal Meaning
						</div>
						<div class="progress-bar progress-bar-warning" style="width: 14.286%">
							Reasoning
						</div>
						<div class="progress-bar progress-bar-warning" style="width: 14.286%">
							Letter Series
						</div>
						<div class="progress-bar progress-bar-warning" style="width: 14.286%">
							Number Ability
						</div>
						<div class="prog progress-bar progress-bar-primary" style="width: 0%">
							IPI Aptitude
						</div>
					</div>
					<div class="box-header with-border" >
						<h3 style="margin:0">IPI Aptitude</h3>
					</div>	
					<div class="box-body">
						<div class="container-fluid">
							<div class="col-lg-12">
								<div class="row">
									<form method="POST" action="<?= site_url('hr/check_answer/technical')?>">
										<input type="hidden" name="examtype_id" value="5" />
										<?php $no=1; foreach($result as $r) { ?>
										<div class="questions col-lg-6 col-md-6 col-sm-6">
											<br/>
											<label>
												<?php echo $no++?>) <?php echo $r['question']; ?>
											</label>
											<br />
											<div class="radio">
												<ol type="1">
													<div class="col-lg-6 col-md-6">
														<li>
															<label>
																<input type="radio" class="minimal" name="q_<?php echo $r['question_id'];?>" id="" value="<?php echo $r['option1'];?>">
																<?php echo $r['option1'];?>
															</label>
														</li>
														<li>
															<label>
																<input type="radio" class="minimal" name="q_<?php echo $r['question_id'];?>" id="" value="<?php echo $r['option2'];?>">
																<?php echo $r['option2'];?>
															</label>
														</li>	
													</div>
													<div class="col-lg-6 col-md-6">
														<li>
															<label>
																<input type="radio" class="minimal" name="q_<?php echo $r['question_id'];?>" id="" value="<?php echo $r['option3'];?>">
																<?php echo $r['option3'];?>
															</label>
														</li>
														<li>
															<label>
																<input type="radio" class="minimal" name="q_<?php echo $r['question_id'];?>" id="" value="<?php echo $r['option4'];?>">
																<?php echo $r['option4'];?>
															</label>
														</li>
													</div>
												</ol>
											</div>
										</div>
										<?php } ?>
										<input type="submit" class="btn btn-primary pull-right" onClick="return confirm('Are you sure you want to submit this examination? Once submitted, you cannot go back to this exam.')" value="Submit" />
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="box-footer box-comments">
						<div class="box-comment">
							<div class="license-text" style="margin:0; font-size: 18px !important;">
								Copyright: Unknown
							</div>
						</div>
					</div>	
				</div>
			</div>
			<div class="col-lg-2 hidetime">
				<div class="direct-chat-text pull-left follow-scroll" style="margin: 0;">
					<span class="info-box-number" id="time"></span>
				</div>
				<input type="hidden" id="timeValue" value="10"/>
			</div>
		</div>
	</section>
</div>

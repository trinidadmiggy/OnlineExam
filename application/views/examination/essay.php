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
					<div class="progress" style="margin:0">
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
						<div class="progress-bar progress-bar-warning" style="width: 14.286%">
							Manchester Personality Questionnaire
						</div>
						<div class="progress-bar progress-bar-warning" style="width: 14.285%">
							Personal Working/Management style
						</div>
						<div class="prog progress-bar progress-bar-primary" style="width: 0%">
							Essay
						</div>
					</div>
					<div class="box-header with-border">
						<h2 style="margin:0">Essay</h2>
					</div>
					<div class="box-body">
						<form method="post"  action="<?= site_url('hr/check_answer/essay')?>">
							<input type="hidden" name="examtype_id" value="7" />
							<?php $essay = array(); ?>
							<?php $no = 1; foreach($result as $r) { ?>
							<div class="form-group">
								<label>
									<?php echo $no++;?>) <?php echo $r['question']; ?>
								</label>
								<textarea class="form-control" name="essay_<?php echo $r['question_id'];?>" maxlength="1000" rows="5" placeholder="Answer here..." style="resize: none;" ></textarea>
							</div>
							<?php if($r['question_id'] == 263) { break;} } ?>
							<input type="submit" class="btn btn-primary pull-right" onClick="return confirm('Are you sure you want to submit this examination? Once submitted, you cannot go back to this exam.')" value="Submit" />
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-2">
				<div class="direct-chat-text pull-left follow-scroll" style="margin: 0;">
					<span class="info-box-number" id="time"></span>
				</div>
				<input type="hidden" id="timeValue" value="15"/>
			</div>
		</div>
	</section>
</div>

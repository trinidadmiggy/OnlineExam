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
						<a href="reasoning">2</a>
						<a href="letterseries">3</a>
						<a href="numberability">4</a>
						<a href="ipiaptitude">5</a>
						<a href="manchester">6</a>
						<a href="essay">7</a>
						<form method="post"  action="<?= site_url('hr/check_answer/technical')?>">
							<input type="hidden" name="examtype_id" value="7" />
							<?php $essay = array(); ?>
							<?php $no = 1; foreach($result as $r) { ?>
							<div class="form-group">
								<label>
									<?php echo $no++;?>) <?php echo $r['question']; ?>
								</label>
								<textarea class="form-control" name="essay_<?php echo $r['question_id'];?>" rows="5" placeholder="Enter ..."></textarea>
							</div>
							<?php } ?>
							<input type="submit" class="btn btn-primary pull-right" value="Submit" />
						</form>
					</div>
					<div class="box-footer box-comments">
						<div class="box-comment">
							<div class="sra">
								<span class="license-border">S</span>
								<span class="license-border">R</span>
								<span class="license-border">A</span>
							</div>
							<div class="license-text" style="border-left:2px solid black;height:32px">
								PRINTED UNDER LICENSE OF SCIENCE RESEARCH ASSOCIATES INC. COPYRIGHT 1964, SCIENCE RESEARCH INC. 259 EAST ERIE, CHICAGO ILLINOIS 60611. ALL RIGHTS RESERVED. Printed in the Philippines.
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

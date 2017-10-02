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
						<div class="prog progress-bar progress-bar-primary" style="width: 0%">
							IPI Aptitude
						</div>
					</div>
					<div class="box-header with-border">
						<h2 style="margin:0">IPI Aptitude</h2>
					</div>
					<div class="box-body">
						<a href="reasoning">2</a>
						<a href="letterseries">3</a>
						<a href="numberability">4</a>
						<a href="ipiaptitude">5</a>
						<a href="manchester">6</a>
						<a href="essay">7</a>
						<div class="container-fluid">
							<div class="col-lg-12">
								<div class="row">
									<form method="POST" action="#">
										<?php foreach($result as $r) { ?>
										<div class="questions col-lg-6">
											<br/>
											<label>
												<?php echo $r['question_id'];?>) <?php echo $r['question']; ?>
											</label>
											<br />
											<div class="radio">
												<ol type="1">
													<div class="col-lg-6">
														<li>
															<label>
																<input type="radio" class="minimal" name="verbal_q<?php echo $r['question_id'];?>" id="" value="<?php echo $r['option1'];?>" required>
																<?php echo $r['option1'];?>
															</label>
														</li>
														<li>
															<label>
																<input type="radio" class="minimal" name="verbal_q<?php echo $r['question_id'];?>" id="" value="<?php echo $r['option2'];?>" required>
																<?php echo $r['option2'];?>
															</label>
														</li>	
													</div>
													<div class="col-lg-6">
														<li>
															<label>
																<input type="radio" class="minimal" name="verbal_q<?php echo $r['question_id'];?>" id="" value="<?php echo $r['option3'];?>" required>
																<?php echo $r['option3'];?>
															</label>
														</li>
														<li>
															<label>
																<input type="radio" class="minimal" name="verbal_q<?php echo $r['question_id'];?>" id="" value="<?php echo $r['option4'];?>" required>
																<?php echo $r['option4'];?>
															</label>
														</li>
													</div>
												</ol>
											</div>
										</div>
										<?php } ?>
										<input type="submit" class="btn btn-primary pull-right" value="Submit" />
									</form>
								</div>
							</div>
						</div>
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

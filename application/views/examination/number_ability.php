<div class="content-wrapper">
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
							Number Ability
						</div>
					</div>
					<div class="box-header with-border">
						<h2 style="margin:0">Number Ability</h2>
						<h5 title="Click here for example">
							<a data-toggle="modal" data-target="#exampleModal" style="text-decoration: none; color:black; cursor:pointer;">
								<u><b>Instructions.</b></u> This test meausres your ability to make rapid numerical and estimates.
							</a>
						</h5>
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
								<div class="row" >
									<form method="post" action="<?= site_url('hr/check_answer/technical')?>" >
										<input type="hidden" name="examtype_id" value="4" />
										<?php foreach($result as $r) { ?>
										<div class="questions col-lg-6" >
											<br/>
											<label style="margin: -6px;">
												<?php echo $r['question_id'];?>) <?php echo $r['question']; ?>
											</label>
											<br />
											<div class="radio">
												<ol type="1">
													<div class="col-lg-6">
														<li>
															<label>
																<input type="radio" class="minimal" name="q_<?php echo $r['question_id'];?>" id="" value="<?php echo $r['option1'];?>" required checked>
																<?php echo $r['option1'];?>
															</label>
														</li>
														<li>
															<label>
																<input type="radio" class="minimal" name="q_<?php echo $r['question_id'];?>" id="" value="<?php echo $r['option2'];?>" required>
																<?php echo $r['option2'];?>
															</label>
														</li>
													</div>
													<div class="col-lg-6">
														<li>
															<label>
																<input type="radio" class="minimal" name="q_<?php echo $r['question_id'];?>" id="" value="<?php echo $r['option3'];?>" required>
																<?php echo $r['option3'];?>
															</label>
														</li>	
														<li>
															<label>
																<input type="radio" class="minimal" name="q_<?php echo $r['question_id'];?>" id="" value="<?php echo $r['option4'];?>" required>
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
			<div class="col-lg-2">
				<div class="direct-chat-text pull-left follow-scroll" style="margin: 0;">
					<span class="info-box-number" id="time"></span>
				</div>
				<input type="hidden" id="timeValue" value="6"/>
			</div>
		</div>
	</section>
</div>

<!-- Instruction Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<button type="button" class="close" data-dismiss="modal"><i class="icon-xs-o-md"></i></button>
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title caps"><strong>For example:</strong></h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<div class="input-group col-lg-12">
						<div class="col-lg-6 text-center">
							<br />
							S1. 35 + 16 
						</div>
						<div class="col-lg-3">
							<br />
							A. 41<br />
							B. 45<br />
							C. 50<br />
							D. 51<br />
						</div>
						<div class="col-lg-3" style="margin-left: -80px">
							<div class="text-center">
								Answer Sheet<br />
								<div class="example-border">1</div><br />
								<div class="example-border">2</div><br />
								<div class="example-border">3</div><br />
								<div class="example-border">X</div><br />
							</div>
						</div>
					</div>
				</div>
				<hr/>
				<div class="form-group">
					<div class="input-group col-lg-12">
						<div class="col-lg-6 text-center">
							<br />
							S2. ${{(123 \div 13)} + 18}$ (approximate)
						</div>
						<div class="col-lg-3">
							<br />
							A. 15<br />
							B. 27<br />
							C. 30<br />
							D. 33<br />
						</div>
						<div class="col-lg-3" style="margin-left: -80px">
							<div class="text-center">
								Answer Sheet<br />
								<div class="example-border">1</div><br />
								<div class="example-border">2</div><br />
								<div class="example-border">3</div><br />
								<div class="example-border">X</div><br />
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<p>
						&emsp;The correct answer to Sample 1 is "D," or 51, and an X has been marked in that box on the answer sheet. Sample 2 calls for an approximate answer. From among thos listed, the alternative that is <b>closes estimate</b> to the correct answer is "C," or 30. This alternative has been marked on the answer sheet.
					</p>
					<p>
						&emsp;Remember, you are to calculate or estimate the correct answers to the problems <b>mentally</b>. The time limit is very short, so you should not waste time working out the answers with a pencil. <b>Make no marks in the test booklet.</b>
					</p>
					<p>
						Are there any questions?
					</p>
					<p>
						&emsp;When you are given the signal to begin, turn the page and begin work. THere are three pages of problems in this part. You will be given <b>six</b> minutes to complete this part of the test. If you finish before time is called, go back and check your answers on this <b>section only.</b>
					</p>
					<h4>DO NOT TURN THIS PAGE UNTIL TO DO SO.</h4>
				</div>
			</div>
		</div>
	</div>
</div>
</div>



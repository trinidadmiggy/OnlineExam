<div class="content-wrapper">
	<section class="content-header">
		<h1 class="text-center">
			Questronix Online Examination
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-2">

			</div>
			<div class="col-lg-8">
				<div class="box-exam">
					<div class="progress" style="margin:0;">
						<div class="prog progress-bar progress-bar-warning" style="width: 14.286%">
							Verbal Meaning
						</div>
					</div>
					<div class="box-header with-border" >
						<h3 style="margin:0">Verbal Meaning</h3>
						<h5 style="margin:0" >
							<a data-toggle="modal" data-target="#exampleModal" title="Click for Example" style="text-decoration: none; color:black; cursor:pointer;">
								Instructions: Each item in this part of the test presents a word, followed by five alternatives. You are to choose from the five words the one that means the same or most nearly the same as the word at the beginning. Mark your answer by putting an X in the box on the answer sheet containing the number of the alternative you have chosen.	
							</a>
						</h5>
					</div>	
					<div class="box-body">
						<div class="container-fluid">
							<div class="col-lg-12">
								<div class="row">
									<form method="POST" action="<?= site_url('hr/check_answer/technical')?>">
										<input type="hidden" name="examtype_id" value="1" />
										<?php foreach($result as $r) { ?>
										<div class="questions col-lg-6 col-md-6 col-sm-6" style="padding: 0px">
											<br/>
											<label>
												<?php echo $r['question_id'];?>) <?php echo $r['question']; ?>
											</label>
											<br />
											<div class="radio">
												<ol type="1">
													<div class="exam-font col-lg-6 col-md-6">
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
														<li>
															<label>
																<input type="radio" class="minimal" name="q_<?php echo $r['question_id'];?>" id="" value="<?php echo $r['option3'];?>">
																<?php echo $r['option3'];?>
															</label>
														</li>	
													</div>
													<div class="exam-font exam col-lg-6 col-md-6">
														<li>
															<label>
																<input type="radio" class="minimal" name="q_<?php echo $r['question_id'];?>" id="" value="<?php echo $r['option4'];?>">
																<?php echo $r['option4'];?>
															</label>
														</li>
														<li>
															<label>
																<input type="radio" class="minimal" name="q_<?php echo $r['question_id'];?>" id="" value="<?php echo $r['option5'];?>">
																<?php echo $r['option5'];?>
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
			<div class="col-lg-2 hidetime">
				<a data-toggle="modal" data-target="#exampleModal" title="Click for Example" style="text-decoration: none; color:black; cursor:pointer;">
					<div class="direct-chat-msg">
						<div class="direct-chat-text pull-left animated tada" style="margin: 0;">
							<b>Example Here</b>
						</div>
					</div>
				</a>
				<div class="direct-chat-text pull-left follow-scroll" style="margin: 0; ">
					<span class="info-box-number" id="time"></span>
				</div>
				<input type="hidden" id="timeValue" value="8"/>
			</div>
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
								<p>S1. RECIPIENT 1. Donor 2. Owner 3. Performer 4. Receiver 5. Borrower</p>
								<div class="pull-right">
									Answer Sheet<br />
									<div class="example-border">1</div>
									<div class="example-border">2</div>
									<div class="example-border">3</div>
									<div class="example-border">X</div>
									<div class="example-border">5</div>
								</div>
							</div>
							<div class="form-group">
								<p>
									The word recipient means the same as <b>receiver</b>, and an X has been marked in the box on the sample answer sheet for its number – 4.
								</p>
								<p>
									You will be given eight minutes to complete this part of the test. If you are not certain of an answer, mark the answer you think might be correct and go on the next item. Work as rapidly as accurately as you can. If you finish before time is called, go back over the questions in this section. <b>Do not go on to another section</b>. There are two pages of questions in this section. Are there any questions?
								</p>
								<h4>DO NOT TURN THIS PAGE UNTIL TOLD TO DO SO.</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

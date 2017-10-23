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
						<div class="prog progress-bar progress-bar-primary" style="width: 0%">
							Reasoning
						</div>
					</div>
					<div class="box-header with-border">
						<h3 style="margin:0">Reasoning</h3>
						<h5 title="Click here for example">
							<a data-toggle="modal" data-target="#exampleModal" style="text-decoration: none; color:black;cursor:pointer;">
								<u><b>Instructions.</b></u> This is a test of your ability to reason and to express problems in a simple form using conventional mathematical symbols. The items in the test require you to read a problem and formulate an answer for it. Look at the answer choices and mark an X in the box on the answer sheet containing the number of answer you have chosen.
							</a>
						</h5>
					</div>
					<div class="box-body">
						<div class="container-fluid">
							<div class="col-lg-12">
								<div class="row">
									<form method="post" action="<?= site_url('hr/check_answer/technical')?>"  >
										<input type="hidden" name="examtype_id" value="2" />
										<?php foreach($result as $r) { ?>
										<br />
										<label>
											<?php echo $r['question_id'];?>. <?php echo $r['question']; ?>
										</label>
										<br/>
										<div class="multiplechoice radio">
											<ol type="1" > 
												<li>
													<label>
														<input type="radio" class="minimal" name="q_<?php echo $r['question_id'];?>" id="" value="<?php echo $r['option1'];?>" checked required>
														<?php echo $r['option1'];?>
													</label>
												</li>
												<li>
													<label>
														<input type="radio" class="minimal" name="q_<?php echo $r['question_id'];?>" id="" value="<?php echo $r['option2'];?>" required>
														<?php echo $r['option2'];?>
													</label>
												</li>
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
												<li>
													<label>
														<input type="radio" class="minimal" name="q_<?php echo $r['question_id'];?>" id="" value="<?php echo $r['option5'];?>" required>
														<?php echo $r['option5'];?>
													</label>
												</li>
											</ol>
										</div>
										<?php } ?>
										<input type="submit" class="btn btn-primary pull-right"  value="Submit" />
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
				<input type="hidden" id="timeValue" value="20"/>
			</div>
		</div>
	</section>
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
						<div class="input-group" style="padding: 0;">
							<div class="col-lg-6">
								<br />
								S1. An office manager ordered a conference table which cost S dollars, a dozen chairs which costs P dollars each, and three book shelves which costs Y dollars apiece. The total cost of the order in dollars is
							</div>
							<div class="col-lg-2"></div>
							<div class="col-lg-6">
								<div class="col-lg-4" style="padding: 0;">
									<br />
									1. S + P + Y
									<br />
									2. SP + 3Y
									<br />
									3. S + 12P + 3Y
									<br />
									4. ${S + {P + Y\over 4}}$
									<br />
									5. S + P + 3Y
								</div>
								<div class="col-lg-5" style="padding: 0;">
									<div class="text-center">
										Answer Sheet<br />
										<div class="example-border">1</div><br/>
										<div class="example-border">2</div><br/>
										<div class="example-border">3</div><br/>
										<div class="example-border">X</div><br/>
										<div class="example-border">5</div><br/>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						The correct solution to the sample problem is "S + 12 P + 3Y" and the number before that answer is 3. The box on the answer sheet con-
						taining the 3 has been marked with an X. Are there any questions?
						<br/>
						<br/>
						You will be given twenty minutes to work on this part. If you are not certain of an aswer, mark the answer you think might be correct and go on the next item. Work as rapidly and as accurately as you can. If you finish before the time is called, go back over the questions <b>in this section only. Do not go on to another section or back to a  previous one.</b>
						<h4>DO NOT TURN THIS PAGE UNTIL TO DO SO.</h4>
					</div>
				</div>
				<div class="modal-footer">
					Items in this section used by permission of John C. Flanagan. ©1957, <br/>
					John C. Flanagan
				</div>
			</div>
		</div>
	</div>
</div>



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
						<div class="prog progress-bar progress-bar-primary" style="width: 0%">
							Letter Series
						</div>
					</div>
					<div class="box-header with-border">
						<h2 style="margin:0">Letter Series</h2>
						<h5 title="Click here for example">
							<a data-toggle="modal" data-target="#exampleModal" style="text-decoration: none; color:black; cursor:pointer;">
								<u><b>Instructions.</b></u> In this part each problem presents a series of letters arranged according to a pattern. You are to find the pattern in the series and decide which of the five letters given on the right-hand side of the page should come next. See which column this letter is in and mark the box with that number on the answer sheet.
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
								<div class="row">
									<form method="post" action="<?= site_url('hr/check_answer/technical')?>">
										<input type="hidden" name="examtype_id" value="3" />
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
																<input type="radio" class="minimal" name="q_<?php echo $r['question_id'];?>" id="" value="<?php echo $r['option1'];?>">
																<?php echo $r['option1'];?>
															</label>
														</li>
														<li>
															<label>
																<input type="radio" class="minimal" name="q_<?php echo $r['question_id'];?>" id="" value="<?php echo $r['option2'];?>" >
																<?php echo $r['option2'];?>
															</label>
														</li>
														<li>
															<label>
																<input type="radio" class="minimal" name="q_<?php echo $r['question_id'];?>" id="" value="<?php echo $r['option3'];?>" >
																<?php echo $r['option3'];?>
															</label>
														</li>	
													</div>
													<div class="col-lg-6">
														<li>
															<label>
																<input type="radio" class="minimal" name="q_<?php echo $r['question_id'];?>" id="" value="<?php echo $r['option4'];?>" >
																<?php echo $r['option4'];?>
															</label>
														</li>
														<li>
															<label>
																<input type="radio" class="minimal" name="q_<?php echo $r['question_id'];?>" id="" value="<?php echo $r['option5'];?>" >
																<?php echo $r['option5'];?>
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
				<input type="hidden" id="timeValue" value="10"/>
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
						<div class="col-lg-4">
							S1. c  f  i  l  o  r __ 
						</div>
						<div class="col-lg-4">
							1  2  3  4  5
							<br/>
							s  t  u  v  w
						</div>
						<div class="col-lg-4" >
							<div class="text-center">
								Answer Sheet<br />
								<div class="example-border">1</div>
								<div class="example-border">2</div>
								<div class="example-border">X</div>
								<div class="example-border">4</div>
								<div class="example-border">5</div>
							</div>
						</div>
						The letters progress by three: the next letter should be "u", and this is in column 3. The 3-box has been marked on the answer sheet. Now look at this one:
					</div>
				</div>
				<div class="form-group">
					<div class="input-group col-lg-12">
						<div class="col-lg-4">
							S2. b  a  k  r  m  v  m  v  k  r  __
						</div>
						<div class="col-lg-4">
							1  2  3  4  5 
							<br />
							a  b  k  l  m
						</div>
						<div class="col-lg-4" >
							<div class="text-center">
								Answer Sheet<br />
								<div class="example-border">1</div>
								<div class="example-border">X</div>
								<div class="example-border">3</div>
								<div class="example-border">4</div>
								<div class="example-border">5</div>
							</div>
						</div>
						<br/>
						<br/>
						<br/>
						<p>
							The alternate letters in the first part of the series (b, k, m) repeat themselves in reverse in the lat part of the series(m, k, -). Therefore, the next letter should be "b", which is in column 2 of the suggested alternative letters. The 2-box has been marked on the answer sheet.
						</p>
						<p>Are there any questions?</p>
						<p>Work quickly but try not to make mistakes. Do not spend too much time on a problem that gives you trouble, but mark what you think is the best answer and go on to the next problem. The score on this test depends on the <b>speed</b> and <b>accuracy</b>. You will be given <b>ten</b> minutes to work on this part of the test. If you finish before the time is called, go back and check your answers on <b>this part only.</b>
						</p>
						
						<h4>DO NOT TURN THIS PAGE UNTIL TO DO SO.</h4>					
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>


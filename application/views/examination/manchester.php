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
						<div class="prog5 progress-bar progress-bar-primary" style="width: 0%">
							Manchester Personality Questionnaire
						</div>
					</div>
					<div class="box-header with-border">
						<h2 style="margin:0">Manchester Personality</h2>
					</div>
					<div class="box-body">

						<a href="reasoning">2</a>
						<a href="letterseries">3</a>
						<a href="numberability">4</a>
						<a href="ipiaptitude">5</a>
						<a href="manchester">6</a>
						<a href="essay">7</a>
						<form id="personalityTest" name="personalityTest" method="post" >
							<table id="example" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th style="display: none;"></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($result as $r) { ?>
									<?php $q_arr = array($r['option1'],$r['option2'],$r['option3'],$r['option4'],$r['option5']); ?>
									<tr>
										<td>
											<div class="form-group">
												<label>
													<?php echo $r['question_id'];?>. <?php echo $r['question']; ?>
												</label>
												<br/>
												<div class="multiplechoice radio">
													<ol type="1">
														<li>
															<label>
																<input type="radio" name="verbal_q5" id="" value="1">
																<?=$q_arr[0]?>
															</label>
														</li>
														<li>
															<label>
																<input type="radio" name="verbal_q5" id="" value="2">
																<?=$q_arr[1]?>
															</label>
														</li>
														<li>
															<label>
																<input type="radio" name="verbal_q5" id="" value="3">
																<?=$q_arr[2]?>
															</label>
														</li>
														<li>
															<label>
																<input type="radio" name="verbal_q5" id="" value="4">
																<?=$q_arr[3]?>
															</label>
														</li>
														<li>

															<label>
																<input type="radio" name="verbal_q5" id="" value="5">
																<?=$q_arr[4]?>
															</label>
														</li>
													</ol>
												</div>
											</div>
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
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
''
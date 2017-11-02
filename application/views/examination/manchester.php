<style>
ul li {
	padding-bottom: 15px;
}
</style>
<div class="content-wrapper">
	<section class="content-header">
		<h1 class="text-center">
			Questronix Online Examination
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-10 col-lg-offset-1">
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
							IPI Aptitude
						</div>
						<div class="prog progress-bar progress-bar-primary" style="width: 0%">
							Manchester Personality Questionnaire
						</div>
					</div>
					<div class="box-header with-border">
						<h2 style="margin:0">Manchester Personality</h2>
						<h5 style="margin:0" >
							<a data-toggle="modal" data-target="#exampleModal" title="Click for Example" style="text-decoration: none; color:black; cursor:pointer;">
								Instructions: This questionnaire contains statement about how you act, think or feel in different situations. Please indicate the extend to which each statement applies to you using the rating scale below.
								<h4>Rating Scale</h4>
								<table class="table table-bordered">
									<thead style="display: none;">
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
									</thead>
									<tbody>
										<tr>
											<td>
												A <br/>
												Never
											</td>
											<td>
												B <br/>
												Occasionally
											</td>
											<td>
												C <br/>
												Fairly Often
											</td>
											<td>
												D <br />
												Generally <br />
											</td>
											<td>
												E <br />
												Always
											</td>
										</tr>
									</tbody>
								</table>
							</a>
						</h5>
					</div>
					<div class="box-body">
						<div class="container-fluid">
							<div class="col-lg-12">
								<div class="row">
									<form method="POST" action="<?= site_url('hr/check_answer/manchester')?>">
										<?php $q_no = 1; foreach($result as $r) {  ?>
										<div class="questions col-lg-6" style="margin-bottom: 10px;">
											<br/>
											<label class="exam-font-label">
												<?php echo $q_no;?>) <?php echo $r['question']; ?>
											</label>
											<br />
											<div class="radio">
												<ol type="a">
													<div class="col-lg-6">
														<li>
															<label>
																<input type="radio" class="minimal" name="manchester_q<?php echo $q_no;?>" id="" value="A" required>
																<?php echo $r['option1'];?>
															</label>
														</li>
														<li>
															<label>
																<input type="radio" class="minimal" name="manchester_q<?php echo $q_no;?>" id="" value="B" required>
																<?php echo $r['option2'];?>
															</label>
														</li>
														<li>
															<label>
																<input type="radio" class="minimal" name="manchester_q<?php echo $q_no;?>" id="" value="C" required>
																<?php echo $r['option3'];?>
															</label>
														</li>	
													</div>
													<div class="col-lg-6 exam">
														<li>
															<label>
																<input type="radio" class="minimal" name="manchester_q<?php echo $q_no;?>" id="" value="D" required>
																<?php echo $r['option4'];?>
															</label>
														</li>
														<li>
															<label>
																<input type="radio" class="minimal" name="manchester_q<?php echo $q_no;?>" id="" value="E" required>
																<?php echo $r['option5'];?>
															</label>
														</li>
													</div>
												</ol>
											</div>
										</div>
										<?php $q_no++; } ?>
										<input type="submit" class="btn btn-primary pull-right" value="Submit" />
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="box-footer box-comments">
						<div class="box-comment">
							<div class="license-text" style="margin: 0 !important;">
								<strong>Copyright 1993 A.P Cameron.</strong>
								<br />
								All rights reserved. No part of this questionnaire may be reproduced, stored in a retrival system or transmitted in any form or by any means electronic, mechanical, photocopying, recording or otherwise, without the prior written consent of the author and publisher.
								<br />
								<br />
								Published and distributed by The Test Agency Limited, Cray House, Henley-on-Thames, Oxon RG94AE. Tel 01 491 413 413
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-1">
				<a data-toggle="modal" data-target="#exampleModal" title="Click for Example" style="text-decoration: none; color:black; cursor:pointer;">
					<div class="direct-chat-msg">
						<div class="direct-chat-text pull-left animated tada" style="margin: 0;">
							<b>Example Here</b>
						</div>
					</div>
				</a>
				<div class="direct-chat-text pull-left follow-scroll" style="margin: -6px;">
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
					<p><b>1</b> &emsp; I like to take decisions quickly</p>
					<p><b>2</b> &emsp; I mix easily in social situations</p>
					<p><b>3</b> &emsp; I tend to challenge establised thinking</p>
				</div>
				<div class="form-group">
					<p>
						Please tackle the questionnaire in the following way.
					</p>
					<p>
						<ul>
							<li>Consider each statement quickly and select the rating which describes the way you act, feel or think.</li>
							<li>Using the Answer Sheet provided, tick (<b><span>&#10003;</span></b>) the square which corresponds to the rating you have chosen.</li>
							<li>Please make sure that you complete all items</li>
							<li>If you wish to change one of your answers, erase it and mark a different square</li>
							<li>Try to avoid using the middle rating - <i>Fairly Often</i></li>
							<li>Please respond honestly. There is a little point trying to create a favourable impression as this can be detected</li>
						</ul>
					</p>
					<h5>Please turn over and begin/.</h5>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

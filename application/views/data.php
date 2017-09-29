							<?php foreach($questions as $r){ ?>
							<label>
								<?php echo $r->question_id ?> ) <?php $r->question ?>
							</label>
							<br/>
							<div class="multiplechoice radio">
								<ol type="1">
									<li>
										<label>
											<input type="radio" name="verbal_q5" id="" value="1">
											<?php echo $r->option1?>
										</label>
									</li>
									<li>
										<label>
											<input type="radio" name="verbal_q5" id="" value="2">
											<?php echo $r->option2?>
										</label>
									</li>
									<li>
										<label>
											<input type="radio" name="verbal_q5" id="" value="3">
											<?php echo $r->option3?>
										</label>
									</li>
									<li>
										<label>
											<input type="radio" name="verbal_q5" id="" value="4">
											<?php echo $r->option4?>
										</label>
									</li>
									<li>
										<label>
											<input type="radio" name="verbal_q5" id="" value="5">
											<?php echo $r->option5?>
										</label>
									</li>
								</ol>
							</div>
							<?php } ?>
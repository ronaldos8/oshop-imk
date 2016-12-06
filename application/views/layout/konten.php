				<!-- content here -->
					<?php
						if (is_array($isi)) {
							foreach ($isi as $value) {
								$this->load->view($value);
							}
						}else $this->load->view($isi);
					?>
				</div>
			</div>
		</div>
	</section>
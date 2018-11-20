

				</div>
			</div>
		</div>
	</div>
	<script src="<?=base_url()?>assets/website/js/jquery.min.js"></script>
	<script src="<?=base_url()?>assets/website/js/custom.js"></script>
	
	<?php if ($this->session->userdata('is_logged_in')):?>
	   <script src="<?=base_url()?>assets/website/js/bootstrap.js"></script>
    	<script src="<?=base_url()?>assets/website/js/ng/angular.min.js"></script>
    	<script src="<?=base_url()?>assets/website/js/ng/angular-ui-router.min.js"></script>
    	<script src="<?=base_url()?>assets/website/js/ng/angular-aria.min.js"></script>
    	<script src="<?=base_url()?>assets/website/js/ng/angular-cookies.min.js"></script>
    	<script src="<?=base_url()?>assets/website/js/ng/angular-loader.min.js"></script>
    	<script src="<?=base_url()?>assets/website/js/ng/angular-resource.min.js"></script>
    	<script src="<?=base_url()?>assets/website/js/ng/dirPagination.js"></script>
    	<script src="<?=base_url()?>assets/website/js/ng/ui-bootstrap-tpls.js"></script>
    	<script src="<?=base_url()?>assets/website/editor/summernote.min.js"></script>
    	<script src="<?=base_url()?>assets/website/js/ng/angular-summernote.min.js"></script>
    	<script src="<?=base_url()?>assets/website/js/jquery.form.js"></script>
    	<script src="<?=base_url("assets/website/datepicker/bootstrap-datetimepicker.min.js")?>"></script>
    	<script src="<?=site_url('template/app_main')?>"></script>
	<?php endif;?>
    </body>
</html>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title" id="LoginAdsLabel"><?=__d('ad_grid', 'Report Ad')?></h4>
</div>
<div id="reportSuccess" class="alert alert-success" style="display:none"><?=__d('ad_grid', 'Your report is received, thanks for your contribution.')?></div>
<div id="reportFail" class="alert alert-danger" style="display:none"><?=__d('ad_grid', 'We could not receive your report, please try again later.')?></div>
<?=$this->UserForm->create(false, array('id' => 'reportForm'))?>
<div class="modal-body">
	<div class="row">
		<div class="col-md-12">
			<fieldset class="form-group">
				<div class="input-group">
					<label class="input-group-addon"><?=__d('ad_grid', 'Reason')?></label>
					<?=$this->UserForm->input('type', array('class' => 'form-control', 'options' => $this->Utility->enum('ItemReport', 'type')))?>
				</div>
			</fieldset>
			<fieldset class="form-group">
				<?=$this->UserForm->input('reason', array('type' => 'textarea', 'class' => 'form-control', 'placeholder' => 'Please choose reason for reporting this item and type comment why do you report it.'))?>
			</fieldset>
		</div>
	</div>
</div>

<div class="modal-footer">
	<div class="text-xs-right" style="padding: 10px;">
		<button id="reportButton" class="btn btn-danger"><?=__d('ad_grid', 'Report Ad')?></button>
	</div>
</div>
<?=$this->UserForm->end()?>
<script>
	$('#reportForm').submit(function(event) {
		event.preventDefault();
		var dataStr = $(this).serialize();
		$.ajax({
			type: "POST",
			data: dataStr,
			url: '<?=Router::url(array('action' => 'report', $adId))?>',
			success: function(msg) {
				$('#reportForm').hide();
				$('#reportTitle').hide();
				$('#reportSuccess').show();
			},
			error: function(msg) {
				$('#reportForm').hide();
				$('#reportTitle').hide();
				$('#reportFail').show();
			}
		});
	});
</script>


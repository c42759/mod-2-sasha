<!-- Modal -->
<div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add Entry</h4>
			</div>
			<div class="modal-body">
				<form id="entry-form" name="add-entry" action="" method="post">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="inputProject">Project</label>
								<input name="project" type="text" class="form-control" id="inputProject" placeholder="Input the project name">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="InputName">Name</label>
								<input name="name" type="text" class="form-control" id="InputName" placeholder="Device's identity" required>
							</div>
						</div>
					</div>
					<div class="sm-spacer30"></div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="inputIp">IP</label>
								<input name="ip" type="text" class="form-control" id="inputIp" placeholder="Device's Local IP" required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="inputSystem">System</label>
								<input name="system" type="text" class="form-control" id="inputSystem" placeholder="What's the device's system?" required>
							</div>
						</div>
					</div>
				</form>
				<div class="sm-spacer30"></div>
				<div class="row">
					<div class="col-sm-12 sm-tacenter">
						<div id="returnResult"></div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button id="submit-entry" type="submit" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>

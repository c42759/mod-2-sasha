
<div class="row">
	<div class="col-md-12">
		<h3 class="sm-tacenter">Sasha</h3>
		<hr>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>#</th>
					<th>Project</th>
					<th>Name</th>
					<th>IP</th>
					<th>IP 2</th>
					<th>System</th>
					<th>Date</th>
					<th class="sm-taright">
						<button type="button" class="btn btn-add" data-toggle="modal" data-target="#add-modal">
							<i class="fa fa-plus" aria-hidden="true"></i>
							<span class="sm-block15 xs-block15"></span>
							Add
						</button>
					</th>
				</tr>
			</thead>
			<tbody>
				{c2r-list}
			</tbody>
		</table>
	</div>
</div>
<div id="modal">
{c2r-add-modal}
{c2r-edit-modal}
</div>
<script src="{c2r-module-path}/site-assets/js/ping.js" charset="utf-8"></script>
<script src="{c2r-module-path}/site-assets/js/script.js" charset="utf-8"></script>
<script type="text/javascript">
path_mdl = '{c2r-path-bo}/{c2r-lg}/2-sasha';

	$('body').on(
		'click',
		'#ip',
		function () {
			event.preventDefault();
			console.log('click!');

			var button = $(this);
			var ip = $(button).data('ip');

			$.when($(button).addClass('grey white-text disabled')).done(function () {
				ping('http://' + ip + '/').then(function(delta) {
					$(button).removeClass('btn-edit grey white-text').addClass('btn-save');
					setTimeout(function(){
						$(button).removeClass('btn-save disabled').addClass('btn-edit');
					}, 2500);
				}).catch(function(err) {
					$(button).removeClass('btn-edit grey white-text').addClass('btn-cancel');
					setTimeout(function(){
						$(button).removeClass('btn-cancel disabled').addClass('btn-edit');
					}, 2500);
				});
			});
		}
	)
</script>

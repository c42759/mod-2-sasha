
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
						<a href="{c2r-bo-path/{c2r-lg}/{c2r-module-folder}/edit/" class="btn btn-add" role="button">
							<i class="fa fa-plus" aria-hidden="true"></i>
							<span class="sm-block15 xs-block15"></span>
							Add
						</a>
					</th>
				</tr>
			</thead>
			<tbody>
				{c2r-list}
			</tbody>
		</table>
	</div>
</div>
<script src="{c2r-module-path}/site-assets/js/ping.js" charset="utf-8"></script>
<script type="text/javascript">
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

<tr>
	<th scope="row" class="sm-tacenter">{c2r-id}</th>
	<td>{c2r-project}</td>
	<td>{c2r-name}</td>
	<td class="sm-taright">{c2r-ip}</td>
	<td class="sm-taright">{c2r-ip2}</td>
	<td class="sm-tacenter" title="{c2r-system}"><i class="fa fa-{c2r-system}" aria-hidden="true"></i></td>
	<td title="Date Update: {c2r-date-update}" class="sm-taright">{c2r-date}</td>
	<td class="sm-taright">
		<a href="#" class="btn btn-edit" role="button" id="ip" data-ip="{c2r-ip}">
			<i class="fa fa-dot-circle-o" aria-hidden="true"></i>
			<span class="sm-block15 xs-block15"></span>
			Ping
		</a>
		<span class="sm-block15"></span>
		<button type="button" class="btn btn-edit edit-entry" data-toggle="modal" data-target="#edit-modal" data-id="{c2r-id}">
			<i class="fa fa-pencil" aria-hidden="true"></i>
			<span class="sm-block15 xs-block15"></span>
			Edit
		</button>
		<span class="sm-block15"></span>
		<button type="button" class="btn btn-del del-entry" data-id="{c2r-id}">
			<i class="fa fa-times" aria-hidden="true"></i>
			<span class="sm-block15 xs-block15"></span>
			del
		</button>
	</td>
</tr>

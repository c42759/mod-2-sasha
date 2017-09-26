<?php

$query = sprintf(
	"SELECT * FROM %s_sasha WHERE true",
	$cfg->db->prefix
);

$source = $db->query($query);

while ($data = $source->fetch_object()) {
	if (!isset($list)) {
		$list = "";
		$row_tpl = bo3::mdl_load('templates-e/home/row.tpl');
	}

	$list .= bo3::c2r(
		[
			'id' => $data->id,
			'project' => $data->project,
			'name' => $data->name,
			'ip' => $data->ip,
			'ip2' => $data->ip2,
			'system' => $data->system,
			'date' => date("Y-m-d", strtotime($data->date)),
			'date-update' => $data->date_update,
		],
		$row_tpl
	);
}

$mdl = bo3::c2r(
	[
		'list' => isset($list) ? $list : ''
	],
	bo3::mdl_load("templates/home.tpl")
);

include "pages/module-core.php";

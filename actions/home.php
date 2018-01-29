<?php

$add = bo3::mdl_load('templates-e/add/modal.tpl');
$edit = bo3::mdl_load('templates-e/edit/modal.tpl');

$entries = new sasha();
$entries = $entries->returnAllEntries();

foreach ($entries as $i => $entry) {
	if (!isset($list)) {
		$list = "";
		$row_tpl = bo3::mdl_load('templates-e/home/row.tpl');
	}

	$list .= bo3::c2r(
		[
			'id' => $entry->id,
			'project' => $entry->project,
			'name' => $entry->name,
			'ip' => $entry->ip,
			'ip2' => $entry->ip2,
			'system' => $entry->system,
			'date' => date("Y-m-d", strtotime($entry->date)),
			'date-update' => $entry->date_update,
		],
		$row_tpl
	);
}

$mdl = bo3::c2r(
	[
		'list' => isset($list) ? $list : '',
		'add-modal' => $add,
		'edit-modal' => $edit
	],
	bo3::mdl_load("templates/home.tpl")
);

include "pages/module-core.php";

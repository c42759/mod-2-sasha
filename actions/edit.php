<?php

$mdl = bo3::c2r(
	[
		'list' => isset($list) ? $list : ''
	],
	bo3::mdl_load("templates/edit.tpl")
);

include "pages/module-core.php";

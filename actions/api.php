<?php

function getEntry($id) {
	$entry = new sasha();
	$entry->setId($id);
	$entry = $entry->returnOneEntry();

	return json_encode($entry);
}

function insertEntry($post) {
	$toReturn = [
		"status" => false,
		"message" => "",
	];

	if(!empty($_POST['name']) && !empty($_POST['system']) && !empty($_POST['ip'])) {
		$entry = new sasha();
		$entry->setProject((isset($_POST['project']) && !empty($_POST['project'])) ? $_POST['project'] : "");
		$entry->setName($_POST['name']);
		$entry->setIp($_POST['ip']);
		$entry->setSystem($_POST['system']);
		$entry->setUserId($authData['id']);
		$entry->setDate();
		$entry->setDateUpdate();

		if ($entry->insert()) {
			$toReturn["status"] = true;
			$toReturn['message'] = "successful";
		} else {
			$toReturn['status'] = false;
			$toReturn['message'] = "Something went wrong!";
		}
	} else {
		$toReturn['status'] = false;
		$toReturn['message'] = "You're missing something important on the form. Check it out!";
	}

	return json_encode($toReturn);
}

function updateEntry($id, $post) {
	$toReturn = [
		"status" => false,
		"message" => "",
	];

	if(!empty($_POST['name']) && !empty($_POST['system']) && !empty($_POST['ip'])) {
		$update = new sasha();
		$update->setId($id);
		$update->setProject((isset($_POST['project']) && !empty($_POST['project'])) ? $_POST['project'] : "");
		$update->setName($_POST['name']);
		$update->setIp($_POST['ip']);
		$update->setSystem($_POST['system']);
		$update->setUserId($authData['id']);
		$update->setDate();
		$update->setDateUpdate();

		if ($update->update()) {
			$toReturn["status"] = true;
			$toReturn['message'] = "successful";
		} else {
			$toReturn['status'] = false;
			$toReturn['message'] = "Something went wrong!";
		}
	} else {
		$toReturn['status'] = false;
		$toReturn['message'] = "You're missing something important on the form. Check it out!";
	}

	return json_encode($toReturn);
}

function deleteEntry($id) {
	$toReturn = [
		"status" => false,
		"message" => "",
	];

	$delete = new sasha();
	$delete->setId($id);

	if($delete->delete()) {
		$toReturn["status"] = true;
		$toReturn['message'] = "successful";
	} else {
		$toReturn['status'] = false;
		$toReturn['message'] = "Something went wrong!";
	}
	return json_encode($toReturn);
}


switch ($_GET["r"]) {
	case 'insertEntry':
		$tpl = insertEntry($_POST);
		break;
	case 'updateEntry':
		$tpl = updateEntry($id, $_POST);
		break;
	case 'getEntry':
		$tpl = getEntry($id);
		break;
	case 'deleteEntry':
		$tpl = deleteEntry($id);
		break;
	default:
		$tpl = "";
		break;
}

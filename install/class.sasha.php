<?php

class sasha {
	protected $id;
	protected $project;
	protected $name;
	protected $ip;
	protected $ip2;
	protected $system;
	protected $user_id;
	protected $date;
	protected $date_update;

	public function __construct() {}

	public function setProject($p) {
		$this->project = $p;
	}

	public function setName($n) {
		$this->name = $n;
	}

	public function setIp($k) {
		$this->ip = $k;
	}
	public function setIp2($k2) {
		$this->ip2 = $k2;
	}

	public function setId($i) {
		$this->id = $i;
	}

	public function setSystem($s) {
		$this->system = $s;
	}

	public function setUserId($u) {
		$this->user_id = $u;
	}

	public function setDate($d = null) {
		$this->date = ($d !== null) ? $d : date("Y-m-d H:i:s", time());
	}

	public function setDateUpdate($d = null) {
		$this->date_update = ($d !== null) ? $d : date("Y-m-d H:i:s", time());
	}

	public function insert() {
		global $cfg, $db;

		$query = sprintf(
			"INSERT INTO %s_sasha (project, name, ip, system, user_id, date, date_update) VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s')",
			$cfg->db->prefix,
			$this->project,
			$this->name,
			$this->ip,
			$this->system,
			$this->user_id,
			$this->date,
			$this->date_update
		);

		$toReturn = $db->query($query);

		$this->id = $db->insert_id;

		return $toReturn;
	}

	public function update() {
		global $cfg, $db;

		$query = sprintf(
			"UPDATE %s_sasha SET project = '%s', name = '%s', ip = '%s', system = '%s', user_id = '%s', date = '%s', date_update = '%s' WHERE id = '%s'",
			$cfg->db->prefix,
			$this->project,
			$this->name,
			$this->ip,
			$this->system,
			$this->user_id,
			$this->date,
			$this->date_update,
			$this->id
		);

		return $db->query($query);
	}

	public function delete() {
		global $cfg, $db, $authData;

		$entry = new sasha();
		$entry->setId($this->id);
		$entry = $entry->returnOneEntry();

		$trash = new trash();
		$trash->setCode(json_encode($entry));
		$trash->setDate();
		$trash->setModule($cfg->mdl->folder);
		$trash->setUser($authData["id"]);
		$trash->insert();

		unset($entry);

		$query = sprintf(
			"DELETE FROM %s_sasha WHERE id = '%s'",
			$cfg->db->prefix,
			$this->id
		);

		return $db->query($query);
	}

	public function returnObject() {
		return get_object_vars($this);
	}

	public function returnOneEntry() {
		global $cfg, $db;

		$query = sprintf("SELECT * FROM %s_sasha WHERE id = '%s' LIMIT 1", $cfg->db->prefix, $this->id);
		$source = $db->query($query);

		return $source->fetch_object();
	}

	public function existEntryByIp() {
		global $cfg, $db;

		$query = sprintf("SELECT * FROM %s_sasha WHERE ip = '%s' LIMIT 1", $cfg->db->prefix, $this->ip);
		$source = $db->query($query);

		return $source->num_rows;
	}

	public function returnOneEntryByIp() {
		global $cfg, $db;

		$query = sprintf(
			"SELECT * FROM %s_sasha WHERE ip = '%s' LIMIT 1",
			$cfg->db->prefix,
			$this->ip
		);
		$source = $db->query($query);

		return $source->fetch_object();
	}

	public function existEntryByProject() {
		global $cfg, $db;

		$query = sprintf("SELECT * FROM %s_sasha WHERE project = '%s' LIMIT 1", $cfg->db->prefix, $this->project);
		$source = $db->query($query);

		return $source->num_rows;
	}

	public function returnAllEntries() {
		global $cfg, $db;

		$query = sprintf("SELECT * FROM %s_sasha WHERE true", $cfg->db->prefix);
		$source = $db->query($query);

		$toReturn = [];
		$i = 0;

		while ($data = $source->fetch_object()) {
			$toReturn[$i] = $data;
			$i++;
		}

		return $toReturn;
	}
}

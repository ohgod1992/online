<?php

class ad
{
	public $G;

	public function __construct(&$G)
	{
		$this->G = $G;
	}

	public function _init()
	{
		$this->positions = NULL;
		$this->sql = $this->G->make('sql');
		$this->db = $this->G->make('db');
		$this->pg = $this->G->make('pg');
		$this->ev = $this->G->make('ev');
	}

	public function getAdById($id)
	{
		$data = array(false,'ad',"adid = '{$id}'");
		$sql = $this->sql->makeSelect($data);
		return $this->db->fetch($sql,'adstyle');
	}

	public function modifyAd($id,$args)
	{
		$data = array('ad',$args,"adid = '{$id}'");
		$sql = $this->sql->makeUpdate($data);
		$this->db->exec($sql);
		return $this->db->affectedRows();
	}

	public function getAdList($args,$page,$number = 20)
	{
		$data = array(
			'select' => false,
			'table' => 'ad',
			'query' => $args,
			'orderby' => 'adid DESC'
		);
		return $this->db->listElements($page,$number,$data);
	}
}

?>

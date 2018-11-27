<?php
class Count_model extends CI_Model{
	function __construct()
	{
		parent::__construct();
	}

	public function count($tabla)
	{
        $result = $this->db->count_all($tabla);

        return $result;
	}
}
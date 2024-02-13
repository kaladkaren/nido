<?php

/**
* returns the api url
* @param  object $class    the `$this` object
* @return string           example: http://localhost/restigniter-crud/api/crud/27
*
* @author: @jjjjcccjjf
*/
function api_url($class)
{
  return base_url() . "api/" . strtolower(get_class($class)) . "/";
}

function get_roles($that){
	return $that->db->get('tbl_role')->result();
}

function get_eso_list($that){
	return $that->db->get('tbl_eso')->result();
}

function get_batchcode($that){
	$that->db->select('b.*, c.eso_label');
	$that->db->join('tbl_eso c', 'c.id = b.eso_id', 'left');
	return $that->db->get('tbl_batchcodes b')->result();
}

function get_ambassadors($that){
	$that->db->where('role', 2);
	return $that->db->get('admin')->result();
}


function get_provinces($that){
	// $that->db->where('role', 2);
	$that->db->order_by('provDesc', 'ASC');
	return $that->db->get('refprovince')->result();
}


function get_users($that){
	return $that->db->get('admin')->result();
}
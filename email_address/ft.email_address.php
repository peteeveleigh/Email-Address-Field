<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Email_address_ft extends EE_Fieldtype {
	
	/*
	
	Email Address - a simple fieldtype for ExpressionEngine 2 that validates field input to ensure it is a valid email address format
    Copyright (C) 2011  Pete Eveleigh

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
 
	
	*/

	var $info = array(
		'name'		=> 'Email Address',
		'version'	=> '1.0',
		'author'	=> 'Pete Eveleigh'
	);
	
	function Email_address_ft(){
		parent::EE_Fieldtype::__construct();
		$this->EE->lang->loadfile('email_address');
	}
	
	
	function display_field($data)
	{
		return form_input(array(
			'name'	=> $this->field_name,
			'id'	=> $this->field_id,
			'value'	=> $data
		));
	}
	
	
	function install()
	{
		// defaults
		return array(
			'email'	=> ''
		);
	}
	
	function validate($data)
	{
		if($data!=''){
			$message = $this->EE->lang->line('error_message');
		
			// load CI email helper
			$this->EE->load->helper('email');
		
			// check email address validity
			if(valid_email($data)){
				return TRUE;
			} else {
				return $message;
			}
		} else {
			return TRUE;
		}
	}	
		
	
}
// END Email_address_ft class

/* End of file ft.email_address.php */
/* Location: ./system/expressionengine/third_party/email_address/ft.email_address.php */
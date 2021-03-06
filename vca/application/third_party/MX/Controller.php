<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/** load the CI class for Modular Extensions **/
require dirname(__FILE__).'/Base.php';

/**
 * Modular Extensions - HMVC
 *
 * Adapted from the CodeIgniter Core Classes
 * @link	http://codeigniter.com
 *
 * Description:
 * This library replaces the CodeIgniter Controller class
 * and adds features allowing use of modules and the HMVC design pattern.
 *
 * Install this file as application/third_party/MX/Controller.php
 *
 * @copyright	Copyright (c) 2015 Wiredesignz
 * @version 	5.5
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 **/
class MX_Controller 
{
	 public $profile=array();
    public $autoload = array();
	
	public function __construct() 
	{
		$class = str_replace(CI::$APP->config->item('controller_suffix'), '', get_class($this));
		log_message('debug', $class." MX_Controller Initialized");
		Modules::$registry[strtolower($class)] = $this;	
		
		/* copy a loader instance and initialize */
		$this->load = clone load_class('Loader');
		$this->load->initialize($this);	
		
		/* autoload module items */
		$this->load->_autoloader($this->autoload);
		if (!$this->session->userdata('business_name')){
    		$qs=$this->db->get('admin_profile');
    		foreach ($qs->result() as $r){
    		    $this->profile['business_name']=$r->business_name;
    		    $this->profile['admin_email']=$r->admin_email;
    		    $this->profile['image']=$r->image;
    		    $this->profile['phone']=$r->phone;
    		    $this->profile['address']=$r->address;
    		    $this->profile['moto']=$r->moto;
    		    $this->profile['about']=$r->about;
    		    $this->profile['gst_no']=$r->gst_no;
    		    $this->profile['bank_acc']=$r->bank_acc;
    		    $this->profile['ifsc_code']=$r->ifsc_code;
    		    $this->profile['facebook']=$r->facebook;
    		    $this->profile['twitter']=$r->twitter;
    		    $this->profile['instagram']=$r->instagram;
    		    $this->profile['whatsapp']=$r->whatsapp;
    		    $this->profile['youtube']=$r->youtube;
    		    $this->profile['gplus']=$r->gplus;
    		    $this->profile['google_map']=$r->google_map;
    		    $this->profile['seo_analytics']=$r->seo_analytics;
    		    $this->profile['webmaster_code']=$r->webmaster_code;
    		    
    		    $this->session->set_userdata($this->profile);
    		}
		}else{
		    $this->profile=$this->session->userdata();
		}
		$this->img_url='http://localhost/vcaadmin/';
	}
	
	public function __get($class) 
	{
		return CI::$APP->$class;
	}
}
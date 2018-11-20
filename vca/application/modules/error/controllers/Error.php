<?php if (! defined ( 'BASEPATH' ))exit ( 'No direct script access allowed' );
class Error extends MX_Controller
{
    function index()
    {
        $data['title']=$this->profile["school_name"].", ".$this->profile["web_city"].", ".$this->profile["web_state"].", ".$this->profile["web_country"];
		$data['meta_desc']="Snowdrops School was established in the year 1988 at Krishnanagar, Mirik, Darjeeling. The school has classes from Nursery to X and is affiliated to C.B.S.E. Delhi.";
		$data['meta_keywords']=$this->profile["school_name"].", ".$this->profile["web_city"].", ".$this->profile["web_state"].", ".$this->profile["web_country"];
        $data['module']='error';
        $data['view_file']='error';
        echo Modules::run('template/layout2',$data);
    }
    
	
    public function add() 
    {
		$this->load->library ( 'form_validation' );
		$this->form_validation->set_rules ( 'name', 'Name', 'trim|required');
		$this->form_validation->set_rules ( 'email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules ( 'phone', 'Phone Number', 'trim|numeric');
		$this->form_validation->set_rules ( 'message', 'Message', 'trim|required' );
		
		if ($this->form_validation->run () == true) 
		{
		    $this->depend["name"]=$_POST['name'];
		    $this->depend["email"]=$_POST['email'];
		    $this->depend["phone"]=$_POST['phone'];
		    $this->depend["message"]=$_POST['message'];
            
			$check = $this->contact_mdl->insert($this->depend,$this->profile["school_name"]);
			if ($check == true) {
			    echo "<div class='alert alert-success'>Thank you for contacting us!</div>";
			}
		} else {
			echo "<div class='alert alert-danger'>".validation_errors()."</div>";
		}
    }
	
	public function newsletter() 
	{
		$this->load->library ( 'form_validation' );
		$this->form_validation->set_rules ( 'email', 'Email', 'trim|required|valid_email|is_unique[newsletters.email]|xss_clean' );
		
		if ($this->form_validation->run () == true) {
			$this->load->model ( 'contact_mdl' );
			$check = $this->contact_mdl->news_insert ();
			if ($check == true) {
				echo "<font color='green'><b>Success ! You Have Successfully Subscribe to Our Newsletters. <br>Please  Check your Email For Welcome Message</b></font>";
				die ();
			}
		} else {
			echo "<font color='red'>" . validation_errors () . "</font>";
		}
	
	}
}
?>
<?php
        include_once 'thesis.php';
        
	class Researcher 
	{
		private $id;
		private	$full_name;
		private	$theses = array();
		private	$building;
		private	$country;
		private	$educative_program;
		private	$email;
		private	$research_group;
                private $research_group_key;
		private	$research_line;
		private	$room;
		private	$school;
		private $university;
		private	$telephone;
                private $image_profile;
		
		public function __construct()
		{
			
		}

		public function set_id($id)
		{
			$this->id = $id;
		}

		public function set_full_name($full_name)
		{
			$this->full_name = $full_name;
		}

		public function add_thesis($thesis)
		{
			array_push($this->theses, $thesis);
		}

		public function set_building($building)
		{
			$this->building = $building;
		}

		public function set_country($country)
		{
			$this->country = $country;
		}

		public function set_educative_program($educative_program)
		{
			$this->educative_program = $educative_program;
		}

		public function set_email($email)
		{
			$this->email = $email;
		}

		public function set_research_group($research_group)
		{
			$this->research_group = $research_group;
		}
                
                public function set_research_group_key($research_group_key)
                {
                        $this->research_group_key = $research_group_key;
                }

		public function set_research_line($research_line)
		{
			$this->research_line = $research_line;
		}

		public function set_room($room)
		{
			$this->room = $room;
		}

		public function set_school($school)
		{
			$this->school = $school;
		}

		public function set_university($university)
		{
			$this->university = $university;
		}

		public function set_telephone($telephone)
		{
			$this->telephone = $telephone;
		}
                
                public function set_image_profile($image_profile) {
                    $this->image_profile = $image_profile;
                }

		public function get_id()
		{
			return $this->id;
		}

		public function get_full_name()
		{
			return $this->full_name;
		}

		public function get_thesis_by_name($name)
		{
			//return $theses[$name];
		}

		public function get_all_theses()
		{
			return $this->theses;
		}

		public function get_building()
		{
			return $this->building;
		}

		public function get_country()
		{
			return $this->building;
		}

		public function get_educative_program()
		{
			return $this->educative_program;
		}

		public function get_email()
		{
			return $this->email;
		}

		public function get_research_group()
		{
			return $this->research_group;
		}
                
                public function get_research_group_key()
                {
                        return $this->research_group_key;
                }                   

		public function get_research_line()
		{
			return $this->research_line;
		}

		public function get_room()
		{
			return $this->room;
		}

		public function get_school()
		{
			return $this->school;
		}

		public function get_university()
		{
			return $this->university;
		}

		public function get_telephone()
		{
			return $this->telephone;
		}
                
                public function get_image_profile() {
                    return $this->image_profile;
                }
                
                //Saca del array la thesis por su id
                public function get_thesis_by_id($thesis_id) {
                    foreach ($this->theses as $thesis) {
                        if ($thesis_id == $thesis->get_id()) {
                            return $thesis;
                        }
                    }
                    
                    return false;
                }
                
                public function change_thesis_status($thesis_id, $status) {
                    $thesis = $this->get_thesis_by_id($thesis_id);
                    
                    for ($i = 0; $i < count($this->theses); $i++) {
                        if ($this->theses[$i]->get_id() == $thesis_id) {
                            $thesis->set_status($status);
                            $this->theses[$i] = $thesis;
                        }
                    }
                }
	}
?>
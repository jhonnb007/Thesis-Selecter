<?php
	class Student 
	{
		private $id;
		private $full_name;
		private $thesis;
                private $thesis_id;
		private $university;
		private $school;
		private $educative_program;
		private $email;                

		public function __constructor()
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

		public function set_thesis($thesis)
		{
			$this->thesis = $thesis;
		}
                
                public function set_thesis_id($thesis_id)
		{
			$this->thesis_id = $thesis_id;
		}

		public function set_university($university)
		{
			$this->university = $university;
		}

		public function set_school($school)
		{
			$this->school = $school;
		}

		public function set_educative_program($educative_program)
		{
			$this->educative_program = $educative_program;
		}

		public function set_email($email)
		{
			$this->email = $email;
		}

		public function get_id()
		{
			return $this->id;
		}

		public function get_full_name()
		{
			return $this->full_name;
		}

		public function get_thesis()
		{
			return $this->thesis;
		}
                
                public function get_thesis_id() 
                {
                        return $this->thesis_id;   
                }

		public function get_university()
		{
			return $this->university;
		}

		public function get_school()
		{
			return $this->school;
		}

		public function get_educative_program()
		{
			return $this->educative_program;
		}

		public function get_email()
		{
			return $this->email;
		}
	}
?>

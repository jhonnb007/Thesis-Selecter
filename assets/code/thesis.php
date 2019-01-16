<?php
	class Thesis
	{
		private $id;
		private $name;
		private $level;
		private $researcher;
		private $topic;
		private $educative_program;
		private $funding_agency;
		private $project;
		private $plazas;
		private $summary;
		private $requirements;
		private $requirementsALL;
		private $image;
		private $assigned;
                private $support;
                private $status;
                private $image_in;

		public function __constructor()
		{

		}

		public function set_id($id) {
			$this->id = $id;
		}

		public function set_name($name)
		{
			$this->name = $name;
		}

		public function set_level($level)
		{
			$this->level = $level;
		}

		public function set_researcher($researcher)
		{
			$this->researcher = $researcher;
		}

		public function set_topic($topic)
		{
			$this->topic = $topic;
		}

		public function set_educative_program($educative_program)
		{
			$this->educative_program = $educative_program;
		}

		public function set_requirements($requirements)
		{
			$this->requirements = $requirements;
		}
		public function set_requirementsALL($requirementsALL)
		{
			$this->requirementsALL = $requirementsALL;
		}

		public function set_funding_agency($funding_agency)
		{
			$this->funding_agency = $funding_agency;
		}

		public function set_project($project)
		{
			$this->project = $project;
		}

		public function set_plazas($plazas)
		{
			$this->plazas = $plazas;
		}

		public function set_summary($summary)
		{
			$this->summary = $summary;
		}

		public function set_image($image)
		{
			$this->image = $image;
		}

		public function set_assigned($assigned)
		{
			$this->assigned = $assigned;
		}

                public function set_support($support) {
			$this->support = $support;
		}

                public function set_status($status) {
                    $this->status = $status;
                }

                public function set_image_in($image_in) {
                    $this->image_in = $image_in;
                }

		public function get_id() {
			return $this->id;
		}

		public function get_name()
		{
			return $this->name;
		}

		public function get_level()
		{
			return $this->level;
		}

		public function get_researcher()
		{
			return $this->researcher;
		}

		public function get_topic()
		{
			return $this->topic;
		}
		public function get_topic2()
		{
			return $this->topic2;
		}

		public function get_educative_program()
		{
			return $this->educative_program;
		}

		public function get_requirements()
		{
			return $this->requirements;
		}

		public function get_requirementsALL()
		{
			return $this->requirementsALL;
		}

		public function has_funding_agency()
		{
			return $this->funding_agency;
		}

		public function get_project()
		{
			return $this->project;
		}

		public function get_plazas()
		{
			return $this->plazas;
		}

		public function get_summary()
		{
			return $this->summary;
		}

		public function get_image()
		{
			return $this->image;
		}

		public function get_assigned()
		{
			return $this->assigned;
		}

                public function get_support() {
                    return $this->support;
                }

                public function get_status() {
                    return $this->status;
                }

                public function get_image_in() {
                    return $this->image_in;
                }
	}
?>

<?php
	include_once 'assets/code/include/db_connection.php';
	include_once 'assets/code/researcher.php';
	include_once 'assets/code/administrador.php';
	include_once 'assets/code/thesis.php';
	include_once 'assets/code/university.php';
	include_once 'assets/code/school.php';
	include_once 'assets/code/educative_program.php';
        include_once 'assets/code/student.php';



				
	function loginAdmin($emailAdmin, $passwordAdmin)
  {
  	global $connection;
		$administrador = new Administrador;
	  $administrador_query = 'select administrador.AdministradorID, administrador.AdministradorName, administrador.AdministradorEmail, administrador.AdministradorTelephone, school.SchoolName, administrador.ProfilePicture from administrador INNER JOIN School ON administrador.SchoolID = school.SchoolID where administrador.AdministradorEmail = ? and administrador.AdministradorPassword = ?';
		$stmt = $connection->stmt_init();

		if ($stmt->prepare($administrador_query)) {
			$stmt->bind_param("ss", $emailAdmin, $passwordAdmin);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_array(MYSQLI_ASSOC);
			if ($row != null) {
				$administrador->set_id_administrador($row['AdministradorID']);
				$administrador->set_full_name_admnistrador($row['AdministradorName']);
				$administrador->set_email_administrador($row['AdministradorEmail']);
				$administrador->set_telephone_administrador($row['AdministradorTelephone']);
				$administrador->set_school_administrador($row['SchoolName']);
                                $administrador->set_image_profile_administrador($row['ProfilePicture']);
				return $administrador;
			}

			$connection->close();
		}

		return false;

  }

	function login($email, $password)
	{
		global $connection;
		$researcher = new Researcher;
		$researcher_query = "SELECT R.ResearcherID, R.ResearcherName, R.EmailAddress, R.TelephoneNumber, RG.ResearchGroupName, RL.ResearchLineName, RM.RoomName, B.BuildingName, S.SchoolName, U.UniversityName, R.ImageProfile FROM researcher as R INNER JOIN research_group as RG ON R.ResearchGroupID = RG.ResearchGroupID INNER JOIN research_line as RL ON R.ResearchLineID = RL.ResearchLineID INNER JOIN room as RM ON RM.RoomID = R.RoomID INNER JOIN building as B ON B.BuildingID = RM.BuildingID INNER JOIN school as S ON S.SchoolID = R.SchoolID INNER JOIN university as U ON U.UniversityID = S.UniversityID WHERE EmailAddress = ? AND EmailPassword = ?";
		$thesis_query = "SELECT T.ThesisID, R.ResearcherName, T.ThesisName, L.LevelName, S.StatusName, TP.TopicName, E.EducativeProgramName, F.FundingAgencyAllName, T.PlazasID, RG.ResearchGroupName, RL.ResearchLineName, SP.SupportName, T.Assigned, T.Summary, T.Image, T.ImageIn, RQ.RequirementsName FROM thesis as T INNER JOIN level as L ON T.LevelID = L.LevelID INNER JOIN researcher as R ON T.ResearcherID = R.ResearcherID INNER JOIN status as S ON S.StatusID = T.StatusID INNER JOIN topic as TP ON TP.TopicID = T.TopicID INNER JOIN educative_program as E ON E.EducativeProgramID = T.EducativeProgramID INNER JOIN funding_agency_all as F ON F.FundingAgencyAllID = T.FundingAgencyAllID INNER JOIN research_group as RG ON RG.ResearchGroupID = T.ResearchGroupID INNER JOIN research_line as RL ON RL.ResearchLineID = T.ResearchLineID INNER JOIN support as SP ON SP.SupportID = T.SupportID INNER JOIN requirements as RQ ON RQ.RequirementsID = T.RequirementsID WHERE T.ResearcherID = ? AND Category = 1";
		$stmt = $connection->stmt_init();

		if ($stmt->prepare($researcher_query)) {
			$stmt->bind_param("ss", $email, $password);
			$stmt->execute();
			$result = $stmt->get_result();

			$row = $result->fetch_array(MYSQLI_ASSOC);

			if ($row != null) {
				$researcher->set_id($row['ResearcherID']);
				$researcher->set_full_name($row['ResearcherName']);
				$researcher->set_email($row['EmailAddress']);
				$researcher->set_telephone($row['TelephoneNumber']);
				$researcher->set_research_group($row['ResearchGroupName']);
				$researcher->set_research_line($row['ResearchLineName']);
				$researcher->set_room($row['RoomName']);
				$researcher->set_building($row['BuildingName']);
				$researcher->set_school($row['SchoolID']);
				$researcher->set_university($row['UniversityName']);
                                $researcher->set_image_profile($row['ImageProfile']);

				if ($stmt->prepare($thesis_query)) {
					$stmt->bind_param("i", $researcher->get_id());
					$stmt->execute();
					$result_thesis = $stmt->get_result();

					while ($row = $result_thesis->fetch_array(MYSQLI_ASSOC)) {
						$thesis = new Thesis;

						$thesis->set_id($row['ThesisID']);
						$thesis->set_name($row['ThesisName']);
						$thesis->set_level($row['LevelName']);
						$thesis->set_researcher($researcher);
						$thesis->set_topic($row['TopicName']);
						$thesis->set_educative_program($row['EducativeProgramName']);
						$thesis->set_funding_agency($row['FundingAgencyAllName']);
						$thesis->set_plazas($row['PlazasID']);
						$thesis->set_summary($row['Summary']);
						$thesis->set_image($row['Image']);
						$thesis->set_requirements($row['RequirementsName']);
						$thesis->set_assigned($row['Assigned']);
                                                $thesis->set_status($row['StatusName']);
                                                $thesis->set_image_in($row['ImageIn']);

						$researcher->add_thesis($thesis);
					}
				}

				return $researcher;
			}

			$connection->close();
		}

		return false;
	}

	function logout()
	{
		$_SESSION = array();

		if (ini_get("session.use_cookies")) {
			$params = session_get_cookie_params();
			setcookie(session_name(), '', time() - 42000,
				$params["path"], $params["domain"],
				$params["secure"], $params["httponly"]
			);
		}

	    session_destroy();
	}

	function get_theses()
	{
		global $connection;
		$theses = array();
		$query = "SELECT T.ThesisID, R.ResearcherName, R.ResearcherID, R.EmailAddress, R.TelephoneNumber, R.ResearchGroupID, R.ResearchLineID,  R.RoomID, R.SchoolID, T.ThesisName, L.LevelName, S.StatusName, TP.TopicName, E.EducativeProgramName, F.FundingAgencyAllName, RQ.RequirementsName, T.PlazasID, RG.ResearchGroupName, RL.ResearchLineName, RG.ResearchGroupKey, RQ.RequirementsID, SP.SupportName, T.Assigned, T.Summary, T.Image, U.UniversityName, Sch.SchoolName, RM.RoomName, B.BuildingName, T.ImageIn, R.ImageProfile
					FROM thesis as T INNER JOIN level as L ON T.LevelID = L.LevelID INNER JOIN researcher as R ON T.ResearcherID = R.ResearcherID INNER JOIN status as S ON S.StatusID = T.StatusID INNER JOIN topic as TP ON TP.TopicID = T.TopicID INNER JOIN educative_program as E ON E.EducativeProgramID = T.EducativeProgramID INNER JOIN requirements as RQ ON RQ.RequirementsID = T.RequirementsID INNER JOIN funding_agency_all as F ON F.FundingAgencyAllID = T.FundingAgencyAllID INNER JOIN research_group as RG ON RG.ResearchGroupID = T.ResearchGroupID INNER JOIN research_line as RL ON RL.ResearchLineID = T.ResearchLineID INNER JOIN support as SP ON SP.SupportID = T.SupportID INNER JOIN school as Sch ON Sch.SchoolID = R.SchoolID INNER JOIN university as U ON U.UniversityID = Sch.UniversityID INNER JOIN room as RM ON RM.RoomID = R.RoomID INNER JOIN building as B on B.BuildingID = RM.BuildingID ORDER BY T.ThesisID";

		$stmt = $connection->stmt_init();

		if ($stmt->prepare($query)) {
			$stmt->execute();
			$result = $stmt->get_result();

			while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
				$thesis = new Thesis;
				$researcher = new Researcher;
				$administrador = new Administrador;


				$researcher->set_id($row['ResearcherID']);
				$researcher->set_full_name($row['ResearcherName']);
				$researcher->set_email($row['EmailAddress']);
				$researcher->set_research_group($row['ResearchGroupName']);
				$researcher->set_research_line($row['ResearchLineName']);
				$researcher->set_research_group_key($row['ResearchGroupKey']);
				$researcher->set_room($row['RoomName']);
                                $researcher->set_building($row['BuildingName']);
				$researcher->set_school($row['SchoolName']);
                                $researcher->set_university($row['UniversityName']);
				$researcher->set_telephone($row['TelephoneNumber']);
                                $researcher->set_image_profile($row['ImageProfile']);

				$thesis->set_id($row['ThesisID']);
				$thesis->set_name($row['ThesisName']);
				$thesis->set_level($row['LevelName']);
				$thesis->set_researcher($researcher);
				$thesis->set_topic($row['TopicName']);
				$thesis->set_educative_program($row['EducativeProgramName']);
				$thesis->set_funding_agency($row['FundingAgencyAllName']);
				$thesis->set_plazas($row['PlazasID']);
				$thesis->set_summary($row['Summary']);
				$thesis->set_requirements($row['RequirementsName']);
				$thesis->set_image($row['Image']);
				$thesis->set_assigned($row['Assigned']);
                                $thesis->set_support($row['SupportName']);
                                $thesis->set_status($row['StatusName']);
                                $thesis->set_image_in($row['ImageIn']);

				array_push($theses, $thesis);
			}

			return $theses;
		} else {
			return "No theses found";
		}
	}

	function get_universities()
	{
		global $connection;
		$universities = array();
		$query = "SELECT * FROM university";

		$stmt = $connection->stmt_init();

		if ($stmt->prepare($query)) {
			$stmt->execute();
			$result = $stmt->get_result();

			while($row = $result->fetch_array(MYSQLI_ASSOC)) {
				$university = new University;

				$university->set_id($row['UniversityID']);
				$university->set_name($row['UniversityName']);

				array_push($universities, $university);
			}

			return $universities;
		} else {
			return "No universities found";
		}
	}

	function get_schools()
	{
		global $connection;
		$schools = array();
		$query = "SELECT * FROM school";

		$stmt = $connection->stmt_init();

		if ($stmt->prepare($query)) {
			$stmt->execute();
			$result = $stmt->get_result();

			while($row = $result->fetch_array(MYSQLI_ASSOC)) {
				$school = new School;

				$school->set_id($row['SchoolID']);
				$school->set_name($row['SchoolName']);

				array_push($schools, $school);
			}

			return $schools;
		} else {
			return "No schools found";
		}
	}

	function get_educative_programs()
	{
		global $connection;
		$educative_programs = array();
		$query = "SELECT * FROM educative_program";

		$stmt = $connection->stmt_init();

		if ($stmt->prepare($query)) {
			$stmt->execute();
			$result = $stmt->get_result();

			while($row = $result->fetch_array(MYSQLI_ASSOC)) {
				$educative_program = new EducativeProgram;

				$educative_program->set_id($row['EducativeProgramID']);
				$educative_program->set_name($row['EducativeProgramName']);

				array_push($educative_programs, $educative_program);
			}

			return $educative_programs;
		} else {
			return "No educative programs found";
		}
	}

	function send_request($thesis, $student)
	{
		global $connection;
		$thesis_id = $thesis->get_id();
		//$university = $student->get_university();
		//$school = $student->get_school();
		$educative_program = $student->get_educative_program();
		$student_name = $student->get_full_name();
		//$university_id = $university->get_id();
		//$school_id = $school->get_id();
		$ep_id = $educative_program->get_id();
		$student_email = $student->get_email();
		$researcher = $thesis->get_researcher();
		$researcher_id = $researcher->get_id();
		$thesis_assigned = $thesis->get_assigned();

		//$thesis->set_assigned($thesis->get_assigned() + 1);

		$student_query = "INSERT INTO student (StudentName, ThesisID, UniversityID, SchoolID, EducativeProgramID, EmailAddress) VALUES (?, ?, 1, 1, ?, ?)";
		$request_query = "INSERT INTO request (ResearcherID, StudentID, ThesisID, RequestStatusID) VALUES (?, ?, ?, 3)";

		$stmt = $connection->stmt_init();

		if ($stmt->prepare($student_query)) {
			$stmt->bind_param("siis", $student_name, $thesis_id, $ep_id, $student_email);
			$stmt->execute();

			$student_id = $stmt->insert_id;

			if ($stmt->prepare($request_query)) {
				$stmt->bind_param("iii", $researcher_id, $student_id, $thesis_id);
				$stmt->execute();
			}

			return true;
		}

		return false;
	}

    function get_thesis_students($thesis_id)
    {
		global $connection;
		$students = array();
		//$thesis_id = $thesis->get_id();
		$query = "SELECT S.StudentID, S.StudentName, U.UniversityName, SC.SchoolName, E.EducativeProgramName, S.EmailAddress FROM student as S INNER JOIN university as U ON S.UniversityID = U.UniversityID INNER JOIN school as SC ON S.SchoolID = SC.SchoolID INNER JOIN educative_program as E ON S.EducativeProgramID = E.EducativeProgramID INNER JOIN request as R ON S.StudentID = R.StudentID WHERE S.ThesisID = ? AND R.RequestStatusID = 1";
		$stmt = $connection->stmt_init();

		if ($stmt->prepare($query)) {
			$stmt->bind_param("i", $thesis_id);
			$stmt->execute();
			$result = $stmt->get_result();

			while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
				$student = new Student;

				$student->set_id($row['StudentID']);
				$student->set_full_name($row['StudentName']);
				$student->set_email($row['EmailAddress']);
				$student->set_university($row['UniversityName']);
				$student->set_school($row['SchoolName']);
				$student->set_educative_program($row['EducativeProgramName']);

				array_push($students, $student);
			}

			return $students;
		} else {
			return false;
		}
	}

    function get_accepted_requests($researcher_id)
    {
		global $connection;
		$students = array();
		//$thesis_id = $thesis->get_id();
		$query = "SELECT T.ThesisName, S.StudentID, S.StudentName, U.UniversityName, SC.SchoolName, E.EducativeProgramName, S.EmailAddress FROM student as S INNER JOIN university as U ON S.UniversityID = U.UniversityID INNER JOIN school as SC ON S.SchoolID = SC.SchoolID INNER JOIN educative_program as E ON S.EducativeProgramID = E.EducativeProgramID INNER JOIN request as R ON S.StudentID = R.StudentID INNER JOIN thesis as T ON T.ThesisID = R.ThesisID WHERE T.ResearcherID = ? AND R.RequestStatusID = 1;";
		$stmt = $connection->stmt_init();

		if ($stmt->prepare($query)) {
			$stmt->bind_param("i", $researcher_id);
			$stmt->execute();
			$result = $stmt->get_result();

			while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
				$student = new Student;

				$student->set_id($row['StudentID']);
				$student->set_full_name($row['StudentName']);
				$student->set_email($row['EmailAddress']);
				$student->set_university($row['UniversityName']);
				$student->set_school($row['SchoolName']);
				$student->set_educative_program($row['EducativeProgramName']);
                                $student->set_thesis($row['ThesisName']);

				array_push($students, $student);
			}

			return $students;
		} else {
			return false;
		}
	}

        function get_in_process_requests($researcher_id) {
                global $connection;
                $students = array();
                $query = "SELECT T.ThesisID, T.ThesisName, S.StudentID, S.StudentName, U.UniversityName, SC.SchoolName, E.EducativeProgramName, S.EmailAddress FROM student as S INNER JOIN university as U ON S.UniversityID = U.UniversityID INNER JOIN school as SC ON S.SchoolID = SC.SchoolID INNER JOIN educative_program as E ON S.EducativeProgramID = E.EducativeProgramID INNER JOIN request as R ON S.StudentID = R.StudentID INNER JOIN thesis as T ON T.ThesisID = R.ThesisID WHERE R.RequestStatusID = 3 AND T.ResearcherID = ?";
                $stmt = $connection->stmt_init();

                if ($stmt->prepare($query)) {
                    $stmt->bind_param("i", $researcher_id);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                        $student = new Student;

                        $student->set_id($row['StudentID']);
                        $student->set_full_name($row['StudentName']);
                        $student->set_email($row['EmailAddress']);
                        $student->set_university($row['UniversityName']);
                        $student->set_school($row['SchoolName']);
                        $student->set_educative_program($row['EducativeProgramName']);
                        $student->set_thesis($row['ThesisName']);
                        $student->set_thesis_id($row['ThesisID']);

                        array_push($students, $student);
                    }

                    return $students;
                } else {
                    return false;
                }
        }

        function get_rejected_requests($researcher_id) {
            global $connection;
            $students = array();
            $query = "SELECT T.ThesisName, S.StudentID, S.StudentName, U.UniversityName, SC.SchoolName, E.EducativeProgramName, S.EmailAddress FROM student as S INNER JOIN university as U ON S.UniversityID = U.UniversityID INNER JOIN school as SC ON S.SchoolID = SC.SchoolID INNER JOIN educative_program as E ON S.EducativeProgramID = E.EducativeProgramID INNER JOIN request as R ON S.StudentID = R.StudentID INNER JOIN thesis as T ON T.ThesisID = R.ThesisID WHERE R.RequestStatusID = 2 AND T.ResearcherID = ?";
            $stmt = $connection->stmt_init();

            if ($stmt->prepare($query)) {
                $stmt->bind_param("i", $researcher_id);
		$stmt->execute();
		$result = $stmt->get_result();

		while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                    $student = new Student;

                    $student->set_id($row['StudentID']);
                    $student->set_full_name($row['StudentName']);
                    $student->set_email($row['EmailAddress']);
                    $student->set_university($row['UniversityName']);
                    $student->set_school($row['SchoolName']);
                    $student->set_educative_program($row['EducativeProgramName']);
                    $student->set_thesis($row['ThesisName']);

                    array_push($students, $student);
                }

                return $students;
            } else {
                return false;
            }
        }

        function exists_university($university_id)
	{
		global $connection;
		$university_query = "SELECT UniversityID FROM university WHERE UniversityID = ?";
		$stmt = $connection->stmt_init();

		if ($stmt->prepare($university_query)) {
			$stmt->bind_param("i", $university_id);
			$stmt->execute();
			$result = $stmt->get_result();

			$row = $result->fetch_array(MYSQLI_ASSOC);
		}

                //$connection->close();

                return $row != null;
	}

        function exists_faculty($faculty)
	{
		global $connection;
		$faculty_query = "SELECT SchoolID FROM school WHERE SchoolID = ?";
		$stmt = $connection->stmt_init();

		if ($stmt->prepare($faculty_query)) {
			$stmt->bind_param("i", $faculty);
			$stmt->execute();
			$result = $stmt->get_result();

			$row = $result->fetch_array(MYSQLI_ASSOC);
		}

                //$connection->close();

                return $row != null;
	}

        function exists_educative($educative)
	{
		global $connection;
		$educative_query = "SELECT EducativeProgramID FROM educative_program WHERE EducativeProgramID = ?";
		$stmt = $connection->stmt_init();

		if ($stmt->prepare($educative_query)) {
			$stmt->bind_param("i", $educative);
			$stmt->execute();
			$result = $stmt->get_result();

			$row = $result->fetch_array(MYSQLI_ASSOC);
		}

                //$connection->close();

                return $row != null;
	}

        function get_thesis_status($thesis)
        {
            global $connection;
            $query_status = "SELECT StatusID FROM thesis WHERE ThesisID = ?";
            $thesis_id = $thesis->get_id();
            $stmt = $connection->stmt_init();

            if ($stmt->prepare($query_status)) {
                $stmt->bind_param("i", $thesis_id);
                $stmt->execute();
                $result = $stmt->get_result();

                $row = $result->fetch_array(MYSQLI_ASSOC);

                $status_id = $row['StatusID'];

                return $status_id;
            }
        }

        function get_thesis_status_std($thesis)
        {
            global $connection;
            $query_status = "SELECT StatusID FROM thesis WHERE ThesisID = ?";
            $thesis_id = $thesis->get_thesis_id();
            $stmt = $connection->stmt_init();

            if ($stmt->prepare($query_status)) {
                $stmt->bind_param("i", $thesis_id);
                $stmt->execute();
                $result = $stmt->get_result();

                $row = $result->fetch_array(MYSQLI_ASSOC);

                $status_id = $row['StatusID'];

                return $status_id;
            }
        }

				function get_administrator_thesis($category)
				{
					global $connection, $result;
					$sql = "SELECT ThesisID, R.ResearcherName, T.ThesisName, TP.TopicName, E.EducativeProgramName FROM thesis as T INNER JOIN level as L ON T.LevelID = L.LevelID INNER JOIN researcher as R ON T.ResearcherID = R.ResearcherID INNER JOIN status as S ON S.StatusID = T.StatusID INNER JOIN topic as TP ON TP.TopicID = T.TopicID INNER JOIN educative_program as E ON E.EducativeProgramID = T.EducativeProgramID INNER JOIN funding_agency_all as F ON F.FundingAgencyAllID = T.FundingAgencyAllID INNER JOIN research_group as RG ON RG.ResearchGroupID = T.ResearchGroupID INNER JOIN research_line as RL ON RL.ResearchLineID = T.ResearchLineID INNER JOIN support as SP ON SP.SupportID = T.SupportID WHERE Category = '$category'";
			    $result = mysqli_query($connection, $sql);
					return $result;
				}




?>

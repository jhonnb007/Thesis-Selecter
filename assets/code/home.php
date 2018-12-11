<!DOCTYPE html>
<html>
<head>
	<title>Bienvenido</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
</head>
<body>
	<form action="logout.php">
		<button type="submit">Logout</button>
	</form>

	<?php
		include_once 'researcher.php';
		include_once 'thesis.php';
		include_once 'university.php';
		include_once 'school.php';
		include_once 'educative_program.php';
		include_once 'student.php';
		include_once 'include/db_functions.php';
		session_start();

		echo "Bienvenido " . utf8_encode($_SESSION['researcher']->get_full_name());
		$theses = $_SESSION['researcher']->get_all_theses();
		
		print_r($theses);
		print_r($_SESSION['researcher']);

		foreach($theses as $_SESSION['thesis']) {
			echo $_SESSION['thesis']->get_name();
		}

		$theses2 = get_theses();

		echo "<br>";
		
		foreach($theses2 as $_SESSION['thesis']) {
			echo $_SESSION['thesis']->get_id() . " " . utf8_encode($_SESSION['thesis']->get_name()) . "<br>";
		}

		$universities = get_universities();

		foreach($universities as $university) {
			echo $university->get_name() . "<br>";
		}

		$schools = get_schools();

		foreach($schools as $school) {
			echo $school->get_name() . "<br>";
		}

		$educative_programs = get_educative_programs();

		foreach($educative_programs as $educative_program) {
			echo $educative_program->get_name() . "<br>";
		}
		
		$student = new Student;
		$university = new University;
		$school = new School;
		$educative_program = new EducativeProgram;

		$university->set_id(1);
		$university->set_name("Universidad de Colima");

		$school->set_id(1);
		$school->set_name("Facultad de Telemática");

		$educative_program->set_id(2);
		$educative_program->set_name("Ingeniería en Software");

		$student->set_full_name("Jorge Luis Aguirre Martínez");
		$student->set_university($university);
		$student->set_school($school);
		$student->set_educative_program($educative_program);
		$student->set_email("jaguirre@ucol.mx");

		$selected_thesis = $theses[1];

		if (send_request($selected_thesis, $student)) {
			echo "Solicitud enviada <br>";
		} else {
			echo "No se pudo enviar la solicitud";
		}

		$students = get_thesis_students($selected_thesis);

		foreach ($students as $student) {
			echo $student->get_full_name() . "<br>";
		}
	?>
</body>
</html>

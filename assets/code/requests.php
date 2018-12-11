<?php
    include_once '/include/db_connection.php';
    include_once 'researcher.php';
    
    session_start();
    
    function accept_student($student_id, $thesis)
    {       
        global $connection;
        $query = "UPDATE request SET RequestStatusID = 1 WHERE StudentID = ?";
        $stmt = $connection->stmt_init();
       
        if (is_available($thesis)) {
            if ($stmt->prepare($query)) {
                $stmt->bind_param("i", $student_id);
                $stmt->execute();

                update_assigned($thesis);
                update_thesis_full($thesis);
                
                return true;
            }
        }

        return false;
    }
    
    function is_available($thesis_id) 
    {
        $assigned = get_thesis_assigned($thesis_id);
        $plazas = get_thesis_plazas($thesis_id);
        
        if ($assigned < $plazas)
        {
            return true;
        }
        else
        {
            return false;   
        }
    }

    function update_assigned($thesis){
        
        global $connection;
        $query_update_thesis = "UPDATE thesis SET Assigned = ? WHERE ThesisID = ?";
        $stmt = $connection->stmt_init();
        $assigned = get_thesis_assigned($thesis) + 1;

        if ($stmt->prepare($query_update_thesis)) {
            $stmt->bind_param("ii", $assigned, $thesis);
            $stmt->execute();
            
            //Se usa la session thesis del botón ver más del formulario tabs porque es la segunda que carga
            $_SESSION['theses'][$thesis - 1]->set_assigned($assigned);

            return true;
        }	
        
        return false;
    }
    
    function update_thesis_full($thesis){
        
        global $connection;
        $query_update_thesis_full = "UPDATE thesis SET StatusID = 2 WHERE ThesisID = ?";
        $stmt = $connection->stmt_init();
        $assigned = get_thesis_assigned($thesis);
        $plazas = get_thesis_plazas($thesis);

        if ($stmt->prepare($query_update_thesis_full) && $assigned == $plazas) {
            $stmt->bind_param("i", $thesis);
            $stmt->execute();
            
            //Se usa la session del researcher porque es la primera que carga
            $_SESSION['researcher']->change_thesis_status($thesis, "No disponible");
            
            return true;
        }
        
        return false;
    }
    
function get_thesis_plazas($thesis) 
    {
        global $connection;
        $query_plazas = "SELECT PlazasID FROM thesis WHERE ThesisID = ?";  
        $stmt = $connection->stmt_init();

        if ($stmt->prepare($query_plazas)) {
            $stmt->bind_param("i", $thesis);
            $stmt->execute();
            $result = $stmt->get_result();

            $row = $result->fetch_array(MYSQLI_ASSOC);

            $plazas_id = $row['PlazasID'];

            return $plazas_id;            
        }

    }
        
    function get_thesis_assigned($thesis) 
    {
        global $connection;
        $query_assigned = "SELECT Assigned FROM thesis WHERE ThesisID = ?";  
        $stmt = $connection->stmt_init();

        if ($stmt->prepare($query_assigned)) {
            $stmt->bind_param("i", $thesis);
            $stmt->execute();
            $result = $stmt->get_result();

            $row = $result->fetch_array(MYSQLI_ASSOC);

            $assigned = $row['Assigned'];

            return $assigned;            
        }

    }
    
    function reject_student($student_id)
    {
        global $connection;
        $query = "UPDATE request SET RequestStatusID = 2 WHERE StudentID = ?";
        $stmt = $connection->stmt_init();

        if ($stmt->prepare($query)) {
            $stmt->bind_param("i", $student_id);
            $stmt->execute();

            return true;	
        }

        return false;
    }

    if (isset($_GET['accept']) && isset($_GET['thesis_id'])) {
        accept_student($_GET['accept'],$_GET['thesis_id']);
        header("Location: ../../requests.php");
    }
    
    if (isset($_GET['reject'])) {
        reject_student($_GET['reject']);
        header("Location: ../../requests.php");
    }
        
?>
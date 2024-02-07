$sqlQuery = "SELECT e.first_name, e.last_name, l.language, ex.years, e.city 
             FROM Employees e
             JOIN Experience ex ON e.employee_id = ex.employee_id
             JOIN Languages l ON ex.language_id = l.language_id
             WHERE ex.years = 5 AND l.language = 'PHP' AND e.city = 'Melbourne'";

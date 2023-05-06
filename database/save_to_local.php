<?php 
class DatabaseBackup {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function backup() {
        // Query to get all tables and their data from database
        $tables = array();
        $query = "SHOW TABLES";
        $result = mysqli_query($this->conn, $query);

        while ($row = mysqli_fetch_row($result)) {
            $tables[] = $row[0];
        }

        // Loop through each table and generate SQL dump
        $sql_dump = "";

        foreach ($tables as $table) {
            $query = "SHOW CREATE TABLE $table";
            $result = mysqli_query($this->conn, $query);
            $row = mysqli_fetch_row($result);
            $sql_dump .= $row[1] . ";";

            $query = "SELECT * FROM $table";
            $result = mysqli_query($this->conn, $query);
            $num_fields = mysqli_num_fields($result);

            while ($row = mysqli_fetch_row($result)) {
                $sql_dump .= "\nINSERT INTO $table VALUES(";
                for ($i = 0; $i < $num_fields; $i++) {
                    if (isset($row[$i])) {
                        $sql_dump .= "'" . mysqli_real_escape_string($this->conn, $row[$i]) . "'";
                    } else {
                        $sql_dump .= "NULL";
                    }

                    if ($i < $num_fields - 1) {
                        $sql_dump .= ",";
                    }
                }

                $sql_dump .= ");";
            }

            $sql_dump .= "\n\n";
        }

        // Generate file name and path
        $filename = "database_backup_" . date("Y-m-d") . ".sql";
        $filepath = "../database/" . $filename;

        // Save SQL dump to file
        $file = fopen($filepath, "w");

        if ($file === false) {
            die("Error creating file.");
        }

        if (fwrite($file, $sql_dump) === false) {
            die("Error writing to file.");
        }

        fclose($file);

        echo "File saved successfully.";
    }
}

?>
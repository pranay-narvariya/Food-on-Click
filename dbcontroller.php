<?php 
	$serverName = "USER-PC\SQLEXPRESS";
	$connectionInfo = array( "Database"=>"Food");

	/* Connect using Windows Authentication. */
	$conn = sqlsrv_connect( $serverName, $connectionInfo);
	if( $conn === false )
	{
		echo "Unable to connect.</br>";
		die( print_r( sqlsrv_errors(), true));
	}

	/* Query SQL Server for the login of the user accessing the
	database. */
	
	function Runquery($query)
	{
		global $conn;
		$stmt = sqlsrv_query($conn, $query);

		while ($row = sqlsrv_fetch_object($stmt))
		{
			$result[] = $row;
		}
		return $result;
	}
	
	function Numofrow($query)
	{
		$stmt = sqlsrv_query( $conn, $query);

		$row_count = sqlsrv_num_rows( $stmt );

		return $row_count;
	}
?>

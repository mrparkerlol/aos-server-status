<?php
// Include the configuration
include 'config.php';

// Retrieve the resource
$resource_content = file_get_contents($resource);

// Decode the JSON
$a = json_decode(file_get_contents($resource), true);
$n = count($a);

// Is the server in the resource?
if (strpos($resource_content, $server_ip) == false) {
?>
	<!-- The server appears to not be in the list -->
	<div style="color: <?php echo $offline_color; ?>;"><?php echo $offline_message; ?></div>
<?php
} else {
?>
	<!-- The server is in the list -->
	<div style="color: <?php echo $online_color; ?>;"><?php echo $online_message; ?></div>
<?php
}

// Loop through the result
for($i=0; $i < $n; $i++)
{
	// Is the server ip found?
    if($a[$i]['identifier'] == $server_ip)
    {
		// Variables to store information
		$server_name = $a[$i]['name'];
		$server_players = $a[$i]['players_current'] . '/' . $a[$i]['players_max'];
		$server_map = $a[$i]['map'];
		$server_latency = $a[$i]['latency'];
		$server_gamemode = $a[$i]['game_mode'];
		$server_country =  $a[$i]['country'];
		$server_version = $a[$i]['game_version'];
	?>
	<!-- Output the information -->
<table>
	<tr>
		<td><b>Server: <?php echo $server_name; ?></b></td>
  </tr>
	<tr>
		<td><b>Players: <?php echo $server_players; ?></b></td>
  </tr>
  <tr>
		<td><b>Map: <?php echo $server_map; ?></b></td>
  </tr>
  <tr>
		<td><b>Ping: <?php echo $server_latency; ?></b></td>
  </tr>
  <tr>
    <td><b>Mode: <?php echo $server_gamemode; ?></b></td>
  </tr>
	<tr>
    <td><b>Country: <?php echo $server_country; ?></b></td>
  </tr>
	<tr>
		<td><a href='<?php echo $server_ip . ":" . $server_version; ?>'><?php echo $join_message; ?></a></td>
  </tr>
 </table>
<?php
	  // Prevent the looping of the output
	  exit();
	}
}
?>

<?php
include 'config.php';

$resource_content = file_get_contents($resource);

if (strpos($resource_content, $server_ip) == false) {
?>
	<div style="color: <?php echo $offline_color; ?>;"><?php echo $offline_message; ?></div>
<?php
} else {
?>
	<div style="color: <?php echo $online_color; ?>;"><?php echo $online_message; ?></div>
<?php
}

$a = json_decode(file_get_contents($resource), true);

$n = count($a);

for($i=0; $i < $n; $i++)
{
    if($a[$i]['identifier'] == $server_ip)
    {
		// Variables to store information
		$server_name = $a[$i]['name'];
		$server_players = $a[$i]['players_current'] . '/' . $a[$i]['players_max'];
		$server_map = $a[$i]['map'];
		$server_latency = $a[$i]['latency'];
		$server_gamemode = $a[$i]['game_mode'];
		$server_country =  $a[$i]['country'];
		
		?>
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
		<td><a href='<?php echo $server_ip; ?>'><?php echo $join_message; ?></a></td>
    </tr>
 </table>
        <?php
        exit();
    }
}
?>
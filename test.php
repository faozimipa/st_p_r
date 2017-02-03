<?php 
$data = array(
	[
		'nama' => 'A',
		'Kelas' => '1',
	],
	[
		'nama' => 'B',
		'Kelas' => '2',
	],
	[
		'nama' => 'C',
		'Kelas' => '3',
	]
);
$var = "ini data";
foreach($data as $d){
	$var.=$d['nama'].' dan '. $d['Kelas'];
}
echo $var;
?>
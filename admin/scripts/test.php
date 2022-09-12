<?php
 if(!empty($_POST[‘data’])){
$data = $_POST[‘data’];
$fname = ‘newpdf-‘.date(‘d-m-Y’).’.pdf’; // name the file
$file = fopen(“../upload/” .$fname, ‘w’); // open the file path
fwrite($file, $data); //save data
fclose($file); 
 
} else {
echo “No Data Sent”;
}
?>
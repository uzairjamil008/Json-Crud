<?php
if(isset($_POST['delete'])) {
$id = $_POST['id'];
// read json file
$data = file_get_contents('file.json');
// decode json to associative array
$json_arr = json_decode($data, true);
// get array index to delete data
$arr_index = array();
$resule = array_search($id, array_column($json_arr, 'id'));
unset($json_arr[$resule]);
// rebase array
$json_arr = array_values($json_arr);
// encode array to json and save to file
file_put_contents('file.json', json_encode($json_arr));
header("location:jsonshowdata.php");
}
?>
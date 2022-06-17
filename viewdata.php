<?php
//this PHP code is written for show data in view list
if(isset($_POST['id'])) {
    $id = $_POST['id'];
    // read json file
    $data = file_get_contents('file.json');
    // decode json to associative array
    $json_arr = json_decode($data, true);
    //multidimensional array
    $resule = array_search($id, array_column($json_arr, 'id'));
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>
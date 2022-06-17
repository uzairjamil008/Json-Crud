<?php
//This PHP code is written for update data in json file 
if(isset($_POST['update'])) {
    $id = $_POST['id'];
    // read json file
    $data = file_get_contents('file.json');
    // decode json to associative array
    $json_arr = json_decode($data, true);
    //multidimensional array for search result from json file through id and show result in update foam
    $resule = array_search($id, array_column($json_arr, 'id'));
    $json_arr[$resule]['id'] = $_POST['id'];
    $json_arr[$resule]['szPlotIdUniqueKey'] = $_POST['uniqueid'];
    $json_arr[$resule]['fPrice'] = $_POST['price'];
    $json_arr[$resule]['szRow'] = $_POST['row'];
    $json_arr[$resule]['szPlot'] = $_POST['plot'];
    $json_arr[$resule]['szLot'] = $_POST['lot'];
    $json_arr[$resule]['szCentroidLatitude'] = $_POST['latitude'];
    $json_arr[$resule]['szCentroidLongtitude'] = $_POST['longitude'];
    $json_arr[$resule]['szCentroidNorthing'] = $_POST['cnorthing'];
    $json_arr[$resule]['szCentroidEasting'] = $_POST['ceasting'];
    $json_arr[$resule]['szNECornerLatitude'] = $_POST['neclatitude'];
    $json_arr[$resule]['szNECornerLongitude'] = $_POST['neclongitude'];
    $json_arr[$resule]['szNWCornerLatitude'] = $_POST['nwclatitude'];
    $json_arr[$resule]['szNWCornerLongitude'] = $_POST['nwclongitude'];
    $json_arr[$resule]['szSECornerLatitude'] = $_POST['seclatitude'];
    $json_arr[$resule]['szSECornerLongitude'] = $_POST['seclongitude'];
    $json_arr[$resule]['szSWCornerLatitude'] = $_POST['swclatitude'];
    $json_arr[$resule]['szSWCornerLongitude'] = $_POST['swclongitude'];
    $json_arr[$resule]['boundaryPlot'] = $_POST['bplot'];
    $json_arr[$resule]['cornerPlot'] = $_POST['cplot'];
    $json_arr[$resule]['PriceWithTax'] = $_POST['pwithtax'];
    $final_result=json_encode($json_arr);
    if(file_put_contents('file.json', $final_result)) {
        header("location:jsonshowdata.php");
    }
}
?>
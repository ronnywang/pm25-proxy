<?php

$doc = new DOMDocument;
@$doc->loadHTML(file_get_contents('http://taqm.epa.gov.tw/taqm/tw/Pm25Index.aspx'));
$area_psi_dom = $doc->getElementById('AreaPsi');
$ret = array();
foreach ($area_psi_dom->getElementsByTagName('area') as $area_dom) {
    if ($area_dom->getAttribute('class') != 'jTip') {
        continue;
    }
    $ret[] = json_decode($area_dom->getAttribute('jtitle'));
}
header('Content-Type: text/json');
echo json_encode($ret);

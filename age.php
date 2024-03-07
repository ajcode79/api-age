<?php
header('Content-type: application/json;');
$date = str_replace(['/'],['-'],$_GET['date']);
$doc = new DOMDocument();
$doc->loadHTMLFile("https://vahidmajidi.com/$date/محاسبه-سن");
$xpath = new DOMXPath($doc);
$elements = $xpath->query("//div[@class='alert shadow py-1 px-3 mb-2 text-center']");
if(count($elements) == 0){
        echo json_encode(['status' => 400,'dev' => ajcode,'message' => 'error for result'], 448);
    } else {
        foreach ($elements as $element) {
            $result[] = trim(strip_tags($element->textContent));
        }
        echo json_encode(['status' => 200,'dev' => ajcode,'result' => $result], 448);
}
?>

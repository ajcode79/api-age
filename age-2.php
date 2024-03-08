<?php
header('Content-type: application/json;');
$date = $_GET['date'];
$dom = new DOMDocument();
$dom->loadHTMLFile("https://birth.carbalad.com/$date/male/2LTZhdin");
$xpath = new DOMXPath($dom);
$res = $xpath->query('//h1');
$res1 = $xpath->query('//h2');
$res2 = $xpath->query('//u');
$res3 = $xpath->query('//div[@class="q"]');
if($res[0]->nodeValue == null){
    echo json_encode(['status' => 400,'dev' => ajcode,'message' => 'error'], 448);
    exit();
}
$result = [
    $res[0]->nodeValue,
    $res1[0]->nodeValue,
    "تاریخ تولد شما به میلادی : ".$res2[0]->nodeValue,
    "تاریخ تولد شما به هجری قمری : ".$res2[1]->nodeValue,
    "سن شما امروز ".$res2[2]->nodeValue." سال و ".$res2[3]->nodeValue." ماه و ".$res2[4]->nodeValue." روز است",
    "شما امروز ".$res2[5]->nodeValue." هستید",
    "شما در روز ".$res2[6]->nodeValue." و در فصل ".$res2[7]->nodeValue." به دنیا آمدید",
    "شما در سال ".$res2[8]->nodeValue." متولد شدید و نماد ماه تولدتان هم ".$res2[9]->nodeValue." است",
    "روز دیگر تولد شما است ".$res2[10]->nodeValue,
    "از وقتی به دنیا اومدی ماه ".$res2[11]->nodeValue." بار به دور زمین چرخیده است",
    "وقتی به دنیا اومدی جمعیت تقریبی جهان ".$res2[12]->nodeValue." نفر بود",
    "شما تا بحال ".$res2[13]->nodeValue." ساعت خوابیده اید",
    "شما تا امروز ".$res2[14]->nodeValue." ساعت در حال غذا خوردن بوده و میزان ".$res2[15]->nodeValue." کیلوگرم غذا در ".$res2[16]->nodeValue." وعده غذا خورده اید",
    $res3[15]->nodeValue
];
echo json_encode(['status' => 200,'dev' => ajcode,'result' => $result], 448);
?>

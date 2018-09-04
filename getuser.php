<?php

#ini_set(default_charset, "utf-8");
#header('Content-Type: application/json; charset=utf-8');
#header('Content-Type: application/json');
header('Content-Type: text/plain; charset=utf-8');
if(!isset($_GET["fname"]))
	exit -1;
if(!isset($_GET["sname"]))
	exit -1;
if(!isset($_GET["flast"]))
	exit -1;
if(!isset($_GET["slast"]))
	exit -1;

include('simple_html_dom.php');
$html = new simple_html_dom();
$html->load_file("https://scholar.google.es/citations?view_op=search_authors&mauthors=". $_GET["fname"]."+".$_GET["flast"]."&hl=es&oi=drw");


$str = "{\n \"Autors\": [";
$a=-1;
foreach($html->find(".gsc_oai") as $pub) {
	$str .= "\n  {\n    \"Name\": \"" . str_replace('"',"'",$pub->find(".gsc_oai_name", 0)->plaintext);
	$institution0=html_entity_decode(utf8_encode ($pub->find(".gsc_oai_aff", 0)->plaintext), ENT_QUOTES, 'UTF-8');
	$institution0=str_replace('"',"'",$institution0);
	$str .= "\",\n    \"institution\": \"" . $institution0;
	$user = $pub->find("a", 0)->href;
	$rest = substr($user, 16,12);
	$a=$a+1;
	$uservalidate[$a]=$rest;
	$str .= "\",\n    \"user\": \"" . $rest ."\"";
	$str .= "\n  },";
}
$html->load_file("https://scholar.google.com/citations?hl=en&view_op=search_authors&mauthors=". $_GET["fname"]."+".$_GET["flast"]."+".$_GET["slast"]."&btnG=");
$b=-1;
foreach($html->find(".gsc_oai") as $pub) {
	$user = $pub->find("a", 0)->href;
	$rest = substr($user, 16,12);

			$b=$b+1;
			$namee[$b]=str_replace('"',"'",$pub->find(".gsc_oai_name", 0)->plaintext);
			$inst[$b]=str_replace('"',"'",html_entity_decode(utf8_encode ($pub->find(".gsc_oai_aff", 0)->plaintext), ENT_QUOTES, 'UTF-8'));
			$uservalidate1[$b]=$rest;

}
$y=0;
for ($i=0; $i <= $b; $i++) {
	if (in_array($uservalidate1[$i], $uservalidate)) {

}else{
		$str .= "\n  {\n    \"Name\": \"" . $namee[$i];
		$str .= "\",\n    \"institution\": \"" . $inst[$i];
		$str .= "\",\n    \"user\": \"" . $uservalidate1[$i] ."\"";
		$str .= "\n  },";
		$y=$y+1;
		$uservalidate[$a+$y]=$uservalidate1[$i];
}
}


$a=$a+$b;
$b=0;
$html->load_file("https://scholar.google.com/citations?hl=en&view_op=search_authors&mauthors=". $_GET["fname"]."+".$_GET["sname"]."+".$_GET["flast"]."+".$_GET["slast"]."&btnG=");


$b=-1;
foreach($html->find(".gsc_oai") as $pub) {
	$user = $pub->find("a", 0)->href;
	$rest = substr($user, 16,12);

			$b=$b+1;
			$namee2[$b]=str_replace('"',"'",$pub->find(".gsc_oai_name", 0)->plaintext);
			$inst2[$b]=$inst[$b]=str_replace('"',"'",html_entity_decode(utf8_encode ($pub->find(".gsc_oai_aff", 0)->plaintext), ENT_QUOTES, 'UTF-8'));
			$uservalidate2[$b]=$rest;

}
$y=0;
for ($i=0; $i <= $b; $i++) {
	if (in_array($uservalidate2[$i], $uservalidate)) {

}else{
		$str .= "\n  {\n    \"Name\": \"" . $namee2[$i];
		$str .= "\",\n    \"institution\": \"" . $inst2[$i];
		$str .= "\",\n    \"user\": \"" . $uservalidate2[$i] ."\"";
		$str .= "\n  },";
		$y=$y+1;
		$uservalidate[$a+$y]=$uservalidate2[$i];
}
}


print substr($str, 0, -1) . "\n] \n}";

?>

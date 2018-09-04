<?php

#ini_set(default_charset, "utf-8");
#header('Content-Type: application/json; charset=utf-8');
#header('Content-Type: application/json');
//header('HTTP/1.1 200 OK');
header('Content-Type: text/plain; charset=utf-8');
if(!isset($_GET["puser"]))
	exit -1;

include('simple_html_dom.php');
$puser=$_GET["puser"];
$user=substr($puser, 0,12);
$pub=substr($puser, 12,12);
$html = new simple_html_dom();
$html->load_file("https://scholar.google.es/citations?view_op=view_citation&hl=en&user=".$user."&sortby=title&citation_for_view=".$user.":".$pub."&tzom=300");

$str = "";
$mytititle=$html->find(".gsc_vcd_title_link", 0);
if (!empty($mytititle)) {
	$mytititle = html_entity_decode(utf8_encode ($html->find(".gsc_vcd_title_link", 0)->plaintext), ENT_QUOTES, 'UTF-8');
}
$str .= "{\n\"title\":\"" .  str_replace('"',"'",html_entity_decode($mytititle, ENT_QUOTES, 'UTF-8'));
$comparation=array();
for ($i=0; $i < 10; $i++) {
	$comparation[$i] = $html->find(".gs_scl .gsc_vcd_field", $i);
//echo "\n".$comparation[$i];
}
$i = 0;
$a = 0;
do {
    if ($comparation[$i]!="") {
    	$a=$a+1;
    }
$i=1+$i;
} while ($i < 10);
for ($i=0; $i <$a ; $i++) {
	$compara[$i] = $html->find(".gs_scl .gsc_vcd_field", $i)->plaintext;
	$value[$i] = str_replace('"',"'",html_entity_decode(utf8_encode ($html->find(".gs_scl .gsc_vcd_value", $i)->plaintext), ENT_QUOTES, 'UTF-8'));
	if ($compara[$i]=="Authors" || $compara[$i]=="Inventors") {
		$mat['Authors']=$value[$i];
	}elseif ($compara[$i]=="Publication date") {
		$mat['pub_date']=$value[$i];
	}elseif ($compara[$i]=="Conference") {
		$mat['Conference']=$value[$i];
	}elseif ($compara[$i]=="Journal") {
		$mat['Journal']=$value[$i];
	}elseif ($compara[$i]=="Book") {
		$mat['Book']=$value[$i];
	}elseif ($compara[$i]=="Volume") {
		$mat['Volume']=$value[$i];
	}elseif ($compara[$i]=="Issue") {
		$mat['Issue']=$value[$i];
	}elseif ($compara[$i]=="Pages") {
		$mat['Pages']=$value[$i];
	}elseif ($compara[$i]=="Publisher") {
		$mat['Publisher']=$value[$i];
	}elseif ($compara[$i]=="Description") {
		$mat['abstract']=$value[$i];
	}elseif ($compara[$i]=="Institution") {
		$mat['Institution']=$value[$i];
	}elseif ($compara[$i]=="Patent number") {
		$mat['Number']=$value[$i];
	}elseif ($compara[$i]=="Patent office") {
		$mat['P_office']=$value[$i];
	}elseif ($compara[$i]=="Application number") {
		$mat['app_num']=$value[$i];
	}
}
if (!isset($mat['Authors'])){
	$mat['Authors']= " ";
}
if (!isset($mat['pub_date'])) {
	$mat['pub_date']=" ";
}
if (!isset($mat['Conference'])) {
	$mat['Conference']=" ";
}
if (!isset($mat['Journal'])) {
	$mat['Journal']=" ";
}
if (!isset($mat['Book'])) {
	$mat['Book']=" ";
}
if (!isset($mat['Volume'])) {
	$mat['Volume']=" ";
}
if (!isset($mat['Issue'])) {
	$mat['Issue']=" ";
}
if (!isset($mat['Pages'])) {
	$mat['Pages']=" ";
}
if (!isset($mat['Publisher'])) {
	$mat['Publisher']=" ";
}
if (!isset($mat['abstract'])) {
	$mat['abstract']=" ";
}
if (!isset($mat['Institution'])) {
	$mat['Institution']=" ";
}
if (!isset($mat['Number'])) {
	$mat['Number']=" ";
}
if (!isset($mat['P_office'])) {
	$mat['P_office']=" ";
}
if (!isset($mat['app_num'])) {
	$mat['app_num']=" ";
}
$str .= "\",\n\"authors\":\"" . $mat['Authors']. "\",";
$str .= "\n\"Publication date\":\"" . $mat['pub_date']. "\",";
$str .= "\n\"Conference\":\"" . $mat['Conference']. "\",";
$str .= "\n\"Journal\":\"" . $mat['Journal']. "\",";
$str .= "\n\"Book\":\"" . $mat['Book']. "\",";
$str .= "\n\"Volume\":\"" . $mat['Volume']. "\",";
$str .= "\n\"Issue\":\"" . $mat['Issue']. "\",";
$str .= "\n\"Pages\":\"" . $mat['Pages']. "\",";
$str .= "\n\"Publisher\":\"" . $mat['Publisher']. "\",";
$str .= "\n\"P_office\":\"" . $mat['P_office']. "\",";
$str .= "\n\"app_num\":\"" . $mat['app_num']. "\",";
$myabstract=$mat['abstract'];
$myabstract=explode("\r\n", $myabstract);
$abstr=implode(" ", $myabstract);
$str .= "\n\"abstract\":\"" . html_entity_decode($abstr, ENT_QUOTES, 'UTF-8'). "\",";
$str .= "\n\"Institution\":\"" . $mat['Institution']. "\",";
$str .= "\n\"Number\":\"" . $mat['Number']. "\",\n";
$myurl=$html->find(".gsc_vcd_title_ggi a", 0);
if (!empty($myurl)) {
	$myurl = $html->find(".gsc_vcd_title_ggi a", 0)->href;
}
$str .= "\"URL\": \"" . $myurl . "\"\n}";
$str .= "\n}";
print substr($str, 0, -1);

<?php

#ini_set(default_charset, "utf-8");
#header('Content-Type: application/json; charset=utf-8');
#header('Content-Type: application/json');
header('Content-Type: text/plain; charset=utf-8');

if(!isset($_GET["user"]))
exit -1;

# create and load the HTML
include('simple_html_dom.php');
$user=substr($_GET["user"], 0,12);
$size=substr($_GET["user"], 12,3);
$html = new simple_html_dom();
$myurl="https://scholar.google.es/citations?user=".$user."&hl=es";
$html->load_file($myurl);

if (!empty($html->find("#gsc_rsb_st td.gsc_rsb_std", 0))) {
	$cita=$html->find("#gsc_rsb_st td.gsc_rsb_std", 0)->plaintext;
}else{
	$cita='0';
}
if (!empty($html->find("#gsc_rsb_st .gsc_rsb_std", 2))) {
	$indice=$html->find("#gsc_rsb_st .gsc_rsb_std", 2)->plaintext;
}else{
	$indice='0';
}
print "{\n \"total_citations\": \"" . $cita . "\",\n";

	print " \"indice h\": \"" . $indice . "\",\n";

	$s = " \"citations_per_year\": {";
		$years = $html->find('#gsc_g_x .gsc_g_t');
		$scores = $html->find('#gsc_g_bars .gsc_g_al');
		foreach($scores as $key => $score) {
			$s .= "\n  \"" . $years[$key]->plaintext ."\": ". $score->plaintext . ",";
		}
		print substr($s, 0, -1) . "\" \",\n";


		$str = " \"publications\": [ ";
		foreach($html->find("#gsc_a_t .gsc_a_tr") as $pub) {
			$mytitle=$pub->find(".gsc_a_at", 0);
			if (!empty($mytitle)) {
				$mytitle=$pub->find(".gsc_a_at", 0)->plaintext;

				$myauthor=$pub->find(".gs_gray", 0);
				if (!empty($myauthor)) {
					$myauthor=$pub->find(".gs_gray", 0)->plaintext;
				}
				$str .= "\n  {\n    \"title\": \"" . str_replace('"',"'",html_entity_decode($mytitle, ENT_QUOTES, 'UTF-8'));
					$str .= "\",\n    \"authors\": \"" . str_replace('"',"'",html_entity_decode($myauthor, ENT_QUOTES, 'UTF-8'));
					$myvenue=$pub->find(".gs_gray", 1);
					if (!empty($myvenue)) {
						$myvenue=$pub->find(".gs_gray", 1)->plaintext;
					}
					$str .= "\",\n    \"venue\": \"" . str_replace('"',"'",html_entity_decode($myvenue, ENT_QUOTES, 'UTF-8'));
					if (!empty($pub->find(".gsc_a_ac", 0))) {
						if($pub->find(".gsc_a_ac", 0)->plaintext == "&nbsp;")
						$str .= "\",\n    \"citations\": \"0\"";
						else
						$str .= "\",\n    \"citations\": \"" . $pub->find(".gsc_a_ac", 0)->plaintext." \"";
					}
					if (!empty($pub->find(".gsc_a_h", 0))) {
						if($pub->find(".gsc_a_h", 0)->plaintext == " ")
						$str .= ",\n    \"year\": \"0";
						else
						$str .= ",\n    \"year\": \"" . $pub->find(".gsc_a_h", 0)->plaintext;
					}

					$idpub=substr($pub->find("a", 0), 153,12);
					$str .= "\",\n    \"idpub\": \"" .$idpub;
					$str .= "\"\n  },";
				}
			}

			if ($size=="100" || $size=="200" || $size=="300" || $size=="400" || $size=="500") {
				$html100 = new simple_html_dom();
				$myurl100="https://scholar.google.es/citations?user=".$user."&hl=es&cstart=20&pagesize=80";
				$html100->load_file($myurl100);
				foreach($html100->find("#gsc_a_t .gsc_a_tr") as $pub) {
					$mytitle=$pub->find(".gsc_a_at", 0);
					if (!empty($mytitle)) {
						$mytitle=$pub->find(".gsc_a_at", 0)->plaintext;
						$myauthor=$pub->find(".gs_gray", 0);
						if (!empty($myauthor)) {
							$myauthor=$pub->find(".gs_gray", 0)->plaintext;
						}
						$str .= "\n  {\n    \"title\": \"" . str_replace('"',"'",html_entity_decode($mytitle, ENT_QUOTES, 'UTF-8'));
							$str .= "\",\n    \"authors\": \"" . str_replace('"',"'",html_entity_decode($myauthor, ENT_QUOTES, 'UTF-8'));
							$myvenue=$pub->find(".gs_gray", 1);
							if (!empty($myvenue)) {
								$myvenue=$pub->find(".gs_gray", 1)->plaintext;
							}
							$str .= "\",\n    \"venue\": \"" . str_replace('"',"'",html_entity_decode($myvenue, ENT_QUOTES, 'UTF-8'));
							if (!empty($pub->find(".gsc_a_ac", 0))) {
								if($pub->find(".gsc_a_ac", 0)->plaintext == "&nbsp;")
								$str .= "\",\n    \"citations\": \"0\"";
								else
								$str .= "\",\n    \"citations\": \"" . $pub->find(".gsc_a_ac", 0)->plaintext." \"";
							}
							if (!empty($pub->find(".gsc_a_h", 0))) {
								if($pub->find(".gsc_a_h", 0)->plaintext == " ")
								$str .= ",\n    \"year\": \"0";
								else
								$str .= ",\n    \"year\": \"" . $pub->find(".gsc_a_h", 0)->plaintext;
							}
							$idpub=substr($pub->find("a", 0), 183,12);
							$str .= "\",\n    \"idpub\": \"" .$idpub;
							$str .= "\" \n  },";
						}
					}
				}

			if ($size=="200" || $size=="300" || $size=="400" || $size=="500") {
				$html100 = new simple_html_dom();
				$myurl100="https://scholar.google.es/citations?user=".$user."&hl=es&cstart=100&pagesize=100";
				$html100->load_file($myurl100);
				foreach($html100->find("#gsc_a_t .gsc_a_tr") as $pub) {
					$mytitle=$pub->find(".gsc_a_at", 0);
					if (!empty($mytitle)) {
						$mytitle=$pub->find(".gsc_a_at", 0)->plaintext;
						$myauthor=$pub->find(".gs_gray", 0);
						if (!empty($myauthor)) {
							$myauthor=$pub->find(".gs_gray", 0)->plaintext;
						}
						$str .= "\n  {\n    \"title\": \"" . str_replace('"',"'",html_entity_decode($mytitle, ENT_QUOTES, 'UTF-8'));
							$str .= "\",\n    \"authors\": \"" . str_replace('"',"'",html_entity_decode($myauthor, ENT_QUOTES, 'UTF-8'));
							$myvenue=$pub->find(".gs_gray", 1);
							if (!empty($myvenue)) {
								$myvenue=$pub->find(".gs_gray", 1)->plaintext;
							}
							$str .= "\",\n    \"venue\": \"" . str_replace('"',"'",html_entity_decode($myvenue, ENT_QUOTES, 'UTF-8'));
							if (!empty($pub->find(".gsc_a_ac", 0))) {
								if($pub->find(".gsc_a_ac", 0)->plaintext == "&nbsp;")
								$str .= "\",\n    \"citations\": \"0\"";
								else
								$str .= "\",\n    \"citations\": \"" . $pub->find(".gsc_a_ac", 0)->plaintext." \"";
							}
							if (!empty($pub->find(".gsc_a_h", 0))) {
								if($pub->find(".gsc_a_h", 0)->plaintext == " ")
								$str .= ",\n    \"year\": \"0";
								else
								$str .= ",\n    \"year\": \"" . $pub->find(".gsc_a_h", 0)->plaintext;
							}
							$idpub=substr($pub->find("a", 0), 185,12);
							$str .= "\",\n    \"idpub\": \"" .$idpub;
							$str .= "\" \n  },";
						}
					}
				}
				if ($size=="300" || $size=="400" || $size=="500") {
					$html200 = new simple_html_dom();
					$myurl200="https://scholar.google.es/citations?user=".$user."&hl=es&cstart=200&pagesize=100";
					$html200->load_file($myurl200);
					foreach($html200->find("#gsc_a_t .gsc_a_tr") as $pub) {

						$mytitle=$pub->find(".gsc_a_at", 0);
						if (!empty($mytitle)) {
							$mytitle=$pub->find(".gsc_a_at", 0)->plaintext;

							$myauthor=$pub->find(".gs_gray", 0);
							if (!empty($myauthor)) {
								$myauthor=$pub->find(".gs_gray", 0)->plaintext;
							}
							$str .= "\n  {\n    \"title\": \"" . str_replace('"',"'",html_entity_decode($mytitle, ENT_QUOTES, 'UTF-8'));
								$str .= "\",\n    \"authors\": \"" . str_replace('"',"'",html_entity_decode($myauthor, ENT_QUOTES, 'UTF-8'));
								$myvenue=$pub->find(".gs_gray", 1);
								if (!empty($myvenue)) {
									$myvenue=$pub->find(".gs_gray", 1)->plaintext;
								}
								$str .= "\",\n    \"venue\": \"" . str_replace('"',"'",html_entity_decode($myvenue, ENT_QUOTES, 'UTF-8'));
								if (!empty($pub->find(".gsc_a_ac", 0))) {
									if($pub->find(".gsc_a_ac", 0)->plaintext == "&nbsp;")
									$str .= "\",\n    \"citations\": \"0\"";
									else
									$str .= "\",\n    \"citations\": \"" . $pub->find(".gsc_a_ac", 0)->plaintext." \"";
								}
								if (!empty($pub->find(".gsc_a_h", 0))) {
									if($pub->find(".gsc_a_h", 0)->plaintext == " ")
									$str .= ",\n    \"year\": \"0";
									else
									$str .= ",\n    \"year\": \"" . $pub->find(".gsc_a_h", 0)->plaintext;
								}
								$idpub=substr($pub->find("a", 0), 185,12);
								$str .= "\",\n    \"idpub\": \"" .$idpub;
								$str .= "\" \n  },";
							}
						}
					}
					if ($size=="400" || $size=="500") {
						$html300 = new simple_html_dom();
						$myurl300="https://scholar.google.es/citations?user=".$user."&hl=es&cstart=300&pagesize=100";
						$html300->load_file($myurl300);
						foreach($html300->find("#gsc_a_t .gsc_a_tr") as $pub) {

							$mytitle=$pub->find(".gsc_a_at", 0);
							if (!empty($mytitle)) {
								$mytitle=$pub->find(".gsc_a_at", 0)->plaintext;

								$myauthor=$pub->find(".gs_gray", 0);
								if (!empty($myauthor)) {
									$myauthor=$pub->find(".gs_gray", 0)->plaintext;
								}
								$str .= "\n  {\n    \"title\": \"" . str_replace('"',"'",html_entity_decode($mytitle, ENT_QUOTES, 'UTF-8'));
									$str .= "\",\n    \"authors\": \"" . str_replace('"',"'",html_entity_decode($myauthor, ENT_QUOTES, 'UTF-8'));
									$myvenue=$pub->find(".gs_gray", 1);
									if (!empty($myvenue)) {
										$myvenue=$pub->find(".gs_gray", 1)->plaintext;
									}
									$str .= "\",\n    \"venue\": \"" . str_replace('"',"'",html_entity_decode($myvenue, ENT_QUOTES, 'UTF-8'));
									if (!empty($pub->find(".gsc_a_ac", 0))) {

										if($pub->find(".gsc_a_ac", 0)->plaintext == "&nbsp;")
										$str .= "\",\n    \"citations\": \"0\"";
										else
										$str .= "\",\n    \"citations\": \"" . $pub->find(".gsc_a_ac", 0)->plaintext." \"";
									}
									if (!empty($pub->find(".gsc_a_h", 0))) {
										if($pub->find(".gsc_a_h", 0)->plaintext == " ")
										$str .= ",\n    \"year\": \"0";
										else
										$str .= ",\n    \"year\": \"" . $pub->find(".gsc_a_h", 0)->plaintext;
									}
									$idpub=substr($pub->find("a", 0), 185,12);
									$str .= "\",\n    \"idpub\": \"" .$idpub;
									$str .= "\"\n  },";
								}
							}
						}
						if ($size=="500") {
							$html400 = new simple_html_dom();
							$myurl400="https://scholar.google.es/citations?user=".$user."&hl=es&cstart=400&pagesize=100";
							$html400->load_file($myurl400);
							foreach($html400->find("#gsc_a_t .gsc_a_tr") as $pub) {

								$mytitle=$pub->find(".gsc_a_at", 0);
								if (!empty($mytitle)) {
									$mytitle=$pub->find(".gsc_a_at", 0)->plaintext;
									$myauthor=$pub->find(".gs_gray", 0);
									if (!empty($myauthor)) {
										$myauthor=$pub->find(".gs_gray", 0)->plaintext;
									}
									$str .= "\n  {\n    \"title\": \"" . str_replace('"',"'",html_entity_decode($mytitle, ENT_QUOTES, 'UTF-8'));
										$str .= "\",\n    \"authors\": \"" . str_replace('"',"'",html_entity_decode($myauthor, ENT_QUOTES, 'UTF-8'));
										$myvenue=$pub->find(".gs_gray", 1);
										if (!empty($myvenue)) {
											$myvenue=$pub->find(".gs_gray", 1)->plaintext;
										}
										$str .= "\",\n    \"venue\": \"" . str_replace('"',"'",html_entity_decode($myvenue, ENT_QUOTES, 'UTF-8'));
										if (!empty($pub->find(".gsc_a_ac", 0))) {

											if($pub->find(".gsc_a_ac", 0)->plaintext == "&nbsp;")
											$str .= "\",\n    \"citations\": \"0\"";
											else
											$str .= "\",\n    \"citations\": \"" . $pub->find(".gsc_a_ac", 0)->plaintext." \"";
										}
										if (!empty($pub->find(".gsc_a_h", 0))) {
											if($pub->find(".gsc_a_h", 0)->plaintext == " ")
											$str .= ",\n    \"year\": \"0";
											else
											$str .= ",\n    \"year\": \"" . $pub->find(".gsc_a_h", 0)->plaintext;
										}
										$idpub=substr($pub->find("a", 0), 185,12);
										$str .= "\",\n    \"idpub\": \"" .$idpub;
										$str .= "\" \n  },";
									}
								}
							}

							print substr($str, 0, -1) . "\n ]\n}";
							?>

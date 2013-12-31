
<!--
Скріптик для виведення показників із virtualsoft.tdmu.edu.ua 
 - Чеканов Сергій Борисович
 - milenium.sergiy@gmail.com
 15.12.2013 
 
 бла бла бла)))))
-->
<style>
.milka td {padding: 1px;
			border-left:  1px solid #666;
			border-right:  1px solid #666;
			border-bottom: 1px solid #666;
			border-top: 1px solid #666;
			background-color:#ffffff;
		}
.milka td:hover{
			background-color:#f8dd80;
}
.milka body{
			background-color:#EEEFF0;
}
</style>
<?php
include("connect_base.php");

$virtual = new virtual();

$virtual_catalog = $virtual->select("
SELECT wp_terms.term_id, wp_terms.name
FROM wp_terms
WHERE term_id != '2' ");


$virtual_mas = $virtual->select("
SELECT post_title, wp_terms.term_id, wp_terms.name
FROM wp_terms
INNER JOIN wp_term_taxonomy ON wp_terms.term_id = wp_term_taxonomy.term_id
INNER JOIN wp_term_relationships wpr ON wpr.term_taxonomy_id = 
wp_term_taxonomy.term_taxonomy_id
INNER JOIN wp_posts ON ID = wpr.object_id
WHERE taxonomy = 'category' 
AND post_type = 'post' ");





echo "<div class='milka'><table>";
$zagkil=0;
for ($i=0;$i<count($virtual_catalog);$i++)
	{	
		echo "<tr><td>".$virtual_catalog[$i][1]."</td><td>";
		$virtual_mas = $virtual->select("
		SELECT post_title,guid, wp_terms.term_id, wp_terms.name
		FROM wp_terms
		INNER JOIN wp_term_taxonomy ON wp_terms.term_id = wp_term_taxonomy.term_id
		INNER JOIN wp_term_relationships wpr ON wpr.term_taxonomy_id = 
		wp_term_taxonomy.term_taxonomy_id
		INNER JOIN wp_posts ON ID = wpr.object_id
		WHERE taxonomy = 'category' 
		AND post_type = 'post' AND wp_terms.term_id='".$virtual_catalog[$i][0]."'");
			for ($j=0;$j<count($virtual_mas);$j++)
				{
					echo "<a href='".$virtual_mas[$j][1]."'>".$virtual_mas[$j][0]."</a><br>";
				}				
		$zagkil=$zagkil+count($virtual_mas);
		echo "</td><td>".count($virtual_mas)."</td></tr>";
		
	}
echo "<tr><td></td><td></td><td style='background-color:green;'><b>Загальна кількість: ".$zagkil."</b></td></tr></table></div>";
?>
	<font style='font-size:7pt;color:blue;'><center>Автор скріпта Чеканов Сергій Борисович 2013<br>Інформаційно-аналітичний відділ</center></font>
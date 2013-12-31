<!--
Скріптик для виведення показників із БД 
 - Чеканов Сергій Борисович
 - milenium.sergiy@gmail.com
 15.12.2013 
 
 бла бла бла)))))
-->
<style>
	.milka body{font-family: Times New Roman,serif;text-align:center;}
	.milka thead{font-weight: bold;}
	.milka a{color:blue;font-size:12pt;text-decoration:underline;}
	.milka a:hover{color:black;font-size:12pt;text-decoration:none;}
</style>
<?php
include("connect_base.php");
/*Функція для виведення показників $gr - ID групи в БД*/
function views_groups_milka($gr){
$id=0;
$groups = new analitical(); // Обєкт класу для підключення до БД

echo '<div class="milka">';
echo '<hr>
	  <b>
	  <span style="font-size: 24.0pt;">
		<CENTER>
			Показники для аналізу
		</CENTER>
	  </span>
	  </b>';
	$groups_activity = $groups->select("SELECT * FROM `wp_groups_activity` WHERE `id_groups`=".$gr.";");

for($i=0;$i<count($groups_activity);$i++):

	$groups_activity_direction = $groups->select("SELECT * FROM `wp_groups_activity_direction` WHERE `id_activity`=".$groups_activity[$i][0].";");
	
echo '<p style="text-align: left; margin: 6.0pt 0 6.0pt 0;"><b><span style="font-size: 11.0pt;">'.$groups_activity[$i][1].'</span></b></p>';
echo '<table style="text-align:center; border-collapse: collapse;" border="1" cellspacing="0" cellpadding="0">
	<thead>
	<tr style="background: #99CCFF;">
		<td width=15%>Напрямок</td>
		<td width=5%>ІД показника</td>
		<td width=40%>Зміст показника</td>
		<td width=15%>Джерело інформації для розрахунку показника</td>
		<td width=15%>Підрозділи, для яких надається показник</td>
		<td width=10%>Термін поновлення показників</td>
	</tr>
	</thead>
	';

	for($j=0;$j<count($groups_activity_direction);$j++):
		
		$groups_activity_direction_content = $groups->select("SELECT * FROM `wp_groups_activity_direction_content` WHERE `id_direction`=".$groups_activity_direction[$j][0].";");
		for ($y=0;$y<count($groups_activity_direction_content);$y++):
		$id++;
		echo'<tr>';
				if($y==0){
				echo '<td style="background: #00ffff;">'.$groups_activity_direction[$j][1].'</td>';
				}else {
				echo '<td style="background: #00ffff;"></td>';
				}
		$posts =  $groups->select("SELECT post.* 
									FROM wp_terms term 
									JOIN wp_term_taxonomy taxonomy
									JOIN wp_term_relationships relationship
									JOIN wp_posts post
									WHERE term.term_id = taxonomy.term_id
									AND relationship.term_taxonomy_id = taxonomy.term_taxonomy_id
									AND term.slug = '".$groups_activity_direction_content[$y][6]."'
  
									AND post.ID = relationship.object_id");

		echo'	<td style="background: #92D050;">'.$id.'.</td>
				<td style="background: #FFFF00;"><a href="http://analytics.tdmu.edu.ua/?tag='.$groups_activity_direction_content[$y][6].'">'.$groups_activity_direction_content[$y][2].'</a>
				';
				if ($posts[count($posts)-1][2]){
				echo '	<font style="color:red; font-size:10.0pt">Опубліковано:'.$posts[count($posts)-1][2].'</font>
						<font style="color:blue; font-size:10.0pt">Оновлено:'.$posts[count($posts)-1][14].'</font>';
						}
		echo'	</td>
				<td style="background: #00FF00;">'.$groups_activity_direction_content[$y][3].'</td>
				<td style="background: #FF6600;">'.$groups_activity_direction_content[$y][4].'</td>
				<td style="background: #CC99FF;">'.$groups_activity_direction_content[$y][5].'</td>
			</tr>
		';
		endfor;
	endfor;
	
	echo'</table>';
endfor;
echo'</div>';
}
?>

	

<!--
Скріптик для виведення показників із http://videotube.tdmu.edu.ua/ 
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
	.milka p{margin-bottom: -10px;}
</style>

<?php
include("connect_base.php");
	

function video_cat($func_id){
$mas_for_graf = array(array());
$num_for_graf=1;
	$mas_for_graf[0][0]='Кафедра';
	$mas_for_graf[0][1]='Кількість';
$video = new video();
/*echo "<table width=100% style='color:blue;font-size:14pt;'><tr><td width=85%>Кафедра</td><td>Тривалість</td><td width=7%>Кількість</td></tr></table>";*/
echo "<div class='milka'>";
$video_category = $video->select("SELECT `category_id`,`parent_id`,`category_desc`,`category_order` FROM `cb_video_categories` WHERE parent_id=".$func_id.";");
	for($i=0;$i<count($video_category);$i++):
		$video_catalog = $video->select("SELECT `category_id`,`parent_id`,`category_desc`,`category_order` FROM `cb_video_categories` WHERE parent_id=".$video_category[$i][0].";");
			if ($video_catalog!=NULL):
				echo "<center>
						<div id='institute' style='color:green;font-size:14pt;'>
							<b><a href='http://videotube.tdmu.edu.ua/videos.php?cat=".$video_category[$i][0]."'>".$video_category[$i][2]."</a></b>
						</div>
					  </center>";
			endif;
			echo "<table width=100%>";
		for($j=0;$j<count($video_catalog);$j++):
			$video_ = $video->select("SELECT sum(DISTINCT duration) FROM cb_video, cb_video_categories WHERE category =  '#".$video_catalog[$j][0]."#' AND duration!='00';");
			$video_count = $video->select("SELECT count(DISTINCT duration) FROM cb_video, cb_video_categories WHERE category =  '#".$video_catalog[$j][0]."#'  AND duration!='00';");
			if ($video_!=NULL):
			$time = array_sum($video_[0]);
				$hours = floor($time/3600);
				$min = floor($minutes = ($time/3600 - $hours)*60);
				$seconds = ceil(($minutes - floor($minutes))*60);
			echo "<tr><td width=85%><a href='http://videotube.tdmu.edu.ua/videos.php?cat=".$video_catalog[$j][0]."'>".$video_catalog[$j][2]."</a></td>";
				
				$mas_for_graf[$num_for_graf][0]=$video_catalog[$j][2];
				$mas_for_graf[$num_for_graf][1]=$video_count[0][0];
				$num_for_graf++;
			if ($seconds!=0){
				
				echo "<td><center>".$hours.":".$min.":".$seconds."</center></td>";
				echo "<td width=7%><center>".$video_count[0][0]."</center></td>";
				}
			echo "</tr>";
			endif;
		endfor;
		echo "</table>";
	endfor;
	echo"</div>";
	$mas = json_encode($mas_for_graf, JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK );
	
	echo "
	<script type='text/javascript' src='//www.google.com/jsapi'></script>
    <script type='text/javascript'>
      google.load('visualization', '1', {packages: ['corechart']});
    </script>
    <script type='text/javascript'>
	var mas = ".$mas.";
	function drawVisualization() {
        var data = google.visualization.arrayToDataTable(mas);
		 var view = new google.visualization.DataView(data);
			view.setColumns([0, 1,
                       { calc: 'stringify',
                         sourceColumn: 1,
                         type: 'string',
                         role: 'annotation'}
                       ]);
        new google.visualization.BarChart(document.getElementById('visualization')).
      draw(view,
           {title:'Кількість відеофільмів',
            width:1400, height:".(count($mas_for_graf)*31).",
			chartArea:{width:400},
            vAxis: {textStyle:{ color: 'black', bold: 'true'},width:700},
            hAxis: {title: 'Кількість в шт.'},
			legend: {position:'none'},
			dataOpacity:0.8,
			animation: {duration:1000,easing:'inAndOu'},
			
			
			}
      );
      }
      google.setOnLoadCallback(drawVisualization);
    </script>
    <div id='visualization' style='width: 900px; height: ".(count($mas_for_graf)*31)."px'></div>";
}


video_cat(12);
//video_cat(63);
//video_cat(64);
?>
<font style='font-size:7pt;color:blue;'><center>Автор скріпта Чеканов Сергій Борисович 2013<br>Інформаційно-аналітичний відділ</center></font>
<h1 class="mobile">Reporte de garitas <span class="smaller">Actualizado <?=$data['last_update']?></span></h1>
<div id="main_content">
	<h1 class="web">Reporte de garitas</h1>
	<p id="updated_on"><span class="special_color_text">Actualizado </span><?=$data['last_update']?></p>
				<h2>&nbsp;</h2>
				<br class="clearer" />
				<table>
					<tr>
						<th class="first">San Ysidro</th>					
						<th class="t_normal">Normal</th>		
						<th class="t_sentri">Sentri</th>		
						<th class="t_ready">Ready Lane</th>		
						<th class="t_peatones">Peatones</th>
					</tr>
					<tr class="odd">
						<td class="t_tiempo"><span class="reloj_icono"></span></td>
						<td><?=$data['san_ysidro']['tiempo']['carros']?></td>
						<td><?=$data['san_ysidro']['tiempo']['sentri']?></td>
						<td><?=isset($data['san_ysidro']['tiempo']['ready_lane']) ? $data['san_ysidro']['tiempo']['ready_lane'] : 'sin espera';?></td>
						<td><?=$data['san_ysidro']['tiempo']['personas']?></td>
					</tr>
				</table>
				<br class="clearer" />
				<hr />				
				<table>
					<tr >
						<th class="first">Otay</th>					
						<th class="t_normal">Normal</th>		
						<th class="t_sentri">Sentri</th>		
						<th class="t_ready">Ready Lane</th>		
						<th class="t_peatones">Peatones</th>
					</tr>
					<tr class="odd">
						<td class="t_tiempo"><span class="reloj_icono"></span></td>
						<td><?=$data['otay']['tiempo']['carros']?></td>
						<td><?=$data['otay']['tiempo']['sentri']?></td>
						<td><?=isset($data['otay']['tiempo']['ready_lane']) ? $data['otay']['tiempo']['ready_lane'] : 'sin espera';?></td>
						<td><?=$data['otay']['tiempo']['personas']?></td>
					</tr>
				</table>
				<hr />
				<?=$data['ads']?>
				
				
				

				<?php include 'layout/modal_survey.php';?>
</div>
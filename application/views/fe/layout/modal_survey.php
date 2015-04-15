

<!-- Survey Modal -->	
<div class="modal fade" id="survey_Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4><span>¡Hola! </span> ¿Nos regalas dos minutos de tu tiempo?</h4>
				<button type="button" class="icon close-single" data-dismiss="modal" aria-hidden="true">x</button>
			</div>	
			<div class="modal-body">
				<p class="small">Queremos saber más sobre tí, no compartiremos ni venderemos tus datos personales, toda la información se utilizará sólo para fines estadísticos.
				</p>
				<form id="survey-form">
					<ol>
						<li>
							<label>¿Cada cuanto cruzas a Estados Unidos?</label>
							<ul>
								<li><input type="radio" name="cuanto_cruzas" value="todos">Todos los días</li>
								<li><input type="radio" name="cuanto_cruzas" value="semana">2-3 veces por semana</li>
								<li><input type="radio" name="cuanto_cruzas" value="quincena">2-3 veces por quincena</li>
								<li><input type="radio" name="cuanto_cruzas" value="mes">2-3 veces por mes</li>
							</ul>
						</li>
						<li>
							<label>¿Por qué cruzas usualmente?</label>
							<ul>
								<li><input type="radio" name="porque_cruzas" value="trabajo">Trabajo</li>
								<li><input type="radio" name="porque_cruzas" value="estudios">Estudios</li>
								<li><input type="radio" name="porque_cruzas" value="compras">Compras</li>
								<li><input type="radio" name="porque_cruzas" value="visita">Visita familiar o turística</li>
								<li><input type="radio" name="porque_cruzas" value="otro">Otro</li>
							</ul>
						</li>

						<li>
							<label>¿Qué tan seguido revisas reportes de garita?</label>
							<ul>
								<li><input type="radio" name="cuanto_revisas" value="siempre">Siempre que voy a cruzar</li>
								<li><input type="radio" name="cuanto_revisas" value="casi_siempre">Casi siempre que voy a cruzar</li>
								<li><input type="radio" name="cuanto_revisas" value="a_veces">A veces reviso los reportes de garita</li>
								<li><input type="radio" name="cuanto_revisas" value="casi_nunca">Casi nunca reviso reportes de garita</li>
								<li><input type="radio" name="cuanto_revisas" value="nunca">Nunca reviso reportes de garita</li>
							</ul>
						</li>
						<li class="revisa_reporte">
							<label>¿Qué otro medio utilizas para revisar tu reporte de garitas?</label>
							<ul>
								<li><input type="radio" name="otro_medio" value="telefono">Teléfono</li>
								<li><input type="radio" name="otro_medio" value="radio">Radio</li>
								<li><input type="radio" name="otro_medio" value="no_utilizo">No utilizo otro medio</li>
							</ul>
							
							
							<ol id="utiliza_otro_reporte" class="hidden">
								<li>
									<label>¿Por qué utilizas este otro medio?</label>
									<ul>
										<li><input type="radio" name="cuanto_revisas" value="siempre">Me parece más fácil de consultar</li>
										<li><input type="radio" name="cuanto_revisas" value="casi_siempre">Me parece más rápido de consultar</li>
										<li><input type="radio" name="cuanto_revisas" value="a_veces">Me parece más confiable</li>
										<li><input type="radio" name="cuanto_revisas" value="a_veces">Otro</li>
									</ul>
								</li>
							</ol>
							
						</li>
						<li id="">
							<label>¿Qué tan correctos son las predicciones de los sitios de reporte de garita?</label>
							<ul>
								<li><input type="radio" name="cuanto_revisas" value="siempre">Muy correctos, casi siempre hago el tiempo que dicen</li>
								<li><input type="radio" name="cuanto_revisas" value="casi_siempre">La mayoría del tiempo son correctos</li>
								<li><input type="radio" name="cuanto_revisas" value="a_veces">A veces son correctos, a veces no son muy correctos</li>
								<li><input type="radio" name="cuanto_revisas" value="a_veces">Casi siempre son incorrectos</li>
								<li><input type="radio" name="cuanto_revisas" value="a_veces">Siempre son incorrectos</li>
							</ul>
						</li>
						<li id="">
							<label>¿Cuánto tiempo (hh:mm) es lo máximo que esperarías para cruzar la frontera? <span class="small">(sin volverte loco)</span></label>
							<div class="select_wrap first">
								<select id="time_hours">
									<option value="0">00</option>
									<option value="1">01</option>
									<option value="2">02</option>
									<option value="3">03</option>
									<option value="4">04</option>
									<option value="5">05</option>
									<option value="6">06</option>
									<option value="7">07</option>
									<option value="8">08</option>
									<option value="9">09</option>
									<option value="10">10</option>
								</select>
							</div><span class="separator_dots">:</span><div class="select_wrap">
								<select id="time_minutes">
									<option value="0">00</option>
									<option value="10">10</option>
									<option value="20">20</option>
									<option value="30">30</option>
									<option value="40">40</option>
									<option value="50">50</option>
								</select>
							</div>	
							

						</li>
						<li id="">
							<label>¿Cuánto tiempo estarías dispuesto a invertir para mejorar el reporte?</label>
							<ul>
								<li><input type="radio" name="cuanto_revisas" value="siempre">5 minutos</li>
								<li><input type="radio" name="cuanto_revisas" value="casi_siempre">3 minutos</li>
								<li><input type="radio" name="cuanto_revisas" value="a_veces">1 minuto</li>
								<li><input type="radio" name="cuanto_revisas" value="a_veces">No estoy dispuesto a invertir tiempo para mejorar el reporte</li>
							</ul>
						</li>
					</ol>
					
					<hr />
					<div id="personal_info">
						<div class="row">
							<div class="col-xs-12 col-sm-6">
								<label>Género</label>
								<div class="select_wrap">
									<select id="sexo">
								  		<option value="femenino">Femenino</option>
								  		<option value="masculino">Masculino</option>
									</select>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6">
								<label>Edad</label>
								<input type="number" name="edad" id="edad" min="1" max="100" >
							</div>
						</div>	
						

						<input type="checkbox" name="reporte" id="recibir_reporte" value="recibir_reporte"><label id="recibir_reporte_lab">Quiero recibir un reporte del estudio que realicen con esta información</label>
						
						
						<div id="report_email_block" class="row hidden">
							<div class="col-xs-12 col-sm-6">
								<input type="email" name="email" id="email" placeholder="¿A qué correo enviamos el reporte?">
							</div>
							<div class="col-xs-12 col-sm-6">
							</div>
							
						</div>	
						
						
						<div class="row">
							<div class="col-xs-12 col-sm-3">
							</div>
							<div class="col-xs-12 col-sm-6">
								<input type="submit" value="Enviar encuesta" class="custom_submit">
							</div>
							<div class="col-xs-12 col-sm-3">
							</div>
							
						</div>
						
						<p id="no_encuesta"><a href="#" title="No mostrar encuesta" >No quiero que se muestre este mensaje de nuevo</a> (Si llena la encuesta este dispositivo no la mostrará nuevamente)</p>
						
					</div>
					


				</form>
			</div>	
		</div>
	</div>
</div>


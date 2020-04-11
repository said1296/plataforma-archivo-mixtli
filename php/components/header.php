<header class="nav-type-2">
		<nav class="navbar navbar-static-top">
			<div class="navigation">
				<div class="container-fluid semi-fluid relative">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<div class="logo-container">
							<div class="logo-wrap local-scroll">
								<a href="../../"> <img class="logo" src="../../themes/img/gral/logo-black.png" alt="Preservación"> </a>
							</div>
						</div>
					</div>

				
					<!-- MENU -->
						<div class="collapse navbar-collapse" id="navbar-collapse">
							<ul class="nav navbar-nav nav-wrap local-scroll right">
								<li>
									<div class="nav-search type-2">
										<form id="forma-buscar-general" action="../buscar" method="GET">
											<button type="button" class="search-button-cog" id="avanzada">
												<i class="icon_cog"></i>
											</button>
											<button type="submit" class="search-button">
												<i class="icon_search"></i>
											</button>
											<input type="search" id="search-bar" name="consulta" placeholder="Buscar">
									</div>
											<div class="ocultar" id="avanzada-mobile">
												<div>								
													<input type="checkbox" id="avanzada_autor" name="avanzada_autor" value="y"> Autor &nbsp &nbsp &nbsp
												</div>
												<div>
													<input type="checkbox" class="avanzada_serie_collapsed" id="avanzada_serie" name="avanzada_serie" value=y> Serie &nbsp &nbsp &nbsp
												</div>
												<div>												
													<input type="checkbox" id="avanzada_seriedescripcion" name="avanzada_seriedescripcion" value="y"> Descripción &nbsp &nbsp &nbsp
												</div>
												<div>
													<select style="width:50%;margin-top:5px;" class="avanzada_tipo_collapsed" id="avanzada_tipo" name="avanzada_tipo" form="forma-buscar-general">
														<option hidden disabled selected>Tipo (todos)</option>
														<option value="foto">Fotos</option>
														<option value="video">Videos</option>
														<option value="audio">Audios</option>
														<option value="todos">Todos</option>
													</select>
												</div>								
											</div>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" id="dropdown-a" data-toggle="dropdown">Proyecto</a>
									<ul class="dropdown-menu">
										<li><a href="../acerca-del-proyecto/index.php#descripcion">Descripción del proyecto</a></li>
										<li><a href="../acerca-del-proyecto/index.php#comoFunciona">¿Cómo funciona?</a></li>
										<li><a href="../acerca-del-proyecto/index.php#FAQ">FAQ</a></li>
										<li><a href="../acerca-del-proyecto/index.php#condiciones">Condiciones de uso</a></li>
										<li><a href="../acerca-del-proyecto/index.php#privacidad">Aviso de privacidad</a></li>
									</ul>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" id="dropdown-a" data-toggle="dropdown">Colecciones</a>
									<ul class="dropdown-menu">
										<li><a href="../explorar/">Explorar</a></li>
										<li><a href="../colecciones/">Usa la colección</a></li>
										<li><a href="../login/">Sube tu colección</a></li>
									</ul>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" id="dropdown-a" data-toggle="dropdown">Historias</a>
									<ul class="dropdown-menu">
												<li><a href="/php/historias/ver_historia.php">Historia del mes</a></li>
												<li><a href="/php/historias/index.php">Historias anteriores</a></li>
									</ul>
								</li>
								<li> <a href="../documentos/" id="dropdown-a">Documentos</a> </li>
								<li> <a href="../comunidad-del-archivo/" id="dropdown-a">Comunidad</a> </li>
								<li> <a href="../contacto/" id="dropdown-a">Contáctanos</a> </li>
							</ul>
						</div>
				</div>
			</div>
									<div class="row mb-10 ocultar" id="avanzada-desktop" style="">
										<div class="container">
												<div class="col-md-3">												
													Buscar en:
												</div>
												<div class="col-md-2">												
													<input type="checkbox" id="avanzada_autor" name="avanzada_autor" value="y"> Autor
												</div>
												<div class="col-md-2" id="avanzada_serie_div">
													<input type="checkbox" class="avanzada_serie" id="avanzada_serie" name="avanzada_serie" value=y> Serie
												</div>
												<div class="col-md-3">
													<input type="checkbox" id="avanzada_seriedescripcion" name="avanzada_seriedescripcion" value="y"> Descripción
												</div>
												<div class="col-md-2">
													<select id="avanzada_tipo" class="avanzada_tipo" name="avanzada_tipo" form="forma-buscar-general">
														<option hidden disabled selected>Tipo (todos)</option>
														<option value="foto">Fotos</option>
														<option value="video">Videos</option>
														<option value="audio">Audios</option>
														<option value="todos">Todos</option>
													</select>
												</div>
								
										</div>
									</div>
								</form>

		</nav>
	</header>
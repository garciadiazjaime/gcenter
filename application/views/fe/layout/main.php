<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php $this->load->view('fe/layout/head');?>
</head>
<body>
	<div id="header">
       <?php $this->load->view('fe/layout/header', array('menu'=>$menu)); ?> 
    </div>
    <?php $this->load->view('fe/layout/header_expand', array('menu'=>$menu)); ?> 
 	<?php $this->load->view('fe/layout/sponsor_label'); ?>
	<div id="advertising_background">
		<div class="container">
            <ul id="side_menu"><?=$menu?></ul>
			<?=$content?>
			
			<a href="#" title="Error"  data-toggle="modal" data-target="#survey_Modal" >MODAL LOGIN: El usuario dio click a login de header</a>
		</div>
		<div id="footer">	
			<?php $this->load->view('fe/layout/footer'); ?>
		</div>
	</div>
	<div id="menu_mobile" class="hidden">
		<ul>
			<li><a href="<?=base_url()?>" title="Reporte de Garitas">Reporte de Garitas</a></li><li>
			<a href="<?=base_url()?>quienes-somos" title="Quienes Somos">Quienes Somos</a></li>
		</ul>	
		<img src="<?=base_url()?>resources/images/fe/close_window.png" alt="Cerrar menú" id="close_menu_mobile" />
	</div>
	<div id="ads_mobile_space" class="hidden">
		<div class="wrapp first">
			<img src="<?=base_url()?>resources/images/fe/close_window.png" alt="Cerrar menú" id="close_ads_mobile_space" />
		</div>
		<div class="wrapp">
			<h2>Mint IT Media</h2>
			<br />
			<p>Mint IT Media es un Estudio de desarrollo Web. Nos enfocamos en ayudar a nuestros clientes a implementar sus estrategias de mercadotecnia y comunicación a través del desarrollo de aplicaciones Web.</p>	
			<div class="column half first">
				<p class="small"><a href="http://www.mintitmedia.com/" target="_blank" title="Visítanos en nuestra página web">Visítanos en nuestra página web</a></p>
				<a href="http://www.mintitmedia.com" title="Visitar Mint IT Media" target="_blank" id="ad_site_logo"><img src="<?=base_url()?>resources/images/fe/mint_logo.png" alt="Mint IT Media" /></a>
			</div><div class="column half">
					<p class="small"><a href="https://www.facebook.com/mint.it.media" target="_blank" title="Síguenos en facebook web">Síguenos en facebook</a></p>
					<a href="https://www.facebook.com/mint.it.media" title="Visitar Mint IT Media" target="_blank" id="ad_site_logo"><img src="<?=base_url()?>resources/images/fe/mint_facebook_logo.png" alt="Mint IT Media" /></a>
				
			</div>
		</div>
	</div>
	<div id="ads_mobile"><p><a href="#" title="Hoy presentamos a Mint IT Media">Hoy presentamos a: <strong>Mint IT Media</strong></a><span class="guide_space"></span></p></div>
	<?php require "modal_survey.php"; ?>
</body>
</html>
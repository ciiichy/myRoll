
<div id="panel_logowania">
    <div id="pnl_logo"></div>
    
    <div id='msg'><?php echo @$msg?></div>
    
	<form method="post" action="<?php url_for('login/index')?>" id="form_index">  
	<?php echo $form ?>

      <input type="image" src="/images/btt_zaloguj.png"  class="snd" />
	</form>

	<div id="adm_cont">
		<a href="#" >kontakt z administratorem</a>
	<!-- adm cont --></div>

<!-- panel logowania --></div>
   


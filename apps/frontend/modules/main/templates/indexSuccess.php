<div class="panel">
    
    <div id="platnosci_naglowek"></div>
    <div class="content">
   	 	<div id="platnosci_status"></div>
    	<div class="tablica">
        
        <!-- tresc generowana platnosci -->
        
        <table cellspacing=2 cellpadding=5>
        <tr>
        	<th class="s1">produkt</th>
        	<th class="s2">klient</th>
        	<th class="s3">termin</th>
        	<th class="s4">kwota<br />(brutto)</th>
        	<th class="s5">wpłata</th>
       	 	<th class="s6">e-mail</th>
        	<th class="s7">umowa</th>
        </tr>
        </table>

		<div class="separator"></div>
        
        <table  cellspacing=2 cellpadding=5>
        <?php foreach ($contracts as $c) { ?>
        <tr <?php if ($c->getColor()) echo 'class="color'.$c->getColor().'"' ?> > <!-- ------------------------------ okreslanie koloru wiersza ----- -->
        	<td class="s1">
            <h1 class="nazwa"><?php echo $c->getProduct()->getName()?></h1>
            <p>
			<?php echo $c->getProduct()->getDescription() ?>
            </p>
            </td>
        	<td class="s2"><?php echo $c->getClients()->getName() ?></td>
        	<td class="s3"><?php echo $c->getDateTo() ?></td>
        	<td class="s4"><?php echo $c->getPrize()?></td>
        	<td class="s5"><img src="/images/ico_ok.png"  /></td>
       	 	<td class="s6"><a href="mailto:<?php echo $c->getClients()->getEmail()?>"><img src="/images/ico_mailmarked.png"  /></a></td>
        	<td class="s7"><a href="#"><img src="/images/ico_document.png"  /></a></td>
        </tr>
        <?php } ?>
        
       
        </table>
        
        <!-- tresc generowana platnosci koniec -->  
              
        </div>
    	<a href="/main/index/act/showall" class="pokazwszystkie"></a>
    <!-- content koniec--></div>
    
	<!-- panel koniec --></div>
	<!-- #########################  koniec platnosci  #########################  -->
    
  
  	<!-- #########################  umowy  #########################  -->
	
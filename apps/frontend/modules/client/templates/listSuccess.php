<!-- #########################  lista klientow  #########################  -->
	<div class="panel">
    <div id="listaklientow_naglowek">
    	<!-- <a href="dodajklienta.php" class="add_dodaj"></a> -->
    </div>
    <div class="content">
    
        <form class="search" method="post" action="/client/list"> wyszukaj: <input type="text" name="phrase"/> </form>
            
    	<div class="tablica">
        <div id='msg'><?php echo "<br>".@$msg?></div>
        <!-- tresc generowana listaklientow -->
        
        <table cellspacing=2 cellpadding=5>
        <tr>
        	<th class="s13a">nazwa / imię nazwisko</th>
        	<th class="s14">dane</th>
        	<th class="s15">e-mail</th>
        	<th class="s16">umowy</th>
        	<th class="s17">edycja</th>
       	 	<th class="s18">usuń</th>
        </tr>
        </table>

		<div class="separator"></div>
        
        <table  cellspacing="2" cellpadding="5">
        	<?php foreach($clients as $c){ ?> 
        <tr id='client_<?php echo $c->getId()?>'>
        	<td class="s13"><?php echo $c->getName()?></td>
        	<td class="s14"><a href="#"><img src="/images/ico_doc_view.png"  /></a></td>
        	<td class="s15"><a href="mailto:<?php echo $c->getEmail()?>"><img src="/images/ico_mail.png" /></a></td>
        	<td class="s16"><a href="#" class='show_contracts' name='<? echo $c->getId() ?>'><img src="/images/ico_document.png"  /></a></th>
        	<td class="s17"><a href="#"><img class='edit_client' src="/images/ico_edit.png"  name='<? echo $c->getId() ?>'/></a></td>
       	 	<td class="s18"><a href="#" class='delete_client' name='<? echo $c->getId() ?>'><img src="/images/ico_notok.png"  /></a></td>
        </tr>
        <?php }?>
       
        </table>
         
        <script>
        		$(document).ready(function() {
	$(".delete_client").click(function() {
		id = $(this).attr('name');
		$.ajax({
			type: 'post',
			url : "<?php echo url_for('client/delete')?>",
			data: 	{'id':id},
			success: function(){
				$('#client_'+id).hide('slow');
			},
				error : function(){
				alert('Blad')
			}		
			
		})	

});
	
});
        </script>       
        <!-- tresc generowana listaklientow koniec -->  
              
        </div>
    	<a href="/client/list/act/showall" class="pokazwszystkie"></a>
    <!-- content koniec--></div>
    
	<!-- panel koniec --></div>
	<!-- #########################  koniec listy klientow  #########################  -->
function validateEmail(elementValue){  
   var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;  
   return emailPattern.test(elementValue);  
 }  
 
function getClientHtml(url){
	return '<div id="popup_kontener"><div id="popup_dodaj"><div class="popup_naglowek">\
		    <div id="popup_nazwa_dodawanieklienta"></div> \
	        <a href="#" id="zamknijpanel"></a> \
			    </div>  \
				<div class="popup_srodek"> \
				<form action="'+url+'" id="form_dodaj" method="post" name="add_client"> \
				  <label>nazwa / imię i nazwisko:</label><input type="text" id="add_client_name" name="client[name]" class="inp" /><br /> \
				  <label>adres korespondencyjny:</label><input type="text" id="add_client_address" name="client[address]" class="inp" /><br /> \
				  <label>NIP:</label><input type="text" name="client[nip]" id="add_client_nip" class="inp" id="add_client_nip"/><br /> \
				  <label>REGON:</label><input type="text" name="client[regon]" class="inp" id="add_client_regon" /><br /> \
				  <label>e-mail:</label><input type="text" name="client[email]" class="inp" id="add_client_email"/><br /> \
				  <label>telefon:</label><input type="text" name="client[tel]" class="inp" id="add_client_tel" /><br /> \
			      <input type="image" src="/images/panel_dodaj.png"  class="snd" /> \
				</form> \
			    </div> \
				<div class="popup_stopka"></div> \
			</div> \
			</div>';	

}

function getProductHtml(url){
	return '<div id="popup_kontener"><div id="popup_dodaj"><div class="popup_naglowek"><div id="popup_nazwa_dodawanieproduktu"></div>\
	        <a href="#" id="zamknijpanel"></a></div><div class="popup_srodek">\
	    <form action="'+url+'" method="post" id="form_dodaj" name="add_product">\
		  <label>nazwa:</label><input type="text" name="product[name]" class="inp" id="add_product_name" /><br />\
		  <label>opis:</label><textarea name="product[description]" class="inp_txt" id="add_product_description"></textarea><br />\
		  <label>cena netto:</label><input type="text" name="product[prize]" class="inp" id="add_product_prize"/><br />\
		  <label>cykl rozliczeniowy:</label>\
	      <div class="rd_box" id="add_product_month">\
	      	<input type="radio" name="product[month]" checked="checked" class="inp_rd" value="1" /> 1 msc.\
	      	<input type="radio" name="product[month]" class="inp_rd" value="2" /> 2 msc.\
	      	<input type="radio" name="product[month]" class="inp_rd" value="3" /> 3 msc.<br />\
	     	 <input type="radio" name="product[month]" class="inp_rd" value="4" /> 4 msc.\
	     	 <input type="radio" name="product[month]" class="inp_rd" value="6" /> 6 msc.\
	     	 <input type="radio" name="product[month]" class="inp_rd" value="12" /> 12 msc.\
	      </div>\
	      <input type="image" src="/images/panel_dodaj.png"  class="snd" />\
		</form></div><div class="popup_stopka"></div></div></div>';	
}

function getContractHtml(url){
		var date = new Date();
		var m = date.getMonth() + 1;
	  	var now=date.getFullYear() + "-" + m + "-" + date.getDate();
		return '<div id="popup_kontener">\
	    <div id="popup_dodaj">\
		<div class="popup_naglowek">\
	    	<div id="popup_nazwa_dodawanieumowy"></div>\
	        <a href="#" id="zamknijpanel"></a>\
	    </div>\
		<div class="popup_srodek">\
		<form action="'+url+'/list" id="form_dodaj" method="post" name="add_contract">\
		  <label>nazwa klienta:</label>\
	      	<select name="contract[client_id]" class="inp_sel" id="select_clients">\
	      	<option value="0">(wybierz)</option>\
	        </select><br />\
		  <label>nazwa produktu:</label>\
	      	<select name="contract[product_id]" class="inp_sel" id="select_products">\
	      	<option value="0">(wybierz)</option>\
	        </select><br />\
		  <label class="other">inna nazwa:</label><input type="text" name="contract[name]" class="inp" /><br />\
		  <label>cena</label><input type="text" name="contract[prize]" class="inp" id="contract_prize"/><br />\
		  <label>cykl rozliczeniowy:</label>\
	      <div class="rd_box">\
	      	<input type="radio" name="contract[month]" class="inp_rd" value="1" checked="checked"/> 1 msc.\
	      	<input type="radio" name="contract[month]" class="inp_rd" value="2" /> 2 msc.\
	      	<input type="radio" name="contract[month]" class="inp_rd" value="3" /> 3 msc.<br />\
	     	 <input type="radio" name="contract[month]" class="inp_rd" value="4" /> 4 msc.\
	     	 <input type="radio" name="contract[month]" class="inp_rd" value="6" /> 6 msc.\
	     	 <input type="radio" name="contract[month]" class="inp_rd" value="12" /> 12 msc.\
	      </div>\
	      <table class="inptab">\
	      <tr>\
	      <td><label class="shortlab">umowa od:</label></td>\
	      <td><input type="text" name="contract[date_from]" class="inp2" value="'+now+'"/></td>\
	      <td><label class="shortlab">umowa do:</label></td>\
	      <td><input type="text" name="contract[date_to]" class="inp2" value="'+now+'"/></td>\
	      </tr>\
	      </table>\
	     <label>przypomnienie<br /> o płatności:</label>\
	      <div class="rd_box_2">\
	      	<input type="radio" name="contract[remind_pay]" class="inp_rd" value="1" checked="checked"/> tak\
	      	<input type="radio" name="contract[remind_pay]" class="inp_rd" value="0" /> nie\
	      </div>\
	     <label>przypomnienie<br />o końcu umowy:</label>\
	      <div class="rd_box_2">\
	      	<input type="radio" name="contract[remind_end]" class="inp_rd" value="1" checked="checked"/> tak\
	      	<input type="radio" name="contract[remind_end]" class="inp_rd" value="0" /> nie\
	      </div>\
	      <input type="image" src="/images/panel_dodaj.png"  class="snd" />\
		</form></div><div class="popup_stopka"></div></div></div>';		
	
}


$(document).ready(function() {
	
		
	$("#add_client").live('click',
	  function () {
	  	url = '/client/list';
	  	html = getClientHtml(url);
	    $("body").append(html);
	  }
	);

	$("#zamknijpanel").live('click',
	  function () {
	    $("#popup_dodaj").remove();
	  }
	);
	
	$("form[name=add_client]").live('submit',
	  function () {
	    name = $('#add_client_name').val();
	    nip = $('#add_client_nip').val();
	    email = $('#add_client_email').val();
	    if (name.length == 0){
	    	alert("Wpisz nazwę klienta");
	    	return false;
	    }

	    if (nip.length == 0){
	    	alert("Wpisz poprawny NIP");
	    	return false;
	    }	    
	    
	    if (!validateEmail(email)){
	    	alert("Zły adres e-mail");
	    	return false;
	    }	    
	    
	    return true;
	  }
	);	
	
	
	$("#add_product").live('click',
	  function () {
	  	url = '/product/list';
	  	html = getProductHtml(url);
	    $("body").append(html);
	  }
	);	
	
	
	$("form[name=add_product]").live('submit',
	  function () {
	    name = $('#add_product_name').val();
	    prize = $('#add_product_prize').val();
	    prize = prize.replace(',','.')
	    if (name.length == 0){
	    	alert("Wpisz nazwę klienta");
	    	return false;
	    }
	    
	    if (prize != parseFloat(prize)){
	    	alert('Wpisz porawną cenę');
	    	return false;
	    }
	    
	    return true;
	  }
	);	
	

	$("#select_products").live('change',
	  function () {
	  	id = $(this).val();
		$.ajax({
			type: 'post',
			data: 	{'id':id},
			url : '/contract/getPrize',
			data: 	{'id':id},
			success: function(prize){
				$('#contract_prize').val(prize)
				
			},
				error : function(){
				alert('Blad')
			}		
			
		})		    
	    
		    
	    
	    
	  }
	);	


	$("#add_contract").live('click',
	  function () {
	  	url = '/contract/list';
	    html = getContractHtml(url);
	    $("body").append(html);
	    
		$.ajax({
			type: 'post',
			url : '/contract/getclients',
			success: function(clients){
				$('#select_clients').append(clients);
			},
				error : function(){
				alert('Blad')
			}		
			
		})		    
	    
		$.ajax({
			type: 'post',
			url : '/contract/getproducts',
			success: function(products){
				$('#select_products').append(products);
			},
				error : function(){
				alert('Blad')
			}		
			
		})		    
	    
	    
	  }
	);	







	$(".edit_client").live('click',
	  function () {
	  	id = $(this).attr('name');
	  	html = getClientHtml('/client/edit?id='+id);
	    $("body").append(html);
	    
		$.ajax({
			type: 'post',
			 dataType: 'json',
			 data: 	{'id':id}, 
			url : '/client/getClient',
			success: function(client){
				$('#add_client_name').val(client['name']);
				$('#add_client_address').val(client['address']);
				$('#add_client_email').val(client['email']);
				$('#add_client_nip').val(client['nip']);
				$('#add_client_regon').val(client['regon']);
				$('#add_client_tel').val(client['tel']);
			},
				error : function(){
				alert('Blad')
			}		
		})	
	  }
	);	


	$(".edit_product").live('click',
	  function () {
	  	id = $(this).attr('name');
	  	html = getProductHtml('/product/edit?id='+id);
	    $("body").append(html);
	    
		$.ajax({
			type: 'post',
			 dataType: 'json',
			 data: 	{'id':id}, 
			url : '/product/getProduct',
			success: function(data){
				$('#add_product_name').val(data['name']);
				$('#add_product_description').val(data['description']);
				$('#add_product_prize').val(data['prize']);
				$('input:radio[name="product[month]"]').filter('[value='+data['month']+']').attr('checked', true);
				$('#add_product_regon').val(data['regon']);
			},
				error : function(){
				alert('Blad')
			}		
		})	
	  }
	);
	
	
	$(".edit_contract").live('click',
	  function () {
	  	id = $(this).attr('name');
	  	html = getContractHtml('/contract/edit?id='+id);
	    $("body").append(html);
		$.ajax({
			type: 'post',
			url : '/contract/getclients',
			success: function(clients){
				$('#select_clients').append(clients);
			},
				error : function(){
				alert('Blad')
			}		
			
		})		    
	    
		$.ajax({
			type: 'post',
			url : '/contract/getproducts',
			success: function(products){
				$('#select_products').append(products);
			},
				error : function(){
				alert('Blad')
			}		
			
		})		    
	    	    
		$.ajax({
			type: 'post',
			 dataType: 'json',
			 data: 	{'id':id}, 
			url : '/contract/getContract',
			success: function(data){
				$('input[name="contract[name]"]').val(data['name']);
				$('input[name="contract[prize]"]').val(data['prize']);
				$('input:radio[name="contract[month]"]').filter('[value='+data['month']+']').attr('checked', true);
				$('input:radio[name="contract[remind_pay]"]').filter('[value='+data['remind_pay']+']').attr('checked', true);
				$('input:radio[name="contract[remind_end]"]').filter('[value='+data['remind_end']+']').attr('checked', true);
				$('input[name="contract[regon]"]').val(data['regon']);
				$('input[name="contract[date_for]"]').val(data['date_for']);
				$('input[name="contract[date_to]"]').val(data['date_to']);
				$('#select_clients option[value="'+data['client_id']+'"]').attr('selected', 'selected');
				$('#select_products option[value="'+data['product_id']+'"]').attr('selected', 'selected');
			},
				error : function(){
				alert('Blad')
			}		
		})	
	  }
	);	


	$(".show_contracts").live('click',
	  function () {
	  	$('div[name=contracts]').remove();
	  	id = $(this).attr('name');
		$.ajax({
			type: 'post',
			url : '/client/getContracts',
			 data: 	{'id':id}, 
			success: function(data){
				$('#container').append(data);
			},
				error : function(){
				alert('Blad')
			}		
			
		})		    
	    
	    
	    	    

	  }
	);	
	
	
	
});
// JavaScript Document
$(function(){
	    
		var autor = document.getElementById("autor");
		autor.disabled = true;
		
		$("#imgD").on("change", function(){
			$("#vista-previa").html('');
			var archivo1 = document.getElementById('imgD').files;
			var navegador1 = window.URL || window.webkitURL;
			for(x1=0; x1<archivo1.length; x1++)
			{
			 var size1 = archivo1[x1].size; var type1 = archivo1[x1].type; var name1 = archivo1[x1].name;
			 if (type1 != 'image/jpeg' && type1 != 'image/jpg' && type1 != 'image/png' && type1 != 'image/gif')
			 {$("#vista-previa").append("El archivo "+name1+" no es del tipo de imagen permitido");}
			 else if (size1 > 1024*1024)
			 {$("#vista-previa").append("El archivo "+name1+" supera el máximo permitido 1MB");}
			 else
			 {var objeto_url1 = navegador1.createObjectURL(archivo1[x1]);
			  $("#vista-previa").append("<img src="+objeto_url1+" width='200' height='200'>");}
			}
		});
		
		
		
		
	
		
   });
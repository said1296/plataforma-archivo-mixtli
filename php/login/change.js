// JavaScript Document
$(function(){
	    
		var usuario = document.getElementById("usuario");
		usuario.disabled = true;
		
		var autor = document.getElementById("autor");
		autor.disabled = true;
		
		var colection = document.getElementById("coleccion");
		colection.disabled = true;
		
		
		$("#img1").on("change", function(){
			document.getElementById("img2").style.display = "block";
			$("#vista-previa").html('');
			var archivo1 = document.getElementById('img1').files;
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
		
		$("#img2").on("change", function(){
			document.getElementById("img3").style.display = "block";
			$("#respuesta").html('');
			var archivo2 = document.getElementById('img2').files;
			var navegador2 = window.URL || window.webkitURL;
			for(x2=0; x2<archivo2.length; x2++)
			{
			 var size2 = archivo2[x2].size; var type2 = archivo2[x2].type; var name2 = archivo2[x2].name;
			 if (type2 != 'image/jpeg' && type2 != 'image/jpg' && type2 != 'image/png' && type2 != 'image/gif')
			 {$("#vista-previa").append("El archivo "+name2+" no es del tipo de imagen permitido");}
			 else if (size2 > 1024*1024)
			 {$("#vista-previa").append("El archivo "+name2+" supera el máximo permitido 1MB");}
			 else
			 {var objeto_url2 = navegador2.createObjectURL(archivo2[x2]);
			  $("#vista-previa").append("<img src="+objeto_url2+" width='200' height='200'>");}
			}
		});
		
		$("#img3").on("change", function(){
			document.getElementById("img4").style.display = "block";
			$("#respuesta").html('');
			var archivo3 = document.getElementById('img3').files;
			var navegador3 = window.URL || window.webkitURL;
			for(x3=0; x3<archivo3.length; x3++)
			{
			 var size3 = archivo3[x3].size; var type3 = archivo3[x3].type; var name3 = archivo3[x3].name;
			 if (type3 != 'image/jpeg' && type3 != 'image/jpg' && type3 != 'image/png' && type3 != 'image/gif')
			 {$("#vista-previa").append("El archivo "+name3+" no es del tipo de imagen permitido");}
			 else if (size3 > 1024*1024)
			 {$("#vista-previa").append("El archivo "+name3+" supera el máximo permitido 1MB");}
			 else
			 {var objeto_url3 = navegador3.createObjectURL(archivo3[x3]);
			  $("#vista-previa").append("<img src="+objeto_url3+" width='200' height='200'>");}
			}
		});
		
		$("#img4").on("change", function(){
			document.getElementById("img5").style.display = "block";
			$("#respuesta").html('');
			var archivo4 = document.getElementById('img4').files;
			var navegador4 = window.URL || window.webkitURL;
			for(x4=0; x4<archivo4.length; x4++)
			{
			 var size4 = archivo4[x4].size; var type4 = archivo4[x4].type; var name4 = archivo4[x4].name;
			 if (type4 != 'image/jpeg' && type4 != 'image/jpg' && type4 != 'image/png' && type4 != 'image/gif')
			 {$("#vista-previa").append("El archivo "+name4+" no es del tipo de imagen permitido");}
			 else if (size4 > 1024*1024)
			 {$("#vista-previa").append("El archivo "+name4+" supera el máximo permitido 1MB");}
			 else
			 {var objeto_url4 = navegador4.createObjectURL(archivo4[x4]);
			  $("#vista-previa").append("<img src="+objeto_url4+" width='200' height='200'>");}
			}
		});
		
		$("#img5").on("change", function(){
			document.getElementById("img6").style.display = "block";
			$("#respuesta").html('');
			var archivo5 = document.getElementById('img5').files;
			var navegador5 = window.URL || window.webkitURL;
			for(x5=0; x5<archivo5.length; x5++)
			{
			 var size5 = archivo5[x5].size; var type5 = archivo5[x5].type; var name5 = archivo5[x5].name;
			 if (type5 != 'image/jpeg' && type5 != 'image/jpg' && type5 != 'image/png' && type5 != 'image/gif')
			 {$("#vista-previa").append("El archivo "+name5+" no es del tipo de imagen permitido");}
			 else if (size5 > 1024*1024)
			 {$("#vista-previa").append("El archivo "+name5+" supera el máximo permitido 1MB");}
			 else
			 {var objeto_url5 = navegador5.createObjectURL(archivo5[x5]);
			  $("#vista-previa").append("<img src="+objeto_url5+" width='200' height='200'>");}
			}
		});
		
		$("#img6").on("change", function(){
			document.getElementById("img7").style.display = "block";
			$("#respuesta").html('');
			var archivo6 = document.getElementById('img6').files;
			var navegador6 = window.URL || window.webkitURL;
			for(x6=0; x6<archivo6.length; x6++)
			{
			 var size6 = archivo6[x6].size; var type6 = archivo6[x6].type; var name6 = archivo6[x6].name;
			 if (type6 != 'image/jpeg' && type6 != 'image/jpg' && type6 != 'image/png' && type6 != 'image/gif')
			 {$("#vista-previa").append("El archivo "+name6+" no es del tipo de imagen permitido");}
			 else if (size6 > 1024*1024)
			 {$("#vista-previa").append("El archivo "+name6+" supera el máximo permitido 1MB");}
			 else
			 {var objeto_url6 = navegador6.createObjectURL(archivo6[x6]);
			  $("#vista-previa").append("<img src="+objeto_url6+" width='200' height='200'>");}
			}
		});
		
		$("#img7").on("change", function(){
			document.getElementById("img8").style.display = "block";
			var archivo7 = document.getElementById('img7').files;
			var navegador7 = window.URL || window.webkitURL;
			for(x7=0; x7<archivo7.length; x7++)
			{
			 var size7 = archivo7[x7].size; var type7 = archivo7[x7].type; var name7 = archivo7[x7].name;
			 if (type7 != 'image/jpeg' && type7 != 'image/jpg' && type7 != 'image/png' && type7 != 'image/gif')
			 {$("#vista-previa").append("El archivo "+name7+" no es del tipo de imagen permitido");}
			 else if (size7 > 1024*1024)
			 {$("#vista-previa").append("El archivo "+name7+" supera el máximo permitido 1MB");}
			 else
			 {var objeto_url7 = navegador7.createObjectURL(archivo7[x7]);
			  $("#vista-previa").append("<img src="+objeto_url7+" width='200' height='200'>");}
			}
		});
		
		$("#img8").on("change", function(){
			document.getElementById("img9").style.display = "block";
			var archivo8 = document.getElementById('img8').files;
			var navegador8 = window.URL || window.webkitURL;
			for(x8=0; x8<archivo8.length; x8++)
			{
			 var size8 = archivo8[x8].size; var type8 = archivo8[x8].type; var name8 = archivo8[x8].name;
			 if (type8 != 'image/jpeg' && type8 != 'image/jpg' && type8 != 'image/png' && type8 != 'image/gif')
			 {$("#vista-previa").append("El archivo "+name8+" no es del tipo de imagen permitido");}
			 else if (size8 > 1024*1024)
			 {$("#vista-previa").append("El archivo "+name8+" supera el máximo permitido 1MB");}
			 else
			 {var objeto_url8 = navegador8.createObjectURL(archivo8[x8]);
			  $("#vista-previa").append("<img src="+objeto_url8+" width='200' height='200'>");}
			}
		});
		
		$("#img9").on("change", function(){
			document.getElementById("img10").style.display = "block";
			var archivo9 = document.getElementById('img9').files;
			var navegador9 = window.URL || window.webkitURL;
			for(x9=0; x9<archivo9.length; x9++)
			{
			 var size9 = archivo9[x9].size; var type9 = archivo9[x9].type; var name9 = archivo9[x9].name;
			 if (type9 != 'image/jpeg' && type9 != 'image/jpg' && type9 != 'image/png' && type9 != 'image/gif')
			 {$("#vista-previa").append("El archivo "+name9+" no es del tipo de imagen permitido");}
			 else if (size9 > 1024*1024)
			 {$("#vista-previa").append("El archivo "+name9+" supera el máximo permitido 1MB");}
			 else
			 {var objeto_url9 = navegador9.createObjectURL(archivo9[x9]);
			  $("#vista-previa").append("<img src="+objeto_url9+" width='200' height='200'>");}
			}
		});
		
		$("#img10").on("change", function(){
			document.getElementById("img11").style.display = "block";
			var archivo9 = document.getElementById('img10').files;
			var navegador9 = window.URL || window.webkitURL;
			for(x9=0; x9<archivo9.length; x9++)
			{
			 var size9 = archivo9[x9].size; var type9 = archivo9[x9].type; var name9 = archivo9[x9].name;
			 if (type9 != 'image/jpeg' && type9 != 'image/jpg' && type9 != 'image/png' && type9 != 'image/gif')
			 {$("#vista-previa").append("El archivo "+name9+" no es del tipo de imagen permitido");}
			 else if (size9 > 1024*1024)
			 {$("#vista-previa").append("El archivo "+name9+" supera el máximo permitido 1MB");}
			 else
			 {var objeto_url9 = navegador9.createObjectURL(archivo9[x9]);
			  $("#vista-previa").append("<img src="+objeto_url9+" width='200' height='200'>");}
			}
		});
		
		$("#img11").on("change", function(){
			document.getElementById("img12").style.display = "block";
			var archivo9 = document.getElementById('img11').files;
			var navegador9 = window.URL || window.webkitURL;
			for(x9=0; x9<archivo9.length; x9++)
			{
			 var size9 = archivo9[x9].size; var type9 = archivo9[x9].type; var name9 = archivo9[x9].name;
			 if (type9 != 'image/jpeg' && type9 != 'image/jpg' && type9 != 'image/png' && type9 != 'image/gif')
			 {$("#vista-previa").append("El archivo "+name9+" no es del tipo de imagen permitido");}
			 else if (size9 > 1024*1024)
			 {$("#vista-previa").append("El archivo "+name9+" supera el máximo permitido 1MB");}
			 else
			 {var objeto_url9 = navegador9.createObjectURL(archivo9[x9]);
			  $("#vista-previa").append("<img src="+objeto_url9+" width='200' height='200'>");}
			}
		});
		
		$("#img12").on("change", function(){
			document.getElementById("img13").style.display = "block";
			var archivo9 = document.getElementById('img12').files;
			var navegador9 = window.URL || window.webkitURL;
			for(x9=0; x9<archivo9.length; x9++)
			{
			 var size9 = archivo9[x9].size; var type9 = archivo9[x9].type; var name9 = archivo9[x9].name;
			 if (type9 != 'image/jpeg' && type9 != 'image/jpg' && type9 != 'image/png' && type9 != 'image/gif')
			 {$("#vista-previa").append("El archivo "+name9+" no es del tipo de imagen permitido");}
			 else if (size9 > 1024*1024)
			 {$("#vista-previa").append("El archivo "+name9+" supera el máximo permitido 1MB");}
			 else
			 {var objeto_url9 = navegador9.createObjectURL(archivo9[x9]);
			  $("#vista-previa").append("<img src="+objeto_url9+" width='200' height='200'>");}
			}
		});
		
		$("#img13").on("change", function(){
			document.getElementById("img14").style.display = "block";
			var archivo9 = document.getElementById('img13').files;
			var navegador9 = window.URL || window.webkitURL;
			for(x9=0; x9<archivo9.length; x9++)
			{
			 var size9 = archivo9[x9].size; var type9 = archivo9[x9].type; var name9 = archivo9[x9].name;
			 if (type9 != 'image/jpeg' && type9 != 'image/jpg' && type9 != 'image/png' && type9 != 'image/gif')
			 {$("#vista-previa").append("El archivo "+name9+" no es del tipo de imagen permitido");}
			 else if (size9 > 1024*1024)
			 {$("#vista-previa").append("El archivo "+name9+" supera el máximo permitido 1MB");}
			 else
			 {var objeto_url9 = navegador9.createObjectURL(archivo9[x9]);
			  $("#vista-previa").append("<img src="+objeto_url9+" width='200' height='200'>");}
			}
		});
		
		$("#img14").on("change", function(){
			document.getElementById("img13").style.display = "block";
			var archivo9 = document.getElementById('img14').files;
			var navegador9 = window.URL || window.webkitURL;
			for(x9=0; x9<archivo9.length; x9++)
			{
			 var size9 = archivo9[x9].size; var type9 = archivo9[x9].type; var name9 = archivo9[x9].name;
			 if (type9 != 'image/jpeg' && type9 != 'image/jpg' && type9 != 'image/png' && type9 != 'image/gif')
			 {$("#vista-previa").append("El archivo "+name9+" no es del tipo de imagen permitido");}
			 else if (size9 > 1024*1024)
			 {$("#vista-previa").append("El archivo "+name9+" supera el máximo permitido 1MB");}
			 else
			 {var objeto_url9 = navegador9.createObjectURL(archivo9[x9]);
			  $("#vista-previa").append("<img src="+objeto_url9+" width='200' height='200'>");}
			}
		});
		
		$("#img15").on("change", function(){
			document.getElementById("img16").style.display = "block";
			var archivo9 = document.getElementById('img15').files;
			var navegador9 = window.URL || window.webkitURL;
			for(x9=0; x9<archivo9.length; x9++)
			{
			 var size9 = archivo9[x9].size; var type9 = archivo9[x9].type; var name9 = archivo9[x9].name;
			 if (type9 != 'image/jpeg' && type9 != 'image/jpg' && type9 != 'image/png' && type9 != 'image/gif')
			 {$("#vista-previa").append("El archivo "+name9+" no es del tipo de imagen permitido");}
			 else if (size9 > 1024*1024)
			 {$("#vista-previa").append("El archivo "+name9+" supera el máximo permitido 1MB");}
			 else
			 {var objeto_url9 = navegador9.createObjectURL(archivo9[x9]);
			  $("#vista-previa").append("<img src="+objeto_url9+" width='200' height='200'>");}
			}
		});
		
		$("#img16").on("change", function(){
			document.getElementById("img17").style.display = "block";
			var archivo9 = document.getElementById('img16').files;
			var navegador9 = window.URL || window.webkitURL;
			for(x9=0; x9<archivo9.length; x9++)
			{
			 var size9 = archivo9[x9].size; var type9 = archivo9[x9].type; var name9 = archivo9[x9].name;
			 if (type9 != 'image/jpeg' && type9 != 'image/jpg' && type9 != 'image/png' && type9 != 'image/gif')
			 {$("#vista-previa").append("El archivo "+name9+" no es del tipo de imagen permitido");}
			 else if (size9 > 1024*1024)
			 {$("#vista-previa").append("El archivo "+name9+" supera el máximo permitido 1MB");}
			 else
			 {var objeto_url9 = navegador9.createObjectURL(archivo9[x9]);
			  $("#vista-previa").append("<img src="+objeto_url9+" width='200' height='200'>");}
			}
		});
		
		$("#img17").on("change", function(){
			document.getElementById("img18").style.display = "block";
			var archivo9 = document.getElementById('img17').files;
			var navegador9 = window.URL || window.webkitURL;
			for(x9=0; x9<archivo9.length; x9++)
			{
			 var size9 = archivo9[x9].size; var type9 = archivo9[x9].type; var name9 = archivo9[x9].name;
			 if (type9 != 'image/jpeg' && type9 != 'image/jpg' && type9 != 'image/png' && type9 != 'image/gif')
			 {$("#vista-previa").append("El archivo "+name9+" no es del tipo de imagen permitido");}
			 else if (size9 > 1024*1024)
			 {$("#vista-previa").append("El archivo "+name9+" supera el máximo permitido 1MB");}
			 else
			 {var objeto_url9 = navegador9.createObjectURL(archivo9[x9]);
			  $("#vista-previa").append("<img src="+objeto_url9+" width='200' height='200'>");}
			}
		});
		
		$("#img18").on("change", function(){
			document.getElementById("img19").style.display = "block";
			var archivo9 = document.getElementById('img18').files;
			var navegador9 = window.URL || window.webkitURL;
			for(x9=0; x9<archivo9.length; x9++)
			{
			 var size9 = archivo9[x9].size; var type9 = archivo9[x9].type; var name9 = archivo9[x9].name;
			 if (type9 != 'image/jpeg' && type9 != 'image/jpg' && type9 != 'image/png' && type9 != 'image/gif')
			 {$("#vista-previa").append("El archivo "+name9+" no es del tipo de imagen permitido");}
			 else if (size9 > 1024*1024)
			 {$("#vista-previa").append("El archivo "+name9+" supera el máximo permitido 1MB");}
			 else
			 {var objeto_url9 = navegador9.createObjectURL(archivo9[x9]);
			  $("#vista-previa").append("<img src="+objeto_url9+" width='200' height='200'>");}
			}
		});
		
		$("#img19").on("change", function(){
			document.getElementById("img20").style.display = "block";
			var archivo9 = document.getElementById('img19').files;
			var navegador9 = window.URL || window.webkitURL;
			for(x9=0; x9<archivo9.length; x9++)
			{
			 var size9 = archivo9[x9].size; var type9 = archivo9[x9].type; var name9 = archivo9[x9].name;
			 if (type9 != 'image/jpeg' && type9 != 'image/jpg' && type9 != 'image/png' && type9 != 'image/gif')
			 {$("#vista-previa").append("El archivo "+name9+" no es del tipo de imagen permitido");}
			 else if (size9 > 1024*1024)
			 {$("#vista-previa").append("El archivo "+name9+" supera el máximo permitido 1MB");}
			 else
			 {var objeto_url9 = navegador9.createObjectURL(archivo9[x9]);
			  $("#vista-previa").append("<img src="+objeto_url9+" width='200' height='200'>");}
			}
		});
		
		$("#img20").on("change", function(){
			document.getElementById("img21").style.display = "block";
			var archivo9 = document.getElementById('img20').files;
			var navegador9 = window.URL || window.webkitURL;
			for(x9=0; x9<archivo9.length; x9++)
			{
			 var size9 = archivo9[x9].size; var type9 = archivo9[x9].type; var name9 = archivo9[x9].name;
			 if (type9 != 'image/jpeg' && type9 != 'image/jpg' && type9 != 'image/png' && type9 != 'image/gif')
			 {$("#vista-previa").append("El archivo "+name9+" no es del tipo de imagen permitido");}
			 else if (size9 > 1024*1024)
			 {$("#vista-previa").append("El archivo "+name9+" supera el máximo permitido 1MB");}
			 else
			 {var objeto_url9 = navegador9.createObjectURL(archivo9[x9]);
			  $("#vista-previa").append("<img src="+objeto_url9+" width='200' height='200'>");}
			}
		});
		
		$("#img21").on("change", function(){
			document.getElementById("img22").style.display = "block";
			var archivo9 = document.getElementById('img21').files;
			var navegador9 = window.URL || window.webkitURL;
			for(x9=0; x9<archivo9.length; x9++)
			{
			 var size9 = archivo9[x9].size; var type9 = archivo9[x9].type; var name9 = archivo9[x9].name;
			 if (type9 != 'image/jpeg' && type9 != 'image/jpg' && type9 != 'image/png' && type9 != 'image/gif')
			 {$("#vista-previa").append("El archivo "+name9+" no es del tipo de imagen permitido");}
			 else if (size9 > 1024*1024)
			 {$("#vista-previa").append("El archivo "+name9+" supera el máximo permitido 1MB");}
			 else
			 {var objeto_url9 = navegador9.createObjectURL(archivo9[x9]);
			  $("#vista-previa").append("<img src="+objeto_url9+" width='200' height='200'>");}
			}
		});
		
		$("#img22").on("change", function(){
			document.getElementById("img23").style.display = "block";
			var archivo9 = document.getElementById('img22').files;
			var navegador9 = window.URL || window.webkitURL;
			for(x9=0; x9<archivo9.length; x9++)
			{
			 var size9 = archivo9[x9].size; var type9 = archivo9[x9].type; var name9 = archivo9[x9].name;
			 if (type9 != 'image/jpeg' && type9 != 'image/jpg' && type9 != 'image/png' && type9 != 'image/gif')
			 {$("#vista-previa").append("El archivo "+name9+" no es del tipo de imagen permitido");}
			 else if (size9 > 1024*1024)
			 {$("#vista-previa").append("El archivo "+name9+" supera el máximo permitido 1MB");}
			 else
			 {var objeto_url9 = navegador9.createObjectURL(archivo9[x9]);
			  $("#vista-previa").append("<img src="+objeto_url9+" width='200' height='200'>");}
			}
		});
		
		$("#img23").on("change", function(){
			document.getElementById("img24").style.display = "block";
			var archivo9 = document.getElementById('img23').files;
			var navegador9 = window.URL || window.webkitURL;
			for(x9=0; x9<archivo9.length; x9++)
			{
			 var size9 = archivo9[x9].size; var type9 = archivo9[x9].type; var name9 = archivo9[x9].name;
			 if (type9 != 'image/jpeg' && type9 != 'image/jpg' && type9 != 'image/png' && type9 != 'image/gif')
			 {$("#vista-previa").append("El archivo "+name9+" no es del tipo de imagen permitido");}
			 else if (size9 > 1024*1024)
			 {$("#vista-previa").append("El archivo "+name9+" supera el máximo permitido 1MB");}
			 else
			 {var objeto_url9 = navegador9.createObjectURL(archivo9[x9]);
			  $("#vista-previa").append("<img src="+objeto_url9+" width='200' height='200'>");}
			}
		});
		
		$("#img24").on("change", function(){
			document.getElementById("img25").style.display = "block";
			var archivo9 = document.getElementById('img24').files;
			var navegador9 = window.URL || window.webkitURL;
			for(x9=0; x9<archivo9.length; x9++)
			{
			 var size9 = archivo9[x9].size; var type9 = archivo9[x9].type; var name9 = archivo9[x9].name;
			 if (type9 != 'image/jpeg' && type9 != 'image/jpg' && type9 != 'image/png' && type9 != 'image/gif')
			 {$("#vista-previa").append("El archivo "+name9+" no es del tipo de imagen permitido");}
			 else if (size9 > 1024*1024)
			 {$("#vista-previa").append("El archivo "+name9+" supera el máximo permitido 1MB");}
			 else
			 {var objeto_url9 = navegador9.createObjectURL(archivo9[x9]);
			  $("#vista-previa").append("<img src="+objeto_url9+" width='200' height='200'>");}
			}
		});
		
		$("#img25").on("change", function(){
			
			var archivo9 = document.getElementById('img25').files;
			var navegador9 = window.URL || window.webkitURL;
			for(x9=0; x9<archivo9.length; x9++)
			{
			 var size9 = archivo9[x9].size; var type9 = archivo9[x9].type; var name9 = archivo9[x9].name;
			 if (type9 != 'image/jpeg' && type9 != 'image/jpg' && type9 != 'image/png' && type9 != 'image/gif')
			 {$("#vista-previa").append("El archivo "+name9+" no es del tipo de imagen permitido");}
			 else if (size9 > 1024*1024)
			 {$("#vista-previa").append("El archivo "+name9+" supera el máximo permitido 1MB");}
			 else
			 {var objeto_url9 = navegador9.createObjectURL(archivo9[x9]);
			  $("#vista-previa").append("<img src="+objeto_url9+" width='200' height='200'>");}
			}
		});
		
		
	
		
   });
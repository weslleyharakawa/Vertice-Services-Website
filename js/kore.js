$(function(){$("#mainForm").bind("submit", FormValid);});

function FormValid(e)
{
	var canSubmit = true;	
	var messages = "<ul>";		
	var c = 0;

	$("[req=true]").each(function()
				{	                           
				   if ($(this).attr("func") == "NoFirst")
				   {
				   	if ($(this).attr('selectedIndex') == 0)
				   	{
						canSubmit = false;
						messages += "<li>" + $(this).attr("label") + " é obrigatório</li>";
						$(this).css("border-color", "red");				   	
						
						if (c == 0) {$(this).focus();}
						c++;
				   	}
					else {$(this).css("border-color", "black");}
				   }
				   else if ($(this).attr("func") == "Boxes")
				   {				   	
				   	var bx = $(this).attr("box");
				   	alert('Boxes: ' + bx) ;
				   	
				   	control = document.mainForm.bx;
				   	
				   	alert(control.length);
				   	
				   	/*var c = 0;
					for (i=0; i< control.length; i++)
					{
						if (control[i].checked==true)
						alert("Checkbox at index "+i+" is checked!")
						c++;
					}		
					
					alert(c);		   	
					*/
				   	
				   	//var control = document.mainForm.bx;
				   	
				   	//alert($(bx).length);
				   	
				   	/*for (var i=0;i<control.lenght;i++)
				   	{  
					     	 if (control[i].checked == true){  
					     	 	c++;
					      }  
					 } 
					 
					 alert(c);
				   	*/
				   	canSubmit = false;
				   	
				   }
				   else if ($(this).attr("func") == "Mail")
				   {										
				        var email = $(this).val();
				        //alert(email);				        				   
					if (email.indexOf("@") == -1 || email.indexOf(".") == -1)
					{
						canSubmit = false;
						messages += "<li>" + $(this).attr("label") + " é obrigatório</li>";
						$(this).css("border-color", "red");
						if (c == 0) {$(this).focus();}
						c++;						
					}
					else {$(this).css("border-color", "black");}					
				   }				   
				   else
				   {										
				
					if($(this).val().length < 1)
					{
						canSubmit = false;
						messages += "<li>" + $(this).attr("label") + " é obrigatório</li>";
						$(this).css("border-color", "red");
						if (c == 0) {$(this).focus();}
						c++;						
					}
					else {$(this).css("border-color", "black");}
				   }
				}
	                     );
	
	messages += "</ul>";	
	messages = 'Preencha os campos selecionados com vermelho';

	if(canSubmit == false)
	{
	   //$("#divError").html(messages).css("color", "red").fadeIn(300);
	   ErrorForm();
	}

	return canSubmit;
}
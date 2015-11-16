// JavaScript Document
function getthebitch(){
if(document.getElementById('male').checked && document.getElementById('female').checked){
 	document.getElementById('female').checked = false;
	document.getElementById('male').checked = false ;
	}
};
function hideit(){
	
	document.getElementById('Rounded_Rectangle_id').style.display = "none";
	document.getElementById('Rounded_Rectangle_id_2').style.display = "none";
	document.getElementById('rounded_notificat').style.display = "none";
	document.getElementById('rounded_pass').style.display = "inline";
	};
function hideit_h(){
	document.getElementById('Rounded_Rectangle_id').style.display = "inline";
	document.getElementById('Rounded_Rectangle_id_2').style.display = "inline";
	document.getElementById('rounded_pass').style.display = "none";
	document.getElementById('rounded_notificat').style.display = "none";
	};
function hideit_h2(){
	document.getElementById('Rounded_Rectangle_id').style.display = "none";
	document.getElementById('Rounded_Rectangle_id_2').style.display = "none";
	document.getElementById('rounded_pass').style.display = "none";
	document.getElementById('rounded_notificat').style.display = "inline";
	};
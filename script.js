const navLinks = document.querySelector('.nav-links');
const closeMenu = document.querySelector('.closeMenu');
const openMenu = document.querySelector('.openMenu');

openMenu.addEventListener('click',show);
closeMenu.addEventListener('click',close);

function show(){
	navLinks.style.display = 'flex';
	navLinks.style.top = '0';
}
function close(){
	navLinks.style.top = '-100%';
}

/*function formSubmit(){
	$.ajax({
		type: 'POST',
		url:'jsonToMysql.php',
		data:$(this.form).serialize(),
		success:function(response){
			$('#success').html(response);
		}
	});
	var form = document.getElementById('frmMovie').reset();
	return false;
}*/

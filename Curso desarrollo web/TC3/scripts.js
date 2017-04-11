function  verificar(control, max, progressText) {
	var cant=control.value.length;
	console.log(cant);
	if(cant<max){
		progressText.textContent='Usted tiene un espacio de '+(max-cant)+' caracteres restantes';
	}else{
		  control.value = control.value.substring( 0, max);
		progressText.textContent='Usted tiene un espacio de '+(0)+' caracteres restantes';
		return false;
	}

}

$('.btnedit').click(e => {
	//alert('has hecho click')
	let textvalues = mostrarDatos(e);
	//console.log(textvalues);
	let id = $("input[name*='Id_libro']");
	let nombrelibro = $("input[name*='nombre_libro']");
	let editoria = $("input[name*='editorial_libro']");
	let precio = $("input[name*='precio_libro']"); 

	id.val(textvalues[0]);
	nombrelibro.val(textvalues[1]);
	editoria.val(textvalues[2]);
	precio.val(textvalues[3]);
})

function mostrarDatos(e){
	let id = 0;
	const td = $("#tbody tr td");
	let textvalues = [];

	for(const value of td){
		if (value.dataset.id == e.target.dataset.id) {
			/*console.log(e.target.dataset.id);
			console.log(value);*/
			textvalues[id++] = value.textContent;
		}
		
	}
	return textvalues;
}
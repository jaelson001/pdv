document.getElementById("cadastrar").addEventListener("click", function(){
	clearPopup("popup");
	document.getElementById("popup").style.display = "flex";
});

document.querySelectorAll(".editar").forEach((item)=>{
	item.addEventListener("click", function(){
		let id = this.getAttribute("data-item");
		clearPopup("popup");
		document.getElementById("popup").style.display = "flex";
		//preencher com dados do produto escolhido
		let prod = products.filter((atual)=>{
			return atual.id == id;
		});
		prod = prod[0];
		document.getElementById("id").value = prod.id;
		document.getElementById("name").value = prod.name;
		document.getElementById("description").value = prod.description;
		document.getElementById("price").value = parseInt(prod.price);
		document.getElementById("quantity").value = parseInt(prod.quantity);

	});
});

document.querySelector(".fechar_popup").addEventListener("click", function(){
	document.getElementById("popup").style.display = "none";
});

const clearPopup = (id) =>{
	document.querySelectorAll(`#${id} input[type="text"]`).forEach((item)=>{
		item.value = "";
	});
	document.querySelectorAll(`#${id} input[type="number"]`).forEach((item)=>{
		item.value = "";
	});
};
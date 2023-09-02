document.getElementById("cadastrar").addEventListener("click", function(){
	clearPopup("popup_create");
	document.getElementById("popup_create").style.display = "flex";
});

document.querySelectorAll(".editar").forEach((item)=>{
	item.addEventListener("click", function(){
		let id = this.getAttribute("data-item");
		clearPopup("popup_update");
		document.getElementById("popup_update").style.display = "flex";
		//preencher com dados do produto escolhido
		let prod = products.filter((atual)=>{
			return atual.id == id;
		});
		prod = prod[0];
		document.getElementById("update_id").value = prod.id;
		document.getElementById("update_name").value = prod.name;
		document.getElementById("update_description").value = prod.description;
		document.getElementById("update_price").value = parseInt(prod.price);
		document.getElementById("update_quantity").value = parseInt(prod.quantity);
	});
});

document.querySelector(".fechar_popup").addEventListener("click", function(){
	document.getElementById("popup_create").style.display = "none";
	document.getElementById("popup_update").style.display = "none";
});

const clearPopup = (id) =>{
	document.querySelectorAll(`#${id} input[type="text"]`).forEach((item)=>{
		item.value = "";
	});
	document.querySelectorAll(`#${id} input[type="number"]`).forEach((item)=>{
		item.value = "";
	});
};

document.addEventListener("click", (event) => {
    let x = event.target;
    if(x.getAttribute("data-delete") != undefined){
    	let conf = confirm("Deseja mesmo excluir esse item?");
    	if(conf){
    		fetch("/api/product/"+x.getAttribute("data-delete"), {
    			method:"DELETE"
    		}).then((res) => res.json()).then((response) => {
    			if(response.success != undefined){
    				snackBar(response.success, "SUCCESS", 3_000);
    			}else if(response.error != undefined){
    				snackBar(response.error, "ERRROR", 3_000);
    			}
    		});
    	}
        
    }
});

document.getElementById("search").addEventListener("keyup", function(event){
	let text = event.target.value;
	if(event.target.value.length == 0){
		document.querySelectorAll("[data-name]").forEach((i) => { i.style.display = "table-row"; });
	}else{
		document.querySelectorAll("[data-name]").forEach((i) => { i.style.display = "none"; });
		document.querySelectorAll(`[data-name *= "${text}"]`).forEach((i) => { i.style.display = "table-row"; });
	}
});
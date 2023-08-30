window.cart = {
    'lista':[],
    'total':function(){
        let t = 0;
        for(let i = 0; i < this.lista.length; i++){ t += this.lista[i].price; }
        return t;
    },
    'add':function(code){
        fetch("/api/product/"+code).then(res => res.json()).then((response) => {
            //create list item from array values of response
            if(response.error != undefined){
                console.info(response);
                snackBar(response.error, "ERROR");
            }else{
                this.lista.push(response);
                createListItems(this.lista, "list");
            }
            document.getElementById("search").value = "";    
        });
    },
    'remove': function(index) {
        this.lista.splice(index, 1);
        createListItems(this.lista, "list");
    },
    'clear': function(){
        this.lista = [];
        createListItems(this.lista, "list");
    }
};

const createListItems = (lista, destiny) => {
    let des = document.getElementById(destiny);
    des.innerHTML = "";
    let total = 0;
    for(let l = 0; l<lista.length;l++){
        let data = Object.values(lista[l]);
        let keys = Object.keys(lista[l]);
        let line = document.createElement("tr");
        line.setAttribute("id", des.childElementCount);
        for(let i = 0; i< data.length; i++){
            let cell = document.createElement("td");
            cell.innerText = keys[i] !== "price" ? data[i] : "R$"+parseFloat(data[i] / 100).toFixed(2);
            if(keys[i] !== "price"){
                cell.innerText = data[i]; 
            }else{ 
                cell.innerText = "R$"+parseFloat(data[i] / 100).toFixed(2);
                total += data[i];
            }
            line.appendChild(cell);
        }
        let cell = document.createElement("td");
        cell.setAttribute("data-delete",des.childElementCount);
        cell.classList.add("text-danger");
        cell.innerHTML = '<i class="bi bi-x-lg"></i>';
        line.appendChild(cell);
        document.getElementById(destiny).appendChild(line);
    }
    document.getElementById("total").innerText = "R$"+parseFloat(total / 100).toFixed(2);
}

document.addEventListener("keydown",function(event){
    if(event.key == "f" || event.key == "F"){
        event.preventDefault();
      document.querySelector('#search').focus();
    }else if(event.keyCode == 13){
        cart.add(document.querySelector("#search").value);
    }
});

document.addEventListener("click", (event) => {
    let x = event.target;
    if(x.getAttribute("data-delete") != undefined){
        cart.remove(x.getAttribute("data-delete"));
    }else if(x.classList != undefined && x.classList.contains("payment")){
        let payment = x.getAttribute("data-payment");
        //enviar pra fechar pedido
        fetch("/api/order", {
            method:"POST",
            headers: { 'Content-Type': 'application/json'},
            body:JSON.stringify({
                products:JSON.stringify(cart.lista),
                payment:payment,
                user:window.user
            })
        }).then(res => res.json()).then((response)=>{
            if(response.error !== undefined){
                snackBar(response.error, "ERROR");
            }else{
                snackBar(response.success, "SUCCESS", 3000);
            }
        });
        //limpar lista
        cart.clear();
    }else if(x.classList != undefined && x.classList.contains("clear")){
        let res = confirm("Deseja limpar a lista?")
        if(res){
            cart.clear();
        }
    }
});


document.querySelectorAll('[type="color"]').forEach((item) =>{
	item.addEventListener("change", (event) => {
		let id = event.target.getAttribute("id");
		console.log(event.target);
		console.log(id);
		document.querySelector(`[for="${id}"]`).style.background = event.target.value;
	})
});

document.getElementById("logo").addEventListener("change", function(e){
	let file = this.files[0];
	var reader = new FileReader();   
    reader.readAsDataURL(file);  
    reader.onload = function () { 
        console.log(reader.result);
        document.querySelector("label.drop_area>img").setAttribute("src",reader.result); 
    };  
    reader.onerror = function (error) { console.log('Error: ', error); };
});
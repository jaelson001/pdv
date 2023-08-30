
var snackBar = function(texto, nivel, reload_time, debug){
	var bg_nivel;
	switch(nivel){
		case "ERROR":
			bg_nivel = "#f44336";
			texto = '<i class="fa fa-times-circle" aria-hidden="true"></i>  '+texto;
			break;
		case "INFO":
			bg_nivel = "#2196f3";
			texto = '<i class="fa fa-info-circle" aria-hidden="true"></i>  '+texto;
			break;
		case "WARNING":
			bg_nivel = "#ff9800";
			texto = '<i class="fa fa-exclamation-circle" aria-hidden="true"></i>  '+texto;
			break;
		case "SUCCESS":
			bg_nivel = "#4caf50";
			texto = '<i class="fa fa-check-circle" aria-hidden="true"></i>  '+texto;
			break;
		default:
			bg_nivel = "#333";
	}
	var snack = document.createElement("div");
	snack.classList.add("snack-bar");
	snack.style.cssText = `display:none; transition: all 0.3s; background: ${bg_nivel};padding:13px; width: 100%; color: #eee;border-radius: 5px; box-shadow: 0px 2px 30px -7px #3337;font-family: Arial; sans-serif; font-size: 0.8rem;font-weight: bold; position: relative;height: auto;margin:5px;overflow: hidden; text-overflow: ellipsis;`;
	var wrapper = document.querySelector(".snack-wrapper");
	snack.innerHTML = texto;
	snack.style.display = "block";
	wrapper.append(snack);
	if(debug == undefined){
		setTimeout(function(){
			snack.style.display = "none";
			setTimeout(function(){
				snack.remove();
			},1000);
			
		},3000);
		if(reload_time != undefined){
			if(reload_time > 3000){
				setTimeout(location.reload.bind(location), reload_time);
			}else{
				setTimeout(location.reload.bind(location), 3000);
			}
		}
	}
};

window.onload = function(){
	var stylesheet = document.createElement("link");
	Object.assign(stylesheet, {
		href: "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css",
		rel: 'stylesheet',
		type: 'text/css',
	});
	document.head.appendChild(stylesheet);
	var wrapper = document.createElement('div');
	wrapper.classList.add("snack-wrapper");
	wrapper.style.cssText = `display:flex; transition: all 0.3s; background: transparent;padding: 5px; width: 33.3333%; color: #eee;border-radius: 5px; position: fixed;bottom: 10px; right: 50%;z-index:9999; height: fit-content;flex-flow: column-reverse wrap; transform:translateX(50%);`;
	document.body.appendChild(wrapper);
}
window.snackBar = snackBar;
console.log("snackbar instalado com sucesso!");
var view_description = function($desc){
	var container = document.createElement('div');
	container.style.position = 'relative';
	container.style.width = '80%';
	container.style.height = '90%';
	container.style.display = 'flex';
	container.style.justifyContent = 'center';
	container.style.alignItems = 'center';
	container.style.flexDirection = "column";

	var description = document.createElement('div');
	description.style.width = '100%';
	description.style.fontFamily = "sans-serif";
	description.style.padding = '10px 20px 30px';
	description.style.background = 'black';
	description.style.color = 'white';
	description.style.overflowWrap = 'break-word';
	description.style.overflow = 'scroll';
	description.style.opacity = '0.8';
	description.style.fontSize = '1.1em';

	description.innerHTML = "<b style='font-style: italic;'>DESCRIPTION</b><span style='display: block; width: 70%; margin-left: 10px; height: 1px; background: white;'></span><br/>" + $desc;

	var div = document.createElement('div');
	div.style.position = 'fixed';
	div.style.left = '0';
	div.style.top = '0';
	div.style.zIndex = "500";
	div.style.width = '100%';
	div.style.height = '100%';
	div.style.backgroundColor = "rgba(0, 0, 0, 0.6)";
	div.style.display = 'flex';
	div.style.justifyContent = 'center';
	div.style.alignItems = 'center';
	div.addEventListener('click', function(){
		div.style.display = "none";
	});

	container.appendChild(description);
	div.appendChild(container);
	document.querySelector('body').appendChild(div);
}
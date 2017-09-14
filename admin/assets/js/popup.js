var popup = function(){
	var ajouter = document.createElement('div');
	ajouter.style.width = 'calc(100% / 2)';
	ajouter.style.height = '50px';
	ajouter.style.position = 'fixed';
	ajouter.innerHTML = '<a href="index.php?p=add_food">Ajouter Contenu</a>';
	ajouter.style.textAlign = 'center';
	ajouter.style.fontFamily = "Arial, sans-serif";
	ajouter.style.lineHeight = '50px';
	ajouter.style.background = 'white';
	ajouter.style.color = 'black';
	ajouter.style.top = "40%";
	ajouter.style.borderRadius = '10px';
	ajouter.style.left = "calc(100% / 2 - 50% / 2)";
	ajouter.style.fontSize = "1.4em";
	ajouter.style.cursor = "pointer";

	var modifier = document.createElement('div');
	modifier.style.width = 'calc(100% / 2)';
	modifier.style.height = '50px';
	modifier.style.position = 'fixed';
	modifier.innerHTML = '<a href="index.php?p=modify_food">Modifier Contenu</a>';
	modifier.style.textAlign = 'center';
	modifier.style.fontFamily = "Arial, sans-serif";
	modifier.style.lineHeight = '50px';
	modifier.style.background = 'white';
	modifier.style.color = 'black';
	modifier.style.top = "50%";
	modifier.style.borderRadius = '10px';
	modifier.style.left = "calc(100% / 2 - 50% / 2)";
	modifier.style.fontSize = "1.4em";
	modifier.style.cursor = "pointer";

	var anything = document.createElement('div');
	anything.style.width = 'calc(100% / 2)';
	anything.style.height = '50px';
	anything.style.position = 'fixed';
	anything.innerHTML = '<a href="#">Annuler</a>';
	anything.style.textAlign = 'center';
	anything.style.fontFamily = "Arial, sans-serif";
	anything.style.lineHeight = '50px';
	anything.style.background = 'white';
	anything.style.color = 'black';
	anything.style.top = "60%";
	anything.style.borderRadius = '10px';
	anything.style.left = "calc(100% / 2 - 50% / 2)";
	anything.style.fontSize = "1.4em";
	anything.style.cursor = "pointer";
	anything.addEventListener('click', function(){
		div.style.display = "none";
	});

	var div = document.createElement('div');
	div.style.position = 'fixed';
	div.style.left = '0';
	div.style.top = '0';
	div.style.zIndex = "500";
	div.style.width = '100%';
	div.style.height = '100%';
	div.style.backgroundColor = "rgba(0, 0, 0, 0.6)";
	div.appendChild(modifier);
	div.appendChild(ajouter);
	div.appendChild(anything);
	div.addEventListener('click', function(){
		div.style.display = "none";
	});
	document.querySelector('body').appendChild(div);
}
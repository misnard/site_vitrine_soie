var preview = function(image, name = null, price = null, desc = null, date = null, category = null, sub_cat = null, $alt = null)
{
	var container = document.createElement('div');
	container.style.position = 'relative';
	container.style.width = '80%';
	container.style.height = 'auto';
	container.style.left = '10%';
	container.style.float = 'left';
	container.style.display = 'flex';
	container.style.justifyContent = 'center';
	container.style.alignItems = 'center';
	container.style.flexDirection = "column";
	container.style.float = 'left';

	var figure = document.createElement('figure');
	figure.style.position = "absolute";
	figure.style.left = "0";
	figure.style.width = "100%";
	figure.style.top = "0";
	figure.style.display = 'flex';
	figure.style.flexDirection = 'column';
	figure.style.justifyContent = 'center';
	figure.style.alignItems = 'center';
	figure.style.transition = '1s';
	figure.style.float = 'left';

	var figcaption = document.createElement('figcaption');
	figcaption.style.background = "rgba(0, 0, 0, 0.7)";
	figcaption.style.textAlign = 'center';
	figcaption.style.color = 'white';
	figcaption.style.width = '100%';
	figcaption.style.fontSize = '1.6em';
	figcaption.style.padding = '20px 0';
	figcaption.style.maxWidth = '500px';
	figcaption.style.float = 'left';

	var span_title = "<span style='display: block; width: 80%; position: relative; left: 10%; height: 3px; background: white; margin-bottom: 30px;'></span>";
	figcaption.innerHTML = "<b style='text-align:center;'><p>Information sur l'image</p></b><b>" + span_title + "</b>";

	var sous_span = "<span style='display: block; width: 60%; position: relative; left: 20%; height: 1px; background: white; margin: 30px 0;'></span>";

	if(name != null)
	{
		var p_name = "<p style='font-size: 0.7em;'>" + name + "</p>";
		figcaption.innerHTML += "<p><i>Nom du plat :</i> " + p_name + "</p>" + sous_span;
	}
	if(category != null)
	{
		var p_category = "<p style='font-size: 0.7em;'>" + category + "</p>";
		figcaption.innerHTML += "<p><i>Catégorie :</i> " + p_category + "</p>" + sous_span;
	}
	if(sub_cat != null)
	{
		var p_sub_category = "<p style='font-size: 0.7em;'>" + sub_cat + "</p>";
		figcaption.innerHTML += "<p><i>Sous catégorie :</i> " + p_sub_category + "</p>" + sous_span;
	}
	if(price != null)
	{
		var p_price = "<p style='font-size: 0.7em;'>" + price + " €</p>";
		figcaption.innerHTML += "<p><i>Prix du plat :</i> " + p_price + "</p>" + sous_span;
	}
	if(date != null)
	{
		var tab_date = date.split(' ');
		var p_date = "<p style='font-size: 0.7em;'>" + tab_date[0] + "<br/>à<br/>" + tab_date[1] + "</p>";
		figcaption.innerHTML += "<p><i>Ajouté le :</i><br/><br/>" + p_date + "</p>" + sous_span;
	}
	if(desc != null)
	{
		var p_desc = "<p style='font-size: 0.7em; overflow-wrap: break-word; margin: 10px; max-width: 100%;'>" + desc + "</p>";
		figcaption.innerHTML += "<p style='max-width: 750px;'><i>Votre descriptif :</i> <br/>" + p_desc + "</p>";
	}

	var img = document.createElement('img');
	img.src = image;
	img.alt = 'Image d\'un plat';

	if($alt != null)
	{
		img.alt = $alt;

		var cache, path = "Racine_du_site";

		cache = image.split("/");

		for(var i = 0; i <= (cache.length - 2); i++)
		{
			path += "/" + cache[i];
		}

		path += "/"
		
		var p_image_path = "<p style='font-size: 0.8em;'>" + path + "</p>";
		figcaption.innerHTML += "<p><i>Répertoire d'accès à l'image :</i> " + p_image_path + "</p>" + sous_span;

		var p_alt = "<p style='font-size: 0.8em;'>" + $alt + "</p>";
		figcaption.innerHTML += "<p><i>Texte en cas d'erreur d'affichage :</i> " + p_alt + "</p>" + sous_span;
	}

	img.style.width = '100%';
	img.style.height = 'auto';
	img.style.maxHeight = '500px';
	img.style.maxWidth = '500px';

	figure.appendChild(img);
	figure.appendChild(figcaption);

	var div = document.createElement('div');
	div.style.position = 'fixed';
	div.style.left = '0';
	div.style.top = '0';
	div.style.zIndex = "500";
	div.style.width = '100%';
	div.style.height = '100%';
	div.style.backgroundColor = "rgba(0, 0, 0, 0.6)";
	div.style.overflow = 'scroll';
	div.addEventListener('click', function(){
		div.style.display = 'none';
	});

	container.appendChild(figure);

	div.appendChild(container);
	document.querySelector('body').appendChild(div);
}
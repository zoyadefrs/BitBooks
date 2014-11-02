json = JSON.parse("[{\"id\":\"3\",\"faculty\":\"COMP\",\"code\":\"202\",\"isbn\":\"5423659874514\",\"title\":\"Really Cool Algorithms\",\"author\":\"Donald Knuth\",\"seller\":\"Wi_Whe\",\"price\":\"8.20\",\"copies\":\"2\"}]");
generate_homepage(json);

function generate_homepage(json_array_obj)
{
	console.log(json_array_obj[0].title);
	var count = 0;
	var content_wrapper = document.getElementById("content_wrapper");
	console.log(content_wrapper);
	for(json = 0; json < json_array_obj.length;json++)
	{
		console.log(json_array_obj[json]);
		var main_div = document.createElement("div");
		var title_div = document.createElement("div");
		var title = document.createTextNode("Title: " + json_array_obj[json].title);
		title_div.appendChild(title);
		main_div.appendChild(title_div);

		var author_div = document.createElement("div");
		var author = document.createTextNode("Author: " + json_array_obj[json].author);
		author_div.appendChild(author);
		main_div.appendChild(author_div);

		var isbn_div = document.createElement("div");
		var isbn = document.createTextNode("ISBN: " + json_array_obj[json].isbn);
		isbn_div.appendChild(isbn);
		main_div.appendChild(isbn_div);

		var copies_div = document.createElement("div");
		var copies = document.createTextNode("Number of copies: " + json_array_obj[json].copies);
		copies_div.appendChild(copies);
		main_div.appendChild(copies_div);

		if(count % 2 == 0)
		{
			
			main_div.className = "even";
		}
		else
		{
			main_div.className = "odd";
		}
		content_wrapper.appendChild(main_div);
		count += 1;
	}

}
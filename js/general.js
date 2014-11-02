function generate_homepage(json_array_obj)
{
	
	var count = 0;
	var content_wrapper = document.getElementById("content_wrapper");
	content_wrapper.innerHTML="";
	for(json = 0; json < json_array_obj.length;json++)
	{
		console.log(json_array_obj[json]);
		var a_wrapper = document.createElement("a");
		a_wrapper.href = "booklist.php?isbn=" + json_array_obj[json].isbn;

		var main_div = document.createElement("div");
		main_div.style.borderRadius="20px";
		var title_div = document.createElement("div");
		title_div.style.margin="5px 20px";
		var title = document.createTextNode("Title: " + json_array_obj[json].title);
		title_div.appendChild(title);
		main_div.appendChild(title_div);

		var author_div = document.createElement("div");
		var author = document.createTextNode("Author: " + json_array_obj[json].author);
		author_div.style.margin="5px 20px";
		author_div.appendChild(author);
		main_div.appendChild(author_div);

		var isbn_div = document.createElement("div");
		var isbn = document.createTextNode("ISBN: " + json_array_obj[json].isbn);
		isbn_div.style.margin="5px 20px";
		isbn_div.appendChild(isbn);
		main_div.appendChild(isbn_div);

		var copies_div = document.createElement("div");
		var copies = document.createTextNode("Number of copies: " + json_array_obj[json].copies);
		copies_div.style.margin="5px 20px";
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
		a_wrapper.appendChild(main_div);
		content_wrapper.appendChild(a_wrapper);
		count += 1;
	}

}


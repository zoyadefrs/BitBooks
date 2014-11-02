console.log("CAn I go to bed, yet?");
function searchForBook()
{
    console.log("GOing to bed");
    xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function()
    {
	if (xmlhttp.readyState==4 && xmlhttp.status==200)
	{
	    console.log(xmlhttp.responseText);
	    var res = JSON.parse(xmlhttp.responseText);
	    console.log(res);
	    generate_homepage(res);
	    //document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
	}
    }
    var courseNameBox = document.getElementById("coursename");
    var courseNumberBox = document.getElementById("coursenumber");
    console.log(courseNumberBox);
    if(courseNameBox.value != "" || courseNumberBox.value != "")
    {
	console.log('wat------');
	var url = "get_book_list.php?" +
	    ((courseNameBox.value != "")?"faculty=" + 
	     courseNameBox.value:"") + 

	    ((courseNameBox.value != "" && courseNumberBox.value != "")?"&":"")+
	    
	    ((courseNumberBox.value != "")?"code=" + 
	     courseNumberBox.value:"");
	console.log(url);
	xmlhttp.open("GET",url,true);
	xmlhttp.send();
    }
    
    return false;
}


//array of words & unique & frequencies
var arr_tags;
var arr_unqiueWd;
var arr_uniqueWdCt;
var count;
var divNode;
var newDivNode;
var oldCookie;

//4. keep track of the maximum frequency for the set of tags
function getMax()
{
	var max = 0;
	for( var i = 0; i < arr_uniqueWdCt.length; i++)
	{
		if( max < arr_uniqueWdCt[i] )
			max = arr_uniqueWdCt[i];
	}
	return max;
}

//5. create a div element containing all the tags as span elements as described above.
function createDiv()
{

	newDivNode = document.createElement("div");
	
	for( var i = 0; i < arr_uniqueWd.length; i++)
	{
		var spanNode = document.createElement("span");
		text = arr_uniqueWd[i];
		spanNode.appendChild(document.createTextNode(text));
		spanode.setAttribute("class", arr_uniqueWd[i]);
		newDivNode.appendChild(spanNode);
	}
	
	divNode.appendChild(newDivNode);
}

// 7. //loop through span child elements in the div and assign a suitable font size to them
function setFont()
{
	for( var i = 0; i < arr_uniqueWdCt.length; i++)
	{
		var fontNum = Math.round((arr_uniqueWdCt[i] / getMax())*20) + 15;
		var fontPt = fontNum + "pt";
		var arr_span = document.getElementsByTagName("span");
		arr_span[i].style.fontSize = fontPt;
	}
}

//8. add an onclick function to each element in the tag cloud
function addonClick()
{
	var arr_span = document.getElementsByTagName("span");
	arr_span[0].onclick = function() { alert(arr_span[0].value + ": " + arr_uniqueWdCt[0] + " occurrences"); }
}

//9. remove existing div node, and add new divNode
function removeOldDiv()
{
	var arr_div = document.getElementsByTagName("div");
	arr_div[0].parentNode.replaceChild(newDivNode,arr_div[0]);
}

function makeCloud()
{
// 1.
	var txtarea_node = document.getElementById("tags");
	var str_tags = txtarea_node.innerHTML;
	
// 2. puts the array of tags in alphabetical order
	arr_tags = str_tags.split(" ");
	arr_tags.sort();
	
	
//3. // store number of unique words in arrWords
		// store frequencies of each unique words
	arr_uniqueWd = new Array();
	arr_uniqueWd.push(arr_tags[0]);
	
	arr_uniqeWdCt = newArray();
	uniCt = 1;
	count = 0;

	for( var i = 0; i < arr_tags.length; i++)
	{
		if(arr_uniqueWd[count] != arr_tags[i])
		{
			arr_uniqueWd.push(arr_tags[i]);
			arr_uniqueWdCt.push(uniCt);
			uniCt = 1;
			count++;
		}
		else
		{
			uniCt++;
		}		
	}
	
	createDiv();
	newDivNode.style.border = ".1em solid silver";
	newDivNode.style.background = "blue";
	newDivNode.style.color = "silver";
	newDivNode.style.font = "serif";
	newDivNode.style.fontSize = "x-large";
	setFont();
	addonClick();
	removeOldDiv();
}

//cookie will store the previous values and text_area
function saveCloud()
{
	var cookiedate = new Date();
	document.cookie = "txt_cookie = " + document.getElementById("tags").innerHTML + "; expires = " + cookiedate.toLocaleString(); 
	oldCookie = "txt_cookie";
}

//Load Cloud" button should load the contents of a previously saved cookie into the textarea
function loadCloud()
{
	var arr_cookie = document.cookie.split(";");
	var cookie = cookie_array[0];
	cookie_data_arr = cookie.split("=");
	cookie_value = cookie_data_arr[1];
	document.getElementById("tags").innerHTML = cookie_value;
}

//should also clear the cookie
function clearArea()
{
	document.getElementById("tags").value = "";
}
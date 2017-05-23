
//array of words & unique & frequencies
var arr_tags;
var arr_unqiueWd;
var arr_uniqueWdCt;
var count;
var newDivNode;
var spanNode;
var arr_span;

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
		spanNode = document.createElement("span");
		text = arr_uniqueWd[i];
		spanNode.appendChild(document.createTextNode(text + " "));
		newDivNode.appendChild(spanNode);
	}
	var arr_div = document.getElementsByTagName("div");
	arr_div[0].parentNode.replaceChild(newDivNode,arr_div[0]);
	arr_span = document.getElementsByTagName("span");
	for(var i = 0; i < arr_uniqueWd.length; i++)
	(function(i){
	
		arr_span[i].onclick = function()
		{
			alert(arr_uniqueWd[i] + ": " + arr_uniqueWdCt[i] + " occurrences");
		};
	})(i);
}

// 7. //loop through span child elements in the div and assign a suitable font size to them
function setFont()
{
	var arr_span = document.getElementsByTagName("span");
	for( var i = 0; i < arr_uniqueWdCt.length; i++)
	{
		var fontNum = Math.round((arr_uniqueWdCt[i] / getMax())*20) + 15;
		var fontPt = fontNum + "pt";
		arr_span[i].style.fontSize = fontPt;
	}
}

function makeCloud()
{
// 1.
	var txtarea_node = document.getElementById("tags");
	var str_tags = txtarea_node.value;
	
// 2. puts the array of tags in alphabetical order
	arr_tags = str_tags.split(" ");
	arr_tags.sort();
	
	
//3. // store number of unique words in arrWords
		// store frequencies of each unique words
	arr_uniqueWd = new Array();
	arr_uniqueWd.push(arr_tags[0]);
	
	arr_uniqueWdCt = new Array();
	uniCt = 1;
	count = 0;
							
	for( var i = 1; i <= arr_tags.length; i++)		
	{
		if(arr_uniqueWd[count] != arr_tags[i])
		{
			if( i != arr_tags.length)
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
}

//cookie will store the previous values and text_area
function saveCloud()
{
	document.cookie = "txt_cookie =" + document.getElementById("tags").value; 
}

//Load Cloud" button should load the contents of a previously saved cookie into the textarea
function loadCloud()
{
	cookie_data_arr = document.cookie.split("=");
	cookie_value = cookie_data_arr[1];
	document.getElementById("tags").value = cookie_value;
}

//should also clear the cookie
function clearArea()
{
	document.getElementById("tags").value = "";
}
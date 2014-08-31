/*Director |*/
function cat()
{
	var c=document.getElementById('category').value;
	document.getElementById('indicator').innerHTML='Loading sub-categories...';
	document.getElementById('button-sub').disabled='disabled';
	$.get('ratrest/form.php?cat='+c,function(data,success){
		if(success!='success')
		{
		document.getElementById('indicator').innerHTML='An error have been encountered while completing your request, please try again.';
		}
		document.getElementById('indicator').innerHTML=data;
		document.getElementById('button-sub').removeAttribute('disabled');
		});
}
function sform()
{
	var cat=document.getElementById('category').value;
	var scat=document.getElementById('scat').value;
	$.post('ratrest/mainform.php',{cat:cat, scat:scat},function(data,success)		
	{
		document.getElementById('button-sub').innerHTML='Requesting event form...';
		document.getElementById('dataframe').innerHTML=data;
		});
}
function frameload(li)
{
	document.getElementById('dataframe').innerHTML='<iframe src="'+li+'" name="dataframe" height="100%" frameborder="0" class="frame" id="dataframe"></iframe>';
}
function getform()
{
	var cat=document.getElementById('category').value;
	var scat=document.getElementById('scat').value;
	frameload('ratrest/mainformm.php?cat='+cat+'&scat='+scat);
	}

function deleteevent(id)
{
var t=confirm("Are you sure, you want to delete ?\nDeletion will be permanent and non-recoverable.");
	if(t==true)
	{
		$.get('ratrest/delete-event.php?id='+id,function(data,success)
		{
			if(data==1)
			{
				//document.getElementById(id+'events').style.display='none';
				fade(id+'events',90);
			}
		});
	}
}
function deletemessage(id)
{
var t=confirm("Are you sure, you want to delete this message ?\n.");
	if(t==true)
	{
		$.get('ratrest/delete-message.php?id='+id,function(data,success)
		{
			if(data==1)
			{
				//document.getElementById(id+'events').style.display='none';
				fade(id+'events',90);
			}
		});
	}
}
//Function to fade stuff
function fade(id,s,m)
{
	/**/
	if(m!=1)
	{
	var op=1;
	var timer=window.setInterval(function ()
	{
		if(op<=0)
		{
			document.getElementById(id).style.display='none';
return;
window.clearInterval('timer');

		}
		else
		{
document.getElementById(id).style.opacity=op;
op=op-0.1;

		}
	},s);
	}
	else
	{
			var op=0;
	var timer=window.setInterval(function ()
	{
		if(op==1)
		{
return;
window.clearInterval('timer');

		}
		else
		{
document.getElementById(id).style.display='block';		
document.getElementById(id).style.opacity=op;
op=op+0.1;

		}
	},s);
	}
}
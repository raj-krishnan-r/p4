function baknfro(i,s,c,t)
{
	if(i=='h')
	{
		alert('Parameters Are : [id of element,speed,colorcode,type of element(box,text)]');
	}
	var op=1;
	var inc=1;
	if(s==null)
	var s=10;
	if(c==null)
	var c='#990000';
	var token=0;
	var timer=window.setInterval(function ()
	{
		if(token==0)
		{
			if(t=='b')
			document.getElementById(i).style.boxShadow='0px 1px '+inc+'px '+c+'';
			if(t=='t')
			document.getElementById(i).style.textShadow='0px 0px '+inc+'px '+c+'';

			inc++;
			if(inc==80){
				token=1;
				}
		}
		if(token==1)
		{
			if(t=='b')
			document.getElementById(i).style.boxShadow='0px 1px '+inc+'px '+c+'';
			if(t=='t')
			document.getElementById(i).style.textShadow='0px 0px '+inc+'px '+c+'';
			inc--;
			if(inc==2){
				token=0;
				}
		}
		
	},s);
}
function fade(id,s,m)
{
	if(id=='h')
	{
		alert('Parameters Are : [id of element,speed,mode(fadout=0,fadein=1)]');
	}	if(m!=1)
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
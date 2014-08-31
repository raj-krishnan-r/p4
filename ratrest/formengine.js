function country()
{
	$.get('country.php',function(data,success)
	{
		document.getElementById('countries').innerHTML=data;
		});
}
function s()
{
var d=document.getElementById('country').value;
document.getElementById('state').placeholder='Populating list...';
		$.get('state.php?id='+d,function(data,success)
	{
		document.getElementById('state').placeholder='';
		document.getElementById('states').innerHTML=data;
		document.getElementById('state').removeAttribute('disabled');
		});

}
function d()
{
	var d=document.getElementById('state').value;
	document.getElementById('district').placeholder='Populating list...';

		$.get('districts.php?id='+d,function(data,success)
	{
		document.getElementById('district').placeholder='';
		document.getElementById('districts').innerHTML=data;
		document.getElementById('district').removeAttribute('disabled');

		
		});
}
function datecheck()
{
document.getElementById('tdate').value=document.getElementById('fdate').value;
}
function ohno()
{}
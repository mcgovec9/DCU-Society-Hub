function getTimes()
{
	var times = new Array("All Day","Not Available","9:00-10:00","10:00-11:00","11:00-12:00","12:00-13:00","13:00-14:00","14:00-15:00","15:00-16:00","16:00-17:00");
	for(i=0; i<times.length; i++) 
	{  
		document.write('<option value="' + times[i] +'">' + times[i] + '</option>');
	}
}

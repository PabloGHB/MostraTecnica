function toggle_visibility(el, elb) {
	var display = document.getElementById(el).style.display;
	if(display == "none")
        document.getElementById(el).style.display = 'block';
    else
        document.getElementById(el).style.display = 'none';
	
	var displayb = document.getElementById(elb).style.display;
    if(displayb == "block")
        document.getElementById(elb).style.display = 'none';
}

function getRandomInt(min, max)
	{
  		return Math.floor(Math.random() * (max - min + 1)) + min;
	}
function func(e){
	if(e.type==="mouseout"){
		color = getRandomInt(100000, 999999);
		console.log(color);
       	e.target.style.backgroundColor = `#${color}`;
	}
}

function editConfirm(title) {
	console.log(title);
	alert(`You edited ${title}`);
}

var f = document.getElementById('header_title');
f.addEventListener('mouseout', func);
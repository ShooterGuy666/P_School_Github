

function getVragenJSON() {
  console.log("functie getVragenJSON werd aangeroepen.");
  // Start het laden van de JSON data voor de vragen 
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    var myObj = JSON.parse(this.responseText);
    document.getElementById("container").innerHTML = myObj.name;
  }
};
xmlhttp.open("GET", "js/vragen.json", true);
xmlhttp.send(); 
}


function formulier_opbouwen(data) {
  var container = document.getElementById('container');
  var form = document.createElement('form');
  var index, stelling, antwoorden, afbeelding, code; 
  var i, a, div, ul, li, h2, tnode, label, input;   

  form.setAttribute('action', '');
  form.setAttribute('method', 'post');
  form.setAttribute('name', 'quiz');

  for(i=0; i<data.vragen.length; i++) {
    index      = data.vragen[i].index;
    stelling   = data.vragen[i].stelling;
    antwoorden = data.vragen[i].antwoorden;
    afbeelding = data.vragen[i].afbeelding;
    code       = data.vragen[i].code;

    div   = document.createElement('div');   ////div.setAttribute('id', 'q1');
    ul    = document.createElement('ul');
    h2    = document.createElement('h2');
    tnode = document.createTextNode(index + ")  " + stelling);
    
    h2.style = 'white-space: pre;';
    h2.appendChild(tnode);
    div.appendChild(h2);
    div.className = 'stelling';

    for(a=0; a<antwoorden.length; a++) {
      li    = document.createElement('li');
      label = document.createElement('label');
      label.setAttribute('for', 'c1');
      label.style = 'white-space: pre;';
      input = document.createElement('input');
      input.setAttribute('type', 'radio');
      input.setAttribute('name', 'q'+(i+1));
      input.setAttribute('value', 'a'+(a+1));
      input.setAttribute('id', 'a'+(a+1));
      label.appendChild(document.createTextNode('abcdefghijklmnopqrstuvwxyz'.charAt(a) + '.  '));
      label.appendChild(input);
      label.appendChild(document.createTextNode(antwoorden[a]));
      li.appendChild(label);
      ul.appendChild(li);
    }

    div.appendChild(ul);  
    form.appendChild(div);  
  }

  var btnSend = document.createElement('button');
  btnSend.setAttribute('type', 'submit');
  btnSend.setAttribute('id', 'submit');
  btnSend.innerHTML = "Versturen";
  btnSend.addEventListener('click', versturen);
  form.appendChild(btnSend);

  var btnReset = document.createElement('button');
  btnReset.setAttribute('type', 'submit');
  btnReset.setAttribute('id', 'reset');
  btnReset.innerHTML = "Reset";
  btnReset.addEventListener('click', reset);
  form.appendChild(btnReset);

  container.insertBefore(form, container.childNodes[0]);
}


window.addEventListener('load', function() {
	console.log("window event 'load' werd afgevuurd.");

});


function versturen() {
  console.log("Het formulier wordt verstuurd.");   
}

function reset() {
  alert('reset');
}
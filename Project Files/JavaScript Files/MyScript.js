function check() {
  d=document;
  myArray = [];
  for (h=0;h<7;h++) {
    myArray[h] = d.getElementById('pl'+(h+1)).value;
  }
  for (a=0;a<7;a++) {
    for (b=1;b<8;b++) {
    d.getElementById('pl'+(a+1)).options[b].style.display = "block";
      for (c=0;c<7;c++) {
        if(d.getElementById('pl'+(a+1)).options[b].value == myArray[c]) {
          d.getElementById('pl'+(a+1)).options[b].style.display = "none";
        }
      }
    }
  }
}
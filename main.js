var album = [];
for (i = 0; i < 4; i++) {
  album[i] = new Image();
  album[i].src = "view/img/anh" + i + ".jpg";
}
var interval = setInterval(slideshow, 2000);
var index = 0;
function slideshow() {
  index++;
  if (index > 4) {
    index = 0;
  }
  document.getElementById("banner").src = album[index].src;
}
function next() {
  index++;
  if (index > 4) {
    index = 0;
  }
  document.getElementById("banner").src = album[index].src;
}
function pre() {
  index--;
  if (index < 0) {
    index = 4;
  }
  document.getElementById("banner").src = album[index].src;
}

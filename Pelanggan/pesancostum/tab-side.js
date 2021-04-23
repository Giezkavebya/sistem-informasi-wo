function openCity1(evt, cityName1) {
  var i, tabcontentside, tablinks;
  tabcontentside = document.getElementsByClassName("tabcontentside");
  for (i = 0; i < tabcontentside.length; i++) {
    tabcontentside[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName1).style.display = "block";
  evt.currentTarget.className += " active";
}
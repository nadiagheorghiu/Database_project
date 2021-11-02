@extends('menue/menue')

<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; menu</span>

<script>
  function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
  }

  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
  }
</script>
</br>
</br>
<div class="tab">
  <button class="tablinks" onclick="openCity(event, '1')">4</button>
  <button class="tablinks" onclick="openCity(event, '2')">5</button>
  <button class="tablinks" onclick="openCity(event, '3')">6</button>
  <button class="tablinks" onclick="openCity(event, '4')">7</button>
  <button class="tablinks" onclick="openCity(event, '5')">8</button>
  <button class="tablinks" onclick="openCity(event, '6')">9</button>
  <button class="tablinks" onclick="openCity(event, '7')">10</button>
</div>
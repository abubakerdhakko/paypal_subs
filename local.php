<html>
<script>
  if (typeof(Storage) === "undefined") {
    alert('Your browser is outdated!');
  }

  function myfunction1() {
    if (localStorage.getItem('permission') != "") {
      localStorage.setItem('permission', 'pressed');
    }
  }

  function myfunction2() {
    document.getElementById('data').innerHTML = localStorage.getItem('permission');
  }
</script>

<body onload="myfunction2()">
  <p id="data">this paragraph shows storage data</p>
  <button onclick="myfunction1()">press</button>
</body>

</html>
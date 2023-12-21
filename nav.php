<nav class="navbar" style="
    box-shadow: 0 1px 1px rgba(0,0,0,0.12), 
    0 2px 2px rgba(0,0,0,0.12), 
    0 4px 4px rgba(0,0,0,0.12), 
    0 8px 8px rgba(0,0,0,0.12),
    0 16px 16px rgba(0,0,0,0.12);
    position: sticky;
    top: 8px;
    background-color: #7FFFD4;
    border-radius: 12px;
    z-index: 10002;
    border-color: #000;
    border-top-width: 10px;
    border-style: solid;
    margin-left: 5px;
    margin-right: 5px;">


<a class="navbar-brand" href="home.php">SawSporty</a>


  <div class="center">
  <form autocomplete="off" method="post" action="">
    <input autocomplete="false" name="hidden" type="text" style="display:none;">
    <input id="search" class="form-control" autocomplete="off" type="search" placeholder="Cerca un evento" aria-label="Search" style="border-color: black ; border-width: 4px; border-top-width: 8px; background-color: whitesmoke; border-radius: 12px">
    </form>
    <span class="material-symbols-outlined" action="search.php">search</span>
  </div>

  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Ciao, <?php echo $_SESSION['name'];?></a>
  <ul class="dropdown-menu dropdown-menu-end">
    
    <li><a class="dropdown-item" href="show_profile.php">Profilo</a></li>
    <script>
      var admin = <?php echo $_SESSION['admin'];?>;
      if(admin == 1){
        document.write('<li><a class="dropdown-item" href="admin.php">Admin</a></li>');
        document.write('<li><a class="dropdown-item" href="Amm_Eventi.php">Eventi</a></li>');
        document.write('<li><a class="dropdown-item" href="Amm_Utenti.php">Utenti</a></li>');
      }
    </script>
    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
  </ul>



</nav>


<script>
  var search = document.getElementById("search");
  search.addEventListener("keyup", function(event) {
    if (event.keyCode === 13) {
      event.preventDefault();
      window.location.href = "search.php?search=" + search.value;
    }
  });
</script>
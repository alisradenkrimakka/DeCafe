<nav class="navbar navbar-expand navbar-dark bg-primary sticky-top">
  <div class="container-lg">
    <a class="navbar-brand" href="home"><i class="bi bi-cup-hot"></i> DeCafe</a>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
      <ul class="navbar-nav">
      
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php
              echo $hasil['username'];
            ?>
          </a>
          <ul class="dropdown-menu dropdown-menu-end mt-2">
            <li><a class="dropdown-item" href="logout"><i class="bi bi-box-arrow-left"></i> Log Out</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>



   
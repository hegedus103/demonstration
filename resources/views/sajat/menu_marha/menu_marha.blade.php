<div class="bal-menu-keret">
<div class="menu-marha">
<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <!--div class="navbar-header">
      <button type="button" class="btn btn-default" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
         <a class="navbar-cim" href="#">Lehetőségek</a>   
      </button>
     
    </div-->

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav ">

       @include('sajat.menu_marha.menu_marha_menu_item', array('items' => $mainNav->roots()))
      </ul>
    </div>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div>
<div id="app">
<sidebarmenu></sidebarmenu>
</div>
</div>
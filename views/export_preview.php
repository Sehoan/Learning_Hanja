<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Hanja Learner | Search</title>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Ryu Patterson & Sehoan Choi">
    <meta name="description" content="Learn Hanja easily">
    <meta name="keywords" content="Learning">
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous">
        <link rel="stylesheet" href="<?=$this->base_url?>/styles/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <script src="https://use.fontawesome.com/0604459c37.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    </head>
  <body>
    <!--Top Navigation / Header bar-->
    <header id="result-header">
      <div id="header-logo">
        <i class="fa fa-user-circle fa-2x"></i>
        <p><?=$_SESSION["username"]?></p>
        <!--Hidden menu pop up-->
        <div id="menus">
          <ul>
            <li><a>Account</a></li>
            <li><a href="<?=$this->base_url?>/account/wordbook">My Wordbook</a></li>
            <li><a href="<?=$this->base_url?>/account/recent_search">Recent Search</a></li>
            <li><a href="<?=$this->base_url?>/account/logout">Log Out</a></li>
          </ul>
        </div>
      </div>
      <!--Extra elements in header-->
      <div>
        <p id="subheading">EN に한자じてん</p>
        <h1 id="heading" class="text-center">
          <a href="<?=$this->base_url?>">
            英日韓 漢字 辞典
          </a>
        </h1>
      </div>
      <div id="search-bar">
      <form action="<?=$this->base_url?>/search/search_result/" method="post">
            <i class="fa fa-search fa-lg"></i>
            <input type="text" name="keyword" placeholder="Search...">
        </form>
      </div>
      <p>
      <span class="active-lang">EN</span> |
      <span>JP</span> |
      <span>KR</span>
      </p>
    </header>
    <!--Main Content-->
    <section class="px-5">
      <div class="row w-100">
        <p class="col-8 text-start fs-3" style="border-left: solid 5px var(--sub-theme);">JSON Preview</p>
        <p class="col-2 text-end fs-3">
          <a href="<?=$this->base_url?>/account/wordbook?command=export" style="color: var(--optional-theme)">
            Export to JSON ➜
          </a>
        </p>
      </div>
      <div>
      preview goes here
      </div>
    </section>
    <!--Footer-->
    <footer>
      <div>
        <small>© 2021 Mike Choi & Ryu Patterson | KR Data from
          http://www.happycgi.com/13322#1 | JP Data from
          http://www.edrdg.org/enamdict/enamdict_doc.html</small>
      </div>
    </footer>
    <script>
    </script>
  </body>
</html>

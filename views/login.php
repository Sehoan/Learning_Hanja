<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Hanja Learner</title>
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
  </head>
  <body>
  <!--Top Navigation / Header bar-->
    <header>
      <div id="header-logo">
        <i class="fa fa-user-circle fa-2x"></i>
      </div>
      <p>
        <span class="active-lang">EN</span> |
        <span>JP</span> |
        <span>KR</span>
      </p>
    </header>
    <!--Main Content-->
    <section>
      <p id="subheading">EN に한자じてん</p>
      <h1><a href="<?=$this->base_url?>">英日韓 漢字 辞典</a></h1>

      <form id="login_form" name='login' action="<?=$this->base_url?>/account/login/" onsubmit="return validate();" method="post">
        <div>
          <label for="username">Username</label>
          <input type="text" id="username" name="username"/>
        </div>
        <div>
          <label for="password">Password</label>
          <input type="password" id="password" name="password"/>
        </div>
        <div>
          <button type="submit">Log in / Create Account</button>
        </div>
      </form>
      <p style="color: red;"><?= $error_msg ?></p>
      <p id="welcome-msg">Search for any specific Chinese character or derived vocabulary!</p>
    </section>
    <!--Footer-->
    <footer>
      <div>
        <small>
          © 2021 Mike Choi & Ryu Patterson | KR Data from
          http://www.happycgi.com/13322#1 | JP Data from
          http://www.edrdg.org/enamdict/enamdict_doc.html
        </small>
      </div>
    </footer>
    <script>
      function validate(){ //validates login form username
        let user = document.forms['login']['username'].value;
        var reg = new RegExp("[ -~]"); // checks all ASCii characters
        if(!reg.test(user)){
          alert("Please don't use unicode characters!!"); //non ascii characters are not allowed
          return false;
        } else{
          return true;
        }
      }
    </script>
  </body>
</html>

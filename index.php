<?php
  /* ATTRIBUTION NOTICE
    Copyright 2021 (C) CRG Media Group.

    The following code is licensed under the GNU General Public License v3.0.
    You MUST attribute to CRG Media Group and the original source code, hosted on GitHub at the time of writing.
    Any modifications MUST be open source as well.

    You are allowed to use the following code for commercial use, but you must follow the GNU General Public License v3.0.
  END ATTRIBUTION NOTICE */
?>
<style>
  * {
    font-family: 'Arial', 'Helvetica', 'sans-serif';
  }
  input {
    width: 300px;
  }
  button {
    width: 300px;
  }
  .helped {
    width: 275px;
  }
  .help {
    width: 25px;
  }
</style>
<h1>OpenBake Demo Page</h1>
<p>OpenBake is a lightweight, simple system designed for "baking" builds for your SaaS. It is written entirely in PHP and is made to work with PHP applications.</p>

<div style="color:red;">
  <form action="bake.php" method="post">
    <input type="text" name="src" placeholder="Source Directory URL (e. g. 'demosaas/')"><br>
    <input type="text" name="zipdst" placeholder="Destination for Bake Zip (e. g. 'bakedzips/')"><br>
    <input type="text" name="target" placeholder="Target file in Source Directory (e. g. '/config.php')"><br><br>

    <input class="helped" type="text" name="find" placeholder="String to find in target"><button onclick="alert('You might want to automate this in the bake.php file, to generate a random unique product key for example and check it against a database to protect against dupes. This same database could be used by an OpenVerify setup. If you were find/replacing a config file, could replace a line in an ini or a value in a PHP array returner.')" class="help">?</button><br>
    <input class="helped" type="text" name="replace" placeholder="String to replace in target"><button onclick="alert('You might want to automate this in the bake.php file, to generate a random unique product key for example and check it against a database to protect against dupes. This same database could be used by an OpenVerify setup. If you were find/replacing a config file, could replace a line in an ini or a value in a PHP array returner.')" class="help">?</button><br><br>
    <input type="submit" name="bake-submit" value="Bake!">
  </form>

  <?php
    if (isset($_GET['path']))
    {
      echo ('<button onclick="window.location.href=\''.$_GET['path'].'\'">Download!</button>');
    }
  ?>
</div>
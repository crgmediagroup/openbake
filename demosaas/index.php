<?php
  /* ATTRIBUTION NOTICE
    Copyright 2021 (C) CRG Media Group.

    The following code is licensed under the GNU General Public License v3.0.
    You MUST attribute to CRG Media Group and the original source code, hosted on GitHub at the time of writing.
    Any modifications MUST be open source as well.

    You are allowed to use the following code for commercial use, but you must follow the GNU General Public License v3.0.
  END ATTRIBUTION NOTICE */
  
  $config = include('config.php');
?>
<style>
  * {
    font-family: 'Arial', 'Helvetica', 'sans-serif';
  }
</style>
<h1>SaaS Demo Page</h1>
<p>This page and the directory it is hosted in are, collectively, a demonstration SaaS used for testing of OpenBake, a project developed by CRG Media Group</p>

<div style="color:red;">
  <h2>This installation has been baked with code <?=$config['code']?></h2>
  <h1 style="font-weight:bold;">
    
  </h1>
</div>
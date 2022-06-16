<!-- HEADER START -->
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>/paper.ico">
   <link rel="stylesheet" href="<?= base_url(); ?>/assets/styles/pkp/common.css" type="text/css" />
   <link rel="stylesheet" href="<?= base_url(); ?>/assets/styles/common.css" type="text/css" />
   <link rel="stylesheet" href="<?= base_url(); ?>/assets/styles/compiled.css" type="text/css" />
   <link rel="stylesheet" href="<?= base_url(); ?>/assets/styles/sidebar.css" type="text/css" />
   <link rel="stylesheet" href="<?= base_url(); ?>/assets/styles/rightSidebar.css" type="text/css" />
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
   <!-- Title berganti sesuai dengan judul halaman -->

   <?php if (isset($page["title"])) : ?>
      <title><?= $page["title"]; ?></title>
   <?php else : ?>
      <title>Teknologi Informasi ITS</title>
   <?php endif; ?>
</head>

<body>
   <div id="container">
      <div id="header">
         <div id="headerTitle">
            <!-- Header Title berganti sesuai dengan judul halaman -->
            <h1>Teknologi Informasi ITS</h1>
         </div>
      </div>
      <!-- HEADER END -->

      <!-- SIDEBAR START -->
      <div id="body">
         <div id="sidebar">
            <div id="rightSidebar">
               <div class="block" id="sidebarDevelopedBy">
                  <a class="blockTitle" href="http://pkp.sfu.ca/ojs/" id="developedBy">Open Journal Systems</a>
               </div>
               <!-- <div class="block" id="sidebarHelp">
                  <a class="blockTitle" href="">Journal Help</a>
               </div> -->

               <!-- SidebarUser berganti ketika user sudah login -->
               <form action="<?= base_url(); ?>/User/login" method="post">
                  <?= csrf_field(); ?>

                  <?php if (!empty(session()->get('username'))) : ?>
                     <p>You are logged in as... <strong><?= session()->get('username'); ?></strong></p>

                     <ul class="list_style_side">
                        <li>
                           <a href="<?= base_url('/' . session()->get('role')); ?>"><?= (session()->get('role') == 'admin') ? 'Dashboard' : 'My Journals'; ?></a>
                        </li>
                        <li>
                           <a href="<?= base_url('/user/profile'); ?>">My Profile</a>
                        </li>
                        <li>
                           <a href="<?= base_url(); ?>/User/logout">Log Out</a>
                        </li>
                     </ul>
                  <?php else : ?>
                     <table width="100%">
                        <tr>
                           <td width="17%"><label for="username" class="label">Username</label></td>
                           <td><input type="text" class="search_box" name="username" id="username" autofocus></td>
                        </tr>
                        <tr>
                           <td><label for="password" class="label">Password</label></td>
                           <td><input type="password" class="search_box" name="password" id="password"></td>
                        </tr>
                     </table>
                     <h5>Don't have an account yet? <a href="<?= base_url(); ?>/Register">Click here</a></h5>
                     <input type="checkbox" id="remember" name="remember" value="Remember me"> Remember me <br>
                     <button type="submit">Login</button>
                  <?php endif; ?>
               </form>
               <!-- <div class="block" id="notification">
                     <span class="blockTitle">Notifications</span>
                     <ul>
                        <li><a href="<?= base_url(); ?>/notification">View</a></li>
                        <li><a href="<?= base_url(); ?>/notification/subscribeMailList">Subscribe</a></li>
                     </ul>
                  </div>
                  <div class="block" id="sidebarNavigation">
                     <span class="blockTitle">Journal Content</span>
                     <span class="blockSubtitle">Search</span>
                     <form id="simpleSearchForm" method="post" action="<?= base_url(); ?>/search/search">
                        <table id="simpleSearchInput">
                           <tr>
                              <td>
                                 <input type="text" id="simpleQuery" name="simpleQuery" size="15" maxlength="255" value="" class="textField" />
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <select id="searchField" name="searchField" size="1" class="selectMenu">
                                    <option label="All" value="query">All</option>
                                    <option label="Authors" value="authors">Authors</option>
                                    <option label="Title" value="title">Title</option>
                                    <option label="Abstract" value="abstract">Abstract</option>
                                    <option label="Index terms" value="indexTerms">Index terms</option>
                                    <option label="Full Text" value="galleyFullText">Full Text</option>
                                 </select>
                              </td>
                           </tr>
                           <tr>
                              <td><input type="submit" value="Search" class="button" /></td>
                           </tr>
                        </table>
                     </form>
                     <br />
                     <span class="blockSubtitle">Browse</span>
                     <ul>
                        <li><a href="<?= base_url(); ?>/issue/archive">By Issue</a></li>
                        <li><a href="<?= base_url(); ?>/search/authors">By Author</a></li>
                        <li><a href="<?= base_url(); ?>/search/titles">By Title</a></li>
                        <li><a href="<?= base_url(); ?>/">Other Journals</a></li>
                     </ul>
                  </div>
                  <div class="block" id="sidebarFontSize" style="margin-bottom: 4px;">
                     <span class="blockTitle">Font Size</span>
                     <div id="sizer"></div>
                  </div>
                  <br />
                  <div class="block" id="sidebarInformation">
                     <span class="blockTitle">Information</span>
                     <ul>
                        <li><a href="<?= base_url(); ?>/information/readers">For Readers</a></li>
                        <li><a href="<?= base_url(); ?>/information/authors">For Authors</a></li>
                        <li><a href="<?= base_url(); ?>/information/librarians">For Librarians</a></li>
                     </ul>
                  </div> -->
            </div>
         </div>
         <!-- SIDEBAR END -->

         <!-- LINKS START -->
         <div id="main">
            <div id="navbar">
               <!-- Menu akan berubah ketika user dalam keadaan login -->
               <?php if (session()->get('isLoggedIn') == true) : ?>
                  <ul class="menu">
                     <li id="home"><a href="<?= base_url(); ?>/">Home</a></li>
                     <!-- <li id="about"><a href="<?= base_url(); ?>/about">About</a></li> -->
                     <li id="userHome"><a href="<?= base_url(); ?>/user">User Home</a></li>
                     <!-- <li id="search"><a href="<?= base_url(); ?>/search">Search</a></li> -->
                     <!-- <li id="current"><a href="<?= base_url(); ?>/issue/current">Current</a></li> -->
                     <li id="archives"><a href="<?= base_url(); ?>/issue/archive">Archives</a></li>
                  </ul>
               <?php else : ?>
                  <ul class="menu">
                     <li id="home"><a href="<?= base_url(); ?>/">Home</a></li>
                     <!-- <li id="about"><a href="<?= base_url(); ?>/about">About</a></li> -->
                     <!-- <li id="login"><a href="<?= base_url(); ?>/login">Login</a></li> -->
                     <!-- <li id="search"><a href="<?= base_url(); ?>/search">Search</a></li> -->
                     <!-- <li id="current"><a href="<?= base_url(); ?>/issue/current">Current</a></li> -->
                     <li id="archives"><a href="<?= base_url(); ?>/issue/archive">Archives</a></li>
                  </ul>
               <?php endif; ?>
            </div>

            <!-- LINKS END -->

            <!-- CONTENT START -->
            <?= $this->renderSection('content'); ?>
            <!-- CONTENT END -->

            <!-- FOOTER START -->
         </div>
      </div>
   </div>
</body>

</html>
<!-- FOOTER END -->
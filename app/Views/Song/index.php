<?php include 'include/top.php';?>
<body>
    <?php include 'include/modal1.php '?>
    <?php include 'include/modal2.php '?>
    <?php include 'include/AddModal.php '?>

    <form action="/" method="get">
    <input type="search" name="search" placeholder="search song">
    <button type="submit" class="btn btn-primary">search</button>
  </form>
    <h1>Music Player</h1>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  My Playlist
</button>

    <audio id="audio" controls autoplay></audio>
    <ul id="playlist">

        <li data-src="/your music src">music name
        </li>

    </ul>
</body>

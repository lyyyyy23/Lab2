<?php include 'include/top.php';?>
<body>
    <?php include 'include/modal_1.php';?>
    <?php include 'include/modal_2.php';?>
    <?php include 'include/AddModal.php';?>

    <form action="/searchSong" method="get">
    <input type="search" name="search" placeholder="search song">
    <button type="submit" class="btn btn-primary">search</button>
  </form>
    <h1>Music Player</h1>
    <a class= "btn btn-primary" href="/">All Song</a>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    My Playlist 
    </button>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddModal">
    Add New Song
    </button>
    

    <audio id="audio" controls autoplay></audio>
    <ul id="playlist">

    <?php foreach($songs as $song) :?>
        <li data-src="<?=base_url('/uploads/songs/'.$song['songFile']);?>">
            <?=$song['songName'];?>
            <button type="button" class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#myModal"
                onclick="setMusicID('<?=$song['ID'];?>')">
                +
                </button>
        </li>
    <?php endforeach;?>
    </ul>
    <?php include 'include/bottom.php '?>
</body>

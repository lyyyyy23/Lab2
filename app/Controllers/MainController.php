<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PlaylistModel;
use App\Models\PlaylistTrackModel;
use App\Models\SongModel;

class MainController extends BaseController
{
    private $playlist;
    private $playlistTrack;
    private $song;

    function __construct()
    {
        $this->playlist = new PlaylistModel();
        $this->playlistTrack = new PlaylistTrackModel();
        $this->song = new SongModel();
    }

    public function index(){
        $data = [
            'playlists' => $this->playlist->findAll(),
            'songs' => $this->song->findAll()
        ];
        return view('Song\index', $data);
    }
    public function saveSong(){
        $file = $this->request->getFile('songFile');
        var_dump($file);

        $newFileName = $file->getRandomName();
        $data = [
            'songName' => $file->getName(),
            'songFile' => $newFileName
        ];
        $rule=[
            'songFile' => [
                'uploaded[songFile]',
                'mime_in[songFile,audio/mpeg]',
                'max_size[songFile,10240]',
                'ext_in[songFile,mp3]'
            ]
        ];

        if($this->validate($rule)){
            if($file->isValid()&&!$file->hasMoved()){
                if($file->move(FCPATH. 'uploads/song/', $newFileName)){
                    echo "uploaded successfully";
                    $this->song->save($data);
                }else{
                    echo $file->getErrorString().' ' .$file->getError();
                }
            }else{
                $data['validation'] = $this->validator;
            }
            
        }return redirect()->to('/');
    }

    public function searchSong(){
        
        $searchLike = $this->request->getVar('search');

        if(!empty($searchLike)){
            
            $data = [
                'playlists' => $this->playlist->findAll(),
                'songs' => $this->song->like('songName', $searchLike)->findAll()
            ];
            return view('Song\index', $data);
            
        }else{
            return redirect()->to('/');
        }
    }

    public function createPlaylist(){
        $data=[
            'playlistName' => $this->request->getVar('playlistName'),
        ];
        $this->playlist->save($data);
        return redirect()->to('/');

    }
    public function savePlaylist(){
        $data = [
            'song_ID' => $this->request->getVar('SongID'),
            'playlist_ID' => $this->request->getVar('playlistID'),
        ];
      
        $this->playlistTrack->save($data);
        return redirect()->to('/');
    }

    public function playlists($id = null){
        $db = \Config\Database::connect();
        $builder = $db->table('songs');

        $builder->select(['songs.ID', 'songs.songName', 'songs.songFile', 'playlist.playlistName','playlist.playlist_ID']);
        $builder->join('playlist_track', 'songs.ID = playlist_track.song_ID');
        $builder->join('playlist', 'playlist_track.playlist_ID = playlist.playlist_ID');

        if ($id !== null) {
            $builder->where('playlist.playlist_ID', $id);
        }

        $query = $builder->get();

        $data = [
            'playlists' => $this->playlist->findAll(),
            'songs' => $this->song->findAll()
        ];

        if ($query) {
            $data['songs'] = $query->getResultArray();
        } else {
            echo "Query failed";
        }
        
        return view('Song\index', $data);
    }
    


}


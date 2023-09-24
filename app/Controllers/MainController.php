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
            'playlist' => $this->playlist->findAll(),
            'playlistTrack' => $this->playlistTrack->findAll(),
            'song' => $this->song->findAll()
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
                'mime_in [songFile,audio/mpeg]',
                'max_size[songFile,10240]',
                'ext_in [songFile,mp3]'
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
                'playlist' => $this->playlist->findAll(),
                'song' => $this->songs->like('songName', $searchLike)->findAll()
            ];
            return view('Song\index', $data);
            
        }else{
            return redirect()->to('/');
        }
    }
}


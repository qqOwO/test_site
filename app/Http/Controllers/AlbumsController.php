<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AlbumsRequest;
use App\Models\Albums;
use Illuminate\Support\Facades\Auth;

class AlbumsController extends Controller{
    
    public function _curl($url) 
    {   

        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);

        if(strtolower(parse_url($url, PHP_URL_SCHEME)) == 'https'){
            curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,1);
            curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,1);
        }

        curl_setopt($ch, CURLOPT_URL, $url); 
        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }

    public function lfm_img($artist, $album)
    {
        $artist = str_replace(" ", "+", $artist);
        $album = str_replace(" ", "+", $album);
        $url = "http://ws.audioscrobbler.com/2.0/?method=album.getinfo&api_key=93882d600694ccbf10ea667b1acdf610&artist=$artist&album=$album&format=json";               
        $json = AlbumsController::_curl($url);
        $data = str_ireplace("#text", "text", $json);
        $list = json_decode($data);
        if($list->album->image[2])
            $img = $list->album->image[2]->text;
        
        return $img;
    }

    public function submit(AlbumsRequest $req)
    {
        $album = new Albums();
        $album->title = $req->input('title');
        $album->name = $req->input('name');
        $album->description = $req->input('description');
        $artist = $req->input('name');
        $albumName = $req->input('title');
        $image = AlbumsController::lfm_img($artist, $albumName);
        $album->image = $image;
        $album->save();
        return redirect(route('home'))->with('success', 'Альбом был успешно создан!');

    }

    public function allData()
    {
        $album = new Albums;
        return view('albums', ['album' => $album->all()]);
    }

    public function oneAlbum($id)
    {
        if(!Auth::check()){
            return redirect(route('user.login'));
        }
        $album = new Albums;
        return view('updatealbum', ['album' => $album->find($id)]);
    }

    public function update(AlbumsRequest $req, $id)
    {
        $album = Albums::find($id);
        $album->title = $req->input('title');
        $album->name = $req->input('name');
        $album->description = $req->input('description');
        $artist = $req->input('name');
        $albumName = $req->input('title');
        $image = AlbumsController::lfm_img($artist, $albumName);
        $album->image = $image;
        $album->update();
        return redirect(route('home'))->with('success', 'Альбом был успешно изменён!');

    }

    public function delete($id)
    {
        if(!Auth::check()){
            return redirect(route('user.login'));
        }
		Albums::find($id)->delete();
		return redirect()->route('home')->with('success', 'Пост был успешно удалён');
	}
}

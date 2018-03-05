<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Transmission\Transmission;
use App\Http\Resources\TorrentResourceCollection;
use App\Http\Resources\TorrentResource;

class TorrentController extends Controller
{
    private $transmission;

    public function __construct(Transmission $transmission) {
        $this->transmission = $transmission;
    }

    public function get() {
        $list = collect($this->transmission->all());
        return new TorrentResourceCollection(TorrentResource::collection($list));
        // var_dump($list);
    }

    public function show(Torrent $torrent) {
        return new TorrentResource($torrent);
    }
}

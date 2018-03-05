<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TorrentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'size' => $this->getSize(),
            'eta' => $this->getEta(),
            'downloaded' => $this->getDownloadedEver(),
            'uploaded' => $this->getUploadedEver()
        ];
    }
}

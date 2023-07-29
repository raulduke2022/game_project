<?php

namespace App\Services\Image;

use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class Service {
    public function delete($image){
        if (Storage::disk('public')->exists($image->path)) {
            Storage::disk('public')->delete($image->path);
        }
        $image->delete();
    }
}

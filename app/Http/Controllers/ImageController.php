<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Support\Facades\Request;

class ImageController extends BaseController
{
    public function destroy(Image $image)
    {
        if (request()->exists('set_main')) {
            $mainImage = $image->game->images->where('is_main', true)->first();
            if ($mainImage) {
                $mainImage->unset();
            }
            $image->setMain();
            session()->flash('success', 'Изображение установлено фоном');
            return redirect()->back();
        }
        $this->service->delete($image);

        session()->flash('success', 'Изображение успешно удалено');
        return redirect()->back();
    }
}

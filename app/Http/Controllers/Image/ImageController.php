<?php

namespace App\Http\Controllers\Image;

use App\Models\Image;

class ImageController extends BaseController
{
    public function destroy(Image $image)
    {
        $this->service->delete($image);

        session()->flash('success', 'Изображение успешно удалено');
        return redirect()->back();
    }
}

<?php

namespace App\Traits;

use Intervention\Image\ImageManagerStatic as Image;

trait ImageUploadTrait
{
  protected $imagePath = 'app/public/images';
  protected $imageHeight = 300;
  protected $imageWidth = 650;

  public function uploadImage($img)
  {

    $imageName = $this->getImageName($img);

    Image::make($img)
      ->resize($this->imageWidth, $this->imageHeight)
      ->save(storage_path($this->imagePath . '/' . $imageName));

    return $imageName;
    
  }

  public function getImageName($img)
  {
    return time() . '-' . $img->getClientOriginalName();
  }
}

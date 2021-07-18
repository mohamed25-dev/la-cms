<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class Slug
{

  public static function uniqueSlug($slug, $table)
  {
    $slug = self::createSlug($slug);

    $items = DB::table($table)
      ->select('slug')
      ->whereRaw("slug like '$slug%'")
      ->get();

    $count = count($items) + 1;

    return $slug . '-' . $count;
  }

  protected static function createSlug($str)
  {
    $string = preg_replace("/[^a-z0-9_\s۰۱۲۳۴۵۶۷۸۹يءاأإآؤئبپتثجچحخدذرزژسشصضطظعغفقکكگگلمنوهی]/u", '', $str);

    $string = preg_replace("/[\s-]+/", ' ', $string);

    $string = preg_replace("/[\s]/", '-', $string);

    return $string;
  }
}

<?php

namespace App\Http\View\Composers;

use App\Models\Category;
use Illuminate\View\View;

class CategoryComposer {
  
  protected $categories;

  public function __construct(Category $categories)
  {
    $this->categories = $categories;
  }


  public function compose(View $view)
    {
        $view->with('categories', $this->categories->all());
    }

}
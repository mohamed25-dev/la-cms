<?php

namespace App\Http\View\Composers;

use App\Models\Page;
use Illuminate\View\View;

class PageComposer
{

  public $page;

  public function __construct(Page $page)
  {
    $this->page = $page;
  }

  public function compose (View $view) 
  {
    $view->with('pages', $this->page->all());
  }
}

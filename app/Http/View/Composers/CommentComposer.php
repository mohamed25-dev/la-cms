<?php

namespace App\Http\View\Composers;

use App\Models\Comment;
use Illuminate\View\View;

class CommentComposer
{

  protected $comments;

  public function __construct(Comment $comments)
  {
    $this->comments = $comments;
  }


  public function compose(View $view)
  {
    $view->with('recentComments', $this->comments->with('post')->take(5)->latest()->get());
  }
}

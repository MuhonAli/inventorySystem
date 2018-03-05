<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\UserRepository;
use DB;
use App\Busbook;
use App\Roombook;

class NotificationComposer
{
    public function compose(view $view)
    {
		  	
		  $busnotify = Busbook::where([
                ['status', '=', '1'],
                ['seen', '=', '0'],
            ])->count();

          $roomnotify = Roombook::where([
                ['status', '=', '1'],
                ['seen', '=', '0'],
            ])->count();

          $total = $busnotify + $roomnotify;
		  
          $view->with('notify',$total);
    }
}
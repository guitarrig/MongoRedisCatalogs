<?php

namespace App\Http\Middleware;

use App\Catalog;
use App\User;
use \Auth;
use App\Wish;

use Closure;

class CatalogProtect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      $user = User::where('id', Auth::id())->first();
      if ($request->route('catalog')) {

        $catalog = Catalog::where('_id', $request->route('catalog'))->first();

      }elseif ($request->route('wish')) {

        $wish = Wish::where('_id', $request->route('wish'))->first();
        $catalog = Catalog::where('_id', $wish->catalog_id)->first();

      }
      
      if ($user->name != $catalog->login) {
        return redirect('/catalogs');
      }





        return $next($request);
    }
}

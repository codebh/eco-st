<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use romanzipp\Seo\Structs\Link;
use romanzipp\Seo\Structs\Meta;
use romanzipp\Seo\Structs\Meta\OpenGraph;
use romanzipp\Seo\Structs\Meta\Twitter;
use romanzipp\Seo\Structs\Script;

class AddSeoDefaults
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        seo()->charset();
        seo()->viewport();

        seo()->title('Tafseel');
        seo()->description('My Description');

        seo()->csrfToken();

        seo()->addMany([

            Meta::make()->name('copyright')->content('tafseel'),

            Meta::make()->name('mobile-web-app-capable')->content('yes'),
            Meta::make()->name('theme-color')->content('#f03a17'),

            Link::make()->rel('shortcut icon')->href(asset('img/s_logo.png')),

            OpenGraph::make()->property('title')->content('Tasfseel'),
            OpenGraph::make()->property('site_name')->content('Tafseel'),
            OpenGraph::make()->property('locale')->content('bh_Bh'),

            // Twitter::make()->name('card')->content('summary_large_image'),
            // Twitter::make()->name('site')->content('@romanzipp'),
            // Twitter::make()->name('creator')->content('@romanzipp'),
            // Twitter::make()->name('image')->content('/assets/images/Banner.jpg', false)

        ]);

        seo('body')->add(
            Script::make()->attr('src', '/js/app.js')
        );

        return $next($request);
    }
}

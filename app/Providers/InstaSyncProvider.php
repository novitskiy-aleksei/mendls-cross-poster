<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use InstagramScraper\Instagram;

class InstaSyncProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->singleton('InstaSync', function () {
            return new self($this->app);
        });
    }

    public function sync()
    {
        $posts = $this->getInstaPosts();

    }

    protected function getInstaPosts()
    {
        $account = env('INSTA_SYNC_ACC');
        $posts = Instagram::getMedias($account);

        return $posts;
    }
}

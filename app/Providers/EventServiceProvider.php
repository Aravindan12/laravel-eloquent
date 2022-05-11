<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\UserEvent;
use App\Listeners\UserMail;
use App\Observers\PostObserver;
use App\Models\Post;
class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     * Registered a model event for user model
     * Registered a observer for post model
     * @return void
     */
    public function boot()
    {
        Event::listen(
            UserEvent::class,
            [UserMail::class, 'handle']
        );

        Post::observe(PostObserver::class);

    }
}

<?php namespace Ooglee\Domain\Providers;

use Ooglee\Domain\Entities\Post\Events\PostWasViewedEvent;
use Ooglee\Application\Entities\Post\Listeners\IncrementPostViewsListener;
use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventBlogServiceProvider extends ServiceProvider {

	/**
	 * The event handler mappings for the application.
	 *
	 * @var array = ['event.name' => ['EventListener',],];
	 *  
	 */
	protected $listen = [
		
		PostWasViewedEvent::class =>  [
							            IncrementPostViewsListener::class,
							          ],
	];

	/**
	 * Register any other events for your application.
	 *
	 * @param  \Illuminate\Contracts\Events\Dispatcher  $events
	 * @return void
	 */
	public function boot(DispatcherContract $events)
	{
		parent::boot($events);

	}

}

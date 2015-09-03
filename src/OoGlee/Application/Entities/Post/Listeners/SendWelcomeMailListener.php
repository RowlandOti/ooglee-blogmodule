<?php namespace Ooglee\Application\Listeners;

use Ooglee\Domain\Contracts\IListener;
use Ooglee\Domain\Contracts\IEvent;

class SendWelcomeMailListener implements IListener {

	/**
	 * SendWelcomeMailListener implementation 
	 * 
	*/

	/**
     * @var Ooglee\Infrastructure\Mailers\IMailer $mailer
    */
    private $mailer

    /**
     * Create a new SendWelcomeEmailListener listener
     *
     * @param Mailer $mailer
     * @return void
    */
    public function __construct(IMailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Handle the Event
     *
     * @param Event $event
     * @return void
     */
	public function listenerHandle(IEvent $event)
    {
       $this->mailer->mailgun->;
    }
}

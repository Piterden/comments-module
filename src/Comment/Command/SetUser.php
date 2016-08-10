<?php namespace Anomaly\CommentsModule\Comment\Command;

use Anomaly\CommentsModule\Comment\Contract\CommentInterface;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class SetUser
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\CommentsModule\Comment\Command
 */
class SetUser implements SelfHandling
{

    /**
     * The comment instance.
     *
     * @var CommentInterface
     */
    protected $entry;

    /**
     * Create a new SetUser instance.
     *
     * @param CommentInterface $entry
     */
    public function __construct(CommentInterface $entry)
    {
        $this->entry = $entry;
    }

    /**
     * Handle the command.
     *
     * @param Guard $auth
     */
    public function handle(Guard $auth)
    {
        /* @var UserInterface $user */
        if ($user = $auth->user()) {
            $this->entry->setAttribute('user', $user);
            $this->entry->setAttribute('email', $user->getEmail());
        }
    }
}

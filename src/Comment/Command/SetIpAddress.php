<?php namespace Anomaly\CommentsModule\Comment\Command;

use Anomaly\CommentsModule\Comment\Contract\CommentInterface;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Http\Request;

/**
 * Class SetIpAddress
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\CommentsModule\Comment\Command
 */
class SetIpAddress implements SelfHandling
{

    /**
     * The comment instance.
     *
     * @var CommentInterface
     */
    protected $entry;

    /**
     * Create a new SetIpAddress instance.
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
     * @param Request $request
     */
    public function handle(Request $request)
    {
        $this->entry->setAttribute('ip_address', $request->ip());
    }
}

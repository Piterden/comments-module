<?php namespace Anomaly\CommentsModule\Comment;

use Anomaly\CommentsModule\Comment\Command\SetIpAddress;
use Anomaly\CommentsModule\Comment\Command\SetUser;
use Anomaly\CommentsModule\Comment\Contract\CommentInterface;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Entry\EntryObserver;

/**
 * Class CommentObserver
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\CommentsModule\Comment
 */
class CommentObserver extends EntryObserver
{

    /**
     * Run before a record is created.
     *
     * @param EntryInterface|CommentInterface $entry
     */
    public function creating(EntryInterface $entry)
    {
        $this->dispatch(new SetUser($entry));
        $this->dispatch(new SetIpAddress($entry));

        parent::creating($entry);
    }
}

<?php namespace Anomaly\CommentsModule\Comment;

use Anomaly\CommentsModule\Comment\Contract\CommentInterface;
use Anomaly\Streams\Platform\Entry\EntryPresenter;

/**
 * Class CommentPresenter
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\CommentsModule\Comment
 */
class CommentPresenter extends EntryPresenter
{

    /**
     * The decorated object.
     *
     * @var CommentInterface
     */
    protected $object;

    /**
     * Return a label.
     *
     * @param        $text
     * @param string $context
     * @param string $size
     * @return string
     */
    public function label($text = null, $context = null, $size = null)
    {
        if (!$text) {
            $text = 'anomaly.module.comments::message.' . ($this->object->isApproved() ? 'approved' : 'pending');
        }

        if (!$context) {
            $context = $this->object->isApproved() ? 'success' : 'default';
        }

        return parent::label($text, $context, $size);
    }


}

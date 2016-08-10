<?php namespace Anomaly\CommentsModule\Comment;

use Anomaly\CommentsModule\Comment\Contract\CommentInterface;
use Anomaly\Streams\Platform\Model\Comments\CommentsCommentsEntryModel;
use Anomaly\UsersModule\User\Contract\UserInterface;

/**
 * Class CommentModel
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\CommentsModule\Comment
 */
class CommentModel extends CommentsCommentsEntryModel implements CommentInterface
{

    /**
     * Get the approved flag.
     *
     * @return bool
     */
    public function isApproved()
    {
        return $this->approved;
    }

    /**
     * Get the name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the related user.
     *
     * @return UserInterface
     */
    public function getUser()
    {
        return $this->user;
    }
}

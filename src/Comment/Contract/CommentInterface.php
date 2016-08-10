<?php namespace Anomaly\CommentsModule\Comment\Contract;

use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Interface CommentInterface
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\CommentsModule\Comment\Contract
 */
interface CommentInterface extends EntryInterface
{

    /**
     * Get the approved flag.
     *
     * @return bool
     */
    public function isApproved();

    /**
     * Get the name.
     *
     * @return string
     */
    public function getName();

    /**
     * Get the email.
     *
     * @return string
     */
    public function getEmail();

    /**
     * Get the related user.
     *
     * @return UserInterface
     */
    public function getUser();

    /**
     * Return the user relation.
     *
     * @return BelongsTo
     */
    public function user();
}

<?php namespace Anomaly\CommentsModule\Comment;

use Anomaly\Streams\Platform\Entry\EntryCriteria;
use Anomaly\Streams\Platform\Model\EloquentModel;
use Anomaly\Streams\Platform\Support\Presenter;

/**
 * Class CommentCriteria
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\CommentsModule\Comment
 */
class CommentCriteria extends EntryCriteria
{


    /**
     * Set the subject restriction.
     *
     * @param $entry
     * @return $this
     */
    public function subject($entry)
    {
        if ($entry instanceof Presenter) {
            $entry = $entry->getObject();
        }

        if ($entry instanceof EloquentModel) {
            $this->query
                ->where('subject_type', get_class($entry))
                ->where('subject_id', $entry->getId());
        }

        return $this;
    }
}

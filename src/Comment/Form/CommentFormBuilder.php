<?php namespace Anomaly\CommentsModule\Comment\Form;

use Anomaly\Streams\Platform\Model\EloquentModel;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class CommentFormBuilder
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\CommentsModule\Comment\Form
 */
class CommentFormBuilder extends FormBuilder
{

    /**
     * The subject commented on.
     *
     * @var null|EloquentModel
     */
    protected $subject = null;

    /**
     * Fields to skip.
     *
     * @var array|string
     */
    protected $skips = [
        'approved',
        'ip_address',
        'email',
        'parent',
        'subject',
        'name',
        'user',
    ];

    /**
     * The form actions.
     *
     * @var array|string
     */
    protected $actions = [
        'submit',
    ];

    /**
     * Fired just before saving.
     */
    public function onSaving()
    {
        if (!$subject = $this->getSubject()) {
            throw new \Exception('$subject is required.');
        }

        $comment = $this->getFormEntry();

        $comment->setAttribute('subject', $subject);
    }

    /**
     * Get the subject.
     *
     * @return EloquentModel|null
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set the subject.
     *
     * @param EloquentModel $subject
     * @return $this
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }
}

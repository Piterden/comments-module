<?php namespace Anomaly\CommentsModule\Comment\Form;

use Anomaly\Streams\Platform\Model\EloquentModel;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
use Illuminate\Contracts\Auth\Guard;

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
     * The form actions.
     *
     * @var array|string
     */
    protected $actions = [
        'submit',
    ];

    /**
     * Fired when ready to build.
     *
     * @param Guard $auth
     */
    public function onReady(Guard $auth)
    {
        $this->setSkips(
            [
                'approved',
                'ip_address',
                'parent',
                'subject',
                'user',
            ]
        );

        if ($auth->check()) {
            $this
                ->skipField('email')
                ->skipField('name');
        }

        if ($auth->guest()) {
            $this->setFields(
                [
                    'name' => [
                        'required' => true,
                    ],
                    'email' => [
                        'required' => true,
                    ],
                    '*',
                ]
            );
        }
    }

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

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
     * The subject ID.
     *
     * @var null|int
     */
    protected $subjectId = null;

    /**
     * The subject type.
     *
     * @var null|string
     */
    protected $subjectType = null;

    /**
     * The skipped fields.
     *
     * @var array
     */
    protected $skips = [
        'approved',
    ];

    /**
     * The form fields.
     *
     * @var array
     */
    protected $fields = [
        'body' => [
            'label'       => false,
            'placeholder' => 'anomaly.module.comments::field.comment.placeholder',
        ],
    ];

    /**
     * The form actions.
     *
     * @var array|string
     */
    protected $actions = [
        'submit' => [
            'text' => 'anomaly.module.comments::message.post_comment',
        ],
    ];

    /**
     * The form assets.
     *
     * @var array
     */
    protected $assets = [
        'styles.css'     => [
            'anomaly.module.comments::css/jquery.atwho.min.css',
        ],
        'scripts.js' => [
            'anomaly.module.comments::js/jquery.caret.min.js',
            'anomaly.module.comments::js/jquery.atwho.min.js',
            'anomaly.module.comments::js/mention.js',
        ],
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
                    'name'  => [
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
        $entry = $this->getFormEntry();

        $entry->setAttribute('subject_id', $this->getSubjectId());
        $entry->setAttribute('subject_type', $this->getSubjectType());
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

    /**
     * Get the subject ID.
     *
     * @return int|null
     */
    public function getSubjectId()
    {
        return $this->subjectId ?: $this->subject->getId();
    }

    /**
     * Set the subject ID.
     *
     * @param $id
     * @return $this
     */
    public function setSubjectId($id)
    {
        $this->subjectId = $id;

        return $this;
    }

    /**
     * Get the subject type.
     *
     * @return null|string
     */
    public function getSubjectType()
    {
        return $this->subjectType ?: get_class($this->subject);
    }

    /**
     * Set the subject type.
     *
     * @param $type
     * @return $this
     */
    public function setSubjectType($type)
    {
        $this->subjectType = $type;

        return $this;
    }
}

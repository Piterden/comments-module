<?php namespace Anomaly\CommentsModule\Comment\Form;

use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Model\EloquentModel;
use Anomaly\Streams\Platform\Support\Presenter;
use Anomaly\Streams\Platform\Ui\Form\FormCriteria;

/**
 * Class CommentFormCriteria
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\CommentsModule\Comment\Form
 */
class CommentFormCriteria extends FormCriteria
{

    /**
     * The comment form builder.
     *
     * @var CommentFormBuilder
     */
    protected $builder;

    /**
     * Set the subject.
     *
     * @param EntryInterface $entry
     */
    public function setSubject(EntryInterface $entry)
    {
        $this->builder->setSubjectId($this->parameters['subject_id'] = $entry->getId());
        $this->builder->setSubjectType($this->parameters['subject_type'] = get_class($entry));

        return $this;
    }
}

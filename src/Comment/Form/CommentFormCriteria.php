<?php namespace Anomaly\CommentsModule\Comment\Form;

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
     * Build the builder.
     *
     * @return CommentFormBuilder
     */
    public function build()
    {
        parent::build();

        /* @var EloquentModel $model */
        $model = $this->container->make($this->parameters['subject']['type']);

        $this->builder->setSubject($model->find($this->parameters['subject']['id']));

        return $this->builder;
    }

    /**
     * Set the entry.
     *
     * @param $entry
     * @return $this
     * @throws \Exception
     */
    public function setSubject($entry)
    {
        if ($entry instanceof Presenter) {
            $entry = $entry->getObject();
        }

        if (!$entry instanceof EloquentModel) {
            throw new \Exception('$entry must be instance of ' . EloquentModel::class);
        }

        $this->parameters['subject'] = [
            'id'   => $entry->getId(),
            'type' => get_class($entry),
        ];

        return $this;
    }
}

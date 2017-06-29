<?php namespace Anomaly\CommentsModule\Mention;

use Anomaly\CommentsModule\Mention\Contract\MentionRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

class MentionRepository extends EntryRepository implements MentionRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var MentionModel
     */
    protected $model;

    /**
     * Create a new MentionRepository instance.
     *
     * @param MentionModel $model
     */
    public function __construct(MentionModel $model)
    {
        $this->model = $model;
    }
}

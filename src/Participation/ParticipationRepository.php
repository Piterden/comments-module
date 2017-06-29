<?php namespace Anomaly\CommentsModule\Participation;

use Anomaly\CommentsModule\Participation\Contract\ParticipationRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

class ParticipationRepository extends EntryRepository implements ParticipationRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var ParticipationModel
     */
    protected $model;

    /**
     * Create a new ParticipationRepository instance.
     *
     * @param ParticipationModel $model
     */
    public function __construct(ParticipationModel $model)
    {
        $this->model = $model;
    }
}

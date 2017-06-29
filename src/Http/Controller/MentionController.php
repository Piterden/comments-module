<?php namespace Anomaly\CommentsModule\Http\Controller;

use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Anomaly\UsersModule\User\Contract\UserRepositoryInterface;

/**
 * Class MentionController
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class MentionController extends PublicController
{

    /**
     * Return an index of users to mention.
     *
     * @param UserRepositoryInterface $users
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(UserRepositoryInterface $users)
    {
        if (!$term = $this->request->get('q')) {
            return $this->response->json();
        }

        $query = $users->newQuery();

        return $this->response->json(
            $query
                ->select('username')
                ->where('username', 'LIKE', $term . '%')
                ->take(5)
                ->get()
                ->pluck('username')
        );
    }
}

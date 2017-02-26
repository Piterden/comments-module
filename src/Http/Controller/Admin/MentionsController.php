<?php namespace Anomaly\CommentsModule\Http\Controller\Admin;

use Anomaly\CommentsModule\Mention\Form\MentionFormBuilder;
use Anomaly\CommentsModule\Mention\Table\MentionTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

class MentionsController extends AdminController
{

    /**
     * Display an index of existing entries.
     *
     * @param MentionTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(MentionTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param MentionFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(MentionFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param MentionFormBuilder $form
     * @param        $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(MentionFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}

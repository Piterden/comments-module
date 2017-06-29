<?php namespace Anomaly\CommentsModule\Http\Controller\Admin;

use Anomaly\CommentsModule\Participation\Form\ParticipationFormBuilder;
use Anomaly\CommentsModule\Participation\Table\ParticipationTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

class ParticipationController extends AdminController
{

    /**
     * Display an index of existing entries.
     *
     * @param ParticipationTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(ParticipationTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param ParticipationFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(ParticipationFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param ParticipationFormBuilder $form
     * @param        $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(ParticipationFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}

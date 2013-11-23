<?php

namespace SymfonyContrib\Bundle\VoteUpDownBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    public function thumbsAction()
    {
        $voting = $this->get('voting');

        //$voting->updateResults('vud_test');

        $vote = $voting->getMyVote('vud_test');

        return $this->render('VoteUpDownBundle:Default:thumbs.html.twig',
            [
                'vote' => $vote,
                'vote_count' => $voting->getCount('vud_test'),
                'vote_average' => $voting->getAverage('vud_test'),
                'vote_sum' => $voting->getSum('vud_test'),
            ]
        );
    }

    public function voteAction($direction = 'up')
    {
        $voting = $this->get('voting');

        $vote = [
            'key' => 'vud_test',
            'value' => $direction === 'up' ? 1 : -1,
            'valueType' => 'points',
            'agent' => 'vud',
        ];

        $voting->addVote($vote);

        //return new Response(null, 200);
        return new JsonResponse();
    }

}

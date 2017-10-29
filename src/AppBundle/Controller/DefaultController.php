<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Post;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        /** @var Post[] $posts */
        $posts = $this->getDoctrine()->getRepository(Post::class)->findForFirstPage();

        $postsByYearAndMonth = [];
        foreach ($posts as $post) {
            $yearKey = (int) $post->getDate()->format('Y');
            $monthKey = (int) $post->getDate()->format('n');
            if (!array_key_exists($yearKey, $postsByYearAndMonth)) {
                $postsByYearAndMonth[$yearKey] = [];
            }
            if (!array_key_exists($monthKey, $postsByYearAndMonth[$yearKey])) {
                $postsByYearAndMonth[$yearKey][$monthKey] = [];
            }
            $postsByYearAndMonth[$yearKey][$monthKey][] = $post;
        }

        return $this->render('default/index.html.twig', [
            'postsByYearAndMonth' => $postsByYearAndMonth,
        ]);
    }
}

<?php
namespace App\Controller;

use Orlex\Annotation\Route;

use Orlex\ContainerAwareTrait;
use Orlex\Controller\TwigTrait;
use Orlex\Controller\FormTrait;
use Orlex\Controller\SessionTrait;
use Orlex\Controller\UrlGeneratorTrait;

use App\Form;
use Symfony\Component\HttpFoundation\RedirectResponse;

class IndexController {
    use ContainerAwareTrait;
    use TwigTrait;
    use FormTrait;
    use SessionTrait;
    use UrlGeneratorTrait;

    /**
     * @Route("/",methods={"GET","POST"},name="index")
     */
    public function indexAction() {
        $form = $this->createForm(new Form\LoginForm());

        return $this->render("index.html.twig", [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/login",methods={"POST"},name="login")
     */
    public function loginAction() {
        /** @var $request \Symfony\Component\HttpFoundation\Request */
        $request = $this->get('request');

        $form = $this->createForm(new Form\LoginForm());

        if ('POST' == $request->getMethod()) {
            $form->submit($request);

            if ($form->isValid()) {
                $data = $form->getData();

                $this->session()->set("username", $data['username']);
            }
        }

        return new RedirectResponse($this->path("index"));
    }

    /**
     * @Route("/logout",methods={"GET"},name="logout")
     */
    public function logoutAction() {
        $this->session()->clear();
        return new RedirectResponse($this->path("index"));
    }
}
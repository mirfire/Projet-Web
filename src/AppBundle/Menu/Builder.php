<?php
namespace AppBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class Builder implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav navbar-nav');

        $menu->addChild('Accueil', array('route' => 'homepage'))
            ->setAttribute('icon', 'fa fa-list');
        $menu->addChild('Recherche de Profil', array('route' => 'search'));
        // Si l'utilisateur est connecté est un
        if($this->container->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            $menu->addChild('Mon Compte', array('route' => 'fos_user_profile_show'));
        }
        else {
            $menu->addChild('Connexion', array('route' => 'fos_user_security_login'));
            $menu->addChild('Inscription', array('route' => 'fos_user_registration_register'));
        }
        $menu->addChild('A propos', array('route'=> 'about'));
        return $menu;
    }
}

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
            ->setAttribute('icon', 'fa fa-home');
        $menu->addChild('Recherche de Profil', array('route' => 'search'))
            ->setAttribute('icon', 'fa fa-search');
        // Si l'utilisateur est connecté est un
        if($this->container->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            $menu->addChild('Mon Compte', array('route' => 'fos_user_profile_show'))
                ->setAttribute('dropdown', true)
                ->setAttribute('icon', 'fa fa-user');
            $menu['Mon Compte']->addChild('Profil', array('route' => 'fos_user_profile_show'))
                ->setAttribute('icon', 'fa fa-user');
            $menu['Mon Compte']->addChild('Mes Compétences', array('route' => 'user_skill'))
                ->setAttribute('icon', 'fa fa-star');
            $menu['Mon Compte']->addChild('Mes Expérience', array('route' => 'user_experience'))
                ->setAttribute('icon', 'fa fa-briefcase');
            $menu['Mon Compte']->addChild('Mes Formations', array('route' => 'user_course'))
                ->setAttribute('icon', 'fa fa-graduation-cap');
            $menu['Mon Compte']->addChild('Mes Projets', array('route' => 'user_project'))
                ->setAttribute('icon', 'fa fa-archive');
            $menu['Mon Compte']->addChild('Déconnexion', array('route' => 'fos_user_security_logout'))
                ->setAttribute('icon', 'fa fa-sign-in')
                ->setAttribute('divider_prepend', true);

        }
        else {
            $menu->addChild('Connexion', array('route' => 'fos_user_security_login'))
                ->setAttribute('icon', 'fa fa-sign-in');
            $menu->addChild('Inscription', array('route' => 'fos_user_registration_register'))
                ->setAttribute('icon', 'fa fa-user-plus');
        }
        $menu->addChild('A propos', array('route'=> 'about'))
            ->setAttribute('icon', 'fa fa-question-circle');
        return $menu;
    }
}

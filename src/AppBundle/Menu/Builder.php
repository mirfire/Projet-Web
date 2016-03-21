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
        $menu->addChild('Recherche de Profil', array('route' => 'research'));
        $menu->addChild('Connexion', array('route' => 'fos_user_security_login'));
        $menu->addChild('Inscription', array('route' => 'fos_user_registration_register'));
        $menu->addChild('A propos', array('route'=> 'about'));
        return $menu;
    }
}

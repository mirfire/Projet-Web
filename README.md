# Projet Web
Un projet Symfony.

## Maître du Code
Côté code, nous avons utilisé le framework [Symfony](https://symfony.com/) dans sa version 2.8, car c'est la dernière
version ayant une durée de support étendu, nous assurant ainsi un support jusqu'en Novembre 2018. Nous avons suivis
les [bonnes pratiques](https://symfony.com/doc/2.8/best_practices/index.html) autant que possible, dans la limite du
temps qui nous était accordé et de nos capacités.

Côté PHP, nous utilisons la version 5.6.19, Symfony n'étant compatible avec PHP7 qu'avec la version 3.0.

Pour gérer les dépendances, nous utilisons Composer.

### Conventions
Comme le préconise Symfony, nous respectons les standards définis dans le document [PSR-1](http://www.php-fig.org/psr/psr-1/)

C'est à dire, pour résumer que :
* Les fichiers DOIVENT utiliser UNIQUEMENT les tags `<?php` ou `<?=`.
* Les fichiers DOIVENT être encodés en UTF-8 sans BOM (Byte Order Mark).
* Les namespaces et classes DOIVENT être nommés selon la convention `StudlyCaps`.
* Les constantes DOIVENT être en `MAJUSCULES`.
* Les méthodes DOIVENT être nommées la convention `camelCase`.
* Les champs de base de données et variables DOIVENT être nommés selon la convention `under_score`.

**Exemple:**

    <?php
    namespace Vendor\Model;

    class Foo
    {
        const VERSION = '1.0';
        const DATE_APPROVED = '2012-06-01';

        private $name;

        public $full_name;

        public function whereIsBryan() {
            return null;
        }
    }

Bien sûr, le code se devra d'être commenté pour expliquer ce qu'il s'il s'y fait. Bien qu'il serait préférable que les
noms de fonctions et variables permettent au code de se suffir à lui-même.
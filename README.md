# Iriss-Command API 📡

Faciliter l'utilisation et la création de commande lié à pocketmine.

---
## Fonctionnalités

- Création de commande ainsi que de sous-command
- Auto-completion des commandes.
- Utilisation de parametre pour les commandes.
- Possibilité de créer ses propres parametres.

## Installation
Pour installer [Iriss-Command](https://github.com/Synopsie/Nacre-UI) dans votre projet, si vous utilisez [composer](https://getcomposer.org/):
```php
composer require synopsie/iriss-command
```

Si vous n'utilisez pas [composer](https://getcomposer.org/), alors je vous invite à mettre l'API entièrement dans votre projet, et a changer les namespaces.

## Utilisation
**Command**
```php
class CommandTest extends CommandBase {

    public function __construct($name, $description, $usage, $subCommand, $aliases) {}

    public function getCommandParameter() : array {} #Permet de définir les paramètres utilisés pas la commande.
    
    public function onRun(CommandSender $sender, array $params) : void {} #Permet de définir l'action de la commande.
}
```

**Parameter**
```php
class ParameterTest extends Parameter{
    
    //code

}
```

## Support

Besoin d'aide ou avez-vous des questions ? N'hésitez pas à nous contacter ou à consulter la documentation pour obtenir des informations supplémentaires.

## Crédits

Iriss-Command est développé par [Synopsie](https://discord.gg/JkpT7BJPXR). Merci à toute l'équipe pour son travail acharné et son dévouement à améliorer l'expérience de développement pour la communauté Discord.

![Iriss-Command](iriss-command.png)

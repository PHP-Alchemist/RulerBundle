# RulerBundle  

-------
[![StyleCI](https://github.styleci.io/repos/932481981/shield?branch=master)](https://github.styleci.io/repos/932481981?branch=master)
-------

A Symfony bundle for Ruler


## Installation

Prior to adding the RulerBundle, you will need to add the PHPAlchemist symfony recipes repo to your configuration.
To do so, add the following to your `composer.json` file:

```json
{
 //...
"extra": {
    "symfony": {
      "endpoint": [
        "https://api.github.com/repos/PHP-Alchemist/symfony-recipes/contents/index.json",
        "flex://defaults"
      ]
    }
  }
}
  ```

Next you can require the bundle:
```shell
composer require php-alchemist/ruler-bundle 
```

## Configuration

In your `config/packages` folder you should now find a `php_alchemist_ruler.yaml` file. The contents should resemble:
```yaml
php_alchemist_ruler:
  ruler:
    operators: ~
```

If you have a namespace in which you have custom operators, here is where you will configure that.
The `operators` option should be filled in with that namespace. Such as:

```yaml
php_alchemist_ruler:
  ruler:
    operators: 'App\Rules\Operators'
```
This namespace will be automatically added to your RuleBuilder if being called from the Symfony service container.

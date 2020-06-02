# `twig-classnames`

PHP port of [JedWatson/classnames](https://github.com/JedWatson/classnames) - a utility to conditionally construct CSS class names.

## Install
Add the dependency using Composer:
```bash
composer require guym4c/twig-classnames
```
And add to your Twig environment:
```php
$twigEnv->addExtension(new Guym4c\TwigClassnames());
```

## Usage
`classnames()`, called from your templates, takes any number of string or hash parameters. If the value associated with a given hash key is falsy, that key won't be included in the output.

```twig
{{ classNames('foo', 'bar') }} {# => 'foo bar' #}
{{ classNames('foo', { bar: true }) }} {# => 'foo bar' #}
{{ classNames({ 'foo-bar': true }) }} {# => 'foo-bar' #}
{{ classNames({ 'foo-bar': false }) }} {#  => '' #}
{{ classNames({ foo: true }, { bar: true }) }} {# => 'foo bar' #}
{{ classNames({ foo: true, bar: true }) }} {#  => 'foo bar' #}

{# lots of arguments of various types #}
{{ classNames('foo', { bar: true, duck: false }, 'baz', { quux: true }) }} 
{# => 'foo bar baz quux' #}

{# other falsy values are just ignored #}
{{ classNames(null, false, 'bar', undefined, 0, 1, { baz: null }, '') }} 
{# => 'bar 1' #}
```
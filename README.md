# BlacksmithProject - DrWatson

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/BlacksmithProject/DrWatson/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/BlacksmithProject/DrWatson/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/BlacksmithProject/DrWatson/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/BlacksmithProject/DrWatson/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/BlacksmithProject/DrWatson/badges/build.png?b=master)](https://scrutinizer-ci.com/g/BlacksmithProject/DrWatson/build-status/master)

A PHP library enhancing `\Exception`.

## Why ?

`\Exception` does not provide enough information to debug easily.

Indeed, stacktrace can sometime be hard to understand, and message
can be insufficient.

`DrWatson` is the developper personal investigation assistant, providing
type, suspect and help.

## Installation:

`composer require blacksmith-project/dr-watson`

## How to use it:

You can throw a `DrWatson::report`.

- type should tell you if the exception is an input issue, domain
or internal.

> That will help you to know quickly who failed and what quick deduction
you can make:
> - Input = User failed, let him know.
> - Domain = Further investigation on the code is necessary.
> - Internal = Inspect the code, but maybe some infrastructure failed
(BDD for example).

- suspect should help you target quickly to the right place to look at.
- help should explain to you why it failed. Some business logic can be
exposed here, to help you narrow the issue down.

### Example:

```php
if (!$this->isValid($email)) {
    throw DrWatson::report(
        ExceptionType::INPUT(),
        'email',
        'It seems that User provided an invalid email. Please make sure a typo was not made.',
        'input.email.invalid'
    );
}
```
# why-di-containers

What are advantages of DI-containers over self-made container classes?

I've made two implementations of the same example - select first row from table and var_dump it.

[First](https://github.com/funtaps/why-di-containers/blob/master/VARIANT1-di-container.php) is with pimple (it is one of the simpliest DI-containers)
This code can easily be transfered to any other DI-container implemintation, and not much will change.

In [second implementation](https://github.com/funtaps/why-di-containers/blob/master/VARIANT2-di-self-made.php) I've tried to do DI without string arguments in get or array access functions. Instead I define get* functions.
By doing so I see, that me code is more explicit, better type-hinted and easier to navigate.
I can see that my self-made DI-class has more boilerplate code, but it is easily can be fixed.

Cons of DI-containers (all of those are results of mixed return type):
* bad type-hinting
* bad static analysis capabilities
* bad IDE autocompletion
* bad navigation

Pros of DI-containers:
* ?

What did I miss?

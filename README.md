# LocaMon project
[![Build Status](https://magnum.travis-ci.com/efiku/locamon.svg?token=xCpwqAxDjMzyxjCPykfo&branch=master)](https://magnum.travis-ci.com/efiku/locamon)

LocaMon is class which allow you to simple convert time into localized names.
For example month numbers into names.
```php
   $locaMon = new LocaMon();
   $monthNumber = 3;
   $timestamp = mktime(0,0,0,$monthNumber);
   
   $locaMon
    ->setLocale('pl_PL')
    ->setFormat('LLLL')
    ->setData($timestamp);
    
    echo $locaMon->getResult(); // marzec 

```
About format: [datetime](http://userguide.icu-project.org/formatparse/datetime)

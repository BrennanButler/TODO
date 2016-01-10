# TODO
A (very) simple php script for parsing project files for TODO comments and structuring it into a website.

Please note that I am not a professional PHP programmer and this code is provided as-is. I haven't bothered to put in extensive error checking.

## Usage

Change the variable ```$directory``` to your projects directory.

For example:

```php
$directory = "C:/Projects/project/";
```

You can change how it finds "todo" lines within the code with this line of code:

```php
if(strpos($line, "TODO :") || strpos($line, "TODO:") || strpos($line, "todo:") || strpos($line, "todo :"))
```

You can change how much code is shown with this line of code:
```php
$code = substr($contents, $match[0]-strlen($match[2]), 1000);
```
Change the ```$match[0]-strlen($match[2])``` and ```1000``` to your fitting.


![alt tag](http://i.imgur.com/V896vga.png)

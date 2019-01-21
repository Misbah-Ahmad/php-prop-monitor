# php-prop-monitor
A simple php library that digs into nested php objects to find certain properties.

It's handy if you have to work with a large object :scream: & you also want to avoid using _property_exists(class, property)_ :smirk: several times to find a single property :).   

## Installation

use _**composer require misbah/prop-monitor**_ to install

## Changelog
  * 2.0.0
  
        Added get($object, array $properties) function to extract a desired value by following a path of properties & array indices.
   
   
## Usage

Let the following json object is converted to StdClass:

```
$users = {
  
  'users' : [
    {
      'name' : 'John Doe',
      'email: 'john@doe.com',
      'social': {
        'twitter': '@jdoe',
        'facebook': '@johndoe',
        'github': '@jdoegit'
      }
    }
  ] 

}

```

### Check whether 'github' property is present or not for the first user in the users array

```

<?php
  
  require './vendor/autoload.php';

  $monitor = new \PropMonitor\PropMonitor();
  
  
  
  $propertiesToCheck = ['users', 0, 'social', 'github'];
  
  // Returns true
  if($monitor->check($users, $propertiesToCheck)) // assuming that we have access to the $users object described above.
  {
    echo "Yee! John has the github property 8).";
    echo "The handle is ".$monitor->get($users, $propertiesToCheck); // This will return @jdoegit
  } else {
    echo "Oops! John isn't lucky enough to have the mighty github property :(";
  }
  
```

**Note for using get($object, array $properties) function**

If the extraction of a value fails, this function will return boolean false.

So, to check a failure, use ``` $result === false ```.

If you are expecting a boolean value as the final result, use ``` $result === 0 ``` OR ``` $result === 1 ```.

Because this function will convert final boolean values to integer values. 




### Check whether 'tumblr' property is present or not for the first user in the users array

```

<?php
  require './vendor/autoload.php';

  $monitor = new \PropMonitor\PropMonitor();
  
  
  $propertiesToCheck = ['users', 0, 'social', 'tumblr'];
  
  // Returns false 
  if($monitor->check($users, $propertiesToCheck)) // assuming that we have access to the $users object described above.
  {
    echo "Yee! John has the tumblr property 8).";
  } else {
    echo "Oops! John isn't lucky enough to have the mighty tumblr property :(";
  }
  
```

### A different example

```

<?php
  require './vendor/autoload.php';

  $monitor = new \PropMonitor\PropMonitor();
  
  
  $propertiesToCheck = ['users', '0', 'social', 'twitter']; // Look at the mentioned array index
  
  //This will return true though the array index is defined as a string
  if($monitor->check($users, $propertiesToCheck)) // assuming that we have access to the $users object described above.
  {
    echo "Yee! John has the twitter property 8).";
  } else {
    echo "Oops! John isn't lucky enough to have the mighty twitter property :(";
  }
    
```


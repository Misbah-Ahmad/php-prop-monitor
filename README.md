# php-prop-monitor
A simple php library that digs into nested php objects to find certain properties

## Intallation

use _**composer require misbah/prop-monitor**_ to install

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
  } else {
    echo "Oops! John isn't enough lucky to have the mighty github property :(";
  }
  
```

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
    echo "Oops! John isn't enough lucky to have the mighty tumblr property :(";
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
    echo "Oops! John isn't enough lucky to have the mighty twitter property :(";
  }
    
```


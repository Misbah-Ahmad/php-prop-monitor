# php-prop-monitor
A simple php library that digs nested php objects to find certain properties

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
  use PropMonitor;
  
  $monitor = new PropMonitor();
  
  //
  $propertiesToCheck = ['users', 0, 'social', 'github'];
  
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
  use PropMonitor;
  
  $monitor = new PropMonitor();
  
  //
  $propertiesToCheck = ['users', 0, 'social', 'tumblr'];
  
  if($monitor->check($users, $propertiesToCheck)) // assuming that we have access to the $users object described above.
  {
    echo "Yee! John has the tumblr property 8).";
  } else {
    echo "Oops! John isn't enough lucky to have the mighty tumblr property :(";
  }
  
```


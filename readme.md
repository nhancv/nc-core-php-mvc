#PHP MVC ARCHITECTURE
##Model-View-Controller
**The Model** represents your data structures. Typically your model classes will contain functions that help you retrieve, insert, and update information in your database.

**The View** is the information that is being presented to a user. A View will normally be a web page, but can be any type of "page".

**The Controller** serves as an intermediary between the Model, the View, and any other resources needed to process the HTTP request and generate a web page.

##Folder Structure

- config
- controllers
- helpers
- models
- plugins
- views

`<link rel="stylesheet" href="<?php echo BASE_URL; ?>static/css/style.css" type="text/css" media="screen" />`

##Naming Conventions

All classes use **PascalCase** naming. The associated file names must be the same except all lower case. So for example the class ThisIsAClass would have the filename thisisaclass.php. Underscores in classes must be included in file names as well.

##URL Structure
`example.com/class/function/param`

By default index.php is hidden in the URL. This is done using the **.htaccess** file in the root directory.

##Controllers

Controllers are the driving force of a application. As you can see from the URL structure, segments of the URL are mapped to a class and function. These classes are controllers stored in the "application/controller" directory. So for example the URL...
`example.com/auth/login`

...would map to the following Controller with the filename auth.php:

```php
<?php

class Auth extends Controller {

    function index()
    {
        // This is the default function (i.e. no function is set in the URL)
    }

    function login()
    {
        echo 'Hello World!';
    }

}
?>
```
...and the output would be "Hello World!".
The default controller and error controller can be set in application/config/config.php
Note that if you need to declare a constructor you must also call the parent constructor like:
```php
<?php

class Example extends Controller {

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }

}

?>
```
There are several helper functions that can also be used in controllers. Most of these functions take the parameter $name of the corresponding class:

- loadModel($name) - Load a model
- loadView($name) - Load a view
- loadPlugin($name) - Load a plugin
- loadHelper($name) - Load a helper
- redirect($location) - Redirect to a page without having to include the base URL. E.g:

```java
$this->redirect('some_class/some_function');
```

##Views
They can contain everything a normal web page would include. Views are almost always loaded by Controllers. So for example if you had a view called main_view.php that contained the following HTML:
```html
<html>
<head>
<title>My Site</title>
</head>
<body>
    <h1>Welcome to my Site!</h1>
</body>
</html>
```
... you would load it in a controller by doing the following:
```php
<?php

class Main extends Controller {

    function index()
    {
        $template = $this->loadView('main_view');
        $template->render();
    }

}

?>
```
The View class has a helper function called set($key, $val) that allows you to pass variables from the Controller to the View.
```php
$template = $this->loadView('main_view');
$template->set('someval', 200);
$template->render();
```
...then in the view you could do:
```php
<?php echo $someval; ?>
```
...and the output would be 200. Any kind of PHP variable can be passed to a view in this way.

##Models
models are classes whose sole responsiblity it is to deal with data (usually from a database). For example:
```php
<?php

class Example_model extends Model {

    public function getSomething($id)
    {
        $id = $this->escapeString($id);
        $result = $this->query('SELECT * FROM something WHERE id="'. $id .'"');
        return $result;
    }

}

?>
```
...then in a controller you would do:
```php
function index()
{
    $example = $this->loadModel('Example_model');
    $something = $example->getSomething($id);

    $template = $this->loadView('main_view');
    $template->set('someval', $something);
    $template->render();
}
```
Now the results of your database query would be available in your view in $someval. Note that in the above code there are no steps to connect to the database. That is because this is done automatically. For this to work you must provide your database details in config.php:
```php
$config['db_host'] = ''; // Database host (e.g. localhost)
$config['db_name'] = ''; // Database name
$config['db_username'] = ''; // Database username
$config['db_password'] = ''; // Database password
```
There are several helper functions that can also be used in models:

- query($query) - Returns an array of results from a query
- execute($query) - Returns the direct result from a query
- escapeString($string) - Escape strings before using them in queries

##Helpers & Plugins

There are two types of additional resources you can use in WRAPPER.

- Helpers are classes which you can use that don't fall under the category of "controllers". These will usually be classes that provide extra functionality that you can use in your controllers. WRAPPER ships with two helper classes (Session_helper and Url_helper) which are examples of how to use helpers.
- Plugins are literally any PHP files and can provide any functionality you want. By loading a plugin you are simply including the PHP file from the "plugins" folder. This can be useful if you want to use third party libraries in your WRAPPER application.


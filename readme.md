## TODOParrot

WARNING: As indicated by the [Laravel 5 commit log](https://github.com/laravel/laravel/commits/develop), Laravel 5 is highly unstable and should not be used in a production environment. Because I like pain, I am however ignoring this advice, because my book's demo application ([TODOParrot.com](http://todoparrot.com/)) is indeed running on Laravel 5. This repository contains the code used to run TODOParrot. Keep in mind that because Laravel 5 is changing at times by the hour, running `composer update` after cloning this repository will likely require you to do a bit of code surgery. E-mail me with questions, happy to help.

TODOParrot ([http://todoparrot.com](http://todoparrot.com)) is the companion project to the forthcoming book, "Easy Laravel 5" ([http://easylaravelbook.com](http://easylaravelbook.com)), written by bestselling author [W. Jason Gilmore](http://wjgilmore.com). Be sure to check out the book website and subscribe to the notification list in order to receive a nice discount when it publishes. Otherwise, if you'd like to begin reading the book now you currently can purchase a beta version on [EasyLaravelBook.com](http://easylaravelbook.com) or [Leanpub](https://leanpub.com/easylaravel/) at a discounted cost, and receive free updates for life!

Warning: Laravel 5 is unstable, particularly so in regards to recent commits. I've had to do some serious backflips to keep TODOParrot working in conjunction with the very latest development version. Be patient, this is bleeding edge technology. Regardless, hopefully even this feature incomplete application provides interested developers with the opportunity to have a look at Laravel 5's many new features, not to mention better understand how Laravel works in general. In particular it demonstrates implementation of the following features:

* Blade Templating: A simple master layout is used. Nothing new here but a useful example for Laravel newbies.
* Model Relations: TODOParrot users can have many lists, and each list can have many tasks. These relations have been integrated into the models.
* Forms Integration: The new Laravel 5 Form Request feature is used for creating new lists and tasks. 
* Database Queries: The various implemented queries are pretty basic but should provide Laravel newcomers with a few useful examples.
* User Authentication: TODOParrot uses the new Laravel 5 authentication generator.
* Unit Testing:
* Bootstrap Integration: Because I can't even write my own name legibly let alone design a nice website, TODOParrot uses the Bootstrap framework.

TODOParrot is *not a finished product*! I work on the project in conjunction with the examples found in the forthcoming book.

In the coming days and weeks I'll continue to improve TODOParrot as I continue writing and refining the book. In particular I plan on demonstrating the following features:

* Improved form workflow: Streamlining of the form validation process.
* Database seeding: I'll provide some sample account and list data so you can experiment using a realistic data set. 
* Much more testing: Plenty to do here
* Additional account features: Account confirmation and password recovery, to name a few features.
* List/task editing: Currently users can only create lists and create/modify tasks. In the very near future I'll add list and task deletion.
* User preferences: I'd like to add some simple customization capabilities such as e-mail notification when a task date expires.
* An administration console: The console would allow administrators to view all user accounts and lists.

### Installing TODOParrot

To install TODOParrot you can clone the repository:

    $ git clone https://github.com/wjgilmore/todoparrot.git 

Or if you're not familiar with Git (you really should [learn](https://try.github.io)), you can [download the zip file](https://github.com/wjgilmore/todoparrot/archive/master.zip). After downloading the file, unzip it to a convenient location.

Next, enter the project's root directory and update the project dependencies:

    $ composer update

Once complete, fire up the Laravel development server:

    $ php artisan serve

I'm still working on the unit tests however several are already in place. You can run them by executing the following command from the project root directory:

    $ vendor/bin/phpunit

### License

TODOParrot is licensed under the [MIT license](http://opensource.org/licenses/MIT). If you find something wrong with the code or think it could be improved, I welcome you to [create an issue](https://github.com/wjgilmore/todoparrot/issues) or submit a pull request!

The home page image is copyright 2014 W. Jason Gilmore (wj@wjgilmore.com). It may not be used for any purpose without express written permission from its copyright holder. Also, please do not use the name TODOParrot. I kind of like it.

## TODOParrot

TODOParrot ([http://todoparrot.com](http://todoparrot.com)) is the companion project to the forthcoming book, "Easy Laravel 5" ([http://easylaravelbook.com](http://easylaravelbook.com)), written by bestselling PHP author [W. Jason Gilmore](http://wjgilmore.com). Be sure to check out the book website and subscribe to the notification list in order to receive a nice discount when it publishes. Otherwise, if you'd like to begin reading the book now you currently can purchase a beta version on [EasyLaravelBook.com](http://easylaravelbook.com) or [Leanpub](https://leanpub.com/easylaravel/) at a discounted cost, and receive free updates for life!

TODOParrot is built atop the forthcoming Laravel 5. While likely fairly unstable and currently not feature complete, it nonetheless provides interested Laravel developers with the opportunity to have a look at Laravel 5's many new features, not to mention better understand how Laravel works in general. In particular it demonstrates implementation of the following features:

* Blade templating
* Model associations 
* Forms integration 
* Database queries 
* User authentication: TODOParrot does *not* currently use the brand new Auth generators found in a recent Laravel 5 commit. I will be updating TODOParrot very soon to take advantage of this great feature.
* Unit testing

TODOParrot is *not a finished product*! I work on the project in conjunction with the examples found in the forthcoming book.

In the coming days and weeks I'll continue to improve TODOParrot as I continue writing and refining the book. In particular I plan on demonstrating the following features:

* Improved form workflow: Streamlining of the form validation process.
* Database seeding: I'll provide some sample account and list data so you can experiment using a realistic data set. 
* Advanced unit testing: Plenty to do here
* Additional account features: Account confirmation and password recovery, among others
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
